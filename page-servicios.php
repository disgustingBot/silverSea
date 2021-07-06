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
    <p class="hero_text"><?php echo get_the_excerpt() ?></p>
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
        <div class="media_perk_img_container">
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
        </div>
        <h3 class="blurb_title"><?php echo get_post_meta($post->ID, 'A_portada_texto_2', true); ?></h3>
      </div>
      <div class="blurb">
        <div class="media_perk_img_container">
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
        </div>
        <h3 class="blurb_title"><?php echo get_post_meta($post->ID, 'A_portada_texto_3', true); ?></h3>
      </div>
    </div>
  </div>
</section>
<section class="sectionPadding media_perk_container">
  <div class="media_perk">
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
      <div class="media_perkg_deco"></div>
    </div>
  </div>
  <div class="media_perk reverse">
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
  </div>
  <div class="media_perk">
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
      <div class="media_perkg_deco"></div>
    </div>
  </div>
</section>


<?php get_footer(); ?>
