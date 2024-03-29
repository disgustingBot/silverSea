<?php get_header() ?>


<?php global $wpdb; ?>


<?php if(current_user_can('administrator') ) {  ?>


<!-- <a href="https://silverseacontainers.com/upload-file/">reload</a> -->

<div class="uploadFileContainer">

  <div class="updateController inicial" id="updateController">
  <!-- <div class="updateController" id="updateController"> -->
    <h3 class="fileUploadLabel txtCenter">Sincronizador de tablas</h3>

    <div class="updateProgress">
      <div class="circle"></div>
      <div class="loadBar"><div class="loadBarProgress"></div></div>
      <p class="updateText">Esta actualizando la tabla, por favor, no te vayas de la pagina</p>
    </div>

    <div class="uploadForm">
      <input class="btn btnUpload" type="file" name="file" value="">
      <button class="btn blue" onclick="lt_upload_file()" type="submit" name="submit">Subir</button>
      <!-- <button class="btn blue" onclick="productSincrotron.productFabrik()" type="submit" name="submit">Upload</button> -->
    </div>

  </div>




  <a class="btn uploadAnotherFileBtn" href="<?php echo get_site_url(); ?>/upload-file/">Subir otro archivo</a>



  <?php } else { ?>

    <div class="unauthenticatedUser">
      <p class="unauthenticatedTxt txtCenter">No tienes permiso para acceder a esta página :(</p>
      <a href="<?php echo get_site_url(); ?>" class="btn">Ir al inicio</a>
    </div>

  <?php } ?>
</div>

<?php get_footer() ?>
