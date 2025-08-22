<?php
/*
 * Template Name: City Taxi Service
 */
get_header(); ?>
<style>
.service-hero {
    background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?php echo get_template_directory_uri(); ?>/images/hero-bg.jpg');
    background-size: cover;
    background-position: center;
    padding: 100px 0 60px;
    color: #fff;
    text-align: center;
}
.service-details {
    padding: 60px 0;
}
.service-content {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 40px;
    margin-bottom: 40px;
}
.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 25px;
    margin: 30px 0;
}
.feature-item {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
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
.booking-form input,
.booking-form select,
.booking-form textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 12px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 1rem;
}
.booking-form button {
    width: 100%;
    padding: 12px;
    background: var(--primary-color, #FF5252);
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.2s;
}
.booking-form button:hover {
    background: #0056b3;
}
@media (max-width: 900px) {
    .service-content {
        grid-template-columns: 1fr;
    }
    .booking-sidebar {
        position: static;
        margin-top: 30px;
    }
}
</style>
<?php get_header(); ?>

<!-- Service Hero Section -->
<section class="service-hero">
    <div class="container">
        <div class="service-hero-content">
            <h1>City Taxi Service in Mangalore</h1>
            <p>Professional and reliable city taxi services for all your local travel needs in Mangalore</p>
            <div class="service-hero-buttons">
                <a href="#booking" class="btn btn-primary">Book Now</a>
                <a href="tel:+918861505754" class="btn btn-outline">Call +91 8861505754</a>
            </div>
        </div>
    </div>
</section>

<!-- Service Details Section -->
<section class="service-details">
    <div class="container">
        <div class="service-content">
            <div class="service-main">
                <h2>City Taxi Service - Your Local Travel Partner</h2>
                <p>TSM Travells offers the most reliable and professional city taxi service in Mangalore. Whether you need a quick ride to the market, a comfortable journey to your office, or transportation for shopping and sightseeing, our city taxi service is designed to meet all your local travel requirements.</p>
                
                <div class="service-features">
                    <h3>Why Choose Our City Taxi Service?</h3>
                    <div class="features-grid">
                        <div class="feature-item">
                            <i class="fas fa-clock"></i>
                            <h4>24/7 Availability</h4>
                            <p>Round the clock service for your convenience</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <h4>Full City Coverage</h4>
                            <p>Service available throughout Mangalore city</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-car"></i>
                            <h4>Well-Maintained Vehicles</h4>
                            <p>Clean, comfortable, and air-conditioned cars</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-user-tie"></i>
                            <h4>Professional Drivers</h4>
                            <p>Experienced and courteous drivers</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-money-bill-wave"></i>
                            <h4>Transparent Pricing</h4>
                            <p>No hidden charges, fair and competitive rates</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-shield-alt"></i>
                            <h4>Safe Travel</h4>
                            <p>Your safety is our top priority</p>
                        </div>
                    </div>
                </div>

                <div class="service-description">
                    <h3>About Our City Taxi Service</h3>
                    <p>Our city taxi service in Mangalore is designed to provide you with the most comfortable and convenient local travel experience. We understand that city travel requires punctuality, comfort, and reliability, which is why we have built our service around these core principles.</p>
                    
                    <p>We serve all major areas of Mangalore including Hampankatta, Kankanady, Bejai, Kadri, Urwa, Surathkal, and surrounding areas. Our drivers are locals who know the city roads well and can navigate through traffic efficiently to get you to your destination on time.</p>
                    
                    <p>Whether you're a business professional heading to a meeting, a student going to college, a family planning a shopping trip, or a tourist exploring the city, our city taxi service is the perfect choice for all your local transportation needs.</p>
                </div>

                <div class="service-areas">
                    <h3>Areas We Serve in Mangalore</h3>
                    <div class="areas-grid">
                        <div class="area-category">
                            <h4>Central Areas</h4>
                            <ul>
                                <li>Hampankatta</li>
                                <li>Kankanady</li>
                                <li>Bejai</li>
                                <li>Kadri</li>
                                <li>Urwa</li>
                            </ul>
                        </div>
                        <div class="area-category">
                            <h4>Commercial Areas</h4>
                            <ul>
                                <li>Mangalore Central</li>
                                <li>State Bank</li>
                                <li>Bendoor</li>
                                <li>Attavar</li>
                                <li>Kodialbail</li>
                            </ul>
                        </div>
                        <div class="area-category">
                            <h4>Residential Areas</h4>
                            <ul>
                                <li>Surathkal</li>
                                <li>NITK Campus</li>
                                <li>Padil</li>
                                <li>Jeppu</li>
                                <li>Kottara</li>
                            </ul>
                        </div>
                        <div class="area-category">
                            <h4>Educational Institutions</h4>
                            <ul>
                                <li>Mangalore University</li>
                                <li>St. Aloysius College</li>
                                <li>St. Agnes College</li>
                                <li>Canara College</li>
                                <li>SDM College</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="service-sidebar">
                <div class="booking-card">
                    <h3>Quick Booking</h3>
                    <form id="cityTaxiBookingForm">
                        <input type="hidden" name="form_type" value="city_taxi_booking">
                        <div class="form-group">
                            <label for="pickup">Pickup Location</label>
                            <input type="text" id="pickup" name="pickup" required placeholder="Enter pickup address">
                        </div>
                        <div class="form-group">
                            <label for="destination">Destination</label>
                            <input type="text" id="destination" name="destination" required placeholder="Enter destination">
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" id="date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" id="time" name="time" required>
                        </div>
                        <div class="form-group">
                            <label for="passengers">Number of Passengers</label>
                            <select id="passengers" name="passengers" required>
                                <option value="">Select</option>
                                <option value="1">1 Passenger</option>
                                <option value="2">2 Passengers</option>
                                <option value="3">3 Passengers</option>
                                <option value="4">4 Passengers</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Book City Taxi</button>
                    </form>
                </div>

                <div class="contact-info-card">
                    <h3>Contact Information</h3>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h4>Call Us</h4>
                            <p><a href="tel:+918861505754">+91 8861505754</a></p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Email Us</h4>
                            <p><a href="mailto:info@tsmtravells.com">info@tsmtravells.com</a></p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>Visit Us</h4>
                            <p>Ground Floor, GHS Opposite Tara clinic, Hampankatta Mangalore 575001</p>
                        </div>
                    </div>
                </div>

                <div class="pricing-card">
                    <h3>City Taxi Rates</h3>
                    <div class="pricing-item">
                        <span class="rate">₹15</span>
                        <span class="unit">per km</span>
                    </div>
                    <div class="pricing-item">
                        <span class="rate">₹50</span>
                        <span class="unit">minimum fare</span>
                    </div>
                    <div class="pricing-item">
                        <span class="rate">₹100</span>
                        <span class="unit">airport pickup</span>
                    </div>
                    <p class="pricing-note">* Rates may vary based on distance and time</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="service-faq">
    <div class="container">
        <h2>Frequently Asked Questions</h2>
        <div class="faq-list">
            <div class="faq-item">
                <div class="faq-question">
                    <h3>How far in advance should I book a city taxi?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>For city taxi service, you can book as early as you want or even call us at the last minute. We usually have vehicles available for immediate pickup. However, for early morning or late night rides, we recommend booking at least 2-3 hours in advance.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h3>What is the minimum fare for city taxi service?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>The minimum fare for our city taxi service is ₹50, which covers the first 3 kilometers. After that, it's ₹15 per kilometer. Additional charges may apply for waiting time or late-night rides.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Do you provide city taxi service during late hours?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Yes, we provide 24/7 city taxi service in Mangalore. Whether you need a ride at 2 AM or 2 PM, our drivers are always available to serve you. Late-night rides may have slightly higher rates.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Can I book a city taxi for multiple stops?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Absolutely! Our city taxi service supports multiple stops. You can visit several places in one trip. We charge based on the total distance covered and any additional waiting time at stops.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h3>What payment methods do you accept?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>We accept cash payments, UPI transfers, and digital wallet payments. For regular customers, we also offer monthly billing options. All payments are transparent with no hidden charges.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Services Section -->
<section class="related-services">
    <div class="container">
        <h2>Other Services You Might Like</h2>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-route"></i>
                </div>
                <h3>Outstation Taxi</h3>
                <p>Long-distance travel to nearby cities and tourist destinations</p>
                <a href="outstation-taxi.php" class="btn-text">Learn More <i class="fas fa-arrow-right"></i></a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-plane-departure"></i>
                </div>
                <h3>Airport Transfer</h3>
                <p>Reliable airport pickup and drop service</p>
                <a href="airport-taxi.php" class="btn-text">Learn More <i class="fas fa-arrow-right"></i></a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-glass-cheers"></i>
                </div>
                <h3>Wedding Cars</h3>
                <p>Luxury vehicles for your special day</p>
                <a href="wedding-cars.php" class="btn-text">Learn More <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>