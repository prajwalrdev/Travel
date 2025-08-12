<?php get_header(); ?>

<div class="archive-content">
    <div class="container">
        <header class="archive-header">
            <?php
            the_archive_title('<h1 class="archive-title">', '</h1>');
            the_archive_description('<div class="archive-description">', '</div>');
            ?>
        </header>

        <?php if (have_posts()) : ?>
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
            <div class="no-posts">
                <h2>No posts found</h2>
                <p>Sorry, no posts matched your criteria.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
