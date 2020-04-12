<?php get_header(); ?>

<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?php while(have_posts()){the_post(); ?>
  <?php global $woocommerce, $product, $post; ?>

  <!-- <?php include('../titleBaner.php'); ?> -->

  <figure class="titleBaner">
    <!-- <img class="" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt=""> -->
    <figcaption class="titleBanerCaption">
      <h2><?php the_title();?></h2>
      <h3><?php echo get_the_excerpt(); ?></h3>
    </figcaption>
  </figure>

  <!-- <?php include('breadCrum'); ?> -->

  <button type="button" name="button"><< Volver a la búsqueda</button>
<section class="singleContainer">
  <div class="imageGallery">
    <img class="" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
  </div>
    <figure class="atributo">

      <img src="http://localhost/Silversea/wp-content/uploads/2020/04/cargaMax.png" alt="">
      <figcaption>
        <h4>Carga Max</h4>
        <?php echo get_post_meta( get_the_id(), 'cargaMax' )[0]; ?>
      </figcaption>

    </figure>

    <figure class="atributo">
      <img src="http://localhost/Silversea/wp-content/uploads/2020/04/aperturaPuerta.png" alt="">
      <figcaption>
        <h4>Apertura de puerta</h4>
        <?php echo get_post_meta( get_the_id(), 'aperturaPuerta' )[0]; ?>
      </figcaption>
    </figure>

    <figure class="atributo">
      <img src="http://localhost/Silversea/wp-content/uploads/2020/04/medidasInternas.png" alt="">
      <figcaption>
        <h4>Medidas Internas</h4>
        <?php echo get_post_meta( get_the_id(), 'medidasInternas' )[0]; ?>
      </figcaption>
    </figure>

    <figure class="atributo">
      <img src="http://localhost/Silversea/wp-content/uploads/2020/04/medidasExternas.png" alt="">
      <figcaption>
        <h4>Medidas Externas</h4>
        <?php echo get_post_meta( get_the_id(), 'medidasExternas' )[0]; ?>
      </figcaption>
    </figure>

    <figure class="atributo">
      <img src="http://localhost/Silversea/wp-content/uploads/2020/04/capacidadCubica.png" alt="">
      <figcaption>
        <h4>Capacidad Cúbica</h4>
        <?php echo get_post_meta( get_the_id(), 'capacidadCubica' )[0]; ?>
      </figcaption>
    </figure>

    <figure class="atributo">
      <img src="http://localhost/Silversea/wp-content/uploads/2020/04/area.png" alt="">
      <figcaption>
        <h4>Área</h4>
        <?php echo get_post_meta( get_the_id(), 'area' )[0]; ?>
      </figcaption>
    </figure>

    <figure class="atributo">
      <img src="http://localhost/Silversea/wp-content/uploads/2020/04/aperturaTecho.png" alt="">
      <figcaption>
        <h4>Apertura de techo</h4>
        <?php echo get_post_meta( get_the_id(), 'aperturaTecho' )[0]; ?>
      </figcaption>
    </figure>

    <figure class="atributo">
      <img src="http://localhost/Silversea/wp-content/uploads/2020/04/tara.png" alt="">
      <figcaption>
        <h4>Tara</h4>
        <?php echo get_post_meta( get_the_id(), 'tara' )[0]; ?>
      </figcaption>
    </figure>

</section>


<?php } wp_reset_query(); ?>



<?php get_footer(); ?>
