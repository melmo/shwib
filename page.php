<?php
/**
 * Page Template
 *
 * This is the default page template. 
 *
 */
    get_header(); ?>
        <div class="container">
            
            <div class="row">
            
                <div class="col-sm-12">

                    <?php if ( have_posts() ) : ?>

                        <?php while ( have_posts() ) : the_post(); ?>

                            <div <?php hybrid_attr( 'content' ); ?>>

                                <h1 <?php echo hybrid_get_attr( 'entry-title' ); ?>><?php the_title();?></h1>

                                <div class="entry-content">

                                    <?php the_content(); ?>
                                    <?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'shwib' ), 'after' => '</p>' ) ); ?>

                                </div><!-- .entry-content -->

                                <footer class="entry-footer">
                                    <?php hybrid_post_terms( array( 'taxonomy' => 'category', 'text' => __( 'Posted in %s', 'hybrid-base' ) ) ); ?>
                                    <?php hybrid_post_terms( array( 'taxonomy' => 'post_tag', 'text' => __( 'Tagged %s', 'hybrid-base' ), 'before' => '<br />' ) ); ?>
                                </footer><!-- .entry-footer -->
                            </div>

                        <?php endwhile; ?>

                    <?php else : ?>

                        <?php get_template_part( 'loop/loop-error' ); ?>

                    <?php endif; ?>

                </div> <!--col-->
        
            </div><!-- /row -->
        </div> <!-- /container -->
<?php get_footer(); ?>