<?php
/*
 * Service Template: Bekal Taxi
 */
get_header();
?>

<style>
.service-hero { background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?php echo get_template_directory_uri(); ?>/images/hero-bg.jpg'); background-size: cover; background-position: center; padding: 100px 0 60px; color:#fff; text-align:center; }
.service-details { padding: 40px 0; }
.service-content { max-width: 900px; margin: 0 auto; padding: 0 20px; }
</style>

<section class="service-hero">
	<div class="container">
		<h1><?php echo esc_html(get_the_title()); ?></h1>
		<p><?php echo esc_html(get_post_meta(get_the_ID(), 'hero_description', true) ?: 'Comfortable taxis for Bekal trips with professional drivers.'); ?></p>
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
 * Template Name: Bekal Taxi
 */

get_header(); ?>

<section class="service-hero">
    <div class="container">
        <div class="service-hero-content">
            <h1>Bekal Taxi from Mangalore</h1>
            <p>Comfortable rides to Bekal Fort, beaches, and nearby attractions</p>
            <div class="service-hero-buttons">
                <a href="tel:+918861505754" class="btn btn-outline">Call +91 8861505754</a>
            </div>
        </div>
    </div>
</section>

<section class="service-details">
    <div class="container">
        <div class="service-content">
            <div class="service-main">
                <h2>Bekal Sightseeing and Transfers</h2>
                <p>Plan a day trip to the historic Bekal Fort and serene beaches. Our cabs are available for flexible itineraries, round trips, and one-way drops between Mangalore and Bekal.</p>

                <div class="service-features">
                    <h3>Trip Highlights</h3>
                    <div class="features-grid">
                        <div class="feature-item">
                            <i class="fas fa-landmark"></i>
                            <h4>Bekal Fort</h4>
                            <p>Explore the iconic coastal fort with scenic views</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-umbrella-beach"></i>
                            <h4>Beaches</h4>
                            <p>Relax at Bekal, Kappil and nearby beaches</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-route"></i>
                            <h4>Flexible Routes</h4>
                            <p>Custom pickup, drop and halts</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-wallet"></i>
                            <h4>Transparent Pricing</h4>
                            <p>Per-km or fixed-package options</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>


