<?php
/*
 * Template Name: Outstation Taxi Service
 */
get_header(); ?>
<style>
.service-hero {
    background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?php echo get_template_directory_uri(); ?>/images/hero-bg.jpg');
    background-size: cover;
    background-position: center;
    padding: 100px 0 60px;
    color: #fff;
    text-align: center;
}
.service-details {
    padding: 60px 0;
}
.service-content {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 40px;
    margin-bottom: 40px;
}
.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 25px;
    margin: 30px 0;
}
.feature-item {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}
.feature-item i {
    font-size: 2rem;
    color: var(--primary-color, #007bff);
    margin-bottom: 10px;
}
.booking-sidebar {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 10px;
    position: sticky;
    top: 90px;
    height: fit-content;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}
.booking-form input,
.booking-form select,
.booking-form textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 12px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 1rem;
}
.booking-form button {
    width: 100%;
    padding: 12px;
    background: var(--primary-color, #007bff);
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.2s;
}
.booking-form button:hover {
    background: #0056b3;
}
@media (max-width: 900px) {
    .service-content {
        grid-template-columns: 1fr;
    }
    .booking-sidebar {
        position: static;
        margin-top: 30px;
    }
}
</style>
<section class="service-hero">
    <div class="container">
        <h1>Outstation Taxi</h1>
        <p>Comfortable and safe long-distance travel</p>
    </div>
</section>
<section class="service-details">
    <div class="container">
        <div class="service-content">
            <div class="main-content">
                <h2>Outstation Trips</h2>
                <p>Plan day trips or multi-day travels to nearby cities and tourist spots. Our outstation taxi service offers reliable, comfortable, and affordable rides for your journeys beyond the city.</p>
                <div class="features-grid">
                    <div class="feature-item">
                        <i class="fas fa-road"></i>
                        <h3>Flexible Routes</h3>
                        <p>Choose your own destinations and stops.</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-calendar-alt"></i>
                        <h3>Multi-day Options</h3>
                        <p>Book for single or multiple days as needed.</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-car"></i>
                        <h3>Comfortable Cars</h3>
                        <p>Spacious, clean, and well-maintained vehicles.</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-user-shield"></i>
                        <h3>Experienced Drivers</h3>
                        <p>Safe, courteous, and knowledgeable about routes.</p>
                    </div>
                </div>
            </div>
            <div class="booking-sidebar">
                <h3>Book Outstation Taxi</h3>
                <form class="booking-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <input type="hidden" name="action" value="service_booking">
                    <?php wp_nonce_field('travelease_service_booking', 'travelease_booking_nonce'); ?>
                    <input type="hidden" name="service_name" value="Outstation Taxi">
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="tel" name="phone" placeholder="Phone Number" required>
                    <input type="email" name="email" placeholder="Email Address">
                    <input type="text" name="pickup_location" placeholder="Pickup Location" required>
                    <input type="text" name="destination" placeholder="Destination" required>
                    <input type="date" name="start_date" required>
                    <input type="date" name="end_date">
                    <select name="trip_type" required>
                        <option value="">Trip Type</option>
                        <option value="one_way">One Way</option>
                        <option value="round_trip">Round Trip</option>
                    </select>
                    <select name="vehicle_type">
                        <option value="">Vehicle Type (Optional)</option>
                        <option value="sedan">Sedan</option>
                        <option value="suv">SUV</option>
                        <option value="innova">Innova</option>
                    </select>
                    <textarea name="message" placeholder="Notes (Optional)" rows="3"></textarea>
                    <button type="submit">Book Now</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>