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

.service-hero-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

.service-hero-buttons .btn {
    padding: 15px 30px;
    font-size: 1.1rem;
    font-weight: 600;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.3s ease;
    display: inline-block;
}

.service-hero-buttons .btn-outline {
    background: transparent;
    color: #fff;
    border: 2px solid #fff;
}

.service-hero-buttons .btn-outline:hover {
    background: #fff;
    color: #333;
    transform: translateY(-2px);
}

.service-details {
    padding: 40px 0;
}

.service-content {
    display: block;
    max-width: 800px;
    margin: 0 auto 40px auto;
    padding: 0 20px;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin: 30px auto;
    max-width: 900px;
}

.feature-item {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    transition: transform 0.2s ease;
}

.feature-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.feature-item i {
    font-size: 2rem;
    color: var(--primary-color, #FF5252);
    margin-bottom: 10px;
}

.booking-sidebar {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 10px;
    position: sticky;
    top: 90px;
    height: fit-content;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}

.contact-info-card {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 10px;
    margin-bottom: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}

.contact-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 20px;
}

.contact-item i {
    font-size: 1.2rem;
    color: var(--primary-color, #FF5252);
    margin-right: 15px;
    margin-top: 5px;
}

.contact-item h4 {
    margin: 0 0 5px 0;
    font-size: 1rem;
}

.contact-item p {
    margin: 0;
    font-size: 0.9rem;
}

.pricing-card {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}

.pricing-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    padding: 10px 0;
    border-bottom: 1px solid #e9ecef;
}

.pricing-item:last-child {
    border-bottom: none;
}

.rate {
    font-size: 1.5rem;
    font-weight: bold;
}

.main-content h2 {
    font-size: clamp(1.8rem, 5vw, 2.2rem);
    text-align: center;
    margin-bottom: 20px;
}

.main-content h3 {
    font-size: clamp(1.5rem, 4vw, 1.8rem);
    text-align: center;
    margin-bottom: 15px;
}

.main-content h4 {
    font-size: clamp(1.2rem, 3.5vw, 1.4rem);
    margin-bottom: 15px;
}

.main-content p {
    font-size: clamp(0.95rem, 2.5vw, 1.1rem);
    line-height: 1.6;
    text-align: justify;
    margin-bottom: 20px;
}

.service-description {
    margin: 25px 0;
}

.service-description h4 {
    color: #333;
    margin-bottom: 10px;
    font-size: 1.1rem;
}

.service-description p {
    margin-bottom: 15px;
}

.service-description ul,
.service-description ol {
    margin: 15px 0;
    padding-left: 20px;
}

.service-description li {
    margin-bottom: 8px;
}

/* Desktop-only full-width adjustments for Service Pages */
@media screen and (min-width: 1025px) {
    /* Make the service hero full-bleed */
    .service-hero {
        width: 100vw;
        margin-left: calc(50% - 50vw);
        margin-right: calc(50% - 50vw);
    }

    /* Make service page sections use full-width container on desktop */
    .service-hero .container,
    .service-details .container,
    .service-faq .container,
    .related-services .container {
        max-width: 100%;
        padding-left: 50px;
        padding-right: 50px;
    }

    /* Force service content to be single column (col-12) on desktop */
    .service-content {
        display: block !important;
        width: 100% !important;
        max-width: 100% !important;
    }
    
    .service-main,
    .main-content {
        width: 100% !important;
        max-width: 100% !important;
        display: block !important;
    }
    
    .service-sidebar {
        width: 100% !important;
        max-width: 100% !important;
        display: block !important;
    }
}

/* Base styles for service pages - ensure full width */
.service-content {
    width: 100%;
    max-width: 100%;
}

.service-main,
.main-content {
    width: 100%;
    max-width: 100%;
}

/* Responsive design for Innova Cabs and other service pages */
@media screen and (max-width: 1024px) {
    .service-hero .container,
    .service-details .container,
    .service-faq .container,
    .related-services .container {
        padding-left: 30px;
        padding-right: 30px;
    }
    
    .service-content {
        max-width: 90%;
        padding: 0 15px;
    }
    
    .features-grid {
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        max-width: 95%;
    }
    
    .areas-grid {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }
}

@media screen and (max-width: 768px) {
    .service-hero .container,
    .service-details .container,
    .service-faq .container,
    .related-services .container {
        padding-left: 20px;
        padding-right: 20px;
    }
    
    .service-content {
        max-width: 95%;
        padding: 0 10px;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
        gap: 15px;
        max-width: 100%;
    }
    
    .areas-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .service-hero h1 {
        font-size: clamp(2rem, 6vw, 2.5rem);
    }
    
    .service-hero p {
        font-size: clamp(1rem, 3vw, 1.2rem);
    }
    
    .service-hero-buttons {
        flex-direction: column;
        align-items: center;
        gap: 15px;
    }
    
    .service-hero-buttons .btn {
        width: 100%;
        max-width: 300px;
        text-align: center;
        padding: 18px 20px;
    }
    
    .main-content h2 {
        font-size: clamp(1.8rem, 5vw, 2.2rem);
    }
    
    .main-content h3 {
        font-size: clamp(1.5rem, 4vw, 1.8rem);
    }
    
    .main-content h4 {
        font-size: clamp(1.2rem, 3.5vw, 1.4rem);
    }
    
    .main-content p {
        font-size: clamp(0.95rem, 2.5vw, 1.1rem);
        line-height: 1.6;
    }
}

@media screen and (max-width: 480px) {
    .service-hero .container,
    .service-details .container,
    .service-faq .container,
    .related-services .container {
        padding-left: 15px;
        padding-right: 15px;
    }
    
    .service-hero h1 {
        font-size: clamp(1.8rem, 7vw, 2.2rem);
    }
    
    .service-hero p {
        font-size: clamp(0.9rem, 3.5vw, 1.1rem);
    }
    
    .main-content h2 {
        font-size: clamp(1.6rem, 6vw, 2rem);
    }
    
    .main-content h3 {
        font-size: clamp(1.3rem, 5vw, 1.6rem);
    }
    
    .main-content h4 {
        font-size: clamp(1.1rem, 4vw, 1.3rem);
    }
    
    .main-content p {
        font-size: clamp(0.9rem, 3vw, 1rem);
        line-height: 1.5;
    }
    
    .feature-item {
        padding: 20px 15px;
    }
    
    .area-category {
        padding: 15px;
    }
}
</style>

<?php
// If this is the Innova Cabs page, include the comprehensive content
if ($current_page_slug === 'innova-cabs-in-mangalore') {
    include get_template_directory() . '/services/innova-cabs.php';
    get_footer();
    return;
}

// If this is the Ertiga Cabs page, include the comprehensive content
if ($current_page_slug === 'ertiga-cabs') {
    include get_template_directory() . '/services/ertiga-cabs.php';
    get_footer();
    return;
}
?>

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
