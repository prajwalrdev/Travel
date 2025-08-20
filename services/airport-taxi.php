<?php
/**
 * Template Name: Airport Taxi Service
 * 
 * This is a custom template for the Airport Taxi Service page
 */

get_header(); ?>

<style>
/* Service Page Specific Styles */
.service-hero {
    height: 50vh;
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo get_template_directory_uri(); ?>/images/hero-bg.jpg') no-repeat center center/cover;
    display: flex;
    align-items: center;
    text-align: center;
    color: #fff;
    padding-top: 80px;
}

.service-details {
    padding: 80px 0;
}

.service-details-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 50px;
    align-items: start;
}

.service-content h2 {
    font-size: 2.2rem;
    margin-bottom: 20px;
    color: var(--dark-color);
}

.service-content p {
    margin-bottom: 20px;
    color: var(--gray-color);
    line-height: 1.8;
}

.service-features {
    margin: 30px 0;
}

.service-features h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
    color: var(--dark-color);
}

.feature-list {
    list-style: none;
}

.feature-list li {
    margin-bottom: 10px;
    padding-left: 30px;
    position: relative;
}

.feature-list li:before {
    content: '\f00c';
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    position: absolute;
    left: 0;
    color: var(--primary-color);
}

.service-sidebar {
    background-color: var(--light-color);
    padding: 30px;
    border-radius: 10px;
    position: sticky;
    top: 100px;
}

.service-sidebar h3 {
    font-size: 1.5rem;
    margin-bottom: 20px;
    color: var(--dark-color);
}

.booking-form .form-group {
    margin-bottom: 15px;
}

.booking-form label {
    display: block;
    margin-bottom: 5px;
    font-weight: 500;
}

.booking-form input,
.booking-form select,
.booking-form textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
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
}

.booking-form button:hover {
    background: var(--primary-dark);
}

@media (max-width: 768px) {
    .service-details-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .service-hero {
        height: 40vh;
        padding-top: 60px;
    }
}
</style>

<!-- Hero Section -->
<section class="service-hero">
    <div class="container">
        <h1>Airport Taxi Service</h1>
        <p>Reliable and comfortable airport transfers to and from all major airports</p>
    </div>
</section>

<!-- Service Details -->
<section class="service-details">
    <div class="container">
        <div class="service-details-grid">
            <div class="service-content">
                <h2>Professional Airport Taxi Service</h2>
                <p>Experience hassle-free airport transfers with our professional taxi service. We provide reliable, comfortable, and timely transportation to and from all major airports in the region.</p>
                
                <div class="service-features">
                    <h3>Why Choose Our Airport Taxi Service?</h3>
                    <ul class="feature-list">
                        <li>24/7 availability for all flights</li>
                        <li>Professional and experienced drivers</li>
                        <li>Clean and well-maintained vehicles</li>
                        <li>Fixed pricing with no hidden charges</li>
                        <li>Flight monitoring for timely pickups</li>
                        <li>Meet and greet service at arrivals</li>
                        <li>Luggage assistance included</li>
                        <li>Child seats available on request</li>
                    </ul>
                </div>
                
                <div class="service-features">
                    <h3>Our Fleet</h3>
                    <p>We offer a variety of vehicles to suit your needs:</p>
                    <ul class="feature-list">
                        <li><strong>Economy Sedan:</strong> Perfect for 1-3 passengers with luggage</li>
                        <li><strong>SUV:</strong> Ideal for families and groups of 4-6 passengers</li>
                        <li><strong>Luxury Vehicle:</strong> Premium service for business travelers</li>
                        <li><strong>Minivan:</strong> Spacious option for larger groups</li>
                    </ul>
                </div>
                
                <div class="service-features">
                    <h3>Service Areas</h3>
                    <p>We provide airport taxi services to and from:</p>
                    <ul class="feature-list">
                        <li>International Airport (IAH)</li>
                        <li>Domestic Airport (HOU)</li>
                        <li>Regional Airports</li>
                        <li>Private Airports</li>
                    </ul>
                </div>
            </div>
            
            <div class="service-sidebar">
                <h3>Book Your Airport Transfer</h3>
                <form class="booking-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <input type="hidden" name="action" value="service_booking">
                    <?php wp_nonce_field('travelease_service_booking', 'travelease_booking_nonce'); ?>
                    <input type="hidden" name="service_name" value="Airport Taxi">
                    <div class="form-group">
                        <label for="pickup_type">Service Type</label>
                        <select name="pickup_type" id="pickup_type" required>
                            <option value="">Select Service</option>
                            <option value="airport_pickup">Airport Pickup</option>
                            <option value="airport_drop">Airport Drop</option>
                            <option value="round_trip">Round Trip</option>
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
                        <label for="vehicle_type">Vehicle Type</label>
                        <select name="vehicle_type" id="vehicle_type" required>
                            <option value="">Select Vehicle</option>
                            <option value="sedan">Economy Sedan</option>
                            <option value="suv">SUV</option>
                            <option value="luxury">Luxury Vehicle</option>
                            <option value="minivan">Minivan</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="pickup_address">Pickup Address</label>
                        <textarea name="pickup_address" id="pickup_address" rows="3" placeholder="Enter pickup address" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="dropoff_address">Drop-off Address</label>
                        <textarea name="dropoff_address" id="dropoff_address" rows="3" placeholder="Enter drop-off address" required></textarea>
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
        </div>
    </div>
</section>

<?php get_footer(); ?>
