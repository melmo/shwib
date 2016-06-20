<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="stylesheet" href="<?php bloginfo('template_url');?>/_/css/style.css">
        <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url');?>/_/img/favicon.ico" />
        <?php wp_head(); ?> 
    </head>
    <body <?php hybrid_attr( 'body' ); ?>>
        <div id="outer-wrap">
            <div id="inner-wrap" class="clearfix">
                <div class="skip-nav">
                    <a href="#content" class="screen-reader-text"><?php _e( 'Skip to content', 'hybrid-base' ); ?></a>
                </div><!-- .skip-nav -->
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

        <!-- Fixed navbar -->
        <nav class="navbar navbar-dark bg-inverse navbar-fixed-top">
          <div class="container">
              
              <a class="navbar-brand" href="<?php bloginfo('url');?>">Project name</a>
              <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
                &#9776;
              </button>
            <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
                <?php get_template_part( 'menus/menu-primary' ); ?>
            </div><!--/.nav-collapse -->

          </div>
        </nav>

