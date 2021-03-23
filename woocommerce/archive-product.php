<?php get_header(); ?>

<script type="text/javascript">
  fbq('track', 'ViewContent', { content_name: 'Busca tu contenedor' })
</script>

  <?php
  function woocommerce_subcats_from_parentcat_2($category){
    if (is_numeric($category)) {$term = get_term(           $category, 'product_cat');}
    else                       {$term = get_term_by('slug', $category, 'product_cat');}
    if (isset($_GET[$category])) {
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
    $subcats = get_categories($args);
    $options = array_map(function($category)use($term){
      return array(
        'slug' => $category->slug,
        'name' => $category->name,
        'data' => array(
          'data-slug'   =>$category->slug,
          'data-parent' =>$term->slug,
        ),
        'selected' => (isset($_GET[$term->slug]) && $_GET[$term->slug] == $category->slug) ? True : False,
      );
    },$subcats);
    return $options;
  }
?>



<div class="archiveTopInteraction">
  <div class="byeByeBtn">
    <button class="btn"><a href="<?php echo get_site_url() . '/buscar-contenedor-maritimo/'; ?>">Borrar filtros</a></button>
    <button class="btn rebajaBtn"><a href="<?php echo get_site_url() . '/sale/'; ?>">CONTENEDORES EN REBAJA</a></button>
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

        <?php
        $options = woocommerce_subcats_from_parentcat_2('size');
        selectBox('Tamaño', $options, 'Vaciar', 'size');
        $options = woocommerce_subcats_from_parentcat_2('dry');
        selectBox('Seco', $options, 'Vaciar', 'dry');
        $options = woocommerce_subcats_from_parentcat_2('reefer');
        selectBox('Refrigerado', $options, 'Vaciar', 'reefer');
        $options = woocommerce_subcats_from_parentcat_2('special');
        selectBox('Especial', $options, 'Vaciar', 'special');
        $options = woocommerce_subcats_from_parentcat_2('condition');
        selectBox('Condicion', $options, 'Vaciar', 'condition');
        ?>


      </div>
      <div class="filterQuestionsActivatorCont">
        <p class="filterQuestionActP">¿No sabes que contenedor necesitas?</p>
        <svg class="pointingHand" width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="https://www.w3.org/2000/svg">
          <path d="M22.3529 5.64029C22.665 5.64029 22.9642 5.76156 23.1848 5.97743C23.4055 6.1933 23.5294 6.48608 23.5294 6.79137C23.5294 7.09665 23.4055 7.38943 23.1848 7.6053C22.9642 7.82117 22.665 7.94245 22.3529 7.94245H17.0941L16.9412 9.33525L14.3529 15.0216C14.1176 15.5971 13.4941 16 12.7765 16H7.64706C6.70588 16 5.88235 15.1597 5.88235 14.2734V6.79137C5.88235 6.34245 6.07059 5.93957 6.38823 5.64029L11.3294 0L12.2353 0.851799C12.4706 1.0705 12.6118 1.36978 12.6118 1.7036L12.5765 1.95683L10.5882 5.64029H22.3529ZM0 16V6.79137H3.52941V16H0Z" fill="white"/>
        </svg>
        <span class="filterQuestionsActivator txtUnderlined" onclick="altClassFromSelector('visible','.filterQuestionsCont')">Pincha aquí</span>
      </div>

    </div>



  <section class="searchResultsCont" id="postCont">
    <?php
    while(have_posts()){the_post();
      simpla_card();
    }
    echo ajax_paginator(get_pagenum_link());
    ?>
  </section>
</div>


<form class="filterQuestionsCont">
  <p class="closeQuestions" onclick="altClassFromSelector('visible','.filterQuestionsCont')"><strong>+</strong></p>
  <div class="filterSingleQuestCont">
    <p class="filterQuestion"><strong>¿Para que estás buscando un contenedor?</strong></p>
    <div class="filterAnswerCont">
      <input type="radio" id="asis2" name="question1" value="storage-new">
      <label for="asis2">Para almacenar o modificarlo</label>
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
      <input type="radio" id="pies20" name="question2" value="20">
      <label for="pies20">Seis metros de largo por 2 y medio de ancho</label>
    </div>
    <div class="filterAnswerCont">
      <input type="radio" id="pies40" name="question2" value="40">
      <label for="pies40">12 metros de largo por 2 y medio de ancho</label>
    </div>
    <div class="filterAnswerCont">
      <input type="radio" id="otres" name="question2" value="others">
      <label for="otres">Otras medidas</label>
    </div>
  </div>

  <a href="" class="btn" id="filterButtonAFK" type="submit">Filtrar contenedores</a>
</form>

<?php get_footer() ;?>
