<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer">

<style>
/* Hero Section Styles */
.service-hero {
    background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?php 
        $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
        if ($featured_image) {
            echo esc_url($featured_image);
        } else {
            echo get_template_directory_uri() . '/images/hero-bg.jpg';
        }
    ?>');
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

/* Main Content Styles */
.service-details {
    padding: 40px 0;
}

.service-content {
    display: block;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Card Layout Styles */
.content-cards {
    display: flex;
    flex-direction: column;
    gap: 30px;
    margin: 40px 0;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
}

.content-card {
    background: #fff;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
}

.content-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.12);
}

.card-header {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 2px solid #f8f9fa;
}

.card-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #FF5252, #FF6B6B);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 20px;
    flex-shrink: 0;
}

.card-icon i {
    font-size: 1.8rem;
    color: #fff;
    font-family: "Font Awesome 6 Free", "Font Awesome 6 Pro", "FontAwesome", sans-serif;
    font-weight: 900;
    font-style: normal;
    display: inline-block;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
}

.card-title {
    font-size: clamp(1.3rem, 3vw, 1.6rem);
    font-weight: 700;
    color: #333;
    margin: 0;
    line-height: 1.3;
}

.card-content {
    color: #666;
    line-height: 1.6;
    padding: 10px 0;
}

.card-content p {
    font-size: clamp(0.95rem, 2.5vw, 1.1rem);
    margin-bottom: 20px;
    text-align: justify;
    padding: 0 10px;
}

.card-content ul {
    list-style: none;
    padding: 0;
    margin: 20px 0;
}

.card-content li {
    padding: 12px 0;
    border-bottom: 1px solid #f0f0f0;
    position: relative;
    padding-left: 30px;
    margin-bottom: 8px;
}

.card-content li:before {
    content: "✓";
    position: absolute;
    left: 0;
    color: #FF5252;
    font-weight: bold;
}

.card-content li:last-child {
    border-bottom: none;
}

.card-content h4 {
    color: #333;
    margin-bottom: 15px;
    font-size: 1.1rem;
    padding: 0 10px;
    margin-top: 20px;
}

/* Special Grid Layouts */
.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
    margin: 30px auto;
    max-width: 1200px;
    justify-content: center;
}

.feature-item {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 3px 15px rgba(0,0,0,0.06);
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
}

.feature-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 25px rgba(0,0,0,0.1);
}

.feature-item i {
    font-size: 2.5rem;
    color: #FF5252;
    margin-bottom: 15px;
    display: block;
}

.feature-item h4 {
    font-size: 1.2rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 10px;
}

.feature-item p {
    color: #666;
    font-size: 0.95rem;
    line-height: 1.5;
    margin: 0;
}

/* Full-width cards for important sections */
.full-width-card {
    grid-column: 1 / -1;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    border: 2px solid #FF5252;
}

.full-width-card .card-header {
    border-bottom-color: #FF5252;
}

.full-width-card .card-title {
    color: #FF5252;
}

/* Responsive Design */
@media screen and (max-width: 1024px) {
    .service-hero .container,
    .service-details .container {
        padding-left: 30px;
        padding-right: 30px;
    }
    
    .service-content {
        max-width: 95%;
        padding: 0 15px;
    }
    
    .content-cards {
        gap: 25px;
        max-width: 95%;
    }
    
    .features-grid {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }
}

@media screen and (max-width: 768px) {
    .service-hero .container,
    .service-details .container {
        padding-left: 20px;
        padding-right: 20px;
    }
    
    .service-content {
        max-width: 100%;
        padding: 0 10px;
    }
    
    .content-cards {
        gap: 20px;
        max-width: 100%;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .content-card {
        padding: 20px;
    }
    
    .card-header {
        flex-direction: column;
        text-align: center;
        margin-bottom: 15px;
    }
    
    .card-icon {
        margin-right: 0;
        margin-bottom: 15px;
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
}

@media screen and (max-width: 480px) {
    .service-hero .container,
    .service-details .container {
        padding-left: 15px;
        padding-right: 15px;
    }
    
    .content-card {
        padding: 15px;
    }
    
    .card-icon {
        width: 50px;
        height: 50px;
    }
    
    .card-icon i {
        font-size: 1.5rem;
        font-family: "Font Awesome 6 Free", "Font Awesome 6 Pro", "FontAwesome", sans-serif;
        font-weight: 900;
        font-style: normal;
        display: inline-block;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
    }
    
    .service-hero h1 {
        font-size: clamp(1.8rem, 7vw, 2.2rem);
    }
    
    .service-hero p {
        font-size: clamp(0.9rem, 3.5vw, 1.1rem);
    }
    
    .feature-item {
        padding: 20px 15px;
    }
}
</style>

<!-- Service Hero Section -->
<section class="service-hero">
    <div class="container">
        <div class="service-hero-content">
            <h1><?php echo get_post_meta(get_the_ID(), 'hero_title', true) ?: 'Sedan Cabs in Mangalore: Comfortable and Affordable Travel'; ?></h1>
            <p><?php echo get_post_meta(get_the_ID(), 'hero_description', true) ?: 'Comfortable and economical sedans for city rides, business travel, and airport transfers - Experience reliable service with our professional drivers'; ?></p>
            <div class="service-hero-buttons">
                <a href="<?php echo esc_url(travelease_get_or_create_page_url('Booking', 'booking', 'page-booking.php')); ?>" class="btn btn-outline">Book Now</a>
                <a href="tel:+918861505754" class="btn btn-outline">Call +91 8861505754</a>
            </div>
        </div>
    </div>
</section>

<!-- Service Details -->
<section class="service-details">
    <div class="container">
        <div class="service-content">
            <div class="content-cards">
                <div class="content-card full-width-card">
                    <div class="card-header">
                        <div class="card-icon"><i class="fas fa-car"></i></div>
                        <h2 class="card-title">Sedan Cabs in Mangalore: Your Reliable Travel Partner</h2>
                    </div>
                    <div class="card-content">
                        <p>Choose our well-maintained sedan fleet for daily commutes, office drops, meetings, and airport transfers. Sedans offer the perfect balance of comfort and value for individuals and small families. Our professional drivers ensure a safe and comfortable journey every time.</p>
                    </div>
                </div>

                <div class="content-card">
                    <div class="card-header">
                        <div class="card-icon"><i class="fas fa-chair"></i></div>
                        <h3 class="card-title">Comfortable Seating & Features</h3>
                    </div>
                    <div class="card-content">
                        <p>Our sedan cabs feature spacious seating with air conditioning for a relaxed ride. Perfect for business travel, city commutes, and short trips. All vehicles are regularly maintained and sanitized for your comfort and safety.</p>
                    </div>
                </div>

                <div class="content-card">
                    <div class="card-header">
                        <div class="card-icon"><i class="fas fa-leaf"></i></div>
                        <h3 class="card-title">Fuel Efficient & Economical</h3>
                    </div>
                    <div class="card-content">
                        <p>Get the best value for your money with our economical per-kilometer pricing. Our sedans are fuel-efficient, making them perfect for regular city travel and business commutes without breaking the bank.</p>
                    </div>
                </div>

                <div class="content-card">
                    <div class="card-header">
                        <div class="card-icon"><i class="fas fa-user-tie"></i></div>
                        <h3 class="card-title">Professional Drivers</h3>
                    </div>
                    <div class="card-content">
                        <p>Our experienced, courteous, and punctual drivers know the city well and ensure you reach your destination safely and on time. They are trained to provide excellent customer service and maintain the highest standards of professionalism.</p>
                    </div>
                </div>

                <div class="content-card">
                    <div class="card-header">
                        <div class="card-icon"><i class="fas fa-clock"></i></div>
                        <h3 class="card-title">On-Time Pickup & Reliability</h3>
                    </div>
                    <div class="card-content">
                        <p>We understand the importance of punctuality. Our reliable service ensures you never have to wait. Book in advance or call for immediate pickup - we're always ready to serve you with timely arrivals.</p>
                    </div>
                </div>

                <div class="content-card">
                    <div class="card-header">
                        <div class="card-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <h3 class="card-title">Best For</h3>
                    </div>
                    <div class="card-content">
                        <ul>
                            <li>City travel and daily errands</li>
                            <li>Office commute and business meetings</li>
                            <li>Airport pickup and drop services</li>
                            <li>Short intercity trips</li>
                            <li>Wedding and special event transportation</li>
                            <li>Regular corporate travel</li>
                        </ul>
                    </div>
                </div>

                <div class="content-card">
                    <div class="card-header">
                        <div class="card-icon"><i class="fas fa-phone"></i></div>
                        <h3 class="card-title">Easy Booking Process</h3>
                    </div>
                    <div class="card-content">
                        <p>Booking your sedan cab is simple and convenient. Call us directly at +91 8861505754 or use our online booking system. We offer flexible payment options and transparent pricing with no hidden charges.</p>
                    </div>
                </div>

                <div class="content-card full-width-card">
                    <div class="card-header">
                        <div class="card-icon"><i class="fas fa-star"></i></div>
                        <h3 class="card-title">Why Choose TSM Travells for Sedan Cabs?</h3>
                    </div>
                    <div class="card-content">
                        <p>TSM Travells has been serving Mangalore with reliable taxi services for years. Our commitment to customer satisfaction, competitive pricing, and professional service makes us the preferred choice for sedan cab services. Experience the difference with our well-maintained fleet and courteous drivers.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>