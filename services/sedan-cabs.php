<?php
/*
 * Service Template: Sedan Cabs
 * Renders a standard service page with hero and editable content
 */

get_header();
?>

<style>
.service-hero {
    background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?php echo get_template_directory_uri(); ?>/images/hero-bg.jpg');
    background-size: cover;
    background-position: center;
    padding: 100px 0 60px;
    color: #fff;
    text-align: center;
}
.service-details { padding: 40px 0; }
.service-content { max-width: 900px; margin: 0 auto; padding: 0 20px; }
.service-content h2, .service-content h3 { text-align: center; }
</style>

<section class="service-hero">
	<div class="container">
		<h1><?php echo esc_html(get_the_title()); ?></h1>
		<p><?php echo esc_html(get_post_meta(get_the_ID(), 'hero_description', true) ?: 'Comfortable and affordable sedan cab services for city and outstation travel.'); ?></p>
	</div>
</section>

<div class="service-details">
	<div class="container">
		<div class="service-content">
			<?php while (have_posts()): the_post(); the_content(); endwhile; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>

<?php
/**
 * Template Name: Sedan Cabs
 */

get_header(); ?>

<!-- Service Hero Section -->
<section class="service-hero">
    <div class="container">
        <div class="service-hero-content">
            <h1>Sedan Cabs in Mangalore</h1>
            <p>Comfortable and economical sedans for city rides and business travel</p>
            <div class="service-hero-buttons">
                <a href="tel:+918861505754" class="btn btn-outline">Call +91 8861505754</a>
            </div>
        </div>
    </div>
    <!-- Background styling follows global service styles in page-services -->
</section>

<!-- Service Details Section -->
<section class="service-details">
    <div class="container">
        <div class="service-content">
            <div class="service-main">
                <h2>Affordable Sedan Cab Service</h2>
                <p>Choose our well-maintained sedan fleet for daily commutes, office drops, meetings, and airport transfers. Sedans offer the perfect balance of comfort and value for individuals and small families.</p>

                <div class="service-features">
                    <h3>Why Choose Sedan Cabs?</h3>
                    <div class="features-grid">
                        <div class="feature-item">
                            <i class="fas fa-chair"></i>
                            <h4>Comfortable Seating</h4>
                            <p>Spacious seating with AC for a relaxed ride</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-leaf"></i>
                            <h4>Fuel Efficient</h4>
                            <p>Economical per-kilometer pricing</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-user-tie"></i>
                            <h4>Professional Drivers</h4>
                            <p>Experienced, courteous, and punctual</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-clock"></i>
                            <h4>On-Time Pickup</h4>
                            <p>Reliable arrivals, every time</p>
                        </div>
                    </div>
                </div>

                <div class="service-description">
                    <h3>Best For</h3>
                    <ul>
                        <li>City travel and errands</li>
                        <li>Office commute and meetings</li>
                        <li>Airport pickup and drop</li>
                        <li>Short intercity trips</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>


