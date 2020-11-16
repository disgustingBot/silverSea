<?php get_header(); ?>

<section class="sectionPadding blogSection clientesATF">
  <hgroup class="divided_textgroup">
    <h1 class="divided_textgroup_title">
      Clientes de <span style="color: #0674BB;">SILVERSEA</span>
      <div class="textgroup_divider"></div>
    </h1>
    <h2 class="divided_textgroup_subtitle">Estos son los clientes satisfechos y testimonios del éxito de SILVERSEA. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sed varius magna, sit amet interdum erat.</h2>
  </hgroup>

  <div class="col6_squared_info_container">
    <?php
    $args = array(
      'post_type'=>'clientes',
      'posts_per_page' => 18,
    );
    $clientes=new WP_Query($args);
    while($clientes->have_posts()){$clientes->the_post();?>
        <figure class="squared_info">
          <img class="squared_info_picture rowcol1" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="Logos de clientes">
          <figcaption class="squared_info_caption rowcol1">
            <p class="squared_info_title"><?php the_title(); ?></p>
            <p class="squared_info_txt"><?php echo get_the_excerpt(); ?></p>
          </figcaption>
        </figure>
      </quote>
    <?php } ?>
  </div>

</section>



<!-- <section class="clientes_testimonials">
  <?php
  $args = array(
    'post_type'=>'testimonials',
  );
  $testimonials=new WP_Query($args);
  while($testimonials->have_posts()){$testimonials->the_post();?>
    <quote class="testimonial testimonialCarusel Element">
      <div class="testimonialTxt mainTxtType1">
        <h4 class="testimonialAuthor"><?php the_title(); ?></h4>
        <div class="testimonialQuote"><?php the_content(); ?></div>
      </div>
    </quote>
  <?php } ?>
</section> -->

<?php get_footer(); ?>
