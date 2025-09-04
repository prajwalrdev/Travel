<?php
/**
 * TSM Travells Backend Configuration
 * 
 * This file contains all the configuration settings for the backend functionality.
 * Update these values according to your business requirements.
 */

// Database Configuration (Optional - for advanced features)
define('DB_HOST', 'localhost');
define('DB_NAME', 'tsm_travells');
define('DB_USER', 'your_db_username');
define('DB_PASS', 'your_db_password');

// Email Configuration
define('ADMIN_EMAIL', 'mangaloretaxicabservices@gmail.com');
define('ADMIN_NAME', 'TSM Travells');
define('ADMIN_PHONE', '+91 8861505754');

// SMTP Configuration (for better email delivery)
define('SMTP_HOST', 'localhost'); // Change to your SMTP server (e.g., smtp.gmail.com)
define('SMTP_PORT', 587);
define('SMTP_USERNAME', ''); // Add your SMTP username
define('SMTP_PASSWORD', ''); // Add your SMTP password
define('SMTP_ENCRYPTION', 'tls'); // tls or ssl

// Business Information
define('COMPANY_NAME', 'TSM Travells');
define('COMPANY_ADDRESS', 'Ground Floor, GHS Opposite Tara clinic, Hampankatta Mangalore 575001');
define('COMPANY_PHONE', '+91 8861505754');
define('COMPANY_EMAIL', 'mangaloretaxicabservices@gmail.com');
define('COMPANY_WEBSITE', 'https://tsmtravells.com');

// Service Areas (for dynamic content)
$SERVICE_AREAS = [
    'central' => [
        'Hampankatta',
        'Kankanady', 
        'Bejai',
        'Kadri',
        'Urwa'
    ],
    'commercial' => [
        'Mangalore Central',
        'State Bank',
        'Bendoor',
        'Attavar',
        'Kodialbail'
    ],
    'residential' => [
        'Surathkal',
        'NITK Campus',
        'Padil',
        'Jeppu',
        'Kottara'
    ],
    'educational' => [
        'Mangalore University',
        'St. Aloysius College',
        'St. Agnes College',
        'Canara College',
        'SDM College'
    ]
];

// Pricing Information
$PRICING = [
    'city_taxi' => [
        'per_km' => 15,
        'minimum_fare' => 50,
        'airport_pickup' => 100
    ],
    'outstation' => [
        'per_km' => 12,
        'minimum_fare' => 200,
        'driver_allowance' => 300
    ],
    'airport_transfer' => [
        'base_fare' => 150,
        'per_km' => 18,
        'waiting_charge' => 50
    ]
];

// Features and Benefits
$SERVICE_FEATURES = [
    'city_taxi' => [
        '24/7 Availability',
        'Full City Coverage',
        'Well-Maintained Vehicles',
        'Professional Drivers',
        'Transparent Pricing',
        'Safe Travel'
    ],
    'outstation' => [
        'Long Distance Travel',
        'Multiple Destinations',
        'Comfortable Vehicles',
        'Experienced Drivers',
        'Route Knowledge',
        'Flexible Scheduling'
    ],
    'airport_transfer' => [
        'Punctual Service',
        'Flight Tracking',
        'Meet & Greet',
        'Luggage Assistance',
        'Professional Service',
        '24/7 Availability'
    ]
];

// FAQ Content
$FAQ_CONTENT = [
    'city_taxi' => [
        [
            'question' => 'How far in advance should I book a city taxi?',
            'answer' => 'For city taxi service, you can book as early as you want or even call us at the last minute. We usually have vehicles available for immediate pickup. However, for early morning or late night rides, we recommend booking at least 2-3 hours in advance.'
        ],
        [
            'question' => 'What is the minimum fare for city taxi service?',
            'answer' => 'The minimum fare for our city taxi service is ₹50, which covers the first 3 kilometers. After that, it\'s ₹15 per kilometer. Additional charges may apply for waiting time or late-night rides.'
        ]
    ]
];

// Social Media Links
$SOCIAL_LINKS = [
    'facebook' => 'https://facebook.com/tsmtravells',
    'twitter' => 'https://twitter.com/tsmtravells',
    'instagram' => 'https://instagram.com/tsmtravells',
    'linkedin' => 'https://linkedin.com/company/tsmtravells',
    'whatsapp' => 'https://wa.me/918861505754'
];

// Business Hours
$BUSINESS_HOURS = [
    'office' => '9:00 AM - 6:00 PM',
    'service' => '24/7 Available',
    'support' => '24/7 Available'
];

// Payment Methods
$PAYMENT_METHODS = [
    'Cash',
    'UPI Transfer',
    'Digital Wallets',
    'Bank Transfer',
    'Monthly Billing (Corporate)'
];

// Vehicle Types
$VEHICLE_TYPES = [
    'sedan' => [
        'name' => 'Sedan',
        'capacity' => '4 Passengers',
        'luggage' => '2 Bags',
        'description' => 'Comfortable sedan cars for city and outstation travel'
    ],
    'ertiga' => [
        'name' => 'Ertiga',
        'capacity' => '6 Passengers',
        'luggage' => '4 Bags',
        'description' => 'Spacious and economical for group travel'
    ],
    'innova' => [
        'name' => 'Innova Crysta',
        'capacity' => '7 Passengers',
        'luggage' => '5 Bags',
        'description' => 'Premium SUV for comfortable family travel'
    ],
    'tempo' => [
        'name' => 'Tempo Traveler',
        'capacity' => '12 Passengers',
        'luggage' => '8 Bags',
        'description' => 'Perfect for group tours and outstation trips'
    ],
    'mini_bus' => [
        'name' => 'Mini Bus',
        'capacity' => '22 Passengers',
        'luggage' => '12 Bags',
        'description' => 'Ideal for medium group transportation'
    ]
];

// Error Messages
$ERROR_MESSAGES = [
    'required_field' => 'This field is required',
    'invalid_email' => 'Please enter a valid email address',
    'invalid_phone' => 'Please enter a valid 10-digit phone number',
    'network_error' => 'Network error. Please try again.',
    'form_submission_failed' => 'Failed to submit form. Please try again or call us directly.'
];

// Success Messages
$SUCCESS_MESSAGES = [
    'contact_form' => 'Thank you! We will contact you soon.',
    'newsletter_subscription' => 'Successfully subscribed to newsletter!',
    'booking_request' => 'Thank you! Your booking request has been submitted. We will contact you shortly to confirm.'
];

// Security Settings
define('CSRF_TOKEN_EXPIRY', 3600); // 1 hour
define('MAX_LOGIN_ATTEMPTS', 5);
define('LOGIN_TIMEOUT', 900); // 15 minutes

// File Upload Settings (if needed)
define('MAX_FILE_SIZE', 5 * 1024 * 1024); // 5MB
define('ALLOWED_FILE_TYPES', ['jpg', 'jpeg', 'png', 'pdf']);

// API Settings (for future integrations)
define('API_VERSION', 'v1');
define('API_RATE_LIMIT', 100); // requests per hour
define('API_KEY_REQUIRED', false);

// Debug Mode (set to false in production)
define('DEBUG_MODE', true);

// Logging Settings
define('LOG_ERRORS', true);
define('LOG_FILE', 'logs/error.log');

// Cache Settings
define('ENABLE_CACHE', false);
define('CACHE_DURATION', 3600); // 1 hour

// Notification Settings
define('SEND_EMAIL_NOTIFICATIONS', true);
define('SEND_SMS_NOTIFICATIONS', false);
define('SEND_WHATSAPP_NOTIFICATIONS', false);

// WhatsApp Business API (if available)
define('WHATSAPP_API_KEY', '');
define('WHATSAPP_PHONE_NUMBER', '918861505754');

// SMS Gateway (if available)
define('SMS_API_KEY', '');
define('SMS_SENDER_ID', 'TSMTRAV');

// Google Analytics (if needed)
define('GOOGLE_ANALYTICS_ID', '');

// Facebook Pixel (if needed)
define('FACEBOOK_PIXEL_ID', '');

// Custom CSS/JS (for theme customization)
define('CUSTOM_CSS_FILE', 'assets/css/custom.css');
define('CUSTOM_JS_FILE', 'assets/js/custom.js');

// Backup Settings
define('AUTO_BACKUP', false);
define('BACKUP_FREQUENCY', 'daily'); // daily, weekly, monthly
define('BACKUP_RETENTION', 30); // days

// Maintenance Mode
define('MAINTENANCE_MODE', false);
define('MAINTENANCE_MESSAGE', 'We are currently performing maintenance. Please check back soon.');

// Performance Settings
define('ENABLE_COMPRESSION', true);
define('ENABLE_MINIFICATION', false);
define('ENABLE_CDN', false);

// SEO Settings
define('DEFAULT_META_TITLE', 'TSM Travells - Best Cab Services in Mangalore');
define('DEFAULT_META_DESCRIPTION', 'Professional cab services in Mangalore. City taxi, outstation, airport transfer, wedding cars, and more. Book now for reliable and comfortable travel.');
define('DEFAULT_META_KEYWORDS', 'cab service mangalore, taxi service mangalore, airport taxi, city taxi, outstation taxi, wedding cars');

// Contact Form Settings
define('CONTACT_FORM_EMAIL_SUBJECT', 'New Contact Form Submission - TSM Travells');
define('CONTACT_FORM_CUSTOMER_SUBJECT', 'Thank you for contacting TSM Travells');
define('NEWSLETTER_SUBJECT', 'Newsletter Subscription Confirmed - TSM Travells');

// Booking Form Settings
define('BOOKING_CONFIRMATION_EMAIL', true);
define('BOOKING_REMINDER_EMAIL', true);
define('BOOKING_CANCELLATION_EMAIL', true);

// Customer Support Settings
define('SUPPORT_PHONE', '+91 8861505754');
define('SUPPORT_EMAIL', 'support@tsmtravells.com');
define('SUPPORT_WHATSAPP', '+91 8861505754');
define('SUPPORT_HOURS', '24/7');

// Emergency Contact
define('EMERGENCY_PHONE', '+91 8861505754');
define('EMERGENCY_EMAIL', 'emergency@tsmtravells.com');

// Quality Assurance
define('DRIVER_VERIFICATION', true);
define('VEHICLE_INSPECTION', true);
define('INSURANCE_COVERAGE', true);
define('GPS_TRACKING', true);

// Loyalty Program (if implemented)
define('LOYALTY_PROGRAM_ENABLED', false);
define('LOYALTY_POINTS_PER_RIDE', 10);
define('LOYALTY_DISCOUNT_PERCENTAGE', 5);

// Corporate Services
define('CORPORATE_ACCOUNT_ENABLED', true);
define('CORPORATE_BILLING_CYCLE', 'monthly');
define('CORPORATE_DISCOUNT_PERCENTAGE', 10);

// International Services (if applicable)
define('INTERNATIONAL_SERVICES_ENABLED', false);
define('SUPPORTED_CURRENCIES', ['INR']);
define('MULTILINGUAL_SUPPORT', false);

// Accessibility
define('ENABLE_SCREEN_READER', true);
define('ENABLE_KEYBOARD_NAVIGATION', true);
define('ENABLE_HIGH_CONTRAST', false);

// GDPR Compliance (if applicable)
define('GDPR_COMPLIANCE_ENABLED', false);
define('COOKIE_CONSENT_REQUIRED', false);
define('DATA_RETENTION_PERIOD', 365); // days

// Third-party Integrations
define('GOOGLE_MAPS_API_KEY', '');
define('PAYMENT_GATEWAY_ENABLED', false);
define('PAYMENT_GATEWAY_NAME', ''); // Razorpay, PayU, etc.
define('PAYMENT_GATEWAY_KEY', '');
define('PAYMENT_GATEWAY_SECRET', '');
