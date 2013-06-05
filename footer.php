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
            <footer>
                <div class="container">
                    <?php get_template_part( 'sidebar-subsidiary' ); ?>
                    <p>&copy; Company 2012</p>
                </div>
            </footer>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
        <?php wp_footer(); ?> 
    </body>
</html>