<?php
/**
 * Template Name: Booking Page
 * 
 * This is a custom template for the Booking page
 */

get_header(); ?>

<style>
.booking-hero {
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo get_template_directory_uri(); ?>/images/booking-bg.jpg');
    background-size: cover;
    background-position: center;
    padding: 100px 0 50px;
    color: #fff;
    text-align: center;
}

.booking-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 50px 20px;
}

.booking-form-container {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    padding: 40px;
    margin-bottom: 50px;
}

.booking-form {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group label {
    font-weight: 600;
    margin-bottom: 8px;
    color: #333;
}

.form-group input,
.form-group select,
.form-group textarea {
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    transition: border-color 0.3s ease;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: var(--primary-color);
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.booking-submit {
    background: var(--primary-color);
    color: #fff;
    padding: 15px 30px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s ease;
    width: 100%;
}

.booking-submit:hover {
    background: var(--primary-dark);
}

.booking-options {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-bottom: 50px;
}

.booking-option {
    background: #fff;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease;
}

.booking-option:hover {
    transform: translateY(-5px);
}

.booking-option-icon {
    width: 60px;
    height: 60px;
    background: var(--primary-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    color: #fff;
    font-size: 1.5rem;
}

.booking-option h3 {
    font-size: 1.3rem;
    margin-bottom: 15px;
    color: #333;
}

.booking-option p {
    color: #666;
    line-height: 1.6;
    margin-bottom: 20px;
}

.booking-option .price {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 15px;
}

.booking-option .btn {
    display: inline-block;
    padding: 10px 20px;
    background: var(--primary-color);
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background 0.3s ease;
}

.booking-option .btn:hover {
    background: var(--primary-dark);
}

.booking-info {
    background: #f8f9fa;
    padding: 40px;
    border-radius: 10px;
    margin-bottom: 50px;
}

.booking-info h2 {
    text-align: center;
    margin-bottom: 30px;
    color: #333;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
}

.info-item {
    text-align: center;
}

.info-item h3 {
    color: var(--primary-color);
    margin-bottom: 10px;
}

.info-item p {
    color: #666;
    line-height: 1.6;
}

.contact-info {
    background: var(--primary-color);
    color: #fff;
    padding: 40px;
    border-radius: 10px;
    text-align: center;
}

.contact-info h2 {
    margin-bottom: 20px;
}

.contact-info p {
    margin-bottom: 20px;
    font-size: 1.1rem;
}

.contact-info .phone {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 15px;
}

.contact-info .email {
    font-size: 1.1rem;
    margin-bottom: 20px;
}

@media (max-width: 768px) {
    .booking-form {
        grid-template-columns: 1fr;
    }
    
    .booking-options {
        grid-template-columns: 1fr;
    }
    
    .info-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<!-- Hero Section -->
<section class="booking-hero">
    <div class="container">
        <h1>Book Your Travel Service</h1>
        <p>Easy and convenient booking for all your travel needs</p>
    </div>
</section>

<!-- Booking Form -->
<section class="booking-container">
    <div class="booking-form-container">
        <h2 style="text-align: center; margin-bottom: 30px; color: #333;">Book Your Service</h2>
        
        <form class="booking-form" action="#" method="POST">
            <div class="form-group">
                <label for="service-type">Service Type</label>
                <select id="service-type" name="service_type" required>
                    <option value="">Select Service</option>
                    <option value="airport-transfer">Airport Transfer</option>
                    <option value="city-tour">City Tour</option>
                    <option value="corporate-travel">Corporate Travel</option>
                    <option value="event-transport">Event Transportation</option>
                    <option value="executive-travel">Executive Travel</option>
                    <option value="group-transport">Group Transportation</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="pickup-location">Pickup Location</label>
                <input type="text" id="pickup-location" name="pickup_location" placeholder="Enter pickup address" required>
            </div>
            
            <div class="form-group">
                <label for="dropoff-location">Dropoff Location</label>
                <input type="text" id="dropoff-location" name="dropoff_location" placeholder="Enter destination address" required>
            </div>
            
            <div class="form-group">
                <label for="pickup-date">Pickup Date</label>
                <input type="date" id="pickup-date" name="pickup_date" required>
            </div>
            
            <div class="form-group">
                <label for="pickup-time">Pickup Time</label>
                <input type="time" id="pickup-time" name="pickup_time" required>
            </div>
            
            <div class="form-group">
                <label for="passengers">Number of Passengers</label>
                <select id="passengers" name="passengers" required>
                    <option value="">Select</option>
                    <option value="1">1 Passenger</option>
                    <option value="2">2 Passengers</option>
                    <option value="3">3 Passengers</option>
                    <option value="4">4 Passengers</option>
                    <option value="5">5 Passengers</option>
                    <option value="6+">6+ Passengers</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="vehicle-type">Vehicle Type</label>
                <select id="vehicle-type" name="vehicle_type" required>
                    <option value="">Select Vehicle</option>
                    <option value="sedan">Sedan</option>
                    <option value="suv">SUV</option>
                    <option value="luxury">Luxury Vehicle</option>
                    <option value="minivan">Minivan</option>
                    <option value="bus">Bus</option>
                </select>
            </div>
            
            <div class="form-group full-width">
                <label for="special-requests">Special Requests</label>
                <textarea id="special-requests" name="special_requests" rows="4" placeholder="Any special requirements or requests..."></textarea>
            </div>
            
            <div class="form-group">
                <label for="customer-name">Full Name</label>
                <input type="text" id="customer-name" name="customer_name" placeholder="Enter your full name" required>
            </div>
            
            <div class="form-group">
                <label for="customer-email">Email</label>
                <input type="email" id="customer-email" name="customer_email" placeholder="Enter your email" required>
            </div>
            
            <div class="form-group">
                <label for="customer-phone">Phone</label>
                <input type="tel" id="customer-phone" name="customer_phone" placeholder="Enter your phone number" required>
            </div>
            
            <div class="form-group full-width">
                <button type="submit" class="booking-submit">Book Now</button>
            </div>
        </form>
    </div>
    
    <!-- Booking Options -->
    <div class="booking-options">
        <div class="booking-option">
            <div class="booking-option-icon">
                <i class="fas fa-plane"></i>
            </div>
            <h3>Airport Transfer</h3>
            <p>Reliable airport pickup and drop-off services with flight tracking.</p>
            <div class="price">From $50</div>
            <a href="#" class="btn">Book Now</a>
        </div>
        
        <div class="booking-option">
            <div class="booking-option-icon">
                <i class="fas fa-map-marked-alt"></i>
            </div>
            <h3>City Tour</h3>
            <p>Explore the city with our professional tour guides and comfortable vehicles.</p>
            <div class="price">From $100</div>
            <a href="#" class="btn">Book Now</a>
        </div>
        
        <div class="booking-option">
            <div class="booking-option-icon">
                <i class="fas fa-building"></i>
            </div>
            <h3>Corporate Travel</h3>
            <p>Professional transportation services for business meetings and events.</p>
            <div class="price">From $150</div>
            <a href="#" class="btn">Book Now</a>
        </div>
        
        <div class="booking-option">
            <div class="booking-option-icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <h3>Event Transportation</h3>
            <p>Transportation for special events, weddings, and celebrations.</p>
            <div class="price">From $200</div>
            <a href="#" class="btn">Book Now</a>
        </div>
        
        <div class="booking-option">
            <div class="booking-option-icon">
                <i class="fas fa-crown"></i>
            </div>
            <h3>Executive Travel</h3>
            <p>Premium luxury vehicles for executives and VIP clients.</p>
            <div class="price">From $300</div>
            <a href="#" class="btn">Book Now</a>
        </div>
        
        <div class="booking-option">
            <div class="booking-option-icon">
                <i class="fas fa-users"></i>
            </div>
            <h3>Group Transportation</h3>
            <p>Transportation for groups, tours, and large events.</p>
            <div class="price">From $400</div>
            <a href="#" class="btn">Book Now</a>
        </div>
    </div>
    
    <!-- Booking Information -->
    <div class="booking-info">
        <h2>Booking Information</h2>
        <div class="info-grid">
            <div class="info-item">
                <h3>Easy Booking</h3>
                <p>Simple online booking process with instant confirmation and flexible payment options.</p>
            </div>
            
            <div class="info-item">
                <h3>24/7 Support</h3>
                <p>Round-the-clock customer support to assist you with any questions or changes to your booking.</p>
            </div>
            
            <div class="info-item">
                <h3>Professional Service</h3>
                <p>Experienced drivers, well-maintained vehicles, and punctual service guaranteed.</p>
            </div>
            
            <div class="info-item">
                <h3>Competitive Pricing</h3>
                <p>Transparent pricing with no hidden fees and competitive rates for all services.</p>
            </div>
        </div>
    </div>
    
    <!-- Contact Information -->
    <div class="contact-info">
        <h2>Need Help with Booking?</h2>
        <p>Our customer service team is here to help you with any questions or special requests.</p>
        <div class="phone">+1 (555) 123-4567</div>
        <div class="email">booking@travelease.com</div>
        <p>Available 24/7 for your convenience</p>
    </div>
</section>

<?php get_footer(); ?>
