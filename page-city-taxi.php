<?php
/*
 * Template Name: City Taxi Service
 */

get_header(); ?>

<style>
.service-hero {
    background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?php echo get_template_directory_uri(); ?>/images/hero-bg.jpg');
    background-size: cover;
    background-position: center;
    padding: 100px 0 60px;
    color: #fff;
    text-align: center;
}
.service-details {
    padding: 60px 0;
}
.service-content {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 40px;
    margin-bottom: 40px;
}
.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 25px;
    margin: 30px 0;
}
.feature-item {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}
.feature-item i {
    font-size: 2rem;
    color: var(--primary-color, #FF5252);
    margin-bottom: 10px;
}
.contact-info-card {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 10px;
    margin-bottom: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}
.contact-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 20px;
}
.contact-item i {
    font-size: 1.2rem;
    color: var(--primary-color, #FF5252);
    margin-right: 15px;
    margin-top: 5px;
}
.contact-item h4 {
    margin: 0 0 5px 0;
    font-size: 1rem;
}
.contact-item p {
    margin: 0;
    font-size: 0.9rem;
}
.pricing-card {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}
.pricing-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    padding: 10px 0;
    border-bottom: 1px solid #e9ecef;
}
.pricing-item:last-child {
    border-bottom: none;
}
.rate {
    font-size: 1.5rem;
    font-weight: bold;
    color: var(--primary-color, #FF5252);
}
.unit {
    color: #6c757d;
    font-size: 0.9rem;
}
.pricing-note {
    font-size: 0.8rem;
    color: #6c757d;
    font-style: italic;
    margin-top: 15px;
    text-align: center;
}
.service-faq {
    padding: 60px 0;
    background: #f8f9fa;
}
.faq-list {
    max-width: 800px;
    margin: 0 auto;
}
.faq-item {
    background: #fff;
    margin-bottom: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    overflow: hidden;
}
.faq-question {
    padding: 20px;
    background: #fff;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #e9ecef;
}
.faq-question h3 {
    margin: 0;
    font-size: 1.1rem;
}
.faq-answer {
    padding: 20px;
    background: #f8f9fa;
    display: none;
}
.faq-answer.active {
    display: block;
}
.related-services {
    padding: 60px 0;
}
.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 40px;
}
.service-card {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    transition: transform 0.2s;
}
.service-card:hover {
    transform: translateY(-5px);
}
.service-icon {
    font-size: 3rem;
    color: var(--primary-color, #FF5252);
    margin-bottom: 20px;
}
.btn-text {
    color: var(--primary-color, #FF5252);
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: color 0.2s;
}
.btn-text:hover {
    color: #d32f2f;
}
.areas-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 30px;
}
.area-category {
    background: #fff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}
.area-category h4 {
    color: var(--primary-color, #FF5252);
    margin-bottom: 15px;
    font-size: 1.1rem;
}
.area-category ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.area-category li {
    padding: 8px 0;
    border-bottom: 1px solid #f0f0f0;
}
.area-category li:last-child {
    border-bottom: none;
}
@media (max-width: 900px) {
    .service-content {
        grid-template-columns: 1fr;
    }
}
</style>

<?php include(get_template_directory() . '/services/city-taxi.php'); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // FAQ functionality
    const faqQuestions = document.querySelectorAll('.faq-question');
    
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const isActive = answer.classList.contains('active');
            
            // Close all other answers
            document.querySelectorAll('.faq-answer').forEach(ans => {
                ans.classList.remove('active');
            });
            
            // Toggle current answer
            if (!isActive) {
                answer.classList.add('active');
            }
        });
    });
});
</script>

<?php get_footer(); ?>
