<?php
/**
 * Index Template
 *
 * This is the index template.  Technically, it is the "posts page" template.  It is used when a visitor is on
 * the page assigned to show a site's latest blog posts or on a category/tag/archive/taxonomy page if a more
 * specific template is not available.
 *
 */
get_header(); ?>
        <div class="container">
            
            <?php if (!is_singular() ){ get_template_part( 'loop-meta' ); }  ?>
            
            <div class="content">

                <?php if ( have_posts() ) : ?>

                    <?php while ( have_posts() ) : the_post(); ?>

                        <div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

                            <?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>

                            <?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( 'By [entry-author] on [entry-published]', 'shwib' ) . '</div>' ); ?>

                            <div class="entry-content">
                                <?php the_post_thumbnail(); ?>
                                <?php the_excerpt(); ?>
                                <?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'shwib' ), 'after' => '</p>' ) ); ?>

                            </div><!-- .entry-content -->

                            <?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms taxonomy="category" before="Posted in "] [entry-terms taxonomy="post_tag" before="| Tagged "]', 'shwib' ) . '</div>' ); ?>

                        </div>

                    <?php get_template_part( 'loop-nav' ); ?>

                    <?php endwhile; ?>

                <?php else : ?>

                    <?php get_template_part( 'loop-error' ); ?>

                <?php endif; ?>

            </div> <!--content-->
            <?php get_template_part( 'sidebar-posts' ); ?>
        </div> <!-- /container -->
<?php get_footer(); ?>