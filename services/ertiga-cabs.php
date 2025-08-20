<?php
/*
 * Template Name: Ertiga Cabs Service
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
        <h1>Ertiga Cabs</h1>
        <p>Comfortable 6-7 seater MPV</p>
    </div>
</section>
<section class="service-details">
    <div class="container">
        <div class="service-content">
            <div class="main-content">
                <h2>Family-friendly MPV</h2>
                <p>Ideal for family travel and outstation trips. The Ertiga offers spacious seating, ample luggage space, and a smooth ride for your journeys.</p>
                <div class="features-grid">
                    <div class="feature-item">
                        <i class="fas fa-users"></i>
                        <h3>6-7 Seater</h3>
                        <p>Perfect for families and small groups.</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-suitcase"></i>
                        <h3>Large Luggage</h3>
                        <p>Spacious boot for all your bags.</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-car-side"></i>
                        <h3>Comfort Ride</h3>
                        <p>Modern interiors and smooth suspension.</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-shield-alt"></i>
                        <h3>Safety</h3>
                        <p>Equipped with airbags and ABS.</p>
                    </div>
                </div>
            </div>
            <div class="booking-sidebar">
                <h3>Book Ertiga Cab</h3>
                <form class="booking-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <input type="hidden" name="action" value="service_booking">
                    <?php wp_nonce_field('travelease_service_booking', 'travelease_booking_nonce'); ?>
                    <input type="hidden" name="service_name" value="Ertiga Cabs">
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="tel" name="phone" placeholder="Phone Number" required>
                    <input type="text" name="pickup_location" placeholder="Pickup Location" required>
                    <input type="text" name="drop_location" placeholder="Drop Location" required>
                    <input type="date" name="pickup_date" required>
                    <input type="time" name="pickup_time" required>
                    <select name="trip_type">
                        <option value="">Trip Type (Optional)</option>
                        <option value="local">Local</option>
                        <option value="outstation">Outstation</option>
                    </select>
                    <textarea name="message" placeholder="Notes (Optional)" rows="3"></textarea>
                    <button type="submit">Book Now</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>