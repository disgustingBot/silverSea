<?php get_header() ?>


<?php if(current_user_can('administrator') ) {  ?>

<a href="http://localhost/silverSea/upload-file/">reload</a>
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
  <div class="vars">
    <h1>GET:</h1>
    <?php foreach ($_GET as $key => $value) { ?>
      <p><?php echo $key; ?></p>
      <p><?php echo $value; ?></p>
    <?php } ?>
  </div>
<?php } ?>


<a href="http://localhost/silverSea/upload-file/">reload</a>
<?php } ?>

<?php get_footer() ?>
