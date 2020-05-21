<?php get_header(); ?>


<section class="teamATF">
  <hgroup class="sectionSummary teamATFSummary sectionColor3">
    <h1 class="tamATFTitle"><?php echo get_post_meta($post->ID, '1-equipo-titulo-negro', true); ?> <span class="brandColorTxt"><?php echo get_post_meta($post->ID, '2-equipo-titulo-azul', true); ?></span></h1>
    <h5 class="summaryTxt"><?php echo get_post_meta($post->ID, '2-equipo-texto', true); ?></h5>
  </hgroup>
</section>



<section class="teamSection" id="teamSection">
  <div class="areaSelectorCont">
    <h3 class="areaSelectorTitle"><strong>Conoce nuestro <span class="brandColorTxt">Equipo</span></strong></h3>

    <div class="areaSelector direccion">
      <p class="areaSelectorTxt" onclick="altClassFromSelector('direccion', '#teamSection', 'teamSection');">Dirección</p>
    </div>

    <div class="areaSelector finance-administration">
      <p class="areaSelectorTxt" onclick="altClassFromSelector('finance-administration', '#teamSection', 'teamSection');" >Finance & Administration</p>
    </div>

    <div class="areaSelector sales-department-cis-region">
      <p class="areaSelectorTxt" onclick="altClassFromSelector('sales-department-cis-region', '#teamSection', 'teamSection');" >Sales Department CIS Region</p>
    </div>

    <div class="areaSelector sales-department-europe">
      <p class="areaSelectorTxt" onclick="altClassFromSelector('sales-department-europe', '#teamSection', 'teamSection');" >Sales Department Europe</p>
    </div>

    <div class="areaSelector sales-department-latam">
      <p class="areaSelectorTxt" onclick="altClassFromSelector('sales-department-latam', '#teamSection', 'teamSection')" >Sales Department LATAM</p>
    </div>

    <div class="areaSelector supply-operations">
      <p class="areaSelectorTxt" onclick="altClassFromSelector('supply-operations', '#teamSection', 'teamSection')" >Supply & Operations</p>
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
          <p class="teamCardPhone teamCardNone"><?php echo get_post_meta( get_the_id(), 'Telefono' )[0]; ?></p>
          <!-- <p class="teamCardMail teamCardNone"><?php echo get_post_meta( get_the_id(), 'Correo' )[0]; ?></p> -->
        </div>
      </article>

    <?php } wp_reset_query(); ?>

  </div>
</section>
<section class="teamATFImgCont ">
  <div class="teamCTA rowcol1">
    <h3 class="teamCTATitle brandColorTxt">LOREM IPSUM DOLOR SIT.</h3>
    <p class="teamCTATxt">Suspendisse pulvinar id diam in consequat. Praesent fringilla elementum dapibus. Aenean purus lectus, egestas vel massa ut, gravida aliquam tortor.</p>
    <button class="btn">Contáctanos</button>
  </div>
</section>
<img class="teamATFImg" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">

<?php get_footer(); ?>
