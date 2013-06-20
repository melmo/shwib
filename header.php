<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php hybrid_document_title(); ?></title>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="<?php bloginfo('template_url');?>/style.css">
        <script src="<?php bloginfo('template_url');?>/_/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <?php wp_head(); ?> 
    </head>
    <body class="<?php hybrid_body_class(); ?>">
        <div id="outer-wrap">
            <div id="inner-wrap" class="clearfix">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

       <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="<?php bloginfo('url');?>">Project name</a>
                    <div class="nav-collapse collapse">
                    <?php get_template_part( 'menu', 'primary' ); ?>
                </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>