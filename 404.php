<?php get_header(); ?>

<div class="error-404">
    <div class="container">
        <div class="error-content">
            <div class="error-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h1>404</h1>
            <h2>Page Not Found</h2>
            <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
            
            <div class="error-actions">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                    <i class="fas fa-home"></i> Go to Homepage
                </a>
                <a href="#contact" class="btn btn-secondary">
                    <i class="fas fa-envelope"></i> Contact Us
                </a>
            </div>
            
            <div class="search-section">
                <h3>Search for something else:</h3>
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
