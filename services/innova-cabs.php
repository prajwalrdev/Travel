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

.areas-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
    margin: 30px 0;
}

.area-category {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 3px 15px rgba(0,0,0,0.06);
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
}

.area-category:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 25px rgba(0,0,0,0.1);
}

.area-category h4 {
    color: #FF5252;
    margin-bottom: 20px;
    font-size: 1.2rem;
    font-weight: 600;
    display: flex;
    align-items: center;
}

.area-category h4 i {
    margin-right: 10px;
    font-size: 1.3rem;
}

.area-category ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.area-category li {
    padding: 10px 0;
    border-bottom: 1px solid #f0f0f0;
    color: #666;
    font-size: 0.95rem;
}

.area-category li:last-child {
    border-bottom: none;
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
    
    .areas-grid {
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
    
    .areas-grid {
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
    
    .area-category {
        padding: 20px 15px;
    }
}
</style>

<!-- Service Hero Section -->
<section class="service-hero">
    <div class="container">
        <div class="service-hero-content">
            <h1><?php echo get_post_meta(get_the_ID(), 'hero_title', true) ?: 'Innova Cabs in Mangalore: Travel in Comfort with TSM Travells'; ?></h1>
            <p><?php echo get_post_meta(get_the_ID(), 'hero_description', true) ?: 'Premium SUVs for comfortable family and group travel - Experience luxury and reliability with our Innova and Innova Crysta fleet'; ?></p>
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
                        <h2 class="card-title"><?php echo get_post_meta(get_the_ID(), 'main_title', true) ?: 'Welcome to TSM Travells - Best Innova Cabs in Mangalore'; ?></h2>
                    </div>
                    <div class="card-content">
                        <p><?php echo get_post_meta(get_the_ID(), 'main_description', true) ?: 'We provide the best Innova cabs in Mangalore. Our service is a perfect blend of comfort, style, and reliability. We ensure your journey is smooth and enjoyable. Whether you are traveling for business or pleasure, our Innova cabs in Mangalore are the ideal choice. Our professional drivers are committed to your safety. We maintain our fleet to the highest standards. Experience a stress-free journey with us. Choose TSM Travells for your next ride.'; ?></p>
                    </div>
                </div>
            </div>

            <!-- Features Grid -->
                <div class="features-grid">
                    <div class="feature-item">
                        <i class="fas fa-users"></i>
                    <h4>6-7 Seater Capacity</h4>
                    <p>Spacious seating for families and small groups with generous luggage space</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-star"></i>
                    <h4>Premium Comfort</h4>
                    <p>Luxurious interiors with leather seats and ample legroom for long journeys</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-shield-alt"></i>
                    <h4>Safety Features</h4>
                    <p>Advanced safety features including airbags and ABS for your protection</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-snowflake"></i>
                    <h4>Climate Control</h4>
                    <p>Dual-zone automatic climate control for optimal comfort in all weather</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-clock"></i>
                    <h4>24/7 Availability</h4>
                    <p>Round the clock service for airport transfers and late-night travel</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-money-bill-wave"></i>
                    <h4>Transparent Pricing</h4>
                    <p>No hidden charges, fair and competitive rates with detailed fare breakdown</p>
                </div>
            </div>

            <!-- Content Cards Grid -->
            <div class="content-cards">
                <!-- Rental Services Card -->
                <div class="content-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-key"></i>
                        </div>
                        <h3 class="card-title"><?php echo get_post_meta(get_the_ID(), 'rental_title', true) ?: 'Innova Car for Rent in Mangalore'; ?></h3>
                    </div>
                    <div class="card-content">
                        <p><?php echo get_post_meta(get_the_ID(), 'rental_description', true) ?: 'Looking for a spacious vehicle? Consider an Innova car for rent in Mangalore. The Toyota Innova is a highly popular MPV. It is known for its reliability and comfort. Our fleet includes various models. We offer both the classic Innova and the luxurious Innova Crysta. All our cars are well-maintained. We sanitize them regularly. This ensures a clean and hygienic environment for you. Our Innova car for rent in Mangalore service is flexible. You can book for a few hours. Or you can rent for a multi-day trip. We have packages to suit every need.'; ?></p>
                    </div>
                </div>

                <!-- Why Choose Card -->
                <div class="content-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-thumbs-up"></i>
                        </div>
                        <h3 class="card-title"><?php echo get_post_meta(get_the_ID(), 'why_choose_title', true) ?: 'Why Choose Innova for Rent?'; ?></h3>
                    </div>
                    <div class="card-content">
                        <p><?php echo get_post_meta(get_the_ID(), 'why_choose_description', true) ?: 'The Innova for rent in Mangalore is a versatile vehicle. It can accommodate up to seven passengers. It has generous luggage space. This makes it perfect for family vacations and group outings. The ride quality is excellent. It is smooth even on long journeys. Our services are affordable. We provide transparent pricing. You get a high-quality vehicle without the high cost of ownership. TSM Travells makes it easy to book an Innova for rent in Mangalore. Our booking process is quick and simple. You can reserve your cab online or by phone. Our customer support team is always ready to assist you. Travel with us and see the difference.'; ?></p>
                    </div>
                </div>

                <!-- Luxury Experience Card -->
                <div class="content-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-crown"></i>
                        </div>
                        <h3 class="card-title"><?php echo get_post_meta(get_the_ID(), 'luxury_title', true) ?: 'Experience Luxury with Innova Crysta'; ?></h3>
                    </div>
                    <div class="card-content">
                        <p><?php echo get_post_meta(get_the_ID(), 'luxury_description', true) ?: 'For those who prefer a touch of luxury, we offer Innova Crysta rental in Mangalore. The Innova Crysta is a premium vehicle. It comes with advanced features and sophisticated interiors. The seats are plush and comfortable. It offers a truly first-class travel experience. It is ideal for corporate travel and special events. Our Innova Crysta rental in Mangalore is perfect for long outstation trips. The superior comfort reduces travel fatigue. Our drivers are well-trained to handle these premium vehicles. They ensure your journey is safe and comfortable. Book an Innova Crysta and enjoy the ultimate in travel luxury.'; ?></p>
                    </div>
                </div>

                <!-- Vehicle Variants Card -->
                <div class="content-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-car-side"></i>
                        </div>
                        <h3 class="card-title"><?php echo get_post_meta(get_the_ID(), 'variants_title', true) ?: 'Vehicle Variants'; ?></h3>
                    </div>
                    <div class="card-content">
                    <h4>Toyota Innova (6 Seater)</h4>
                    <ul>
                            <li>Reliable and fuel-efficient for cost-effective travel</li>
                            <li>Perfect for outstation trips and family vacations</li>
                            <li>Comfortable seating arrangement with ample space</li>
                            <li>Large luggage capacity for all your belongings</li>
                            <li>Well-maintained fleet with regular sanitization</li>
                    </ul>
                    
                    <h4>Toyota Innova Crysta (7 Seater)</h4>
                    <ul>
                            <li>Premium luxury variant with sophisticated interiors</li>
                            <li>Enhanced comfort features and plush seating</li>
                            <li>Modern infotainment system for entertainment</li>
                            <li>Superior ride quality for long-distance comfort</li>
                            <li>Advanced safety features and climate control</li>
                    </ul>
                    </div>
                </div>

                <!-- Outstation Trips Card -->
                <div class="content-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-route"></i>
                        </div>
                        <h3 class="card-title"><?php echo get_post_meta(get_the_ID(), 'outstation_title', true) ?: 'Dependable Outstation Trips'; ?></h3>
                    </div>
                    <div class="card-content">
                        <p><?php echo get_post_meta(get_the_ID(), 'outstation_description', true) ?: 'Planning to travel outside the city? Our Innova cabs rental in Mangalore is your best option. The Innova is an excellent choice for outstation travel. It is known for its durability and fuel efficiency. Our drivers are experienced with all major routes from Mangalore. They know the best routes to take. They will ensure you reach your destination safely and on time. We offer competitive rates for outstation trips. Our pricing is inclusive and transparent. There are no hidden charges. Our Innova cabs rental in Mangalore is a popular choice for tourists and locals alike. It offers a great mix of comfort, space, and value for money.'; ?></p>
                    </div>
                </div>

                <!-- Fleet Information Card -->
                <div class="content-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <h3 class="card-title"><?php echo get_post_meta(get_the_ID(), 'fleet_title', true) ?: 'Our Diverse Fleet'; ?></h3>
                    </div>
                    <div class="card-content">
                        <p><?php echo get_post_meta(get_the_ID(), 'fleet_description', true) ?: 'At TSM Travells, we pride ourselves on our fleet. We have a variety of Innova cars in Mangalore. This allows us to cater to different customer preferences. We have different models and seating options. All our vehicles are equipped with modern amenities. This includes a music system and air conditioning. We also provide extra services upon request. This includes child seats for your little ones. We go the extra mile to ensure your comfort. Our Innova cars in Mangalore are always ready. We are just a call away. We make sure our vehicles are in top-notch condition. This guarantees a safe and smooth journey every time you ride with us.'; ?></p>
                    </div>
                </div>

                <!-- Pricing Information Card -->
                <div class="content-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-tag"></i>
                        </div>
                        <h3 class="card-title"><?php echo get_post_meta(get_the_ID(), 'pricing_title', true) ?: 'Understanding Innova Crysta Pricing'; ?></h3>
                    </div>
                    <div class="card-content">
                        <p><?php echo get_post_meta(get_the_ID(), 'pricing_description', true) ?: 'Many of our clients ask about the Innova Crysta on road price Mangalore. The on-road price is the final price you pay to own the car. It includes the ex-showroom price, RTO charges, and insurance. The price can vary depending on the variant you choose. In Mangalore, the on-road price for a new Innova Crysta can range from approximately ₹24.70 Lakh to ₹33.70 Lakh. By renting an Innova from us, you get to enjoy the car\'s premium features. You can do so without the significant financial commitment of buying it. Our rental service gives you access to this luxury at an affordable price. You can enjoy the same comfort and prestige. Our Innova Crysta rent in Mangalore service is the best alternative to ownership.'; ?></p>
                    </div>
                </div>

                <!-- Why TSM Stands Out Card -->
                <div class="content-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <h3 class="card-title"><?php echo get_post_meta(get_the_ID(), 'standout_title', true) ?: 'Why TSM Travells Stands Out'; ?></h3>
                    </div>
                    <div class="card-content">
                        <p><?php echo get_post_meta(get_the_ID(), 'standout_description', true) ?: 'Choosing TSM Travells is choosing excellence. We have a strong reputation in Mangalore. We are known for our reliable service and customer satisfaction. Here are some reasons to book your Innova Cabs in Mangalore with us:'; ?></p>
                        
                        <h4>Experienced and Courteous Drivers</h4>
                        <p>Our drivers are highly experienced. They know the local and outstation routes very well. They are professional and polite. They prioritize your safety and comfort.</p>
                        
                        <h4>24/7 Availability</h4>
                        <p>Our services are available around the clock. You can book a cab at any time. We are always ready for airport transfers, late-night travel, and early morning pickups.</p>
                        
                        <h4>Easy and Convenient Booking</h4>
                        <p>Booking with us is simple. You can do it online or over the phone. Our website is user-friendly. Our team is always on standby to help you with your booking.</p>
                        
                        <h4>Focus on Hygiene</h4>
                        <p>We are committed to your health. All our vehicles are thoroughly cleaned and sanitized. We follow strict hygiene protocols.</p>
                        
                        <h4>Transparent Pricing</h4>
                        <p>We believe in honest and clear pricing. We provide a detailed fare breakdown. There are no hidden fees or surprises.</p>
                    </div>
                </div>

                <!-- Discover Mangalore Card -->
                <div class="content-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <h3 class="card-title"><?php echo get_post_meta(get_the_ID(), 'discover_title', true) ?: 'Discover Mangalore with Our Innova Cabs'; ?></h3>
                    </div>
                    <div class="card-content">
                        <p><?php echo get_post_meta(get_the_ID(), 'discover_description', true) ?: 'Mangalore is a city of rich culture and stunning scenery. It is a major port city in Karnataka. It is known for its beautiful beaches like Panambur and Tannirbhavi. The city also has ancient temples and historical sites. Our Innova cabs in Mangalore are perfect for exploring the city. Our drivers can guide you to all the popular tourist spots. You can visit the Kudroli Gokarnanatheshwara Temple. Or you can explore the St. Aloysius Chapel. Our cabs make local sightseeing easy and comfortable. We can create a custom itinerary for you. We help you make the most of your trip.'; ?></p>
                    </div>
                </div>

                <!-- Booking Process Card -->
                <div class="content-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h3 class="card-title"><?php echo get_post_meta(get_the_ID(), 'booking_title', true) ?: 'How to Book Your Innova Crysta'; ?></h3>
                    </div>
                    <div class="card-content">
                        <p><?php echo get_post_meta(get_the_ID(), 'booking_intro', true) ?: 'Booking with TSM Travells is a breeze. Follow these easy steps to book your Innova Crysta rent in Mangalore:'; ?></p>
                        
                        <h4>Visit Our Website</h4>
                        <p>Go to our official website. You will find a simple booking form.</p>
                        
                        <h4>Enter Your Details</h4>
                        <p>Fill in your travel information. This includes your pickup date, time, and location.</p>
                        
                        <h4>Choose Your Car</h4>
                        <p>Select "Innova" or "Innova Crysta" from our fleet.</p>
                        
                        <h4>Confirm Your Booking</h4>
                        <p>You will receive an instant quote. After confirmation, you can pay a small advance. The rest can be paid to the driver.</p>

                        <p><?php echo get_post_meta(get_the_ID(), 'booking_conclusion', true) ?: 'Our team will send you a confirmation message. This will contain all the trip details. We will also provide the driver\'s contact information well in advance. Our process is designed for your peace of mind. Your Innova Crysta rent in Mangalore is just a few clicks away. We ensure a smooth and timely service. We want your experience to be seamless. We offer the most reliable cab services in Mangalore.'; ?></p>
                    </div>
                </div>

                <!-- Partnership Card -->
                <div class="content-card full-width-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3 class="card-title"><?php echo get_post_meta(get_the_ID(), 'partnership_title', true) ?: 'TSM Travells: Your Partner for All Innova Car Needs'; ?></h3>
                    </div>
                    <div class="card-content">
                        <p><?php echo get_post_meta(get_the_ID(), 'partnership_description', true) ?: 'Our commitment goes beyond just providing a car. We are your travel partner. We are dedicated to providing the best service. Our team is passionate about travel. We understand the importance of a good journey. We work hard to maintain our high standards. We value your feedback. We use it to improve our services constantly. When you think of Innova cabs in Mangalore, think of TSM Travells. We are here to serve you. We provide a wide range of services. We cater to all your travel needs. We offer more than just a ride. We offer an experience. Choose us for a memorable journey. We guarantee a high-quality service every time.'; ?></p>
                    </div>
                </div>
                </div>

            <!-- Popular Routes Section -->
            <div class="content-cards">
                <div class="content-card full-width-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-map"></i>
                        </div>
                        <h3 class="card-title"><?php echo get_post_meta(get_the_ID(), 'routes_title', true) ?: 'Popular Routes'; ?></h3>
                    </div>
                    <div class="card-content">
                        <div class="areas-grid">
                            <div class="area-category">
                                <h4><i class="fas fa-umbrella-beach"></i>Beach Destinations</h4>
                <ul>
                    <li>Mangalore to Udupi taxi service</li>
                                    <li>Mangalore to Malpe Beach</li>
                                    <li>Mangalore to Maravanthe Beach</li>
                                    <li>Mangalore to Gokarna</li>
                                </ul>
                            </div>
                            <div class="area-category">
                                <h4><i class="fas fa-mountain"></i>Hill Stations</h4>
                                <ul>
                    <li>Mangalore to Waynad taxi</li>
                    <li>Mangalore to Ooty taxi</li>
                                    <li>Mangalore to Kudremukh</li>
                                    <li>Mangalore to Chikmagalur</li>
                                </ul>
                            </div>
                            <div class="area-category">
                                <h4><i class="fas fa-city"></i>City Services</h4>
                                <ul>
                    <li>Airport transfers to/from Mangalore</li>
                    <li>Local city rides and sightseeing</li>
                    <li>Wedding car rentals</li>
                                    <li>Corporate travel services</li>
                                </ul>
                            </div>
                            <div class="area-category">
                                <h4><i class="fas fa-building"></i>Major Cities</h4>
                                <ul>
                                    <li>Mangalore to Bangalore</li>
                                    <li>Mangalore to Mysore</li>
                                    <li>Mangalore to Goa</li>
                                    <li>Mangalore to Kerala destinations</li>
                </ul>
            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

