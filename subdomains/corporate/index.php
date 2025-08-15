<?php
/**
 * Template Name: Corporate Services
 * 
 * This is a custom template for the Corporate subdomain page
 */

get_header(); ?>

<style>
.corporate-hero {
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo get_template_directory_uri(); ?>/images/corporate-bg.jpg');
    background-size: cover;
    background-position: center;
    padding: 100px 0 50px;
    color: #fff;
    text-align: center;
}

.corporate-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 50px 20px;
}

.corporate-services {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-bottom: 50px;
}

.service-card {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    text-align: center;
    padding: 30px;
}

.service-card:hover {
    transform: translateY(-10px);
}

.service-card i {
    font-size: 3rem;
    color: var(--primary-color);
    margin-bottom: 20px;
}

.service-card h3 {
    margin-bottom: 15px;
    font-size: 1.5rem;
    color: #333;
}

.service-card p {
    color: #666;
    margin-bottom: 20px;
    line-height: 1.6;
}

.corporate-form {
    background: #fff;
    border-radius: 10px;
    padding: 40px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: 0 auto;
}

.corporate-form h3 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 1.8rem;
    color: #333;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 500;
    color: #333;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

.form-group textarea {
    resize: vertical;
    min-height: 100px;
}

.corporate-form button {
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

.corporate-form button:hover {
    background: var(--primary-dark);
}

@media (max-width: 768px) {
    .corporate-services {
        grid-template-columns: 1fr;
    }
    
    .corporate-form {
        padding: 20px;
    }
}
</style>

<!-- Hero Section -->
<section class="corporate-hero">
    <div class="container">
        <h1>Corporate Travel Solutions</h1>
        <p>Professional transportation services for businesses and organizations</p>
    </div>
</section>

<!-- Corporate Services -->
<section class="corporate-container">
    <div class="corporate-services">
        <div class="service-card">
            <i class="fas fa-building"></i>
            <h3>Corporate Events</h3>
            <p>Reliable transportation for corporate meetings, conferences, and business events with professional drivers and luxury vehicles.</p>
        </div>
        
        <div class="service-card">
            <i class="fas fa-users"></i>
            <h3>Employee Transportation</h3>
            <p>Daily commute solutions for employees with scheduled pickups and drop-offs to and from office locations.</p>
        </div>
        
        <div class="service-card">
            <i class="fas fa-plane"></i>
            <h3>Airport Shuttle</h3>
            <p>Dedicated airport transfer services for business travelers with flight monitoring and meet-and-greet service.</p>
        </div>
        
        <div class="service-card">
            <i class="fas fa-bus"></i>
            <h3>Group Transportation</h3>
            <p>Large group transportation for company outings, team building events, and corporate retreats.</p>
        </div>
        
        <div class="service-card">
            <i class="fas fa-clock"></i>
            <h3>24/7 Availability</h3>
            <p>Round-the-clock service for urgent business travel needs and emergency transportation requirements.</p>
        </div>
        
        <div class="service-card">
            <i class="fas fa-chart-line"></i>
            <h3>Cost Management</h3>
            <p>Transparent pricing and detailed reporting for expense tracking and budget management.</p>
        </div>
    </div>
    
    <!-- Corporate Contact Form -->
    <div class="corporate-form">
        <h3>Request Corporate Quote</h3>
        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
            <input type="hidden" name="action" value="corporate_quote_request">
            <?php wp_nonce_field('corporate_quote_nonce', 'corporate_nonce'); ?>
            
            <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" name="company_name" id="company_name" required>
            </div>
            
            <div class="form-group">
                <label for="contact_name">Contact Person</label>
                <input type="text" name="contact_name" id="contact_name" required>
            </div>
            
            <div class="form-group">
                <label for="contact_email">Email Address</label>
                <input type="email" name="contact_email" id="contact_email" required>
            </div>
            
            <div class="form-group">
                <label for="contact_phone">Phone Number</label>
                <input type="tel" name="contact_phone" id="contact_phone" required>
            </div>
            
            <div class="form-group">
                <label for="service_type">Service Type</label>
                <select name="service_type" id="service_type" required>
                    <option value="">Select Service</option>
                    <option value="corporate_events">Corporate Events</option>
                    <option value="employee_transport">Employee Transportation</option>
                    <option value="airport_shuttle">Airport Shuttle</option>
                    <option value="group_transport">Group Transportation</option>
                    <option value="custom">Custom Solution</option>
                </select>
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
                <label for="service_frequency">Service Frequency</label>
                <select name="service_frequency" id="service_frequency" required>
                    <option value="">Select Frequency</option>
                    <option value="one_time">One-time Event</option>
                    <option value="daily">Daily Service</option>
                    <option value="weekly">Weekly Service</option>
                    <option value="monthly">Monthly Service</option>
                    <option value="custom">Custom Schedule</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="service_description">Service Description</label>
                <textarea name="service_description" id="service_description" rows="4" placeholder="Please describe your transportation needs, routes, and any special requirements" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="budget_range">Budget Range</label>
                <select name="budget_range" id="budget_range">
                    <option value="">Select Budget Range</option>
                    <option value="under_1000">Under $1,000</option>
                    <option value="1000_5000">$1,000 - $5,000</option>
                    <option value="5000_10000">$5,000 - $10,000</option>
                    <option value="10000_25000">$10,000 - $25,000</option>
                    <option value="25000+">$25,000+</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="additional_notes">Additional Notes</label>
                <textarea name="additional_notes" id="additional_notes" rows="3" placeholder="Any additional information or special requirements"></textarea>
            </div>
            
            <button type="submit">Request Quote</button>
        </form>
    </div>
</section>

<?php get_footer(); ?>
