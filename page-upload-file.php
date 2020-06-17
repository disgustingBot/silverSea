<?php get_header() ?>


<?php
global $wpdb;


// INSTALACION ONLINE
$dbServerName = "localhost";
$dbUsername = "silverse_admin";
$dbPassword = "M-9!-^%jZ*h5";
$dbName = "silverse_web";
$queryDePrueba = "LOAD DATA INFILE '/home/silverse/public_html/wp-content/themes/silverSea/uploads/locations-06-16-2020.tsv' INTO TABLE silverse_web.locations FIELDS TERMINATED BY '\t' IGNORE 1 LINES;";

if ($conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName)) {
  echo "CONECTION correct";
  echo '<br>';
  echo '<br>';
  // if ($conn->query($queryDePrueba)) {
  if ($wpdb->query($queryDePrueba)) {
    echo "Data loaded into table";
    echo '<br>';
    echo '<br>';
  }else{
    echo "Data load PROBLEM";
    echo '<br>';
    echo '<br>';
  }
}else{
  echo 'conection PROBLEM';
  echo '<br>';
  echo '<br>';
}

// $filename = 'file.csv';
// $sql = "LOAD DATA LOCAL INFILE '" . $filename . "'
// INTO TABLE Stock_Item
// FIELDS TERMINATED BY ',' ENCLOSED BY '\"' ESCAPED BY '\"' LINES TERMINATED BY '\n' IGNORE 1 ROWS
// (stock_item_code, stock_item_name)";

// $result = $wpdb->query($queryDePrueba);




 ?>






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
