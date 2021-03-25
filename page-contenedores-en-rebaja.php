<?php get_header(); ?>

<div class="saleTopInteraction">
  <h2 class="saleTitle"><?php the_title(); ?></h2>
  <button class="btn saleBtn"><a href="<?php echo get_site_url() . '/buscar-contenedor-maritimo/'; ?>">Todos los contenedores</a></button>
</div>


<section class="saleMain">
<?php
$args = array(
  'post_type' => 'product',
  'posts_per_page' => -1,
  'tax_query' => array(
    array(
      'taxonomy' => 'product_visibility',
      'field'    => 'name',
      'terms'    => 'featured',
    ),
  ),
);
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) {
  while ( $loop->have_posts() ) { $loop->the_post();
    simpla_card();
  }
} else {
  echo __( 'No products found' );
}
wp_reset_postdata();
?>
</section>

<?php get_footer() ;?>
