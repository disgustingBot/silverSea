<?php get_header() ?>


<?php global $wpdb; ?>


<?php if(current_user_can('administrator') ) {  ?>


<!-- <a href="https://silverseacontainers.com/upload-file/">reload</a> -->

<a class="btn" href="<?php echo get_site_url(); ?>/upload-file/">Upload another file</a>

<div class="updateController inicial" id="updateController">
<!-- <div class="updateController" id="updateController"> -->
  <h3 class="fileUploadLabel">Sincrotron</h3>

  <div class="updateProgress">
    <div class="circle"></div>
    <div class="loadBar"><div class="loadBarProgress"></div></div>
    <p class="updateText">Esta actualizando la tabla, por favor, no te vayas de la pagina</p>
  </div>

  <div class="uploadForm">
    <input class="btn" type="file" name="file" value="">
    <button class="btn blue" onclick="lt_upload_file()" type="submit" name="submit">Upload</button>
    <!-- <button class="btn blue" onclick="productSincrotron.productFabrik()" type="submit" name="submit">Upload</button> -->
  </div>

</div>



<?php if (isset($_GET[0])) { ?>
  <!-- <div class="vars">
    <h1>GET:</h1>
    <?php foreach ($_GET as $key => $value) { ?>
      <p><?php echo $key; ?></p>
      <p><?php echo $value; ?></p>
    <?php } ?>
  </div> -->
<?php } ?>

<a class="btn" href="<?php echo get_site_url(); ?>/upload-file/">Upload another file</a>




<!-- <a href="https://silverseacontainers.com/upload-file/">reload</a> -->

<?php } else {?>

  <div class="unauthenticatedUser">
    <p class="unauthenticatedTxt txtCenter">No tienes permiso para acceder a esta página :(</p>
    <a href="<?php echo get_site_url(); ?>" class="btn">Ir al inicio</a>
  </div>

<?php } ?>

<?php get_footer() ?>
