<!doctype html>
<html <?php language_attributes(); ?> >
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="description" content="<?= get_the_excerpt();?>"/>

        
        <meta property="og:type" content="article"/>
        <meta property="og:title" content="<?= get_the_excerpt();?>"/>
        <meta property="og:description" content="<?= get_the_excerpt();?>"/>
        <meta property="og:image" content="<?= get_the_post_thumbnail_url(); ?>"/>


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    <!--header class="navbar navbar-default navbar-fixed-top">
        <div class="container">
                
            <nav id="navbar-top" class="navbar navbar-light bg-light">
                <?php
                wp_nav_menu(array(
                'theme_location'  => 'primary',
                'container'       => 'div',
                'container_id'    => 'main-nav',
                'container_class' => '',
                'menu_id'         => false,
                'menu_class'      => 'nav nav-pills',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
                ));
                ?>
            </nav>
        </div>
    </header-->
    <div class="c-lang">
        <?= do_shortcode('[c_post_languages ulclass="c-meta-lang" ]'); ?>
    </div>
    <div id="content" class="site-content">
        <div class="container">
            <div class="row">
