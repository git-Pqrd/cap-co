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


function find_product_variation( $product ) {
  $array_var_and_char  = array() ;
  $args = array(
      'post_type'     => 'product_variation',
      'post_status'   => array( 'private', 'publish' ),
      'numberposts'   => -1,
      'orderby'       => 'menu_order',
      'order'         => 'asc',
      'post_parent'   => $product->get_id() // get parent post-ID
  );
  $variations = get_posts( $args );

  foreach ( $variations as $variation ) {
      $variation_ID = $variation->ID; // get variation ID
      $product_variation = new WC_Product_Variation( $variation_ID ); // get variations meta
      $variation_image = $product_variation->get_image(); // get variation featured image
      $variation_price = $product_variation->get_price_html(); // get variation price
      $variation_name = $product_variation->get_formatted_name(); // get variation name
      $variation_attr = $product_variation->get_variation_attributes();
      $variation_perma = $product_variation->get_permalink(); //get_post_meta( $variation_ID , '_text_field_date_expire', true );

      $array_var_and_char[$variation_ID] = array( 
        'id' => $variation_ID,
        'meta' => $product_variation,
        'img'=> $variation_image ,
        'price' => $variation_price,
        'name' => $variation_name,
        'attr' => $variation_attr,
        'perma' => $variation_perma,
      ) ;
  }
  return $array_var_and_char ;
}


