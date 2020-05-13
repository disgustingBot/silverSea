<?php get_header(); ?>

<section class="ATF frontPageATF">
  <img class="frontPageATFBg rowcol1" src="<?php echo get_template_directory_uri(); ?>/img/ATFExampleImg.jpg" alt="">


  <div class="cotizador" id="cotizador">
    <?php include get_template_directory().'/coprAlqui.php' ?>

    <div class="dynamicContList" id="dynamicContList">
      <?php include get_template_directory().'/dynamicCont.php' ?>
    </div>
  </div>


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


<section class="sectionPadding card256" id="queContainerINeed">


<?php
$args=array(
  'post_type'=>'container',
);
$container=new WP_Query($args);
while($container->have_posts()){$container->the_post(); ?>
  <style>
  #queContainerINeed.card<?php echo get_the_id().' #card'.get_the_id() ; ?>{
    display: flex;
  }
  </style>
  <article class="article2 containerNeeded" id="card<?php echo get_the_id();?>">
    <hgroup class="sectionSummary">
      <h2 class="summaryTitle"><?php the_title(); ?></h2>
      <h4 class="summaryTxt"><?php the_content(); ?></h4>
    </hgroup>
    <img class="article2Media" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
</article>
<?php } wp_reset_query(); ?>

<?php
$args=array(
  'post_type'=>'container',
  'order' => 'ASC',
);
$container=new WP_Query($args);
?>
<select name="cont_selector" class="btn" id="contSelector"  onchange="if (typeof(this.selectedIndex) != 'undefined') altClassFromSelector(this.value, '#queContainerINeed', 'sectionPadding')">
  <?php
  $i=0;
  while($container->have_posts()){$container->the_post(); ?>
  <option class="contOption" name="option" <?php if ($i==0){ echo 'checked'; } ?>  value="card<?php echo get_the_id();?>"><?php the_title(); ?></option>
<?php $i++; } wp_reset_query(); ?>
</select>



</section>
<?php get_footer(); ?>
