<?php get_header(); ?>


<div class="teamSection">
  <div class="teamHandler">
    <p>option 1</p>
    <p>option 2</p>
    <p>option 3</p>
    <p>option 4</p>
  </div>
  <div class="teamCardsContainer">
    <?php
    $args=array(
      'post_type'=>'equipo',
      'tax_query' => array(
        array(
          'taxonomy' => 'area',    // taxonomy name
          'field' => 'slug',      // term_id, slug or name
          'terms' => 'sales',      // term id, term slug or term name
        )
      )
    );
    $equipo=new WP_Query();
    $equipo->query($args);

    while($equipo->have_posts()){$equipo->the_post(); ?>

      <div class="flippingCardContainer">
        <img class="teamCardImg2" src="<?php echo get_post_meta($post->ID, 'Imagen_secundaria', true); ?>" alt="">
        <article class="card teamCard">
          <img class="teamCardImg" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
          <p class="cardName"><?php the_title(); ?></p>
          <p class="cardMail"><?php echo get_post_meta( get_the_id(), 'Correo' )[0]; ?></p>
          <a href="<?php echo get_post_meta( get_the_id(), 'Linkedin' )[0]; ?>" class="cardLinkedin">LinkedIn</a>
          <p class="cardPhone"><?php echo get_post_meta( get_the_id(), 'Telefono' )[0]; ?></p>
        </article>
      </div>

    <?php } wp_reset_query(); ?>
  </div>


</div>


<?php get_footer(); ?>
