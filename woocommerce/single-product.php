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
        <div class="arrowBtnContainer <?php if(!$attachment_ids){ echo "opacity0";} ?>">
          <button class="arrowBtn" id="nextButton" >
            <svg class="arrowSVG" width="106" height="106" viewBox="0 0 106 106" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <circle r="53" transform="matrix(-1 0 0 1 53 53)" fill="currentColor"/>
              <path d="M33.2028 50.8521C31.9953 52.0295 31.9953 53.9705 33.2028 55.1479L59.6556 80.9415C61.5562 82.7947 64.75 81.4481 64.75 78.7936L64.75 27.2064C64.75 24.5519 61.5562 23.2053 59.6556 25.0585L33.2028 50.8521Z" fill="white"/>
            </svg>
          </button>
          <button class="arrowBtn" id="prevButton">
            <svg class="arrowSVG" width="106" height="106" viewBox="0 0 106 106" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <circle cx="53" cy="53" r="53" fill="currentColor"/>
              <path d="M72.7972 50.8521C74.0047 52.0295 74.0047 53.9705 72.7972 55.1479L46.3444 80.9415C44.4438 82.7947 41.25 81.4481 41.25 78.7936L41.25 27.2064C41.25 24.5519 44.4438 23.2053 46.3444 25.0585L72.7972 50.8521Z" fill="white"/>
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
          <p class="containerClassCaption"><?php echo get_term_by('slug', $sizeSlug, 'product_cat')->description; ?></p>
        </div>

        <hr class="containerClassSeparator">

        <div class="categoryCard">
          <div class="containerAttributeTxt">
            <?php newSvg($tipo_1) ?>
            <h6 class="containerAttributeName"><?php echo $tipo_1; ?></h6>
          </div>
          <p class="containerClassCaption"><?php echo get_term_by('slug', $tipo_1, 'product_cat')->description; ?></p>
        </div>

        <hr class="containerClassSeparator">

        <div class="categoryCard">
          <div class="containerAttributeTxt">
            <?php newSvg(strtoupper($tipo_2Slug)) ?>
            <h6 class="containerAttributeName"><?php echo $tipo_2; ?></h6>
          </div>
          <p class="containerClassCaption"><?php echo get_term_by('slug', $tipo_2Slug, 'product_cat')->description; ?></p>
        </div>

        <hr class="containerClassSeparator">

        <div class="categoryCard">
          <div class="containerAttributeTxt">
            <?php newSvg(strtoupper($conditionSlug)) ?>
            <h6 class="containerAttributeName"><?php echo $condition; ?></h6>
          </div>
          <p class="containerClassCaption"><?php echo get_term_by('slug', $conditionSlug, 'product_cat')->description; ?></p>
        </div>


      </section>

      <hr class="containerClassSeparator">

      <section class="theContent">
        <p class="content">
          <?php echo get_the_content(); ?>
        </p>
      </section>

      <section class="testimonialsSec sectionPadding">
        <h3 class="testimonialSecTitle brandColorTxt">CLIENTES SATISFECHOS</h3>
        <div class="testimonialsContainer Carousel">
          <button class="arrowBtn" id="nextButton" >
            <svg class="arrowSVG" width="106" height="106" viewBox="0 0 106 106" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <circle r="53" transform="matrix(-1 0 0 1 53 53)" fill="currentColor"/>
              <path d="M33.2028 50.8521C31.9953 52.0295 31.9953 53.9705 33.2028 55.1479L59.6556 80.9415C61.5562 82.7947 64.75 81.4481 64.75 78.7936L64.75 27.2064C64.75 24.5519 61.5562 23.2053 59.6556 25.0585L33.2028 50.8521Z" fill="white"/>
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
          <button class="arrowBtn" id="prevButton">
            <svg class="arrowSVG" width="106" height="106" viewBox="0 0 106 106" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <circle cx="53" cy="53" r="53" fill="currentColor"/>
              <path d="M72.7972 50.8521C74.0047 52.0295 74.0047 53.9705 72.7972 55.1479L46.3444 80.9415C44.4438 82.7947 41.25 81.4481 41.25 78.7936L41.25 27.2064C41.25 24.5519 44.4438 23.2053 46.3444 25.0585L72.7972 50.8521Z" fill="white"/>
            </svg>
          </button>
        </div>

      </section>


    <?php } wp_reset_query(); ?>



    <?php get_footer(); ?>
