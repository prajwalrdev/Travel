<?php
/*
 * Template Name: Wedding Cars Service
 */
get_header(); ?>

<section class="service-hero">
    <div class="container">
        <h1>Wedding Car Services</h1>
        <p>Make your special day memorable with our luxury wedding car collection</p>
        <div class="hero-buttons">
            <a href="#booking" class="btn btn-primary">Book Now</a>
            <a href="#pricing" class="btn btn-secondary">View Pricing</a>
        </div>
    </div>
</section>

<section class="service-details">
    <div class="container">
        <div class="service-content">
            <div class="service-main">
                <div class="service-description">
                    <h2>Luxury Wedding Car Services in Mangalore</h2>
                    <p>Your wedding day is one of the most important days of your life, and we're here to make it perfect with our premium wedding car collection. From elegant sedans to luxurious SUVs, we provide the perfect vehicle to complement your special day.</p>
                    
                    <p>Our wedding car service is designed to add elegance and sophistication to your wedding celebrations. With professional chauffeurs, beautifully decorated vehicles, and flexible booking options, we ensure your wedding transportation is as memorable as the ceremony itself.</p>
                </div>

                <div class="service-features">
                    <h3>Why Choose Our Wedding Car Service?</h3>
                    <div class="features-grid">
                        <div class="feature-item">
                            <i class="fas fa-star"></i>
                            <h4>Premium Vehicles</h4>
                            <p>Luxury cars in pristine condition for your special day</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-user-tie"></i>
                            <h4>Professional Chauffeurs</h4>
                            <p>Experienced drivers in formal attire for your wedding</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-palette"></i>
                            <h4>Custom Decoration</h4>
                            <p>Beautiful floral arrangements and wedding decorations</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-clock"></i>
                            <h4>Flexible Timing</h4>
                            <p>Available for multiple trips throughout your wedding day</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-shield-alt"></i>
                            <h4>Safe Travel</h4>
                            <p>Insured vehicles with regular maintenance checks</p>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-camera"></i>
                            <h4>Photo Opportunities</h4>
                            <p>Perfect backdrop for your wedding photography</p>
                        </div>
                    </div>
                </div>

                <div class="service-areas">
                    <h3>Wedding Car Service Areas</h3>
                    <div class="areas-grid">
                        <div class="area-category">
                            <h4>Mangalore City</h4>
                            <ul>
                                <li>City Center</li>
                                <li>Kadri Hills</li>
                                <li>Bejai</li>
                                <li>Kankanady</li>
                                <li>Hampankatta</li>
                            </ul>
                        </div>
                        <div class="area-category">
                            <h4>Nearby Towns</h4>
                            <ul>
                                <li>Ullal</li>
                                <li>Surathkal</li>
                                <li>Mulki</li>
                                <li>Udupi</li>
                                <li>Bantwal</li>
                            </ul>
                        </div>
                        <div class="area-category">
                            <h4>Wedding Venues</h4>
                            <ul>
                                <li>Beach Resorts</li>
                                <li>Hill Stations</li>
                                <li>City Hotels</li>
                                <li>Garden Venues</li>
                                <li>Traditional Halls</li>
                            </ul>
                        </div>
                        <div class="area-category">
                            <h4>Special Locations</h4>
                            <ul>
                                <li>Airport Pickup</li>
                                <li>Railway Station</li>
                                <li>Bus Stand</li>
                                <li>Religious Places</li>
                                <li>Photo Shoot Locations</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="service-description">
                    <h3>Our Wedding Car Collection</h3>
                    <p>We offer a variety of luxury vehicles to suit different wedding styles and preferences:</p>
                    <ul>
                        <li><strong>Luxury Sedan:</strong> Elegant and sophisticated for intimate weddings</li>
                        <li><strong>Premium SUV:</strong> Spacious and comfortable for family weddings</li>
                        <li><strong>Classic Car:</strong> Vintage charm for traditional celebrations</li>
                        <li><strong>Limousine:</strong> Ultimate luxury for grand weddings</li>
                        <li><strong>Convertible:</strong> Stylish option for modern couples</li>
                    </ul>
                </div>

                <div class="service-description">
                    <h3>Wedding Car Service Packages</h3>
                    <p>We offer flexible packages to suit your wedding requirements:</p>
                    <ol>
                        <li><strong>Basic Package:</strong> Single trip from home to venue</li>
                        <li><strong>Standard Package:</strong> Multiple trips including photo shoots</li>
                        <li><strong>Premium Package:</strong> Full day service with multiple locations</li>
                        <li><strong>Luxury Package:</strong> Multiple luxury cars for the entire family</li>
                    </ol>
                </div>
            </div>

            <div class="service-sidebar">
                <div class="booking-card" id="booking">
                    <h3>Book Wedding Car</h3>
                    <form class="booking-form" id="weddingCarBookingForm">
                        <input type="hidden" name="form_type" value="wedding_car_booking">
                        <input type="hidden" name="service_name" value="Wedding Car">
                        
                        <div class="form-group">
                            <label for="wedding_date">Wedding Date</label>
                            <input type="date" name="wedding_date" id="wedding_date" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="vehicle_type">Vehicle Type</label>
                            <select name="vehicle_type" id="vehicle_type" required>
                                <option value="">Select Vehicle</option>
                                <option value="luxury_sedan">Luxury Sedan</option>
                                <option value="premium_suv">Premium SUV</option>
                                <option value="classic_car">Classic Car</option>
                                <option value="limousine">Limousine</option>
                                <option value="convertible">Convertible</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="service_package">Service Package</label>
                            <select name="service_package" id="service_package" required>
                                <option value="">Select Package</option>
                                <option value="basic">Basic Package</option>
                                <option value="standard">Standard Package</option>
                                <option value="premium">Premium Package</option>
                                <option value="luxury">Luxury Package</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="pickup_location">Pickup Location</label>
                            <textarea name="pickup_location" id="pickup_location" rows="2" placeholder="Bride/Groom's address" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="wedding_venue">Wedding Venue</label>
                            <textarea name="wedding_venue" id="wedding_venue" rows="2" placeholder="Wedding ceremony venue" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="pickup_time">Pickup Time</label>
                            <input type="time" name="pickup_time" id="pickup_time" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="additional_locations">Additional Locations (Optional)</label>
                            <textarea name="additional_locations" id="additional_locations" rows="2" placeholder="Photo shoot locations, reception venue, etc."></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="decorations">Special Decoration Requests</label>
                            <textarea name="decorations" id="decorations" rows="2" placeholder="Color theme, flower preferences, etc."></textarea>
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
                            <textarea name="special_requests" id="special_requests" rows="3" placeholder="Any other special requirements"></textarea>
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
                            <p>info@tsmtravells.com</p>
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
                    <h3>Wedding Car Pricing</h3>
                    <div class="pricing-item">
                        <span class="distance">Basic Package</span>
                        <span class="price">₹5000</span>
                    </div>
                    <div class="pricing-item">
                        <span class="distance">Standard Package</span>
                        <span class="price">₹8000</span>
                    </div>
                    <div class="pricing-item">
                        <span class="distance">Premium Package</span>
                        <span class="price">₹12000</span>
                    </div>
                    <div class="pricing-item">
                        <span class="distance">Luxury Package</span>
                        <span class="price">₹20000</span>
                    </div>
                    <p class="pricing-note">*Prices include decoration, fuel, and chauffeur. Additional charges for extra locations.</p>
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
                    <h3>How far in advance should I book a wedding car?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>We recommend booking at least 2-3 months in advance for wedding cars, especially during peak wedding seasons (November to February). This ensures availability of your preferred vehicle and allows time for custom decorations.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h3>What is included in the wedding car service?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Our service includes the luxury vehicle, professional chauffeur in formal attire, basic decoration, fuel, and insurance. Additional decorations, multiple locations, and extended hours can be arranged at extra cost.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Can I customize the car decoration?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Absolutely! We offer custom decoration services. You can choose your color theme, flower preferences, and special requests. We'll work with you to create the perfect look for your wedding car.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Do you provide multiple cars for family members?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Yes, we can arrange multiple luxury cars for your family members. Our luxury package includes multiple vehicles to ensure everyone travels in style on your special day.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h3>What if I need to cancel my wedding car booking?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Cancellations made 30 days before the wedding date are fully refundable. Cancellations within 30 days may incur charges based on our cancellation policy. We understand wedding plans can change and try to be flexible.</p>
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
                <img src="<?php echo get_template_directory_uri(); ?>/images/ity-taxi.jpg" alt="City Taxi">
                <h3 class="service-title">City Taxi</h3>
                <p>Local transportation within Mangalore city</p>
                <a href="city-taxi.php" class="btn btn-primary">Learn More</a>
            </div>
            <div class="service-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/outstation-taxi.jpg" alt="Outstation Taxi">
                <h3 class="service-title">Outstation Taxi</h3>
                <p>Long-distance travel to nearby cities and tourist spots</p>
                <a href="outstation-taxi.php" class="btn btn-primary">Learn More</a>
            </div>
            <div class="service-card">
                <img src="service-title"<?php echo get_template_directory_uri(); ?>/images/airport-taxi.jpg" alt="Airport Taxi">
                <h3>Airport Taxi</h3>
                <p>Reliable airport transfers to and from Mangalore</p>
                <a href="airport-taxi.php" class="btn btn-primary">Learn More</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>