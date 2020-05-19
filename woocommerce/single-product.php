<?php get_header(); ?>

<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?php while(have_posts()){the_post(); ?>
  <?php global $woocommerce, $product, $post; ?>
  <?php
  $categories = get_the_terms( get_the_ID(), 'product_cat' );
  $parent=get_term_by('id', $categories->parent, $taxonomy = 'slug', 'ARRAY_A');
  var_dump( $categories);
  ?>


  <?php $singleImgPath = get_template_directory_uri() . "/img/single-product/"; ?>

  <figure class="titleBaner">
    <img class="bannerImg lazy" data-url="<?php echo  $singleImgPath  . "portada-1.jpg" ;?>"  alt="">
    <figcaption >
      <h2 class="titleBanerCaption"><?php the_title() ;?></h2>
    </figcaption>
  </figure>


  <a href=<?php echo site_url('shop'); ?> class="btn" id="backToGallery" type="button" name="button"><< Volver a la búsqueda</a>

  <section class="categoryDescriptions">
    <?php
    if ($categories) {
      foreach ($categories as $cat) {
        $svgPath = get_template_directory()  . "/img/svg/"; ?>
        <figure class="categoryCard">
          <h5 class="cateforyCardTitle">
            <?php echo $cat->name; ?>
          </h5>
          <?php
          if(strpos($cat->slug, 'pies') === false ){
            include $svgPath . $cat->slug . '.php';
          }else {
            include $svgPath  . 'size.php';
          }
          ?>
          <figcaption class="categoryCardCaption">
            <h5 class="categoryCardDescription">
              <?php echo  $cat->description."<br />"; ?>
            </h5>
          </figcaption>
        </figure>
        <?php
      }
    }
    ?>
  </section>

  <section class="singleContainer">
    <div class="Carousel productGallery" >
        <?php $attachment_ids = $product->get_gallery_attachment_ids(); ?>
          <img class="Element productGalleryImg rowcol1 lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="product gallery">
          <?php if($attachment_ids){$count=0; foreach( $attachment_ids as $attachment_id ) { ?>
            <img class="Element productGalleryImg rowcol1 lazy"  data-url="<?php echo $image_link = wp_get_attachment_url( $attachment_id ); ?>" alt="product gallery">

          <?php $count++; }} ?>
      <div class="singleProductsgalleryBtnsContainer">
        <button class="singleProductsGalleryBtns" id="nextButton" >
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
      <img class="" src="<?php echo  $singleImgPath . "cargaMax.png"; ?>" alt="">
      <figcaption>
        <h4>Carga Max</h4>
        <?php echo get_post_meta( get_the_id(), 'cargaMax' )[0]; ?>
      </figcaption>
    </figure>

    <figure class="atributo">
      <img src="<?php echo $singleImgPath . "aperturaPuerta.png"; ?>" alt="">
      <figcaption>
        <h4>Apertura de puerta</h4>
        <?php echo get_post_meta( get_the_id(), 'aperturaPuerta' )[0]; ?>
      </figcaption>
    </figure>

    <figure class="atributo">
      <img src="<?php echo  $singleImgPath . "medidasInternas.png"; ?>" alt="">
      <figcaption>
        <h4>Medidas Internas</h4>
        <?php echo get_post_meta( get_the_id(), 'medidasInternas' )[0]; ?>
      </figcaption>
    </figure>

    <figure class="atributo">
      <img src="<?php echo  $singleImgPath . "medidasExternas.png"; ?>" alt="">
      <figcaption>
        <h4>Medidas Externas</h4>
        <?php echo get_post_meta( get_the_id(), 'medidasExternas' )[0]; ?>
      </figcaption>
    </figure>

    <figure class="atributo">
      <img src="<?php echo  $singleImgPath . "capacidadCubica.png"; ?>" alt="">
      <figcaption>
        <h4>Capacidad Cúbica</h4>
        <?php echo get_post_meta( get_the_id(), 'capacidadCubica' )[0]; ?>
      </figcaption>
    </figure>

    <figure class="atributo">
      <img src="<?php echo  $singleImgPath . "area.png"; ?>" alt="">
      <figcaption>
        <h4>Área</h4>
        <?php echo get_post_meta( get_the_id(), 'area' )[0]; ?>
      </figcaption>
    </figure>

    <figure class="atributo">
      <img src="<?php echo  $singleImgPath . "aperturaTecho.png"; ?>" alt="">
      <figcaption>
        <h4>Apertura de techo</h4>
        <?php echo get_post_meta( get_the_id(), 'aperturaTecho' )[0]; ?>
      </figcaption>
    </figure>

    <figure class="atributo">
      <img src="<?php echo  $singleImgPath . "tara.png"; ?>" alt="">
      <figcaption>
        <h4>Tara</h4>
        <?php echo get_post_meta( get_the_id(), 'tara' )[0]; ?>
      </figcaption>
    </figure>
    <button class="btn singleBuy" type="button" name="button">Comprar</button>
    <button class="btn blue singleRent " type="button" name="button">Alquilar</button>
  </section>



  <section class="testimonialsSec sectionPadding">
    <h3 class="testimonialSecTitle brandColorTxt">CLIENTES SATISFECHOS</h3>
    <div class="starsContainer">
      <svg fill="currentColor" class="star" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
      <svg fill="currentColor" class="star" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
      <svg fill="currentColor" class="star" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
      <svg fill="currentColor" class="star" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
      <svg fill="currentColor" class="star" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
    </div>
    <div class="testimonialsContainer Carousel">
      <button class="testimonialBtn" id="nextButton" >
        <svg class="singleProductArrowSVG" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M18.5455 21.18L9.77992 12L18.5455 2.82L15.8469 0L4.36365 12L15.8469 24L18.5455 21.18Z" fill="currentColor"/>
        </svg>
      </button>
      <?php
      $args = array(
        'post_type'=>'testimonials',
      );
      $testimonials=new WP_Query($args);
      while($testimonials->have_posts()){$testimonials->the_post();?>
        <quote class="testimonial testimonialCarusel Element">
          <div class="testimonialTxt mainTxtType1">
            <h4 class="testimonialAuthor"><?php the_title(); ?></h4>
            <div class="testimonialQuote"><?php the_content(); ?></div>
          </div>
        </quote>
      <?php } ?>
      <button class="testimonialBtn" id="prevButton">
        <svg class="singleProductArrowSVG" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M5 21.18L14.2713 12L5 2.82L7.85425 0L20 12L7.85425 24L5 21.18Z" fill="currentColor"/>
        </svg>
      </button>
    </div>

  </section>


<?php } wp_reset_query(); ?>



<?php get_footer(); ?>
