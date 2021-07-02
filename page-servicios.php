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
<section style="height:500px;"></section>


<?php get_footer(); ?>
