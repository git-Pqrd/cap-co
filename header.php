<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head>
section and everything up until
<div id="content">
  * * @link
  https://developer.wordpress.org/themes/basics/template-files/#template-partials
  * * @package cap */ ?>
<?php global $woocommerce; ?>
  <!DOCTYPE html>
  <html <?php language_attributes(); ?>
    >
    <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="profile" href="https://gmpg.org/xfn/11" />

      <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>
      >
      <header id="nav" class="site-header">
        <a class="logo" href="/"><span>Cap & Co.</span></a>
        <a class="accueil" href="/">Accueil.</a>
        <a class="apropos" href="/apropos">À Propos.</a>
        <a class="panier" href="<?php echo  wc_get_cart_url(); ?>"
          >Cart.
          <span>
           : <?php echo $woocommerce->cart->get_cart_contents_count(); ?>
          </span>
        </a>
      </header>
      <!-- #masthead -->
    </body>
  </html>
</div>
