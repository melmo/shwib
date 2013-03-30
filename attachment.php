<?php
/**
 * Attachment Template
 *
 * This is the default attachment template.
 *
 */
    get_header(); ?>
        <div class="container">
            
            <div class="content">

                <?php if ( have_posts() ) : ?>

                    <?php while ( have_posts() ) : the_post(); ?>

                        <div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

                            <?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>

                            <?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( 'By [entry-author] on [entry-published]', 'shwib' ) . '</div>' ); ?>

                            <?php if(!wp_attachment_is_image( the_ID())) { ?>

                            <div class="entry-content">

                                <?php hybrid_attachment(); ?>

                                <p class="download">
                                    <a href="<?php echo wp_get_attachment_url(); ?>" title="<?php the_title_attribute(); ?>" rel="enclosure" type="<?php echo get_post_mime_type(); ?>"><?php printf( __( 'Download &quot;%1$s&quot;', 'shwib' ), the_title( '<span class="fn">', '</span>', false) ); ?></a>
                                </p><!-- .download -->

                                <?php the_content(); ?>

                            </div><!-- .entry-content -->

                            <?php } else { ?>

                            <div class="entry-content">

                                <p class="attachment-image">
                                    <?php echo wp_get_attachment_image( get_the_ID(), 'full', false, array( 'class' => 'aligncenter' ) ); ?>
                                </p><!-- .attachment-image -->

                                <?php the_content(); ?>

                            </div><!-- .entry-content -->


                        </div>

                    <?php endwhile; ?>

                <?php else : ?>

                    <?php get_template_part( 'loop-error' ); ?>

                <?php endif; ?>

            </div> <!--content-->

        </div> <!-- /container -->
<?php get_footer(); ?>