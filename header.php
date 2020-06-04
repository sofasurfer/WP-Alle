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
    <img src="<?= get_stylesheet_directory_uri(); ?>/images/LigneHaut.png" class="bg-1" />
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 v-left">
                    <div class="v-counter">
                        <span class="month"><?= do_shortcode('[get_mounth]'); ?></span>
                        <div class="count">
                            <span><?= do_shortcode('[count_subscriptions text="Total: %s"]'); ?></span>
                            <?= __("Unterzeichner*innen",'veloallee'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <figure class="v-velo">
                        <img src="<?= get_stylesheet_directory_uri(); ?>/images/velo-signature.png" />
                    </figure>
                </div>
                <div class="c-lang">
                    <?= do_shortcode('[c_post_languages ulclass="c-meta-lang" ]'); ?>
                </div>
            </div>
        </div>        
   
        </div>
    </header>
    <div id="content" class="site-content">
        <div class="container">
            <div class="row">
