<?php get_header() ?>

<div class="section grid-products">
<?php  
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 30,
        //'product_cat'    => 'hoodies'
    );

    $loop = new WP_Query( $args );

    while ( $loop->have_posts() ) : $loop->the_post();
        global $product;
        get_template_part('./part/product-card', $product);
    endwhile;

    wp_reset_query();
?>

</div>

<?php get_footer() ?>
