<?php
/**
 * Template Name: Support Page
 * 
 * This is a custom template for the Support page
 */

get_header(); ?>

<style>
.support-hero {
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo get_template_directory_uri(); ?>/images/support-bg.jpg');
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
    grid-template-columns: 2fr 1fr;
    gap: 40px;
    margin-bottom: 50px;
}

.faq-section {
    background: #fff;
    border-radius: 10px;
    padding: 40px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.faq-section h2 {
    margin-bottom: 30px;
    color: #333;
    font-size: 2rem;
}

.faq-item {
    margin-bottom: 20px;
    border-bottom: 1px solid #eee;
    padding-bottom: 20px;
}

.faq-item:last-child {
    border-bottom: none;
}

.faq-question {
    font-weight: 600;
    color: #333;
    margin-bottom: 10px;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: color 0.3s ease;
}

.faq-question:hover {
    color: var(--primary-color);
}

.faq-question::after {
    content: '+';
    font-size: 1.5rem;
    color: var(--primary-color);
    transition: transform 0.3s ease;
}

.faq-question.active::after {
    transform: rotate(45deg);
}

.faq-answer {
    color: #666;
    line-height: 1.6;
    display: none;
    padding-top: 10px;
}

.faq-answer.active {
    display: block;
}

.support-sidebar {
    background: #fff;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    height: fit-content;
    position: sticky;
    top: 100px;
}

.support-sidebar h3 {
    margin-bottom: 20px;
    color: #333;
    font-size: 1.3rem;
}

.contact-methods {
    list-style: none;
    margin-bottom: 30px;
}

.contact-methods li {
    margin-bottom: 15px;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 5px;
    border-left: 4px solid var(--primary-color);
}

.contact-methods li strong {
    display: block;
    color: #333;
    margin-bottom: 5px;
}

.contact-methods li span {
    color: #666;
    font-size: 14px;
}

.support-form {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 5px;
}

.support-form input,
.support-form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 3px;
    margin-bottom: 10px;
    font-size: 14px;
}

.support-form textarea {
    height: 100px;
    resize: vertical;
}

.support-form button {
    width: 100%;
    padding: 12px;
    background: var(--primary-color);
    color: #fff;
    border: none;
    border-radius: 3px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s ease;
}

.support-form button:hover {
    background: var(--primary-dark);
}

.support-categories {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-bottom: 50px;
}

.support-category {
    background: #fff;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease;
}

.support-category:hover {
    transform: translateY(-5px);
}

.support-category-icon {
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

.support-category h3 {
    font-size: 1.3rem;
    margin-bottom: 15px;
    color: #333;
}

.support-category p {
    color: #666;
    line-height: 1.6;
    margin-bottom: 20px;
}

.support-category .btn {
    display: inline-block;
    padding: 10px 20px;
    background: var(--primary-color);
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background 0.3s ease;
}

.support-category .btn:hover {
    background: var(--primary-dark);
}

.emergency-contact {
    background: var(--primary-color);
    color: #fff;
    padding: 40px;
    border-radius: 10px;
    text-align: center;
    margin-bottom: 50px;
}

.emergency-contact h2 {
    margin-bottom: 20px;
}

.emergency-contact .phone {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 15px;
}

.emergency-contact p {
    font-size: 1.1rem;
    margin-bottom: 20px;
}

@media (max-width: 768px) {
    .support-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .support-sidebar {
        position: static;
    }
    
    .support-categories {
        grid-template-columns: 1fr;
    }
}
</style>

<!-- Hero Section -->
<section class="support-hero">
    <div class="container">
        <h1>Customer Support</h1>
        <p>We're here to help you with any questions or concerns about our services</p>
    </div>
</section>

<!-- Support Categories -->
<section class="support-container">
    <div class="support-categories">
        <div class="support-category">
            <div class="support-category-icon">
                <i class="fas fa-question-circle"></i>
            </div>
            <h3>General Questions</h3>
            <p>Find answers to common questions about our services, pricing, and policies.</p>
            <a href="#faq" class="btn">View FAQ</a>
        </div>
        
        <div class="support-category">
            <div class="support-category-icon">
                <i class="fas fa-calendar-check"></i>
            </div>
            <h3>Booking Support</h3>
            <p>Get help with making reservations, modifying bookings, or canceling services.</p>
            <a href="#contact" class="btn">Contact Us</a>
        </div>
        
        <div class="support-category">
            <div class="support-category-icon">
                <i class="fas fa-phone"></i>
            </div>
            <h3>Phone Support</h3>
            <p>Speak directly with our customer service representatives for immediate assistance.</p>
            <a href="tel:+15551234567" class="btn">Call Now</a>
        </div>
        
        <div class="support-category">
            <div class="support-category-icon">
                <i class="fas fa-envelope"></i>
            </div>
            <h3>Email Support</h3>
            <p>Send us a detailed message and we'll respond within 24 hours.</p>
            <a href="mailto:support@travelease.com" class="btn">Send Email</a>
        </div>
        
        <div class="support-category">
            <div class="support-category-icon">
                <i class="fas fa-comments"></i>
            </div>
            <h3>Live Chat</h3>
            <p>Chat with our support team in real-time for quick answers and assistance.</p>
            <a href="#chat" class="btn">Start Chat</a>
        </div>
        
        <div class="support-category">
            <div class="support-category-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <h3>Documentation</h3>
            <p>Access our comprehensive guides, policies, and service information.</p>
            <a href="#docs" class="btn">View Docs</a>
        </div>
    </div>
</section>

<!-- FAQ and Contact Section -->
<section class="support-container">
    <div class="support-grid">
        <div class="faq-section" id="faq">
            <h2>Frequently Asked Questions</h2>
            
            <div class="faq-item">
                <div class="faq-question">How do I book a service?</div>
                <div class="faq-answer">
                    You can book our services through our website, by calling our customer service line, or by sending us an email. Our online booking system is available 24/7 and provides instant confirmation.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">What is your cancellation policy?</div>
                <div class="faq-answer">
                    We offer free cancellation up to 24 hours before your scheduled service. Cancellations made within 24 hours may incur a fee. Please contact us as soon as possible if you need to cancel or modify your booking.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">Do you provide airport pickup services?</div>
                <div class="faq-answer">
                    Yes, we offer reliable airport pickup and drop-off services. Our drivers track your flight and will be waiting for you even if your flight is delayed. We provide meet-and-greet services at the airport.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">What types of vehicles do you have?</div>
                <div class="faq-answer">
                    Our fleet includes sedans, SUVs, luxury vehicles, minivans, and buses to accommodate different group sizes and preferences. All vehicles are well-maintained and regularly inspected for safety.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">How far in advance should I book?</div>
                <div class="faq-answer">
                    We recommend booking at least 24 hours in advance for standard services. For airport transfers, corporate events, or group transportation, we suggest booking 48-72 hours in advance to ensure availability.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">What payment methods do you accept?</div>
                <div class="faq-answer">
                    We accept all major credit cards, debit cards, and cash payments. For corporate clients, we offer monthly invoicing and credit terms. Online payments are processed securely through our booking system.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">Are your drivers licensed and insured?</div>
                <div class="faq-answer">
                    Yes, all our drivers are licensed, background-checked, and fully insured. They undergo regular training and are experienced in providing professional transportation services.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">Do you offer corporate travel services?</div>
                <div class="faq-answer">
                    Yes, we specialize in corporate travel services including executive transportation, event transportation, and long-term contracts. We provide detailed reporting and dedicated account management for corporate clients.
                </div>
            </div>
        </div>
        
        <aside class="support-sidebar">
            <h3>Contact Information</h3>
            <ul class="contact-methods">
                <li>
                    <strong>Customer Service</strong>
                    <span>+1 (555) 123-4567</span>
                </li>
                <li>
                    <strong>Booking Support</strong>
                    <span>+1 (555) 123-4568</span>
                </li>
                <li>
                    <strong>Corporate Sales</strong>
                    <span>+1 (555) 123-4569</span>
                </li>
                <li>
                    <strong>Email Support</strong>
                    <span>support@travelease.com</span>
                </li>
                <li>
                    <strong>Business Hours</strong>
                    <span>24/7 Available</span>
                </li>
            </ul>
            
            <h3>Send us a Message</h3>
            <form class="support-form">
                <input type="text" placeholder="Your Name" required>
                <input type="email" placeholder="Your Email" required>
                <input type="text" placeholder="Subject" required>
                <textarea placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </aside>
    </div>
</section>

<!-- Emergency Contact -->
<section class="support-container">
    <div class="emergency-contact">
        <h2>Emergency Support</h2>
        <div class="phone">+1 (555) 123-4567</div>
        <p>Available 24/7 for urgent travel assistance and emergency situations</p>
        <p>For immediate assistance with active bookings or urgent travel needs</p>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const faqQuestions = document.querySelectorAll('.faq-question');
    
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const isActive = this.classList.contains('active');
            
            // Close all other FAQ items
            faqQuestions.forEach(q => {
                q.classList.remove('active');
                q.nextElementSibling.classList.remove('active');
            });
            
            // Toggle current FAQ item
            if (!isActive) {
                this.classList.add('active');
                answer.classList.add('active');
            }
        });
    });
});
</script>

<?php get_footer(); ?>
