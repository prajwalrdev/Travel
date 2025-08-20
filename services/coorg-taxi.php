<?php
/*
 * Template Name: Coorg Taxi Service
 */
get_header(); ?>
<style>
.service-hero{background:linear-gradient(rgba(0,0,0,.6),rgba(0,0,0,.6)),url('<?php echo get_template_directory_uri(); ?>/images/hero-bg.jpg') center/cover;height:40vh;display:flex;align-items:center;color:#fff;text-align:center}
.service-details{padding:60px 0}.service-content{display:grid;grid-template-columns:2fr 1fr;gap:40px}
.booking-sidebar{background:#f8f9fa;padding:20px;border-radius:10px;position:sticky;top:90px;height:fit-content}
.booking-form input,.booking-form select,.booking-form textarea{width:100%;padding:10px;margin-bottom:12px;border:1px solid #ddd;border-radius:6px}
.booking-form button{width:100%;padding:12px;background:#FF5252;color:#fff;border:none;border-radius:6px}
@media(max-width:768px){.service-content{grid-template-columns:1fr}}
</style>
<section class="service-hero"><div class="container"><h1>Coorg Taxi</h1><p>Trips to Coorg’s coffee hills and waterfalls</p></div></section>
<section class="service-details"><div class="container"><div class="service-content">
<div><h2>Coorg Packages</h2><p>Flexible itineraries for families and groups.</p></div>
<div class="booking-sidebar">
    <h3>Book Coorg Taxi</h3>
    <form class="booking-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
        <input type="hidden" name="action" value="service_booking">
        <?php wp_nonce_field('travelease_service_booking', 'travelease