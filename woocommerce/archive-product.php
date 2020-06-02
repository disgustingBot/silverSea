<?php get_header(); ?>

<?php global $product; ?>

<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( wc_get_page_id( 'shop' ) ), 'full' );?>



  <?php function woocommerce_subcats_from_parentcat($category){
    if (is_numeric($category)) {$term = get_term(           $category, 'product_cat');}
    else                       {$term = get_term_by('slug', $category, 'product_cat');}



    	if (isset($_GET[$category])) {
        // var_dump($_GET[$category]);
    		$parentArray = $_GET[$category];
    	  // foreach ($parentArray as $key => $value) {
  			$wp_query['query']['tax_query'][$key] = array(
  				'taxonomy' => 'product_cat',
  				'field'    => 'slug',
  				'terms'    => $parentArray,
  			);
    	  // }
    	}


    $args = array(
     'hierarchical' => 1,
     'show_option_none' => '',
     'hide_empty' => 0,
     'parent' => $term->term_id,
     'taxonomy' => 'product_cat'
    );
    $subcats = get_categories($args); ?>


    <div class="selectBox<?php if(isset($_GET[$term->slug])){ echo ' alt'; } ?>" tabindex="1" id="selectBox<?php echo $term->term_id; ?>">
      <div class="selectBoxButton" onclick="altClassFromSelector('focus', '#selectBox<?php echo $term->term_id; ?>')">
        <p class="selectBoxPlaceholder"><?php echo $term->name; ?></p>
        <p class="selectBoxCurrent" id="selectBoxCurrent<?php echo $term->term_id; ?>">
          <?php if(isset($_GET[$term->slug])){ echo $_GET[$term->slug]; } ?>
        </p>
      </div>
      <div class="selectBoxList">
        <label for="nul<?php echo $term->term_id; ?>" class="selectBoxOption">
          <input
            class="selectBoxInput"
            id="nul<?php echo $term->term_id; ?>"
            type="radio"
            data-slug="0"
            data-parent="<?php echo $term->slug; ?>"
            name="filter_<?php echo $term->slug; ?>"
            onclick="selectBoxControler('','#selectBox<?php echo $term->term_id; ?>','#selectBoxCurrent<?php echo $term->term_id; ?>')"
            value="0"
            <?php if(!isset($_GET[$term->slug])){ ?>
              checked
            <?php } ?>
          >
          <!-- <span class="checkmark"></span> -->
          <p class="colrOptP"></p>
        </label>
        <?php foreach ($subcats as $sc) { ?>

              <!-- <div class="absolute" style="position:absolute">
                <?php
                var_dump($sc);
                ?>
              </div> -->
          <label for="<?php echo $sc->slug; ?>" class="selectBoxOption">
            <input
              class="selectBoxInput"
              id="<?php echo $sc->slug; ?>"
              data-slug="<?php echo $sc->slug; ?>"
              data-parent="<?php echo $term->slug; ?>"
              type="radio"
              name="filter_<?php echo $term->slug; ?>"
              onclick="selectBoxControler('<?php echo $sc->name ?>', '#selectBox<?php echo $term->term_id; ?>', '#selectBoxCurrent<?php echo $term->term_id; ?>')"
              value="<?php echo $sc->slug; ?>"
              <?php if(isset($_GET[$term->slug]) && $_GET[$term->slug] == $sc->slug){ ?>
                checked
              <?php } ?>
            >
            <!-- <span class="checkmark"></span> -->
            <p class="colrOptP"><?php echo $sc->name ?></p>
          </label>
        <?php } ?>
      </div>
    </div>
  <?php } ?>

<section class="archiveTopInteraction">
  <button class="hideFilter hideFilterBtn" onclick="altClassFromSelector('alt','.archiveFilter2');altClassFromSelector('alt','.hideFilter');altClassFromSelector('alt','.archiveMain')">
    <svg width="40" height="62" viewBox="0 0 40 62" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M32.0908 16H6.9097C4.3281 16 3.02556 19.1537 4.85468 20.9954L14.6562 30.8679V41.3609V47H24.3438V44.3277V30.8679L34.1459 20.9954C35.9713 19.1574 34.6776 16 32.0908 16ZM21.4375 29.6559V44.2871L17.5625 44.3277V29.6559L6.90625 18.9263H32.0938L21.4375 29.6559Z" fill="black"/>
      <g class="filterArrow">
        <path class="arrowBotStick" d="M9.625 56.875L35.4583 56.875L35.4583 53L9.625 53L9.625 56.875Z" fill="#0674BB"/>
        <path class="pointerArrow" d="M10.4583 60.625L10.4583 49L4 54.8125L10.4583 60.625Z" fill="#0674BB"/>
      </g>
    </svg>
    <p class="archiveTopInteractTitle"><span class="hideWord">Hide</span> filters</p>
  </button>
  <div class="byeByeBtn">
    <button class="btn">CONTENEDORES EN REBAJA</button>
    <button class="btn">Finalizar cotización</button>
  </div>
</section>

<div class="archiveMain">
  <div class="archiveFilter2">
    <h2 class="encuentraContenedorTitle brandColorTxt">Cotiza tu contenedor</h2>

    <?php woocommerce_subcats_from_parentcat('size'); ?>


    <?php woocommerce_subcats_from_parentcat('dry'); ?>
    <?php woocommerce_subcats_from_parentcat('reefer'); ?>
    <?php woocommerce_subcats_from_parentcat('special'); ?>


    <?php woocommerce_subcats_from_parentcat('condition'); ?>

  </div>










<section class="searchResultsCont" id="postCont">
    <?php while(have_posts()){the_post();
      $categories = get_the_terms( get_the_ID(), 'product_cat' );
      // FIND OUT WHICH CARACTERISTICS
      if ($categories) {
        // for each category
        foreach ($categories as $cat) {
          $parent=get_term_by('id', $cat->parent, 'product_cat', 'ARRAY_A');
          $grandParent=get_term_by('id', $parent['parent'], 'product_cat', 'ARRAY_A');

          if ($parent['slug']=="size") {
            $size = $cat->name;
            $sizeSlug = $cat->slug;
            $sizeNumber = preg_replace("/[^0-9]/", "", $sizeSlug );
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
          $code = $sizeNumber . strtoupper($tipo_2Slug) . ' ' . strtoupper($conditionSlug);
        }
      }
      // fin de comentario
      ?>
      <article
        class="card"
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
              <svg class="arrowSVG" width="106" height="106" viewBox="0 0 106 106" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <circle cx="53" cy="53" r="53" fill="currentColor"/>
                <path d="M72.7972 50.8521C74.0047 52.0295 74.0047 53.9705 72.7972 55.1479L46.3444 80.9415C44.4438 82.7947 41.25 81.4481 41.25 78.7936L41.25 27.2064C41.25 24.5519 44.4438 23.2053 46.3444 25.0585L72.7972 50.8521Z" fill="white"/>
              </svg>
            </button>
            <button class="arrowBtn arrowButtonPrev rowcol1" id="prevButton">
              <svg class="arrowSVG" width="106" height="106" viewBox="0 0 106 106" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
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
            <div class="cuantos">
              <input class="cuantosQnt" id="cuantosQantity" type="text" value="1" min="1">
              <button class="cuantosBtn" onclick="changeQuantity(-1)">-</button>
              <button class="cuantosBtn" onclick="changeQuantity(+1)">+</button>
            </div>
            <a class="btn btnSimple" href="<?php echo get_permalink(); ?>">VER DETALLES</a>
            <?php $selector = '.card[data-code="'.$code.'"]'; ?>
            <button class="cardAdd btn btnSimple">AGREGAR</button>
          </div>
        </div>

      </article>
    <?php } ?>
  </section>
</div>



<?php get_footer() ;?>
