<?php
/**
 * Template Name: Hotel Transfer Service
 * 
 * This is a custom template for the Hotel Transfer Service page
 */

get_header(); ?>

<style>
/* Service Page Specific Styles */
.service-hero {
    height: 50vh;
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo get_template_directory_uri(); ?>/images/hotel-transfer-bg.jpg') no-repeat center center/cover;
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
        <h1>Hotel Transfer Service</h1>
        <p>Seamless transfers between hotels, airports, and destinations</p>
    </div>
</section>

<!-- Service Details -->
<section class="service-details">
    <div class="container">
        <div class="service-details-grid">
            <div class="service-content">
                <h2>Professional Hotel Transfer Service</h2>
                <p>Experience hassle-free hotel transfers with our professional service. We provide reliable, comfortable, and timely transportation between hotels, airports, and any destination you need.</p>
                
                <div class="service-features">
                    <h3>Why Choose Our Hotel Transfer Service?</h3>
                    <ul class="feature-list">
                        <li>Professional and experienced drivers</li>
                        <li>Clean and well-maintained vehicles</li>
                        <li>Fixed pricing with no hidden charges</li>
                        <li>Meet and greet service at hotels</li>
                        <li>Luggage assistance included</li>
                        <li>Child seats available on request</li>
                        <li>24/7 availability</li>
                        <li>Flight monitoring for airport transfers</li>
                    </ul>
                </div>
                
                <div class="service-features">
                    <h3>Our Transfer Services</h3>
                    <ul class="feature-list">
                        <li><strong>Hotel to Hotel:</strong> Seamless transfers between different hotels</li>
                        <li><strong>Hotel to Airport:</strong> Reliable airport drop-off service</li>
                        <li><strong>Airport to Hotel:</strong> Comfortable pickup from airports</li>
                        <li><strong>City to City:</strong> Long-distance transfers between cities</li>
                        <li><strong>Event Transfers:</strong> Transportation to and from events</li>
                    </ul>
                </div>
                
                <div class="service-features">
                    <h3>Vehicle Options</h3>
                    <ul class="feature-list">
                        <li><strong>Economy Sedan:</strong> Perfect for 1-3 passengers with luggage</li>
                        <li><strong>SUV:</strong> Ideal for families and groups of 4-6 passengers</li>
                        <li><strong>Luxury Vehicle:</strong> Premium service for business travelers</li>
                        <li><strong>Minivan:</strong> Spacious option for larger groups</li>
                        <li><strong>Mini Bus:</strong> Perfect for group transfers</li>
                    </ul>
                </div>
            </div>
            
            <div class="service-sidebar">
                <h3>Book Your Hotel Transfer</h3>
                <form class="booking-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <input type="hidden" name="action" value="book_hotel_transfer">
                    <?php wp_nonce_field('book_hotel_transfer_nonce', 'hotel_transfer_nonce'); ?>
                    
                    <div class="form-group">
                        <label for="transfer_type">Transfer Type</label>
                        <select name="transfer_type" id="transfer_type" required>
                            <option value="">Select Type</option>
                            <option value="hotel_to_hotel">Hotel to Hotel</option>
                            <option value="hotel_to_airport">Hotel to Airport</option>
                            <option value="airport_to_hotel">Airport to Hotel</option>
                            <option value="city_to_city">City to City</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="transfer_date">Transfer Date</label>
                        <input type="date" name="transfer_date" id="transfer_date" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="transfer_time">Transfer Time</label>
                        <input type="time" name="transfer_time" id="transfer_time" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="vehicle_type">Vehicle Type</label>
                        <select name="vehicle_type" id="vehicle_type" required>
                            <option value="">Select Vehicle</option>
                            <option value="sedan">Economy Sedan</option>
                            <option value="suv">SUV</option>
                            <option value="luxury">Luxury Vehicle</option>
                            <option value="minivan">Minivan</option>
                            <option value="minibus">Mini Bus</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="pickup_location">Pickup Location</label>
                        <textarea name="pickup_location" id="pickup_location" rows="3" placeholder="Hotel name or address" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="dropoff_location">Drop-off Location</label>
                        <textarea name="dropoff_location" id="dropoff_location" rows="3" placeholder="Hotel name or address" required></textarea>
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
                        <label for="luggage">Number of Luggage</label>
                        <select name="luggage" id="luggage" required>
                            <option value="">Select</option>
                            <option value="1">1 Piece</option>
                            <option value="2">2 Pieces</option>
                            <option value="3">3 Pieces</option>
                            <option value="4">4+ Pieces</option>
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
                        <textarea name="special_requests" id="special_requests" rows="3" placeholder="Any special requests or notes"></textarea>
                    </div>
                    
                    <button type="submit">Book Transfer</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
