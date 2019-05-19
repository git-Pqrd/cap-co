<?php get_header(); ?>

<?php $product = wc_get_product( get_the_id() ); ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'single-post-thumbnail' );?>

<div class="section" id="single-product">
  <div class="hero">
    <div class="img">
      <a
        href="<?php  echo $image[0]; ?>"
        data-mediabox="<?php echo get_the_id(); ?>"
        data-title="<?php echo $product->get_title(); ?>"
      >
        <img
          src="<?php  echo $image[0]; ?>"
          data-id="<?php echo get_the_id(); ?>"
        />
      </a>
    </div>

    <div class="thumbnails">
      <?php $attachment_ids = $product->get_gallery_attachment_ids(); foreach(
      array_slice($attachment_ids,0 , 6) as $attachment_id ) { $image_link =
      wp_get_attachment_url( $attachment_id ); ?>

      <a
        href="<?php echo $image_link ?>"
        data-mediabox="<?php echo get_the_id(); ?>"
        data-title="<?php echo $product->get_title(); ?>"
      >
        <img
          src="<?php echo $image_link ?>"
          data-id="<?php echo get_the_id(); ?>"
        />
      </a>

      <?php
    }
?>
    </div>

    <div class="content">
      <div class="titre"><?php echo $product->get_title(); ?></div>
      <div class="cat"><?php echo  $product->get_categories(); ?></div>
      <div class="text"><?php echo $product->get_short_description(); ?></div>
      <div class="button cartBtn">

        <a
          data-title="<?php echo the_title(); ?>"
          data-cart="<?php echo wc_get_cart_url(); ?>"
          data-action="add"
          data-url="<?php echo admin_url('admin-ajax.php'); ?>"
          data-item="<?php echo $product->get_id() ?>"
          class="more" >Acheter !</a
        >
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
    </div>
  </div>
</div>
<?php get_footer(); ?>
