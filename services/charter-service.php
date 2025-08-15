<?php
/**
 * Template Name: Charter Service
 * 
 * This is a custom template for the Charter Service page
 */

get_header(); ?>

<style>
.service-hero {
    height: 50vh;
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo get_template_directory_uri(); ?>/images/charter-bg.jpg') no-repeat center center/cover;
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
}
</style>

<!-- Hero Section -->
<section class="service-hero">
    <div class="container">
        <h1>Charter Service</h1>
        <p>Professional group transportation for events, corporate functions, and tours</p>
    </div>
</section>

<!-- Service Details -->
<section class="service-details">
    <div class="container">
        <div class="service-details-grid">
            <div class="service-content">
                <h2>Professional Charter Transportation</h2>
                <p>Experience premium charter transportation services for groups of all sizes. From corporate events to family gatherings, we provide reliable, comfortable, and professional transportation solutions.</p>
                
                <div class="service-features">
                    <h3>Why Choose Our Charter Service?</h3>
                    <ul class="feature-list">
                        <li>Professional and experienced drivers</li>
                        <li>Well-maintained fleet of vehicles</li>
                        <li>Flexible scheduling and routes</li>
                        <li>Competitive pricing for groups</li>
                        <li>24/7 customer support</li>
                        <li>Luggage and equipment handling</li>
                        <li>Custom itineraries available</li>
                        <li>Insurance coverage included</li>
                    </ul>
                </div>
                
                <div class="service-features">
                    <h3>Charter Types</h3>
                    <ul class="feature-list">
                        <li><strong>Corporate Events:</strong> Business meetings, conferences, and corporate functions</li>
                        <li><strong>Weddings:</strong> Elegant transportation for wedding parties and guests</li>
                        <li><strong>Tour Groups:</strong> Guided tour transportation with knowledgeable drivers</li>
                        <li><strong>Airport Shuttle:</strong> Group airport transfers with flight monitoring</li>
                        <li><strong>School Events:</strong> Safe transportation for school trips and events</li>
                        <li><strong>Special Events:</strong> Custom solutions for concerts and festivals</li>
                    </ul>
                </div>
                
                <div class="service-features">
                    <h3>Our Fleet</h3>
                    <ul class="feature-list">
                        <li><strong>Minivan (8-12 passengers):</strong> Perfect for small groups and families</li>
                        <li><strong>Mini Bus (15-25 passengers):</strong> Ideal for medium-sized groups</li>
                        <li><strong>Coach Bus (30-50 passengers):</strong> Spacious option for large groups</li>
                        <li><strong>Luxury Bus (20-30 passengers):</strong> Premium service with amenities</li>
                    </ul>
                </div>
            </div>
            
            <div class="service-sidebar">
                <h3>Request Charter Quote</h3>
                <form class="booking-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <input type="hidden" name="action" value="book_charter_service">
                    <?php wp_nonce_field('book_charter_nonce', 'charter_nonce'); ?>
                    
                    <div class="form-group">
                        <label for="charter_type">Charter Type</label>
                        <select name="charter_type" id="charter_type" required>
                            <option value="">Select Type</option>
                            <option value="corporate">Corporate Event</option>
                            <option value="wedding">Wedding</option>
                            <option value="tour_group">Tour Group</option>
                            <option value="airport_shuttle">Airport Shuttle</option>
                            <option value="custom">Custom Charter</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" id="start_date" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" name="end_date" id="end_date" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="passenger_count">Number of Passengers</label>
                        <select name="passenger_count" id="passenger_count" required>
                            <option value="">Select Range</option>
                            <option value="1-10">1-10 Passengers</option>
                            <option value="11-25">11-25 Passengers</option>
                            <option value="26-50">26-50 Passengers</option>
                            <option value="51-100">51-100 Passengers</option>
                            <option value="100+">100+ Passengers</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="pickup_location">Pickup Location</label>
                        <textarea name="pickup_location" id="pickup_location" rows="3" placeholder="Enter pickup location" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="dropoff_location">Drop-off Location</label>
                        <textarea name="dropoff_location" id="dropoff_location" rows="3" placeholder="Enter drop-off location" required></textarea>
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
                        <label for="special_requirements">Special Requirements</label>
                        <textarea name="special_requirements" id="special_requirements" rows="3" placeholder="Any special requirements or notes"></textarea>
                    </div>
                    
                    <button type="submit">Request Quote</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
