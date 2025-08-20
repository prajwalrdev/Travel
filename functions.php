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
    echo '<li><a href="' . esc_url(travelease_section_url('about')) . '">About Us</a></li>';
    echo '<li><a href="' . esc_url(travelease_section_url('services')) . '">Services</a></li>';
    echo '<li class="dropdown">';
    echo '<a href="#">Subdomains <i class="fas fa-chevron-down"></i></a>';
    echo '<ul class="dropdown-menu">';
    echo '<li><a href="' . esc_url(home_url('/blog/')) . '" target="_blank" rel="noopener">Blog</a></li>';
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
            [ 'title' => 'Booking',   'slug' => 'booking',   'template' => 'page-booking.php' ],
            [ 'title' => 'Corporate', 'slug' => 'corporate', 'template' => 'page-corporate.php' ],
            [ 'title' => 'Blog',      'slug' => 'blog',      'template' => 'page-blog.php' ],
            [ 'title' => 'Support',   'slug' => 'support',   'template' => '' ],

            // Service pages to auto-create
            [ 'title' => 'City Taxi',               'slug' => 'city-taxi',               'template' => 'services/city-taxi.php' ],
            [ 'title' => 'Outstation Taxi',         'slug' => 'outstation-taxi',         'template' => 'services/outstation-taxi.php' ],
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
        foreach (['Home', 'Booking', 'Corporate', 'Blog', 'Support'] as $title) {
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
        [ 'title' => 'Booking',   'slug' => 'booking',   'template' => 'page-booking.php' ],
        [ 'title' => 'Corporate', 'slug' => 'corporate', 'template' => 'page-corporate.php' ],
        [ 'title' => 'Blog',      'slug' => 'blog',      'template' => 'page-blog.php' ],
        [ 'title' => 'Support',   'slug' => 'support',   'template' => '' ],

        [ 'title' => 'City Taxi',               'slug' => 'city-taxi',               'template' => 'services/city-taxi.php' ],
        [ 'title' => 'Outstation Taxi',         'slug' => 'outstation-taxi',         'template' => 'services/outstation-taxi.php' ],
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
