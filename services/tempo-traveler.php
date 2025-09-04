<style>
/* Responsive card-based layout for Tempo Traveller page */
.service-hero { padding: 60px 0; background: var(--hero-bg, #f5f7fa); }
.service-hero .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
.service-details .container, .service-faq .container, .related-services .container {
    max-width: 1200px; margin: 0 auto; padding: 20px;
}
.service-content { display: grid; grid-template-columns: 1fr; gap: 24px; }
@media (min-width: 992px) { .service-content { grid-template-columns: 2fr 1fr; } }

/* Card skin applied to page sections */
.service-description,
.service-features,
.service-areas,
.booking-card,
.contact-info-card,
.pricing-card,
.service-faq .faq-list,
.related-services .services-grid {
    background: #fff; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    padding: 24px; overflow: hidden; margin-bottom: 24px;
}

/* Stack cards one after another with spacing */
.service-main, .service-sidebar { display: grid; grid-template-columns: 1fr; gap: 24px; }

/* Feature grid centered */
.features-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: 16px; justify-items: center; text-align: center; }
.feature-item i { font-size: 24px; color: var(--primary-color, #0d6efd); margin-bottom: 8px; }
.feature-item h4 { margin: 6px 0; }

/* Areas grid */
.areas-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px; }
.area-category h4 { margin-bottom: 8px; }

/* Sidebar cards */
.booking-card h3, .contact-info-card h3, .pricing-card h3 { margin-top: 0; }
.pricing-item { display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px dashed #e6e6e6; }
.pricing-item:last-child { border-bottom: 0; }
.pricing-note { margin-top: 10px; color: #666; font-size: 0.95rem; }

/* FAQ list */
.faq-list { display: grid; grid-template-columns: 1fr; gap: 12px; }
.faq-item { background: #fafbfc; border: 1px solid #eef0f3; border-radius: 10px; padding: 16px; }
.faq-question { display: flex; justify-content: space-between; align-items: center; }

/* Related services grid cards */
.related-services .services-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 16px; }
.related-services .service-card { text-align: center; }
.related-services .service-card img { width: 100%; height: 160px; object-fit: cover; border-radius: 8px; }

/* Typography spacing */
.service-description h2, .service-description h3, .service-features h3, .service-areas h3 { margin-top: 0; display: flex; align-items: center; gap: 10px; }
.service-description h2 i, .service-description h3 i, .service-features h3 i, .service-areas h3 i, .service-faq h2 i, .related-services h2 i { color: var(--primary-color, #0d6efd); }

/* Mobile tweaks */
@media (max-width: 768px) {
  .service-hero { padding: 40px 0; }
}

/* Hero visual */
.service-hero {
  background: linear-gradient(rgba(0,0,0,.45), rgba(0,0,0,.45)), url('<?php echo get_template_directory_uri(); ?>/images/hero-bg.jpg');
  background-size: cover; background-position: center; color: #fff; text-align: center;
}
.service-hero h1 { margin: 0 0 8px; }
.service-hero p { margin: 0 0 16px; }
.service-hero .btn { display: inline-block; margin-right: 10px; }
</style>

<section class="service-hero">
    <div class="container">
        <h1>Tempo Traveller Services</h1>
        <p>Spacious group transportation for families, tours, and corporate events</p>
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
                    <h2><i class="fas fa-shuttle-van"></i> Tempo Traveller Services in Mangalore</h2>
                    <p>Perfect for group travel, our Tempo Traveller service offers spacious, comfortable transportation for families, corporate groups, and tour packages. With seating capacity for 12-15 passengers, it's the ideal choice for group outings, family trips, and business travel.</p>
                    
                    <p>Our Tempo Travellers are equipped with modern amenities including air conditioning, comfortable seating, ample luggage space, and experienced drivers. Whether you're planning a family vacation, corporate outing, or group tour, we ensure a comfortable and memorable journey.</p>
                </div>

                <div class="service-features">
                    <h3><i class="fas fa-thumbs-up"></i> Why Choose Our Tempo Traveller Service?</h3>
                    <div class="features-grid">
                        <div class="feature-item">
                            <i class="fas fa-users"></i>
                            <h4>Group Travel</h4>
                            <p>Perfect for 12-15 passengers traveling together</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-suitcase"></i>
                            <h4>Luggage Space</h4>
                            <p>Ample storage for group luggage and equipment</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-snowflake"></i>
                            <h4>Air Conditioned</h4>
                            <p>Climate control for comfortable travel in all weather</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-couch"></i>
                            <h4>Comfortable Seating</h4>
                            <p>Spacious seats with proper legroom for all passengers</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-shield-alt"></i>
                            <h4>Safe Travel</h4>
                            <p>Regular maintenance and safety checks for group safety</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-route"></i>
                            <h4>Flexible Routes</h4>
                            <p>Customizable routes for group tours and outings</p>
                        </div>
                    </div>
                </div>

                <div class="service-areas">
                    <h3><i class="fas fa-route"></i> Popular Tempo Traveller Routes</h3>
                    <div class="areas-grid">
                        <div class="area-category">
                            <h4>Family Outings</h4>
                            <ul>
                                <li>Beach Trips (Panambur, Malpe)</li>
                                <li>Hill Stations (Kudremukh, Agumbe)</li>
                                <li>Temple Tours (Dharmasthala, Udupi)</li>
                                <li>Wildlife Sanctuaries</li>
                            </ul>
                        </div>
                        <div class="area-category">
                            <h4>Corporate Travel</h4>
                            <ul>
                                <li>Team Building Events</li>
                                <li>Business Meetings</li>
                                <li>Corporate Retreats</li>
                                <li>Conference Transportation</li>
                            </ul>
                        </div>
                        <div class="area-category">
                            <h4>Tourist Destinations</h4>
                            <ul>
                                <li>Goa (350 km)</li>
                                <li>Kerala (200+ km)</li>
                                <li>Coorg (180 km)</li>
                                <li>Mysore (280 km)</li>
                            </ul>
                        </div>
                        <div class="area-category">
                            <h4>Local Tours</h4>
                            <ul>
                                <li>Mangalore City Tour</li>
                                <li>Heritage Walks</li>
                                <li>Food Tours</li>
                                <li>Shopping Trips</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="service-description">
                    <h3><i class="fas fa-bus"></i> Our Tempo Traveller Fleet</h3>
                    <p>We maintain a fleet of well-maintained Tempo Travellers to meet different group requirements:</p>
                    <ul>
                        <li><strong>Standard Tempo Traveller:</strong> 12-15 seats with basic amenities</li>
                        <li><strong>Premium Tempo Traveller:</strong> 12-15 seats with luxury features</li>
                        <li><strong>Corporate Tempo Traveller:</strong> Business-class comfort for corporate groups</li>
                        <li><strong>Tourist Tempo Traveller:</strong> Specialized for long-distance tours</li>
                    </ul>
                </div>

                <div class="service-description">
                    <h3><i class="fas fa-calendar-check"></i> Ideal for Various Occasions</h3>
                    <p>Our Tempo Traveller service is perfect for:</p>
                    <ol>
                        <li><strong>Family Vacations:</strong> Comfortable travel for extended families</li>
                        <li><strong>Corporate Events:</strong> Team outings and business travel</li>
                        <li><strong>Educational Tours:</strong> School and college group trips</li>
                        <li><strong>Religious Pilgrimages:</strong> Temple and religious site visits</li>
                        <li><strong>Wedding Functions:</strong> Transportation for wedding guests</li>
                    </ol>
                </div>
            </div>

            <div class="service-sidebar">
                <div class="booking-card" id="booking">
                    <h3>Book Tempo Traveller</h3>
                    <form class="booking-form" id="tempoTravellerBookingForm">
                        <input type="hidden" name="form_type" value="tempo_traveller_booking">
                        <input type="hidden" name="service_name" value="Tempo Traveller">
                        
                        <div class="form-group">
                            <label for="trip_type">Trip Type</label>
                            <select name="trip_type" id="trip_type" required>
                                <option value="">Select Trip Type</option>
                                <option value="local_tour">Local Tour</option>
                                <option value="outstation">Outstation Trip</option>
                                <option value="corporate">Corporate Event</option>
                                <option value="family_outing">Family Outing</option>
                                <option value="wedding">Wedding Function</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="pickup_location">Pickup Location</label>
                            <textarea name="pickup_location" id="pickup_location" rows="2" placeholder="Starting point of your journey" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="destination">Destination</label>
                            <textarea name="destination" id="destination" rows="2" placeholder="Where do you want to go?" required></textarea>
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
                            <label for="pickup_time">Pickup Time</label>
                            <input type="time" name="pickup_time" id="pickup_time" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="passengers">Number of Passengers</label>
                            <select name="passengers" id="passengers" required>
                                <option value="">Select</option>
                                <option value="1-5">1-5 Passengers</option>
                                <option value="6-10">6-10 Passengers</option>
                                <option value="11-15">11-15 Passengers</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="vehicle_type">Vehicle Type</label>
                            <select name="vehicle_type" id="vehicle_type" required>
                                <option value="">Select Vehicle</option>
                                <option value="standard">Standard Tempo Traveller</option>
                                <option value="premium">Premium Tempo Traveller</option>
                                <option value="corporate">Corporate Tempo Traveller</option>
                                <option value="tourist">Tourist Tempo Traveller</option>
                            </select>
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
                    <h3>Tempo Traveller Pricing</h3>
                    <div class="pricing-item">
                        <span class="distance">Local Tours (0-50 km)</span>
                        <span class="price">₹2500</span>
                    </div>
                    <div class="pricing-item">
                        <span class="distance">Outstation (50-200 km)</span>
                        <span class="price">₹15/km</span>
                    </div>
                    <div class="pricing-item">
                        <span class="distance">Long Distance (200+ km)</span>
                        <span class="price">₹12/km</span>
                    </div>
                    <div class="pricing-item">
                        <span class="distance">Corporate Events</span>
                        <span class="price">₹3000</span>
                    </div>
                    <p class="pricing-note">*Prices include fuel, driver charges, and tolls. No hidden fees.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="service-faq">
    <div class="container">
        <h2><i class="fas fa-question-circle"></i> Frequently Asked Questions</h2>
        <div class="faq-list">
            <div class="faq-item">
                <div class="faq-question">
                    <h3>How many passengers can a Tempo Traveller accommodate?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Our Tempo Travellers can comfortably accommodate 12-15 passengers with luggage. For larger groups, we can arrange multiple vehicles or suggest alternative transportation options.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Is there enough luggage space for group travel?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Yes, our Tempo Travellers are designed with ample luggage space. There's dedicated storage area for suitcases, bags, and equipment, ensuring comfortable travel for all passengers.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Can I customize the route for group tours?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Absolutely! We offer flexible routing for group tours. You can plan multiple stops, sightseeing locations, and customize the itinerary according to your group's preferences.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Do you provide corporate transportation services?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Yes, we specialize in corporate transportation. We offer professional services for team outings, business meetings, corporate events, and executive travel with experienced drivers and well-maintained vehicles.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h3>What amenities are included in the Tempo Traveller?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Our Tempo Travellers include air conditioning, comfortable seating, music system, charging points, and ample luggage space. Premium vehicles also feature additional amenities like WiFi and refreshments.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="related-services">
    <div class="container">
        <h2><i class="fas fa-concierge-bell"></i> Other Services You Might Like</h2>
        <div class="services-grid">
            <div class="service-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/city-taxi.jpg" alt="City Taxi">
                <h3>City Taxi</h3>
                <p>Local transportation within Mangalore city</p>
                <a href="city-taxi.php" class="btn btn-secondary">Learn More</a>
            </div>
            <div class="service-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/outstation-taxi.php" alt="Outstation Taxi">
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

