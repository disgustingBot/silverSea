<?php get_header(); ?>

<section class="ATF frontPageATF">
  <img class="frontPageATFBg rowcol1" src="<?php echo get_template_directory_uri(); ?>/img/ATFExampleImg.jpg" alt="">


  <form class="cotizador">
    <?php include get_template_directory().'/coprAlqui.php' ?>
    <div class="dynamicContList" id="dynamicContList">
      <?php include get_template_directory().'/dynamicCont.php' ?>
    </div>

  </form>


  <div class="features">
        <figure class="feature">
          <img class="featureIcon" src="<?php echo get_template_directory_uri(); ?>/img/costePreciso.png" alt="feature Icon">
          <figcaption class="featureTxt">
            <h3 class="featureTitle brandColorTxt">CALCULO DE COSTE PRECISO</h3>
            <p class="featureP">eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          </figcaption>
        </figure>
        <figure class="feature">
          <img class="featureIcon" src="<?php echo get_template_directory_uri(); ?>/img/enviosTracking.png" alt="feature Icon">
          <figcaption class="featureTxt">
            <h3 class="featureTitle brandColorTxt">ENVÍOS Y TRACKING LOGíSTICO</h3>
            <p class="featureP">eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          </figcaption>
        </figure>
        <figure class="feature">
          <img class="featureIcon" src="<?php echo get_template_directory_uri(); ?>/img/compraRecompra.png" alt="feature Icon">
          <figcaption class="featureTxt">
            <h3 class="featureTitle brandColorTxt">COMPRA, RECOMPRA Y ALQUILER</h3>
            <p class="featureP">eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          </figcaption>
        </figure>
      </div>
</section>

<section class="FrontPageSec1 sectionPadding">
  <article class="article2">
    <hgroup class="sectionSummary">
      <h2 class="summaryTitle">About <span class="brandColorTxt">us</span></h2>
      <h4 class="summaryTxt brandColorTxt">Tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip SUBTITULO</h4>
      <h4 class="summaryTxt">Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim ven iam, quis nostrud exer citation ullamco laboris nisi ut perspiciatis unde omnis iste natus error sit voluptate.</h4>
    </hgroup>
    <img class="article2Media" src="<?php echo get_template_directory_uri(); ?>/img/aboutUsImg.jpg" alt="">
  </article>
  <button class="btn"><a href="">LEER MÁS</a></button>
</section>

<section class="sectionGrey sectionPadding">
  <article class="articleCounter">
    <div class="counter">
      <div class="count countTitle">
        <p class="countNumber">+<span class="GrowUp" data-target="3000">0</span></p>
        <p class="countTxt">CONTENEDORES VENDIDOS</p>
      </div>
      <div class="count countTitle">
        <p class="countNumber">+<span class="GrowUp" data-target="3000">0</span></p>
        <p class="countTxt">CLIENTES SATISFECHOS</p>
      </div>
      <div class="count countTitle">
        <p class="countNumber">+<span class="GrowUp" data-target="200">0</span></p>
        <p class="countTxt">CENTROS LOGÍSTICOS</p>
      </div>
      <div class="count countTitle">
        <p class="countNumber">+<span class="GrowUp" data-target="30">0</span></p>
        <p class="countTxt">PAÍSES Y TERRITORIOS</p>
      </div>
    </div>
  </article>
</section>

<section class="FrontPageSec1 sectionPadding">
  <article class="article2">
    <iframe class="article2Media" src="https://www.google.com/maps/d/embed?mid=17c08JkE4KqI6p3EPcDfsiIMtwDveG7D8" width="640" height="480"></iframe>
    <hgroup class="sectionSummary">
      <h2 class="summaryTitle">Silversea <span class="brandColorTxt">en el mundo</span></h2>
      <h4 class="summaryTxt brandColorTxt">Tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip SUBTITULO</h4>
      <h4 class="summaryTxt">Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim ven iam, quis nostrud exer citation ullamco laboris nisi ut perspiciatis unde omnis iste natus error sit voluptate.</h4>
      <h4 class="summaryTxt">Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim ven iam, quis nostrud exer citation ullamco laboris nisi ut perspiciatis unde omnis iste natus error sit voluptate.</h4>
    </hgroup>
  </article>
</section>


<section class="sectionPadding aboutUsSec2">
  <article class="article2 ">
    <hgroup class="sectionSummary">
      <h2 class="summaryTitle">Que contenedor<br>Necesito?</h2>
      <h4 class="summaryTxt brandColorTxt">tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip SUBTITULO</h4>
      <h4 class="summaryTxt">Con una amplia red de agentes a nivel mundial, nos encargamos del movimiento de sus cargas en distintas modalidades, cualquiera sea su origen o destino.</h4>
    </hgroup>
    <img class="article2Media" src="<?php echo get_template_directory_uri(); ?>/img/aboutUsImgSec2.png" alt="">
  </article>
  <select class="btn">
    <option>Seleccionar tipo de contenedor</option>
    <option>Reefer</option>
    <option>Dry</option>
    <option>Open Top</option>
    <option>Flat Back</option>
  </select>
</section>




<?php get_footer(); ?>
