<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cap
 */

?>
<?php global $woocommerce; ?>

<footer id="footer" class="site-footer">
  <ul>
    <li>
      <a class="logo" href="/"><span>Cap & Co.</span></a>
    </li>
    <li>
      <a class="accueil" href="/">Accueil</a>
    </li>
    <li>
      <a class="apropos" href="/apropos">À Propos</a>
    </li>
    <li>
        <a class="panier" href="<?php echo  wc_get_cart_url(); ?>"
          >Cart.
          <span>
           : <?php echo $woocommerce->cart->get_cart_contents_count(); ?>
          </span>
        </a>
    </li>
  </ul>
</footer>
<!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>
