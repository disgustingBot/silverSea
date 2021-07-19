<?php get_header(); ?>
<section class="hero">
  <?php

  $config = array(
    'slug' => get_post_meta( $post->ID, 'A_portada_background_movil', true ),
    'class' => 'hero_bg rowcol1 onlyMobileF',
    'sizes' => [['768', '100']],
    'default_size' => '100',
    'width' => 1200,
    'height' => 800,
  );
  responsive_img($config);
  ?>
  <?php

  $config = array(
    'id' => get_post_thumbnail_id(get_the_ID()),
    'class' => 'hero_bg rowcol1 onlyDesktopF',
    'sizes' => [['768', '100']],
    'default_size' => '100',
    'width' => 1200,
    'height' => 800,
  );
  responsive_img($config);
  ?>
  <div class="hero_content rowcol1">
    <h1 class="hero_title"><?php echo get_the_title() ?></h1>
    <p class="hero_text onlyDesktopG"><?php echo get_the_excerpt() ?></p>
    <p class="hero_text onlyMobileG"><?php echo get_post_meta($post->ID, 'A_extracto_movil', true); ?></p>
    <div class="blurb_container">
      <div class="blurb">
        <?php
        $config = array(
          'slug' => get_post_meta( $post->ID, 'A_portada_icono_1', true ),
          'class' => 'blurb_img',
          'sizes' => [['768', '100']],
          'default_size' => '200',
          'width' => 300,
          'height' => 300,
        );
        responsive_img($config);
        ?>
        <h3 class="blurb_title"><?php echo get_post_meta($post->ID, 'A_portada_texto_1', true); ?></h3>
      </div>
      <div class="blurb">
        <?php
        $config = array(
          'slug' => get_post_meta( $post->ID, 'A_portada_icono_2', true ),
          'class' => 'blurb_img',
          'sizes' => [['768', '100']],
          'default_size' => '200',
          'width' => 300,
          'height' => 300,
        );
        responsive_img($config);
        ?>
        <h3 class="blurb_title"><?php echo get_post_meta($post->ID, 'A_portada_texto_2', true); ?></h3>
      </div>
      <div class="blurb">
        <?php
        $config = array(
          'slug' => get_post_meta( $post->ID, 'A_portada_icono_3', true ),
          'class' => 'blurb_img',
          'sizes' => [['768', '100']],
          'default_size' => '200',
          'width' => 300,
          'height' => 300,
        );
        responsive_img($config);
        ?>
        <h3 class="blurb_title"><?php echo get_post_meta($post->ID, 'A_portada_texto_3', true); ?></h3>
      </div>
    </div>
  </div>
</section>
<img class="media_perk_container_deco deco_2 onlyDesktopF" src="<?php echo get_template_directory_uri(); ?>/assets/service_deco_2.png" alt="Imágen cartográfica decorativa">
<section class="sectionPadding media_perk_container">
  <img class="media_perk_container_deco deco_1 onlyDesktopF" src="<?php echo get_template_directory_uri(); ?>/assets/service_deco_1.png" alt="Imágen cartográfica decorativa">
  <div class="media_perk Obse" data-observe="#media_perk_redDot1" data-unobserve="true">
    <div class="media_perk_paragraph">
      <h4 class="media_perk_title"><?php echo get_post_meta($post->ID, 'B_bloque_1_titulo_1', true); ?></h4>
      <p class="media_perk_text"><?php echo get_post_meta($post->ID, 'B_bloque_1_texto_1', true); ?></p>
    </div>
    <div class="media_perk_img_container">

      <?php
      $config = array(
        'slug' => get_post_meta( $post->ID, 'B_bloque_1_imagen_1', true ),
        'class' => 'media_perk_img',
        'sizes' => [['768', '100']],
        'default_size' => '200',
        'width' => 720,
        'height' => 856,
      );
      responsive_img($config);
      ?>
      <div class="media_perk_deco"></div>
    </div>
    <div class="redDot" id="media_perk_redDot1"></div>
  </div>
  <div class="media_perk reverse Obse" data-observe="#media_perk_redDot2" data-unobserve="true">
    <?php
    $config = array(
      'slug' => get_post_meta( $post->ID, 'B_bloque_1_imagen_2', true ),
      'class' => 'media_perk_img alt',
      'sizes' => [['768', '100']],
      'default_size' => '200',
      'width' => 720,
      'height' => 856,
    );
    responsive_img($config);
    ?>
    <div class="media_perk_paragraph">
      <h4 class="media_perk_title"><?php echo get_post_meta($post->ID, 'B_bloque_1_titulo_2', true); ?></h4>
      <p class="media_perk_text"><?php echo get_post_meta($post->ID, 'B_bloque_1_texto_2', true); ?></p>
    </div>
    <div class="redDot" id="media_perk_redDot2"></div>
  </div>
  <div class="media_perk Obse" data-observe="#media_perk_redDot3" data-unobserve="true">
    <div class="media_perk_paragraph">
      <h4 class="media_perk_title"><?php echo get_post_meta($post->ID, 'B_bloque_1_titulo_3', true); ?></h4>
      <p class="media_perk_text"><?php echo get_post_meta($post->ID, 'B_bloque_1_texto_3', true); ?></p>
    </div>
    <div class="media_perk_img_container">
      <?php
      $config = array(
        'slug' => get_post_meta( $post->ID, 'B_bloque_1_imagen_3', true ),
        'class' => 'media_perk_img',
        'sizes' => [['768', '100']],
        'default_size' => '200',
        'width' => 720,
        'height' => 856,
      );
      responsive_img($config);
      ?>
      <div class="media_perk_deco"></div>
    </div>
    <div class="redDot" id="media_perk_redDot3"></div>
  </div>
</section>
<section class="hero alt hero_padding">
  <div class="hero_content">
    <h3 class="hero_title"><?php echo get_post_meta($post->ID, 'CA_bloque_2_titulo_principal', true); ?></h3>
  </div>
  <div class="blurb_container alt">
    <div class="blurb">
      <?php
      $config = array(
        'slug' => get_post_meta( $post->ID, 'CB_bloque_2_benefincio_1_icono', true ),
        'class' => 'blurb_img',
        'sizes' => [['768', '100']],
        'default_size' => '200',
        'width' => 300,
        'height' => 300,
      );
      responsive_img($config);
      ?>
      <h3 class="blurb_title"><?php echo get_post_meta($post->ID, 'CB_bloque_2_benefincio_1_titulo', true); ?></h3>
      <p class="blurb_txt"><?php echo get_post_meta($post->ID, 'CB_bloque_2_benefincio_1_texto', true); ?></p>
    </div>
    <div class="blurb">
      <?php
      $config = array(
        'slug' => get_post_meta( $post->ID, 'CB_bloque_2_benefincio_2_icono', true ),
        'class' => 'blurb_img',
        'sizes' => [['768', '100']],
        'default_size' => '200',
        'width' => 300,
        'height' => 300,
      );
      responsive_img($config);
      ?>
      <h3 class="blurb_title"><?php echo get_post_meta($post->ID, 'CB_bloque_2_benefincio_2_titulo', true); ?></h3>
      <p class="blurb_txt"><?php echo get_post_meta($post->ID, 'CB_bloque_2_benefincio_2_texto', true); ?></p>
    </div>
    <div class="blurb">
      <?php
      $config = array(
        'slug' => get_post_meta( $post->ID, 'CB_bloque_2_benefincio_3_icono', true ),
        'class' => 'blurb_img',
        'sizes' => [['768', '100']],
        'default_size' => '200',
        'width' => 300,
        'height' => 300,
      );
      responsive_img($config);
      ?>
      <h3 class="blurb_title"><?php echo get_post_meta($post->ID, 'CB_bloque_2_benefincio_3_titulo', true); ?></h3>
      <p class="blurb_txt"><?php echo get_post_meta($post->ID, 'CB_bloque_2_benefincio_3_texto', true); ?></p>
    </div>
  </div>
  <div class="blurb_container alt">
    <div class="blurb">
      <?php
      $config = array(
        'slug' => get_post_meta( $post->ID, 'CB_bloque_2_benefincio_4_icono', true ),
        'class' => 'blurb_img',
        'sizes' => [['768', '100']],
        'default_size' => '200',
        'width' => 300,
        'height' => 300,
      );
      responsive_img($config);
      ?>
      <h3 class="blurb_title"><?php echo get_post_meta($post->ID, 'CB_bloque_2_benefincio_4_titulo', true); ?></h3>
      <p class="blurb_txt"><?php echo get_post_meta($post->ID, 'CB_bloque_2_benefincio_4_texto', true); ?></p>
    </div>
    <div class="blurb">
      <?php
      $config = array(
        'slug' => get_post_meta( $post->ID, 'CB_bloque_2_benefincio_5_icono', true ),
        'class' => 'blurb_img',
        'sizes' => [['768', '100']],
        'default_size' => '200',
        'width' => 300,
        'height' => 300,
      );
      responsive_img($config);
      ?>
      <h3 class="blurb_title"><?php echo get_post_meta($post->ID, 'CB_bloque_2_benefincio_5_titulo', true); ?></h3>
      <p class="blurb_txt"><?php echo get_post_meta($post->ID, 'CB_bloque_2_benefincio_5_texto', true); ?></p>
    </div>
  </div>
  <a href="<?php echo get_post_meta($post->ID, 'D_boton_inferior_link', true); ?>" class="btn alt">
    <?php echo get_post_meta($post->ID, 'D_boton_inferior_texto', true); ?>
  </a>
</section>

<div class="white_space"></div>
<img class="media_perk_container_deco deco_3 onlyDesktopF" src="<?php echo get_template_directory_uri(); ?>/assets/service_deco_3.png" alt="Imágen cartográfica decorativa">

<?php get_footer(); ?>
