<style>
/* Hero Section Styles */
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

.card-content ol {
    padding: 0;
    margin: 20px 0;
    padding-left: 20px;
}

.card-content ol li {
    padding: 8px 0;
    border-bottom: 1px solid #f0f0f0;
    position: relative;
    padding-left: 0;
    margin-bottom: 8px;
}

.card-content ol li:before {
    content: none;
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

/* Desktop-only full-width adjustments */
@media screen and (min-width: 1025px) {
    .service-hero {
        width: 100vw;
        margin-left: calc(50% - 50vw);
        margin-right: calc(50% - 50vw);
    }

    .service-hero .container,
    .service-details .container {
        max-width: 100%;
        padding-left: 50px;
        padding-right: 50px;
    }

    .service-content {
        max-width: 100%;
    }
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
            <h1><?php echo get_post_meta(get_the_ID(), 'hero_title', true) ?: 'Ertiga Cabs in Mangalore – TSM Travells'; ?></h1>
            <p><?php echo get_post_meta(get_the_ID(), 'hero_description', true) ?: 'Welcome to TSM Travells, your trusted name for Ertiga cabs in Mangalore. Whether you are traveling within the city, planning an airport drop, or going on a long road trip, our Ertiga cars are the perfect option. We combine comfort, affordability, and reliability to give you the best travel experience.'; ?></p>
            <div class="service-hero-buttons">
                <!-- <a href="<?php echo esc_url(travelease_get_or_create_page_url('Booking', 'booking', 'page-booking.php')); ?>" class="btn btn-outline">Book Now</a> -->
                <a href="tel:+918861505754" class="btn btn-outline">Call +91 8861505754</a>
            </div>
        </div>
    </div>
</section>

<!-- Service Details -->
<section class="service-details">
    <div class="container">
        <div class="service-content">
            <!-- Welcome Card -->
            <div class="content-cards">
                <div class="content-card full-width-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <h2 class="card-title"><?php echo get_post_meta(get_the_ID(), 'why_choose_title', true) ?: 'Why Choose Ertiga Cabs in Mangalore?'; ?></h2>
                    </div>
                    <div class="card-content">
                        <p><?php echo get_post_meta(get_the_ID(), 'why_choose_description', true) ?: 'The Suzuki Ertiga is one of the most popular cars for families and group travel. With flexible seating, large space, and smooth handling, it fits perfectly for every trip. TSM Travells offers professional drivers and well-maintained cars to make your journey hassle-free.'; ?></p>
                    </div>
                </div>
            </div>

            <!-- Features Grid -->
                <div class="features-grid">
                    <div class="feature-item">
                        <i class="fas fa-users"></i>
                    <h4>Spacious 7-seater design</h4>
                    <p>Perfect for families and small groups with flexible seating arrangements</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-snowflake"></i>
                    <h4>Excellent air-conditioning</h4>
                    <p>Ideal for coastal weather with powerful climate control system</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-money-bill-wave"></i>
                    <h4>Affordable rental packages</h4>
                    <p>Competitive rates for all types of journeys and durations</p>
                    </div>
                    <div class="feature-item">
                    <i class="fas fa-couch"></i>
                    <h4>Comfortable seating</h4>
                    <p>Ergonomic design for family and group travel comfort</p>
                    </div>
                    <div class="feature-item">
                    <i class="fas fa-car"></i>
                    <h4>Clean, well-maintained vehicles</h4>
                    <p>Regular maintenance and sanitization for your safety</p>
                    </div>
                    <div class="feature-item">
                    <i class="fas fa-user-tie"></i>
                    <h4>Trained drivers with local knowledge</h4>
                    <p>Professional drivers familiar with all routes and destinations</p>
                </div>
            </div>

            <!-- Content Cards Grid -->
            <div class="content-cards">
                <!-- Services Card -->
                <div class="content-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-concierge-bell"></i>
                        </div>
                        <h3 class="card-title"><?php echo get_post_meta(get_the_ID(), 'services_title', true) ?: 'Ertiga Cabs Services in Mangalore'; ?></h3>
                    </div>
                    <div class="card-content">
                        <p><?php echo get_post_meta(get_the_ID(), 'services_description', true) ?: 'Our Ertiga cab services in Mangalore are designed for every type of traveler. Whether you are a tourist, a business professional, or a local resident, we provide rides for all occasions.'; ?></p>
                        
                        <h4>Local City Travel</h4>
                        <p>Book an Ertiga for local rides, office commutes, and short city trips. Avoid traffic stress and travel comfortably with our drivers.</p>
                        
                        <h4>Airport Transfers</h4>
                        <p>Need a ride to or from Mangalore International Airport? Our Ertiga cabs ensure timely pickups and drops for all flight schedules.</p>
                        
                        <h4>Outstation Rides</h4>
                        <p>Planning a weekend getaway to Coorg, Chikmagalur, or Kerala? Our Ertiga car rental Mangalore service is ideal for long journeys, ensuring both comfort and safety.</p>
                        
                        <h4>Family Trips</h4>
                        <p>Families love traveling together in an Ertiga. Spacious seating, child-friendly features, and wide legroom make family journeys enjoyable.</p>
                        
                        <h4>Events & Functions</h4>
                        <p>If you have a wedding, celebration, or function, hire our Ertiga cabs for guest transportation and smooth mobility during events.</p>
                    </div>
                </div>

                <!-- Packages Card -->
                <div class="content-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <h3 class="card-title"><?php echo get_post_meta(get_the_ID(), 'packages_title', true) ?: 'Affordable Packages'; ?></h3>
                    </div>
                    <div class="card-content">
                        <p><?php echo get_post_meta(get_the_ID(), 'packages_description', true) ?: 'At TSM Travells, we make sure our customers get flexible rental options. If you want to hire Ertiga cabs in Mangalore, you can pick from different packages.'; ?></p>
                        
                        <ul>
                            <li><strong>Hourly Rentals</strong> – Ideal for local short journeys.</li>
                            <li><strong>Daily Rentals</strong> – Perfect for tourists and one-day trips.</li>
                            <li><strong>Outstation Packages</strong> – Cost-effective for weekend tours.</li>
                            <li><strong>Custom Rentals</strong> – Designed for special events and family requirements.</li>
                        </ul>
                    </div>
                </div>

                <!-- Rental Benefits Card -->
                <div class="content-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-piggy-bank"></i>
                        </div>
                        <h3 class="card-title"><?php echo get_post_meta(get_the_ID(), 'rental_benefits_title', true) ?: 'The Smarter Way to Travel'; ?></h3>
                    </div>
                    <div class="card-content">
                        <p><?php echo get_post_meta(get_the_ID(), 'rental_benefits_description', true) ?: 'Buying and maintaining a car is expensive. With our Ertiga car rental Mangalore service, you enjoy all the benefits of travel without the high costs of ownership. You save money on fuel, servicing, insurance, and parking.'; ?></p>
                        
                        <h4>Renting with TSM Travells means:</h4>
                        <ul>
                            <li>No hidden charges</li>
                            <li>Simple booking process</li>
                            <li>Clean and safe vehicles</li>
                            <li>Affordable rates for short or long durations</li>
                        </ul>
                    </div>
                </div>

                <!-- Safety Card -->
                <div class="content-card">
                    <div class="card-header">
                        <div class="card-icon">
                        <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="card-title"><?php echo get_post_meta(get_the_ID(), 'safety_title', true) ?: 'Comfort and Safety'; ?></h3>
                    </div>
                    <div class="card-content">
                        <p><?php echo get_post_meta(get_the_ID(), 'safety_description', true) ?: 'Your comfort and safety are our top priorities. Every car undergoes strict checking before every trip. Our drivers are not only skilled but also polite and professional. This makes TSM Travells one of the most trusted names for Ertiga cabs services in Mangalore.'; ?></p>
                        
                        <h4>What We Ensure</h4>
                        <ul>
                            <li>Sanitized cars before every ride</li>
                            <li>Well-maintained air-conditioning</li>
                            <li>On-time pickups and drops</li>
                            <li>24x7 customer booking support</li>
                        </ul>
                    </div>
                </div>

                <!-- Popular Routes Card -->
                <div class="content-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-route"></i>
                        </div>
                        <h3 class="card-title"><?php echo get_post_meta(get_the_ID(), 'routes_title', true) ?: 'Popular Routes'; ?></h3>
                    </div>
                    <div class="card-content">
                        <p><?php echo get_post_meta(get_the_ID(), 'routes_description', true) ?: 'Our customers often book Ertiga rentals for popular destinations from Mangalore:'; ?></p>
                        
                        <ul>
                            <li><strong>Mangalore to Udupi</strong> – Temple visits and beaches</li>
                            <li><strong>Mangalore to Coorg</strong> – Coffee estates and hill stations</li>
                            <li><strong>Mangalore to Chikmagalur</strong> – Scenic mountains</li>
                            <li><strong>Mangalore to Goa</strong> – Long coastal travel</li>
                            <li><strong>Local tours</strong> within Mangalore</li>
                        </ul>
                    </div>
                </div>

                <!-- Booking Process Card -->
                <div class="content-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h3 class="card-title"><?php echo get_post_meta(get_the_ID(), 'booking_title', true) ?: 'How to Book'; ?></h3>
                    </div>
                    <div class="card-content">
                        <p><?php echo get_post_meta(get_the_ID(), 'booking_description', true) ?: 'Booking with us is simple and quick:'; ?></p>
                        
                        <ol>
                            <li>Call or WhatsApp our booking number.</li>
                            <li>Share travel details like date, time, and destination.</li>
                            <li>Select your preferred package.</li>
                            <li>Confirm booking and enjoy your journey.</li>
                        </ol>
                    </div>
                </div>

                <!-- Why TSM Card -->
                <div class="content-card full-width-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <h3 class="card-title"><?php echo get_post_meta(get_the_ID(), 'why_tsm_title', true) ?: 'Why TSM Travels is Your Best Choice'; ?></h3>
                    </div>
                    <div class="card-content">
                        <p><?php echo get_post_meta(get_the_ID(), 'why_tsm_description', true) ?: 'Choosing TSM Travels means choosing quality and peace of mind. We are dedicated to providing the best travel experience. Our commitment to our customers sets us apart. We have built a reputation based on trust and reliability. We are always punctual. Our drivers are professional and polite. Our vehicles are always clean and well-maintained. We offer transparent pricing. Our customer support is available 24/7. We listen to your feedback. We continuously improve our services based on it. When you need Ertiga cabs in Mangalore, TSM Travells is the name you can trust. We are more than just a cab service. We are your travel partner. We offer various types of cab services in Mangalore. This includes sedans, SUVs, and even larger vehicles. You can choose the one that suits your needs. We make sure every journey with us is a great one.'; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
