<?php
/**
 * Template Name: City Tour Service
 * 
 * This is a custom template for the City Tour Service page
 */

get_header(); ?>

<style>
/* Service Page Specific Styles */
.service-hero {
    height: 50vh;
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo get_template_directory_uri(); ?>/images/city-tour-bg.jpg') no-repeat center center/cover;
    display: flex;
    align-items: center;
    text-align: center;
    color: #fff;
    padding-top: 80px;
}

.service-details {
    padding: 80px 0;
}

.service-details-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 50px;
    align-items: start;
}

.service-content h2 {
    font-size: 2.2rem;
    margin-bottom: 20px;
    color: var(--dark-color);
}

.service-content p {
    margin-bottom: 20px;
    color: var(--gray-color);
    line-height: 1.8;
}

.service-features {
    margin: 30px 0;
}

.service-features h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
    color: var(--dark-color);
}

.feature-list {
    list-style: none;
}

.feature-list li {
    margin-bottom: 10px;
    padding-left: 30px;
    position: relative;
}

.feature-list li:before {
    content: '\f00c';
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    position: absolute;
    left: 0;
    color: var(--primary-color);
}

.tour-packages {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin: 30px 0;
}

.tour-package {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.tour-package:hover {
    transform: translateY(-5px);
}

.tour-package img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.tour-package-content {
    padding: 20px;
}

.tour-package h4 {
    font-size: 1.3rem;
    margin-bottom: 10px;
    color: var(--dark-color);
}

.tour-package p {
    color: var(--gray-color);
    margin-bottom: 15px;
}

.tour-package .price {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--primary-color);
    margin-bottom: 15px;
}

.service-sidebar {
    background-color: var(--light-color);
    padding: 30px;
    border-radius: 10px;
    position: sticky;
    top: 100px;
}

.service-sidebar h3 {
    font-size: 1.5rem;
    margin-bottom: 20px;
    color: var(--dark-color);
}

.booking-form .form-group {
    margin-bottom: 15px;
}

.booking-form label {
    display: block;
    margin-bottom: 5px;
    font-weight: 500;
}

.booking-form input,
.booking-form select,
.booking-form textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

.booking-form button {
    width: 100%;
    padding: 15px;
    background: var(--primary-color);
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s ease;
}

.booking-form button:hover {
    background: var(--primary-dark);
}

@media (max-width: 768px) {
    .service-details-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .service-hero {
        height: 40vh;
        padding-top: 60px;
    }
    
    .tour-packages {
        grid-template-columns: 1fr;
    }
}
</style>

<!-- Hero Section -->
<section class="service-hero">
    <div class="container">
        <h1>City Tour Service</h1>
        <p>Explore the city's most iconic landmarks and hidden gems with our expert guides</p>
    </div>
</section>

<!-- Service Details -->
<section class="service-details">
    <div class="container">
        <div class="service-details-grid">
            <div class="service-content">
                <h2>Discover the City with Expert Guides</h2>
                <p>Experience the best of our city with our comprehensive tour packages. From historical landmarks to modern attractions, our expert guides will take you on an unforgettable journey through the heart of the city.</p>
                
                <div class="service-features">
                    <h3>Why Choose Our City Tours?</h3>
                    <ul class="feature-list">
                        <li>Professional and knowledgeable tour guides</li>
                        <li>Comfortable air-conditioned vehicles</li>
                        <li>Flexible tour schedules</li>
                        <li>Small group sizes for personalized experience</li>
                        <li>Photo opportunities at all major attractions</li>
                        <li>Hotel pickup and drop-off included</li>
                        <li>Refreshments provided during tours</li>
                        <li>Multilingual guides available</li>
                    </ul>
                </div>
                
                <div class="service-features">
                    <h3>Popular Tour Packages</h3>
                    <div class="tour-packages">
                        <div class="tour-package">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/historical-tour.jpg" alt="Historical Tour">
                            <div class="tour-package-content">
                                <h4>Historical City Tour</h4>
                                <p>Explore the city's rich history through its ancient monuments and heritage sites.</p>
                                <div class="price">$45 per person</div>
                                <p><strong>Duration:</strong> 4 hours</p>
                            </div>
                        </div>
                        
                        <div class="tour-package">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/modern-tour.jpg" alt="Modern Tour">
                            <div class="tour-package-content">
                                <h4>Modern City Tour</h4>
                                <p>Discover the contemporary side of the city with visits to modern attractions.</p>
                                <div class="price">$35 per person</div>
                                <p><strong>Duration:</strong> 3 hours</p>
                            </div>
                        </div>
                        
                        <div class="tour-package">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/full-day-tour.jpg" alt="Full Day Tour">
                            <div class="tour-package-content">
                                <h4>Full Day City Experience</h4>
                                <p>Complete city exploration including lunch and all major attractions.</p>
                                <div class="price">$75 per person</div>
                                <p><strong>Duration:</strong> 8 hours</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="service-features">
                    <h3>Tour Highlights</h3>
                    <ul class="feature-list">
                        <li><strong>Historical Sites:</strong> Ancient temples, forts, and monuments</li>
                        <li><strong>Cultural Centers:</strong> Museums, art galleries, and theaters</li>
                        <li><strong>Modern Attractions:</strong> Shopping districts, entertainment venues</li>
                        <li><strong>Natural Beauty:</strong> Parks, gardens, and scenic viewpoints</li>
                        <li><strong>Local Markets:</strong> Traditional bazaars and modern malls</li>
                    </ul>
                </div>
            </div>
            
            <div class="service-sidebar">
                <h3>Book Your City Tour</h3>
                <form class="booking-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <input type="hidden" name="action" value="book_city_tour">
                    <?php wp_nonce_field('book_city_tour_nonce', 'city_tour_nonce'); ?>
                    
                    <div class="form-group">
                        <label for="tour_package">Tour Package</label>
                        <select name="tour_package" id="tour_package" required>
                            <option value="">Select Package</option>
                            <option value="historical">Historical City Tour - $45</option>
                            <option value="modern">Modern City Tour - $35</option>
                            <option value="full_day">Full Day City Experience - $75</option>
                            <option value="custom">Custom Tour</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="tour_date">Tour Date</label>
                        <input type="date" name="tour_date" id="tour_date" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="tour_time">Preferred Time</label>
                        <select name="tour_time" id="tour_time" required>
                            <option value="">Select Time</option>
                            <option value="09:00">9:00 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="14:00">2:00 PM</option>
                            <option value="15:00">3:00 PM</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="adults">Number of Adults</label>
                        <select name="adults" id="adults" required>
                            <option value="">Select</option>
                            <option value="1">1 Adult</option>
                            <option value="2">2 Adults</option>
                            <option value="3">3 Adults</option>
                            <option value="4">4 Adults</option>
                            <option value="5">5 Adults</option>
                            <option value="6">6+ Adults</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="children">Number of Children</label>
                        <select name="children" id="children">
                            <option value="0">0 Children</option>
                            <option value="1">1 Child</option>
                            <option value="2">2 Children</option>
                            <option value="3">3 Children</option>
                            <option value="4">4 Children</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="pickup_location">Pickup Location</label>
                        <textarea name="pickup_location" id="pickup_location" rows="3" placeholder="Hotel name or address" required></textarea>
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
                        <textarea name="special_requests" id="special_requests" rows="3" placeholder="Any special requests or accessibility needs"></textarea>
                    </div>
                    
                    <button type="submit">Book Tour</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
