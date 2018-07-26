<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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

        <nav class="navbar navbar-dark bg-secondary navbar-general">
            <div class="container">
                

                <a class="navbar-brand" href="<?php bloginfo('url');?>" title="<?php bloginfo('name');?> - <?php bloginfo('description');?>">
                    <?php if (is_home()) { ?>
                        <h1 class="sr-only"><?php bloginfo('name');?></h1>
                    <?php } ?>
                    <img class="main-logo" src="<?php bloginfo('template_url');?>/_/img/logo.png" alt="<?php bloginfo('name');?>" title="<?php bloginfo('name');?>">
                </a>

                <button class="navbar-toggler d-md-none" type="button" data-toggle="collapse" data-target="#main-menu">
                    &#9776;
                </button>

                <div class="float-right">
                    <div class="navbar-social float-right d-none d-md-block">
                        <a href="https://twitter.com/littlewebgiants" target="_blank" class="twitter-link"><i class="icon icon-twitter"></i></a>
                        <a href="https://www.facebook.com/littlewebgiants" target="_blank" class="facebook-link"><i class="icon icon-facebook"></i></a>
                        <a href="https://www.linkedin.com/company/little-web-giants" target="_blank" class="linkedin-link"><i class="icon icon-linkedin"></i></a>
                    </div>
                    <a href="<?php bloginfo('url');?>/wp-login.php" class="login btn btn-nav d-none d-md-block float-right"><i class="material-icons">&#xE7FD;</i></a>
                    <div id="search-toggle" class="search btn btn-nav d-none d-md-block float-right">
                        <div class="navbar-search">
                            <?php get_template_part('searchform'); ?>
                        </div>
                        <i class="material-icons">&#xE8B6;</i>

                    </div>
                    
                </div>  
            </div>
        </nav>
        <div class="navbar-collapse collapse navbar-expand-md d-md-block" id="main-menu">
            <nav class="navbar navbar-dark navbar-main-menu " >
                <div class="container">
                    <div class="nav-wrap clearfix" >
                        <div class="d-md-none navbar-mobile-search">
                            <?php get_template_part('searchform'); ?>
                            <i class="material-icons" id="mobile-search-submit">&#xE8B6;</i>
                        </div>
                        <?php get_template_part( 'menus/menu-primary' ); ?>
                        
                    </div>
                </div>
            </nav>
        </div><!--/.nav-collapse -->
        <div id="main">

