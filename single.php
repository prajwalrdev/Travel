<?php get_header(); ?>

<div class="single-post-content">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <div class="entry-meta">
                        <span class="posted-on">
                            <i class="fas fa-calendar"></i>
                            <?php echo get_the_date(); ?>
                        </span>
                        <span class="byline">
                            <i class="fas fa-user"></i>
                            <?php the_author(); ?>
                        </span>
                        <?php if (has_category()) : ?>
                            <span class="cat-links">
                                <i class="fas fa-folder"></i>
                                <?php the_category(', '); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <footer class="entry-footer">
                    <?php if (has_tag()) : ?>
                        <div class="tags-links">
                            <i class="fas fa-tags"></i>
                            <?php the_tags('', ', '); ?>
                        </div>
                    <?php endif; ?>
                </footer>
            </article>

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>

        <?php endwhile; endif; ?>
    </div>
</div>

<?php get_footer(); ?>
