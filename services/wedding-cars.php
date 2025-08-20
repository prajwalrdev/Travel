<?php
/*
 * Template Name: Wedding Cars Service
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
        <h1>Wedding Cars</h1>
        <p>Elegant cars to make your special day perfect</p>
    </div>
</section>
<section class="service-details">
    <div class="container">
        <div class="service-content">
            <div class="main-content">
                <h2>Make an Entrance</h2>
                <p>Decorated luxury vehicles for wedding ceremonies and receptions. Arrive in style and comfort on your big day with our exclusive wedding car rental service.</p>
                <div class="features-grid">
                    <div class="feature-item">
                        <i class="fas fa-heart"></i>
                        <h3>Decorated Cars</h3>
                        <p>Beautifully adorned vehicles for your wedding.</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-crown"></i>
                        <h3>Luxury Fleet</h3>
                        <p>Choose from a range of premium cars and SUVs.</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-user-tie"></i>
                        <h3>Chauffeur Service</h3>
                        <p>Professional drivers for a stress-free experience.</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-camera-retro"></i>
                        <h3>Photo Ready</h3>
                        <p>Perfect for wedding photos and grand arrivals.</p>
                    </div>
                </div>
            </div>
            <div class="booking-sidebar">
                <h3>Book Wedding Car</h3>
                <form class="booking-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <input type="hidden" name="action" value="service_booking">
                    <?php wp_nonce_field('travelease_service_booking', 'travelease_booking_nonce'); ?>
                    <input type="hidden" name="service_name" value="Wedding Cars">
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="tel" name="phone" placeholder="Phone Number" required>
                    <input type="email" name="email" placeholder="Email Address">
                    <input type="text" name="event_location" placeholder="Event Location" required>
                    <input type="date" name="event_date" required>
                    <input type="time" name="event_time" required>
                    <textarea name="message" placeholder="Notes (Optional)" rows="3"></textarea>
                    <button type="submit">Request Quote</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>