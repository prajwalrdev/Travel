<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
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
                    <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                </div>
                <nav>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary-menu',
                        'menu_class' => 'nav-links',
                        'container' => false,
                        'fallback_cb' => 'travelease_fallback_menu'
                    ));
                    ?>
                </nav>
                <div class="mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </div>
    </header>
