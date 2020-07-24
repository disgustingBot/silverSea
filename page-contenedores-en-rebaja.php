<?php get_header(); ?>

<div class="saleTopInteraction">
  <h2 class="saleTitle"><?php the_title(); ?></h2>
  <button class="btn saleBtn"><a href="<?php echo get_site_url() . '/buscar-contenedor-maritimo/'; ?>">Todos los contenedores</a></button>
</div>

<!-- <div class="archiveMain"> -->

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
  while ( $loop->have_posts() ) : $loop->the_post();
    include get_template_directory() . '/inc/getAtributes.php'; ?>
<article
        class="card"
        contenedor="true"
        data-code="<?php echo $code; ?>"
        data-size="<?php echo $sizeNumber; ?>"
        data-tip1="<?php echo $tipo_1; ?>"
        data-tip2="<?php echo strtoupper($tipo_2Slug); ?>"
        data-cond="<?php echo strtoupper($conditionSlug); ?>"
      >
        <div class="cardHead">
          <div class="cardThumbnail">
          <?php newSvg(ucwords($tipo_1Slug)); ?>
          </div>
          <h4 class="cardTitle"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
          <p class="cardSubTitle"><a href="<?php echo get_permalink(); ?>"><?php echo $tipo_2 . ', ' . $condition ?></a></p>
        </div>
        <?php $attachment_ids = $product->get_gallery_image_ids(); ?>


        <div class="cardMedia<?php if($attachment_ids){ echo ' Carousel'; } ?>">

          <a class="cardImgA Element" href="<?php echo get_permalink(); ?>">
            <img class="productGalleryImg lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="product gallery">
          </a>

          <?php if($attachment_ids){$count=0; foreach( $attachment_ids as $attachment_id ) { ?>
            <a class="cardImgA Element" href="<?php echo get_permalink(); ?>">
              <img class="productGalleryImg lazy"  data-url="<?php echo $image_link = wp_get_attachment_url( $attachment_id ); ?>" alt="product gallery">
            </a>
          <?php $count++; }} ?>

          <?php if($attachment_ids){ ?>
            <button class="arrowBtn arrowButtonNext rowcol1" id="nextButton">
              <svg class="arrowSVG" width="106" height="106" viewBox="0 0 106 106" fill="currentColor" xmlns="https://www.w3.org/2000/svg">
                <circle cx="53" cy="53" r="53" fill="currentColor"/>
                <path d="M72.7972 50.8521C74.0047 52.0295 74.0047 53.9705 72.7972 55.1479L46.3444 80.9415C44.4438 82.7947 41.25 81.4481 41.25 78.7936L41.25 27.2064C41.25 24.5519 44.4438 23.2053 46.3444 25.0585L72.7972 50.8521Z" fill="white"/>
              </svg>
            </button>
            <button class="arrowBtn arrowButtonPrev rowcol1" id="prevButton">
              <svg class="arrowSVG" width="106" height="106" viewBox="0 0 106 106" fill="currentColor" xmlns="https://www.w3.org/2000/svg">
                <circle r="53" transform="matrix(-1 0 0 1 53 53)" fill="currentColor"/>
                <path d="M33.2028 50.8521C31.9953 52.0295 31.9953 53.9705 33.2028 55.1479L59.6556 80.9415C61.5562 82.7947 64.75 81.4481 64.75 78.7936L64.75 27.2064C64.75 24.5519 61.5562 23.2053 59.6556 25.0585L33.2028 50.8521Z" fill="white"/>
              </svg>
            </button>
          <?php } ?>
        </div>

        <div class="cardCaption">

          <div class="cardFeatures">
            <?php if ($categories) {
              newSvg($sizeSlug);
              newSvg(ucwords($tipo_1Slug));
              newSvg(strtoupper($tipo_2Slug));
              newSvg(strtoupper($conditionSlug));
            } ?>
          </div>

          <div class="cardActions">
            <div class="cuantos Cuantos">
              <input class="cuantosQnt cuantosQantity" type="text" value="1" min="1">
              <button class="cuantosBtn cuantosMins">-</button>
              <button class="cuantosBtn cuantosPlus">+</button>
            </div>
            <button class="cardAdd btn btnSimple">AGREGAR</button>
          </div>
        </div>

      </article>
    <?php
  endwhile;
} else {
  echo __( 'No products found' );
}
wp_reset_postdata(); ?>
  </section>
<!-- </div> -->

<?php get_footer() ;?>
