<?php
/*
 * Template Name: Services Page
 * 
 * This template handles service pages and redirects to the appropriate service template
 */

get_header(); 

// Get the current page slug
$current_page_slug = get_post_field('post_name', get_post());

// Output the CSS styles first
?>
<style>
/* Hero Section (mirrors Ertiga Cabs) */
.service-hero {
    background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?php echo get_template_directory_uri(); ?>/images/hero-bg.jpg');
    background-size: cover;
    background-position: center;
    padding: 100px 0 60px;
    color: #fff;
    text-align: center;
}

.service-hero-content h1 {
    font-size: clamp(2.5rem, 8vw, 3.5rem);
    margin-bottom: 20px;
    font-weight: 700;
    line-height: 1.2;
}

.service-hero-content p {
    font-size: clamp(1.2rem, 4vw, 1.5rem);
    margin-bottom: 30px;
    line-height: 1.6;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
}

.service-hero-buttons { display:flex; gap:20px; justify-content:center; flex-wrap:wrap; }
.service-hero-buttons .btn { padding:15px 30px; font-size:1.1rem; font-weight:600; text-decoration:none; border-radius:8px; transition:all .3s ease; display:inline-block; }
.service-hero-buttons .btn-outline { background:transparent; color:#fff; border:2px solid #fff; }
.service-hero-buttons .btn-outline:hover { background:#fff; color:#333; transform:translateY(-2px); }

/* Layout and Cards (mirrors Ertiga Cabs) */
.service-details { padding: 40px 0; }
.service-content { display:block; max-width:1200px; margin:0 auto; padding:0 20px; }

.content-cards { display:flex; flex-direction:column; gap:30px; margin:40px 0; max-width:1200px; margin-left:auto; margin-right:auto; }
.content-card { background:#fff; border-radius:15px; padding:30px; box-shadow:0 4px 20px rgba(0,0,0,0.08); transition:all .3s ease; border:1px solid #e9ecef; }
.content-card:hover { transform:translateY(-5px); box-shadow:0 8px 30px rgba(0,0,0,0.12); }
.card-header { display:flex; align-items:center; margin-bottom:20px; padding-bottom:15px; border-bottom:2px solid #f8f9fa; }
.card-icon { width:60px; height:60px; background:linear-gradient(135deg, #FF5252, #FF6B6B); border-radius:50%; display:flex; align-items:center; justify-content:center; margin-right:20px; flex-shrink:0; }
.card-icon i { font-size:1.8rem; color:#fff; }
.card-title { font-size:clamp(1.3rem, 3vw, 1.6rem); font-weight:700; color:#333; margin:0; line-height:1.3; }
.card-content { color:#666; line-height:1.6; padding:10px 0; }
.card-content p { font-size:clamp(.95rem, 2.5vw, 1.1rem); margin-bottom:20px; text-align:justify; padding:0 10px; }
.card-content ul { list-style:none; padding:0; margin:20px 0; }
.card-content li { padding:12px 0; border-bottom:1px solid #f0f0f0; position:relative; padding-left:30px; margin-bottom:8px; }
.card-content li:before { content:"✓"; position:absolute; left:0; color:#FF5252; font-weight:bold; }
.card-content li:last-child { border-bottom:none; }
.card-content h4 { color:#333; margin-bottom:15px; font-size:1.1rem; padding:0 10px; margin-top:20px; }
.card-content ol { padding:0 0 0 20px; margin:20px 0; }
.card-content ol li { padding:8px 0; border-bottom:1px solid #f0f0f0; position:relative; margin-bottom:8px; }

/* Transform generic service-description children into cards */
.service-description { margin: 25px 0; }
.service-description > * { background:#fff; border-radius:15px; padding:30px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e9ecef; margin-bottom:24px; }
.service-description h2, .service-description h3 { margin-top:0; }
.service-description ul, .service-description ol { margin:15px 0; padding-left:20px; }
.service-description li { margin-bottom:8px; }

/* Feature cards */
.features-grid { display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:25px; margin:30px auto; max-width:1200px; justify-content:center; }
.feature-item { background:#fff; padding:25px; border-radius:12px; text-align:center; box-shadow:0 3px 15px rgba(0,0,0,0.06); transition:all .3s ease; border:1px solid #e9ecef; }
.feature-item:hover { transform:translateY(-3px); box-shadow:0 6px 25px rgba(0,0,0,0.1); }
.feature-item i { font-size:2.5rem; color:#FF5252; margin-bottom:15px; display:block; }
.feature-item h4 { font-size:1.2rem; font-weight:600; color:#333; margin-bottom:10px; }
.feature-item p { color:#666; font-size:.95rem; line-height:1.5; margin:0; }

/* Full-width card accent */
.full-width-card { grid-column:1 / -1; background:linear-gradient(135deg, #f8f9fa, #e9ecef); border:2px solid #FF5252; }
.full-width-card .card-header { border-bottom-color:#FF5252; }
.full-width-card .card-title { color:#FF5252; }

/* Desktop full-bleed adjustments */
@media screen and (min-width: 1025px) {
    .service-hero { width:100vw; margin-left:calc(50% - 50vw); margin-right:calc(50% - 50vw); }
    .service-hero .container, .service-details .container, .service-faq .container, .related-services .container { max-width:100%; padding-left:50px; padding-right:50px; }
    .service-content { max-width:100%; }
}

/* Responsive */
@media screen and (max-width: 1024px) {
    .service-hero .container, .service-details .container, .service-faq .container, .related-services .container { padding-left:30px; padding-right:30px; }
    .service-content { max-width:95%; padding:0 15px; }
    .content-cards { gap:25px; max-width:95%; }
    .features-grid { grid-template-columns:repeat(auto-fit, minmax(250px, 1fr)); gap:20px; }
}
@media screen and (max-width: 768px) {
    .service-hero .container, .service-details .container, .service-faq .container, .related-services .container { padding-left:20px; padding-right:20px; }
    .service-content { max-width:100%; padding:0 10px; }
    .content-cards { gap:20px; max-width:100%; }
    .features-grid { grid-template-columns:1fr; gap:15px; }
    .content-card { padding:20px; }
    .card-header { flex-direction:column; text-align:center; margin-bottom:15px; }
    .card-icon { margin-right:0; margin-bottom:15px; }
    .service-hero h1 { font-size:clamp(2rem, 6vw, 2.5rem); }
    .service-hero p { font-size:clamp(1rem, 3vw, 1.2rem); }
    .service-hero-buttons { flex-direction:column; align-items:center; gap:15px; }
    .service-hero-buttons .btn { width:100%; max-width:300px; text-align:center; padding:18px 20px; }
}
@media screen and (max-width: 480px) {
    .service-hero .container, .service-details .container, .service-faq .container, .related-services .container { padding-left:15px; padding-right:15px; }
    .content-card { padding:15px; }
    .card-icon { width:50px; height:50px; }
    .card-icon i { font-size:1.5rem; }
    .service-hero h1 { font-size:clamp(1.8rem, 7vw, 2.2rem); }
    .service-hero p { font-size:clamp(.9rem, 3.5vw, 1.1rem); }
}
</style>

<?php
// If this is the Innova Cabs page, include the comprehensive content
if ($current_page_slug === 'innova-cabs-in-mangalore') {
    include get_template_directory() . '/services/innova-cabs.php';
    get_footer();
    return;
}

// If this is the Ertiga Cabs page, include the comprehensive content (unchanged)
if ($current_page_slug === 'ertiga-cabs') {
    include get_template_directory() . '/services/ertiga-cabs.php';
    get_footer();
    return;
}
?>

<!-- Shared Service Hero for all other services -->
<section class="service-hero">
    <div class="container">
        <div class="service-hero-content">
            <h1><?php echo esc_html( get_post_meta(get_the_ID(), 'hero_title', true) ?: get_the_title() ); ?></h1>
            <p><?php echo esc_html( get_post_meta(get_the_ID(), 'hero_description', true) ?: ( has_excerpt() ? get_the_excerpt() : 'Explore our service details, pricing, and features below.' ) ); ?></p>
            <div class="service-hero-buttons">
                <!-- Optional call-to-action; keep subtle by default -->
                <!-- <a href="<?php echo esc_url(travelease_get_or_create_page_url('Booking', 'booking', 'page-booking.php')); ?>" class="btn btn-outline">Book Now</a> -->
                <a href="tel:+918861505754" class="btn btn-outline">Call +91 8861505754</a>
            </div>
        </div>
    </div>
    
</section>

<div class="service-details">
    <div class="container">
        <div class="service-content">
            <div class="service-main">
                <?php if (has_post_thumbnail()): ?>
                    <div class="service-featured-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                <div class="service-description">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
