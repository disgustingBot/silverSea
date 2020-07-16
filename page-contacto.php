<?php get_header(); ?>

<a href="<?php echo get_site_url() . '/buscar-contenedor'; ?>" class="btn contactCTA">COTIZA TU CONTENEDOR</a>


<section class="contacto">
  <img class="contact-background rowcol1 lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
  <hgroup class="formTxt">
    <h1 class="formTitle">Contacta</h1>
    <h4 class="formSubtitle">
      En Silversea estamos abiertos a consultas, propuestas y nuevos desafíos.
    </h4>
  </hgroup>
  <form class="contactForm" action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST" id="cmForm">
    <input class="contact_input" type="hidden" id="first_name" maxlength="80" name="first_name">
    <input class="contact_input" type="hidden" name="oid" value="00D0X000000uRGw">
    <input class="contact_input" id="company" name="company" type="hidden" value="Silversea" required="">
    <input class="contact_input" type="hidden" id="lead_source" name="lead_source" value="Web BOX ES">
    <input class="contact_input" type="hidden" name="retURL" value="https://sstc.com.es/en/gracias/silverbox/">

    <input class="contact_input" type="hidden" name="action" value="lt_form_handler">
    <input class="contact_input" type="hidden" name="link" value="<?php echo home_url( $wp->request );?>">
    <input class="contact_input" type="text" id="last_name" name="last_name" placeholder="Nombre" required>
    <input class="contact_input" type="tel" id="phone" name="phone" placeholder="Telefono" required>
    <input class="contact_input" type="email" id="email" name="email" placeholder="Email" required>
    <input class="contact_input" type="text" id="country" name="Pais" placeholder="Pais" required>
    <textarea class="contact_textarea" type="text" id="comment" name="Comentarios" placeholder="Comentarios"> </textarea>
    <div class="finalizarConsultaCheckboxes">
      <input type="checkbox" required>
      <p class="termsDescription">I accept Silversea's <a href="https://silverseacontainers.com/privacy-policy/" target="_blank" style="text-decoration: underline;"> privacy terms</a></p>
    </div>
    <button class="btn contact_btn" type="submit" name="a06" class="btn" value="Submit">Enviar</button>
  </form>
</section>


<?php get_footer(); ?>
