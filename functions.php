<?php
/**
 * TravelEase Theme Functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function travelease_theme_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('responsive-embeds');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'travelease'),
        'footer-menu' => __('Footer Menu', 'travelease'),
    ));
}
add_action('after_setup_theme', 'travelease_theme_setup');

/**
 * Enqueue scripts and styles
 */
function travelease_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('travelease-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue custom JavaScript
    wp_enqueue_script('travelease-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('travelease-script', 'travelease_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('travelease_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'travelease_scripts');

/**
 * Fallback menu for primary navigation
 */
function travelease_fallback_menu() {
    echo '<ul class="nav-links">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    echo '<li><a href="#about">About Us</a></li>';
    echo '<li><a href="#services">Services</a></li>';
    echo '<li><a href="#destinations">Destinations</a></li>';
    echo '<li><a href="#testimonials">Testimonials</a></li>';
    echo '<li><a href="' . esc_url(home_url('/blog/')) . '">Blog</a></li>';
    echo '<li><a href="' . esc_url(home_url('/corporate/')) . '">Corporate</a></li>';
    echo '<li><a href="' . esc_url(home_url('/booking/')) . '">Book Now</a></li>';
    echo '<li><a href="' . esc_url(home_url('/support/')) . '">Support</a></li>';
    echo '<li><a href="#contact">Contact</a></li>';
    echo '</ul>';
}

/**
 * Fallback menu for footer navigation
 */
function travelease_footer_fallback_menu() {
    echo '<ul>';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    echo '<li><a href="#services">Services</a></li>';
    echo '<li><a href="#about">About Us</a></li>';
    echo '<li><a href="#destinations">Destinations</a></li>';
    echo '<li><a href="#testimonials">Testimonials</a></li>';
    echo '<li><a href="' . esc_url(home_url('/blog/')) . '">Blog</a></li>';
    echo '<li><a href="' . esc_url(home_url('/corporate/')) . '">Corporate</a></li>';
    echo '<li><a href="' . esc_url(home_url('/booking/')) . '">Book Now</a></li>';
    echo '<li><a href="' . esc_url(home_url('/support/')) . '">Support</a></li>';
    echo '<li><a href="#contact">Contact</a></li>';
    echo '</ul>';
}

/**
 * Customizer additions
 */
function travelease_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('travelease_hero', array(
        'title' => __('Hero Section', 'travelease'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Travel with your trusted travel partner',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'travelease'),
        'section' => 'travelease_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Experience the journey of a lifetime with our premium travel services',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Hero Subtitle', 'travelease'),
        'section' => 'travelease_hero',
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting('hero_button1', array(
        'default' => 'Our Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_button1', array(
        'label' => __('Button 1 Text', 'travelease'),
        'section' => 'travelease_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_button2', array(
        'default' => 'Book Now',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_button2', array(
        'label' => __('Button 2 Text', 'travelease'),
        'section' => 'travelease_hero',
        'type' => 'text',
    ));
    
    // About Section
    $wp_customize->add_section('travelease_about', array(
        'title' => __('About Section', 'travelease'),
        'priority' => 31,
    ));
    
    $wp_customize->add_setting('about_title', array(
        'default' => 'We Are A Trusted Name In Travel Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('about_title', array(
        'label' => __('About Title', 'travelease'),
        'section' => 'travelease_about',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('about_subtitle', array(
        'default' => '10+ Years Experience in Travel and Taxi Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('about_subtitle', array(
        'label' => __('About Subtitle', 'travelease'),
        'section' => 'travelease_about',
        'type' => 'text',
    ));
    
    // Services Section
    $wp_customize->add_section('travelease_services', array(
        'title' => __('Services Section', 'travelease'),
        'priority' => 32,
    ));
    
    $wp_customize->add_setting('services_title', array(
        'default' => 'What We Offer',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('services_title', array(
        'label' => __('Services Title', 'travelease'),
        'section' => 'travelease_services',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('services_subtitle', array(
        'default' => 'The best Travel and Taxi Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('services_subtitle', array(
        'label' => __('Services Subtitle', 'travelease'),
        'section' => 'travelease_services',
        'type' => 'text',
    ));
    
    // Contact Section
    $wp_customize->add_section('travelease_contact', array(
        'title' => __('Contact Information', 'travelease'),
        'priority' => 33,
    ));
    
    $wp_customize->add_setting('contact_title', array(
        'default' => 'Get In Touch',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_title', array(
        'label' => __('Contact Title', 'travelease'),
        'section' => 'travelease_contact',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('contact_subtitle', array(
        'default' => 'Book your journey or inquire about our services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_subtitle', array(
        'label' => __('Contact Subtitle', 'travelease'),
        'section' => 'travelease_contact',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('contact_address', array(
        'default' => '1st Floor, EyeQ Dot Net Pvt Ltd, Smart Tower, Jyoti Circle, Bendoor, Mangaluru, Karnataka 575001',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('contact_address', array(
        'label' => __('Address', 'travelease'),
        'section' => 'travelease_contact',
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting('contact_phone1', array(
        'default' => '+1 (123) 456-7890',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_phone1', array(
        'label' => __('Phone 1', 'travelease'),
        'section' => 'travelease_contact',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('contact_phone2', array(
        'default' => '+1 (987) 654-3210',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_phone2', array(
        'label' => __('Phone 2', 'travelease'),
        'section' => 'travelease_contact',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('contact_email1', array(
        'default' => 'info@travelease.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email1', array(
        'label' => __('Email 1', 'travelease'),
        'section' => 'travelease_contact',
        'type' => 'email',
    ));
    
    $wp_customize->add_setting('contact_email2', array(
        'default' => 'bookings@travelease.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email2', array(
        'label' => __('Email 2', 'travelease'),
        'section' => 'travelease_contact',
        'type' => 'email',
    ));
    
    // Social Media
    $wp_customize->add_section('travelease_social', array(
        'title' => __('Social Media', 'travelease'),
        'priority' => 34,
    ));
    
    $wp_customize->add_setting('social_facebook', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_facebook', array(
        'label' => __('Facebook URL', 'travelease'),
        'section' => 'travelease_social',
        'type' => 'url',
    ));
    
    $wp_customize->add_setting('social_twitter', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_twitter', array(
        'label' => __('Twitter URL', 'travelease'),
        'section' => 'travelease_social',
        'type' => 'url',
    ));
    
    $wp_customize->add_setting('social_instagram', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_instagram', array(
        'label' => __('Instagram URL', 'travelease'),
        'section' => 'travelease_social',
        'type' => 'url',
    ));
    
    $wp_customize->add_setting('social_linkedin', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_linkedin', array(
        'label' => __('LinkedIn URL', 'travelease'),
        'section' => 'travelease_social',
        'type' => 'url',
    ));
}
add_action('customize_register', 'travelease_customize_register');

/**
 * AJAX handler for contact form
 */
function travelease_contact_form_handler() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'travelease_nonce')) {
        wp_die('Security check failed');
    }
    
    // Get form data
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $service = sanitize_text_field($_POST['service']);
    $date = sanitize_text_field($_POST['date']);
    $time = sanitize_text_field($_POST['time']);
    $message = sanitize_textarea_field($_POST['message']);
    
    // Email content
    $to = get_option('admin_email');
    $subject = 'New Contact Form Submission - ' . get_bloginfo('name');
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Service: $service\n";
    $body .= "Date: $date\n";
    $body .= "Time: $time\n";
    $body .= "Message: $message\n";
    
    $headers = array('Content-Type: text/html; charset=UTF-8');
    
    // Send email
    $sent = wp_mail($to, $subject, $body, $headers);
    
    if ($sent) {
        wp_send_json_success('Thank you! Your message has been sent successfully.');
    } else {
        wp_send_json_error('Sorry, there was an error sending your message. Please try again.');
    }
}
add_action('wp_ajax_travelease_contact_form', 'travelease_contact_form_handler');
add_action('wp_ajax_nopriv_travelease_contact_form', 'travelease_contact_form_handler');

/**
 * AJAX handler for newsletter form
 */
function travelease_newsletter_form_handler() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'travelease_nonce')) {
        wp_die('Security check failed');
    }
    
    $email = sanitize_email($_POST['email']);
    
    // Here you can add newsletter subscription logic
    // For now, we'll just send a confirmation email
    
    $to = $email;
    $subject = 'Newsletter Subscription - ' . get_bloginfo('name');
    $body = "Thank you for subscribing to our newsletter!\n\n";
    $body .= "You'll receive updates about our latest offers and travel destinations.\n\n";
    $body .= "Best regards,\n" . get_bloginfo('name');
    
    $headers = array('Content-Type: text/html; charset=UTF-8');
    
    $sent = wp_mail($to, $subject, $body, $headers);
    
    if ($sent) {
        wp_send_json_success('Thank you for subscribing to our newsletter!');
    } else {
        wp_send_json_error('Sorry, there was an error. Please try again.');
    }
}
add_action('wp_ajax_travelease_newsletter_form', 'travelease_newsletter_form_handler');
add_action('wp_ajax_nopriv_travelease_newsletter_form', 'travelease_newsletter_form_handler');
?>
