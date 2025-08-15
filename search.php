<?php get_header(); ?>

<div class="search-results">
    <div class="container">
        <header class="search-header">
            <h1 class="search-title">
                <?php printf('Search Results for: %s', '<span>' . get_search_query() . '</span>'); ?>
            </h1>
        </header>

        <?php if (have_posts()) : ?>
            <div class="search-results-count">
                <?php printf('Found %d results', $wp_query->found_posts); ?>
            </div>

            <div class="posts-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="post-content">
                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <div class="entry-meta">
                                    <span class="posted-on">
                                        <i class="fas fa-calendar"></i>
                                        <?php echo get_the_date(); ?>
                                    </span>
                                    <span class="byline">
                                        <i class="fas fa-user"></i>
                                        <?php the_author(); ?>
                                    </span>
                                </div>
                            </header>

                            <div class="entry-summary">
                                <?php the_excerpt(); ?>
                            </div>

                            <footer class="entry-footer">
                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    Read More <i class="fas fa-arrow-right"></i>
                                </a>
                            </footer>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php
            // Pagination
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
            ));
            ?>

        <?php else : ?>
            <div class="no-results">
                <h2>No results found</h2>
                <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
                
                <div class="search-again">
                    <h3>Search again:</h3>
                    <?php get_search_form(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
