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

<!-- Hotjar Tracking Code for https://cap-casquette.com -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1422123,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
      <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>
      >
      <header id="nav" class="site-header">
        <a class="logo" href="/"><span>Cap & Co.</span></a>
        <a class="accueil" href="/">Home.</a>
        <a class="apropos" href="/about">About.</a>
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
