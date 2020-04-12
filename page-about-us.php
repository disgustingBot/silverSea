<?php get_header(); ?>
<?php while(have_posts()){the_post(); ?>
<section class="ATF aboutUsATF">
  <img class="lazy rowcol1" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
  <div class="ATFWording rowcol1">
    <?php echo the_content(); ?>
  </div>
  <?php } wp_reset_query(); ?>
</section>


















<?php get_footer(); ?>
