    <!-- Footer Section -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <h2><?php bloginfo('name'); ?></h2>
                    <p><?php bloginfo('description'); ?></p>
                </div>
                <div class="footer-links">
                    <h3>Quick Links</h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu',
                        'menu_class' => '',
                        'container' => false,
                        'fallback_cb' => 'travelease_footer_fallback_menu'
                    ));
                    ?>
                </div>
                <div class="footer-services">
                    <h3>Our Services</h3>
                    <ul>
                        <li><a href="<?php echo get_template_directory_uri(); ?>/services/city-taxi.html">City Taxi</a></li>
                        <li><a href="<?php echo get_template_directory_uri(); ?>/services/outstation-taxi.html">Outstation Taxi</a></li>
                        <li><a href="<?php echo get_template_directory_uri(); ?>/services/luxury-cabs.html">Luxury Cabs</a></li>
                        <li><a href="<?php echo get_template_directory_uri(); ?>/services/wedding-cars.html">Wedding Cars</a></li>
                        <li><a href="<?php echo get_template_directory_uri(); ?>/services/corporate-travel.html">Corporate Travel</a></li>
                        <li><a href="<?php echo get_template_directory_uri(); ?>/services/airport-taxi.html">Airport Transfer</a></li>
                        <li><a href="<?php echo get_template_directory_uri(); ?>/services/railway-station-taxi.html">Railway Station Taxi</a></li>
                    </ul>
                </div>
                <div class="footer-newsletter">
                    <h3>Newsletter</h3>
                    <p>Subscribe to our newsletter for updates and special offers.</p>
                    <form id="newsletterForm">
                        <input type="email" name="email" placeholder="Your Email Address" required>
                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        <div id="newsletterFormStatus" class="form-status"></div>
                    </form>
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.</p>
                <div class="footer-bottom-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms & Conditions</a>
                    <a href="#">FAQ</a>
                </div>
            </div>
        </div>
    </footer>
    
    <div class="floating-buttons">
        <!-- WhatsApp Icon -->
        <a href="https://wa.me/7353607477" class="whatsapp-icon" target="_blank" aria-label="Chat with us on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>

        <!-- Back to Top Button -->
        <a href="#home" class="back-to-top">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>

    <!-- JavaScript Files -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
    <?php wp_footer(); ?>
</body>
</html>
