<?php
// Prevent direct access
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method not allowed');
}

// Enable error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session for CSRF protection
session_start();

// Configuration
$config = [
    'admin_email' => 'info@tsmtravells.com',
    'admin_name' => 'TSM Travells',
    'smtp_host' => 'localhost', // Change to your SMTP server
    'smtp_port' => 587,
    'smtp_username' => '', // Add your SMTP username
    'smtp_password' => '', // Add your SMTP password
    'smtp_encryption' => 'tls'
];

// CSRF Protection
function generateCSRFToken() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function validateCSRFToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Input sanitization
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Email validation
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Phone validation
function validatePhone($phone) {
    // Remove all non-numeric characters
    $phone = preg_replace('/[^0-9]/', '', $phone);
    // Check if it's a valid Indian phone number (10 digits)
    return strlen($phone) === 10;
}

// Send email function
function sendEmail($to, $subject, $message, $from = null) {
    global $config;
    
    if (!$from) {
        $from = $config['admin_email'];
    }
    
    $headers = [
        'From: ' . $config['admin_name'] . ' <' . $from . '>',
        'Reply-To: ' . $from,
        'MIME-Version: 1.0',
        'Content-Type: text/html; charset=UTF-8',
        'X-Mailer: PHP/' . phpversion()
    ];
    
    return mail($to, $subject, $message, implode("\r\n", $headers));
}

// Process Contact Form
function processContactForm($data) {
    $errors = [];
    
    // Validate required fields
    if (empty($data['name'])) $errors[] = 'Name is required';
    if (empty($data['email'])) $errors[] = 'Email is required';
    if (empty($data['phone'])) $errors[] = 'Phone is required';
    if (empty($data['service'])) $errors[] = 'Service type is required';
    
    // Validate email format
    if (!empty($data['email']) && !validateEmail($data['email'])) {
        $errors[] = 'Invalid email format';
    }
    
    // Validate phone format
    if (!empty($data['phone']) && !validatePhone($data['phone'])) {
        $errors[] = 'Invalid phone number (must be 10 digits)';
    }
    
    if (!empty($errors)) {
        return ['success' => false, 'errors' => $errors];
    }
    
    // Prepare email content
    $subject = 'New Contact Form Submission - TSM Travells';
    $message = "
    <html>
    <head>
        <title>New Contact Form Submission</title>
    </head>
    <body>
        <h2>New Contact Form Submission</h2>
        <table>
            <tr><td><strong>Name:</strong></td><td>" . htmlspecialchars($data['name']) . "</td></tr>
            <tr><td><strong>Email:</strong></td><td>" . htmlspecialchars($data['email']) . "</td></tr>
            <tr><td><strong>Phone:</strong></td><td>" . htmlspecialchars($data['phone']) . "</td></tr>
            <tr><td><strong>Service:</strong></td><td>" . htmlspecialchars($data['service']) . "</td></tr>
            <tr><td><strong>Date:</strong></td><td>" . htmlspecialchars($data['date']) . "</td></tr>
            <tr><td><strong>Time:</strong></td><td>" . htmlspecialchars($data['time']) . "</td></tr>
            <tr><td><strong>Message:</strong></td><td>" . htmlspecialchars($data['message']) . "</td></tr>
        </table>
        <p><em>This message was sent from the TSM Travells website contact form.</em></p>
    </body>
    </html>
    ";
    
    // Send email to admin
    $emailSent = sendEmail($config['admin_email'], $subject, $message, $data['email']);
    
    if ($emailSent) {
        // Send confirmation email to customer
        $customerSubject = 'Thank you for contacting TSM Travells';
        $customerMessage = "
        <html>
        <head>
            <title>Thank you for contacting us</title>
        </head>
        <body>
            <h2>Thank you for contacting TSM Travells!</h2>
            <p>Dear " . htmlspecialchars($data['name']) . ",</p>
            <p>We have received your inquiry and will get back to you within 24 hours.</p>
            <p><strong>Your inquiry details:</strong></p>
            <ul>
                <li>Service: " . htmlspecialchars($data['service']) . "</li>
                <li>Date: " . htmlspecialchars($data['date']) . "</li>
                <li>Time: " . htmlspecialchars($data['time']) . "</li>
            </ul>
            <p>If you have any urgent requirements, please call us at +91 8861505754</p>
            <p>Best regards,<br>TSM Travells Team</p>
        </body>
        </html>
        ";
        
        sendEmail($data['email'], $customerSubject, $customerMessage);
        
        return ['success' => true, 'message' => 'Thank you! We will contact you soon.'];
    } else {
        return ['success' => false, 'errors' => ['Failed to send email. Please try again or call us directly.']];
    }
}

// Process Newsletter Subscription
function processNewsletterSubscription($data) {
    $errors = [];
    
    if (empty($data['email'])) {
        $errors[] = 'Email is required';
    } elseif (!validateEmail($data['email'])) {
        $errors[] = 'Invalid email format';
    }
    
    if (!empty($errors)) {
        return ['success' => false, 'errors' => $errors];
    }
    
    // Here you could add database storage for newsletter subscribers
    // For now, just send a confirmation email
    
    $subject = 'Newsletter Subscription Confirmed - TSM Travells';
    $message = "
    <html>
    <head>
        <title>Newsletter Subscription Confirmed</title>
    </head>
    <body>
        <h2>Welcome to TSM Travells Newsletter!</h2>
        <p>Thank you for subscribing to our newsletter. You will now receive updates about:</p>
        <ul>
            <li>Special offers and discounts</li>
            <li>New services and destinations</li>
            <li>Travel tips and updates</li>
            <li>Company news and events</li>
        </ul>
        <p>Best regards,<br>TSM Travells Team</p>
    </body>
    </html>
    ";
    
    $emailSent = sendEmail($data['email'], $subject, $message);
    
    if ($emailSent) {
        return ['success' => true, 'message' => 'Successfully subscribed to newsletter!'];
    } else {
        return ['success' => false, 'errors' => ['Failed to subscribe. Please try again.']];
    }
}

// Process Outstation Taxi Booking
function processOutstationBooking($data) {
    $errors = [];
    
    // Validate required fields
    if (empty($data['pickup_location'])) $errors[] = 'Pickup location is required';
    if (empty($data['destination'])) $errors[] = 'Destination is required';
    if (empty($data['start_date'])) $errors[] = 'Start date is required';
    if (empty($data['trip_type'])) $errors[] = 'Trip type is required';
    if (empty($data['vehicle_type'])) $errors[] = 'Vehicle type is required';
    if (empty($data['passengers'])) $errors[] = 'Number of passengers is required';
    if (empty($data['contact_name'])) $errors[] = 'Contact name is required';
    if (empty($data['contact_phone'])) $errors[] = 'Contact phone is required';
    
    // Validate phone format
    if (!empty($data['contact_phone']) && !validatePhone($data['contact_phone'])) {
        $errors[] = 'Invalid phone number (must be 10 digits)';
    }
    
    // Validate email format if provided
    if (!empty($data['contact_email']) && !validateEmail($data['contact_email'])) {
        $errors[] = 'Invalid email format';
    }
    
    if (!empty($errors)) {
        return ['success' => false, 'errors' => $errors];
    }
    
    // Send admin notification
    $adminSubject = 'New Outstation Taxi Booking - TSM Travells';
    $adminMessage = "
    <html>
    <head>
        <title>New Outstation Taxi Booking</title>
    </head>
    <body>
        <h2>New Outstation Taxi Booking Request</h2>
        <p><strong>Service:</strong> {$data['service_name']}</p>
        <p><strong>Pickup Location:</strong> {$data['pickup_location']}</p>
        <p><strong>Destination:</strong> {$data['destination']}</p>
        <p><strong>Start Date:</strong> {$data['start_date']}</p>
        <p><strong>Return Date:</strong> " . ($data['end_date'] ?: 'Not specified') . "</p>
        <p><strong>Trip Type:</strong> {$data['trip_type']}</p>
        <p><strong>Vehicle Type:</strong> {$data['vehicle_type']}</p>
        <p><strong>Passengers:</strong> {$data['passengers']}</p>
        <p><strong>Contact Name:</strong> {$data['contact_name']}</p>
        <p><strong>Contact Phone:</strong> {$data['contact_phone']}</p>
        <p><strong>Contact Email:</strong> " . ($data['contact_email'] ?: 'Not provided') . "</p>
        <p><strong>Special Requests:</strong> " . ($data['special_requests'] ?: 'None') . "</p>
        <p>Please contact the customer to confirm the booking.</p>
    </body>
    </html>
    ";
    
    $adminEmailSent = sendEmail($config['admin_email'], $adminSubject, $adminMessage);
    
    // Send customer confirmation
    if ($adminEmailSent) {
        $customerSubject = 'Outstation Taxi Booking Confirmed - TSM Travells';
        $customerMessage = "
        <html>
        <head>
            <title>Outstation Taxi Booking Confirmed</title>
        </head>
        <body>
            <h2>Thank you for your booking request!</h2>
            <p>Dear {$data['contact_name']},</p>
            <p>We have received your request for outstation taxi service from <strong>{$data['pickup_location']}</strong> to <strong>{$data['destination']}</strong>.</p>
            <p><strong>Booking Details:</strong></p>
            <ul>
                <li>Service: {$data['service_name']}</li>
                <li>Start Date: {$data['start_date']}</li>
                <li>Trip Type: {$data['trip_type']}</li>
                <li>Vehicle: {$data['vehicle_type']}</li>
                <li>Passengers: {$data['passengers']}</li>
            </ul>
            <p>Our team will contact you within 2 hours to confirm your booking and discuss final arrangements.</p>
            <p>If you have any urgent queries, please call us at +91 98765 43210.</p>
            <p>Best regards,<br>TSM Travells Team</p>
        </body>
        </html>
        ";
        
        sendEmail($data['contact_email'] ?: $config['admin_email'], $customerSubject, $customerMessage);
        
        return ['success' => true, 'message' => 'Thank you! Your outstation taxi booking request has been submitted. We will contact you soon to confirm.'];
    } else {
        return ['success' => false, 'errors' => ['Failed to process booking. Please try again or call us directly.']];
    }
}

// Process Airport Taxi Booking
function processAirportBooking($data) {
    $errors = [];
    
    // Validate required fields
    if (empty($data['pickup_type'])) $errors[] = 'Service type is required';
    if (empty($data['pickup_date'])) $errors[] = 'Pickup date is required';
    if (empty($data['pickup_time'])) $errors[] = 'Pickup time is required';
    if (empty($data['passengers'])) $errors[] = 'Number of passengers is required';
    if (empty($data['vehicle_type'])) $errors[] = 'Vehicle type is required';
    if (empty($data['pickup_address'])) $errors[] = 'Pickup address is required';
    if (empty($data['dropoff_address'])) $errors[] = 'Drop-off address is required';
    if (empty($data['contact_name'])) $errors[] = 'Contact name is required';
    if (empty($data['contact_phone'])) $errors[] = 'Contact phone is required';
    if (empty($data['contact_email'])) $errors[] = 'Contact email is required';
    
    // Validate phone format
    if (!empty($data['contact_phone']) && !validatePhone($data['contact_phone'])) {
        $errors[] = 'Invalid phone number (must be 10 digits)';
    }
    
    // Validate email format
    if (!empty($data['contact_email']) && !validateEmail($data['contact_email'])) {
        $errors[] = 'Invalid email format';
    }
    
    if (!empty($errors)) {
        return ['success' => false, 'errors' => $errors];
    }
    
    // Send admin notification
    $adminSubject = 'New Airport Taxi Booking - TSM Travells';
    $adminMessage = "
    <html>
    <head>
        <title>New Airport Taxi Booking</title>
    </head>
    <body>
        <h2>New Airport Taxi Booking Request</h2>
        <p><strong>Service:</strong> {$data['service_name']}</p>
        <p><strong>Service Type:</strong> {$data['pickup_type']}</p>
        <p><strong>Pickup Date:</strong> {$data['pickup_date']}</p>
        <p><strong>Pickup Time:</strong> {$data['pickup_time']}</p>
        <p><strong>Flight Number:</strong> " . ($data['flight_number'] ?: 'Not provided') . "</p>
        <p><strong>Passengers:</strong> {$data['passengers']}</p>
        <p><strong>Vehicle Type:</strong> {$data['vehicle_type']}</p>
        <p><strong>Pickup Address:</strong> {$data['pickup_address']}</p>
        <p><strong>Drop-off Address:</strong> {$data['dropoff_address']}</p>
        <p><strong>Contact Name:</strong> {$data['contact_name']}</p>
        <p><strong>Contact Phone:</strong> {$data['contact_phone']}</p>
        <p><strong>Contact Email:</strong> {$data['contact_email']}</p>
        <p><strong>Special Requests:</strong> " . ($data['special_requests'] ?: 'None') . "</p>
        <p>Please contact the customer to confirm the booking.</p>
    </body>
    </html>
    ";
    
    $adminEmailSent = sendEmail($config['admin_email'], $adminSubject, $adminMessage);
    
    // Send customer confirmation
    if ($adminEmailSent) {
        $customerSubject = 'Airport Taxi Booking Confirmed - TSM Travells';
        $customerMessage = "
        <html>
        <head>
            <title>Airport Taxi Booking Confirmed</title>
        </head>
        <body>
            <h2>Thank you for your airport transfer booking!</h2>
            <p>Dear {$data['contact_name']},</p>
            <p>We have received your request for airport taxi service on <strong>{$data['pickup_date']}</strong> at <strong>{$data['pickup_time']}</strong>.</p>
            <p><strong>Booking Details:</strong></p>
            <ul>
                <li>Service: {$data['service_name']}</li>
                <li>Service Type: {$data['pickup_type']}</li>
                <li>Pickup Date: {$data['pickup_date']}</li>
                <li>Pickup Time: {$data['pickup_time']}</li>
                <li>Vehicle: {$data['vehicle_type']}</li>
                <li>Passengers: {$data['passengers']}</li>
            </ul>
            <p>Our team will contact you within 2 hours to confirm your booking and provide driver details.</p>
            <p>If you have any urgent queries, please call us at +91 98765 43210.</p>
            <p>Best regards,<br>TSM Travells Team</p>
        </body>
        </html>
        ";
        
        sendEmail($data['contact_email'], $customerSubject, $customerMessage);
        
        return ['success' => true, 'message' => 'Thank you! Your airport taxi booking has been submitted. We will contact you soon to confirm.'];
    } else {
        return ['success' => false, 'errors' => ['Failed to process booking. Please try again or call us directly.']];
    }
}

// Process Wedding Car Booking
function processWeddingCarBooking($data) {
    $errors = [];
    
    // Validate required fields
    if (empty($data['wedding_date'])) $errors[] = 'Wedding date is required';
    if (empty($data['vehicle_type'])) $errors[] = 'Vehicle type is required';
    if (empty($data['service_package'])) $errors[] = 'Service package is required';
    if (empty($data['pickup_location'])) $errors[] = 'Pickup location is required';
    if (empty($data['wedding_venue'])) $errors[] = 'Wedding venue is required';
    if (empty($data['pickup_time'])) $errors[] = 'Pickup time is required';
    if (empty($data['contact_name'])) $errors[] = 'Contact name is required';
    if (empty($data['contact_phone'])) $errors[] = 'Contact phone is required';
    if (empty($data['contact_email'])) $errors[] = 'Contact email is required';
    
    // Validate phone format
    if (!empty($data['contact_phone']) && !validatePhone($data['contact_phone'])) {
        $errors[] = 'Invalid phone number (must be 10 digits)';
    }
    
    // Validate email format
    if (!empty($data['contact_email']) && !validateEmail($data['contact_email'])) {
        $errors[] = 'Invalid email format';
    }
    
    if (!empty($errors)) {
        return ['success' => false, 'errors' => $errors];
    }
    
    // Send admin notification
    $adminSubject = 'New Wedding Car Booking - TSM Travells';
    $adminMessage = "
    <html>
    <head>
        <title>New Wedding Car Booking</title>
    </head>
    <body>
        <h2>New Wedding Car Booking Request</h2>
        <p><strong>Service:</strong> {$data['service_name']}</p>
        <p><strong>Wedding Date:</strong> {$data['wedding_date']}</p>
        <p><strong>Vehicle Type:</strong> {$data['vehicle_type']}</p>
        <p><strong>Service Package:</strong> {$data['service_package']}</p>
        <p><strong>Pickup Location:</strong> {$data['pickup_location']}</p>
        <p><strong>Wedding Venue:</strong> {$data['wedding_venue']}</p>
        <p><strong>Pickup Time:</strong> {$data['pickup_time']}</p>
        <p><strong>Additional Locations:</strong> " . ($data['additional_locations'] ?: 'None') . "</p>
        <p><strong>Decoration Requests:</strong> " . ($data['decorations'] ?: 'None') . "</p>
        <p><strong>Contact Name:</strong> {$data['contact_name']}</p>
        <p><strong>Contact Phone:</strong> {$data['contact_phone']}</p>
        <p><strong>Contact Email:</strong> {$data['contact_email']}</p>
        <p><strong>Special Requests:</strong> " . ($data['special_requests'] ?: 'None') . "</p>
        <p>Please contact the customer to confirm the booking and discuss decoration details.</p>
    </body>
    </html>
    ";
    
    $adminEmailSent = sendEmail($config['admin_email'], $adminSubject, $adminMessage);
    
    // Send customer confirmation
    if ($adminEmailSent) {
        $customerSubject = 'Wedding Car Booking Confirmed - TSM Travells';
        $customerMessage = "
        <html>
        <head>
            <title>Wedding Car Booking Confirmed</title>
        </head>
        <body>
            <h2>Thank you for choosing TSM Travells for your special day!</h2>
            <p>Dear {$data['contact_name']},</p>
            <p>We have received your request for wedding car service on <strong>{$data['wedding_date']}</strong>.</p>
            <p><strong>Booking Details:</strong></p>
            <ul>
                <li>Service: {$data['service_name']}</li>
                <li>Wedding Date: {$data['wedding_date']}</li>
                <li>Vehicle: {$data['vehicle_type']}</li>
                <li>Package: {$data['service_package']}</li>
                <li>Pickup Time: {$data['pickup_time']}</li>
            </ul>
            <p>Our wedding car specialist will contact you within 24 hours to confirm your booking, discuss decoration preferences, and finalize all arrangements.</p>
            <p>If you have any urgent queries, please call us at +91 98765 43210.</p>
            <p>Best regards,<br>TSM Travells Team</p>
        </body>
        </html>
        ";
        
        sendEmail($data['contact_email'], $customerSubject, $customerMessage);
        
        return ['success' => true, 'message' => 'Thank you! Your wedding car booking has been submitted. Our specialist will contact you within 24 hours to confirm all details.'];
    } else {
        return ['success' => false, 'errors' => ['Failed to process booking. Please try again or call us directly.']];
    }
}

// Process Tempo Traveller Booking
function processTempoTravellerBooking($data) {
    $errors = [];
    
    // Validate required fields
    if (empty($data['trip_type'])) $errors[] = 'Trip type is required';
    if (empty($data['pickup_location'])) $errors[] = 'Pickup location is required';
    if (empty($data['destination'])) $errors[] = 'Destination is required';
    if (empty($data['start_date'])) $errors[] = 'Start date is required';
    if (empty($data['pickup_time'])) $errors[] = 'Pickup time is required';
    if (empty($data['passengers'])) $errors[] = 'Number of passengers is required';
    if (empty($data['vehicle_type'])) $errors[] = 'Vehicle type is required';
    if (empty($data['contact_name'])) $errors[] = 'Contact name is required';
    if (empty($data['contact_phone'])) $errors[] = 'Contact phone is required';
    if (empty($data['contact_email'])) $errors[] = 'Contact email is required';
    
    // Validate phone format
    if (!empty($data['contact_phone']) && !validatePhone($data['contact_phone'])) {
        $errors[] = 'Invalid phone number (must be 10 digits)';
    }
    
    // Validate email format
    if (!empty($data['contact_email']) && !validateEmail($data['contact_email'])) {
        $errors[] = 'Invalid email format';
    }
    
    if (!empty($errors)) {
        return ['success' => false, 'errors' => $errors];
    }
    
    // Send admin notification
    $adminSubject = 'New Tempo Traveller Booking - TSM Travells';
    $adminMessage = "
    <html>
    <head>
        <title>New Tempo Traveller Booking</title>
    </head>
    <body>
        <h2>New Tempo Traveller Booking Request</h2>
        <p><strong>Service:</strong> {$data['service_name']}</p>
        <p><strong>Trip Type:</strong> {$data['trip_type']}</p>
        <p><strong>Pickup Location:</strong> {$data['pickup_location']}</p>
        <p><strong>Destination:</strong> {$data['destination']}</p>
        <p><strong>Start Date:</strong> {$data['start_date']}</p>
        <p><strong>Return Date:</strong> " . ($data['end_date'] ?: 'Not specified') . "</p>
        <p><strong>Pickup Time:</strong> {$data['pickup_time']}</p>
        <p><strong>Passengers:</strong> {$data['passengers']}</p>
        <p><strong>Vehicle Type:</strong> {$data['vehicle_type']}</p>
        <p><strong>Contact Name:</strong> {$data['contact_name']}</p>
        <p><strong>Contact Phone:</strong> {$data['contact_phone']}</p>
        <p><strong>Contact Email:</strong> {$data['contact_email']}</p>
        <p><strong>Special Requests:</strong> " . ($data['special_requests'] ?: 'None') . "</p>
        <p>Please contact the customer to confirm the booking.</p>
    </body>
    </html>
    ";
    
    $adminEmailSent = sendEmail($config['admin_email'], $adminSubject, $adminMessage);
    
    // Send customer confirmation
    if ($adminEmailSent) {
        $customerSubject = 'Tempo Traveller Booking Confirmed - TSM Travells';
        $customerMessage = "
        <html>
        <head>
            <title>Tempo Traveller Booking Confirmed</title>
        </head>
        <body>
            <h2>Thank you for your Tempo Traveller booking!</h2>
            <p>Dear {$data['contact_name']},</p>
            <p>We have received your request for Tempo Traveller service from <strong>{$data['pickup_location']}</strong> to <strong>{$data['destination']}</strong>.</p>
            <p><strong>Booking Details:</strong></p>
            <ul>
                <li>Service: {$data['service_name']}</li>
                <li>Trip Type: {$data['trip_type']}</li>
                <li>Start Date: {$data['start_date']}</li>
                <li>Pickup Time: {$data['pickup_time']}</li>
                <li>Vehicle: {$data['vehicle_type']}</li>
                <li>Passengers: {$data['passengers']}</li>
            </ul>
            <p>Our team will contact you within 2 hours to confirm your booking and discuss final arrangements.</p>
            <p>If you have any urgent queries, please call us at +91 98765 43210.</p>
            <p>Best regards,<br>TSM Travells Team</p>
        </body>
        </html>
        ";
        
        sendEmail($data['contact_email'], $customerSubject, $customerMessage);
        
        return ['success' => true, 'message' => 'Thank you! Your Tempo Traveller booking has been submitted. We will contact you soon to confirm.'];
    } else {
        return ['success' => false, 'errors' => ['Failed to process booking. Please try again or call us directly.']];
    }
}

// Main processing logic
try {
    $response = ['success' => false, 'message' => '', 'errors' => []];
    
    // Get form type
    $formType = $_POST['form_type'] ?? '';
    
    // Validate CSRF token
    if (!validateCSRFToken($_POST['csrf_token'] ?? '')) {
        $response['errors'][] = 'Invalid security token. Please refresh the page and try again.';
    } else {
        switch ($formType) {
            case 'contact':
                $response = processContactForm($_POST);
                break;
                
            case 'newsletter':
                $response = processNewsletterSubscription($_POST);
                break;
                
            case 'outstation_booking':
                $response = processOutstationBooking($_POST);
                break;
                
            case 'airport_booking':
                $response = processAirportBooking($_POST);
                break;
                
            case 'wedding_car_booking':
                $response = processWeddingCarBooking($_POST);
                break;
                
            case 'tempo_traveller_booking':
                $response = processTempoTravellerBooking($_POST);
                break;
                
            default:
                $response['errors'][] = 'Invalid form type.';
        }
    }
    
} catch (Exception $e) {
    $response = [
        'success' => false,
        'errors' => ['An unexpected error occurred. Please try again later.']
    ];
    
    // Log error for debugging (remove in production)
    error_log('Form processing error: ' . $e->getMessage());
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
exit;
?>
