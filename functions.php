<?php
load_theme_textdomain('veloallee', get_stylesheet_directory() . '/languages');

// add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array(), '1.0' );

}


function remove_theme_post_format(){
    remove_theme_support( 'post-formats' );    
}
add_action('init', 'remove_theme_post_format', 11);


/*
    Add Name to Submission List
*/
function c_set_submission_colums($column, $post_id){

    if( $column == 'submission' ){
        $p_meta = get_post_meta( $post_id );
        echo $p_meta['wpcf7s_posted-your-name'][0] . ' (' . $p_meta['wpcf7s_posted-your-email'][0] . ')';
    }
    error_log("cols: " . print_r($post_id,true));
    return $atts;
}
add_action('manage_wpcf7s_posts_custom_column', 'c_set_submission_colums', 20, 2);


/*
    Add full screen mode to gutenberg
*/
function writy_setup() {
    add_theme_support( 'align-wide' );
    add_theme_support( 'wp-block-styles' );
}
add_action( 'after_setup_theme', 'writy_setup' );


/*
    list_sharebuttons
*/
function list_sharebuttons(){
    ob_start();
    get_template_part('template-parts/sharing', 'none');
    $var = ob_get_contents();
    ob_end_clean();
    return $var;
}
add_shortcode( 'list_sharebuttons', 'list_sharebuttons' );


/*
    List subscribers
*/
function list_subscriptions( $atts ){
    $args = array(
      'posts_per_page' => -1,
      'post_type'   => 'wpcf7s'
    );

    $get_posts = new WP_Query;
    $posts = $get_posts->query( $args );


    $subscribers = array();
    $sub_list .= "<div class=\"v-wide\">";
    $sub_list .= "<span class=\"v-left\">". __('Unterzeichner*innen','veloallee')."</span>";
    $sub_list .= "<span class=\"v-right\">".do_shortcode('[count_subscriptions text="Totale: %s"]')."</span>";

    $sub_list .= "<div class=\"table-wrapper-scroll-y my-custom-scrollbar\"><table class=\"v-table\">";
    foreach( $posts as $post ){

        error_log(print_r($p_meta,true));

        $p_meta = get_post_meta( $post->ID );
        $p_meta['post_date'] = get_the_date('D j M',$post);
        $p_meta['post_name'] = $p_meta['wpcf7s_posted-your-name'][0];
        $p_meta['post_age'] = $p_meta['wpcf7s_posted-your-age'][0];
        $p_meta['post_location'] = $p_meta['wpcf7s_posted-your-location'][0];

        if( array_key_exists('wpcf7s_posted-checkbox-anonymous', $p_meta) ) {
            $p_meta['post_name'] = preg_replace("/[\S]/", "X", $p_meta['post_name']);
            $p_meta['post_name'] = "Anonymous";
        }

        $sub_list .= "<tr><td width=\"33%\">".$p_meta['post_date']."</td>";
        $sub_list .= "<td width=\"33%\" align=\"center\">".$p_meta['post_name']."</td>";
        $sub_list .= "<td width=\"33%\" align=\"right\">".$p_meta['post_location']."</td></tr>";
        array_push($subscribers, $p_meta);

    }
    $sub_list .= "</table></div></div>";

    // $sub_list .= "<pre>" . print_r($subscribers,true) . "</pre>";

    return $sub_list;
}
add_shortcode( 'list_subscriptions', 'list_subscriptions' );


/*
    Count subscriptions
*/
function count_subscriptions( $atts ){
    $args = array(
      'posts_per_page' => -1,
      'post_type'   => 'wpcf7s'
    );

    $get_posts = new WP_Query;
    $posts = $get_posts->query( $args );

    return sprintf($atts['text'], count($posts) );
}
add_shortcode( 'count_subscriptions', 'count_subscriptions' );


/*
    Get mounth
*/
function get_mounth( $atts ){
    setlocale(LC_TIME, "de_DE");

    return "Juni"; //strftime("%B", time());
}
add_shortcode( 'get_mounth', 'get_mounth' );


/*
    Creates language switch
*/
function c_post_languages($args){
    $lswitch = "";
    $languages = icl_get_languages('skip_missing=1');
    if(1 < count($languages)){
        $lswitch = '<ul class="'.$args['ulclass'].'">';
        foreach($languages as $l){
            if( $l['active'] == 1 ){
                $lswitch .=  '<li class="c-active"><a href="'.$l['url'].'">'.$l['code'].'</a></li>';
            }else{
                $lswitch .=  '<li><a href="'.$l['url'].'">'.$l['code'].'</a></li>';
            }
        }
        $lswitch .= '</ul>';
    }
    return $lswitch;
}
add_shortcode( 'c_post_languages', 'c_post_languages' );






add_action( 'init', 'wpse325327_add_excerpts_to_pages' );
function wpse325327_add_excerpts_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
}
?>
