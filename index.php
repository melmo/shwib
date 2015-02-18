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

            <div class="row">
            
                <div class="col-sm-12">

                    <?php if (!is_singular() ){ get_template_part( 'loop-meta' ); }  ?>

                    <?php if ( have_posts() ) : ?>

                        <?php while ( have_posts() ) : the_post(); ?>

                            <div <?php hybrid_attr( 'content' ); ?>>

                                <a href="<?php the_permalink();?>"><h1 <?php echo hybrid_get_attr( 'entry-title' ); ?>><?php the_title();?></h1></a>

                                <div class="entry-byline">
                                    <span <?php hybrid_attr( 'entry-author' ); ?>><?php the_author_posts_link(); ?></span>
                                    <time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
                                    <?php comments_popup_link( number_format_i18n( 0 ), number_format_i18n( 1 ), '% Comments', 'comments-link', '' ); ?>
                                    <?php edit_post_link(); ?>
                                </div><!-- .entry-byline -->

                                <div class="entry-content">
                                    <?php the_post_thumbnail(); ?>
                                    <?php the_excerpt(); ?>
                                    <?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'shwib' ), 'after' => '</p>' ) ); ?>

                                </div><!-- .entry-content -->

                                <footer class="entry-footer">
                                    <?php hybrid_post_terms( array( 'taxonomy' => 'category', 'text' => __( 'Posted in %s', 'hybrid-base' ) ) ); ?>
                                    <?php hybrid_post_terms( array( 'taxonomy' => 'post_tag', 'text' => __( 'Tagged %s', 'hybrid-base' ), 'before' => '<br />' ) ); ?>
                                </footer><!-- .entry-footer -->
                            </div>

                        <?php endwhile; ?>
                        
                        <?php get_template_part( 'loop/loop-nav' ); ?>

                    <?php else : ?>

                        <?php get_template_part( 'loop/loop-error' ); ?>

                    <?php endif; ?>

                </div> <!--content-->

            </div> <!-- /row -->
        </div> <!-- /container -->
<?php get_footer(); ?>