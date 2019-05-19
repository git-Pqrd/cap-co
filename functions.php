<?php
function my_theme_enqueue_styles() {
    $parent_style = 'wp-bootstrap-4'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
}

function  animation_scripts() {
  wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/build/bundle.js',  true);
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'animation_scripts' );

//function create_post_type() {
    //register_post_type( 'Test',
      //array(
        //'labels' => array(
          //'name' => __( 'client' ),
          //'singular_name' => __( 'Client' )
        //),
      //'public' => true,
      //'has_archive' => true,
    //)
  //);
//}
//add_action( 'init', 'create_post_type' );

//flush_rewrite_rules( false );
include get_theme_file_path() . '/add_remove.php';
//
// 
add_action( 'woocommerce_before_checkout_form', 'bbloomer_cart_on_checkout_page_only', 5 );
function bbloomer_cart_on_checkout_page_only() {
  if ( is_wc_endpoint_url( 'order-received' ) ) return;
    echo do_shortcode('[woocommerce_cart]');
}
