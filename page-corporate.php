<?php
/**
 * Template Name: Corporate Page
 * 
 * This is a custom template for the Corporate page
 */

get_header(); ?>

<style>
.corporate-hero {
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo get_template_directory_uri(); ?>/images/corporate-bg.jpg');
    background-size: cover;
    background-position: center;
    padding: 120px 0 80px;
    color: #fff;
    text-align: center;
}

.corporate-hero h1 {
    font-size: 3rem;
    margin-bottom: 20px;
    font-weight: 700;
}

.corporate-hero p {
    font-size: 1.2rem;
    margin-bottom: 30px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.corporate-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 80px 20px;
}

.corporate-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    margin-bottom: 80px;
    align-items: center;
}

.corporate-content h2 {
    font-size: 2.5rem;
    margin-bottom: 30px;
    color: #333;
}

.corporate-content p {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #666;
    margin-bottom: 30px;
}

.corporate-features {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 40px;
    margin-bottom: 80px;
}

.corporate-feature {
    background: #fff;
    padding: 40px 30px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease;
}

.corporate-feature:hover {
    transform: translateY(-10px);
}

.corporate-feature-icon {
    width: 80px;
    height: 80px;
    background: var(--primary-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 25px;
    color: #fff;
    font-size: 2rem;
}

.corporate-feature h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
    color: #333;
}

.corporate-feature p {
    color: #666;
    line-height: 1.6;
}

.corporate-services {
    background: #f8f9fa;
    padding: 80px 0;
    margin: 80px 0;
}

.corporate-services h2 {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 50px;
    color: #333;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 40px;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.service-card {
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.service-card:hover {
    transform: translateY(-5px);
}

.service-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.service-card-content {
    padding: 30px;
}

.service-card h3 {
    font-size: 1.3rem;
    margin-bottom: 15px;
    color: #333;
}

.service-card p {
    color: #666;
    line-height: 1.6;
    margin-bottom: 20px;
}

.service-card .price {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 20px;
}

.service-card .btn {
    display: inline-block;
    padding: 12px 25px;
    background: var(--primary-color);
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background 0.3s ease;
}

.service-card .btn:hover {
    background: var(--primary-dark);
}

.corporate-cta {
    background: var(--primary-color);
    color: #fff;
    text-align: center;
    padding: 80px 20px;
    margin: 80px 0;
}

.corporate-cta h2 {
    font-size: 2.5rem;
    margin-bottom: 20px;
}

.corporate-cta p {
    font-size: 1.2rem;
    margin-bottom: 40px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.corporate-cta .btn {
    display: inline-block;
    padding: 15px 40px;
    background: #fff;
    color: var(--primary-color);
    text-decoration: none;
    border-radius: 5px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.corporate-cta .btn:hover {
    background: #f8f9fa;
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .corporate-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .corporate-hero h1 {
        font-size: 2rem;
    }
    
    .corporate-content h2 {
        font-size: 2rem;
    }
    
    .services-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<!-- Hero Section -->
<section class="corporate-hero">
    <div class="container">
        <h1>Corporate Travel Solutions</h1>
        <p>Professional travel services designed for businesses. Reliable, efficient, and cost-effective transportation solutions for your corporate needs.</p>
        <a href="#contact" class="btn btn-primary">Get Corporate Quote</a>
    </div>
</section>

<!-- Corporate Content -->
<section class="corporate-container">
    <div class="corporate-grid">
        <div class="corporate-content">
            <h2>Why Choose Our Corporate Services?</h2>
            <p>We understand the unique needs of corporate travel. Our services are designed to provide reliable, professional, and cost-effective transportation solutions that help your business operate smoothly.</p>
            <p>With years of experience serving corporate clients, we offer flexible booking options, detailed reporting, and dedicated account management to ensure your travel needs are met efficiently.</p>
            <a href="#contact" class="btn btn-primary">Contact Sales Team</a>
        </div>
        <div class="corporate-image">
            <img src="<?php echo get_template_directory_uri(); ?>/images/corporate-main.jpg" alt="Corporate Travel Services">
        </div>
    </div>
</section>

<!-- Corporate Features -->
<section class="corporate-container">
    <div class="corporate-features">
        <div class="corporate-feature">
            <div class="corporate-feature-icon">
                <i class="fas fa-clock"></i>
            </div>
            <h3>24/7 Availability</h3>
            <p>Round-the-clock service availability for your business travel needs, including emergency transportation.</p>
        </div>
        
        <div class="corporate-feature">
            <div class="corporate-feature-icon">
                <i class="fas fa-chart-line"></i>
            </div>
            <h3>Detailed Reporting</h3>
            <p>Comprehensive travel reports and analytics to help you track expenses and optimize your travel budget.</p>
        </div>
        
        <div class="corporate-feature">
            <div class="corporate-feature-icon">
                <i class="fas fa-user-tie"></i>
            </div>
            <h3>Professional Drivers</h3>
            <p>Experienced, licensed, and background-checked drivers who understand corporate travel requirements.</p>
        </div>
        
        <div class="corporate-feature">
            <div class="corporate-feature-icon">
                <i class="fas fa-credit-card"></i>
            </div>
            <h3>Flexible Billing</h3>
            <p>Multiple billing options including monthly invoicing, credit terms, and expense management integration.</p>
        </div>
        
        <div class="corporate-feature">
            <div class="corporate-feature-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <h3>Fleet Insurance</h3>
            <p>Fully insured vehicles with comprehensive coverage for your peace of mind and compliance requirements.</p>
        </div>
        
        <div class="corporate-feature">
            <div class="corporate-feature-icon">
                <i class="fas fa-headset"></i>
            </div>
            <h3>Dedicated Support</h3>
            <p>Dedicated account managers and 24/7 customer support to handle all your corporate travel needs.</p>
        </div>
    </div>
</section>

<!-- Corporate Services -->
<section class="corporate-services">
    <div class="container">
        <h2>Corporate Services</h2>
        <div class="services-grid">
            <div class="service-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/airport-transfer.jpg" alt="Airport Transfers">
                <div class="service-card-content">
                    <h3>Airport Transfers</h3>
                    <p>Reliable airport pickup and drop-off services for executives and business travelers.</p>
                    <div class="price">From $50</div>
                    <a href="#contact" class="btn">Book Now</a>
                </div>
            </div>
            
            <div class="service-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/city-tours.jpg" alt="City Tours">
                <div class="service-card-content">
                    <h3>City Tours</h3>
                    <p>Professional city tours for corporate events, client entertainment, and team building.</p>
                    <div class="price">From $100</div>
                    <a href="#contact" class="btn">Book Now</a>
                </div>
            </div>
            
            <div class="service-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/event-transport.jpg" alt="Event Transportation">
                <div class="service-card-content">
                    <h3>Event Transportation</h3>
                    <p>Transportation services for corporate events, conferences, and special occasions.</p>
                    <div class="price">From $200</div>
                    <a href="#contact" class="btn">Book Now</a>
                </div>
            </div>
            
            <div class="service-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/executive-travel.jpg" alt="Executive Travel">
                <div class="service-card-content">
                    <h3>Executive Travel</h3>
                    <p>Premium transportation services for executives and VIP clients with luxury vehicles.</p>
                    <div class="price">From $150</div>
                    <a href="#contact" class="btn">Book Now</a>
                </div>
            </div>
            
            <div class="service-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/group-transport.jpg" alt="Group Transportation">
                <div class="service-card-content">
                    <h3>Group Transportation</h3>
                    <p>Transportation for corporate groups, team outings, and company events.</p>
                    <div class="price">From $300</div>
                    <a href="#contact" class="btn">Book Now</a>
                </div>
            </div>
            
            <div class="service-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/contract-services.jpg" alt="Contract Services">
                <div class="service-card-content">
                    <h3>Contract Services</h3>
                    <p>Long-term transportation contracts with customized pricing and dedicated vehicles.</p>
                    <div class="price">Custom Pricing</div>
                    <a href="#contact" class="btn">Get Quote</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Corporate CTA -->
<section class="corporate-cta">
    <div class="container">
        <h2>Ready to Partner With Us?</h2>
        <p>Join hundreds of businesses that trust us with their corporate travel needs. Get in touch with our sales team to discuss your requirements and receive a customized quote.</p>
        <a href="#contact" class="btn">Contact Sales Team</a>
    </div>
</section>

<?php get_footer(); ?>
