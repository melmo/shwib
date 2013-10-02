<?php
/**
 * 404 Template
 *
 * The 404 template is used when a reader visits an invalid URL on your site. By default, the template will 
 * display a generic message.
 *
 */

@header( 'HTTP/1.1 404 Not found', true, 404 );

get_header(); ?>
        <div class="container">
            
            <div class="row">
            
                <div class="content col-lg-8">

                        <div id="post-0" class="<?php hybrid_entry_class(); ?>">

                            <h1 class="error-404-title entry-title"><?php _e( 'Not Found', 'shwib' ); ?></h1>

                            <div class="entry-content">

                                <p>
                                    <?php printf( __( 'You tried going to %1$s, and it doesn\'t exist. All is not lost! You can search for what you\'re looking for.', 'shwib' ), '<code>' . home_url( esc_url( $_SERVER['REQUEST_URI'] ) ) . '</code>' ); ?>
                                </p>

                                <?php get_search_form(); // Loads the searchform.php template. ?>

                            </div><!-- .entry-content -->

                            <?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms taxonomy="category" before="Posted in "] [entry-terms taxonomy="post_tag" before="| Tagged "]', 'shwib' ) . '</div>' ); ?>

                        </div>

                </div> <!--content-->

                <div class="col-lg-4">

                    <?php get_template_part( 'sidebar-posts' ); ?>

                </div>
            </div> <!-- /row -->
        </div> <!-- /container -->
<?php get_footer(); ?>