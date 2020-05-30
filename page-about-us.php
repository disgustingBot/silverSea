<?php get_header(); ?>
<?php while(have_posts()){the_post(); ?>
  <section class="ATF aboutUsATF">
    <img class="aboutUsATFIMG lazy rowcol1" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
    <hgroup class="ATFWording rowcol1">
      <h1 class="AboutUsTitle"><?php echo get_post_meta($post->ID, '1-about-titulo-portada', true); ?></h1>
      <h4 class="aboutUsSubtitle"><?php echo get_post_meta($post->ID, '2-about-texto-portada', true); ?></h4>
    </hgroup>
  <?php } wp_reset_query(); ?>
</section>

<section class="sectionPadding AboutSec1">
  <?php echo the_content(); ?>
</section>

<section class="sectionPadding aboutUsSec2 sectionColor3">
  <article class="articleCounter aboutUsCounter">
      <div class="counter">
        <div class="redDot" id="growUpActivator"></div>
        <div class="count">
          <div class="countTitle">
            <p class="countNumber">+<span class="GrowUp Obse" data-observe="#growUpActivator" data-unobserve="false" data-target="30000">0</span></p>
            <p class="countTxt">CONTENEDORES VENDIDOS</p>
          </div>
        </div>
        <div class="count">
          <div class="countTitle">
            <p class="countNumber">+<span class="GrowUp Obse" data-observe="#growUpActivator" data-unobserve="false" data-target="3000">0</span></p>
            <p class="countTxt">CLIENTES SATISFECHOS</p>
          </div>
        </div>
        <div class="count">
          <div class="countTitle">
            <p class="countNumber">+<span class="GrowUp Obse" data-observe="#growUpActivator" data-unobserve="false" data-target="200">0</span></p>
            <p class="countTxt">CENTROS LOGÍSTICOS</p>
          </div>
        </div>
        <div class="count">
          <div class="countTitle">
            <p class="countNumber">+<span class="GrowUp Obse" data-observe="#growUpActivator" data-unobserve="false" data-target="30">0</span></p>
            <p class="countTxt">PAÍSES Y TERRITORIOS</p>
          </div>
        </div>
      </div>
    </div>
  </article>
</section>


<section class="testimonialsSec sectionPadding">
  <h3 class="testimonialSecTitle brandColorTxt">CLIENTES SATISFECHOS</h3>
  <!-- <div class="starsContainer">
    <svg fill="currentColor" class="star" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
    <svg fill="currentColor" class="star" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
    <svg fill="currentColor" class="star" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
    <svg fill="currentColor" class="star" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
    <svg fill="currentColor" class="star" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
  </div> -->
  <div class="testimonialsContainer Carousel">
    <button class="arrowBtn" id="nextButton" >
      <svg class="arrowSVG" width="106" height="106" viewBox="0 0 106 106" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
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
      <svg class="arrowSVG" width="106" height="106" viewBox="0 0 106 106" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <circle cx="53" cy="53" r="53" fill="currentColor"/>
        <path d="M72.7972 50.8521C74.0047 52.0295 74.0047 53.9705 72.7972 55.1479L46.3444 80.9415C44.4438 82.7947 41.25 81.4481 41.25 78.7936L41.25 27.2064C41.25 24.5519 44.4438 23.2053 46.3444 25.0585L72.7972 50.8521Z" fill="white"/>
      </svg>
    </button>
  </div>

</section>


<section class="fullWidthMapContainer">
  <iframe class="fullWidthMap" src="https://www.google.com/maps/d/embed?mid=17c08JkE4KqI6p3EPcDfsiIMtwDveG7D8"></iframe>
  <div class="fullWidthMapOverlay" id="mapOverlay"></div>
  <div class="fullWidthMapBarOverlay sectionWhite">
    <h2 class="mapSecTitle">Centros logísticos <span class="brandColorTxt">en el mundo</span></h2>
  </div>
  <p class="mapInterTxt sectionWhite Obse" data-observe="#mapInteractionActivation"><span class="mapInterActive" onclick="altClassFromSelector('activateMap','#mapOverlay')">Pincha aquí&nbsp;&nbsp;</span> para interactuar con el mapa</p>
  <div class="redDot" id="mapInteractionActivation"></div>
</section>







<?php get_footer(); ?>
