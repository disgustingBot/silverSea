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
      <h2 class="divided_textgroup_title divided_textgroup_title_2">Entradas relacionadas</h2>
      <div class="textgroup_divider textgroup_divider_2"></div>
    </div>

    <div class="entry_card_container">
      <?php




      $orig_post = $post;
      global $post;
      $tags = wp_get_post_tags($post->ID);
      if ($tags) {

        $tag_ids = array();
        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
        $args=array(
          'tag__in' => $tag_ids,
          'post__not_in' => array($post->ID),
          // 'post_type'=>'post',
          'ignore_sticky_posts'=>1,
          'posts_per_page' => '3',
        );
        $related=new WP_Query($args);
        while($related->have_posts()){ $related->the_post();

          entry_card();

        }
        $post = $orig_post;
        wp_reset_query();
      }



      ?>
    </div>




  </section>

  <banner class="newsletter_banner">
    <h3 class="newsletter_banner_title"><?php echo get_post_meta($blog_id, '4_titulo_newsletter', true); ?></h3>
    <h4 class="newsletter_banner_subtitle"><?php echo get_post_meta($blog_id, '5_subtitulo_newsletter', true); ?></h4>
    <form class="newsletter_banner_form" action="sendStuff">
      <input class="newsletter_banner_input" type="text" placeholder="Escribe tu nombre aquí...." required>
      <input class="newsletter_banner_input" type="email" placeholder="Escribe tu email aquí...." required>
      <div class="finalizarConsultaCheckboxes">
        <input id="privacidad" type="checkbox" required>
        <label for="privacidad" class="termsDescription">*Acepto la <a href="https://silverseacontainers.com/privacy-policy/" target="_blank" style="text-decoration: underline;">Política de privacidad</a> de Silversea</label>
      </div>
      <button class="icon_btn newsletter_banner_submit" type="submit" value=""><p><?php echo get_post_meta($blog_id, '6_boton_newsletter', true); ?></p></button>
    </form>
  </banner>




<?php } wp_reset_query(); ?>
<?php get_footer(); ?>
