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
    data-tip1="<?php echo ucfirst($tipo_1Slug); ?>"
    data-tip2="<?php echo strtoupper($tipo_2Slug); ?>"
    data-cond="<?php echo strtoupper($conditionSlug); ?>"
  >




    <hgroup class="divided_textgroup singleContainerTitle">
      <h1 class="divided_textgroup_title">
        <?php newSvg($tipo_1) ?>
        Contenedor marítimo de <?php echo the_title() . ', '  . $tipo_1 ;?>
        <div class="textgroup_divider"></div>
      </h1>
      <h2 class="divided_textgroup_subtitle"><?php the_content(); ?></h2>
    </hgroup>
    <?php $attachment_ids = $product->get_gallery_image_ids(); ?>
    <div class="productGallery<?php if($attachment_ids){ echo " Carousel";} ?>" >

      <?php
      $config = array(
        'id' => get_post_thumbnail_id(get_the_ID()),
        'class' => 'Element productGalleryImg row2col1',
        'height' => 400,
        'width' => 600,
        'sizes' => [['768', '98']],
        'default_size' => '65',
      );
      responsive_img($config);

      if($attachment_ids){foreach( $attachment_ids as $attachment_id ) {

        $config = array(
          'id' => $attachment_id,
          'class' => 'Element productGalleryImg row2col1',
          'height' => 400,
          'width' => 600,
          'sizes' => [['768', '98']],
          'default_size' => '65',
        );
        responsive_img($config);
       }} ?>

      <?php if($attachment_ids){ ?>
        <div class="arrowBtnContainer">
          <button class="arrowBtn NextButton" id="nextButton" >
            <svg class="arrowSVG" width="106" height="106" viewBox="0 0 106 106" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <circle r="53" transform="matrix(-1 0 0 1 53 53)" fill="currentColor"/>
              <path d="M33.2028 50.8521C31.9953 52.0295 31.9953 53.9705 33.2028 55.1479L59.6556 80.9415C61.5562 82.7947 64.75 81.4481 64.75 78.7936L64.75 27.2064C64.75 24.5519 61.5562 23.2053 59.6556 25.0585L33.2028 50.8521Z" fill="white"/>
            </svg>
          </button>
          <button class="arrowBtn PrevButton" id="prevButton">
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
          <p class="containerAttributeTxt"><?php echo get_post_meta( get_the_id(), $value, true ); ?>m</p>
        </div>
      <?php } } ?>

        <div class="cuantos Cuantos">
          <input class="cuantosQnt cuantosQantity" type="text" value="1" min="1">
          <button class="cuantosBtn cuantosMins">-</button>
          <button class="cuantosBtn cuantosPlus">+</button>
        </div>
      <button class="btn singleBuy cardAdd" type="button" name="button">Agregar</button>
    </div>
  </section>

  <section class="singleCategoryDescription">
    <h5 class="singleCategoryTitle">Características del contenedor</h5>

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
        <?php newSvg(ucfirst($tipo_1Slug)); ?>
        <h6 class="categoryCardTitle"><?php echo $tipo_1; ?></h6>
      </div>
      <p class="categoryCardCaption"><?php echo get_term_by('slug', $tipo_1Slug, 'product_cat')->description; ?></p>
    </div>

    <div class="containerClassSeparator"></div>

    <div class="categoryCard">
      <div class="categoryCardHeader">
        <?php newSvg(strtoupper($tipo_2Slug)); ?>
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
      <button class="arrowBtn NextButton" id="nextButton" >
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
      <button class="arrowBtn PrevButton" id="prevButton">
        <svg class="arrowSVG" width="106" height="106" viewBox="0 0 106 106" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <circle cx="53" cy="53" r="53" fill="currentColor"/>
          <path d="M72.7972 50.8521C74.0047 52.0295 74.0047 53.9705 72.7972 55.1479L46.3444 80.9415C44.4438 82.7947 41.25 81.4481 41.25 78.7936L41.25 27.2064C41.25 24.5519 44.4438 23.2053 46.3444 25.0585L72.7972 50.8521Z" fill="white"/>
        </svg>
      </button>
    </div>

  </section>


<?php } wp_reset_query(); ?>
<?php get_footer(); ?>
