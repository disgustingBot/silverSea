<?php
get_header();

if ( ! defined( 'ABSPATH' ) ) { exit; }

while(have_posts()){the_post();
  global $woocommerce, $product, $post;
  include get_template_directory() . '/inc/getAtributes.php';
  ?>

  <section
    class="singleContainer"
    contenedor="true"
    data-code="<?php echo $code; ?>"
    data-size="<?php echo $sizeNumber; ?>"
    data-tip1="<?php echo $tipo_1; ?>"
    data-tip2="<?php echo strtoupper($tipo_2Slug); ?>"
    data-cond="<?php echo strtoupper($conditionSlug); ?>"
  >





  <?php if ( has_post_thumbnail()) : ?>
    <!-- <a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
        <?php // the_post_thumbnail(); ?>
    </a> -->
  <?php endif; ?>





    <div class="singleContainerTitle">
      <?php newSvg($tipo_1) ?>
      <h2 class="galleryTitle rowcol1"><?php echo the_title() . ', '  . $tipo_1 ;?> </h2>
    </div>
    <?php $attachment_ids = $product->get_gallery_image_ids(); ?>
    <div class="productGallery<?php if($attachment_ids){ echo " Carousel";} ?>" >

      <img class="Element productGalleryImg row2col1 lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="product gallery">
      <?php if($attachment_ids){$count=0; foreach( $attachment_ids as $attachment_id ) { ?>
      <img class="Element productGalleryImg row2col1 lazy"  data-url="<?php echo $image_link = wp_get_attachment_url( $attachment_id ); ?>" alt="product gallery">

      <?php $count++; }} ?>
      <?php if($attachment_ids){ ?>
        <div class="arrowBtnContainer">
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
      <?php } ?>
    </div>

    <div class="singleAtributes">
      <?php $metas = array('alto', 'ancho', 'largo', 'peso', 'tara');
      foreach($metas as $key=>$value){if(get_post_meta(get_the_id(),$value,true)){ ?>
        <div class="containerAttribute">
          <p class="containerAttributeTitle"><?php echo ucwords($value); ?></p>
          <p class="containerAttributeTxt"><?php echo get_post_meta( get_the_id(), $value, true ); ?></p>
        </div>
      <?php } } ?>

        <div class="cuantos Cuantos">
          <input class="cuantosQnt" id="cuantosQantity" type="text" value="1" min="1">
          <button class="cuantosBtn" id="cuantosMins">-</button>
          <button class="cuantosBtn" id="cuantosPlus">+</button>
        </div>
      <button class="btn singleBuy cardAdd" type="button" name="button">Agregar</button>
    </div>
  </section>

  <section class="singleCategoryDescription">
    <h5 class="singleCategoryTitle">Características del contenedor</h5>

    <section class="main"><?php the_content(); ?></section>

    <div class="categoryCard">
      <div class="categoryCardHeader">
        <?php newSvg($sizeSlug) ?>
        <h6 class="categoryCardTitle"><?php echo $size; ?></h6>
      </div>
      <p class="categoryCardCaption"><?php echo get_term_by('slug', $sizeSlug, 'product_cat')->description; ?></p>
    </div>

    <div class="containerClassSeparator"></div>

    <div class="categoryCard">
      <div class="categoryCardHeader">
        <?php newSvg($tipo_1) ?>
        <h6 class="categoryCardTitle"><?php echo $tipo_1; ?></h6>
      </div>
      <p class="categoryCardCaption"><?php echo get_term_by('slug', $tipo_1, 'product_cat')->description; ?></p>
    </div>

    <div class="containerClassSeparator"></div>

    <div class="categoryCard">
      <div class="categoryCardHeader">
        <?php newSvg(strtoupper($tipo_2Slug)) ?>
        <h6 class="categoryCardTitle"><?php echo $tipo_2; ?></h6>
      </div>
      <p class="categoryCardCaption"><?php echo get_term_by('slug', $tipo_2Slug, 'product_cat')->description; ?></p>
    </div>

    <div class="containerClassSeparator"></div>

    <div class="categoryCard">
      <div class="categoryCardHeader">
        <?php newSvg(strtoupper($conditionSlug)) ?>
        <h6 class="categoryCardTitle"><?php echo $condition; ?></h6>
      </div>
      <p class="categoryCardCaption"><?php echo get_term_by('slug', $conditionSlug, 'product_cat')->description; ?></p>
    </div>


    <div class="containerClassSeparator"></div>
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
