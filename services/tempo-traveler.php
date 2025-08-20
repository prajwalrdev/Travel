<?php
/*
 * Template Name: Tempo Traveler Service
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
        <h1>Tempo Traveler Service</h1>
        <p>Perfect for group tours and comfortable outstation journeys</p>
    </div>
</section>

<!-- Service Details -->
<section class="service-details">
    <div class="container">
        <div class="service-content">
            <div class="main-content">
                <h2>12 Seater Tempo Traveler Rental</h2>
                <p>Our Tempo Traveler service is ideal for small to medium group travel. With comfortable seating for 12 passengers, air conditioning, and ample luggage space, it's perfect for family trips, corporate outings, pilgrimage tours, and group adventures.</p>
                
                <div class="features-grid">
                    <div class="feature-item">
                        <i class="fas fa-users"></i>
                        <h3>12 Passenger Seating</h3>
                        <p>Comfortable push-back seats with individual reading lights</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-snowflake"></i>
                        <h3>Air Conditioned</h3>
                        <p>Fully air-conditioned for comfortable travel in any weather</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-suitcase"></i>
                        <h3>Large Luggage Space</h3>
                        <p>Spacious luggage compartment for all your travel needs</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-map-marked-alt"></i>
                        <h3>Long Distance Travel</h3>
                        <p>Perfect for outstation and multi-city tour packages</p>
                    </div>
                </div>

                <h3>Popular Routes</h3>
                <p>Our Tempo Traveler service covers popular destinations including:</p>
                <ul>
                    <li>Mangalore to Ooty hill station tour</li>
                    <li>Mangalore to Waynad nature tour</li>
                    <li>Mangalore to Coorg coffee plantation visit</li>
                    <li>Temple tour packages to Udupi, Dharmasthala</li>
                    <li>Bekal beach and fort sightseeing</li>
                    <li>Multi-day Karnataka temple circuit</li>
                </ul>

                <h3>Why Choose Our Tempo Traveler?</h3>
                <ul>
                    <li>Experienced and professional drivers</li>
                    <li>Well-maintained and clean vehicles</li>
                    <li>Competitive pricing with no hidden costs</li>
                    <li>Flexible itinerary planning</li>
                    <li>24/7 customer support</li>
                </ul>
            </div>

            <div class="booking-sidebar">
                <h3>Book Tempo Traveler</h3>
                <form class="booking-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <input type="hidden" name="action" value="service_booking">
                    <?php wp_nonce_field('travelease_service_booking', 'travelease_booking_nonce'); ?>
                    <input type="hidden" name="service_name" value="Tempo Traveler">
                    <input type="hidden" name="service_type" value="Tempo Traveler">
                    
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email" placeholder="Email Address" required>
                    <input type="tel" name="phone" placeholder="Phone Number" required>
                    
                    <input type="text" name="pickup_location" placeholder="Pickup Location" required>
                    <input type="text" name="destination" placeholder="Destination" required>
                    
                    <input type="date" name="travel_date" required>
                    <input type="time" name="pickup_time" required>
                    
                    <select name="tour_type" required>
                        <option value="">Select Tour Type</option>
                        <option value="day_trip">Day Trip</option>
                        <option value="2_days">2 Days 1 Night</option>
                        <option value="3_days">3 Days 2 Nights</option>
                        <option value="custom">Custom Package</option>
                    </select>
                    
                    <input type="number" name="passengers" placeholder="Number of Passengers" min="1" max="12" required>
                    
                    <textarea name="special_requirements" placeholder="Special Requirements" rows="3"></textarea>
                    
                    <button type="submit" class="btn-primary">Book Now</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>