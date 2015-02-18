<?php
/**
 * Footer Template
 *
 * The footer template is generally used on every page of your site. Nearly all other
 * templates call it somewhere near the bottom of the file. It is used mostly as a closing
 * wrapper, which is opened with the header.php file. It also executes key functions needed
 * by the theme, child themes, and plugins. 
 *
 */
?>
        </div> <!--#innerwrap-->
            </div> <!--#outerwrap-->
            <footer id="footer">
                <div class="container">
                    <?php get_template_part( 'sidebar-subsidiary' ); ?>
                    <p class="copyright credits">&copy; Company <?php echo date ( 'Y' ); ?></p>
                </div>
            </footer>      
        <?php wp_footer(); ?> 
    </body>
</html>