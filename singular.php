<?php
/**
 * Singular Template
 *
 * This is the default singular template.  It is used when a more specific template can't be found to display
 * singular views of posts (any post type).
 *
 */
    get_header(); ?>
        <div class="container">

            <div class="row">
            
                <div class="content col-lg-8">

                    <?php if ( have_posts() ) : ?>

                        <?php while ( have_posts() ) : the_post(); ?>

                            <div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

                                <?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>

                                <?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( 'By [entry-author] on [entry-published]', 'shwib' ) . '</div>' ); ?>

                                <div class="entry-content">

                                    <?php the_content(); ?>
                                    <?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'shwib' ), 'after' => '</p>' ) ); ?>

                                </div><!-- .entry-content -->

                                <?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms taxonomy="category" before="Posted in "] [entry-terms taxonomy="post_tag" before="| Tagged "]', 'shwib' ) . '</div>' ); ?>

                            </div>

                            <?php get_template_part( 'loop-nav' ); ?>

                            <?php get_template_part( 'sidebar-after-singular' ); ?>

                            <?php comments_template( '/comments.php', true ); // Loads the comments.php template. ?>

                        <?php endwhile; ?>

                    <?php else : ?>

                        <?php get_template_part( 'loop-error' ); ?>

                    <?php endif; ?>

                </div> <!--content-->

                <div class="col-lg-4">

                    <?php get_template_part( 'sidebar-posts' ); ?>

                </div>

            </div> <!-- /row -->
        </div> <!-- /container -->
<?php get_footer(); ?>