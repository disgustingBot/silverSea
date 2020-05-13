<?php get_header(); ?>

<figure class="teamATF">
  <img class="teamATFImg" src="<?php echo get_post_meta( get_the_id(), 'Imagen_Cabecera' )[0]; ?>" alt="">
  <h1 class="teamATFTitle">Equipo de <br><span class="brandColorTxt">Silversea</span></h1>
  <hgroup class="sectionSummary teamSummary">
      <h3 class="summaryTxt brandColorTxt">Desde sus comienzos en el año 2016, Silversea nace como una empresa enfocada en el trading y leasing de contenedores marítimos a nivel mundial.</h3>
      <h4 class="summaryTxt">Dado los puntos de contacto con toda la cadena de logística en el 2017 se crea la unidad de Silvercargo. Es bajo la misma compañía que se desarrolla y apoya a toda la gama de clientes que tenemos a nivel mundial, que consideraban importante que podamos darle un soporte más amplio. Teniendo en cuenta nuestra red de agentes en más de 70 países, podemos brindarle soporte local en cada lugar, así atendiéndolos de manera personalizada.
        En setiembre de 2017, abrimos nuestra oficina en Barcelona, siendo hoy nuestro head office y base de operaciones globales para todas las áreas de negocio que atiende SILVERSEA
        Hoy podemos decir que Silversea es una empresa dedicada al comercio exterior y logística internacional, con oficinas propias en Europa y Sudamérica. La empresa se encuentra en pleno crecimiento, que año tras año se consolida en el mercado y es identificada por la confianza, la transparencia el dinamismo y por sobre todas las cosas los grandes profesionales y la calidad humana.</h4>
      </hgroup>
</figure>



<div class="teamSection">
  <div class="areaSelectorCont">
    <h3 class="areaSelector"><strong>Áreas</strong></h3>
    <div class="areaSelector">
      <p class="areaSelectorTxt" >Sales</p>
    </div>
    <div class="areaSelector">
      <p class="areaSelectorTxt" >Logistics</p>
    </div>
    <div class="areaSelector">
      <p class="areaSelectorTxt" >Administration</p>
    </div>
    <div class="areaSelector">
      <p class="areaSelectorTxt" >Management</p>
    </div>
    <div class="areaSelector">
      <p class="areaSelectorTxt" >C.E.O.</p>
    </div>
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


      <article class="card teamCard">
        <img class="teamCardImg teamCardImg2 rowcol1" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
        <img class="teamCardImg teamCardImg1 rowcol1" src="<?php echo get_post_meta($post->ID, 'Imagen_secundaria', true); ?>" alt="">
        <div class="teamCardTxt">
          <p class="teamCardName"><?php the_title(); ?></p>
          <p class="teamCardPosition"><?php echo get_post_meta($post->ID, 'Cargo', true); ?></p>
          <a class="teamCardLinkedin brandColorTxt" href="<?php echo get_post_meta( get_the_id(), 'Linkedin' )[0]; ?>" >LinkedIn</a>
          <p class="teamCardPhone"><?php echo get_post_meta( get_the_id(), 'Telefono' )[0]; ?></p>
          <p class="teamCardMail"><?php echo get_post_meta( get_the_id(), 'Correo' )[0]; ?></p>
        </div>
      </article>


    <?php } wp_reset_query(); ?>

    <?php
    $args=array(
      'post_type'=>'equipo',
      'tax_query' => array(
        array(
          'taxonomy' => 'area',    // taxonomy name
          'field' => 'slug',      // term_id, slug or name
          'terms' => 'CEO',      // term id, term slug or term name
        )
      )
    );
    $equipo=new WP_Query();
    $equipo->query($args);

    while($equipo->have_posts()){$equipo->the_post(); ?>


      <article class="card teamCard">
        <img class="teamCardImg teamCardImg2 rowcol1" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
        <img class="teamCardImg teamCardImg1 rowcol1" src="<?php echo get_post_meta($post->ID, 'Imagen_secundaria', true); ?>" alt="">
        <div class="teamCardTxt">
          <p class="teamCardName"><?php the_title(); ?></p>
          <p class="teamCardPosition"><?php echo get_post_meta($post->ID, 'Cargo', true); ?></p>
          <a class="teamCardLinkedin brandColorTxt" href="<?php echo get_post_meta( get_the_id(), 'Linkedin' )[0]; ?>" >LinkedIn</a>
          <p class="teamCardPhone"><?php echo get_post_meta( get_the_id(), 'Telefono' )[0]; ?></p>
          <p class="teamCardMail"><?php echo get_post_meta( get_the_id(), 'Correo' )[0]; ?></p>
        </div>
      </article>


    <?php } wp_reset_query(); ?>

    <?php
    $args=array(
      'post_type'=>'equipo',
      'tax_query' => array(
        array(
          'taxonomy' => 'area',    // taxonomy name
          'field' => 'slug',      // term_id, slug or name
          'terms' => 'Logistic',      // term id, term slug or term name
        )
      )
    );
    $equipo=new WP_Query();
    $equipo->query($args);

    while($equipo->have_posts()){$equipo->the_post(); ?>


      <article class="card teamCard">
        <img class="teamCardImg teamCardImg2 rowcol1" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
        <img class="teamCardImg teamCardImg1 rowcol1" src="<?php echo get_post_meta($post->ID, 'Imagen_secundaria', true); ?>" alt="">
        <div class="teamCardTxt">
          <p class="teamCardName"><?php the_title(); ?></p>
          <p class="teamCardPosition"><?php echo get_post_meta($post->ID, 'Cargo', true); ?></p>
          <a class="teamCardLinkedin brandColorTxt" href="<?php echo get_post_meta( get_the_id(), 'Linkedin' )[0]; ?>" >LinkedIn</a>
          <p class="teamCardPhone"><?php echo get_post_meta( get_the_id(), 'Telefono' )[0]; ?></p>
          <p class="teamCardMail"><?php echo get_post_meta( get_the_id(), 'Correo' )[0]; ?></p>
        </div>
      </article>


    <?php } wp_reset_query(); ?>

    <?php
    $args=array(
      'post_type'=>'equipo',
      'tax_query' => array(
        array(
          'taxonomy' => 'area',    // taxonomy name
          'field' => 'slug',      // term_id, slug or name
          'terms' => 'Management',      // term id, term slug or term name
        )
      )
    );
    $equipo=new WP_Query();
    $equipo->query($args);

    while($equipo->have_posts()){$equipo->the_post(); ?>


      <article class="card teamCard">
        <img class="teamCardImg teamCardImg2 rowcol1" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
        <img class="teamCardImg teamCardImg1 rowcol1" src="<?php echo get_post_meta($post->ID, 'Imagen_secundaria', true); ?>" alt="">
        <div class="teamCardTxt">
          <p class="teamCardName"><?php the_title(); ?></p>
          <p class="teamCardPosition"><?php echo get_post_meta($post->ID, 'Cargo', true); ?></p>
          <a class="teamCardLinkedin brandColorTxt" href="<?php echo get_post_meta( get_the_id(), 'Linkedin' )[0]; ?>" >LinkedIn</a>
          <p class="teamCardPhone"><?php echo get_post_meta( get_the_id(), 'Telefono' )[0]; ?></p>
          <p class="teamCardMail"><?php echo get_post_meta( get_the_id(), 'Correo' )[0]; ?></p>
        </div>
      </article>


    <?php } wp_reset_query(); ?>

    <?php
    $args=array(
      'post_type'=>'equipo',
      'tax_query' => array(
        array(
          'taxonomy' => 'area',    // taxonomy name
          'field' => 'slug',      // term_id, slug or name
          'terms' => 'Administration',      // term id, term slug or term name
        )
      )
    );
    $equipo=new WP_Query();
    $equipo->query($args);

    while($equipo->have_posts()){$equipo->the_post(); ?>


      <article class="card teamCard">
        <img class="teamCardImg teamCardImg2 rowcol1" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
        <img class="teamCardImg teamCardImg1 rowcol1" src="<?php echo get_post_meta($post->ID, 'Imagen_secundaria', true); ?>" alt="">
        <div class="teamCardTxt">
          <p class="teamCardName"><?php the_title(); ?></p>
          <p class="teamCardPosition"><?php echo get_post_meta($post->ID, 'Cargo', true); ?></p>
          <a class="teamCardLinkedin brandColorTxt" href="<?php echo get_post_meta( get_the_id(), 'Linkedin' )[0]; ?>" >LinkedIn</a>
          <p class="teamCardPhone"><?php echo get_post_meta( get_the_id(), 'Telefono' )[0]; ?></p>
          <p class="teamCardMail"><?php echo get_post_meta( get_the_id(), 'Correo' )[0]; ?></p>
        </div>
      </article>


    <?php } wp_reset_query(); ?>
  </div>


</div>


<?php get_footer(); ?>
