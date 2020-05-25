<?php get_header(); ?>

<?php global $product; ?>

<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( wc_get_page_id( 'shop' ) ), 'full' );?>

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







<section class="questionaryFilter">
  <h3 class="questionaryTitle"><nobr>Need Help?</nobr></h3>
  <button class="questionaryButton">
    <svg class="singleProductArrowSVG" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M18.5455 21.18L9.77992 12L18.5455 2.82L15.8469 0L4.36365 12L15.8469 24L18.5455 21.18Z" fill="currentColor"/>
    </svg>
  </button>
</section>





<div class="archiveMain">
  <div class="archiveFilter2">
    <?php $svgPath = get_template_directory()  . "/assets/"; ?>


    <div class="filter">
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
            <?php include $svgPath . 'question.php'; ?>
          </li>
          <li class="filterTipoItem">
            <input type="checkbox" name="" value="">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#RH" id="dynamicContLogo"></use>
            </svg>
            <label for="">HighCube</label>
            <?php include $svgPath . 'question.php'; ?>
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
            <?php include $svgPath . 'question.php'; ?>

          </li>
          <li class="filterTipoItem">
            <input type="checkbox" name="" value="">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#HC" id="dynamicContLogo"></use>
            </svg>
            <label for="">HighCube</label>
            <?php include $svgPath . 'question.php'; ?>
          </li>
          <li class="filterTipoItem">
            <input type="checkbox" name="" value="">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#HCPW" id="dynamicContLogo"></use>
            </svg>
            <label for="">HighCube PaletWide</label>
            <?php include $svgPath . 'question.php'; ?>
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
            <?php include $svgPath . 'question.php'; ?>
          </li>
          <li class="filterTipoItem">
            <input type="checkbox" name="" value="">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#OT" id="dynamicContLogo"></use>
            </svg>
            <label for="">Open Top</label>
            <?php include $svgPath . 'question.php'; ?>
          </li>
          <li class="filterTipoItem">
            <input type="checkbox" name="" value="">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#OS" id="dynamicContLogo"></use>
            </svg>
            <label for="">Open Side</label>
            <?php include $svgPath . 'question.php'; ?>
          </li>
          <li class="filterTipoItem">
            <input type="checkbox" name="" value="">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#DCDD" id="dynamicContLogo"></use>
            </svg>
            <label for="">Double Door</label>
            <?php include $svgPath . 'question.php'; ?>
          </li>
          <li class="filterTipoItem">
            <input type="checkbox" name="" value="">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#HCDD" id="dynamicContLogo"></use>
            </svg>
            <label for="">HighCube Double Door</label>
            <?php include $svgPath . 'question.php'; ?>
          </li>
          <li class="filterTipoItem">
            <input type="checkbox" name="" value="">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#OS" id="dynamicContLogo"></use>
            </svg>
            <label for="">Open Side</label>
            <?php include $svgPath . 'question.php'; ?>
          </li>
          <li class="filterTipoItem">
            <input type="checkbox" name="" value="">
            <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#TK" id="dynamicContLogo"></use>
            </svg>
            <label for="">Tank</label>
            <?php include $svgPath . 'question.php'; ?>
          </li>
        </div>

      </div>
      <div class="filterAll">
        <input type="checkbox" name="selectAll" value="">
        <label for="selectAll">Seleccionar todo</label>
      </div>
    </div>

    <div class="filter">
      <h3 class="filterTitle">Condición</h3>
      <ul class="filterList">
        <li class="filterItem">
          <input type="checkbox">
          <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <use xlink:href="#NEW" id="dynamicContLogo"></use>
          </svg>
          <label for="">Nuevo | New</label>
          <?php include $svgPath . 'question.php'; ?>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <use xlink:href="#CW" id="dynamicContLogo"></use>
          </svg>
          <label for="">Carga | Cargo Worthy</label>
          <?php include $svgPath . 'question.php'; ?>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <use xlink:href="#IICL" id="dynamicContLogo"></use>
          </svg>
          <label for="">Carga | Cargo Worthy IICL</label>
          <?php include $svgPath . 'question.php'; ?>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <use xlink:href="#RH" id="dynamicContLogo"></use>
          </svg>
          <label for="">Almacenaje | Modificación </label>
          <?php include $svgPath . 'question.php'; ?>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <use xlink:href="#SCRAP" id="dynamicContLogo"></use>
          </svg>
          <label for="">Chatarra | Scrap </label>
          <?php include $svgPath . 'question.php'; ?>
        </li>
      </ul>
      <div class="filterAll">
        <input type="checkbox" name="selectAll" value="">
        <label for="selectAll">Seleccionar todo</label>
      </div>
    </div>
    <div class="filter">

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
    </div>


    <button class="hideFilter" onclick="altClassFromSelector('alt','.archiveFilter2');altClassFromSelector('alt','.hideFilter');altClassFromSelector('alt','.archiveMain')">
      <svg width="31" height="56" viewBox="0 0 31 56" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M2 2L28 28L2 54" stroke="black" stroke-width="4"/>
      </svg>
    </button>
  </div>










  <section class="searchResultsCont">
    <?php while(have_posts()){the_post();
      $categories = get_the_terms( get_the_ID(), 'product_cat' );
      ?>
      <article class="card">
        <a href="<?php echo get_permalink(); ?>" class="cardTitle"> h4.card
          <?php
          if ($categories) {
            // for each category
            foreach ($categories as $cat) {
              // var_dump($cat->slug);
              $parent=get_term_by('id', $cat->parent, 'product_cat', 'ARRAY_A')['slug'];
              if ($parent=="size") {
                echo  $cat->name;
              }
              if ($parent=="condition") {
                echo  ', ' . $cat->name;
              }
              if ($parent=="type") {
                echo  ', ' . $cat->name ;
              }
            }
          }
          ?>
        </a>
        <div class="Carousel productGallery" href="<?php echo get_permalink(); ?>" >
          <!-- <h2 class="titleBanerCaption rowcol1"><//?php echo the_title() . ', '  . $tipo ;?> </h2> -->
          <?php $attachment_ids = $product->get_gallery_attachment_ids(); ?>

          <img class="Element productGalleryImg rowcol1 lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="product gallery">
          <?php if($attachment_ids){$count=0; foreach( $attachment_ids as $attachment_id ) { ?>
            <img class="Element productGalleryImg rowcol1 lazy"  data-url="<?php echo $image_link = wp_get_attachment_url( $attachment_id ); ?>" alt="product gallery">

            <?php $count++; }} ?>
            <div class="singleProductsgalleryBtnsContainer rowcol1 <?php if($attachment_ids){ echo "opacity1";} else{ echo "opacity0";} ?>">
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
        <!-- <a class="cardImgCont sectionGrey" href="<//?php echo get_permalink(); ?>">
          <img class="cardImg lazy" data-url="<//?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
        </a> -->
        <div class="cardFeaturesCont">
          <?php
          if ($categories) {
            // for each category
            foreach ($categories as $cat) {  ?>
              <?php $svgPath = get_template_directory()  . "/img/svg/"; ?>
              <figure class="cardCategories">
                <?php include $svgPath . $cat->slug . '.php'; ?>
              </figure>
              <?php
            }
          }
          ?>
        </div>
        <hr class="cardInfoDiv">
        <div class="cardInteractionCont">
          <div class="addToCartQntContainer">
            <input class="addToCartQnt" id="addToCartQantity" type="number" value="1" min="1">
            <button class="addToCartQntBtn" onclick="changeQuantity(-1)">-</button>
            <button class="addToCartQntBtn" onclick="changeQuantity(+1)">+</button>
          </div>
          <button class="btn">AGREGAR</button>
        </div>
      </article>
    <?php } ?>
  </section>
</div>

<div class="finalbuttons">
  <button class="btn">CONTENEDORES EN REBAJA</button>
  <button class="btn">Finalizar Compra</button>
</div>

<?php get_footer() ;?>
