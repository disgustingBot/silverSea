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
  <form class="contactForm" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="POST" id="cmForm">
      <input type="hidden" name="action"   value="lt_form_handler">
      <input type="hidden" name="link"     value="<?php echo home_url( $wp->request ); ?>">
      <input type="text"   name="a00"      value="" placeholder="jeje" hidden>

    <input class="contact_input" type="hidden" name="action" value="lt_form_handler">
    <input class="contact_input" type="hidden" name="link" value="<?php echo home_url( $wp->request );?>">
    <input class="contact_input" type="text"  id="name" name="name" placeholder="Nombre" required>
    <input class="contact_input" type="tel"   id="phone" name="phone" placeholder="Telefono" required>
    <input class="contact_input" type="email" id="email" name="email" placeholder="Email" required>
    <input class="contact_input" type="text"  id="country" name="Pais" placeholder="Pais" required>
    <textarea class="contact_textarea" type="text" id="comment" name="Comentarios" placeholder="Comentarios"></textarea>
    <div class="finalizarConsultaCheckboxes">
      <input type="checkbox" required>
      <p class="termsDescription">I accept Silversea's <a href="https://silverseacontainers.com/privacy-policy/" target="_blank" style="text-decoration: underline;"> privacy terms</a></p>
    </div>

    <?php // $site = '6LdNetUZAAAAAH6Dbs_VkWvyzdFkscoWpDxLWzI6'; ?>
    <!-- <div class="g-recaptcha" data-callback="captchaVerified" data-sitekey="<?php echo $site; ?>"></div>
    <input class="recaptcha" type="text" hidden value=""> -->
    <input class="token" type="hidden" name="token" value="">

    <div class="btn contact_btn" onclick="send_contact_mail()" value="Submit">Enviar</div>
  </form>
</section>


<?php get_footer(); ?>
