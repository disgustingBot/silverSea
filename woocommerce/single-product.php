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

  <button class="btn" id="backToGallery" type="button" name="button"><< Volver a la búsqueda</button>
  <section class="singleContainer">
    <!-- <div class="imageGallery">
      <img class="" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
    </div> -->
    <div class="gallery" id="gallery">

        <?php $attachment_ids = $product->get_gallery_attachment_ids(); ?>


          <img class="element rowcol1 lazy" onclick="altClassFromSelector('alt','#gallery')" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
          <?php $count=0; foreach( $attachment_ids as $attachment_id ) { ?>
            <img class="element rowcol1 lazy" onclick="altClassFromSelector('alt','#gallery')" data-url="<?php echo $image_link = wp_get_attachment_url( $attachment_id ); ?>" alt="">
          <?php $count++; } ?>








      <div class="singleProductsgalleryBtnsContainer">
        <button class="singleProductsGalleryBtns" id="nextButton">
          <svg class="singleProductArrowSVG" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18.5455 21.18L9.77992 12L18.5455 2.82L15.8469 0L4.36365 12L15.8469 24L18.5455 21.18Z" fill="currentColor"/>
          </svg>
        </button>
        <button class="singleProductsGalleryBtns" id="prevButton">
          <svg class="singleProductArrowSVG" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M5 21.18L14.2713 12L5 2.82L7.85425 0L20 12L7.85425 24L5 21.18Z" fill="currentColor"/>
          </svg>
        </button>
      </div>
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
    <button class="btn singleBuy" type="button" name="button">Comprar</button>
    <button class="btn blue singleRent " type="button" name="button">Alquilar</button>
  </section>




<?php } wp_reset_query(); ?>



<?php get_footer(); ?>
