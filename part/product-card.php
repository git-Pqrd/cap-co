<a href="<?php the_permalink(); ?>" class="card">
  <?php $product = wc_get_product( get_the_ID()); ?>

<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID
), 'single-post-thumbnail' );?>
  <div class="upperbox">
    <img
      src="<?php  echo $image[0]; ?>"
      data-id="<?php echo $loop->post->ID; ?>"
    />
  </div>
  <div class="lowerbox">
    <span><?php the_title() ?></span>
  </div>

  <div class="price">
    <?php if ($product->is_on_sale() && $product->is_type( "simple" ) ) { ?>
    <div class="price">
      <?php echo $product->get_sale_price(); ?>
      <small><?php echo  $product->get_regular_price(); ?></small>
    </div>
    <?php }else { ?>
    <div class="price"><?php echo $product->get_price(); ?></div>
    <?php } ?>
  </div>
</a>
