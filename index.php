<?php get_header(); ?>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Travel with your trusted travel partner</h1>
                <p>Experience the journey of a lifetime with our premium travel services</p>
                <div class="hero-buttons">
                    <a href="#services" class="btn btn-primary">Our Services</a>
                    <!-- <a href="<?php echo esc_url(travelease_get_or_create_page_url('Booking', 'booking', 'page-booking.php')); ?>" class="btn btn-outline">Book Now</a> -->
                    <a href="#contact" class="btn btn-outline">Book Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-tag"></i>
                    </div>
                    <h3>Best Prices</h3>
                    <p>Competitive rates for all your travel needs</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3>Best Drivers</h3>
                    <p>Professional and experienced chauffeurs</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3>24*7 Call Assistance</h3>
                    <p>Support available round the clock</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <h3>Special Discounts</h3>
                    <p>Great deals on package trips</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <h3>Full City Coverage</h3>
                    <p>Service available throughout the city</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h3>No Booking Fee</h3>
                    <p>Transparent pricing with no hidden charges</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <div class="section-header">
                <h2><?php echo get_theme_mod('about_title', 'TSM Travells: Your First Choice for Cab Services in Mangalore'); ?></h2>
                <p><?php echo get_theme_mod('about_subtitle', 'Choosing the right cab service is important. You want a ride that is on time, clean, and has a professional driver.'); ?></p>
            </div>
            <div class="about-content">
                <div class="about-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/about1-image.jpg" alt="About TSM Travells">
                </div>
                <div class="about-text">
                <p>Welcome to TSM Travells, where sandy beaches meet ancient temples and rich cultural traditions. Nestled on the pristine coastline, we offer a perfect blend of natural beauty and historical wonders for your travel experiences.</p>
                    <p>As you explore with us, you'll be captivated by the turquoise waters and golden sands that stretch as far as the eye can see. But we offer more than just beach destinations. We provide access to treasure troves of age-old temples that testify to deep-rooted spirituality.</p>
                    <p>Whether you're a nature enthusiast, a history buff, or simply seeking a rejuvenating escape, TSM Travells promises an unforgettable journey filled with warmth, beauty, and cultural richness.</p>
                    
                    <div class="about-stats">
                        <div class="stat">
                            <h3>10+</h3>
                            <p>Years in Business</p>
                        </div>
                        <div class="stat">
                            <h3>5000+</h3>
                            <p>Happy Customers</p>
                        </div>
                        <div class="stat">
                            <h3>100+</h3>
                            <p>Destinations</p>
                        </div>
                        <div class="stat">
                            <h3>24/7</h3>
                            <p>Support Available</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services">
        <div class="container">
            <div class="section-header">
                <h2><?php echo get_theme_mod('services_title', 'What We Offer'); ?></h2>
                <p><?php echo get_theme_mod('services_subtitle', 'The best Travel and Taxi Services'); ?></p>
            </div>
            <div class="services-grid">
                <a href="<?php echo esc_url(travelease_get_service_url('city-taxi')); ?>" class="service-card-link">
                <div class="service-card animate-in" data-service="city-taxi">
                    <div class="service-icon">
                        <i class="fas fa-taxi"></i>
                    </div>
                    <h3>City Taxi Service</h3>
                    <p>Local Taxi Service for convenient city travel</p>
                </div>
                </a>
                
                <a href="<?php echo esc_url(travelease_get_service_url('wedding-cars')); ?>" class="service-card-link">
                <div class="service-card animate-in" data-service="wedding-cars">
                    <div class="service-icon">
                        <i class="fas fa-glass-cheers"></i>
                    </div>
                    <h3>Wedding Cars</h3>
                    <p>Let the journey begin with our special wedding fleet</p>
                </div>
                </a>
                <a href="<?php echo esc_url(travelease_get_service_url('airport-taxi')); ?>" class="service-card-link">
                <div class="service-card animate-in" data-service="airport-taxi">
                    <div class="service-icon">
                        <i class="fas fa-plane-departure"></i>
                    </div>
                    <h3>Airport Taxi</h3>
                    <p>Punctual pickup and drop-off services</p>
                </div>
                </a>
                <a href="<?php echo esc_url(travelease_get_service_url('mini-bus')); ?>" class="service-card-link">
                <div class="service-card animate-in" data-service="mini-bus">
                    <div class="service-icon">
                        <i class="fas fa-bus"></i>
                    </div>
                    <h3>Mini Bus</h3>
                    <p>Group transportation for medium-sized groups</p>
                </div>
                </a>
                <a href="<?php echo esc_url(travelease_get_service_url('tempo-traveler')); ?>" class="service-card-link">
                <div class="service-card animate-in" data-service="tempo-traveler">
                    <div class="service-icon">
                        <i class="fas fa-shuttle-van"></i>
                    </div>
                    <h3>Tempo Traveler</h3>
                    <p>Perfect for group tours and outstation trips</p>
                </div>
                </a>
                <a href="<?php echo esc_url(travelease_get_service_url('innova-cabs')); ?>" class="service-card-link">
                <div class="service-card animate-in" data-service="innova-cabs">
                    <div class="service-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <h3>Innova Cabs | Innova Crysta</h3>
                    <p>Premium SUVs for comfortable family travel</p>
                </div>
                </a>
                <a href="<?php echo esc_url(travelease_get_service_url('ertiga-cabs')); ?>" class="service-card-link">
                <div class="service-card animate-in" data-service="ertiga-cabs">
                    <div class="service-icon">
                        <i class="fas fa-car-alt"></i>
                    </div>
                    <h3>Ertiga Cabs</h3>
                    <p>Spacious and economical for group travel</p>
                </div>
                </a>

                <a href="<?php echo esc_url(travelease_get_service_url('sedan-cabs')); ?>" class="service-card-link">
                <div class="service-card animate-in" data-service="sedan-cabs">
                    <div class="service-icon">
                        <i class="fas fa-car-side"></i>
                    </div>
                    <h3>Sedan Cabs</h3>
                    <p>Comfortable sedan cars for city and outstation</p>
                </div>
                </a>

                <a href="<?php echo esc_url(travelease_get_service_url('bekal-taxi')); ?>" class="service-card-link">
                <div class="service-card animate-in" data-service="bekal-taxi">
                    <div class="service-icon">
                        <i class="fas fa-map-signs"></i>
                    </div>
                    <h3>Bekal Taxi</h3>
                    <p>Reliable rides to/from Bekal and nearby</p>
                </div>
                </a>

                <a href="<?php echo esc_url(travelease_get_service_url('temple-tour')); ?>" class="service-card-link">
                <div class="service-card animate-in" data-service="temple-tour">
                    <div class="service-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h3>Temple Tour Packages</h3>
                    <p>Curated temple tours with experienced drivers</p>
                </div>
                </a>

                <a href="<?php echo esc_url(travelease_get_service_url('coorg-taxi')); ?>" class="service-card-link">
                <div class="service-card animate-in" data-service="coorg-taxi">
                    <div class="service-icon">
                        <i class="fas fa-mountain"></i>
                    </div>
                    <h3>Coorg Taxi</h3>
                    <p>Comfortable trips to Coorg and hill stations</p>
                </div>
                </a>

            </div>
        </div>
    </section>

    <!-- Vehicle Types Section -->
    <section id="vehicle-types" class="vehicle-types">
        <div class="container">
            <div class="section-header">
                <h2><?php echo get_theme_mod('vehicle_types_title', 'Our Fleet');?></h2>
                <p><?php echo get_theme_mod('vehicle_types_subtitle', 'Choose from our diverse range of vehicles'); ?></p>
            </div>
            <div class="vehicle-types-grid">
                <div class="vehicle-card">
                    <div class="vehicle-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <h3>4 Seater Sedan</h3>
                    <p>Comfortable sedan cars for small groups</p>
                    <div class="vehicle-features">
                        <span><i class="fas fa-users"></i> 4 Passengers</span>
                        <span><i class="fas fa-suitcase"></i> 2 Luggage</span>
                    </div>
                </div>
                <div class="vehicle-card">
                    <div class="vehicle-icon">
                        <i class="fas fa-car-side"></i>
                    </div>
                    <h3>6 Seater Ertiga | Innova</h3>
                    <p>Spacious vehicles for medium groups</p>
                    <div class="vehicle-features">
                        <span><i class="fas fa-users"></i> 6 Passengers</span>
                        <span><i class="fas fa-suitcase"></i> 4 Luggage</span>
                    </div>
                </div>
                <div class="vehicle-card">
                    <div class="vehicle-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3>7 Seater Innova Crysta</h3>
                    <p>Premium SUV for comfortable travel</p>
                    <div class="vehicle-features">
                        <span><i class="fas fa-users"></i> 7 Passengers</span>
                        <span><i class="fas fa-suitcase"></i> 5 Luggage</span>
                    </div>
                </div>
                <div class="vehicle-card">
                    <div class="vehicle-icon">
                        <i class="fas fa-bus"></i>
                    </div>
                    <h3>12 Seater Tempo Traveler</h3>
                    <p>Perfect for group travel and tours</p>
                    <div class="vehicle-features">
                        <span><i class="fas fa-users"></i> 12 Passengers</span>
                        <span><i class="fas fa-suitcase"></i> 8 Luggage</span>
                    </div>
                </div>
                <div class="vehicle-card">
                    <div class="vehicle-icon">
                        <i class="fas fa-bus-alt"></i>
                    </div>
                    <h3>22 Seater Mini Bus</h3>
                    <p>Ideal for medium group transportation</p>
                    <div class="vehicle-features">
                        <span><i class="fas fa-users"></i> 22 Passengers</span>
                        <span><i class="fas fa-suitcase"></i> 12 Luggage</span>
                    </div>
                </div>
                <div class="vehicle-card">
                    <div class="vehicle-icon">
                        <i class="fas fa-shuttle-van"></i>
                    </div>
                    <h3>25/33/49 Seater Bus</h3>
                    <p>Large buses for big groups and events</p>
                    <div class="vehicle-features">
                        <span><i class="fas fa-users"></i> Up to 49 Passengers</span>
                        <span><i class="fas fa-suitcase"></i> 20+ Luggage</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Destinations Section -->
    <section id="destinations" class="destinations">
        <div class="container">
            <div class="section-header">
                <h2><?php echo get_theme_mod('destinations_title', 'Popular Destinations'); ?></h2>
                <p><?php echo get_theme_mod('destinations_subtitle', 'Explore beautiful places with us'); ?></p>
            </div>
            <div class="destinations-slider">
                <div class="destination-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/destination-1.jpg.svg" alt="Beach Destination">
                    <div class="destination-content">
                        <h3>Coastal Paradise</h3>
                        <p>Pristine beaches and coastal beauty</p>
                        <a href="#contact" class="btn-text">Explore <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="destination-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/destination-2.jpg.svg" alt="Temple Destination">
                    <div class="destination-content">
                        <h3>Ancient Temples</h3>
                        <p>Spiritual journey through historic temples</p>
                        <a href="#contact" class="btn-text">Explore <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="destination-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/destination-3.jpg.svg" alt="Hill Station">
                    <div class="destination-content">
                        <h3>Mountain Retreat</h3>
                        <p>Serene hill stations and mountain views</p>
                        <a href="#contact" class="btn-text">Explore <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="slider-controls">
                <button class="prev-btn"><i class="fas fa-chevron-left"></i></button>
                <button class="next-btn"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </section>

    <!-- Booking Process Section -->
    <!-- Removed 'The Process of Cab Booking Mangalore is Simple and Quick' section as requested -->

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-card">
                    <h3 class="counter" data-target="15000">150+</h3>
                    <p>Trips Completed</p>
                </div>
                <div class="stat-card">
                    <h3 class="counter" data-target="500">500+</h3>
                    <p>Corporate Clients Served</p>
                </div>
                <div class="stat-card">
                    <h3 class="counter" data-target="8000">600+</h3>
                    <p>Happy Customers</p>
                </div>
                <div class="stat-card">
                    <h3 class="counter" data-target="2000">200+</h3>
                    <p>Online Bookings</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2><?php echo get_theme_mod('testimonials_title', 'What Our Customers Say'); ?></h2>
                <p><?php echo get_theme_mod('testimonials_subtitle', 'Testimonials from our satisfied clients'); ?></p>
            </div>
            <div class="testimonials-slider">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>"The service was exceptional! The driver was punctual, professional, and the vehicle was immaculate. I highly recommend TSM Travells for all your travel needs in Mangalore."</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-1.jpg.svg" alt="Customer">
                        <div class="author-info">
                            <h4>John Smith</h4>
                            <p>Business Traveler</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>"We booked a luxury car for our wedding day, and it was perfect! The driver was courteous, the car was beautifully decorated, and everything went smoothly. Thank you TSM Travells for making our special day even better!"</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-2.jpg.svg" alt="Customer">
                        <div class="author-info">
                            <h4>Sarah Johnson</h4>
                            <p>Wedding Client</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <p>"Our family trip to Coorg was made so much more enjoyable with TSM Travells. The driver was knowledgeable about the area and suggested some amazing local spots. The vehicle was spacious and comfortable for our long journey."</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-3.jpg.svg" alt="Customer">
                        <div class="author-info">
                            <h4>David Wilson</h4>
                            <p>Family Traveler</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-controls">
                <button class="prev-btn"><i class="fas fa-chevron-left"></i></button>
                <button class="next-btn"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-header">
                <h2><?php echo get_theme_mod('contact_title', 'Get In Touch'); ?></h2>
                <p><?php echo get_theme_mod('contact_subtitle', 'Book your journey or inquire about our services'); ?></p>
            </div>
            <div class="contact-content">
                <div class="contact-form">
                    <form id="contactForm">
                        <input type="hidden" name="form_type" value="contact">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="service">Service Type</label>
                            <select id="service" name="service" required>
                                <option value="">Select a service</option>
                                <option value="city-taxi">City Taxi</option>
                                <option value="outstation">Outstation Taxi</option>
                                <option value="luxury">Luxury Cabs</option>
                                <option value="wedding">Wedding Cars</option>
                                <option value="corporate">Corporate Travel</option>
                                <option value="airport">Airport Transfer</option>
                                <option value="railway">Railway Station Taxi</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" id="date" name="date" required>
                            </div>
                            <div class="form-group">
                                <label for="time">Time</label>
                                <input type="time" id="time" name="time" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Additional Information</label>
                            <textarea id="message" name="message" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Inquiry</button>
                        <div id="contactFormStatus" class="form-status"></div>
                    </form>
                </div>
                <div class="contact-info">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="location-section">
                            <div class="info-content">
                                <h3>Our Location</h3>
                                <p><?php echo get_theme_mod('contact_address', 'Ground Floor, GHS Opposite Tara clinic, Hampankatta Mangalore 575001'); ?></p>
                            </div>
                        </div>
                        <div class="map-container">
                            <iframe
                                src="https://www.google.com/maps?q=<?php echo rawurlencode(get_theme_mod('contact_address', 'Ground Floor, GHS Opposite Tara clinic, Hampankatta Mangalore 575001')); ?>&output=embed"
                                width="100%"
                                height="100%"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                            ></iframe>
                        </div>
                    </div>
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="info-content">
                            <h3>Call Us</h3>
                            <p><?php echo get_theme_mod('contact_phone1', '+91 8861505754'); ?></p>
                            <p><?php echo get_theme_mod('contact_phone2', ''); ?></p>
                        </div>
                    </div>
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h3>Email Us</h3>
                            <p><?php echo get_theme_mod('contact_email1', 'mangaloretaxicabservices@gmail.com'); ?></p>
                            <p><?php echo get_theme_mod('contact_email2', 'mangaloretaxicabservices@gmail.com'); ?></p>
                        </div>
                    </div>
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="info-content">
                            <h3>Working Hours</h3>
                            <p><?php echo get_theme_mod('contact_hours1', '24/7 Service Available'); ?></p>
                            <p><?php echo get_theme_mod('contact_hours2', 'Office: 9:00 AM - 6:00 PM'); ?></p>
                        </div>
                    </div>
                    <div class="social-links">
                        <a href="<?php echo get_theme_mod('social_facebook', '#'); ?>" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?php echo get_theme_mod('social_twitter', '#'); ?>" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="<?php echo get_theme_mod('social_instagram', '#'); ?>" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="<?php echo get_theme_mod('social_linkedin', '#'); ?>" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
