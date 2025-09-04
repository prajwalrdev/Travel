<?php
/*
 * Service Template: Coorg Taxi
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
		<p><?php echo esc_html(get_post_meta(get_the_ID(), 'hero_description', true) ?: 'Reliable taxis for Coorg trips, sightseeing and transfers.'); ?></p>
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
 * Template Name: Coorg Taxi
 */

get_header(); ?>

<section class="service-hero">
    <div class="container">
        <div class="service-hero-content">
            <h1>Coorg Taxi from Mangalore</h1>
            <p>Comfortable transfers and sightseeing to Madikeri, Abbey Falls, and plantations</p>
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
                <h2>Mangalore ⇄ Coorg Trips</h2>
                <p>Plan a weekend getaway to Coorg with flexible one-way or round-trip packages. Clean cars, safe drivers, and transparent pricing.</p>

                <div class="service-features">
                    <h3>Top Spots</h3>
                    <div class="features-grid">
                        <div class="feature-item">
                            <i class="fas fa-water"></i>
                            <h4>Abbey Falls</h4>
                            <p>Enjoy the scenic waterfalls near Madikeri</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-mug-hot"></i>
                            <h4>Coffee Estates</h4>
                            <p>Tour lush plantations and viewpoints</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-mountain"></i>
                            <h4>Raja’s Seat</h4>
                            <p>Sunset views over the Western Ghats</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-route"></i>
                            <h4>Custom Routes</h4>
                            <p>Tailor the itinerary to your schedule</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>


