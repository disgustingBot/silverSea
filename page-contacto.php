<?php get_header(); ?>

<a href="<?php echo get_site_url() . '/buscar-contenedor'; ?>" class="btn contactCTA">COTIZA TU CONTENEDOR</a>


<section class="contacto">
  <img class="rowcol1 lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
  <hgroup class="formTxt">
    <h1 class="formTitle">Contacta</h1>
    <h4 class="formSubtitle">
      En Silversea estamos abiertos a consultas, propuestas y nuevos desafíos.
    </h4>
  </hgroup>
  <form class="contactForm" action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST" id="cmForm">
    <input type="hidden" id="first_name" maxlength="80" name="first_name">
    <input type="hidden" name="oid" value="00D0X000000uRGw">
    <input id="company" name="company" type="hidden" value="Silversea" required="">
    <input type="hidden" id="lead_source" name="lead_source" value="Web BOX ES">
    <input type="hidden" name="retURL" value="https://sstc.com.es/en/gracias/silverbox/">



    <input type="hidden" name="action" value="lt_form_handler">
    <input type="hidden" name="link" value="<?php echo home_url( $wp->request );?>">
    <input type="text" id="last_name" name="last_name" placeholder="Nombre">
    <input type="text" id="phone" name="phone" placeholder="Telefono">
    <input type="text" id="email" name="email" placeholder="Email">
    <input type="text" id="country" name="Pais" placeholder="Pais">
    <textarea type="text" id="comment" name="Comentarios" placeholder="Comentarios"> </textarea>
    <button type="submit" name="a06" class="btn" value="Submit">Enviar</button>
  </form>
</section>


<?php get_footer(); ?>