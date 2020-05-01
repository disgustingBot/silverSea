<?php get_header(); ?>


<!-- <?php include_once 'dataBaseHandler.php' ?> -->
<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( wc_get_page_id( 'shop' ) ), 'full' );?>

<!-- <figure class="titleBaner">
  <img class="rowcol1 lazy" data-url="<?php echo wp_get_attachment_url(get_woocommerce_term_meta(get_queried_object()->term_id, 'thumbnail_id', true )); ?>">
  <!-- <img class="titleBanerImg lazy" data-url="<?php echo $thumb['0']; ?>" alt=""> -->
  <!-- <figcaption class="titleBanerCaption">
    <h2><//?php the_title();?></h2>
    <h3><//?php echo get_the_excerpt(); ?></h3>
  </figcaption> -->
<!-- </figure> --> -->







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






























<//?php include get_template_directory().'/copralqui.php' ?>


<div class="archiveFilter2">

  <div class="filter">
    <?php $svgPath = get_template_directory()  . "/img/svg/"; ?>
    <h3 class="filterTitle">Tamaño</h3>
    <ul class="filterList">
      <li class="filterItem">
        <input type="checkbox" class="css-checkbox">
        <?php include $svgPath . 'size.php'; ?>
        <label for="">12 PIES</label>
      </li>
      <li class="filterItem">
        <input type="checkbox">
        <?php include $svgPath . 'size.php'; ?>
        <label for="">20 PIES</label>
      </li>
      <li class="filterItem">
        <input type="checkbox">
        <?php include $svgPath . 'size.php'; ?>
        <label for="">40 PIES</label>
      </li>
      <li class="filterItem">
        <input type="checkbox">
        <?php include $svgPath . 'size.php'; ?>
        <label for="">45 PIES</label>
      </li>
    </ul>
    <div class="filterAll">
      <input type="checkbox" name="selectAll" value="">
      <label for="selectAll">Seleccionar todo</label>
    </div>
  </div>

  <div class="filter">
    <h3 class="filterTitle">Tipo de Contenedor</h3>
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
      <li class="filterItem openTop">
        <input type="checkbox">
        <?php include $svgPath . 'openTop.php'; ?>
        <label for="">Open Top</label>
        <?php include $svgPath . 'question.php'; ?>
      </li>
      <li class="filterItem flatRack">
        <input type="checkbox">
        <?php include $svgPath . 'flatRack.php'; ?>
        <label for="">Flat Rack</label>
        <?php include $svgPath . 'question.php'; ?>
      </li>
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
        <?php include $svgPath . 'cargoWorthy.php'; ?>
        <label for="">Carga | Cargo Worthy</label>
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

</div>


<!--
<section class="archiveMain">

  <div class="archiveResult">
    <//?php while(have_posts()){the_post(); ?>
      <//?php global $product; ?>
    <article class="articleContainer">
        <a class="articleImg" href="<//?php echo get_permalink(); ?>">
          <img class="articleImg lazy" data-url="<//?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
        </a>
      <p class="articleMeasure">Medidas <br> 40 x 80</p>
      <div class="articleIcon">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g opacity="0.5">
            <path d="M9.39575 13.3372L8.64043 12.58V8.34031L12.2473 6.2L14.5726 6.8225C14.6267 6.83688 14.6811 6.84375 14.7345 6.84375C15.0104 6.84375 15.2632 6.65938 15.3379 6.38031C15.4273 6.04688 15.2292 5.70406 14.8957 5.615L13.7498 5.30813L14.6801 4.75594C14.977 4.57969 15.0748 4.19625 14.8986 3.89937C14.7223 3.6025 14.3389 3.50469 14.042 3.68094L13.1592 4.20469C13.2648 3.7875 13.3686 3.37781 13.4332 3.12188C13.5179 2.78719 13.3154 2.44719 12.9807 2.3625C12.6461 2.27781 12.3061 2.48031 12.2214 2.815L11.642 5.105L8.63949 6.88656V3.42281L10.3595 1.72625C10.6051 1.48375 10.6079 1.08812 10.3657 0.8425C10.1232 0.596875 9.72762 0.594063 9.48199 0.836563L8.64043 1.66719V0.625C8.64043 0.279687 8.36074 0 8.01543 0C7.67012 0 7.39043 0.279687 7.39043 0.625V1.66719C7.06762 1.34875 6.74606 1.03156 6.54824 0.83625C6.30262 0.59375 5.90699 0.596563 5.66449 0.842188C5.422 1.08781 5.42481 1.48375 5.67043 1.72594L7.39074 3.42281V6.88938L4.38887 5.11625L3.77668 2.77906C3.68918 2.44531 3.34762 2.24531 3.01356 2.33313C2.67981 2.42063 2.47981 2.76219 2.56731 3.09625C2.63637 3.35969 2.74762 3.78375 2.86012 4.21344L1.95856 3.68094C1.66137 3.50531 1.27793 3.60406 1.10262 3.90125C0.926995 4.19844 1.02574 4.58156 1.32293 4.75719L2.23824 5.29781L1.11293 5.58187C0.778245 5.66625 0.575432 6.00625 0.659807 6.34094C0.731057 6.62375 0.985433 6.8125 1.26512 6.8125C1.31575 6.8125 1.36731 6.80625 1.41856 6.79344L3.76699 6.20062L6.78856 7.98562L3.74637 9.79094L1.42512 9.17719C1.09106 9.08875 0.749182 9.28781 0.661057 9.62156C0.572932 9.95531 0.771682 10.2975 1.10543 10.3856L2.23887 10.6853L1.35043 11.2125C1.05356 11.3888 0.955745 11.7722 1.13199 12.0691C1.24887 12.2659 1.45668 12.3753 1.67012 12.3753C1.77856 12.3753 1.88856 12.3472 1.98856 12.2878L2.85981 11.7709C2.74762 12.1944 2.63668 12.6119 2.56793 12.8713C2.4795 13.205 2.67824 13.5472 3.01168 13.6356C3.06543 13.65 3.11918 13.6566 3.17231 13.6566C3.44887 13.6566 3.70168 13.4716 3.77606 13.1916L4.39418 10.86L7.39074 9.08187V12.5772L5.67074 14.2738C5.42512 14.5163 5.42231 14.9119 5.66449 15.1575C5.78668 15.2816 5.94793 15.3438 6.10949 15.3438C6.26793 15.3438 6.42668 15.2837 6.54824 15.1637L7.39074 14.3328V15.375C7.39074 15.7203 7.67043 16 8.01575 16C8.36106 16 8.64075 15.7203 8.64075 15.375V14.35C8.95106 14.6613 9.25762 14.9688 9.44793 15.16C9.57012 15.2825 9.73043 15.3438 9.89075 15.3438C10.0504 15.3438 10.2101 15.2831 10.332 15.1616C10.5764 14.9178 10.577 14.5222 10.3336 14.2778L9.39575 13.3372Z" fill="#60859E"/>
            <path d="M14.5725 9.1775L12.2959 9.78687L10.7085 8.84906C10.4113 8.67344 10.0281 8.77219 9.85252 9.06938C9.67689 9.36656 9.77564 9.74969 10.0728 9.92531L11.6331 10.8469L12.255 13.2209C12.3288 13.5016 12.5819 13.6875 12.8591 13.6875C12.9116 13.6875 12.965 13.6809 13.0178 13.6669C13.3519 13.5794 13.5516 13.2378 13.4638 12.9037C13.3928 12.6328 13.2772 12.1916 13.1613 11.7497L14.0725 12.2881C14.1722 12.3472 14.2819 12.375 14.3897 12.375C14.6034 12.375 14.8119 12.2653 14.9284 12.0678C15.1041 11.7706 15.0053 11.3875 14.7081 11.2119L13.8034 10.6775L14.8956 10.385C15.2291 10.2956 15.4269 9.95312 15.3378 9.61969C15.2484 9.28625 14.9056 9.08813 14.5725 9.1775Z" fill="#60859E"/>
          </g>
        </svg>
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g opacity="0.5">
            <path d="M1.13408 7.16505C1.5457 4.8298 3.19424 2.91719 5.37712 2.1298L5.27439 2.307C5.13167 2.55452 5.21647 2.8703 5.46331 3.01371C5.54466 3.0606 5.63361 3.08335 5.72117 3.08335C5.89975 3.08335 6.07349 2.99027 6.16933 2.8248L6.88225 1.59063C6.9512 1.47204 6.96981 1.3307 6.93396 1.19832C6.8988 1.06594 6.81192 0.952866 6.69333 0.883919L5.45917 0.170999C5.21165 0.0275882 4.89518 0.112394 4.75246 0.359916C4.60973 0.607438 4.69454 0.923219 4.94137 1.06594L5.07031 1.1404C2.52269 2.04293 0.594911 4.26649 0.115724 6.98579C-0.11594 8.29993 0.00196067 9.65407 0.457015 10.9027C0.533547 11.1123 0.731427 11.2426 0.943097 11.2426C1.0017 11.2426 1.06169 11.2323 1.12029 11.2109C1.3885 11.113 1.52708 10.8158 1.42918 10.5476C1.03549 9.46997 0.933444 8.30062 1.13408 7.16505Z" fill="#60859E"/>
            <path d="M13.3515 12.4589C13.133 12.2748 12.8068 12.303 12.6228 12.5216C11.1183 14.3115 8.75617 15.1713 6.45607 14.7652C5.33981 14.5687 4.2987 14.084 3.43134 13.3731H3.5975C3.88294 13.3731 4.11461 13.1415 4.11461 12.856C4.11461 12.5706 3.88294 12.3389 3.5975 12.3389H2.2213C2.08823 12.3265 1.95103 12.3651 1.84071 12.4575C1.73315 12.5478 1.67179 12.6726 1.65869 12.8015C1.65869 12.8022 1.65869 12.8022 1.65869 12.8029C1.65869 12.8029 1.65869 12.8029 1.65869 12.8036C1.65731 12.8181 1.65662 12.8333 1.65662 12.8484C1.65662 12.8512 1.65593 12.8532 1.65593 12.856L1.65524 14.2812C1.65524 14.5666 1.88622 14.7983 2.17235 14.7983C2.45779 14.7983 2.68946 14.5666 2.68946 14.2812V14.1012C3.70919 14.9637 4.94749 15.5491 6.27681 15.7835C6.71325 15.8607 7.15106 15.898 7.58612 15.898C9.80762 15.898 11.9588 14.9182 13.4143 13.187C13.5984 12.9691 13.5701 12.6423 13.3515 12.4589Z" fill="#60859E"/>
            <path d="M15.9303 9.82366C15.7876 9.57614 15.4711 9.49134 15.2243 9.63475L15.054 9.73265C15.0609 9.69611 15.0691 9.65957 15.076 9.62303C15.4283 7.62492 14.9816 5.60889 13.8177 3.94725C12.6539 2.28561 10.913 1.17625 8.91486 0.823923C8.63355 0.774281 8.36535 0.962508 8.3157 1.24312C8.26606 1.52443 8.4536 1.79264 8.73491 1.84228C10.4607 2.14634 11.9651 3.10471 12.9704 4.5402C13.9736 5.97294 14.3597 7.70973 14.059 9.43273L13.9832 9.30173C13.8405 9.05421 13.524 8.9694 13.2772 9.11212C13.0297 9.25485 12.9449 9.57132 13.0876 9.81815L13.8005 11.053C13.8688 11.1716 13.9818 11.2585 14.1142 11.2936C14.1583 11.3054 14.2031 11.3116 14.248 11.3116C14.3376 11.3116 14.4272 11.2881 14.5065 11.2419L15.7414 10.529C15.9882 10.387 16.073 10.0712 15.9303 9.82366Z" fill="#60859E"/>
          </g>
        </svg>


      </div>
      <h5 class="articleTitle">
        <//?php echo get_the_title(); ?>
        <//?php echo get_the_excerpt(); ?>
        <input class="articleQuantity" type="number" name="cantidad" value="" placeholder="Cantidad">
      </h5>
      <p class="articlePrice">
        <//?php echo $product->get_price_html(); ?>
      </p>
      <button class="btn articleButton" type="button" name="button"><nobr>Agregar al Carrito</nobr></button>

    </article>
    <article class="materialContainer">
      <h5 class="articleTitle">
        <//?php echo get_the_title(); ?>
        <//?php echo get_the_excerpt(); ?>
      </h5>
    </article>
    <//?php } ?>
  </div>
</section> -->


<section class="searchResultsCont">
  <?php while(have_posts()){the_post(); ?>
    <?php global $product; ?>
  <article class="containerCard">
    <a href="<?php echo get_permalink(); ?>" class="cardTitle">
      <?php echo get_the_excerpt(); ?> , <?php echo get_the_title(); ?>
    </a>
    <a class="cardImgCont sectionGrey" href="<?php echo get_permalink(); ?>">
      <img class="cardImg lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
    </a>
    <div class="cardFeaturesCont">
      <figure class="cardFeature">
        <?php include $svgPath . 'dry.php'; ?>

        <!-- <p class="cardFeatureTxt">Apto para carga /<br>Cargo wothy</p> -->
      </figure>
      <figure class="cardFeature">

        <?php include $svgPath . 'reefer.php'; ?>

        <!-- <p class="cardFeatureTxt">Refrigerado</p> -->
      </figure>
      <figure class="cardFeature">
        <?php include $svgPath . 'size.php'; ?>

        <p class="cardFeatureTxt">5 x 20</p>
      </figure>
    </div>
    <hr class="cardInfoDiv">
    <div class="cardInteractionCont">
      <div class="addToCartQntContainer">
            <input class="addToCartQnt" id="addToCartQantity" type="number" value="1" min="1">
            <button class="addToCartQntBtn" onclick="changeQuantity(-1)">-</button>
            <button class="addToCartQntBtn" onclick="changeQuantity(+1)">+</button>
          </div>
      <button class="btn">AGREGAR AL PEDIDO</button>
    </div>
  </article>
  <?php } ?>
</section>

<div class="finalbuttons">
  <button class="btn">CONTENEDORES EN REBAJA</button>
  <button class="btn">Finalizar Compra</button>
</div>

<?php get_footer() ;?>
