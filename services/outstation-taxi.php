<section class="service-hero">
    <div class="container">
        <h1>Outstation Taxi Services</h1>
        <p>Reliable and comfortable long-distance travel from Mangalore to anywhere in Karnataka and beyond</p>
        <div class="hero-buttons">
            <!-- <a href="#booking" class="btn btn-primary">Book Now</a> -->
            <a href="#pricing" class="btn btn-secondary">View Pricing</a>
        </div>
    </div>
</section>

<section class="service-details">
    <div class="container">
        <div class="service-content">
            <div class="service-main">
                <div class="service-description">
                    <h2>Outstation Taxi Services in Mangalore</h2>
                    <p>Planning a trip outside Mangalore? Our outstation taxi service is your perfect companion for long-distance travel. Whether you're heading to nearby cities, tourist destinations, or planning a multi-day journey, we provide reliable, comfortable, and affordable transportation solutions.</p>
                    
                    <p>Our outstation services are designed for families, groups, and solo travelers who want to explore beyond city limits without the hassle of driving. With experienced drivers who know the best routes and local attractions, your journey becomes an adventure rather than just transportation.</p>
                </div>

                <div class="service-features">
                    <h3>Why Choose Our Outstation Taxi Service?</h3>
                    <div class="features-grid">
                        <div class="feature-item">
                            <i class="fas fa-route"></i>
                            <h4>Flexible Routes</h4>
                            <p>Choose your own destinations and stops along the way</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-calendar-alt"></i>
                            <h4>Multi-day Options</h4>
                            <p>Book for single or multiple days based on your travel plans</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-car"></i>
                            <h4>Comfortable Vehicles</h4>
                            <p>Spacious, clean, and well-maintained cars for long journeys</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-user-shield"></i>
                            <h4>Expert Drivers</h4>
                            <p>Safe, courteous, and knowledgeable drivers familiar with all routes</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-clock"></i>
                            <h4>24/7 Availability</h4>
                            <p>Book your outstation trip anytime, day or night</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-shield-alt"></i>
                            <h4>Safe Travel</h4>
                            <p>All vehicles are regularly inspected and insured for your safety</p>
                        </div>
                    </div>
                </div>

                <div class="service-areas">
                    <h3>Popular Outstation Destinations</h3>
                    <div class="areas-grid">
                        <div class="area-category">
                            <h4>Beach Destinations</h4>
                            <ul>
                                <li>Udupi (60 km)</li>
                                <li>Malpe Beach (65 km)</li>
                                <li>Maravanthe Beach (120 km)</li>
                                <li>Gokarna (200 km)</li>
                            </ul>
                        </div>
                        <div class="area-category">
                            <h4>Hill Stations</h4>
                            <ul>
                                <li>Kudremukh (95 km)</li>
                                <li>Agumbe (110 km)</li>
                                <li>Kodachadri (120 km)</li>
                                <li>Chikmagalur (180 km)</li>
                            </ul>
                        </div>
                        <div class="area-category">
                            <h4>Temple Towns</h4>
                            <ul>
                                <li>Dharmasthala (75 km)</li>
                                <li>Kukke Subramanya (105 km)</li>
                                <li>Kollur Mookambika (140 km)</li>
                                <li>Udupi Sri Krishna (60 km)</li>
                            </ul>
                        </div>
                        <div class="area-category">
                            <h4>Major Cities</h4>
                            <ul>
                                <li>Bangalore (350 km)</li>
                                <li>Mysore (280 km)</li>
                                <li>Mangalore to Goa (350 km)</li>
                                <li>Mangalore to Kerala (200+ km)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="service-description">
                    <h3>Our Outstation Fleet</h3>
                    <p>We offer a variety of vehicles to suit different group sizes and travel preferences:</p>
                    <ul>
                        <li><strong>Sedan (4-5 passengers):</strong> Perfect for small families and business trips</li>
                        <li><strong>SUV (6-7 passengers):</strong> Ideal for families with luggage and comfort</li>
                        <li><strong>Innova (7-8 passengers):</strong> Spacious option for larger groups</li>
                        <li><strong>Tempo Traveller (12-15 passengers):</strong> Best for group tours and family outings</li>
                    </ul>
                </div>
            </div>

            <div class="service-sidebar">
                <div class="booking-card">
                    <h3>Book Outstation Taxi</h3>
                    <form class="booking-form" id="outstationBookingForm">
                        <input type="hidden" name="form_type" value="outstation_booking">
                        <input type="hidden" name="service_name" value="Outstation Taxi">
                        
                        <div class="form-group">
                            <label for="pickup_location">Pickup Location</label>
                            <input type="text" name="pickup_location" id="pickup_location" placeholder="Mangalore or your address" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="destination">Destination</label>
                            <input type="text" name="destination" id="destination" placeholder="Where do you want to go?" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" id="start_date" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="end_date">Return Date (Optional)</label>
                            <input type="date" name="end_date" id="end_date">
                        </div>
                        
                        <div class="form-group">
                            <label for="trip_type">Trip Type</label>
                            <select name="trip_type" id="trip_type" required>
                                <option value="">Select Trip Type</option>
                                <option value="one_way">One Way</option>
                                <option value="round_trip">Round Trip</option>
                                <option value="multi_day">Multi Day</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="vehicle_type">Vehicle Type</label>
                            <select name="vehicle_type" id="vehicle_type" required>
                                <option value="">Select Vehicle</option>
                                <option value="sedan">Sedan (4-5 seats)</option>
                                <option value="suv">SUV (6-7 seats)</option>
                                <option value="innova">Innova (7-8 seats)</option>
                                <option value="tempo">Tempo Traveller (12-15 seats)</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="passengers">Number of Passengers</label>
                            <input type="number" name="passengers" id="passengers" min="1" max="15" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_name">Your Name</label>
                            <input type="text" name="contact_name" id="contact_name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_phone">Phone Number</label>
                            <input type="tel" name="contact_phone" id="contact_phone" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_email">Email (Optional)</label>
                            <input type="email" name="contact_email" id="contact_email">
                        </div>
                        
                        <div class="form-group">
                            <label for="special_requests">Special Requests</label>
                            <textarea name="special_requests" id="special_requests" rows="3" placeholder="Any special requirements or notes"></textarea>
                        </div>
                        
                        <!-- <button type="submit" class="btn btn-primary">Book Now</button> -->
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
                    <h3>Outstation Pricing</h3>
                    <div class="pricing-item">
                        <span class="distance">0-100 km</span>
                        <span class="price">₹12/km</span>
                    </div>
                    <div class="pricing-item">
                        <span class="distance">100-300 km</span>
                        <span class="price">₹10/km</span>
                    </div>
                    <div class="pricing-item">
                        <span class="distance">300+ km</span>
                        <span class="price">₹9/km</span>
                    </div>
                    <p class="pricing-note">*Prices include fuel, driver charges, and tolls. No hidden fees.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="service-faq">
    <div class="container">
        <h2>Frequently Asked Questions</h2>
        <div class="faq-list">
            <div class="faq-item">
                <div class="faq-question">
                    <h3>How far in advance should I book an outstation taxi?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>We recommend booking at least 24-48 hours in advance for outstation trips, especially during peak seasons. For multi-day trips, booking a week in advance ensures better availability and planning.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h3>What is included in the outstation taxi fare?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Our fare includes fuel charges, driver charges, toll taxes, and basic insurance. Additional charges may apply for night driving (10 PM - 6 AM), waiting time beyond 2 hours, and extra luggage.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Can I customize my route during the journey?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Yes, you can customize your route during the journey. Our drivers are flexible and can accommodate route changes, additional stops, and sightseeing requests within reasonable limits.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h3>What if I need to cancel my outstation booking?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Cancellations made 24 hours before the trip are free. Cancellations within 24 hours may incur a nominal charge. We understand emergencies and try to be flexible with genuine cases.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Do you provide accommodation for drivers during multi-day trips?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>For multi-day trips, we provide basic accommodation for drivers. This is included in the fare to ensure your driver is well-rested and safe for the return journey.</p>
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
                <img src="<?php echo get_template_directory_uri(); ?>/images/airport-taxi.jpg" alt="Airport Taxi">
                <h3>Airport Taxi</h3>
                <p>Reliable airport transfers to and from Mangalore</p>
                <a href="airport-taxi.php" class="btn btn-secondary">Learn More</a>
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

