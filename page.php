<?php get_header(); ?>

<main class="main">
  <?php while(have_posts()){the_post();the_content();} ?>
</main>

<?php get_footer(); ?>
