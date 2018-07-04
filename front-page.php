<?php
/**
 * Front Page Template
 *
 * The front page template is used by the home page/default URL of your site.
 *
 */
?>
<?php get_header(); ?>
        <!-- Main jumbotron for a primary marketing message or call to action -->
    <div id="content"><!-- Skip nav link  target-->
      <div class="jumbotron" >
        <div class="container">
          <h1>Hello, world!</h1>
          <p>shwib is a starter kit for rapid Wordpress theme development.</p>
          <a class="btn btn-primary" href="<?php bloginfo('url');?>/quick-start-guide/">Get started</a>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-12">
            <h2>Your favourite tools</h2>
          </div>
          <div class="col-md-4">
            <div class="demo-image">
              <img src="<?php bloginfo('template_url');?>/_/img/demo-content-img/bootstrap-logo.png">
            </div>
            <h3>Bootstrap</h3>
            <p>Sass powered Boostrap 4.0 alpha.</p>
            
          </div>
          <div class="col-md-4">
            <div class="demo-image">
              <img src="<?php bloginfo('template_url');?>/_/img/demo-content-img/theme-hybrid-logo.png">
            </div>
            <h3>Hybrid</h3>
            <p>Wordpress enhancements courtesy of the Hybrid Framework.</p>
            
         </div>
          <div class="col-md-4">
            <div class="demo-image">
              <img src="<?php bloginfo('template_url');?>/_/img/demo-content-img/grunt-bower.png">
            </div>
            <h3>Yarn & Grunt</h3>
            <p>Modern front end development toolkit.</p>
            
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h2>Built with shwib</h2>
          </div>
          <div class="col-md-4">
            <div class="demo-screen">
              <img src="<?php bloginfo('template_url');?>/_/img/demo-content-img/pv-magazine-screen.png">
            </div>
            <h3>pv magazine USA</h3>
            <p>The world's leading solar energy trade journal.</p>
            
          </div>
          <div class="col-md-4">
            <div class="demo-screen">
              <img src="<?php bloginfo('template_url');?>/_/img/demo-content-img/academy-screen-1.png">
            </div>
            <h3>betahaus Academy</h3>
            <p>Redefining education for the makers and doers of tomorrow.</p>
            
         </div>
          <div class="col-md-4">
            <div class="demo-screen">
              <img src="<?php bloginfo('template_url');?>/_/img/demo-content-img/bienenbox-screen.png">
            </div>
            <h3>BienenBox</h3>
            <p>Social network and online shop for urban beekeepers.</p>
            
          </div>
        </div>
      </div>
    </div>
<?php get_footer(); ?>