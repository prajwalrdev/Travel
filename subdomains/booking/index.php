<?php
/**
 * Template Name: Booking Portal
 * 
 * This is a custom template for the Booking subdomain page
 */

get_header(); ?>

<style>
.booking-hero {
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo get_template_directory_uri(); ?>/images/booking-bg.jpg');
    background-size: cover;
    background-position: center;
    padding: 100px 0 50px;
    color: #fff;
    text-align: center;
}

.booking-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 50px 20px;
}

.booking-form-container {
    background: #fff;
    border-radius: 10px;
    padding: 40px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    margin: 0 auto;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #333;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

.form-group textarea {
    resize: vertical;
    min-height: 100px;
}

.booking-form button {
    width: 100%;
    padding: 15px;
    background: var(--primary-color);
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s ease;
    margin-top: 20px;
}

.booking-form button:hover {
    background: var(--primary-dark);
}
</style>

<!-- Hero Section -->
<section class="booking-hero">
    <div class="container">
        <h1>Book Your Travel Service</h1>
        <p>Choose from our range of travel services and book your next adventure</p>
    </div>
</section>

<!-- Booking Portal -->
<section class="booking-container">
    <div class="booking-form-container">
        <h3>Quick Booking Form</h3>
        
        <form class="booking-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
            <input type="hidden" name="action" value="book_travel_service">
            <?php wp_nonce_field('book_travel_nonce', 'travel_nonce'); ?>
            
            <div class="form-group">
                <label for="service_type">Service Type</label>
                <select name="service_type" id="service_type" required>
                    <option value="">Select Service</option>
                    <option value="airport_taxi">Airport Taxi</option>
                    <option value="city_tour">City Tour</option>
                    <option value="hotel_transfer">Hotel Transfer</option>
                    <option value="charter">Charter Service</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="pickup_date">Pickup Date</label>
                <input type="date" name="pickup_date" id="pickup_date" required>
            </div>
            
            <div class="form-group">
                <label for="pickup_time">Pickup Time</label>
                <input type="time" name="pickup_time" id="pickup_time" required>
            </div>
            
            <div class="form-group">
                <label for="pickup_location">Pickup Location</label>
                <textarea name="pickup_location" id="pickup_location" rows="3" placeholder="Enter pickup address" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="dropoff_location">Drop-off Location</label>
                <textarea name="dropoff_location" id="dropoff_location" rows="3" placeholder="Enter drop-off address" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="passengers">Number of Passengers</label>
                <select name="passengers" id="passengers" required>
                    <option value="">Select</option>
                    <option value="1">1 Passenger</option>
                    <option value="2">2 Passengers</option>
                    <option value="3">3 Passengers</option>
                    <option value="4">4 Passengers</option>
                    <option value="5">5 Passengers</option>
                    <option value="6">6+ Passengers</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="contact_name">Contact Name</label>
                <input type="text" name="contact_name" id="contact_name" required>
            </div>
            
            <div class="form-group">
                <label for="contact_phone">Contact Phone</label>
                <input type="tel" name="contact_phone" id="contact_phone" required>
            </div>
            
            <div class="form-group">
                <label for="contact_email">Contact Email</label>
                <input type="email" name="contact_email" id="contact_email" required>
            </div>
            
            <div class="form-group">
                <label for="special_requests">Special Requests</label>
                <textarea name="special_requests" id="special_requests" rows="3" placeholder="Any special requests or notes"></textarea>
            </div>
            
            <button type="submit">Book Now</button>
        </form>
    </div>
</section>

<?php get_footer(); ?>
