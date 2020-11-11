<?php get_header(); ?>
<?php $blog_id = get_option('page_for_posts'); ?>
<?php while(have_posts()){the_post(); ?>

  <section class="sectionPadding blogATF blogSection">
    <div class="captioned_img_container">
      <img class="captioned_img" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="Post featured image">
      <div class="captioned_img_caption">
        <i class="author"><strong>Por: </strong><?php the_author();?></i>
        <i class="date"><?php the_date();?></i>
      </div>
    </div>
    <hgroup class="super_card_divided_textgroup">
      <h1 class="super_card_divided_textgroup_title">
        <?php the_title(); ?>
      </h1>
      <div class="super_card_textgroup_divider"></div>
      <h2 class="super_card_divided_textgroup_subtitle">
        <?php the_excerpt(); ?>
      </h2>
    </hgroup>
  </section>


  <main class="main">
    <?php echo the_content(); ?>
  </main>

  <section class="grid sectionPadding blogSection">
    <div class="divided_textgroup">
      <h2 class="divided_textgroup_title divided_textgroup_title_2">Entradas recientes</h2>
      <div class="textgroup_divider textgroup_divider_2"></div>
    </div>
    <div class="entry_card_container">
      <?php while(have_posts()){the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="entry_card">
          <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="Post featured image">
          <div class="entry_card_caption">
            <p class="entry_card_title"><?php the_title(); ?></p>
            <div class="textgroup_divider"></div>
            <p class="entry_card_excerpt"><?php echo excerpt(70); ?></p>
          </div>
        </a>
      <?php } wp_reset_query(); ?>
    </div>
  </section>

  <banner class="newsletter_banner">
    <h3 class="newsletter_banner_title"><?php echo get_post_meta($blog_id, '4_titulo_newsletter', true); ?></h3>
    <h4 class="newsletter_banner_subtitle"><?php echo get_post_meta($blog_id, '5_subtitulo_newsletter', true); ?></h4>
    <form class="newsletter_banner_form" action="sendStuff">
      <input class="newsletter_banner_input" type="text" placeholder="Escribe tu nombre aquí....">
      <input class="newsletter_banner_input" type="email" placeholder="Escribe tu email aquí....">
      <button class="icon_btn newsletter_banner_submit" type="submit" value=""><p><?php echo get_post_meta($blog_id, '6_boton_newsletter', true); ?></p></button>
    </form>
  </banner>


<?php } wp_reset_query(); ?>
<?php get_footer(); ?>
