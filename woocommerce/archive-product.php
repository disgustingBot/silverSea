<?php get_header(); ?>


<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( wc_get_page_id( 'shop' ) ), 'full' );?>


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
          <!-- <span class="checkmark"></span> -->
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
          <!-- <span class="checkmark"></span> -->
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
          <!-- <span class="checkmark"></span> -->
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
          <!-- <span class="checkmark"></span> -->
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
          <!-- <span class="checkmark"></span> -->
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
          <!-- <span class="checkmark"></span> -->
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
          <!-- <span class="checkmark"></span> -->
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
          <!-- <span class="checkmark"></span> -->
          <p class="colrOptP">Barcelona</p>
        </label>
      </div>
    </div>
  </div>
</div>













<div class="archiveMain">
  <div class="archiveFilter2">
    <?php $svgPath = get_template_directory()  . "/img/svg/"; ?>


    <div class="filter">
      <h3 class="filterTitle"><nobr>Tipo de Contenedor</nobr></h3>
      <ul class="filterList">
        <li class="filterItem">
          <input type="checkbox">
          <?php include $svgPath . 'reefer.php'; ?>
          <label for="">Refrigerado</label>
          <?php include $svgPath . 'question.php'; ?>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <?php include $svgPath . 'dry.php'; ?>
          <label for="">Seco</label>
          <?php include $svgPath . 'question.php'; ?>
        </li>
        <li class="filterItem">
          <?php include $svgPath . 'special.php'; ?>
          <label for="">Especiales</label>
        </li>
        <!-- <li class="filterItem openTop">
          <input type="checkbox">
          <//?php include $svgPath . 'open-top.php'; ?>
          <label for="">Open Top</label>
          <//?php include $svgPath . 'question.php'; ?>
        </li>
        <li class="filterItem flatRack">
          <input type="checkbox">
          <//?php include $svgPath . 'flat-rack.php'; ?>
          <label for="">Flat Rack</label>
          <//?php include $svgPath . 'question.php'; ?>
        </li> -->
      </ul>
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
          <?php include $svgPath . 'new.php'; ?>
          <label for="">Nuevo | New</label>
          <?php include $svgPath . 'question.php'; ?>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <?php include $svgPath . 'cargoWorthy.php'; ?>
          <label for="">Carga | Cargo Worthy</label>
          <?php include $svgPath . 'question.php'; ?>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <?php include $svgPath . 'cargoWorthyIICL.php'; ?>
          <label for="">Carga | Cargo Worthy IICL</label>
          <?php include $svgPath . 'question.php'; ?>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <?php include $svgPath . 'storage.php'; ?>
          <label for="">Almacenaje | Modificación </label>
          <?php include $svgPath . 'question.php'; ?>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <?php include $svgPath . 'scrap.php'; ?>
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

      <h3 class="filterTitle"><?php include $svgPath . 'size.php'; ?>Tamaño</h3>
      <ul class="filterList size">
        <li class="filterItem">
          <input type="checkbox" class="css-checkbox">
          <label for="">12 PIES</label>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <label for="">20 PIES</label>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <label for="">40 PIES</label>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <label for="">45 PIES</label>
        </li>
      </ul>
      <div class="filterAll">
        <input type="checkbox" name="selectAll" value="">
        <label for="selectAll">Seleccionar todo</label>
      </div>
    </div>
    <div class="filter">

      <h3 class="filterTitle">Filtros Avanzados</h3>
      <ul class="filterList size">
        <li class="filterItem">
          <input type="checkbox" class="css-checkbox">
          <?php include $svgPath . 'high-cube.php'; ?>
          <label for="">HIGH CUBE</label>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <?php include $svgPath . 'double-door.php'; ?>
          <label for="">Double Door</label>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <?php include $svgPath . 'palet-wide.php'; ?>
          <label for="">Palet Wide</label>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <?php include $svgPath . 'open-side.php'; ?>
          <label for="">Open Side</label>
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
      <?php global $product; ?>
      <article class="card">
        <a href="<?php echo get_permalink(); ?>" class="cardTitle">
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
        <a class="cardImgCont sectionGrey" href="<?php echo get_permalink(); ?>">
          <img class="cardImg lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
        </a>
        <div class="cardFeaturesCont">
          <?php
          if ($categories) {
            // for each category
            foreach ($categories as $cat) {  ?>
              <?php $svgPath = get_template_directory()  . "/img/svg/"; ?>
              <figure class="cardCategories">
                <?php if(strpos($cat->slug, 'pies') === false ){
                  include $svgPath . $cat->slug . '.php';
                }else {
                  include $svgPath  . 'size.php';
                }?>
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
