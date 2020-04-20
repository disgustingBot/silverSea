<?php get_header(); ?>
<?php while(have_posts()){the_post(); ?>
<section class="ATF aboutUsATF">
  <img class="lazy rowcol1" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
  <div class="ATFWording rowcol1">
    <?php echo the_content(); ?>
  </div>
<?php } wp_reset_query(); ?>
</section>

<section class="aboutUsCounter sectionPadding">
  <hgroup class="sectionSummary">
    <h4 class="summaryTxt brandColorTxt">Desde sus comienzos en el año 2016, Silversea nace como una empresa enfocada en el trading y leasing de contenedores marítimos a nivel mundial.</h4>
    <h4 class="summaryTxt">Dado los puntos de contacto con toda la cadena de logística en el 2017 se crea la unidad de Silvercargo. Es bajo la misma compañía que se desarrolla y apoya a toda la gama de clientes que tenemos a nivel mundial, que consideraban importante que podamos darle un soporte más amplio. Teniendo en cuenta nuestra red de agentes en más de 70 países, podemos brindarle soporte local en cada lugar, así atendiéndolos de manera personalizada.
    En setiembre de 2017, abrimos nuestra oficina en Barcelona, siendo hoy nuestro head office y base de operaciones globales para todas las áreas de negocio que atiende SILVERSEA
    Hoy podemos decir que Silversea es una empresa dedicada al comercio exterior y logística internacional, con oficinas propias en Europa y Sudamérica. La empresa se encuentra en pleno crecimiento, que año tras año se consolida en el mercado y es identificada por la confianza, la transparencia el dinamismo y por sobre todas las cosas los grandes profesionales y la calidad humana.</h4>
  </hgroup>

  <div class="counter">
    <div class="count">
      <hgroup class="countHgroup">
        <p class="countNumber">30K+</p>
        <p class="countTxt">CONTAINERS VENDIDOS</p>
      </hgroup>
      <p class="countSmallerTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur libero metus, suscipit vel accumsan eget, viverra condimentum nibh. Nullam porttitor varius commodo.</p>
    </div>
    <div class="count">
      <hgroup class="countHgroup">
        <p class="countNumber">3K+</p>
        <p class="countTxt">CLIENTES SATISFECHOS</p>
      </hgroup>
      <p class="countSmallerTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur libero metus, suscipit vel accumsan eget, viverra condimentum nibh. Nullam porttitor varius commodo.</p>
    </div>
    <div class="count">
      <hgroup class="countHgroup">
        <p class="countNumber">200+</p>
        <p class="countTxt">CENTROS LOGÍSTICOS</p>
      </hgroup>
      <p class="countSmallerTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur libero metus, suscipit vel accumsan eget, viverra condimentum nibh. Nullam porttitor varius commodo.</p>
    </div>
    <div class="count">
      <hgroup class="countHgroup">
        <p class="countNumber">30+</p>
        <p class="countTxt">PAÍSES Y TERRITORIOS</p>
      </hgroup>
      <p class="countSmallerTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur libero metus, suscipit vel accumsan eget, viverra condimentum nibh. Nullam porttitor varius commodo.</p>
    </div>
  </div>
</section>

<section class="aboutUsMediaSec">
  <img class="aboutUsMedia rowcol1" src="<?php echo get_template_directory_uri(); ?>/img/aboutUsImg.jpg" alt="">
  <img class="playBtn rowcol1" src="<?php echo get_template_directory_uri(); ?>/img/playBtn.png" alt="">
</section>

<?php get_footer(); ?>
