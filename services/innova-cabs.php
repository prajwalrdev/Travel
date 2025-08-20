<?php
/*
 * Template Name: Innova Cabs Service
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
    color: #007bff;
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
    background: #007bff;
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
        <h1>Innova Cabs | Innova Crysta</h1>
        <p>Premium SUVs for comfortable family and group travel</p>
    </div>
</section>

<!-- Service Details -->
<section class="service-details">
    <div class="container">
        <div class="service-content">
            <div class="main-content">
                <h2>Innova and Innova Crysta Cab Service</h2>
                <p>Experience luxury and comfort with our premium Innova and Innova Crysta cab service. Perfect for family trips, group outings, and corporate travel, these spacious SUVs offer superior comfort, safety, and style for both city rides and long-distance journeys.</p>
                
                <div class="features-grid">
                    <div class="feature-item">
                        <i class="fas fa-users"></i>
                        <h3>6-7 Seater Capacity</h3>
                        <p>Spacious seating for families and small groups</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-star"></i>
                        <h3>Premium Comfort</h3>
                        <p>Luxurious interiors with leather seats and ample legroom</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-shield-alt"></i>
                        <h3>Safety Features</h3>
                        <p>Advanced safety features including airbags and ABS</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-snowflake"></i>
                        <h3>Climate Control</h3>
                        <p>Dual-zone automatic climate control for optimal comfort</p>
                    </div>
                </div>

                <h3>Vehicle Variants</h3>
                <div style="margin: 20px 0;">
                    <h4>Toyota Innova (6 Seater)</h4>
                    <ul>
                        <li>Reliable and fuel-efficient</li>
                        <li>Perfect for outstation trips</li>
                        <li>Comfortable seating arrangement</li>
                        <li>Large luggage capacity</li>
                    </ul>
                    
                    <h4>Toyota Innova Crysta (7 Seater)</h4>
                    <ul>
                        <li>Premium luxury variant</li>
                        <li>Enhanced comfort features</li>
                        <li>Modern infotainment system</li>
                        <li>Superior ride quality</li>
                    </ul>
                </div>

                <h3>Popular Routes</h3>
                <ul>
                    <li>Mangalore to Udupi taxi service</li>
                    <li>Mangalore to Waynad taxi</li>
                    <li>Mangalore to Ooty taxi</li>
                    <li>Airport transfers to/from Mangalore</li>
                    <li>Local city rides and sightseeing</li>
                    <li>Wedding car rentals</li>
                </ul>
            </div>

            <div class="booking-sidebar">
                <h3>Book Innova Cab</h3>
                <form class="booking-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <input type="hidden" name="action" value="service_booking">
                    <?php wp_nonce_field('travelease_service_booking', 'travelease_booking_nonce'); ?>
                    <input type="hidden" name="service_name" value="Innova Cab">
                    <input type="hidden" name="service_type" value="Innova Cab">
                    
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email" placeholder="Email Address" required>
                    <input type="tel" name="phone" placeholder="Phone Number" required>
                    
                    <select name="vehicle_type" required>
                        <option value="">Select Vehicle</option>
                        <option value="innova">Toyota Innova (6 Seater)</option>
                        <option value="innova_crysta">Toyota Innova Crysta (7 Seater)</option>
                    </select>
                    
                    <input type="text" name="pickup_location" placeholder="Pickup Location" required>
                    <input type="text" name="drop_location" placeholder="Drop Location" required>
                    
                    <input type="date" name="pickup_date" required>
                    <input type="time" name="pickup_time" required>
                    
                    <select name="trip_type" required>
                        <option value="">Select Trip Type</option>
                        <option value="local">Local (Within City)</option>
                        <option value="outstation">Outstation</option>
                        <option value="airport">Airport Transfer</option>
                        <option value="wedding">Wedding Car</option>
                    </select>
                    
                    <input type="number" name="passengers" placeholder="Number of Passengers" min="1" max="7" required>
                    
                    <textarea name="message" placeholder="Additional Requirements" rows="3"></textarea>
                    
                    <button type="submit" class="btn-primary">Book Now</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>