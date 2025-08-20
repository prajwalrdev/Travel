<?php
/*
 * Template Name: Mini Bus Service
 */
get_header(); ?>

<style>
.service-hero {
    background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?php echo get_template_directory_uri(); ?>/images/hero-bg.jpg');
    background-size: cover;
    background-position: center;
    padding: 120px 0;
    color: white;
    text-align: center;
}

.service-details {
    padding: 80px 0;
}

.service-content {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 40px;
    margin-bottom: 50px;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin: 40px 0;
}

.feature-item {
    background: #f8f9fa;
    padding: 30px;
    border-radius: 10px;
    text-align: center;
}

.feature-item i {
    font-size: 2.5rem;
    color: #FF5252;
    margin-bottom: 15px;
}

.booking-sidebar {
    background: #f8f9fa;
    padding: 30px;
    border-radius: 10px;
    height: fit-content;
}

.booking-form input,
.booking-form select,
.booking-form textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.btn-primary {
    background: #FF5252;
    color: white;
    padding: 12px 30px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
}

@media (max-width: 768px) {
    .service-content {
        grid-template-columns: 1fr;
    }
}
</style>

<!-- Service Hero Section -->
<section class="service-hero">
    <div class="container">
        <h1>Mini Bus Service</h1>
        <p>Comfortable group transportation for events, tours, and outings</p>
    </div>
</section>

<!-- Service Details -->
<section class="service-details">
    <div class="container">
        <div class="service-content">
            <div class="main-content">
                <h2>Mini Bus Rental Services</h2>
                <p>Our mini bus service is perfect for group transportation needs. Whether you're planning a corporate event, family outing, school trip, or wedding celebration, our 22-seater mini buses provide comfortable and safe transportation for medium-sized groups.</p>
                
                <div class="features-grid">
                    <div class="feature-item">
                        <i class="fas fa-users"></i>
                        <h3>22 Passenger Capacity</h3>
                        <p>Spacious seating for up to 22 passengers with comfortable interiors</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-shield-alt"></i>
                        <h3>Safety First</h3>
                        <p>All vehicles are regularly maintained and safety inspected</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-clock"></i>
                        <h3>Flexible Timing</h3>
                        <p>Available for hourly, daily, or multi-day rentals</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-route"></i>
                        <h3>Long Distance</h3>
                        <p>Perfect for outstation trips and multi-city tours</p>
                    </div>
                </div>

                <h3>Service Areas</h3>
                <p>Our mini bus service covers:</p>
                <ul>
                    <li>Mangalore to Udupi and surrounding areas</li>
                    <li>Mangalore to Coorg hill station</li>
                    <li>Local sightseeing and city tours</li>
                    <li>Airport and railway station transfers</li>
                    <li>Wedding and event transportation</li>
                    <li>Corporate group transportation</li>
                </ul>
            </div>

            <div class="booking-sidebar">
                <h3>Book Mini Bus Service</h3>
                <form class="booking-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <input type="hidden" name="action" value="service_booking">
                    <?php wp_nonce_field('travelease_service_booking', 'travelease_booking_nonce'); ?>
                    <input type="hidden" name="service_name" value="Mini Bus">
                    <input type="hidden" name="service_type" value="Mini Bus">
                    
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email" placeholder="Email Address" required>
                    <input type="tel" name="phone" placeholder="Phone Number" required>
                    
                    <input type="text" name="pickup_location" placeholder="Pickup Location" required>
                    <input type="text" name="drop_location" placeholder="Drop Location" required>
                    
                    <input type="date" name="pickup_date" required>
                    <input type="time" name="pickup_time" required>
                    
                    <select name="trip_type" required>
                        <option value="">Select Trip Type</option>
                        <option value="local">Local Trip</option>
                        <option value="outstation">Outstation Trip</option>
                        <option value="round_trip">Round Trip</option>
                    </select>
                    
                    <textarea name="message" placeholder="Additional Requirements" rows="3"></textarea>
                    
                    <button type="submit" class="btn-primary">Book Now</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>