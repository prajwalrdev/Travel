<!-- Footer Section -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <h2><?php bloginfo('name'); ?></h2>
                    <p><?php bloginfo('description'); ?></p>
                    <p>Ground Floor, GHS Opposite Tara clinic, Hampankatta Mangalore 575001</p>
                    <p><a href="tel:+918861505754">+91 8861505754</a></p>
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
                    <h3>Cab Services</h3>
                    <ul>
                        <li><a href="<?php echo esc_url(home_url('/city-taxi/')); ?>">City Taxi</a></li>
                        <li><a href="<?php echo esc_url(home_url('/outstation-taxi/')); ?>">Outstation Taxi</a></li>
                        <li><a href="<?php echo esc_url(home_url('/wedding-cars/')); ?>">Wedding Cars</a></li>
                        <li><a href="<?php echo esc_url(home_url('/airport-taxi/')); ?>">Airport Taxi</a></li>
                        <li><a href="<?php echo esc_url(home_url('/mini-bus/')); ?>">Mini Bus</a></li>
                        <li><a href="<?php echo esc_url(home_url('/tempo-traveler/')); ?>">Tempo Traveler</a></li>
                        <li><a href="<?php echo esc_url(home_url('/innova-cabs/')); ?>">Innova Cabs</a></li>
                        <li><a href="<?php echo esc_url(home_url('/ertiga-cabs/')); ?>">Ertiga Cabs</a></li>
                        <li><a href="<?php echo esc_url(home_url('/sedan-cabs/')); ?>">Sedan Cabs</a></li>
                        <li><a href="<?php echo esc_url(home_url('/bekal-taxi/')); ?>">Bekal Taxi</a></li>
                        <li><a href="<?php echo esc_url(home_url('/temple-tour/')); ?>">Temple Tour Packages</a></li>
                        <li><a href="<?php echo esc_url(home_url('/coorg-taxi/')); ?>">Coorg Taxi</a></li>
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
        <a href="https://wa.me/918861505754" class="whatsapp-icon" target="_blank" aria-label="Chat with us on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>

        <!-- Back to Top Button -->
        <a href="#home" class="back-to-top">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>

    <?php wp_footer(); ?>
</body>
</html>
