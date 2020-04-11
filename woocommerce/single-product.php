<?php get_header(); ?>

<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?php while(have_posts()){the_post(); ?>
  <?php global $woocommerce, $product, $post; ?>


  <h1>Sinle Container</h1>

<?php } wp_reset_query(); ?>



<?php get_footer(); ?>
