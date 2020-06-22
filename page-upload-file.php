<?php get_header() ?>


<?php
global $wpdb;
// // $server = 'local';
// $server = 'online';


// $table = 'locations';
// $data = array('country' => 'test', 'city' => 'cosa');


// if ($server == 'online') {

//   // INSTALACION ONLINE
//   $dbServerName = "localhost";
//   $dbUsername = "silverse_admin";
//   $dbPassword = "M-9!-^%jZ*h5";
//   $dbName = "silverse_web";
//   // code...
//   $queryDePrueba1 = "truncate table silverse_web.locations;";
//   $queryDePrueba2 = "LOAD DATA LOCAL INFILE
//     '/home/silverse/public_html/wp-content/themes/silverSea/uploads/locations-06-16-2020.tsv'
//     INTO TABLE silverse_web.locations FIELDS TERMINATED BY '\\t' IGNORE 1 LINES;";

//   // INSTALACION WAVE HOST
//   // $dbServerName = "localhost";
//   // $dbUsername = "lattedev_silver";
//   // $dbPassword = "%fGC+<`@]Csz#75F";
//   // $dbName = "lattedev_silver";
//   // // code...
//   // $queryDePrueba1 = "truncate table lattedev_silver.locations;";
//   // $queryDePrueba2 = "LOAD DATA LOCAL INFILE '/home/lattedev/web/silversea/public_html/wp-content/themes/silverSea/uploads/locations-06-17-2020.tsv' INTO TABLE lattedev_silver.locations FIELDS TERMINATED BY '\\t' IGNORE 1 LINES;";
// } else {

//   // INSTALACION LOCAL
//   $dbServerName = "localhost";
//   $dbUsername = "root";
//   $dbPassword = "";
//   // $dbUsername = "contraseñaDificil";
//   // $dbPassword = ";$6qha)2L*KU)6nq";
//   $dbName = "lattedev_silver";

//   $queryDePrueba1 = "truncate table lattedev_silver.locations;";
//   $queryDePrueba2 = "LOAD DATA INFILE 'C:/xampp/htdocs/silverSea/wp-content/themes/silverSea/uploads/locations-06-17-2020.tsv' INTO TABLE lattedev_silver.locations FIELDS TERMINATED BY '\\t' IGNORE 1 LINES;";
// }

// echo $queryDePrueba1;
// echo '<br>';
// echo '<br>';
// echo $queryDePrueba2;

// echo '<br>';
// echo '<br>';




// $table_name = "{$wpdb->prefix}myTable";
// $myID = 12;

// $wpdb->query( $wpdb->prepare( $queryDePrueba1 ));



// $table = 'locations';
// $data = array('country' => 'test', 'city' => 'cosa');
// $wpdb->insert($table,$data,$format);
// // aca hay oro
// if ( $wpdb->insert($table,$data,$format) ) {
//   echo "NEW INSERT CORRECT";
//   echo '<br>';
//   echo '<br>';
// } else{
//   echo 'qhace!?';
//   echo '<br>';
//   echo '<br>';
// }


// if ($conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName)) {
//   echo "CONECTION correct";
//   echo '<br>';
//   echo '<br>';

//   // if ($wpdb->query($queryDePrueba1)) {
//   if ($wpdb->query( $wpdb->prepare( $queryDePrueba1 ))) {
//     echo "Table truncated";
//     echo '<br>';
//     echo '<br>';
//     // if ($wpdb->query( $wpdb->prepare( $queryDePrueba2 ))) {
//     if ($conn->query($queryDePrueba2)) {
//     // if ($conn->query( $conn->prepare( $queryDePrueba2 ))) {
//       echo "Data loaded into table";
//       echo '<br>';
//       echo '<br>';
//     } else {
//       echo "Data load PROBLEM";
//       echo '<br>';
//       echo '<br>';
//     }
//   } else {
//     echo "Table truncate ERROR";
//     echo '<br>';
//     echo '<br>';

//   }
// }else{
//   echo 'conection PROBLEM';
//   echo '<br>';
//   echo '<br>';
// }

// $filename = 'file.csv';
// $sql = "LOAD DATA LOCAL INFILE '" . $filename . "'
// INTO TABLE Stock_Item
// FIELDS TERMINATED BY ',' ENCLOSED BY '\"' ESCAPED BY '\"' LINES TERMINATED BY '\n' IGNORE 1 ROWS
// (stock_item_code, stock_item_name)";

// $result = $wpdb->query($queryDePrueba);




?>






<?php if(current_user_can('administrator') ) {  ?>

<a href="https://silverseacontainers.com/upload-file/">reload</a>
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


<a href="https://silverseacontainers.com/upload-file/">reload</a>
<?php } ?>

<?php get_footer() ?>
