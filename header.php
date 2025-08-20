<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Mangalore to Udupi taxi, Mangalore to Waynad Taxi, Mangalore to Ooty Taxi, cab services Mangalore, taxi booking Mangalore, outstation taxi Mangalore, airport taxi Mangalore, wedding cars Mangalore, tempo traveler Mangalore, mini bus rental Mangalore">
    <meta name="description" content="Book reliable taxi services in Mangalore. We offer Innova, Ertiga, Sedan cabs, Mini Bus, Tempo Traveler for city, outstation, airport transfers. Special routes to Udupi, Waynad, Ooty, Bekal, Coorg. 24/7 service available.">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <meta name="geo.placename" content="Mangalore">
    <meta name="geo.region" content="IN-KA">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.svg" type="image/svg+xml">
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <!-- Header Section -->
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <?php if (function_exists('the_custom_logo') && has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <h1><a href="<?php echo esc_url(home_url('/')); ?>">
                            <span class="logo-travel">Travel</span><span class="logo-ease">Ease</span>
                        </a></h1>
                    <?php endif; ?>
                </div>
                <nav aria-label="Primary">
                    <ul id="primary-menu" class="nav-links">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                        <li><a href="<?php echo esc_url(travelease_section_url('about')); ?>">About</a></li>
                        <li><a href="<?php echo esc_url(travelease_section_url('services')); ?>">Services</a></li>
                        <li class="dropdown">
                            <a href="#">Subdomains <i class="fas fa-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo esc_url(travelease_get_or_create_page_url('Blog', 'blog', 'page-blog.php')); ?>">Blog</a></li>
                                <li><a href="<?php echo esc_url(travelease_get_or_create_page_url('Corporate', 'corporate', 'page-corporate.php')); ?>">Corporate</a></li>
                                <li><a href="<?php echo esc_url(travelease_get_or_create_page_url('Booking', 'booking', 'page-booking.php')); ?>">Book Now</a></li>
                                <li><a href="<?php echo esc_url(travelease_get_or_create_page_url('Support', 'support', '')); ?>">Support</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo esc_url(travelease_section_url('destinations')); ?>">Destinations</a></li>
                        <li><a href="<?php echo esc_url(travelease_section_url('testimonials')); ?>">Testimonials</a></li>
                        <li><a href="<?php echo esc_url(travelease_section_url('contact')); ?>">Contact</a></li>
                    </ul>
                </nav>
                <button type="button" class="mobile-menu-toggle mobile-menu-btn" aria-controls="primary-menu" aria-expanded="false">
                    <i class="fas fa-bars" aria-hidden="true"></i>
                    <span class="screen-reader-text">Menu</span>
                </button>
            </div>
        </div>
    </header>
    <?php
    $booking_status = isset($_GET['booking']) ? sanitize_text_field($_GET['booking']) : '';
    if ($booking_status === 'success' || $booking_status === 'error'):
    ?>
        <div class="booking-notice <?php echo $booking_status === 'success' ? 'is-success' : 'is-error'; ?>">
            <?php if ($booking_status === 'success'): ?>
                <p>Thank you! Your booking request has been submitted successfully.</p>
            <?php else: ?>
                <p>Sorry, there was an error submitting your booking. Please try again.</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
