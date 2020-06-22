<?php get_header(); ?>



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


    <div class="SelectBox<?php if(isset($_GET[$term->slug])){ echo ' alt'; } ?>" tabindex="1" id="selectBox<?php echo $term->term_id; ?>">
      <div class="selectBoxButton" onclick="altClassFromSelector('focus', '#selectBox<?php echo $term->term_id; ?>')">
      <!-- <div class="selectBoxButton"> -->
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

<div class="archiveTopInteraction">
  <div class="byeByeBtn">
    <button class="btn">CONTENEDORES EN REBAJA</button>
    <button class="btn" onclick="altClassFromSelector('alt', '#finalizarConsulta')">Finalizar cotización</button>
  </div>
</div>

<div class="archiveMain">
    <div class="archiveFilters">
      <div class="archiveFiltersHeader onlyDesktopF" onclick="altClassFromSelector('alt','.archiveMain')">
        <svg class="filtersLogo" viewBox="0 0 40 62" fill="none" xmlns="https://www.w3.org/2000/svg">
          <path d="M32.0908 16H6.9097C4.3281 16 3.02556 19.1537 4.85468 20.9954L14.6562 30.8679V41.3609V47H24.3438V44.3277V30.8679L34.1459 20.9954C35.9713 19.1574 34.6776 16 32.0908 16ZM21.4375 29.6559V44.2871L17.5625 44.3277V29.6559L6.90625 18.9263H32.0938L21.4375 29.6559Z" fill="white"/>
          <g class="filterArrow">
            <path class="arrowBotStick" d="M9.625 56.875L35.4583 56.875L35.4583 53L9.625 53L9.625 56.875Z" fill="#ecc800"/>
            <path class="pointerArrow" d="M10.4583 60.625L10.4583 49L4 54.8125L10.4583 60.625Z" fill="#ecc800"/>
          </g>
        </svg>
        <p class="archiveFiltersHeaderTitle"><span class="hideWords">Hide filters</span></p>
      </div>

      <div class="archiveFiltersBody">
        <h2 class="encuentraContenedorTitle brandColorTxt">Cotiza tu contenedor</h2>

        <?php woocommerce_subcats_from_parentcat('size'); ?>


        <?php woocommerce_subcats_from_parentcat('dry'); ?>
        <?php woocommerce_subcats_from_parentcat('reefer'); ?>
        <?php woocommerce_subcats_from_parentcat('special'); ?>


        <?php woocommerce_subcats_from_parentcat('condition'); ?>

      </div>
    </div>










  <section class="searchResultsCont" id="postCont">
    <?php while(have_posts()){the_post();
      global $product;

      include get_template_directory() . '/inc/getAtributes.php';

      ?>
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
              <input class="cuantosQnt" id="cuantosQantity" type="text" value="1" min="1">
              <button class="cuantosBtn" id="cuantosMins">-</button>
              <button class="cuantosBtn" id="cuantosPlus">+</button>
            </div>
            <a class="btn btnSimple" href="<?php echo get_permalink(); ?>">VER DETALLES</a>
            <button class="cardAdd btn btnSimple">AGREGAR</button>
          </div>
        </div>

      </article>
    <?php } ?>
    <?php echo ajax_paginator(get_pagenum_link()); ?>
  </section>
</div>

<div class="filterQuestionsActivatorCont">
  <p class="filterQuestionActP">¿No sabes que contenedor necesitas?</p>
  <svg class="pointingHand" width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="https://www.w3.org/2000/svg">
    <path d="M22.3529 5.64029C22.665 5.64029 22.9642 5.76156 23.1848 5.97743C23.4055 6.1933 23.5294 6.48608 23.5294 6.79137C23.5294 7.09665 23.4055 7.38943 23.1848 7.6053C22.9642 7.82117 22.665 7.94245 22.3529 7.94245H17.0941L16.9412 9.33525L14.3529 15.0216C14.1176 15.5971 13.4941 16 12.7765 16H7.64706C6.70588 16 5.88235 15.1597 5.88235 14.2734V6.79137C5.88235 6.34245 6.07059 5.93957 6.38823 5.64029L11.3294 0L12.2353 0.851799C12.4706 1.0705 12.6118 1.36978 12.6118 1.7036L12.5765 1.95683L10.5882 5.64029H22.3529ZM0 16V6.79137H3.52941V16H0Z" fill="white"/>
  </svg>
  <span class="filterQuestionsActivator" onclick="altClassFromSelector('visible','.filterQuestionsCont')">Pincha aquí</span>
</div>

<form class="filterQuestionsCont">
  <p class="closeQuestions" onclick="altClassFromSelector('visible','.filterQuestionsCont')"><strong>+</strong></p>
  <div class="filterSingleQuestCont">
    <p class="filterQuestion"><strong>¿Para que estás buscando un contenedor?</strong></p>
    <div class="filterAnswerCont">
      <input type="radio" id="asis" name="question1" value="storage-new">
      <label for="asis">Para almacenar o modificarlo</label>
    </div>
    <div class="filterAnswerCont">
      <input type="radio" id="export" name="question1" value="cargo-dry">
      <label for="export">Para exportar mercadería</label>
    </div>
    <div class="filterAnswerCont">
      <input type="radio" id="reefer" name="question1" value="reefer">
      <label for="reefer">Para productos que requieren refrigeración.</label>
    </div>
  </div>
  <div class="filterSingleQuestCont">
    <p class="filterQuestion"><strong>¿De que tamaño lo necesitas?</strong></p>
    <div class="filterAnswerCont">
      <input type="radio" id="pies20" name="question2" value="20DC">
      <label for="pies20">Seis metros de largo por 2 y medio de ancho</label>
    </div>
    <div class="filterAnswerCont">
      <input type="radio" id="pies40" name="question2" value="40DC-40HC">
      <label for="pies40">12 metros de largo por 2 y medio de ancho</label>
    </div>
    <div class="filterAnswerCont">
      <input type="radio" id="otres" name="question2" value="no-40DC-40HC">
      <label for="otres">Otras medidas</label>
    </div>
  </div>

  <button class="btn">Filtrar contenedores</button>
</form>

<?php get_footer() ;?>
