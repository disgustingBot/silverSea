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







<div class="timelinetimelineCont sectionPadding">
  <ul class="timeline">
    <h3 class="timelineTitle brandColorTxt">NUESTRA HISTORIA</h3>
    <li class="event">
      <h5>2016</h5>
      <p>Fundacion de la empresa:Silversea se establece como una empresa muy dinámica. En su momento identificamos que todos nuestros clientes reclamaban lo mismo: Estabilidad en el abastecimiento. Dado que Silversea tiene como objetivo SATISFACER, fuimos en búsqueda de la solución.</p>
    </li>
    <li class="event">
      <h5>2018</h5>
      <p>Apertura de oficinas en España que nos permitira comenzar la travesía para transformar la industria en una más dinámica y transparente a la antes concebida.</p>
    </li>
    <li class="event">
      <h5>2019</h5>
      <p>Implementacion de CRM, herramientas de logisticas, profesionalizacion de los departamentos y capacitacion de las personas.</p>
    </li>
    <li class="event">
      <h5>2019</h5>
      <p>Presencia en CIS, como parte de nuestra expansion y desarrollo de abastecimiento de toda la zona.</p>
    </li>
    <li class="event">
      <h5>2020</h5>
      <p>Apertura de oficina en Shanghai, Asia buscando unir y estar mas cerca que nunca de nuestros clientes y proveedores.</p>
    </li>
  </ul>
  <div class="timelineCont">
    <h3 class="timelineTextTitle brandColorTxt">NUESTRA PERSPECTIVA</h3>
    <p class="timelineTextTxt"><span class="brandColorTxt"><strong>Mision:</strong></span> Satisfacer las necesidades de nuestros clientes de manera eficiente y creativa. Apuntando siempre a la sostenibilidad a través de nuestros productos y servicios, ahorrando costos en la cadena de suministros, apoyando en el ahorro de la huella de carbono y fomentando la reutilización de nuestros productos de manera eco-friendly.</p>
    <p class="timelineTextTxt"><span class="brandColorTxt"><strong>Vision:</strong></span> Ser la empresa de referencia a nivel mundial en abastecimiento de contenedores, motivando a otras empresas con nuestros valores y que actúen en consecuencia</p>
  </div>
</div>







<section class="sectionPadding AboutSec1">
  <?php echo the_content(); ?>
</section>

  <article class="sectionPadding articleCounter aboutUsCounter">
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
