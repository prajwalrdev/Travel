<?php
/*
 * Service Template: Temple Tour Packages
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
		<p><?php echo esc_html(get_post_meta(get_the_ID(), 'hero_description', true) ?: 'Curated temple tour packages with comfortable travel and expert guidance.'); ?></p>
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
 * Template Name: Temple Tour Packages
 */

get_header(); ?>

<section class="service-hero">
    <div class="container">
        <div class="service-hero-content">
            <h1>Temple Tour Packages from Mangalore</h1>
            <p>Pilgrimage trips to Dharmasthala, Subramanya, Udupi, Kateel and more</p>
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
                <h2>Popular Temple Circuits</h2>
                <p>Comfortable cabs with experienced drivers for single-day or multi-day temple tours. Customize the route, timings and halts to suit your needs.</p>

                <div class="service-features">
                    <h3>Suggested Itineraries</h3>
                    <div class="features-grid">
                        <div class="feature-item">
                            <i class="fas fa-place-of-worship"></i>
                            <h4>Dharmasthala & Subramanya</h4>
                            <p>Day trip covering two major temples</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-place-of-worship"></i>
                            <h4>Udupi & Kateel</h4>
                            <p>Coastal temples with heritage sites</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-hotel"></i>
                            <h4>Stay Assistance</h4>
                            <p>Help with hotel suggestions if needed</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-bus"></i>
                            <h4>Group Options</h4>
                            <p>Tempo traveler and mini-bus available</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>


