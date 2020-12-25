<?php get_header(); ?>

<?php $blog_id = get_option('page_for_posts'); ?>
<section class="grid sectionPadding blogSection">
  <hgroup class="divided_textgroup">
    <h1 class="divided_textgroup_title">
      <?php echo get_post_meta($blog_id, '3_titulo_blog', true); ?>
      <div class="textgroup_divider"></div>
    </h1>
    <h2 class="divided_textgroup_subtitle"><?php echo get_post_meta($blog_id, '2_subtitulo_blog', true); ?></h2>
  </hgroup>


  <a href="<?php the_permalink(); ?>" class="entry_super_card">
    <?php
    $args=array(
      'posts_per_page' => 1,
      'post_type'=>'post',
      'tag' => 'destacada',
    );
    $atf=new WP_Query($args);
    while($atf->have_posts()){
      $atf->the_post(); ?>
      <figure class="entry_super_card_figure">
        <figcaption class="entry_super_card_caption">Publicación destacada</figcaption>
        <img class="entry_super_card_img" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="Featured post IMG">
      </figure>
      <div class="entry_super_card_content">
        <hgroup class="super_card_divided_textgroup">
          <h3 class="super_card_divided_textgroup_title">
            <?php the_title(); ?>
          </h3>
          <div class="super_card_textgroup_divider"></div>
          <h4 class="super_card_divided_textgroup_subtitle">
            <?php the_excerpt(); ?>
          </h4>
        </hgroup>
        <?php
        $tags = wp_get_post_tags($post->ID);

        // $tags = get_tags(
        //   array(
        //     'hide_empty' => false
        //   )
        // );
        echo '
        <p class="entry_super_card_tags">
        <svg class="entry_super_card_tags_svg" width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g clip-path="url(#clip0)">
            <path d="M11.6705 5.31913L6.70451 0.330979C6.49353 0.119058 6.20738 1.56714e-06 5.90902 0H1.125C0.503672 0 0 0.50592 0 1.13002V5.93539C1.56018e-06 6.23509 0.118529 6.52252 0.329508 6.73444L5.29549 11.7226C5.7348 12.1639 6.44712 12.1639 6.88648 11.7226L11.6705 6.91722C12.1098 6.47592 12.1098 5.76043 11.6705 5.31913ZM2.625 3.76674C2.00367 3.76674 1.5 3.26082 1.5 2.63672C1.5 2.01262 2.00367 1.5067 2.625 1.5067C3.24633 1.5067 3.75 2.01262 3.75 2.63672C3.75 3.26082 3.24633 3.76674 2.625 3.76674ZM14.6705 6.91722L9.88648 11.7226C9.44714 12.1639 8.73483 12.1639 8.29549 11.7226L8.28705 11.7141L12.3666 7.6164C12.765 7.2162 12.9844 6.68413 12.9844 6.11818C12.9844 5.55222 12.765 5.02015 12.3666 4.61996L7.76712 0H8.90902C9.20738 1.56714e-06 9.49353 0.119058 9.70451 0.330979L14.6705 5.31913C15.1098 5.76043 15.1098 6.47592 14.6705 6.91722Z" fill="black"/>
          </g>
          <defs>
            <clipPath id="clip0">
              <rect width="15" height="12.0536" fill="white"/>
            </clipPath>
          </defs>
        </svg>
        ';
        foreach ($tags as $tag) {
          if($tag->name != 'Destacada'){
            echo '<span>' . $tag->name . '</span><span class="span_coma">,</span>&nbsp;';
          }
        }
        echo '</p>';
        ?>
        <div class="entry_super_card_bottom_interaction">
          <div class="entry_super_card_bottom_interaction_txt">
            <p class="author"><strong>Por </strong><i><?php the_author();?></i></p>
            <p class="date"><i><?php the_date();?></i></p>
          </div>
          <button class="btn icon_btn">
            LEER MÁS
            <svg class="icon_btn_svg" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z" fill="currentColor"/>
            </svg>
          </button>
        </div>
      </div>
    </a>
<?php } wp_reset_query(); ?>
</section>

<section class="grid sectionPadding blogSection">
  <div class="divided_textgroup">
    <h2 class="divided_textgroup_title divided_textgroup_title_2">Entradas recientes</h2>
    <div class="textgroup_divider textgroup_divider_2"></div>
  </div>
  <div class="entry_card_container" data-card="entry_card">
    <?php


          // Setup the custom meta-query args
          $exclude_featured_args = array(
            'tax_query'      => array(
              array(
                'taxonomy'  => 'post_tag',
                'field'     => 'slug',
                'terms'     => 'destacada',
                'operator'  => 'NOT IN',
              )
            )
          );
          // globalize $wp_query
          global $wp_query;
          // Merge custom query with $wp_query
          $merged_args = array_merge( $wp_query->query, $exclude_featured_args );
          // Query posts using the modified arguments
          $test = query_posts( $merged_args );
    while(have_posts()){the_post();

      entry_card();

    } wp_reset_query();
    echo ajax_paginator_2(get_pagenum_link());
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




<?php get_footer(); ?>
