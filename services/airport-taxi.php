<?php
/**
 * Template Name: Airport Taxi Service
 * 
 * This is a custom template for the Airport Taxi Service page
 */

// Check if function exists, if not provide fallback
if (!function_exists('travelease_service_url')) {
    function travelease_service_url($title, $slug, $template) {
        return home_url('/' . $slug . '/');
    }
}



<section class="service-hero">
    <div class="container">
    <div class="service-hero-content">
        <h1>Airport Taxi Services</h1>
        <p>Reliable and comfortable airport transfers to and from Mangalore International Airport</p>
        <div class="hero-buttons">
        // <a href="<?php echo esc_url(travelease_get_or_create_page_url('Booking', 'booking', 'page-booking.php')); ?>" class="btn btn-outline">Book Now</a>
            <a href="#pricing" class="btn btn-secondary">View Pricing</a>
        </div>
    </div>
    </div>
</section>

<section class="service-details">
    <div class="container">
        <div class="service-content">
            <div class="service-main">
                <div class="service-description">
                    <h2>Professional Airport Taxi Service in Mangalore</h2>
                    <p>Experience hassle-free airport transfers with our professional taxi service. We provide reliable, comfortable, and timely transportation to and from Mangalore International Airport (IXE) 24/7, ensuring you never miss a flight or wait long after landing.</p>
                    
                    <p>Our airport taxi service is designed for business travelers, tourists, and locals who need dependable transportation to and from the airport. With flight monitoring, meet-and-greet services, and luggage assistance, we make your airport journey stress-free and comfortable.</p>
                </div>

                <div class="service-features">
                    <h3>Why Choose Our Airport Taxi Service?</h3>
                    <div class="features-grid">
                        <div class="feature-item">
                            <i class="fas fa-clock"></i>
                            <h4>24/7 Availability</h4>
                            <p>Available round the clock for all domestic and international flights</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-user-tie"></i>
                            <h4>Professional Drivers</h4>
                            <p>Experienced, courteous drivers with airport transfer expertise</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-car"></i>
                            <h4>Clean Vehicles</h4>
                            <p>Well-maintained, sanitized cars for your comfort and safety</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-shield-alt"></i>
                            <h4>Fixed Pricing</h4>
                            <p>Transparent rates with no hidden charges or surge pricing</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-plane"></i>
                            <h4>Flight Monitoring</h4>
                            <p>Real-time flight tracking for timely pickups and drop-offs</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-suitcase"></i>
                            <h4>Luggage Assistance</h4>
                            <p>Help with loading and unloading your bags</p>
                        </div>
                    </div>
                </div>

                <div class="service-areas">
                    <h3>Airport Transfer Destinations</h3>
                    <div class="areas-grid">
                        <div class="area-category">
                            <h4>City Areas</h4>
                            <ul>
                                <li>Mangalore City Center (15 km)</li>
                                <li>Kadri Hills (18 km)</li>
                                <li>Bejai (20 km)</li>
                                <li>Kankanady (22 km)</li>
                            </ul>
                        </div>
                        <div class="area-category">
                            <h4>Nearby Towns</h4>
                            <ul>
                                <li>Ullal (25 km)</li>
                                <li>Surathkal (30 km)</li>
                                <li>Mulki (35 km)</li>
                                <li>Udupi (60 km)</li>
                            </ul>
                        </div>
                        <div class="area-category">
                            <h4>Tourist Destinations</h4>
                            <ul>
                                <li>Panambur Beach (12 km)</li>
                                <li>NITK Beach (28 km)</li>
                                <li>Malpe Beach (65 km)</li>
                                <li>Dharmasthala (75 km)</li>
                            </ul>
                        </div>
                        <div class="area-category">
                            <h4>Business Districts</h4>
                            <ul>
                                <li>Mangalore SEZ (25 km)</li>
                                <li>Baikampady Industrial Area (18 km)</li>
                                <li>Mangalore Port (20 km)</li>
                                <li>Airport Road Business Hub (5 km)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="service-description">
                    <h3>Our Airport Transfer Fleet</h3>
                    <p>We offer a variety of vehicles to suit different passenger counts and luggage requirements:</p>
                    <ul>
                        <li><strong>Economy Sedan (4-5 passengers):</strong> Perfect for solo travelers and small families with moderate luggage</li>
                        <li><strong>SUV (6-7 passengers):</strong> Ideal for families and groups with more luggage space</li>
                        <li><strong>Innova (7-8 passengers):</strong> Spacious option for larger groups and business travelers</li>
                        <li><strong>Luxury Vehicle (4-5 passengers):</strong> Premium service for executives and special occasions</li>
                    </ul>
                </div>

                <div class="service-description">
                    <h3>Airport Transfer Process</h3>
                    <p>Our streamlined process ensures a smooth airport transfer experience:</p>
                    <ol>
                        <li><strong>Booking:</strong> Book online or call us with your flight details</li>
                        <li><strong>Confirmation:</strong> Receive instant confirmation with driver details</li>
                        <li><strong>Pickup:</strong> Driver arrives 15 minutes before pickup time</li>
                        <li><strong>Journey:</strong> Comfortable ride with flight monitoring</li>
                        <li><strong>Arrival:</strong> Timely arrival at airport or destination</li>
                    </ol>
                </div>
            </div>

            <!-- <div class="service-sidebar">
                <div class="booking-card" id="booking">
                    <h3>Book Airport Transfer</h3>
                    <form class="booking-form" id="airportBookingForm">
                        <input type="hidden" name="form_type" value="airport_booking">
                        <input type="hidden" name="service_name" value="Airport Taxi">
                        
                        <div class="form-group">
                            <label for="pickup_type">Service Type</label>
                            <select name="pickup_type" id="pickup_type" required>
                                <option value="">Select Service</option>
                                <option value="airport_pickup">Airport Pickup</option>
                                <option value="airport_drop">Airport Drop</option>
                                <option value="round_trip">Round Trip</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="flight_number">Flight Number (Optional)</label>
                            <input type="text" name="flight_number" id="flight_number" placeholder="For flight monitoring">
                        </div>
                        
                        <div class="form-group">
                            <label for="pickup_date">Pickup Date</label>
                            <input type="date" name="pickup_date" id="pickup_date" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="pickup_time">Pickup Time</label>
                            <input type="time" name="pickup_time" id="pickup_time" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="passengers">Number of Passengers</label>
                            <select name="passengers" id="passengers" required>
                                <option value="">Select</option>
                                <option value="1">1 Passenger</option>
                                <option value="2">2 Passengers</option>
                                <option value="3">3 Passengers</option>
                                <option value="4">4 Passengers</option>
                                <option value="5">5 Passengers</option>
                                <option value="6">6+ Passengers</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="vehicle_type">Vehicle Type</label>
                            <select name="vehicle_type" id="vehicle_type" required>
                                <option value="">Select Vehicle</option>
                                <option value="sedan">Economy Sedan</option>
                                <option value="suv">SUV</option>
                                <option value="innova">Innova</option>
                                <option value="luxury">Luxury Vehicle</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="pickup_address">Pickup Address</label>
                            <textarea name="pickup_address" id="pickup_address" rows="3" placeholder="Enter pickup address" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="dropoff_address">Drop-off Address</label>
                            <textarea name="dropoff_address" id="dropoff_address" rows="3" placeholder="Enter drop-off address" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_name">Contact Name</label>
                            <input type="text" name="contact_name" id="contact_name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_phone">Contact Phone</label>
                            <input type="tel" name="contact_phone" id="contact_phone" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_email">Contact Email</label>
                            <input type="email" name="contact_email" id="contact_email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="special_requests">Special Requests</label>
                            <textarea name="special_requests" id="special_requests" rows="3" placeholder="Child seats, extra luggage, etc."></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Book Now</button>
                    </form>
                </div>

                <div class="contact-info-card">
                    <h3>Need Help?</h3>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <strong>Call Us</strong>
                            <p>+91 98765 43210</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <strong>Email Us</strong>
                            <p>mangaloretaxicabservices@gmail.com</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <strong>24/7 Support</strong>
                            <p>Available anytime</p>
                        </div>
                    </div>
                </div>

                <div class="pricing-card" id="pricing">
                    <h3>Airport Transfer Pricing</h3>
                    <div class="pricing-item">
                        <span class="distance">0-20 km</span>
                        <span class="price">₹800</span>
                    </div>
                    <div class="pricing-item">
                        <span class="distance">20-50 km</span>
                        <span class="price">₹1200</span>
                    </div>
                    <div class="pricing-item">
                        <span class="distance">50-100 km</span>
                        <span class="price">₹2000</span>
                    </div>
                    <div class="pricing-item">
                        <span class="distance">100+ km</span>
                        <span class="price">₹15/km</span>
                    </div>
                    <p class="pricing-note">*Prices include fuel, driver charges, and tolls. No hidden fees.</p>
                </div>
            </div> -->
        </div>
    </div>
</section>

<section class="service-faq">
    <div class="container">
        <h2>Frequently Asked Questions</h2>
        <div class="faq-list">
            <div class="faq-item">
                <div class="faq-question">
                    <h3>How far in advance should I book an airport transfer?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>We recommend booking at least 2-3 hours in advance for airport pickups and 24 hours for airport drops. For early morning or late-night flights, booking a day in advance ensures better availability.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h3>What if my flight is delayed?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Don't worry! We monitor your flight in real-time and adjust pickup times accordingly. If your flight is delayed, we'll wait for you at no extra charge for up to 2 hours.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Do you provide child seats?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Yes, we provide child seats on request. Please mention this in your special requests when booking, and we'll ensure a safe and comfortable journey for your little ones.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Can I book a round trip to the airport?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Absolutely! We offer round-trip airport transfers at discounted rates. This is perfect for business travelers or families who need both pickup and drop-off services.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h3>What happens if I miss my pickup?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>If you miss your pickup, please contact us immediately. We'll try to arrange an alternative pickup time based on availability. Additional charges may apply for rescheduling.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="related-services">
    <div class="container">
        <h2>Other Services You Might Like</h2>
        <div class="services-grid">
            <div class="service-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/city-taxi.jpg" alt="City Taxi">
                <h3>City Taxi</h3>
                <p>Local transportation within Mangalore city</p>
                <a href="city-taxi.php" class="btn btn-secondary">Learn More</a>
            </div>
            <div class="service-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/outstation-taxi.jpg" alt="Outstation Taxi">
                <h3>Outstation Taxi</h3>
                <p>Long-distance travel to nearby cities and tourist spots</p>
                <a href="outstation-taxi.php" class="btn btn-secondary">Learn More</a>
            </div>
            <div class="service-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/wedding-cars.jpg" alt="Wedding Cars">
                <h3>Wedding Cars</h3>
                <p>Luxury vehicles for your special day</p>
                <a href="wedding-cars.php" class="btn btn-secondary">Learn More</a>
            </div>
        </div>
    </div>
</section>


