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
        // Back-compat keys used elsewhere
        'primary' => __('Primary Menu (Alt Key)', 'travelease'),
        'footer' => __('Footer Menu (Alt Key)', 'travelease'),
    ));
}
add_action('after_setup_theme', 'travelease_theme_setup');

/**
 * Register Custom Post Type for Services
 */
function create_service_post_type() {
    register_post_type('service',
        array(
            'labels' => array(
                'name' => __('Services'),
                'singular_name' => __('Service'),
                'add_new' => __('Add New Service'),
                'add_new_item' => __('Add New Service'),
                'edit_item' => __('Edit Service'),
                'new_item' => __('New Service'),
                'view_item' => __('View Service'),
                'search_items' => __('Search Services'),
                'not_found' => __('No services found'),
                'not_found_in_trash' => __('No services found in Trash'),
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-hammer',
            'rewrite' => array('slug' => 'services'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'show_in_rest' => true,
            'menu_position' => 5,
        )
    );
}
add_action('init', 'create_service_post_type');

/**
 * Flush rewrite rules on theme activation
 */
function travelease_flush_rewrite_rules() {
    create_service_post_type();
    travelease_add_service_rewrite_rules();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'travelease_flush_rewrite_rules');

/**
 * Get service URL by slug
 */
function travelease_get_service_url($service_slug) {
    // First check if the page exists
    $page = get_page_by_path($service_slug);
    if ($page) {
        // Page exists, return its permalink
        return get_permalink($page->ID);
    } else {
        // Page doesn't exist, return the expected URL
        return home_url('/' . $service_slug . '/');
    }
}

/**
 * Test if a service URL is working
 */
function travelease_test_service_url($service_slug) {
    $url = travelease_get_service_url($service_slug);
    $page = get_page_by_path($service_slug);
    
    return array(
        'url' => $url,
        'exists' => $page ? true : false,
        'page_id' => $page ? $page->ID : null,
        'template' => $page ? get_page_template_slug($page->ID) : null
    );
}

/**
 * Add rewrite rules for services
 */
function travelease_add_service_rewrite_rules() {
    add_rewrite_rule(
        '^([^/]+)/?$',
        'index.php?pagename=$matches[1]',
        'top'
    );
}
add_action('init', 'travelease_add_service_rewrite_rules');

/**
 * Enqueue scripts and styles
 */
function travelease_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('travelease-style', get_stylesheet_uri(), array(), '1.0.1');
    
    // Enqueue custom JavaScript
    wp_enqueue_script('travelease-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.1', true);
    
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
    echo '<li><a href="' . esc_url(travelease_section_url('about')) . '">About Us</a></li>';
    echo '<li><a href="' . esc_url(travelease_section_url('services')) . '">Services</a></li>';
    echo '<li class="dropdown">';
    echo '<a href="#">More <i class="fas fa-chevron-down"></i></a>';
    echo '<ul class="dropdown-menu">';
    echo '<li><a href="' . esc_url(home_url('/corporate/')) . '" target="_blank" rel="noopener">Corporate</a></li>';
    echo '<li><a href="' . esc_url(home_url('/booking/')) . '" target="_blank" rel="noopener">Book Now</a></li>';
    echo '<li><a href="' . esc_url(home_url('/support/')) . '" target="_blank" rel="noopener">Support</a></li>';
    echo '</ul>';
    echo '</li>';
    echo '<li><a href="' . esc_url(travelease_section_url('destinations')) . '">Destinations</a></li>';
    echo '<li><a href="' . esc_url(travelease_section_url('testimonials')) . '">Testimonials</a></li>';
    echo '<li><a href="' . esc_url(travelease_section_url('contact')) . '">Contact</a></li>';
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
    
    // Vehicle Types Section
    $wp_customize->add_section('travelease_vehicle_types', array(
        'title' => __('Vehicle Types Section', 'travelease'),
        'priority' => 33,
    ));
    
    $wp_customize->add_setting('vehicle_types_title', array(
        'default' => 'Our Fleet',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('vehicle_types_title', array(
        'label' => __('Vehicle Types Title', 'travelease'),
        'section' => 'travelease_vehicle_types',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('vehicle_types_subtitle', array(
        'default' => 'Choose from our diverse range of vehicles',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('vehicle_types_subtitle', array(
        'label' => __('Vehicle Types Subtitle', 'travelease'),
        'section' => 'travelease_vehicle_types',
        'type' => 'text',
    ));
    
    // Contact Section
    $wp_customize->add_section('travelease_contact', array(
        'title' => __('Contact Information', 'travelease'),
        'priority' => 34,
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
        'default' => 'Ground Floor, GHS Opposite Tara clinic, Hampankatta Mangalore 575001',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('contact_address', array(
        'label' => __('Address', 'travelease'),
        'section' => 'travelease_contact',
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting('contact_phone1', array(
        'default' => '+91 8861505754',
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
        'default' => 'mangaloretaxicabservices@gmail.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email1', array(
        'label' => __('Email 1', 'travelease'),
        'section' => 'travelease_contact',
        'type' => 'email',
    ));
    
    $wp_customize->add_setting('contact_email2', array(
        'default' => 'mangaloretaxicabservices@gmail.com',
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

    // Features Section
    $wp_customize->add_section('travelease_features', array(
        'title' => __('Features Section', 'travelease'),
        'priority' => 35,
    ));

    // Feature 1
    $wp_customize->add_setting('feature1_title', array(
        'default' => 'Best Prices',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('feature1_title', array(
        'label' => __('Feature 1 Title', 'travelease'),
        'section' => 'travelease_features',
        'type' => 'text',
    ));

    $wp_customize->add_setting('feature1_description', array(
        'default' => 'Competitive rates for all your travel needs',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('feature1_description', array(
        'label' => __('Feature 1 Description', 'travelease'),
        'section' => 'travelease_features',
        'type' => 'text',
    ));

    // Feature 2
    $wp_customize->add_setting('feature2_title', array(
        'default' => 'Best Drivers',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('feature2_title', array(
        'label' => __('Feature 2 Title', 'travelease'),
        'section' => 'travelease_features',
        'type' => 'text',
    ));

    $wp_customize->add_setting('feature2_description', array(
        'default' => 'Professional and experienced chauffeurs',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('feature2_description', array(
        'label' => __('Feature 2 Description', 'travelease'),
        'section' => 'travelease_features',
        'type' => 'text',
    ));

    // Feature 3
    $wp_customize->add_setting('feature3_title', array(
        'default' => '24*7 Call Assistance',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('feature3_title', array(
        'label' => __('Feature 3 Title', 'travelease'),
        'section' => 'travelease_features',
        'type' => 'text',
    ));

    $wp_customize->add_setting('feature3_description', array(
        'default' => 'Support available round the clock',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('feature3_description', array(
        'label' => __('Feature 3 Description', 'travelease'),
        'section' => 'travelease_features',
        'type' => 'text',
    ));

    // Feature 4
    $wp_customize->add_setting('feature4_title', array(
        'default' => 'Special Discounts',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('feature4_title', array(
        'label' => __('Feature 4 Title', 'travelease'),
        'section' => 'travelease_features',
        'type' => 'text',
    ));

    $wp_customize->add_setting('feature4_description', array(
        'default' => 'Great deals on package trips',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('feature4_description', array(
        'label' => __('Feature 4 Description', 'travelease'),
        'section' => 'travelease_features',
        'type' => 'text',
    ));

    // Feature 5
    $wp_customize->add_setting('feature5_title', array(
        'default' => 'Full City Coverage',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('feature5_title', array(
        'label' => __('Feature 5 Title', 'travelease'),
        'section' => 'travelease_features',
        'type' => 'text',
    ));

    $wp_customize->add_setting('feature5_description', array(
        'default' => 'Service available throughout the city',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('feature5_description', array(
        'label' => __('Feature 5 Description', 'travelease'),
        'section' => 'travelease_features',
        'type' => 'text',
    ));

    // Feature 6
    $wp_customize->add_setting('feature6_title', array(
        'default' => 'No Booking Fee',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('feature6_title', array(
        'label' => __('Feature 6 Title', 'travelease'),
        'section' => 'travelease_features',
        'type' => 'text',
    ));

    $wp_customize->add_setting('feature6_description', array(
        'default' => 'Transparent pricing with no hidden charges',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('feature6_description', array(
        'label' => __('Feature 6 Description', 'travelease'),
        'section' => 'travelease_features',
        'type' => 'text',
    ));

    // About Section Content
    $wp_customize->add_setting('about_content_paragraph1', array(
        'default' => 'Welcome to TSM Travells, where sandy beaches meet ancient temples and rich cultural traditions. Nestled on the pristine coastline, we offer a perfect blend of natural beauty and historical wonders for your travel experiences.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('about_content_paragraph1', array(
        'label' => __('About Paragraph 1', 'travelease'),
        'section' => 'travelease_about',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('about_content_paragraph2', array(
        'default' => 'As you explore with us, you\'ll be captivated by the turquoise waters and golden sands that stretch as far as the eye can see. But we offer more than just beach destinations. We provide access to treasure troves of age-old temples that testify to deep-rooted spirituality.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('about_content_paragraph2', array(
        'label' => __('About Paragraph 2', 'travelease'),
        'section' => 'travelease_about',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('about_content_paragraph3', array(
        'default' => 'Whether you\'re a nature enthusiast, a history buff, or simply seeking a rejuvenating escape, TSM Travells promises an unforgettable journey filled with warmth, beauty, and cultural richness.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('about_content_paragraph3', array(
        'label' => __('About Paragraph 3', 'travelease'),
        'section' => 'travelease_about',
        'type' => 'textarea',
    ));

    // About Stats
    $wp_customize->add_setting('about_stat1_number', array(
        'default' => '10+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('about_stat1_number', array(
        'label' => __('Stat 1 Number', 'travelease'),
        'section' => 'travelease_about',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_stat1_text', array(
        'default' => 'Years in Business',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('about_stat1_text', array(
        'label' => __('Stat 1 Text', 'travelease'),
        'section' => 'travelease_about',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_stat2_number', array(
        'default' => '5000+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('about_stat2_number', array(
        'label' => __('Stat 2 Number', 'travelease'),
        'section' => 'travelease_about',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_stat2_text', array(
        'default' => 'Happy Customers',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('about_stat2_text', array(
        'label' => __('Stat 2 Text', 'travelease'),
        'section' => 'travelease_about',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_stat3_number', array(
        'default' => '100+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('about_stat3_number', array(
        'label' => __('Stat 3 Number', 'travelease'),
        'section' => 'travelease_about',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_stat3_text', array(
        'default' => 'Destinations',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('about_stat3_text', array(
        'label' => __('Stat 3 Text', 'travelease'),
        'section' => 'travelease_about',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_stat4_number', array(
        'default' => '24/7',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('about_stat4_number', array(
        'label' => __('Stat 4 Number', 'travelease'),
        'section' => 'travelease_about',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_stat4_text', array(
        'default' => 'Support Available',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('about_stat4_text', array(
        'label' => __('Stat 4 Text', 'travelease'),
        'section' => 'travelease_about',
        'type' => 'text',
    ));

    // Destinations Section
    $wp_customize->add_section('travelease_destinations', array(
        'title' => __('Destinations Section', 'travelease'),
        'priority' => 36,
    ));

    $wp_customize->add_setting('destinations_title', array(
        'default' => 'Popular Destinations',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('destinations_title', array(
        'label' => __('Destinations Title', 'travelease'),
        'section' => 'travelease_destinations',
        'type' => 'text',
    ));

    $wp_customize->add_setting('destinations_subtitle', array(
        'default' => 'Explore beautiful places with us',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('destinations_subtitle', array(
        'label' => __('Destinations Subtitle', 'travelease'),
        'section' => 'travelease_destinations',
        'type' => 'text',
    ));

    // Destination 1
    $wp_customize->add_setting('destination1_title', array(
        'default' => 'Coastal Paradise',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('destination1_title', array(
        'label' => __('Destination 1 Title', 'travelease'),
        'section' => 'travelease_destinations',
        'type' => 'text',
    ));

    $wp_customize->add_setting('destination1_description', array(
        'default' => 'Pristine beaches and coastal beauty',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('destination1_description', array(
        'label' => __('Destination 1 Description', 'travelease'),
        'section' => 'travelease_destinations',
        'type' => 'text',
    ));

    // Destination 2
    $wp_customize->add_setting('destination2_title', array(
        'default' => 'Ancient Temples',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('destination2_title', array(
        'label' => __('Destination 2 Title', 'travelease'),
        'section' => 'travelease_destinations',
        'type' => 'text',
    ));

    $wp_customize->add_setting('destination2_description', array(
        'default' => 'Spiritual journey through historic temples',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('destination2_description', array(
        'label' => __('Destination 2 Description', 'travelease'),
        'section' => 'travelease_destinations',
        'type' => 'text',
    ));

    // Destination 3
    $wp_customize->add_setting('destination3_title', array(
        'default' => 'Mountain Retreat',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('destination3_title', array(
        'label' => __('Destination 3 Title', 'travelease'),
        'section' => 'travelease_destinations',
        'type' => 'text',
    ));

    $wp_customize->add_setting('destination3_description', array(
        'default' => 'Serene hill stations and mountain views',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('destination3_description', array(
        'label' => __('Destination 3 Description', 'travelease'),
        'section' => 'travelease_destinations',
        'type' => 'text',
    ));

    // Stats Section
    $wp_customize->add_section('travelease_stats', array(
        'title' => __('Stats Section', 'travelease'),
        'priority' => 37,
    ));

    // Stat 1
    $wp_customize->add_setting('stat1_number', array(
        'default' => '150+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('stat1_number', array(
        'label' => __('Stat 1 Number', 'travelease'),
        'section' => 'travelease_stats',
        'type' => 'text',
    ));

    $wp_customize->add_setting('stat1_text', array(
        'default' => 'Trips Completed',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('stat1_text', array(
        'label' => __('Stat 1 Text', 'travelease'),
        'section' => 'travelease_stats',
        'type' => 'text',
    ));

    // Stat 2
    $wp_customize->add_setting('stat2_number', array(
        'default' => '500+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('stat2_number', array(
        'label' => __('Stat 2 Number', 'travelease'),
        'section' => 'travelease_stats',
        'type' => 'text',
    ));

    $wp_customize->add_setting('stat2_text', array(
        'default' => 'Corporate Clients Served',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('stat2_text', array(
        'label' => __('Stat 2 Text', 'travelease'),
        'section' => 'travelease_stats',
        'type' => 'text',
    ));

    // Stat 3
    $wp_customize->add_setting('stat3_number', array(
        'default' => '600+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('stat3_number', array(
        'label' => __('Stat 3 Number', 'travelease'),
        'section' => 'travelease_stats',
        'type' => 'text',
    ));

    $wp_customize->add_setting('stat3_text', array(
        'default' => 'Happy Customers',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('stat3_text', array(
        'label' => __('Stat 3 Text', 'travelease'),
        'section' => 'travelease_stats',
        'type' => 'text',
    ));

    // Stat 4
    $wp_customize->add_setting('stat4_number', array(
        'default' => '200+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('stat4_number', array(
        'label' => __('Stat 4 Number', 'travelease'),
        'section' => 'travelease_stats',
        'type' => 'text',
    ));

    $wp_customize->add_setting('stat4_text', array(
        'default' => 'Online Bookings',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('stat4_text', array(
        'label' => __('Stat 4 Text', 'travelease'),
        'section' => 'travelease_stats',
        'type' => 'text',
    ));

    // Testimonials Section
    $wp_customize->add_section('travelease_testimonials', array(
        'title' => __('Testimonials Section', 'travelease'),
        'priority' => 38,
    ));

    $wp_customize->add_setting('testimonials_title', array(
        'default' => 'What Our Customers Say',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('testimonials_title', array(
        'label' => __('Testimonials Title', 'travelease'),
        'section' => 'travelease_testimonials',
        'type' => 'text',
    ));

    $wp_customize->add_setting('testimonials_subtitle', array(
        'default' => 'Testimonials from our satisfied clients',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('testimonials_subtitle', array(
        'label' => __('Testimonials Subtitle', 'travelease'),
        'section' => 'travelease_testimonials',
        'type' => 'text',
    ));

    // Testimonial 1
    $wp_customize->add_setting('testimonial1_content', array(
        'default' => 'The service was exceptional! The driver was punctual, professional, and the vehicle was immaculate. I highly recommend TSM Travells for all your travel needs in Mangalore.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('testimonial1_content', array(
        'label' => __('Testimonial 1 Content', 'travelease'),
        'section' => 'travelease_testimonials',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('testimonial1_name', array(
        'default' => 'John Smith',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('testimonial1_name', array(
        'label' => __('Testimonial 1 Name', 'travelease'),
        'section' => 'travelease_testimonials',
        'type' => 'text',
    ));

    $wp_customize->add_setting('testimonial1_role', array(
        'default' => 'Business Traveler',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('testimonial1_role', array(
        'label' => __('Testimonial 1 Role', 'travelease'),
        'section' => 'travelease_testimonials',
        'type' => 'text',
    ));

    // Testimonial 2
    $wp_customize->add_setting('testimonial2_content', array(
        'default' => 'We booked a luxury car for our wedding day, and it was perfect! The driver was courteous, the car was beautifully decorated, and everything went smoothly. Thank you TSM Travells for making our special day even better!',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('testimonial2_content', array(
        'label' => __('Testimonial 2 Content', 'travelease'),
        'section' => 'travelease_testimonials',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('testimonial2_name', array(
        'default' => 'Sarah Johnson',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('testimonial2_name', array(
        'label' => __('Testimonial 2 Name', 'travelease'),
        'section' => 'travelease_testimonials',
        'type' => 'text',
    ));

    $wp_customize->add_setting('testimonial2_role', array(
        'default' => 'Wedding Client',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('testimonial2_role', array(
        'label' => __('Testimonial 2 Role', 'travelease'),
        'section' => 'travelease_testimonials',
        'type' => 'text',
    ));

    // Testimonial 3
    $wp_customize->add_setting('testimonial3_content', array(
        'default' => 'Our family trip to Coorg was made so much more enjoyable with TSM Travells. The driver was knowledgeable about the area and suggested some amazing local spots. The vehicle was spacious and comfortable for our long journey.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('testimonial3_content', array(
        'label' => __('Testimonial 3 Content', 'travelease'),
        'section' => 'travelease_testimonials',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('testimonial3_name', array(
        'default' => 'David Wilson',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('testimonial3_name', array(
        'label' => __('Testimonial 3 Name', 'travelease'),
        'section' => 'travelease_testimonials',
        'type' => 'text',
    ));

    $wp_customize->add_setting('testimonial3_role', array(
        'default' => 'Family Traveler',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('testimonial3_role', array(
        'label' => __('Testimonial 3 Role', 'travelease'),
        'section' => 'travelease_testimonials',
        'type' => 'text',
    ));

    // Contact Working Hours
    $wp_customize->add_setting('contact_hours1', array(
        'default' => '24/7 Service Available',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_hours1', array(
        'label' => __('Working Hours Line 1', 'travelease'),
        'section' => 'travelease_contact',
        'type' => 'text',
    ));

    $wp_customize->add_setting('contact_hours2', array(
        'default' => 'Office: 9:00 AM - 6:00 PM',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_hours2', array(
        'label' => __('Working Hours Line 2', 'travelease'),
        'section' => 'travelease_contact',
        'type' => 'text',
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

// Unified Service Booking Handler (admin-post)
function travelease_service_booking_handler() {
    // Check nonce
    if (!isset($_POST['travelease_booking_nonce']) || !wp_verify_nonce($_POST['travelease_booking_nonce'], 'travelease_service_booking')) {
        wp_safe_redirect(add_query_arg('booking', 'error_nonce', wp_get_referer() ?: home_url('/')));
        exit;
    }

    // Collect fields generically (allow different forms)
    $exclude_keys = [
        'action',
        'travelease_booking_nonce',
        '_wp_http_referer',
    ];

    $service_name = '';
    if (!empty($_POST['service_name'])) {
        $service_name = sanitize_text_field($_POST['service_name']);
    } elseif (!empty($_POST['service_type'])) {
        $service_name = sanitize_text_field($_POST['service_type']);
    } else {
        $service_name = 'Service Booking';
    }

    // Build email
    $to       = get_option('admin_email');
    $subject  = sprintf('[%s] %s', get_bloginfo('name'), $service_name);
    $body     = "You have received a new booking request.\n\n";
    $body    .= "Service: {$service_name}\n";
    $body    .= "Submitted on: " . current_time('mysql') . "\n\n";
    $body    .= "Details:\n";

    foreach ($_POST as $key => $value) {
        if (in_array($key, $exclude_keys, true)) continue;
        // Sanitize and format
        if (is_array($value)) {
            $clean = implode(', ', array_map('sanitize_text_field', $value));
        } else {
            $clean = sanitize_text_field($value);
        }
        $label = ucwords(str_replace('_', ' ', $key));
        $body .= "{$label}: {$clean}\n";
    }

    $headers = ['Content-Type: text/plain; charset=UTF-8'];

    $sent = wp_mail($to, $subject, $body, $headers);

    // Redirect back with status
    $redirect_url = add_query_arg('booking', $sent ? 'success' : 'error', wp_get_referer() ?: home_url('/'));
    wp_safe_redirect($redirect_url);
    exit;
}
add_action('admin_post_service_booking', 'travelease_service_booking_handler');
add_action('admin_post_nopriv_service_booking', 'travelease_service_booking_handler');
?>
<?php
// Auto-setup core pages, menus, and front/blog assignment after theme activation
if (!function_exists('travelease_after_switch_theme')) {
    function travelease_after_switch_theme() {
        // 1) Create core pages if they don't exist
        $pages_to_create = [
            [ 'title' => 'Home',      'slug' => 'home',      'template' => '' ],
            [ 'title' => 'Blog',      'slug' => 'blog',      'template' => 'page-blog.php' ],
            [ 'title' => 'Support',   'slug' => 'support',   'template' => '' ],

            // Service pages to auto-create
            [ 'title' => 'City Taxi',               'slug' => 'city-taxi',               'template' => 'services/city-taxi.php' ],
            [ 'title' => 'Wedding Cars',            'slug' => 'wedding-cars',            'template' => 'services/wedding-cars.php' ],
            [ 'title' => 'Mini Bus',                'slug' => 'mini-bus',                'template' => 'services/mini-bus.php' ],
            [ 'title' => 'Tempo Traveler',          'slug' => 'tempo-traveler',          'template' => 'services/tempo-traveler.php' ],
            [ 'title' => 'Innova Cabs',             'slug' => 'innova-cabs',             'template' => 'services/innova-cabs.php' ],
            [ 'title' => 'Ertiga Cabs',             'slug' => 'ertiga-cabs',             'template' => 'services/ertiga-cabs.php' ],
            [ 'title' => 'Sedan Cabs',              'slug' => 'sedan-cabs',              'template' => 'services/sedan-cabs.php' ],
            [ 'title' => 'Bekal Taxi',              'slug' => 'bekal-taxi',              'template' => 'services/bekal-taxi.php' ],
            [ 'title' => 'Temple Tour Packages',    'slug' => 'temple-tour',             'template' => 'services/temple-tour.php' ],
            [ 'title' => 'Coorg Taxi',              'slug' => 'coorg-taxi',              'template' => 'services/coorg-taxi.php' ],
            // City Tour removed; use City Taxi only
        ];

        $created_page_ids = [];
        foreach ($pages_to_create as $page) {
            $existing = get_page_by_path($page['slug']);
            if ($existing) {
                $created_page_ids[$page['title']] = $existing->ID;
                if (!empty($page['template'])) {
                    update_post_meta($existing->ID, '_wp_page_template', $page['template']);
                }
                continue;
            }
            $page_id = wp_insert_post([
                'post_title'   => $page['title'],
                'post_name'    => $page['slug'],
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_content' => '',
            ]);
            if ($page_id && !is_wp_error($page_id)) {
                $created_page_ids[$page['title']] = $page_id;
                if (!empty($page['template'])) {
                    update_post_meta($page_id, '_wp_page_template', $page['template']);
                }
            }
        }

        // 2) Assign Home as front page and Blog as posts page
        if (!empty($created_page_ids['Home'])) {
            update_option('show_on_front', 'page');
            update_option('page_on_front', (int) $created_page_ids['Home']);
        }
        if (!empty($created_page_ids['Blog'])) {
            update_option('page_for_posts', (int) $created_page_ids['Blog']);
        }

        // 3) Create/assign Main Menu to Primary and Footer Menu to Footer
        // Primary menu
        $primary_menu_name = 'Main Menu';
        $primary_menu = wp_get_nav_menu_object($primary_menu_name);
        if (!$primary_menu) {
            $primary_menu_id = wp_create_nav_menu($primary_menu_name);
        } else {
            $primary_menu_id = $primary_menu->term_id;
        }

        // Footer menu
        $footer_menu_name = 'Footer Menu';
        $footer_menu = wp_get_nav_menu_object($footer_menu_name);
        if (!$footer_menu) {
            $footer_menu_id = wp_create_nav_menu($footer_menu_name);
        } else {
            $footer_menu_id = $footer_menu->term_id;
        }

        // Assign menus to locations (expects 'primary' and 'footer' to be registered)
        $locations = get_theme_mod('nav_menu_locations');
        if (!is_array($locations)) {
            $locations = [];
        }
        $locations['primary'] = $primary_menu_id;
        $locations['footer']  = $footer_menu_id;
        set_theme_mod('nav_menu_locations', $locations);

        // Helper to add a menu item if it doesn't exist
        $ensure_menu_item = function($menu_id, $page_id) {
            if (!$menu_id || !$page_id) return;
            $items = wp_get_nav_menu_items($menu_id);
            $exists = false;
            if ($items && !is_wp_error($items)) {
                foreach ($items as $item) {
                    if ((int) $item->object_id === (int) $page_id) {
                        $exists = true;
                        break;
                    }
                }
            }
            if (!$exists) {
                wp_update_nav_menu_item($menu_id, 0, [
                    'menu-item-title'  => get_the_title($page_id),
                    'menu-item-object' => 'page',
                    'menu-item-object-id' => $page_id,
                    'menu-item-type'   => 'post_type',
                    'menu-item-status' => 'publish',
                ]);
            }
        };

        // Add pages to Main Menu (order as you like)
        foreach (['Home', 'Blog', 'Support'] as $title) {
            if (!empty($created_page_ids[$title])) {
                $ensure_menu_item($primary_menu_id, $created_page_ids[$title]);
            }
        }

        // Add some to Footer Menu (customize as needed)
        foreach (['Home', 'Support'] as $title) {
            if (!empty($created_page_ids[$title])) {
                $ensure_menu_item($footer_menu_id, $created_page_ids[$title]);
            }
        }

        // 4) Suggest Permalinks: cannot auto-set in code; do it in Settings > Permalinks
        // 5) Flush rewrite rules to ensure pretty permalinks work after page creation
        flush_rewrite_rules();
    }
}
add_action('after_switch_theme', 'travelease_after_switch_theme');

/**
 * Safety net: create missing core/service pages if theme was activated before
 * and users are hitting 404s. Runs once and then disables itself.
 */
function travelease_seed_pages_if_missing_once() {
    if (get_option('travelease_seeded_pages_v2')) {
        return;
    }

    $pages_to_create = [
        [ 'title' => 'Home',      'slug' => 'home',      'template' => '' ],
        [ 'title' => 'Blog',      'slug' => 'blog',      'template' => 'page-blog.php' ],
        [ 'title' => 'Support',   'slug' => 'support',   'template' => '' ],

        [ 'title' => 'City Taxi',               'slug' => 'city-taxi',               'template' => 'services/city-taxi.php' ],
        [ 'title' => 'Wedding Cars',            'slug' => 'wedding-cars',            'template' => 'services/wedding-cars.php' ],
        [ 'title' => 'Mini Bus',                'slug' => 'mini-bus',                'template' => 'services/mini-bus.php' ],
        [ 'title' => 'Tempo Traveler',          'slug' => 'tempo-traveler',          'template' => 'services/tempo-traveler.php' ],
        [ 'title' => 'Innova Cabs',             'slug' => 'innova-cabs',             'template' => 'services/innova-cabs.php' ],
        [ 'title' => 'Ertiga Cabs',             'slug' => 'ertiga-cabs',             'template' => 'services/ertiga-cabs.php' ],
        [ 'title' => 'Sedan Cabs',              'slug' => 'sedan-cabs',              'template' => 'services/sedan-cabs.php' ],
        [ 'title' => 'Bekal Taxi',              'slug' => 'bekal-taxi',              'template' => 'services/bekal-taxi.php' ],
        [ 'title' => 'Temple Tour Packages',    'slug' => 'temple-tour',             'template' => 'services/temple-tour.php' ],
        [ 'title' => 'Coorg Taxi',              'slug' => 'coorg-taxi',              'template' => 'services/coorg-taxi.php' ],
    ];

    $created_any = false;
    foreach ($pages_to_create as $page) {
        $existing = get_page_by_path($page['slug']);
        if ($existing) {
            if (!empty($page['template'])) {
                update_post_meta($existing->ID, '_wp_page_template', $page['template']);
            }
            continue;
        }
        $page_id = wp_insert_post([
            'post_title'   => $page['title'],
            'post_name'    => $page['slug'],
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => '',
        ]);
        if ($page_id && !is_wp_error($page_id)) {
            if (!empty($page['template'])) {
                update_post_meta($page_id, '_wp_page_template', $page['template']);
            }
            $created_any = true;
        }
    }

    if ($created_any) {
        flush_rewrite_rules(false);
    }

    update_option('travelease_seeded_pages_v2', time());
}
add_action('init', 'travelease_seed_pages_if_missing_once', 20);

/**
 * One-time migration: ensure all service pages use shared service templates
 * so they include the global header/navbar and consolidated styles.
 */
function travelease_migrate_service_page_templates_once() {
    if (get_option('travelease_migrated_service_templates_v1')) {
        return;
    }

    $mapping = [
        'city-taxi'        => 'page-city-taxi.php',
        'outstation-taxi'  => 'page-services.php',
        'wedding-cars'     => 'page-services.php',
        'airport-taxi'     => 'page-services.php',
        'mini-bus'         => 'page-services.php',
        'tempo-traveler'   => 'page-services.php',
        'innova-cabs'      => 'page-services.php',
        'ertiga-cabs'      => 'page-services.php',
    ];

    foreach ($mapping as $slug => $template) {
        $page = get_page_by_path($slug);
        if ($page && !is_wp_error($page)) {
            $current = get_page_template_slug($page->ID);
            // Update if using old per-file service templates or missing
            if (!$current || strpos((string)$current, 'services/') === 0 || $current === 'default') {
                update_post_meta($page->ID, '_wp_page_template', $template);
            }
        }
    }

    // Mark migration done and refresh rewrite rules
    update_option('travelease_migrated_service_templates_v1', time());
    flush_rewrite_rules(false);
}
add_action('init', 'travelease_migrate_service_page_templates_once', 30);

/**
 * One-time content seeding: import current HTML from services/*.php into
 * the corresponding WP Pages so content becomes editable in wp-admin.
 */
function travelease_seed_service_content_once() {
    if (get_option('travelease_seeded_service_content_v1')) {
        return;
    }

    $map = [
        'city-taxi'       => 'city-taxi.php',
        'outstation-taxi' => 'outstation-taxi.php',
        'wedding-cars'    => 'wedding-cars.php',
        'airport-taxi'    => 'airport-taxi.php',
        'mini-bus'        => 'mini-bus.php',
        'tempo-traveler'  => 'tempo-traveler.php',
        'innova-cabs'     => 'innova-cabs.php',
        'ertiga-cabs'     => 'ertiga-cabs.php',
    ];

    $services_dir = trailingslashit(get_template_directory()) . 'services/';

    foreach ($map as $slug => $file) {
        $page = get_page_by_path($slug);
        if (!$page || is_wp_error($page)) {
            continue;
        }

        $path = $services_dir . $file;
        if (!file_exists($path)) {
            continue;
        }

        $raw = file_get_contents($path);
        if ($raw === false) {
            continue;
        }

        // The service files are HTML fragments. Use them as post content.
        // Only update if page content is empty to avoid overwriting manual edits.
        if (trim((string)$page->post_content) === '') {
            wp_update_post([
                'ID'           => $page->ID,
                'post_content' => $raw,
            ]);
        }

        // Ensure the shared Services template is applied (City Taxi can keep specific one if already set)
        $desired_template = ($slug === 'city-taxi') ? 'page-city-taxi.php' : 'page-services.php';
        update_post_meta($page->ID, '_wp_page_template', $desired_template);
    }

    update_option('travelease_seeded_service_content_v1', time());
}
add_action('init', 'travelease_seed_service_content_once', 40);

/**
 * Helper: Ensure a page exists and return its permalink
 */
function travelease_get_or_create_page_url(string $title, string $slug, string $template = ''): string {
    $page = get_page_by_path($slug);
    if (!$page) {
        $page_id = wp_insert_post([
            'post_title'   => $title,
            'post_name'    => $slug,
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => '',
        ]);
        if (!is_wp_error($page_id) && $page_id) {
            if (!empty($template)) {
                update_post_meta($page_id, '_wp_page_template', $template);
            }
            $page = get_post($page_id);
            flush_rewrite_rules(false);
        }
    } else {
        if (!empty($template)) {
            update_post_meta($page->ID, '_wp_page_template', $template);
        }
    }
    return $page ? get_permalink($page) : esc_url(home_url('/' . trim($slug, '/') . '/'));
}

/**
 * Convenience helper for service URLs
 */
function travelease_service_url(string $title, string $slug, string $template): string {
    return travelease_get_or_create_page_url($title, $slug, $template);
}

/**
 * Build a URL to a homepage section that works from any page
 */
function travelease_section_url(string $section_id): string {
    $section_id = trim($section_id, "# ");
    $home_url   = home_url('/');
    if (is_front_page()) {
        return '#' . $section_id;
    }
    return trailingslashit($home_url) . '#' . $section_id;
}

/**
 * Enhanced navigation helper to handle section links properly
 */
function travelease_nav_link($url, $text, $classes = '') {
    $is_section = strpos($url, '#') === 0;
    $href = $is_section ? travelease_section_url(ltrim($url, '#')) : $url;
    
    $class_attr = $classes ? ' class="' . esc_attr($classes) . '"' : '';
    
    return sprintf(
        '<a href="%s"%s>%s</a>',
        esc_url($href),
        $class_attr,
        esc_html($text)
    );
}

/**
 * Add custom body classes for better navigation state management
 */
function travelease_body_classes($classes) {
    // Add class for current page type
    if (is_front_page()) {
        $classes[] = 'page-home';
    } elseif (is_page('booking')) {
        $classes[] = 'page-booking';
    } elseif (is_page('corporate')) {
        $classes[] = 'page-corporate';
    } elseif (is_page('blog')) {
        $classes[] = 'page-blog';
    } elseif (is_page('support')) {
        $classes[] = 'page-support';
    }
    
    return $classes;
}
add_filter('body_class', 'travelease_body_classes');

/**
 * Admin action to create service pages
 */
function travelease_create_service_pages_action() {
    if (isset($_GET['action']) && $_GET['action'] === 'create_service_pages') {
        // Check nonce for security
        if (!wp_verify_nonce($_GET['_wpnonce'], 'create_service_pages')) {
            wp_die('Security check failed');
        }
        
        // Check user capabilities
        if (!current_user_can('manage_options')) {
            wp_die('You do not have sufficient permissions to access this page.');
        }
        
        $service_pages = array(
            array(
                'title' => 'City Taxi Service',
                'slug' => 'city-taxi',
                'template' => 'page-city-taxi.php',
                'content' => 'Professional city taxi service for convenient local travel. Book your ride now!'
            ),
            array(
                'title' => 'Outstation Taxi Service',
                'slug' => 'outstation-taxi',
                'template' => 'page-services.php',
                'content' => 'Comfortable outstation taxi service for long-distance travel. Experience hassle-free journeys.'
            ),
            array(
                'title' => 'Wedding Cars Service',
                'slug' => 'wedding-cars',
                'template' => 'page-services.php',
                'content' => 'Luxury wedding cars for your special day. Make your wedding journey memorable with our premium fleet.'
            ),
            array(
                'title' => 'Airport Taxi Service',
                'slug' => 'airport-taxi',
                'template' => 'page-services.php',
                'content' => 'Reliable airport taxi service for timely pickups and drop-offs. Never miss your flight again.'
            ),
            array(
                'title' => 'Mini Bus Service',
                'slug' => 'mini-bus',
                'template' => 'page-services.php',
                'content' => 'Comfortable mini bus service for group travel. Perfect for family trips and corporate events.'
            ),
            array(
                'title' => 'Tempo Traveler Service',
                'slug' => 'tempo-traveler',
                'template' => 'page-services.php',
                'content' => 'Spacious tempo traveler service for larger groups. Ideal for tours and group transportation.'
            ),
            array(
                'title' => 'Innova Cabs Service',
                'slug' => 'innova-cabs',
                'template' => 'page-services.php',
                'content' => 'Premium Innova cabs for comfortable and stylish travel. Experience luxury on the road.'
            ),
            array(
                'title' => 'Ertiga Cabs Service',
                'slug' => 'ertiga-cabs',
                'template' => 'page-services.php',
                'content' => 'Spacious Ertiga cabs perfect for family travel. Comfort and style combined.'
            )
        );
        
        $created_count = 0;
        $updated_count = 0;
        
        foreach ($service_pages as $service) {
            $existing_page = get_page_by_path($service['slug']);
            
            if ($existing_page) {
                // Update existing page
                $page_data = array(
                    'ID' => $existing_page->ID,
                    'post_title' => $service['title'],
                    'post_content' => $service['content'],
                    'post_status' => 'publish'
                );
                
                $page_id = wp_update_post($page_data);
                if ($page_id && !is_wp_error($page_id)) {
                    // Force update the template
                    update_post_meta($page_id, '_wp_page_template', $service['template']);
                    $updated_count++;
                    
                    // Debug output
                    error_log("Updated page: {$service['title']} with template: {$service['template']}");
                }
            } else {
                // Create new page
                $page_data = array(
                    'post_title' => $service['title'],
                    'post_name' => $service['slug'],
                    'post_content' => $service['content'],
                    'post_status' => 'publish',
                    'post_type' => 'page',
                    'post_author' => get_current_user_id()
                );
                
                $page_id = wp_insert_post($page_data);
                if ($page_id && !is_wp_error($page_id)) {
                    // Set the template immediately after creation
                    update_post_meta($page_id, '_wp_page_template', $service['template']);
                    $created_count++;
                    
                    // Debug output
                    error_log("Created page: {$service['title']} with template: {$service['template']}");
                }
            }
        }
        
        // Force flush rewrite rules multiple times to ensure they work
        flush_rewrite_rules();
        
        // Also try to force a permalink refresh
        global $wp_rewrite;
        $wp_rewrite->flush_rules();
        
        // Clear any caching that might interfere
        if (function_exists('wp_cache_flush')) {
            wp_cache_flush();
        }
        
        // Debug output
        error_log("Service pages created/updated. Created: {$created_count}, Updated: {$updated_count}");
        
        // Redirect with success message
        $redirect_url = add_query_arg(
            array(
                'page' => 'create_service_pages',
                'created' => $created_count,
                'updated' => $updated_count
            ),
            admin_url('admin.php')
        );
        
        wp_redirect($redirect_url);
        exit;
    }
}
add_action('admin_init', 'travelease_create_service_pages_action');

/**
 * Add admin menu for service page creation
 */
function travelease_add_admin_menu() {
    add_management_page(
        'Create Service Pages',
        'Create Service Pages',
        'manage_options',
        'create_service_pages',
        'travelease_create_service_pages_page'
    );
}
add_action('admin_menu', 'travelease_add_admin_menu');

/**
 * Admin page for creating service pages
 */
function travelease_create_service_pages_page() {
    $created = isset($_GET['created']) ? intval($_GET['created']) : 0;
    $updated = isset($_GET['updated']) ? intval($_GET['updated']) : 0;
    $synced  = isset($_GET['synced'])  ? intval($_GET['synced'])  : 0;
    ?>
    <div class="wrap">
        <h1>🚗 Create Service Pages - TravelEase Theme</h1>
        
        <?php if ($created > 0 || $updated > 0): ?>
            <div class="notice notice-success">
                <p><strong>Success!</strong> Created <?php echo $created; ?> new pages and updated <?php echo $updated; ?> existing pages.</p>
            </div>
        <?php endif; ?>
        <?php if ($synced > 0): ?>
            <div class="notice notice-success">
                <p><strong>Service content synced!</strong> Updated content for <?php echo $synced; ?> pages.</p>
            </div>
        <?php endif; ?>
        
        <div class="card">
            <h2>Service Pages to Create</h2>
            <p>This will create the following service pages with the correct templates:</p>
            <ul>
                <li><strong>City Taxi Service</strong> - Uses page-city-taxi.php template</li>
                <li><strong>Outstation Taxi Service</strong> - Uses page-services.php template</li>
                <li><strong>Wedding Cars Service</strong> - Uses page-services.php template</li>
                <li><strong>Airport Taxi Service</strong> - Uses page-services.php template</li>
                <li><strong>Mini Bus Service</strong> - Uses page-services.php template</li>
                <li><strong>Tempo Traveler Service</strong> - Uses page-services.php template</li>
                <li><strong>Innova Cabs Service</strong> - Uses page-services.php template</li>
                <li><strong>Ertiga Cabs Service</strong> - Uses page-services.php template</li>
            </ul>
            
            <p><strong>Note:</strong> If pages already exist, they will be updated with the correct template.</p>
            
            <a href="<?php echo wp_nonce_url(admin_url('admin.php?action=create_service_pages'), 'create_service_pages'); ?>" 
               class="button button-primary button-large" 
               onclick="return confirm('Are you sure you want to create/update all service pages?')">
                🚀 Create/Update All Service Pages
            </a>
        </div>
        
        <div class="card">
            <h2>Sync Service Content to Pages</h2>
            <p>This will import the latest content from <code>services/*.php</code> files into their corresponding WordPress pages so you can edit them in wp-admin. It will also apply the shared <code>page-services.php</code> template (or specific template where needed).</p>
            <p><strong>Note:</strong> This will overwrite existing page content for these services.</p>
            <a href="<?php echo wp_nonce_url(admin_url('admin.php?action=sync_service_content'), 'sync_service_content'); ?>"
               class="button button-secondary button-large"
               onclick="return confirm('This will overwrite existing content on service pages. Proceed?')">
                🔄 Sync Service Content Now
            </a>
        </div>

        <div class="card">
            <h2>After Creation</h2>
            <ol>
                <li>Go to your <a href="<?php echo home_url('/'); ?>" target="_blank">homepage</a> and test the service links</li>
                <li>Verify each service page loads correctly</li>
                <li>Customize the content for each service as needed</li>
                <li>Check that your permalinks are set to a pretty URL structure</li>
            </ol>
        </div>
    </div>
    <?php
}

/**
 * Admin action: Sync service content from services/*.php into WP Pages (force overwrite)
 */
function travelease_sync_service_content_action() {
    if (isset($_GET['action']) && $_GET['action'] === 'sync_service_content') {
        // Security checks
        if (!wp_verify_nonce($_GET['_wpnonce'], 'sync_service_content')) {
            wp_die('Security check failed');
        }
        if (!current_user_can('manage_options')) {
            wp_die('You do not have sufficient permissions to access this page.');
        }

        $map = [
            'city-taxi'        => ['file' => 'city-taxi.php',       'template' => 'page-city-taxi.php'],
            'wedding-cars'     => ['file' => 'wedding-cars.php',    'template' => 'page-services.php'],
            'airport-taxi'     => ['file' => 'airport-taxi.php',    'template' => 'page-services.php'],
            'mini-bus'         => ['file' => 'mini-bus.php',        'template' => 'page-services.php'],
            'tempo-traveler'   => ['file' => 'tempo-traveler.php',  'template' => 'page-services.php'],
            'innova-cabs'      => ['file' => 'innova-cabs.php',     'template' => 'page-services.php'],
            'ertiga-cabs'      => ['file' => 'ertiga-cabs.php',     'template' => 'page-services.php'],
            'sedan-cabs'       => ['file' => 'sedan-cabs.php',      'template' => 'page-services.php'],
            'coorg-taxi'       => ['file' => 'coorg-taxi.php',      'template' => 'page-services.php'],
            'bekal-taxi'       => ['file' => 'bekal-taxi.php',      'template' => 'page-services.php'],
            'temple-tour'      => ['file' => 'temple-tour.php',     'template' => 'page-services.php'],
        ];

        $services_dir = trailingslashit(get_template_directory()) . 'services/';
        $synced = 0;

        foreach ($map as $slug => $data) {
            $page = get_page_by_path($slug);
            if (!$page || is_wp_error($page)) {
                continue;
            }

            $path = $services_dir . $data['file'];
            if (!file_exists($path)) {
                continue;
            }

            $raw = file_get_contents($path);
            if ($raw === false) {
                continue;
            }

            // Overwrite page content unconditionally to reflect latest template content
            $update = wp_update_post([
                'ID'           => $page->ID,
                'post_content' => $raw,
            ], true);

            if (!is_wp_error($update)) {
                // Ensure the desired template is applied
                update_post_meta($page->ID, '_wp_page_template', $data['template']);
                $synced++;
            }
        }

        flush_rewrite_rules(false);

        $redirect_url = add_query_arg([
            'page'   => 'create_service_pages',
            'synced' => $synced,
        ], admin_url('admin.php'));

        wp_redirect($redirect_url);
        exit;
    }
}
add_action('admin_init', 'travelease_sync_service_content_action');

/**
 * Admin action to import/refresh service page contents from services/*.php
 */
function travelease_import_service_content_action() {
    if (isset($_GET['action']) && $_GET['action'] === 'import_service_content') {
        if (!wp_verify_nonce($_GET['_wpnonce'], 'import_service_content')) {
            wp_die('Security check failed');
        }
        if (!current_user_can('manage_options')) {
            wp_die('You do not have sufficient permissions to access this page.');
        }

        $map = [
            'city-taxi'       => 'city-taxi.php',
            'wedding-cars'    => 'wedding-cars.php',
            'airport-taxi'    => 'airport-taxi.php',
            'mini-bus'        => 'mini-bus.php',
            'tempo-traveler'  => 'tempo-traveler.php',
            'innova-cabs'     => 'innova-cabs.php',
            'ertiga-cabs'     => 'ertiga-cabs.php',
            'sedan-cabs'      => 'sedan-cabs.php',
            'coorg-taxi'      => 'coorg-taxi.php',
            'bekal-taxi'      => 'bekal-taxi.php',
            'temple-tour'     => 'temple-tour.php',
        ];

        $services_dir = trailingslashit(get_template_directory()) . 'services/';
        $imported = 0;
        $skipped  = 0;

        foreach ($map as $slug => $file) {
            $page = get_page_by_path($slug);
            if (!$page || is_wp_error($page)) { $skipped++; continue; }

            $path = $services_dir . $file;
            if (!file_exists($path)) { $skipped++; continue; }

            $raw = file_get_contents($path);
            if ($raw === false) { $skipped++; continue; }

            // Update content and ensure shared template
            wp_update_post([
                'ID'           => $page->ID,
                'post_content' => $raw,
            ]);

            $desired_template = ($slug === 'city-taxi') ? 'page-city-taxi.php' : 'page-services.php';
            update_post_meta($page->ID, '_wp_page_template', $desired_template);

            $imported++;
        }

        flush_rewrite_rules(false);

        $redirect_url = add_query_arg(
            [
                'page'     => 'import_service_content',
                'imported' => $imported,
                'skipped'  => $skipped,
            ],
            admin_url('admin.php')
        );

        wp_redirect($redirect_url);
        exit;
    }
}
add_action('admin_init', 'travelease_import_service_content_action');

/**
 * Add admin menu page for importing service content
 */
function travelease_add_import_menu() {
    add_management_page(
        'Import Service Content',
        'Import Service Content',
        'manage_options',
        'import_service_content',
        function () {
            $imported = isset($_GET['imported']) ? intval($_GET['imported']) : 0;
            $skipped  = isset($_GET['skipped']) ? intval($_GET['skipped']) : 0;
            ?>
            <div class="wrap">
                <h1>📥 Import Service Content</h1>

                <?php if ($imported || $skipped): ?>
                    <div class="notice notice-success"><p>
                        Imported: <strong><?php echo esc_html($imported); ?></strong> | Skipped: <strong><?php echo esc_html($skipped); ?></strong>
                    </p></div>
                <?php endif; ?>

                <p>This will load/update the content of each service page from the files in <code>services/</code> so they are editable in WordPress.</p>
                <p>It will also assign the correct template (shared <code>page-services.php</code> or specific where needed).</p>

                <a href="<?php echo wp_nonce_url(admin_url('admin.php?action=import_service_content'), 'import_service_content'); ?>" class="button button-primary button-large" onclick="return confirm('Import/refresh all service page content now?');">Run Import</a>
            </div>
            <?php
        }
    );
}
add_action('admin_menu', 'travelease_add_import_menu');

/**
 * Register custom fields for Innova Cabs service page
 */
function travelease_register_innova_cabs_fields() {
    // Check if we're on the Innova Cabs page
    global $post;
    if (!$post || $post->post_name !== 'innova-cabs') {
        return;
    }
    
    add_meta_box(
        'innova_cabs_content',
        'Innova Cabs Content',
        'travelease_innova_cabs_meta_box_callback',
        'page',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'travelease_register_innova_cabs_fields');

/**
 * Meta box callback for Innova Cabs content
 */
function travelease_innova_cabs_meta_box_callback($post) {
    wp_nonce_field('innova_cabs_meta_box', 'innova_cabs_meta_box_nonce');
    
    // Get existing values
    $hero_title = get_post_meta($post->ID, 'hero_title', true);
    $hero_description = get_post_meta($post->ID, 'hero_description', true);
    $main_title = get_post_meta($post->ID, 'main_title', true);
    $main_description = get_post_meta($post->ID, 'main_description', true);
    $rental_title = get_post_meta($post->ID, 'rental_title', true);
    $rental_description = get_post_meta($post->ID, 'rental_description', true);
    $why_choose_title = get_post_meta($post->ID, 'why_choose_title', true);
    $why_choose_description = get_post_meta($post->ID, 'why_choose_description', true);
    $luxury_title = get_post_meta($post->ID, 'luxury_title', true);
    $luxury_description = get_post_meta($post->ID, 'luxury_description', true);
    $variants_title = get_post_meta($post->ID, 'variants_title', true);
    $outstation_title = get_post_meta($post->ID, 'outstation_title', true);
    $outstation_description = get_post_meta($post->ID, 'outstation_description', true);
    $fleet_title = get_post_meta($post->ID, 'fleet_title', true);
    $fleet_description = get_post_meta($post->ID, 'fleet_description', true);
    $pricing_title = get_post_meta($post->ID, 'pricing_title', true);
    $pricing_description = get_post_meta($post->ID, 'pricing_description', true);
    $standout_title = get_post_meta($post->ID, 'standout_title', true);
    $standout_description = get_post_meta($post->ID, 'standout_description', true);
    $discover_title = get_post_meta($post->ID, 'discover_title', true);
    $discover_description = get_post_meta($post->ID, 'discover_description', true);
    $routes_title = get_post_meta($post->ID, 'routes_title', true);
    $booking_title = get_post_meta($post->ID, 'booking_title', true);
    $booking_intro = get_post_meta($post->ID, 'booking_intro', true);
    $booking_conclusion = get_post_meta($post->ID, 'booking_conclusion', true);
    $partnership_title = get_post_meta($post->ID, 'partnership_title', true);
    $partnership_description = get_post_meta($post->ID, 'partnership_description', true);
    
    ?>
    <style>
    .innova-field-group {
        margin-bottom: 20px;
        padding: 15px;
        border: 1px solid #ddd;
        background: #f9f9f9;
    }
    .innova-field-group h4 {
        margin-top: 0;
        color: #0073aa;
    }
    .innova-field-group textarea {
        width: 100%;
        height: 100px;
    }
    .innova-field-group input[type="text"] {
        width: 100%;
    }
    </style>
    
    <div class="innova-field-group">
        <h4>Hero Section</h4>
        <label for="hero_title">Hero Title:</label>
        <input type="text" id="hero_title" name="hero_title" value="<?php echo esc_attr($hero_title); ?>" />
        
        <label for="hero_description">Hero Description:</label>
        <textarea id="hero_description" name="hero_description"><?php echo esc_textarea($hero_description); ?></textarea>
    </div>
    
    <div class="innova-field-group">
        <h4>Main Content</h4>
        <label for="main_title">Main Title:</label>
        <input type="text" id="main_title" name="main_title" value="<?php echo esc_attr($main_title); ?>" />
        
        <label for="main_description">Main Description:</label>
        <textarea id="main_description" name="main_description"><?php echo esc_textarea($main_description); ?></textarea>
    </div>
    
    <div class="innova-field-group">
        <h4>Rental Section</h4>
        <label for="rental_title">Rental Title:</label>
        <input type="text" id="rental_title" name="rental_title" value="<?php echo esc_attr($rental_title); ?>" />
        
        <label for="rental_description">Rental Description:</label>
        <textarea id="rental_description" name="rental_description"><?php echo esc_textarea($rental_description); ?></textarea>
    </div>
    
    <div class="innova-field-group">
        <h4>Why Choose Section</h4>
        <label for="why_choose_title">Why Choose Title:</label>
        <input type="text" id="why_choose_title" name="why_choose_title" value="<?php echo esc_attr($why_choose_title); ?>" />
        
        <label for="why_choose_description">Why Choose Description:</label>
        <textarea id="why_choose_description" name="why_choose_description"><?php echo esc_textarea($why_choose_description); ?></textarea>
    </div>
    
    <div class="innova-field-group">
        <h4>Luxury Section</h4>
        <label for="luxury_title">Luxury Title:</label>
        <input type="text" id="luxury_title" name="luxury_title" value="<?php echo esc_attr($luxury_title); ?>" />
        
        <label for="luxury_description">Luxury Description:</label>
        <textarea id="luxury_description" name="luxury_description"><?php echo esc_textarea($luxury_description); ?></textarea>
    </div>
    
    <div class="innova-field-group">
        <h4>Vehicle Variants</h4>
        <label for="variants_title">Variants Title:</label>
        <input type="text" id="variants_title" name="variants_title" value="<?php echo esc_attr($variants_title); ?>" />
    </div>
    
    <div class="innova-field-group">
        <h4>Outstation Section</h4>
        <label for="outstation_title">Outstation Title:</label>
        <input type="text" id="outstation_title" name="outstation_title" value="<?php echo esc_attr($outstation_title); ?>" />
        
        <label for="outstation_description">Outstation Description:</label>
        <textarea id="outstation_description" name="outstation_description"><?php echo esc_textarea($outstation_description); ?></textarea>
    </div>
    
    <div class="innova-field-group">
        <h4>Fleet Section</h4>
        <label for="fleet_title">Fleet Title:</label>
        <input type="text" id="fleet_title" name="fleet_title" value="<?php echo esc_attr($fleet_title); ?>" />
        
        <label for="fleet_description">Fleet Description:</label>
        <textarea id="fleet_description" name="fleet_description"><?php echo esc_textarea($fleet_description); ?></textarea>
    </div>
    
    <div class="innova-field-group">
        <h4>Pricing Section</h4>
        <label for="pricing_title">Pricing Title:</label>
        <input type="text" id="pricing_title" name="pricing_title" value="<?php echo esc_attr($pricing_title); ?>" />
        
        <label for="pricing_description">Pricing Description:</label>
        <textarea id="pricing_description" name="pricing_description"><?php echo esc_textarea($pricing_description); ?></textarea>
    </div>
    
    <div class="innova-field-group">
        <h4>Standout Section</h4>
        <label for="standout_title">Standout Title:</label>
        <input type="text" id="standout_title" name="standout_title" value="<?php echo esc_attr($standout_title); ?>" />
        
        <label for="standout_description">Standout Description:</label>
        <textarea id="standout_description" name="standout_description"><?php echo esc_textarea($standout_description); ?></textarea>
    </div>
    
    <div class="innova-field-group">
        <h4>Discover Section</h4>
        <label for="discover_title">Discover Title:</label>
        <input type="text" id="discover_title" name="discover_title" value="<?php echo esc_attr($discover_title); ?>" />
        
        <label for="discover_description">Discover Description:</label>
        <textarea id="discover_description" name="discover_description"><?php echo esc_textarea($discover_description); ?></textarea>
    </div>
    
    <div class="innova-field-group">
        <h4>Routes Section</h4>
        <label for="routes_title">Routes Title:</label>
        <input type="text" id="routes_title" name="routes_title" value="<?php echo esc_attr($routes_title); ?>" />
    </div>
    
    <div class="innova-field-group">
        <h4>Booking Section</h4>
        <label for="booking_title">Booking Title:</label>
        <input type="text" id="booking_title" name="booking_title" value="<?php echo esc_attr($booking_title); ?>" />
        
        <label for="booking_intro">Booking Introduction:</label>
        <textarea id="booking_intro" name="booking_intro"><?php echo esc_textarea($booking_intro); ?></textarea>
        
        <label for="booking_conclusion">Booking Conclusion:</label>
        <textarea id="booking_conclusion" name="booking_conclusion"><?php echo esc_textarea($booking_conclusion); ?></textarea>
    </div>
    
    <div class="innova-field-group">
        <h4>Partnership Section</h4>
        <label for="partnership_title">Partnership Title:</label>
        <input type="text" id="partnership_title" name="partnership_title" value="<?php echo esc_attr($partnership_title); ?>" />
        
        <label for="partnership_description">Partnership Description:</label>
        <textarea id="partnership_description" name="partnership_description"><?php echo esc_textarea($partnership_description); ?></textarea>
    </div>
    
    <p><strong>Note:</strong> Leave fields empty to use default content. The page will display default content when custom fields are not set.</p>
    <?php
}

/**
 * Save custom fields for Innova Cabs
 */
function travelease_save_innova_cabs_fields($post_id) {
    // Check if our nonce is set
    if (!isset($_POST['innova_cabs_meta_box_nonce'])) {
        return;
    }
    
    // Verify that the nonce is valid
    if (!wp_verify_nonce($_POST['innova_cabs_meta_box_nonce'], 'innova_cabs_meta_box')) {
        return;
    }
    
    // If this is an autosave, our form has not been submitted, so we don't want to do anything
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    // Check the user's permissions
    if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return;
        }
    } else {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }
    
    // Save the custom fields
    $fields = [
        'hero_title', 'hero_description', 'main_title', 'main_description',
        'rental_title', 'rental_description', 'why_choose_title', 'why_choose_description',
        'luxury_title', 'luxury_description', 'variants_title', 'outstation_title',
        'outstation_description', 'fleet_title', 'fleet_description', 'pricing_title',
        'pricing_description', 'standout_title', 'standout_description', 'discover_title',
        'discover_description', 'routes_title', 'booking_title', 'booking_intro',
        'booking_conclusion', 'partnership_title', 'partnership_description'
    ];
    
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_textarea_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'travelease_save_innova_cabs_fields');

/**
 * Register custom meta boxes for Ertiga Cabs page
 */
function travelease_register_ertiga_cabs_fields() {
    // Check if we're on the Ertiga Cabs page
    global $post;
    if (!$post || $post->post_name !== 'ertiga-cabs') {
        return;
    }
    
    add_meta_box(
        'ertiga_cabs_content',
        'Ertiga Cabs Content',
        'travelease_ertiga_cabs_meta_box_callback',
        'page',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'travelease_register_ertiga_cabs_fields');

/**
 * Meta box callback for Ertiga Cabs content
 */
function travelease_ertiga_cabs_meta_box_callback($post) {
    wp_nonce_field('ertiga_cabs_meta_box', 'ertiga_cabs_meta_box_nonce');
    
    // Get existing values
    $hero_title = get_post_meta($post->ID, 'hero_title', true);
    $hero_description = get_post_meta($post->ID, 'hero_description', true);
    $why_choose_title = get_post_meta($post->ID, 'why_choose_title', true);
    $why_choose_description = get_post_meta($post->ID, 'why_choose_description', true);
    $services_title = get_post_meta($post->ID, 'services_title', true);
    $services_description = get_post_meta($post->ID, 'services_description', true);
    $packages_title = get_post_meta($post->ID, 'packages_title', true);
    $packages_description = get_post_meta($post->ID, 'packages_description', true);
    $rental_benefits_title = get_post_meta($post->ID, 'rental_benefits_title', true);
    $rental_benefits_description = get_post_meta($post->ID, 'rental_benefits_description', true);
    $safety_title = get_post_meta($post->ID, 'safety_title', true);
    $safety_description = get_post_meta($post->ID, 'safety_description', true);
    $routes_title = get_post_meta($post->ID, 'routes_title', true);
    $routes_description = get_post_meta($post->ID, 'routes_description', true);
    $booking_title = get_post_meta($post->ID, 'booking_title', true);
    $booking_description = get_post_meta($post->ID, 'booking_description', true);
    $why_tsm_title = get_post_meta($post->ID, 'why_tsm_title', true);
    $why_tsm_description = get_post_meta($post->ID, 'why_tsm_description', true);
    
    ?>
    <style>
    .ertiga-field-group {
        margin-bottom: 20px;
        padding: 15px;
        border: 1px solid #ddd;
        background: #f9f9f9;
    }
    .ertiga-field-group h4 {
        margin-top: 0;
        color: #0073aa;
    }
    .ertiga-field-group textarea {
        width: 100%;
        height: 100px;
    }
    .ertiga-field-group input[type="text"] {
        width: 100%;
    }
    </style>
    
    <div class="ertiga-field-group">
        <h4>Hero Section</h4>
        <label for="hero_title">Hero Title:</label>
        <input type="text" id="hero_title" name="hero_title" value="<?php echo esc_attr($hero_title); ?>" />
        
        <label for="hero_description">Hero Description:</label>
        <textarea id="hero_description" name="hero_description"><?php echo esc_textarea($hero_description); ?></textarea>
    </div>
    
    <div class="ertiga-field-group">
        <h4>Why Choose Section</h4>
        <label for="why_choose_title">Why Choose Title:</label>
        <input type="text" id="why_choose_title" name="why_choose_title" value="<?php echo esc_attr($why_choose_title); ?>" />
        
        <label for="why_choose_description">Why Choose Description:</label>
        <textarea id="why_choose_description" name="why_choose_description"><?php echo esc_textarea($why_choose_description); ?></textarea>
    </div>
    
    <div class="ertiga-field-group">
        <h4>Services Section</h4>
        <label for="services_title">Services Title:</label>
        <input type="text" id="services_title" name="services_title" value="<?php echo esc_attr($services_title); ?>" />
        
        <label for="services_description">Services Description:</label>
        <textarea id="services_description" name="services_description"><?php echo esc_textarea($services_description); ?></textarea>
    </div>
    
    <div class="ertiga-field-group">
        <h4>Packages Section</h4>
        <label for="packages_title">Packages Title:</label>
        <input type="text" id="packages_title" name="packages_title" value="<?php echo esc_attr($packages_title); ?>" />
        
        <label for="packages_description">Packages Description:</label>
        <textarea id="packages_description" name="packages_description"><?php echo esc_textarea($packages_description); ?></textarea>
    </div>
    
    <div class="ertiga-field-group">
        <h4>Rental Benefits Section</h4>
        <label for="rental_benefits_title">Rental Benefits Title:</label>
        <input type="text" id="rental_benefits_title" name="rental_benefits_title" value="<?php echo esc_attr($rental_benefits_title); ?>" />
        
        <label for="rental_benefits_description">Rental Benefits Description:</label>
        <textarea id="rental_benefits_description" name="rental_benefits_description"><?php echo esc_textarea($rental_benefits_description); ?></textarea>
    </div>
    
    <div class="ertiga-field-group">
        <h4>Safety Section</h4>
        <label for="safety_title">Safety Title:</label>
        <input type="text" id="safety_title" name="safety_title" value="<?php echo esc_attr($safety_title); ?>" />
        
        <label for="safety_description">Safety Description:</label>
        <textarea id="safety_description" name="safety_description"><?php echo esc_textarea($safety_description); ?></textarea>
    </div>
    
    <div class="ertiga-field-group">
        <h4>Routes Section</h4>
        <label for="routes_title">Routes Title:</label>
        <input type="text" id="routes_title" name="routes_title" value="<?php echo esc_attr($routes_title); ?>" />
        
        <label for="routes_description">Routes Description:</label>
        <textarea id="routes_description" name="routes_description"><?php echo esc_textarea($routes_description); ?></textarea>
    </div>
    
    <div class="ertiga-field-group">
        <h4>Booking Section</h4>
        <label for="booking_title">Booking Title:</label>
        <input type="text" id="booking_title" name="booking_title" value="<?php echo esc_attr($booking_title); ?>" />
        
        <label for="booking_description">Booking Description:</label>
        <textarea id="booking_description" name="booking_description"><?php echo esc_textarea($booking_description); ?></textarea>
    </div>
    
    <div class="ertiga-field-group">
        <h4>Why TSM Section</h4>
        <label for="why_tsm_title">Why TSM Title:</label>
        <input type="text" id="why_tsm_title" name="why_tsm_title" value="<?php echo esc_attr($why_tsm_title); ?>" />
        
        <label for="why_tsm_description">Why TSM Description:</label>
        <textarea id="why_tsm_description" name="why_tsm_description"><?php echo esc_textarea($why_tsm_description); ?></textarea>
    </div>
    
    <p><strong>Note:</strong> Leave fields empty to use default content. The page will display default content when custom fields are not set.</p>
    <?php
}

/**
 * Save custom fields for Ertiga Cabs
 */
function travelease_save_ertiga_cabs_fields($post_id) {
    // Check if our nonce is set
    if (!isset($_POST['ertiga_cabs_meta_box_nonce'])) {
        return;
    }
    
    // Verify that the nonce is valid
    if (!wp_verify_nonce($_POST['ertiga_cabs_meta_box_nonce'], 'ertiga_cabs_meta_box')) {
        return;
    }
    
    // If this is an autosave, our form has not been submitted, so we don't want to do anything
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    // Check the user's permissions
    if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return;
        }
    } else {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }
    
    // Save the custom fields
    $fields = [
        'hero_title', 'hero_description', 'why_choose_title', 'why_choose_description',
        'services_title', 'services_description', 'packages_title', 'packages_description',
        'rental_benefits_title', 'rental_benefits_description', 'safety_title', 'safety_description',
        'routes_title', 'routes_description', 'booking_title', 'booking_description',
        'why_tsm_title', 'why_tsm_description'
    ];
    
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_textarea_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'travelease_save_ertiga_cabs_fields');


