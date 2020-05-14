<?php get_header(); ?>
<?php while(have_posts()){the_post(); ?>
  <section class="ATF aboutUsATF">
    <img class="lazy rowcol1" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
    <div class="ATFWording rowcol1">
      <?php echo the_content(); ?>
    </div>
  <?php } wp_reset_query(); ?>
</section>

<section class="sectionPadding AboutSec1">
  <hgroup class="sectionSummary">
    <h4 class="summaryTxt brandColorTxt">Desde sus comienzos en el año 2016, Silversea nace como una empresa enfocada en el trading y leasing de contenedores marítimos a nivel mundial.</h4>
    <h4 class="summaryTxt">Dado los puntos de contacto con toda la cadena de logística en el 2017 se crea la unidad de Silvercargo. Es bajo la misma compañía que se desarrolla y apoya a toda la gama de clientes que tenemos a nivel mundial, que consideraban importante que podamos darle un soporte más amplio. Teniendo en cuenta nuestra red de agentes en más de 70 países, podemos brindarle soporte local en cada lugar, así atendiéndolos de manera personalizada.
      En setiembre de 2017, abrimos nuestra oficina en Barcelona, siendo hoy nuestro head office y base de operaciones globales para todas las áreas de negocio que atiende SILVERSEA
      Hoy podemos decir que Silversea es una empresa dedicada al comercio exterior y logística internacional, con oficinas propias en Europa y Sudamérica. La empresa se encuentra en pleno crecimiento, que año tras año se consolida en el mercado y es identificada por la confianza, la transparencia el dinamismo y por sobre todas las cosas los grandes profesionales y la calidad humana.</h4>
    </hgroup>
</section>

<section class="sectionPadding aboutUsSec2">
  <article class="articleCounter aboutUsCounter">
      <div class="counter">
        <div class="count">
          <div class="countTitle">
            <p class="countNumber">30K+</p>
            <p class="countTxt">CONTENEDORES VENDIDOS</p>
          </div>
          <p class="countTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur libero metus, suscipit vel accumsan eget, viverra condimentum nibh. Nullam porttitor varius commodo.</p>
        </div>
        <div class="count">
          <div class="countTitle">
            <p class="countNumber">3K+</p>
            <p class="countTxt">CLIENTES SATISFECHOS</p>
          </div>
          <p class="countTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur libero metus, suscipit vel accumsan eget, viverra condimentum nibh. Nullam porttitor varius commodo.</p>
        </div>
        <div class="count">
          <div class="countTitle">
            <p class="countNumber">200+</p>
            <p class="countTxt">CENTROS LOGÍSTICOS</p>
          </div>
          <p class="countTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur libero metus, suscipit vel accumsan eget, viverra condimentum nibh. Nullam porttitor varius commodo.</p>
        </div>
        <div class="count">
          <div class="countTitle">
            <p class="countNumber">30+</p>
            <p class="countTxt">PAÍSES Y TERRITORIOS</p>
          </div>
          <p class="countTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur libero metus, suscipit vel accumsan eget, viverra condimentum nibh. Nullam porttitor varius commodo.</p>
        </div>
      </div>
    </div>
  </article>
</section>


<section class="testimonialsSec sectionPadding">
  <div class="testimonialsContainer gallery">
    <button class="testimonialBtn" id="nextButton" >
      <svg class="singleProductArrowSVG" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M18.5455 21.18L9.77992 12L18.5455 2.82L15.8469 0L4.36365 12L15.8469 24L18.5455 21.18Z" fill="currentColor"/>
      </svg>
    </button>
    <?php
    $args = array(
      'post_type'=>'testimonials',
    );
    $testimonials=new WP_Query($args);
    while($testimonials->have_posts()){$testimonials->the_post();?>
      <quote class="testimonial testimonialCarusel element">
        <div class="testimonialTxt mainTxtType1">
          <h4 class="testimonialAuthor"><?php the_title(); ?></h4>
          <div class="testimonialQuote"><?php the_content(); ?></div>
        </div>
      </quote>
    <?php } ?>
    <button class="testimonialBtn" id="prevButton">
      <svg class="singleProductArrowSVG" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M5 21.18L14.2713 12L5 2.82L7.85425 0L20 12L7.85425 24L5 21.18Z" fill="currentColor"/>
      </svg>
    </button>
  </div>

  <div class="starsContainer">
    <svg fill="currentColor" class="star" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
    <svg fill="currentColor" class="star" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
    <svg fill="currentColor" class="star" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
    <svg fill="currentColor" class="star" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
    <svg fill="currentColor" class="star" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
  </div>
</section>

<section class="fullWidthMapContainer">
  <iframe class="fullWidthMap" src="https://www.google.com/maps/d/embed?mid=17c08JkE4KqI6p3EPcDfsiIMtwDveG7D8"></iframe>
  <div class="fullWidthMapOverlay" id="mapOverlay"></div>
  <div class="fullWidthMapBarOverlay sectionColor5">
    <h2 class="mapSecTitle">Almacenes con stock disponible <span class="brandColorTxt">en el mundo</span></h2>
  </div>
  <p class="mapInterTxt"><span class="mapInterActive" onclick="altClassFromSelector('activateMap','#mapOverlay')">Pincha aquí&nbsp;&nbsp;</span> para interactuar con el mapa</p>
</section>







<?php get_footer(); ?>
