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



<!--
<div class="coprAlqui">
  <div class="sladRadio">
    <input class="sladRadioInput" onchange="accordionSelector('#destino')" type="radio" id="euro" name="a10" value="euro" checked>
    <label class="sladRadioLabel" for="euro">COMPRAR</label>
    <input class="sladRadioInput" onchange="accordionSelector('#destino')" type="radio" id="dollar" name="a10" value="dollar">
    <div class="sladRadioSignal"></div>
    <label class="sladRadioLabel" for="dollar">ALQUILAR</label><br>
  </div>

  <div class="coprAlquiLocation">
    <h4 class="coprAlquiLocationTitle">Origen</h4>


    <div class="selectBox" tabindex="1" id="selectBoxOrigenCountry">
      <div class="selectBoxButton">
        <p class="selectBoxPlaceholder">Pais</p>
        <p class="selectBoxCurrent" id="selectBoxCurrentOrigenCountry"></p>
      </div>
      <div class="selectBoxList">
        <label for="nulOrigenCountry" class="selectBoxOption">
          <input
          class="selectBoxInput"
          id="nulOrigenCountry"
          type="radio"
          data-slug="0"
          data-parent="city"
          name="filter_city"
          onclick="selectBoxControler('','#selectBoxOrigenCountry','#selectBoxCurrentOrigenCountry')"
          value="0"
          >

          <p class="colrOptP"></p>
        </label>
        <label for="barcelona" class="selectBoxOption">
          <input
          class="selectBoxInput"
          id="barcelona"
          data-slug="barcelona"
          data-parent="city"
          type="radio"
          name="filter_city"
          onclick="selectBoxControler('Barcelona', '#selectBoxOrigenCountry', '#selectBoxCurrentOrigenCountry')"
          value="barcelona"
          >

          <p class="colrOptP">España</p>
        </label>
      </div>
    </div>


    <div class="selectBox" tabindex="1" id="selectBoxOrigenCity">
      <div class="selectBoxButton">
        <p class="selectBoxPlaceholder">Ciudad</p>
        <p class="selectBoxCurrent" id="selectBoxCurrentOrigenCity"></p>
      </div>
      <div class="selectBoxList">
        <label for="nulOrigenCity" class="selectBoxOption">
          <input
          class="selectBoxInput"
          id="nulOrigenCity"
          type="radio"
          data-slug="0"
          data-parent="city"
          name="filter_city"
          onclick="selectBoxControler('','#selectBoxOrigenCity','#selectBoxCurrentOrigenCity')"
          value="0"
          >

          <p class="colrOptP"></p>
        </label>
        <label for="barcelona" class="selectBoxOption">
          <input
          class="selectBoxInput"
          id="barcelona"
          data-slug="barcelona"
          data-parent="city"
          type="radio"
          name="filter_city"
          onclick="selectBoxControler('Barcelona', '#selectBoxOrigenCity', '#selectBoxCurrentOrigenCity')"
          value="barcelona"
          >

          <p class="colrOptP">Barcelona</p>
        </label>
      </div>
    </div>
  </div>




  <div class="coprAlquiLocation Accordion" id="destino">
    <h4 class="coprAlquiLocationTitle">Destino</h4>


    <div class="selectBox" tabindex="1" id="selectBoxOrigenCountry">
      <div class="selectBoxButton">
        <p class="selectBoxPlaceholder">Pais</p>
        <p class="selectBoxCurrent" id="selectBoxCurrentOrigenCountry"></p>
      </div>
      <div class="selectBoxList">
        <label for="nulOrigenCountry" class="selectBoxOption">
          <input
          class="selectBoxInput"
          id="nulOrigenCountry"
          type="radio"
          data-slug="0"
          data-parent="city"
          name="filter_city"
          onclick="selectBoxControler('','#selectBoxOrigenCountry','#selectBoxCurrentOrigenCountry')"
          value="0"
          >

          <p class="colrOptP"></p>
        </label>
        <label for="barcelona" class="selectBoxOption">
          <input
          class="selectBoxInput"
          id="barcelona"
          data-slug="barcelona"
          data-parent="city"
          type="radio"
          name="filter_city"
          onclick="selectBoxControler('Barcelona', '#selectBoxOrigenCountry', '#selectBoxCurrentOrigenCountry')"
          value="barcelona"
          >

          <p class="colrOptP">España</p>
        </label>
      </div>
    </div>


    <div class="selectBox" tabindex="1" id="selectBoxOrigenCity">
      <div class="selectBoxButton">
        <p class="selectBoxPlaceholder">Ciudad</p>
        <p class="selectBoxCurrent" id="selectBoxCurrentOrigenCity"></p>
      </div>
      <div class="selectBoxList">
        <label for="nulOrigenCity" class="selectBoxOption">
          <input
          class="selectBoxInput"
          id="nulOrigenCity"
          type="radio"
          data-slug="0"
          data-parent="city"
          name="filter_city"
          onclick="selectBoxControler('','#selectBoxOrigenCity','#selectBoxCurrentOrigenCity')"
          value="0"
          >
          <p class="colrOptP"></p>
        </label>
        <label for="barcelona" class="selectBoxOption">
          <input
          class="selectBoxInput"
          id="barcelona"
          data-slug="barcelona"
          data-parent="city"
          type="radio"
          name="filter_city"
          onclick="selectBoxControler('Barcelona', '#selectBoxOrigenCity', '#selectBoxCurrentOrigenCity')"
          value="barcelona"
          >
          <p class="colrOptP">Barcelona</p>
        </label>
      </div>
    </div>
  </div>
</div> -->






<!--
<section class="questionaryFilter">
  <h3 class="questionaryTitle"><nobr>Need Help?</nobr></h3>
  <button class="questionaryButton">
    <svg class="singleProductArrowSVG" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M18.5455 21.18L9.77992 12L18.5455 2.82L15.8469 0L4.36365 12L15.8469 24L18.5455 21.18Z" fill="currentColor"/>
    </svg>
  </button>
</section> -->

<section class="archiveTopInteraction">
  <button class="hideFilter hideFilterBtn" onclick="altClassFromSelector('alt','.archiveFilter2');altClassFromSelector('alt','.hideFilter');altClassFromSelector('alt','.archiveMain')">
    <svg width="40" height="62" viewBox="0 0 40 62" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M32.0908 16H6.9097C4.3281 16 3.02556 19.1537 4.85468 20.9954L14.6562 30.8679V41.3609V47H24.3438V44.3277V30.8679L34.1459 20.9954C35.9713 19.1574 34.6776 16 32.0908 16ZM21.4375 29.6559V44.2871L17.5625 44.3277V29.6559L6.90625 18.9263H32.0938L21.4375 29.6559Z" fill="black"/>
      <!-- <path class="arrowTopStick" d="M32.8335 9.875L7.00016 9.875L7.00016 6L32.8335 6L32.8335 9.875Z" fill="#0674BB"/> -->
      <g class="filterArrow">
        <path class="arrowBotStick" d="M9.625 56.875L35.4583 56.875L35.4583 53L9.625 53L9.625 56.875Z" fill="#0674BB"/>
        <path class="pointerArrow" d="M10.4583 60.625L10.4583 49L4 54.8125L10.4583 60.625Z" fill="#0674BB"/>
      </g>
    </svg>
    <p class="archiveTopInteractTitle">Filter</p>
  </button>
  <div class="finalbuttons">
    <button class="btn">CONTENEDORES EN REBAJA</button>
    <button class="btn">Finalizar Compra</button>
  </div>
</section>

<div class="archiveMain">
  <div class="archiveFilter2">

    <?php woocommerce_subcats_from_parentcat('size'); ?>


    <?php woocommerce_subcats_from_parentcat('dry'); ?>
    <?php woocommerce_subcats_from_parentcat('reefer'); ?>
    <?php woocommerce_subcats_from_parentcat('special'); ?>


    <?php woocommerce_subcats_from_parentcat('condition'); ?>


    <!-- <div class="filter">
      <h3 class="filterTitle"><nobr>Categoría</nobr></h3>
      <div class="filterList">
        <div class="filterTipo">
          <li class="filterTipoItem">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#Reefer" id="dynamicContLogo"></use>
            </svg>
          <label for="">Refrigerado</label>
          </li>
          <li class="filterTipoItem">
            <input type="checkbox" name="" value="">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#RF" id="dynamicContLogo"></use>
            </svg>
            <label for="">Standard</label>
          </li>
          <li class="filterTipoItem">
            <input type="checkbox" name="" value="">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#RH" id="dynamicContLogo"></use>
            </svg>
            <label for="">HighCube</label>
          </li>
        </div>
        <div class="filterTipo">
          <li class="filterTipoItem">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#Dry" id="dynamicContLogo"></use>
            </svg>
          <label for="">Seco</label>
          </li>
          <li class="filterTipoItem">
            <input type="checkbox" name="" value="">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#DC" id="dynamicContLogo"></use>
            </svg>
            <label for="">Standard</label>

          </li>
          <li class="filterTipoItem">
            <input type="checkbox" name="" value="">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#HC" id="dynamicContLogo"></use>
            </svg>
            <label for="">HighCube</label>
          </li>
          <li class="filterTipoItem">
            <input type="checkbox" name="" value="">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#HCPW" id="dynamicContLogo"></use>
            </svg>
            <label for="">HighCube PaletWide</label>
          </li>
        </div>
        <div class="filterTipo">
          <li class="filterTipoItem">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#Special" id="dynamicContLogo"></use>
            </svg>
          <label for="">Especial</label>
          </li>
          <li class="filterTipoItem">
            <input type="checkbox" name="" value="">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#FR" id="dynamicContLogo"></use>
            </svg>
            <label for="">Flat Rack</label>
          </li>
          <li class="filterTipoItem">
            <input type="checkbox" name="" value="">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#OT" id="dynamicContLogo"></use>
            </svg>
            <label for="">Open Top</label>
          </li>
          <li class="filterTipoItem">
            <input type="checkbox" name="" value="">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#OS" id="dynamicContLogo"></use>
            </svg>
            <label for="">Open Side</label>
          </li>
          <li class="filterTipoItem">
            <input type="checkbox" name="" value="">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#DCDD" id="dynamicContLogo"></use>
            </svg>
            <label for="">Double Door</label>
          </li>
          <li class="filterTipoItem">
            <input type="checkbox" name="" value="">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#HCDD" id="dynamicContLogo"></use>
            </svg>
            <label for="">HighCube Double Door</label>
          </li>
          <li class="filterTipoItem">
            <input type="checkbox" name="" value="">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#OS" id="dynamicContLogo"></use>
            </svg>
            <label for="">Open Side</label>
          </li>
          <li class="filterTipoItem">
            <input type="checkbox" name="" value="">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#TK" id="dynamicContLogo"></use>
            </svg>
            <label for="">Tank</label>
          </li>
        </div>

      </div>
      <div class="filterAll">
        <input type="checkbox" name="selectAll" value="">
        <label for="selectAll">Seleccionar todo</label>
      </div>
    </div> -->

    <!-- <div class="filter">
      <h3 class="filterTitle">Condición</h3>
      <ul class="filterList">
        <li class="filterItem">
          <input type="checkbox">
          <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <use xlink:href="#NEW" id="dynamicContLogo"></use>
          </svg>
          <label for="">Nuevo | New</label>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <use xlink:href="#CW" id="dynamicContLogo"></use>
          </svg>
          <label for="">Carga | Cargo Worthy</label>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <use xlink:href="#IICL" id="dynamicContLogo"></use>
          </svg>
          <label for="">Carga | Cargo Worthy IICL</label>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <use xlink:href="#RH" id="dynamicContLogo"></use>
          </svg>
          <label for="">Almacenaje | Modificación </label>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <use xlink:href="#SCRAP" id="dynamicContLogo"></use>
          </svg>
          <label for="">Chatarra | Scrap </label>
        </li>
      </ul>
      <div class="filterAll">
        <input type="checkbox" name="selectAll" value="">
        <label for="selectAll">Seleccionar todo</label>
      </div>
    </div> -->

    <!-- <div class="filter">
      <h3 class="filterTitle">Tamaño</h3>
      <ul class="filterList size">
        <li class="filterItem">
          <input type="checkbox" class="css-checkbox">
          <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <use xlink:href="#pies6" id="dynamicContLogo"></use>
          </svg>
          <label for="">6 PIES</label>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <use xlink:href="#pies8" id="dynamicContLogo"></use>
          </svg>
          <label for="">8 PIES</label>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <use xlink:href="#pies10" id="dynamicContLogo"></use>
          </svg>
          <label for="">10 PIES</label>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <use xlink:href="#pies20" id="dynamicContLogo"></use>
          </svg>
          <label for="">20 PIES</label>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <use xlink:href="#pies40" id="dynamicContLogo"></use>
          </svg>
          <label for="">40 PIES</label>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <use xlink:href="#pies45" id="dynamicContLogo"></use>
          </svg>
          <label for="">45 PIES</label>
        </li>
      </ul>
      <div class="filterAll">
        <input type="checkbox" name="selectAll" value="">
        <label for="selectAll">Seleccionar todo</label>
      </div>
    </div> -->


    <!-- <button class="hideFilter" onclick="altClassFromSelector('alt','.archiveFilter2');altClassFromSelector('alt','.hideFilter');altClassFromSelector('alt','.archiveMain')">
      <svg width="31" height="56" viewBox="0 0 31 56" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M2 2L28 28L2 54" stroke="black" stroke-width="4"/>
      </svg>
    </button> -->
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
      // fin de comentario
      ?>
      <article class="card">

        <div class="cardHead">
          <div class="cardThumbnail">
            <?php newSvg(ucwords($tipo_1Slug)); ?>
          </div>
          <h4 class="cardTitle"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
          <p class="cardSubTitle"><?php echo $tipo_2 . ', ' . $condition ?></p>
        </div>

        <div class="cardMedia Carousel" href="<?php echo get_permalink(); ?>" >

          <?php $attachment_ids = $product->get_gallery_attachment_ids(); ?>
          <a class="cardImgA Element" href="<?php echo get_permalink(); ?>">
            <img class="productGalleryImg lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="product gallery">
          </a>

          <?php if($attachment_ids){$count=0; foreach( $attachment_ids as $attachment_id ) { ?>
            <a class="cardImgA Element" href="<?php echo get_permalink(); ?>">
              <img class="productGalleryImg lazy"  data-url="<?php echo $image_link = wp_get_attachment_url( $attachment_id ); ?>" alt="product gallery">
            </a>
          <?php $count++; }} ?>

            <button class="arrowButton arrowButtonNext rowcol1" id="nextButton" >
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 21.18L14.2713 12L5 2.82L7.85425 0L20 12L7.85425 24L5 21.18Z" fill="currentColor"/>
              </svg>
            </button>
            <button class="arrowButton arrowButtonPrev rowcol1" id="prevButton">
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M18.5455 21.18L9.77992 12L18.5455 2.82L15.8469 0L4.36365 12L15.8469 24L18.5455 21.18Z" fill="currentColor"/>
              </svg>
            </button>
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
            <a class="btn btnSimple" href="<?php echo get_permalink(); ?>">VER DETALLES</a>
            <div class="cuantos">
              <input class="cuantosQnt" id="cuantosQantity" type="number" value="1" min="1">
              <button class="cuantosBtn" onclick="changeQuantity(-1)">-</button>
              <button class="cuantosBtn" onclick="changeQuantity(+1)">+</button>
            </div>
            <button class="btn btnSimple">AGREGAR</button>
          </div>
        </div>

      </article>
    <?php } ?>
  </section>
</div>



<?php get_footer() ;?>
