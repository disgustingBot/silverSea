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
<!-- </figure> -->




<?php include get_template_directory().'/coprAlqui.php' ?>




















<?php // include get_template_directory().'/copralqui.php' ?>

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
    <div class="filter">

      <h3 class="filterTitle"><?php include $svgPath . 'size.php'; ?>Tamaño</h3>
      <ul class="filterList size">
        <li class="filterItem">
          <input type="checkbox" class="css-checkbox">
          <!-- <?php include $svgPath . 'size.php'; ?> -->
          <label for="">12 PIES</label>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <!-- <?php include $svgPath . 'size.php'; ?> -->
          <label for="">20 PIES</label>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <!-- <?php include $svgPath . 'size.php'; ?> -->
          <label for="">40 PIES</label>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <!-- <?php include $svgPath . 'size.php'; ?> -->
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
          <?php include $svgPath . 'highCube.php'; ?>
          <label for="">HIGH CUBE</label>
        </li>
        <li class="filterItem">
          <input type="checkbox">
          <?php include $svgPath . 'doubleDoor.php'; ?>
          <label for="">Double Door</label>
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
          </figure>
          <p class="cardFeatureTxt">5 x 20</p>
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
