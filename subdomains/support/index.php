<?php
/**
 * Template Name: Support Page
 * 
 * This is a custom template for the Support subdomain page
 */

get_header(); ?>

<style>
/* Subdomain-specific styles */
.support-hero {
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo get_template_directory_uri(); ?>/images/hero-bg.jpg');
    background-size: cover;
    background-position: center;
    padding: 100px 0 50px;
    color: #fff;
    text-align: center;
}

.support-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 50px 20px;
}

.support-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-bottom: 50px;
}

.support-card {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
    padding: 30px;
}

.support-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
}

.support-card i {
    font-size: 3rem;
    color: #ff6b6b;
    margin-bottom: 20px;
}

.support-card h3 {
    margin-bottom: 15px;
    font-size: 1.5rem;
}

.support-card p {
    color: #666;
    margin-bottom: 20px;
    line-height: 1.6;
}

.faq-section {
    margin-bottom: 50px;
}

.faq-container {
    max-width: 800px;
    margin: 0 auto;
}

.faq-item {
    background: #fff;
    border-radius: 10px;
    margin-bottom: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.faq-question {
    padding: 20px;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-weight: 600;
    color: #333;
}

.faq-question i {
    color: #ff6b6b;
    transition: transform 0.3s ease;
}

.faq-answer {
    padding: 0 20px;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease, padding 0.3s ease;
}

.faq-answer.active {
    padding: 20px;
    max-height: 200px;
}

.contact-form {
    background: #fff;
    border-radius: 10px;
    padding: 40px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: 0 auto;
}

.contact-form h3 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 1.8rem;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 500;
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

.contact-form button {
    width: 100%;
    padding: 15px;
    background: #ff6b6b;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s ease;
}

.contact-form button:hover {
    background: #ff5252;
}

@media (max-width: 768px) {
    .support-grid {
        grid-template-columns: 1fr;
    }
    
    .contact-form {
        padding: 20px;
    }
}
</style>

<!-- Hero Section -->
<section class="support-hero">
    <div class="container">
        <h1>Customer Support</h1>
        <p>We're here to help you with any questions or concerns</p>
    </div>
</section>

<!-- Support Options -->
<section class="support-container">
    <div class="support-grid">
        <div class="support-card">
            <i class="fas fa-phone"></i>
            <h3>Phone Support</h3>
            <p>Call us directly for immediate assistance with your bookings and travel arrangements.</p>
            <p><strong>24/7 Hotline:</strong><br>+1 (555) 123-4567</p>
        </div>
        
        <div class="support-card">
            <i class="fas fa-envelope"></i>
            <h3>Email Support</h3>
            <p>Send us a detailed message and we'll get back to you within 24 hours.</p>
            <p><strong>Email:</strong><br>support@travelease.com</p>
        </div>
        
        <div class="support-card">
            <i class="fas fa-comments"></i>
            <h3>Live Chat</h3>
            <p>Chat with our support team in real-time for quick answers to your questions.</p>
            <p><strong>Available:</strong><br>9 AM - 9 PM (EST)</p>
        </div>
        
        <div class="support-card">
            <i class="fas fa-question-circle"></i>
            <h3>FAQ</h3>
            <p>Find quick answers to common questions in our comprehensive FAQ section.</p>
            <p><strong>Browse:</strong><br>Frequently Asked Questions</p>
        </div>
        
        <div class="support-card">
            <i class="fas fa-ticket-alt"></i>
            <h3>Booking Support</h3>
            <p>Need help with your existing booking? We can assist with modifications and cancellations.</p>
            <p><strong>Booking ID:</strong><br>Required for assistance</p>
        </div>
        
        <div class="support-card">
            <i class="fas fa-headset"></i>
            <h3>Technical Support</h3>
            <p>Having issues with our website or mobile app? Our tech team is here to help.</p>
            <p><strong>Platform:</strong><br>Web, iOS, Android</p>
        </div>
    </div>
    
    <!-- FAQ Section -->
    <div class="faq-section">
        <h2 style="text-align: center; margin-bottom: 40px;">Frequently Asked Questions</h2>
        <div class="faq-container">
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    How do I modify my booking?
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>You can modify your booking by logging into your account and accessing the "My Bookings" section. Alternatively, you can contact our support team with your booking ID for assistance.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    What is your cancellation policy?
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Our cancellation policy varies by service type. Most bookings can be cancelled up to 24 hours before the scheduled time for a full refund. Please check your specific booking details for exact terms.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    How do I get a refund?
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Refunds are processed automatically for eligible cancellations. The amount will be credited back to your original payment method within 5-7 business days.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    What payment methods do you accept?
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>We accept all major credit cards (Visa, MasterCard, American Express), PayPal, and bank transfers. All payments are processed securely through our encrypted payment gateway.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    How far in advance should I book?
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>We recommend booking at least 24 hours in advance for guaranteed availability. For peak seasons and special events, booking 1-2 weeks ahead is advisable.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    What if my driver doesn't show up?
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>If your driver doesn't arrive within 15 minutes of the scheduled time, please contact our 24/7 support line immediately. We'll arrange an alternative vehicle or provide a full refund.</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Contact Form -->
    <div class="contact-form">
        <h3>Still Need Help?</h3>
        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
            <input type="hidden" name="action" value="submit_support_request">
            <?php wp_nonce_field('support_request_nonce', 'support_nonce'); ?>
            
            <div class="form-group">
                <label for="support_type">Support Type</label>
                <select name="support_type" id="support_type" required>
                    <option value="">Select Support Type</option>
                    <option value="booking">Booking Issue</option>
                    <option value="payment">Payment Problem</option>
                    <option value="technical">Technical Issue</option>
                    <option value="refund">Refund Request</option>
                    <option value="general">General Inquiry</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="booking_id">Booking ID (if applicable)</label>
                <input type="text" name="booking_id" id="booking_id" placeholder="Enter your booking ID">
            </div>
            
            <div class="form-group">
                <label for="contact_name">Your Name</label>
                <input type="text" name="contact_name" id="contact_name" required>
            </div>
            
            <div class="form-group">
                <label for="contact_email">Email Address</label>
                <input type="email" name="contact_email" id="contact_email" required>
            </div>
            
            <div class="form-group">
                <label for="contact_phone">Phone Number</label>
                <input type="tel" name="contact_phone" id="contact_phone">
            </div>
            
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" required>
            </div>
            
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" rows="5" placeholder="Please describe your issue in detail..." required></textarea>
            </div>
            
            <button type="submit">Send Message</button>
        </form>
    </div>
</section>

<script>
function toggleFAQ(element) {
    const answer = element.nextElementSibling;
    const icon = element.querySelector('i');
    
    if (answer.classList.contains('active')) {
        answer.classList.remove('active');
        icon.style.transform = 'rotate(0deg)';
    } else {
        // Close all other FAQ items
        document.querySelectorAll('.faq-answer').forEach(item => {
            item.classList.remove('active');
        });
        document.querySelectorAll('.faq-question i').forEach(item => {
            item.style.transform = 'rotate(0deg)';
        });
        
        // Open current FAQ item
        answer.classList.add('active');
        icon.style.transform = 'rotate(180deg)';
    }
}
</script>

<?php get_footer(); ?>
