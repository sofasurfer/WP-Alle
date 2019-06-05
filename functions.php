<?php


// add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array(), '1.0' );

}

add_action('init', 'remove_theme_post_format', 11);
function remove_theme_post_format(){
    remove_theme_support( 'post-formats' );    
}








/*
    List subscribers
*/
function list_subscriptions( $atts ){
    $args = array(
      'numberposts' => -1,
      'post_type'   => 'wpcf7s'
    );

    $get_posts = new WP_Query;
    $posts = $get_posts->query( $args );


    $subscribers = array();
    $sub_list = "<table class=\"table table-striped\">";
    foreach( $posts as $post ){

        $p_meta = get_post_meta( $post->ID );
        $p_meta['post_date'] = get_the_date('D j M',$post);
        $p_meta['post_name'] = $p_meta['wpcf7s_posted-your-name'][0];

        if( array_key_exists('wpcf7s_posted-checkbox-anonymous', $p_meta) ) {
            $p_meta['post_name'] = preg_replace("/[\S]/", "X", $p_meta['post_name']);
        }

        $sub_list .= "<tr><td>".$p_meta['post_date']."</td>";
        $sub_list .= "<td>".$p_meta['post_name']."</td></tr>";
        array_push($subscribers, $p_meta);

    }
    $sub_list .= "</table>";

    // $sub_list .= "<pre>" . print_r($subscribers,true) . "</pre>";

    return $sub_list;
}
add_shortcode( 'list_subscriptions', 'list_subscriptions' );




?>
