<?php
/**
 * Template Name: Blog Page
 * 
 * This is a custom template for the Blog page
 */

get_header(); ?>

<style>
.blog-hero {
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo get_template_directory_uri(); ?>/images/blog-bg.jpg');
    background-size: cover;
    background-position: center;
    padding: 100px 0 50px;
    color: #fff;
    text-align: center;
}

.blog-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 50px 20px;
}

.blog-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 40px;
    margin-bottom: 50px;
}

.blog-posts {
    display: grid;
    gap: 30px;
}

.blog-post {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.blog-post:hover {
    transform: translateY(-5px);
}

.blog-post img {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

.blog-post-content {
    padding: 25px;
}

.blog-post h3 {
    font-size: 1.5rem;
    margin-bottom: 10px;
    color: #333;
}

.blog-post-meta {
    color: #666;
    font-size: 14px;
    margin-bottom: 15px;
}

.blog-post-meta span {
    margin-right: 15px;
}

.blog-post p {
    color: #666;
    line-height: 1.6;
    margin-bottom: 15px;
}

.read-more {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.read-more:hover {
    color: var(--primary-dark);
}

.blog-sidebar {
    background: #fff;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    height: fit-content;
    position: sticky;
    top: 100px;
}

.blog-sidebar h3 {
    margin-bottom: 20px;
    color: #333;
    font-size: 1.3rem;
}

.categories-list {
    list-style: none;
    margin-bottom: 30px;
}

.categories-list li {
    margin-bottom: 10px;
}

.categories-list a {
    color: #666;
    text-decoration: none;
    transition: color 0.3s ease;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.categories-list a:hover {
    color: var(--primary-color);
}

.categories-list .count {
    background: #f0f0f0;
    padding: 2px 8px;
    border-radius: 10px;
    font-size: 12px;
}

.recent-posts {
    list-style: none;
}

.recent-posts li {
    margin-bottom: 15px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
}

.recent-posts li:last-child {
    border-bottom: none;
}

.recent-posts a {
    color: #333;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.recent-posts a:hover {
    color: var(--primary-color);
}

.recent-posts .date {
    color: #666;
    font-size: 12px;
    margin-top: 5px;
}

.blog-search {
    margin-bottom: 30px;
}

.blog-search input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

.blog-search button {
    width: 100%;
    padding: 12px;
    background: var(--primary-color);
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.3s ease;
    margin-top: 10px;
}

.blog-search button:hover {
    background: var(--primary-dark);
}

.pagination {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 40px;
}

.pagination a,
.pagination span {
    padding: 10px 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-decoration: none;
    color: #666;
    transition: all 0.3s ease;
}

.pagination a:hover,
.pagination .current {
    background: var(--primary-color);
    color: #fff;
    border-color: var(--primary-color);
}

@media (max-width: 768px) {
    .blog-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .blog-sidebar {
        position: static;
    }
}
</style>

<!-- Hero Section -->
<section class="blog-hero">
    <div class="container">
        <h1>Travel Blog</h1>
        <p>Discover travel tips, destination guides, and transportation insights</p>
    </div>
</section>

<!-- Blog Content -->
<section class="blog-container">
    <div class="blog-grid">
        <div class="blog-posts">
            <?php
            // Query for blog posts
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 6,
                'paged' => $paged
            );
            $blog_query = new WP_Query($args);
            
            if ($blog_query->have_posts()) :
                while ($blog_query->have_posts()) : $blog_query->the_post();
            ?>
                <article class="blog-post">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    
                    <div class="blog-post-content">
                        <h3><a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;"><?php the_title(); ?></a></h3>
                        
                        <div class="blog-post-meta">
                            <span><i class="fas fa-calendar"></i> <?php echo get_the_date(); ?></span>
                            <span><i class="fas fa-user"></i> <?php the_author(); ?></span>
                            <span><i class="fas fa-folder"></i> <?php the_category(', '); ?></span>
                        </div>
                        
                        <p><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                        
                        <a href="<?php the_permalink(); ?>" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
            <?php
                endwhile;
            else :
            ?>
                <!-- Sample blog posts when no WordPress posts exist -->
                <article class="blog-post">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/blog-post-1.jpg" alt="Travel Tips">
                    <div class="blog-post-content">
                        <h3>Essential Travel Tips for First-Time Travelers</h3>
                        <div class="blog-post-meta">
                            <span><i class="fas fa-calendar"></i> January 15, 2024</span>
                            <span><i class="fas fa-user"></i> Travel Expert</span>
                            <span><i class="fas fa-folder"></i> Travel Tips</span>
                        </div>
                        <p>Planning your first trip can be overwhelming. Here are essential tips to make your journey smooth and enjoyable, from packing efficiently to navigating airports.</p>
                        <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                
                <article class="blog-post">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/blog-post-2.jpg" alt="Airport Transportation">
                    <div class="blog-post-content">
                        <h3>Best Airport Transportation Options</h3>
                        <div class="blog-post-meta">
                            <span><i class="fas fa-calendar"></i> January 10, 2024</span>
                            <span><i class="fas fa-user"></i> Transport Guide</span>
                            <span><i class="fas fa-folder"></i> Transportation</span>
                        </div>
                        <p>Compare different airport transportation options including taxis, shuttles, and private transfers to find the best choice for your needs and budget.</p>
                        <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                
                <article class="blog-post">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/blog-post-3.jpg" alt="City Tours">
                    <div class="blog-post-content">
                        <h3>Must-Visit Attractions in Popular Cities</h3>
                        <div class="blog-post-meta">
                            <span><i class="fas fa-calendar"></i> January 5, 2024</span>
                            <span><i class="fas fa-user"></i> City Explorer</span>
                            <span><i class="fas fa-folder"></i> Destinations</span>
                        </div>
                        <p>Discover the top attractions and hidden gems in popular travel destinations around the world, from historical landmarks to modern attractions.</p>
                        <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
            <?php endif; ?>
            
            <!-- Pagination -->
            <div class="pagination">
                <?php
                if ($blog_query->have_posts()) {
                    echo paginate_links(array(
                        'total' => $blog_query->max_num_pages,
                        'current' => $paged,
                        'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                        'next_text' => 'Next <i class="fas fa-chevron-right"></i>'
                    ));
                }
                ?>
            </div>
        </div>
        
        <aside class="blog-sidebar">
            <!-- Search -->
            <div class="blog-search">
                <h3>Search Blog</h3>
                <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
                    <input type="text" name="s" placeholder="Search articles..." value="<?php echo get_search_query(); ?>">
                    <input type="hidden" name="post_type" value="post">
                    <button type="submit">Search</button>
                </form>
            </div>
            
            <!-- Categories -->
            <div class="blog-categories">
                <h3>Categories</h3>
                <ul class="categories-list">
                    <?php
                    $categories = get_categories(array(
                        'orderby' => 'count',
                        'order' => 'DESC',
                        'number' => 10
                    ));
                    
                    if ($categories) :
                        foreach ($categories as $category) :
                    ?>
                        <li>
                            <a href="<?php echo get_category_link($category->term_id); ?>">
                                <?php echo $category->name; ?>
                                <span class="count"><?php echo $category->count; ?></span>
                            </a>
                        </li>
                    <?php
                        endforeach;
                    else :
                    ?>
                        <li><a href="#">Travel Tips <span class="count">15</span></a></li>
                        <li><a href="#">Transportation <span class="count">12</span></a></li>
                        <li><a href="#">Destinations <span class="count">8</span></a></li>
                        <li><a href="#">Travel Guides <span class="count">6</span></a></li>
                        <li><a href="#">Corporate Travel <span class="count">4</span></a></li>
                    <?php endif; ?>
                </ul>
            </div>
            
            <!-- Recent Posts -->
            <div class="recent-posts-widget">
                <h3>Recent Posts</h3>
                <ul class="recent-posts">
                    <?php
                    $recent_posts = wp_get_recent_posts(array(
                        'numberposts' => 5,
                        'post_status' => 'publish'
                    ));
                    
                    if ($recent_posts) :
                        foreach ($recent_posts as $post) :
                    ?>
                        <li>
                            <a href="<?php echo get_permalink($post['ID']); ?>"><?php echo $post['post_title']; ?></a>
                            <div class="date"><?php echo get_the_date('', $post['ID']); ?></div>
                        </li>
                    <?php
                        endforeach;
                    else :
                    ?>
                        <li>
                            <a href="#">Essential Travel Tips for First-Time Travelers</a>
                            <div class="date">January 15, 2024</div>
                        </li>
                        <li>
                            <a href="#">Best Airport Transportation Options</a>
                            <div class="date">January 10, 2024</div>
                        </li>
                        <li>
                            <a href="#">Must-Visit Attractions in Popular Cities</a>
                            <div class="date">January 5, 2024</div>
                        </li>
                        <li>
                            <a href="#">How to Choose the Right Travel Service</a>
                            <div class="date">December 28, 2023</div>
                        </li>
                        <li>
                            <a href="#">Corporate Travel Management Tips</a>
                            <div class="date">December 20, 2023</div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </aside>
    </div>
</section>

<?php 
wp_reset_postdata();
get_footer(); 
?>
