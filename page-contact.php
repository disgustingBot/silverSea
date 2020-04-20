<?php get_header(); ?>


<section class="contacto">
  <img class="rowcol1" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
  <hgroup>
    <h1 class="formTitle">Contacta</h1>
    <h4 class="subtitle">
      En Silversea estamos abiertos a consultas, propuestas y nuevos desafíos.
    </h4>
  </hgroup>
  <form action="" class="contactForm">
    <input type="hidden" name="action" value="lt_form_handler">
    <input type="hidden" name="link" value="<?php echo home_url( $wp->request );?>">
    <input type="text" id="name" name="a01" placeholder="Nombre">
    <input type="text" id="phone" name="a02" placeholder="Telefono">
    <input type="text" id="email" name="a03" placeholder="Email">
    <input type="text" id="country" name="a04" placeholder="Pais">
    <textarea type="text" id="comment" name="a05" placeholder="Comentarios"> </textarea>
    <button type="submit" name="a06" class="btn" value="Submit">Enviar</button>
  </form>
</section>


<?php get_footer(); ?>
