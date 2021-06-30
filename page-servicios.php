<?php get_header(); ?>
<section class="hero">
  <?php

  $config = array(
    'id' => get_post_thumbnail_id(get_the_ID()),
    'class' => 'frontPageATFBg rowcol1',
    'sizes' => [['768', '100']],
    'default_size' => '100',
    'width' => 1200,
    'height' => 800,
  );
  responsive_img($config);
  ?>
</section>


<?php get_footer(); ?>
