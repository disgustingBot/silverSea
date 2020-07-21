<?php get_header(); ?>


<section class="teamATF">
  <hgroup class="sectionSummary teamATFSummary sectionColor3">
    <h1 class="tamATFTitle"><?php echo get_post_meta($post->ID, '1-equipo-titulo', true); ?> <span class="brandColorTxt"><?php echo get_post_meta($post->ID, '2-equipo-titulo-azul', true); ?></span></h1>
    <ul class="">
      <p class="summaryTxt otroTxt txtCenter"><?php echo get_post_meta($post->ID, '21-equipo-texto', true); ?></p>
      <li class="summaryTxt otroTxt"><span class="brandColorTxt"><?php echo get_post_meta($post->ID, '22-equipo-valor-1', true); ?></span> <?php echo get_post_meta($post->ID, '23-equipo-valor-1-texto', true); ?></li>
      <li class="summaryTxt otroTxt"><span class="brandColorTxt"><?php echo get_post_meta($post->ID, '24-equipo-valor-2', true); ?></span> <?php echo get_post_meta($post->ID, '25-equipo-valor-2-texto', true); ?></li>
      <li class="summaryTxt otroTxt"><span class="brandColorTxt"><?php echo get_post_meta($post->ID, '26-equipo-valor-3', true); ?></span> <?php echo get_post_meta($post->ID, '27-equipo-valor-3-texto', true); ?></li>
    </ul>
  </hgroup>
</section>



<section class="teamSection" id="teamSection">
  <div class="areaSelectorCont">
    <h3 class="areaSelectorTitle"><strong>Conoce nuestro <span class="brandColorTxt">Equipo</span></strong></h3>

    <div class="areaSelector direccion">
      <p class="areaSelectorTxt" onclick="altClassFromSelector('direccion', '#teamSection', 'teamSection');">Dirección</p>
    </div>

    <div class="areaSelector finance-administration">
      <p class="areaSelectorTxt" onclick="altClassFromSelector('finance-administration', '#teamSection', 'teamSection');" >Administración y finanzas</p>
    </div>

    <div class="areaSelector sales">
      <p class="areaSelectorTxt" onclick="altClassFromSelector('sales', '#teamSection', 'teamSection');" >Departamento comercial</p>
    </div>

    <div class="areaSelector supply-operations">
      <p class="areaSelectorTxt" onclick="altClassFromSelector('supply-operations', '#teamSection', 'teamSection')" >Operaciones & Compras</p>
    </div>

    <div class="areaSelector marketing">
      <p class="areaSelectorTxt" onclick="altClassFromSelector('marketing', '#teamSection', 'teamSection')" >Marketing</p>
    </div>

  </div>


  <div class="teamCardsContGradient"></div>
  <div id="teamCardsContainer" class="teamCardsContainer">
    <?php
    $args=array(
      'post_type'=>'equipo',
      'posts_per_page'=> 100,
    );
    $equipo=new WP_Query();
    $equipo->query($args);

    while($equipo->have_posts()){$equipo->the_post(); ?>
      <?php
      $terms = get_the_terms( get_the_id(), 'area' );
      ?>

      <article class="card teamCard <?php echo $terms[0]->slug; ?>">
        <img class="teamCardImg teamCardImg2 rowcol1" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
        <img class="teamCardImg teamCardImg1 rowcol1" src="<?php echo get_post_meta($post->ID, 'Imagen_secundaria', true); ?>" alt="">
        <div class="teamCardTxt">
          <p class="teamCardName teamCardBlock"><?php the_title(); ?></p>
          <p class="teamCardPosition teamCardBlock"><?php echo get_post_meta($post->ID, 'Cargo', true); ?></p>
          <a class="teamCardLinkedin teamCardNone brandColorTxt" href="<?php echo get_post_meta( get_the_id(), 'Linkedin' )[0]; ?>" >LinkedIn</a>
          <!-- <p class="teamCardPhone teamCardNone"><?php  echo get_post_meta( get_the_id(), 'Telefono' )[0]; ?></p> -->
          <!-- <p class="teamCardMail teamCardNone"><?php // echo get_post_meta( get_the_id(), 'Correo' )[0]; ?></p> -->
        </div>
      </article>

    <?php } wp_reset_query(); ?>
    <div style="width: 80px">

    </div>

  </div>
</section>
<section class="teamATFImgCont ">
  <div class="teamValues rowcol1">
    <p class="valueItem brandColorTxt Obse" data-observe="#valueVisibleActivator">INTENSIDAD</p>
    <p class="valueItem brandColorTxt Obse" data-observe="#valueVisibleActivator">CREATIVIDAD</p>
    <p class="valueItem brandColorTxt Obse" data-observe="#valueVisibleActivator">COLABORACIÓN</p>
    <p class="valueItem brandColorTxt Obse" data-observe="#valueVisibleActivator">TRANSFORMACIÓN</p>
    <div class="redDot" id="valueVisibleActivator"></div>
  </div>
  <img class="teamATFImg" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
</section>


<?php get_footer(); ?>
