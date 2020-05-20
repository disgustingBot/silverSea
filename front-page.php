<?php get_header(); ?>

<section class="ATF frontPageATF sectionWhite">
  <video loop autoplay muted class="frontPageATFBg rowcol1" src="<?php echo get_post_meta($post->ID, '1-video-portada', true); ?>" alt="">
  </video>


  <div class="cotizador" id="cotizador">
    <?php include get_template_directory().'/coprAlqui.php' ?>

    <div class="dynamicContList" id="dynamicContList">
      <?php include get_template_directory().'/dynamicCont.php' ?>
    </div>
  </div>


  <div class="features">

    <figure class="feature sectionWhite">
      <img class="featureIcon" src="<?php echo get_template_directory_uri(); ?>/img/costePreciso.png" alt="feature Icon">
      <figcaption class="featureTxt">
        <h3 class="featureTitle brandColorTxt"><?php echo get_post_meta($post->ID, '2-titulo-beneficio-1', true); ?></h3>
        <p class="featureP"><?php echo get_post_meta($post->ID, '3-texto-beneficio-1', true); ?></p>
      </figcaption>
    </figure>

    <figure class="feature sectionWhite">
      <img class="featureIcon" src="<?php echo get_template_directory_uri(); ?>/img/enviosTracking.png" alt="feature Icon">
      <figcaption class="featureTxt">
        <h3 class="featureTitle brandColorTxt"><?php echo get_post_meta($post->ID, '4-titulo-beneficio-2', true); ?></h3>
        <p class="featureP"><?php echo get_post_meta($post->ID, '5-texto-beneficio-2', true); ?></p>
      </figcaption>
    </figure>

    <figure class="feature sectionWhite">
      <img class="featureIcon" src="<?php echo get_template_directory_uri(); ?>/img/compraRecompra.png" alt="feature Icon">
      <figcaption class="featureTxt">
        <h3 class="featureTitle brandColorTxt"><?php echo get_post_meta($post->ID, '6-titulo-beneficio-3', true); ?></h3>
        <p class="featureP"><?php echo get_post_meta($post->ID, '7-texto-beneficio-3', true); ?></p>
      </figcaption>
    </figure>

  </div>
</section>

<section class="sectionPadding card256" id="queContainerINeed">
  <div class="redDot test" id="sectioNSummaryCardActivator"></div>
  <?php

  $taxonomy     = 'product_cat';
  // $orderby      = 'name';
  $show_count   = 0;      // 1 for yes, 0 for no
  $pad_counts   = 0;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no
  $title        = '';
  $empty        = 0;

  $args = array(
    'taxonomy'     => $taxonomy,
    // 'orderby'      => $orderby,
    'show_count'   => $show_count,
    'pad_counts'   => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li'     => $title,
    'hide_empty'   => $empty
  );




  $categories = get_categories( $args );
  if($categories) {
    foreach($categories as $category) { ?>
      <!-- echo  $category->name ; -->
      <style>
        #queContainerINeed.card<?php echo $category->term_id .' #card'. $category->term_id; ?>{
          display: flex;
        }
      </style>
      <article class="article2 containerNeeded" id="card<?php echo $category->term_id; ?>">
        <div class="sectionSummary Obse" data-observe="#sectioNSummaryCardActivator" data-unobserve="false">
          <h2 class="summaryTitle"><?php echo  $category->name; ?></h2>
          <p class="summaryTxt"><?php echo $category->description; ?></p>
        </div>
        <img class="article2Media" src="<?php echo wp_get_attachment_url( get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true ) ); ?>" alt="">
      </article>
    <?php } ?>


      <select name="cont_selector" class="btn" id="contSelector"  onchange="if (typeof(this.selectedIndex) != 'undefined') altClassFromSelector(this.value, '#queContainerINeed', 'sectionPadding')">
        <?php $i=0;
        // while($container->have_posts()){$container->the_post();
        foreach($categories as $category) { ?>
          <option class="contOption" name="option" <?php if ($i==0){ echo 'checked'; } ?>  value="card<?php echo $category->term_id; ?>"><?php echo  $category->name; ?></option>
        <?php $i++; } ?>
      </select>

  <?php } ?>
  <?php
  // $args=array(
  //   'post_type'=>'container',
  // );
  // $container=new WP_Query($args);



  // while($container->have_posts()){$container->the_post(); ?>
    <!-- <style>
    #queContainerINeed.card<?php echo get_the_id().' #card'.get_the_id() ; ?>{
      display: flex;
    }
    </style> -->
    <!-- <article class="article2 containerNeeded" id="card<?php echo get_the_id();?>">
      <hgroup class="sectionSummary">
        <h2 class="summaryTitle"><?php the_title(); ?></h2>
        <h4 class="summaryTxt"><?php the_content(); ?></h4>
      </hgroup>
      <img class="article2Media" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
    </article> -->
  <?php // } wp_reset_query(); ?>

  <?php
  // $args=array(
  //   'post_type'=>'container',
  //   'order' => 'ASC',
  // );
  // $container=new WP_Query($args);
  ?>
  <!-- <select name="cont_selector" class="btn" id="contSelector"  onchange="if (typeof(this.selectedIndex) != 'undefined') altClassFromSelector(this.value, '#queContainerINeed', 'sectionPadding')"> -->
    <?php
    $i=0;
    // while($container->have_posts()){$container->the_post(); ?>
      <!-- <option class="contOption" name="option" <?php if ($i==0){ echo 'checked'; } ?>  value="card<?php echo get_the_id();?>"><?php the_title(); ?></option> -->
      <?php // $i++; } wp_reset_query(); ?>
    <!-- </select> -->
</section>

<section class="sectionColor3 sectionPadding">
  <article class="articleCounter">
    <div class="counter">
      <div class="redDot" id="growUpActivator"></div>
      <div class="count countTitle">
        <p class="countNumber">+<span class="GrowUp Obse" data-observe="#growUpActivator" data-unobserve="true" data-target="30000">0</span></p>
        <p class="countTxt">CONTENEDORES VENDIDOS</p>
      </div>
      <div class="count countTitle">
        <p class="countNumber">+<span class="GrowUp Obse" data-observe="#growUpActivator" data-unobserve="true" data-target="3000">0</span></p>
        <p class="countTxt">CLIENTES SATISFECHOS</p>
      </div>
      <div class="count countTitle">
        <p class="countNumber">+<span class="GrowUp Obse" data-observe="#growUpActivator" data-unobserve="true" data-target="200">0</span></p>
        <p class="countTxt">CENTROS LOGÍSTICOS</p>
      </div>
      <div class="count countTitle">
        <p class="countNumber">+<span class="GrowUp Obse" data-observe="#growUpActivator" data-unobserve="true" data-target="30">0</span></p>
        <p class="countTxt">PAÍSES Y TERRITORIOS</p>
      </div>
    </div>
  </article>
</section>

<section class="sectionPadding">
  <article class="article2">
    <div class="redDot" id="sectioNSummaryAboutUsActivator"></div>
    <hgroup class="sectionSummary Obse" data-observe="#sectioNSummaryAboutUsActivator" data-unobserve="false">
      <h2 class="summaryTitle"><?php echo get_post_meta($post->ID, '8-titulo-bloque-1', true); ?></h2>
      <h4 class="summaryTxt brandColorTxt"><?php echo get_post_meta($post->ID, '9-texto-azul-bloque-1', true); ?></h4>
      <h4 class="summaryTxt"><?php echo get_post_meta($post->ID, '10-texto-negro-bloque-1', true); ?></h4>
    </hgroup>
    <img class="article2Media" src="<?php echo get_post_meta($post->ID, '13-foto-bloque-1', true); ?>" alt="">
  </article>
  <button class="btn"><a href="<?php echo get_post_meta($post->ID, '12-link-boton-bloque-1', true); ?>"><?php echo get_post_meta($post->ID, '11-texto-boton-bloque-1', true); ?></a></button>
</section>

<section class="sectionPadding sectionColor3">
  <article class="article2">
    <iframe class="article2Media" src="https://www.google.com/maps/d/embed?mid=17c08JkE4KqI6p3EPcDfsiIMtwDveG7D8" width="640" height="480"></iframe>
    <div class="redDot" id="sectioNSummarySilverSeaMundoActivator"></div>
    <hgroup class="sectionSummary Obse" data-observe="#sectioNSummarySilverSeaMundoActivator" data-unobserve="false">
      <h2 class="summaryTitle"><?php echo get_post_meta($post->ID, '14-titulo-bloque-2', true); ?></span></h2>
      <h4 class="summaryTxt brandColorTxt"><?php echo get_post_meta($post->ID, '15-texto-azul-bloque-2', true); ?></h4>
      <h4 class="summaryTxt"><?php echo get_post_meta($post->ID, '16-texto-negro1-bloque-2', true); ?></h4>
      <h4 class="summaryTxt"><?php echo get_post_meta($post->ID, '17-texto-negro2-bloque-2', true); ?></h4>
    </hgroup>
  </article>
</section>

<?php get_footer(); ?>
