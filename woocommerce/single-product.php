<?php get_header(); ?>

<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?php while(have_posts()){the_post(); ?>
  <?php global $woocommerce, $product, $post; ?>
  <?php
  $categories = get_the_terms( get_the_ID(), 'product_cat' );
  if ($categories) {
    foreach ($categories as $cat) {
      $parent=get_term_by('id', $cat->parent, 'product_cat', 'ARRAY_A');
      if($parent['parent']){
        $tipo = $parent['name'];
      }
    }
  }
  // FIND OUT WHICH CARACTERISTICS
  if ($categories) {
    // for each category
    foreach ($categories as $cat) {
      $parent=get_term_by('id', $cat->parent, 'product_cat', 'ARRAY_A');
      $grandParent=get_term_by('id', $parent['parent'], 'product_cat', 'ARRAY_A');

      if ($parent['slug']=="size") {
        $size = $cat->name;
        $sizeSlug = $cat->slug;
      }
      if ($grandParent['slug']=="general") {
        $tipo_1 = $parent['name'];
        $tipo_1Slug = $parent['slug'];
        $tipo_2 = $cat->name;
        $tipo_2Slug = $cat->slug;
      }
      if ($parent['slug']=="condition") {
        $condition = $cat->name;
        $conditionSlug = $cat->slug;
      }
    }
  }
    ?>

    <section class="singleContainer">
      <div class="Carousel productGallery" >
        <div class="galleryTitleContainer">
          <?php newSvg($tipo_1) ?>
          <h2 class="galleryTitle rowcol1"><?php echo the_title() . ', '  . $tipo ;?> </h2>
        </div>
        <?php $attachment_ids = $product->get_gallery_image_ids(); ?>

        <img class="Element productGalleryImg row2col1 lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="product gallery">
        <?php if($attachment_ids){$count=0; foreach( $attachment_ids as $attachment_id ) { ?>
        <img class="Element productGalleryImg row2col1 lazy"  data-url="<?php echo $image_link = wp_get_attachment_url( $attachment_id ); ?>" alt="product gallery">

          <?php $count++; }} ?>
          <div class="singleProductsgalleryBtnsContainer <?php if(!$attachment_ids){ echo "opacity0";} ?>">
            <button class="singleProductsGalleryBtns" id="nextButton" >
              <svg class="singleProductArrowSVG" width="14" height="25" viewBox="0 0 14 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2956 0L0 13109 12.3549L0 12.4142L12.2956 24.7098L13.7098 23.2956L2.76912 12.3549L13.7098 1.41421L12.2956 0Z" fill="black"/>
              </svg>
            </button>
            <button class="singleProductsGalleryBtns" id="prevButton">
              <svg class="singleProductArrowSVG" width="14" height="25" viewBox="0 0 14 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.41421 24.7098L13.7098 12.4142L13.6505 12.3549L13.7098 12.2956L1.41421 0L0 1.41421L10.9407 12.3549L0 23.2956L1.41421 24.7098Z" fill="black"/>
              </svg>
            </button>
          </div>
        </div>

        <div class="singleAtributes">
          <div class="containerAttribute">
              <p class="containerAttributeTitle">Alto:</p>
              <p class="containerAttributeTxt"><?php echo get_post_meta( get_the_id(), 'alto', true ); ?></p>
          </div>

          <div class="containerAttribute">
              <p class="containerAttributeTitle">Ancho:</p>
              <p class="containerAttributeTxt"><?php echo get_post_meta( get_the_id(), 'ancho', true ); ?></p>
          </div>

          <div class="containerAttribute">
              <p class="containerAttributeTitle">Largo:</p>
              <p class="containerAttributeTxt"><?php echo get_post_meta( get_the_id(), 'largo', true ); ?></p>
          </div>

          <div class="containerAttribute">
              <p class="containerAttributeTitle">Peso:</p>
              <p class="containerAttributeTxt"><?php echo get_post_meta( get_the_id(), 'peso', true ); ?></p>
          </div>

          <div class="containerAttribute">
              <p class="containerAttributeTitle">Tara:</p>
              <p class="containerAttributeTxt"><?php echo get_post_meta( get_the_id(), 'tara', true ); ?></p>
          </div>


          <button class="btn singleBuy" type="button" name="button">Adquirir</button>
        </div>
      </section>

      <section class="singleCategoryDescription">
        <h5 class="singleCategoryTitle">Características del contenedor</h5>

        <div class="categoryCard">
          <div class="containerAttributeTxt">
            <?php newSvg($sizeSlug) ?>
            <h6 class="containerAttributeName"><?php echo $size; ?></h6>
          </div>
          <p class="tumamiCaption"><?php echo get_term_by('slug', $sizeSlug, 'product_cat')->description; ?></p>
        </div>

        <div class="categoryCard">
          <div class="containerAttributeTxt">
            <?php newSvg($tipo_1) ?>
            <h6 class="containerAttributeName"><?php echo $tipo_1; ?></h6>
          </div>
          <p class="tumamiCaption"><?php echo get_term_by('slug', $tipo_1, 'product_cat')->description; ?></p>
        </div>

        <div class="categoryCard">
          <div class="containerAttributeTxt">
            <?php newSvg(strtoupper($tipo_2Slug)) ?>
            <h6 class="containerAttributeName"><?php echo $tipo_2; ?></h6>
          </div>
          <p class="tumamiCaption"><?php echo get_term_by('slug', $tipo_2Slug, 'product_cat')->description; ?></p>
        </div>

        <div class="categoryCard">
          <div class="containerAttributeTxt">
            <?php newSvg(strtoupper($conditionSlug)) ?>
            <h6 class="containerAttributeName"><?php echo $condition; ?></h6>
          </div>
          <p class="tumamiCaption"><?php echo get_term_by('slug', $conditionSlug, 'product_cat')->description; ?></p>
        </div>


      </section>


      <section class="theContent">
        <p class="content">
          <?php echo get_the_content(); ?>
        </p>
      </section>

      <section class="testimonialsSec sectionPadding">
        <h3 class="testimonialSecTitle brandColorTxt">CLIENTES SATISFECHOS</h3>
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
