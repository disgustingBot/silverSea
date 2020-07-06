<?php get_header(); ?>
<?php while(have_posts()){the_post(); ?>
  <section class="ATF aboutUsATF">
    <img class="aboutUsATFIMG lazy rowcol1" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
    <hgroup class="ATFWording rowcol1">
      <h1 class="AboutUsTitle"><?php echo get_post_meta($post->ID, 'A-about-titulo-portada', true); ?></h1>
      <h4 class="aboutUsSubtitle"><?php echo get_post_meta($post->ID, 'B-about-texto-portada', true); ?></h4>
    </hgroup>
  <?php } wp_reset_query(); ?>
</section>

<div class="timelineCont sectionPadding">
  <ul class="timeline">
    <h3 class="timelineTitle brandColorTxt"><?php echo get_post_meta($post->ID, 'C-titulo-historia', true); ?></h3>
    <li class="event">
      <h5><?php echo get_post_meta($post->ID, 'D-anio-1', true); ?></h5>
      <p><?php echo get_post_meta($post->ID, 'E-anio-1-texto', true); ?></p>
    </li>
    <li class="event">
      <h5><?php echo get_post_meta($post->ID, 'F-anio-2', true); ?></h5>
      <p><?php echo get_post_meta($post->ID, 'G-anio-2-texto', true); ?></p>
    </li>
    <li class="event">
      <h5><?php echo get_post_meta($post->ID, 'H-anio-3', true); ?></h5>
      <p><?php echo get_post_meta($post->ID, 'I-anio-3-texto', true); ?></p>
    </li>
    <li class="event">
      <h5><?php echo get_post_meta($post->ID, 'J-anio-4', true); ?></h5>
      <p><?php echo get_post_meta($post->ID, 'K-anio-4-texto', true); ?></p>
    </li>
    <li class="event">
      <h5><?php echo get_post_meta($post->ID, 'L-anio-5', true); ?></h5>
      <p><?php echo get_post_meta($post->ID, 'M-anio-5-texto', true); ?></p>
    </li>
  </ul>
  <div class="timelineTextCont">
    <h3 class="timelineTextTitle brandColorTxt"><?php echo get_post_meta($post->ID, 'N-sticky-text-title', true); ?></h3>
    <p class="timelineTextTxt"><span class="brandColorTxt"><strong>Mision:</strong></span><?php echo get_post_meta($post->ID, 'O-mision-txt', true); ?></p>
    <p class="timelineTextTxt"><span class="brandColorTxt"><strong>Vision:</strong></span> <?php echo get_post_meta($post->ID, 'P-vision-txt', true); ?></p>
  </div>
</div>



<section class="sectionPadding valuesSec">
  <h3 class="valuesTitle"><?php echo get_post_meta($post->ID, 'Q-valores-titulo', true); ?></h3>
  <p class="valueItem brandColorTxt Obse" data-observe="#valueVisibleActivator"><?php echo get_post_meta($post->ID, 'R-valor-1', true); ?></p>
  <p class="valueItem brandColorTxt Obse" data-observe="#valueVisibleActivator"><?php echo get_post_meta($post->ID, 'S-valor-2', true); ?></p>
  <p class="valueItem brandColorTxt Obse" data-observe="#valueVisibleActivator"><?php echo get_post_meta($post->ID, 'T-valor-3', true); ?></p>
  <p class="valueItem brandColorTxt Obse" data-observe="#valueVisibleActivator"><?php echo get_post_meta($post->ID, 'U-valor-4', true); ?></p>
  <p class="valueItem"><?php echo get_post_meta($post->ID, 'V-values-texto-inferior', true); ?></p>
  <div class="redDot" id="valueVisibleActivator"></div>
</section>

  <article class="sectionPadding articleCounter aboutUsCounter">
      <div class="counter">
        <div class="redDot" id="growUpActivator"></div>
        <div class="count">
          <div class="countTitle">
            <p class="countNumber">+<span class="GrowUp Obse" data-observe="#growUpActivator" data-unobserve="false" data-target="<?php echo get_post_meta($post->ID, 'W-numero-metrica-1', true); ?>">0</span></p>
            <p class="countTxt"><?php echo get_post_meta($post->ID, 'X-titulo-metrica-1', true); ?></p>
          </div>
        </div>
        <div class="count">
          <div class="countTitle">
            <p class="countNumber">+<span class="GrowUp Obse" data-observe="#growUpActivator" data-unobserve="false" data-target="<?php echo get_post_meta($post->ID, 'Y-numero-metrica-2', true); ?>">0</span></p>
            <p class="countTxt"><?php echo get_post_meta($post->ID, 'Z-titulo-metrica-2', true); ?></p>
          </div>
        </div>
        <div class="count">
          <div class="countTitle">
            <p class="countNumber">+<span class="GrowUp Obse" data-observe="#growUpActivator" data-unobserve="false" data-target="<?php echo get_post_meta($post->ID, 'ZU-numero-metrica-3', true); ?>">0</span></p>
            <p class="countTxt"><?php echo get_post_meta($post->ID, 'ZV-titulo-metrica-3', true); ?></p>
          </div>
        </div>
        <div class="count">
          <div class="countTitle">
            <p class="countNumber">+<span class="GrowUp Obse" data-observe="#growUpActivator" data-unobserve="false" data-target="<?php echo get_post_meta($post->ID, 'ZW-numero-metrica-4', true); ?>">0</span></p>
            <p class="countTxt"><?php echo get_post_meta($post->ID, 'ZX-titulo-metrica-4', true); ?></p>
          </div>
        </div>
      </div>
    </div>
  </article>


<section class="testimonialsSec sectionPadding">
  <h3 class="testimonialSecTitle brandColorTxt">CLIENTES SATISFECHOS</h3>

  <div class="testimonialsContainer Carousel">
    <button class="arrowBtn" id="nextButton" >
      <svg class="arrowSVG" width="106" height="106" viewBox="0 0 106 106" fill="currentColor" xmlns="https://www.w3.org/2000/svg">
        <circle r="53" transform="matrix(-1 0 0 1 53 53)" fill="currentColor"/>
        <path d="M33.2028 50.8521C31.9953 52.0295 31.9953 53.9705 33.2028 55.1479L59.6556 80.9415C61.5562 82.7947 64.75 81.4481 64.75 78.7936L64.75 27.2064C64.75 24.5519 61.5562 23.2053 59.6556 25.0585L33.2028 50.8521Z" fill="white"/>
      </svg>
    </button>
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
    <button class="arrowBtn" id="prevButton">
      <svg class="arrowSVG" width="106" height="106" viewBox="0 0 106 106" fill="currentColor" xmlns="https://www.w3.org/2000/svg">
        <circle cx="53" cy="53" r="53" fill="currentColor"/>
        <path d="M72.7972 50.8521C74.0047 52.0295 74.0047 53.9705 72.7972 55.1479L46.3444 80.9415C44.4438 82.7947 41.25 81.4481 41.25 78.7936L41.25 27.2064C41.25 24.5519 44.4438 23.2053 46.3444 25.0585L72.7972 50.8521Z" fill="white"/>
      </svg>
    </button>
  </div>

</section>


<section class="fullWidthMapContainer">
  <iframe class="fullWidthMap" src="https://www.google.com/maps/d/embed?mid=1broJr2IgKbRAnu1cEuJfsXWjbzMt8Iuh"></iframe>
  <div class="fullWidthMapOverlay" id="mapOverlay"></div>
  <div class="fullWidthMapBarOverlay sectionWhite">
    <h2 class="mapSecTitle">Centros logísticos <span class="brandColorTxt">en el mundo</span></h2>
  </div>
  <p class="mapInterTxt sectionWhite Obse" data-observe="#mapInteractionActivation"><span class="mapInterActive" onclick="altClassFromSelector('activateMap','#mapOverlay')">Pincha aquí&nbsp;&nbsp;</span> para interactuar con el mapa</p>
  <div class="redDot" id="mapInteractionActivation"></div>
</section>







<?php get_footer(); ?>
