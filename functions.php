<?php

require_once 'customPosts.php';

function lattte_setup(){
  wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime(), 'all');
  // wp_enqueue_script('main', get_theme_file_uri('/js/custom.js'), NULL, microtime(), true);

      // TOOOODO ESTO ES PARA AJAX
    	// In most cases it is already included on the page and this line can be removed
    	wp_enqueue_script('jquery');
    	// register our main script but do not enqueue it yet
    	wp_register_script( 'main', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery') );

    	// now the most interesting part
    	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
    	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
    	wp_localize_script( 'main', 'lt_data', array(
    		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
    	) );

     	wp_enqueue_script( 'main' );
      // FIN DE PARA AJAX




}
add_action('wp_enqueue_scripts', 'lattte_setup');

// Adding Theme Support

function gp_init() {
  // add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  add_theme_support('html5',
    array('comment-list', 'comment-form', 'search-form')
  );

  add_theme_support( 'woocommerce' );
  add_theme_support( 'wc-product-gallery-zoom' );
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );
  add_theme_support( 'post-thumbnails' );

}
add_action('after_setup_theme', 'gp_init');
















// this removes the "Archive" word from the archive title in the archive page
add_filter('get_the_archive_title',function($title){
  if(is_category()){$title=single_cat_title('',false);
  }elseif(is_tag()){$title=single_tag_title('',false);
  }elseif(is_author()){$title='<span class="vcard">'.get_the_author().'</span>';
  }return $title;
});






function excerpt($charNumber){
  if(!$charNumber){$charNumber=1000000;}
  $excerpt = get_the_excerpt();
  if(strlen($excerpt)<=$charNumber){return $excerpt;}else{
    $excerpt = substr($excerpt, 0, $charNumber);
    $result  = substr($excerpt, 0, strrpos($excerpt, ' '));
    // $result .= $result . '(...)';
    // return var_dump($excerpt);
    return $result;
  }
}




 function register_menus() {
    register_nav_menu('header',__( 'Header' ));
    register_nav_menu('navBarMobile',__( 'Mobile Header Menu' ));
    register_nav_menu('footerNav',__( 'Footer' ));
    // add_post_type_support( 'page', 'excerpt' );
  }
  add_action( 'init', 'register_menus' );
















  //Product Cat Create page
  function lt_taxonomy_add_new_meta_field() {
      ?>
      <div class="form-field">
          <label for="lt_meta_desc"><?php _e('Featured', 'lt'); ?></label>
          <input type="checkbox" name="lt_meta_desc" id="lt_meta_desc">
          <p class="description"><?php _e('Mostrar categoria en "Que Contenedor Necesito"', 'lt'); ?></p>
      </div>
      <?php
  }

  //Product Cat Edit page
  function lt_taxonomy_edit_meta_field($term) {

      //getting term ID
      $term_id = $term->term_id;

      // retrieve the existing value(s) for this meta field.
      $lt_meta_desc = get_term_meta($term_id, 'lt_meta_desc', true);
      ?>
      <tr class="form-field">
          <th scope="row" valign="top"><label for="lt_meta_desc"><?php _e('Featured', 'lt'); ?></label></th>
          <td>
            <input type="checkbox" name="lt_meta_desc" id="lt_meta_desc" <?php if(esc_attr($lt_meta_desc) == 'on'){echo 'checked';} ?>>
              <p class="description"><?php _e('Mostrar categoria en "Que Contenedor Necesito"', 'lt'); ?></p>
          </td>
      </tr>
      <?php
  }

  add_action('product_cat_add_form_fields', 'lt_taxonomy_add_new_meta_field', 10, 1);
  add_action('product_cat_edit_form_fields', 'lt_taxonomy_edit_meta_field', 10, 1);

  // Save extra taxonomy fields callback function.
  function lt_save_taxonomy_custom_meta($term_id) {

      $lt_meta_desc = filter_input(INPUT_POST, 'lt_meta_desc');

      update_term_meta($term_id, 'lt_meta_desc', $lt_meta_desc);
  }

  add_action('edited_product_cat', 'lt_save_taxonomy_custom_meta', 10, 1);
  add_action('create_product_cat', 'lt_save_taxonomy_custom_meta', 10, 1);























// FUCTION FOR USER GENERATION
// https://tommcfarlin.com/create-a-user-in-wordpress/
add_action( 'admin_post_nopriv_lt_login', 'lt_login');
add_action(        'admin_post_lt_login', 'lt_login');
function lt_login(){
  $link=$_POST['link'];
  $name=$_POST['name'];
  $fono=$_POST['fono'];
  $mail=$_POST['mail'];
  $pass=$_POST['pass'];


  if( null == username_exists( $mail ) ) {

    // Generate the password and create the user for security
    // $password = wp_generate_password( 12, false );
    // $user_id = wp_create_user( $mail, $password, $mail );

    // user generated pass for local testing
    $user_id = wp_create_user( $mail, $pass, $mail );
    // Set the nickname and display_name
    wp_update_user(
      array(
        'ID'              =>    $user_id,
        'display_name'    =>    $name,
        'nickname'        =>    $name,
      )
    );
    update_user_meta( $user_id, 'phone', $fono );


    // Set the role
    $user = new WP_User( $user_id );
    $user->set_role( 'subscriber' );

    // Email the user
    wp_mail( $mail, 'Welcome '.$name.'!', 'Your Password: ' . $pass );
  // end if
  $action='register';
  $creds = array(
      'user_login'    => $mail,
      'user_password' => $pass,
      'remember'      => true
  );

  $status = wp_signon( $creds, false );
} else {

  $creds = array(
      'user_login'    => $mail,
      'user_password' => $pass,
      'remember'      => true
  );

  $status = wp_signon( $creds, false );

  // $status=wp_login($mail, $pass);

  $action='login';
}

  $link = add_query_arg( array(
    'action' => $action,
    // 'status' => $status,
    // 'resultado' => username_exists( $mail ),
  ), $link );
  wp_redirect($link);
}
















add_action( 'admin_post_nopriv_lt_new_pass', 'lt_new_pass');
add_action(        'admin_post_lt_new_pass', 'lt_new_pass');
function lt_new_pass(){
  $link=$_POST['link'];
  $oldp=$_POST['oldp'];
  $newp=$_POST['newp'];
  $cnfp=$_POST['cnfp'];



  // if(isset($_POST['current_password'])){
  if(isset($_POST['oldp'])){
    $_POST = array_map('stripslashes_deep', $_POST);
    $current_password = sanitize_text_field($_POST['oldp']);
    $new_password = sanitize_text_field($_POST['newp']);
    $confirm_new_password = sanitize_text_field($_POST['cnfp']);
    $user_id = get_current_user_id();
    $errors = array();
    $current_user = get_user_by('id', $user_id);
  }

  $link = add_query_arg( array(
    'action' => $action,
  ), $link );
  // Check for errors
  if($current_user && wp_check_password($current_password, $current_user->data->user_pass, $current_user->ID)){
  //match
  } else {
    $errors[] = 'Password is incorrect';

    $link = add_query_arg( array(
      'pass'  => 'incorrect',
    ), $link );
  }
  if($new_password != $confirm_new_password){
    $errors[] = 'Password does not match';

    $link = add_query_arg( array(
      'match'  => 'no',
    ), $link );
  }
  if(empty($errors)){
      wp_set_password( $new_password, $current_user->ID );
      $link = add_query_arg( array(
        'success'  => true,
      ), $link );
  }
  wp_redirect($link);
}




















// data-slug="0"
// data-parent="city"

    function selectBox($placeholder){ ?>
      <div class="selectBox" tabindex="1" id="selectBox<?php echo $placeholder; ?>">
        <div class="selectBoxButton" onclick="altClassFromSelector('focus', '#selectBox<?php echo $placeholder; ?>')">
          <p class="selectBoxPlaceholder"><?php echo $placeholder; ?></p>
          <p class="selectBoxCurrent" id="selectBoxCurrent<?php echo $placeholder; ?>"></p>
        </div>
        <div class="selectBoxList focus">
          <label for="nul<?php echo $placeholder; ?>" class="selectBoxOption" id="selectBoxOptionNul">
            <input
              class="selectBoxInput"
              id="nul<?php echo $placeholder; ?>"
              type="radio"
              onclick="selectBoxControler('','#selectBox<?php echo $placeholder; ?>','#selectBoxCurrent<?php echo $placeholder; ?>')"
              value="0"
              checked
            >
            <!-- <span class="checkmark"></span> -->
            <p class="colrOptP"></p>
          </label>
        </div>
      </div>
    <?php }


    function newSvg($id){ ?>

      <svg class="cartItemSvg" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <use xlink:href="#<?php echo $id; ?>"></use>
      </svg>

    <?php }

















//Second solution : two or more files.
//If you're using a child theme you could use:
// get_stylesheet_directory_uri() instead of get_template_directory_uri()
add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
function load_admin_styles() {
  // wp_enqueue_style( 'admin_css_foo', get_template_directory_uri() . '/css/backoffice.css', false, '1.0.0' );
}








add_action(        'admin_post_lt_upload_file', 'lt_upload_file');
add_action( 'admin_post_nopriv_lt_upload_file', 'lt_upload_file');

function lt_upload_file(){
  $link=$_POST['link'];

  if(isset($_POST['submit'])){
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];


    $fileExt= explode('.' , $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $fileName2 = strtolower(($fileExt[0]));

    $allowedExt = array( 'csv','tsv');
    $fileNamesAllowed = array('ventas','gastos_adicionales','trenes','contenedores');


    if(in_array($fileName2,$fileNamesAllowed)){
      if(in_array($fileActualExt, $allowedExt)){
        if($fileError=== 0 ){
          if ($fileSize < 7000000) {
            $fileNameNew = $fileName2 . '-' . date("m-d-Y"). '.' . $fileActualExt;
            $fileDestination = get_template_directory()."/uploads/".$fileNameNew;
            if(move_uploaded_file($fileTmpName,$fileDestination)){ //muevo el archivo
              echo "Your file uploaded correctly" . "<br><br>";
              // include get_template_directory().'/inc/dbh.inc.php';
              /// truncate table

              $dbServerName = "localhost";
              $dbUsername = "root";
              $dbPassword = "";
              // $dbUsername = "contraseñaDificil";
              // $dbPassword = ";$6qha)2L*KU)6nq";
              $dbName = "lattedev_silver";

              $conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);


              if ($conn -> query("truncate table $dbName.$fileName2;")) {
                echo "Se trunco la tabla correctamente.\n" . "<br><br>";
              }
              else {
                echo $conn -> error;
              }

              /// insert file in table

              // $fileRead = "http://silverSea.wave-host.net/wp-content/themes/silverSea/uploads/contenedores-05-07-2020.csv/uploads/".$fileNameNew;
              // $fileRead = get_template_directory_uri()."/uploads/".$fileNameNew;
              // $link = add_query_arg( array( 'fileRead'  => $fileRead ), $link );
              $fileRead = "C:/xampp/htdocs/Silversea/wp-content/themes/silverSea/uploads/".$fileNameNew;
              if($fileActualExt=='csv'){
                $saltoDeLinea = ',';
              } else if($fileActualExt=='tsv'){
                $saltoDeLinea = "\\t";
              }
              if ($conn -> query("LOAD DATA INFILE '" . $fileRead . "'
                                  INTO TABLE $dbName.$fileName2
                                  FIELDS TERMINATED BY '" . $saltoDeLinea . "'
                                  IGNORE 1 LINES;")) {
                // echo "Great! filed turned into a table" ."<br /><br />";
                $link = add_query_arg( array( 'status'  => 'fileIntoTable' ), $link );
              } else {
                $link = add_query_arg( array( 'status'  => 'InsertOnTableError' ), $link );
              }


              $query = new WC_Product_Query();
              $products = $query->get_products();
              foreach ($products as $key => $value) {
                // code...
                var_dump($key);
                echo '<br>';
                var_dump($value->id);
                echo '<br>';
                echo '<br>';
                if (wh_deleteProduct($value->id)) {
                  echo '<h3>product: ' . $value->id . ' DELETED</h3>';
                }
                echo '<br>';
                echo '<br>';
              }


              if ($conn -> query("create table WCProduct
                                  Select
                                  ID  ,
                                  'simple' as Type,
                                  salesforce_id as SKU,
                                  CONCAT( size, ' PIES' ) as Name  ,
                                  '1' as Published  ,
                                  '0' as 'Is featured?'  ,
                                  'visible' as 'Visibility in catalog',
                                  null as 'Short description',
                                  null as Description  ,
                                  null as 'Date sale price starts',
                                  null as 'Date sale price ends',
                                  'taxable' as 'Tax status',
                                  null as 'Tax class',
                                  1 as 'In stock?',
                                  1 as Stock  ,
                                  null as 'Low stock amount',
                                  0 as 'Backorders allowed?',
                                  0 as 'Sold individually?',
                                  null as 'Weight (kg)',
                                  null as 'Length (cm)',
                                  null as 'Width (cm)',
                                  null as 'Height (cm)',
                                  1 as 'Allow customer reviews?',
                                  null as 'Purchase note',
                                  null as 'Sale price'  ,
                                  0 as 'Regular price'  ,
                                  REPLACE(categoria,';',',') Categoria  ,
                                  null as Tags  ,
                                  null as 'Shipping class',
                                  'http://localhost/Silversea/wp-content/uploads/2020/04/CIMG0468.png' Images  ,
                                  null as 'Download limit'  ,
                                  null as 'Download expiry days'  ,
                                  null as Parent  ,
                                  null as 'Grouped products',
                                  null as 'Upsells',
                                  null as 'Cross-sells'  ,
                                  null as 'External URL'  ,
                                  null as 'Button text',
                                  null as 'Position',
                                  ancho as 'Meta: ancho',
                                  alto as 'Meta: alto',
                                  largo as 'Meta: largo',
                                  peso as 'Meta: peso',
                                  tara as 'Meta: tara'
                                  from contenedores")) {
                                    echo 'TABLA CREADAAAAA';
              }



              // // siguiendo directrices de este post:
              // // https://dominykasgel.com/woocommerce-rest-api-import-products-json/
              // require __DIR__ . '/vendor/autoload.php';
              //
              // use Automattic\WooCommerce\Client;
              // $woocommerce = new Client(
              //     'http://example.com',
              //     'ck_ed4bf437c339742c7e1c52f470c34f24d2d1c8f5',
              //     'cs_acb386012f49a7720d7f1dda8d4b2667d123f55c',
              //     [
              //         'wp_api' => true,
              //         'version' => 'wc/v2',
              //     ]
              // );
              //
              // $sql = 'SELECT * FROM WCProduct';
              //
              // $result = $conn -> query($sql);
              // $json_array = array();
              //
              // while ($row = mysqli_fetch_assoc($result)) {
              //   // code...
              //   $json_array[] = $row;
              // }
              //
              // echo '<pre>';
              // print_r($json_array);
              // echo '</pre>';



              // $importer = new WC_Product_CSV_Importer;

              // var_dump($importer);










              /// delete the first row with the name of columns
              // $sqlDelete = "delete from $dbName.contenedores where tamaño = 'tamaño';";
              //
              // if ($conn -> query($sqlDelete)) {
              //   $sqlDelete = "delete from $dbName.gastos_adicionales where pais = 'pais';";
              //   if ($conn -> query($sqlDelete)) {
              //     $sqlDelete = "delete from $dbName.ventas where pais = 'pais';";
              //     if($conn -> query($sqlDelete)){
              //       $sqlDelete = "delete from $dbName.trenes where proveedor = 'empresa';";
              //       if($conn -> query($sqlDelete)){
              //         $link = add_query_arg( array( 'status'  => 'AllSetAndDone', ), $link );
              //       }
              //     }
              //   } else {
              //     $link = add_query_arg( array( 'status'  => 'errorDeleteGastos' ), $link );
              //   }
              // } else {
              //   $link = add_query_arg( array( 'status'  => 'errorDeleteContenedores' ), $link );
              // }
            } else {
              $link = add_query_arg( array( 'status'  => 'errorUploadFile' ), $link );
            }
          } else {
            // echo "Your File is too big";
            $link = add_query_arg( array( 'error'  => 'tooBig', ), $link );
          }
        } else {
          // echo "Error uploading File";
          $link = add_query_arg( array( 'error'  => 'uploading', ), $link );
        }
      } else{
        // echo "You cannot upload Files of this type";
        $link = add_query_arg( array( 'error'  => 'wrongType', ), $link );
      }
    }
    else{
      $link = add_query_arg( array( 'error'  => 'wrongFileName', ), $link );
    }
  }
  // $link = add_query_arg( array( 'success'  => true, ), $link );
  wp_redirect($link);
}







// Receive the Request post that came from AJAX
add_action( 'wp_ajax_gatCol', 'gatCol' );
// We allow non-logged in users to access our pagination
add_action( 'wp_ajax_nopriv_gatCol', 'gatCol' );

function gatCol () {
  $col = $_POST['col'];
  $size = false;
  $tipo_1 = false;
  $tipo_2 = false;
  if(isset($_POST['size'])){$size=$_POST['size'];}
  if(isset($_POST['tipo_1'])){$tipo_1=$_POST['tipo_1'];}
  if(isset($_POST['tipo_2'])){$tipo_2=$_POST['tipo_2'];}
  // echo get_template_directory();
  // include get_template_directory_uri().'/dbh.inc.php';
  $dbServerName = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  // $dbUsername = "contraseñaDificil";
  // $dbPassword = ";$6qha)2L*KU)6nq";
  $dbName = "lattedev_silver";

  $conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);


  // global $wpdb;
  // $results = $wpdb->get_results( "SELECT distinct tamaño FROM contenedores WHERE tamaño = 20");
  // if(!empty($results))                        // Checking if $results have some values or not
  // {
  //     foreach($results as $row){
  //       echo $row;
  //     }
  // }

  $qry = "SELECT distinct $col FROM contenedores";
  if($size){
    $qry = $qry . " WHERE size = '$size'";
    // $qry = "SELECT distinct $col FROM contenedores WHERE  size = '$size'";
  }
  if($size && $tipo_1){
    $qry = $qry . " AND tipo_1 = '$tipo_1'";
    // $qry = "SELECT distinct $col FROM contenedores WHERE (size = '$size' AND tipo_1 = '$tipo_1')";
  }
  if($size && $tipo_1 && $tipo_2){
    // echo 'soy el nene';
    // $qry = $qry . " AND condicion = '$tipo_2'";
    $qry = "SELECT salesforce_id, condicion FROM contenedores WHERE size = '$size' and tipo_1 = '$tipo_1' and tipo_2 = '$tipo_2'";
    // echo $qry;
    // $qry = "SELECT distinct $col FROM contenedores WHERE (size = '$size' AND tipo_1 = '$tipo_1' AND condicion = '$tipo_2')";
  }

  // echo $qry;
  // "SELECT distinct tipo_1 FROM contenedores WHERE size = '$algunTamaño'"
  // "SELECT distinct condicion FROM contenedores WHERE size = '$algunTamaño' and tipo_1 = '$algunTipo'"

  $ress = $conn->query($qry);
  $resp = $ress->fetch_all(MYSQLI_ASSOC);
  echo wp_json_encode( $resp );




  // $ress = $conn -> query("SELECT * FROM contenedores where id = 1");
  // echo json_encode($resp);
  // var_dump($resp);
  // if ($resp) {
  //   echo "ahi tene";
  //   echo "<br>";
  // } else {
  //   echo "error";
  //   echo "<br>";
  //   echo $conn -> error;
  // }
  exit();
}








/**
 * Method to delete Woo Product
 *
 * @param int $id the product ID.
 * @param bool $force true to permanently delete product, false to move to trash.
 * @return \WP_Error|boolean
 */
function wh_deleteProduct($id, $force = FALSE)
{
    $product = wc_get_product($id);

    if(empty($product))
        return new WP_Error(999, sprintf(__('No %s is associated with #%d', 'woocommerce'), 'product', $id));

    // If we're forcing, then delete permanently.
    if ($force)
    {
        if ($product->is_type('variable'))
        {
            foreach ($product->get_children() as $child_id)
            {
                $child = wc_get_product($child_id);
                $child->delete(true);
            }
        }
        elseif ($product->is_type('grouped'))
        {
            foreach ($product->get_children() as $child_id)
            {
                $child = wc_get_product($child_id);
                $child->set_parent_id(0);
                $child->save();
            }
        }

        $product->delete(true);
        $result = $product->get_id() > 0 ? false : true;
    }
    else
    {
        $product->delete();
        $result = 'trash' === $product->get_status();
    }

    if (!$result)
    {
        return new WP_Error(999, sprintf(__('This %s cannot be deleted', 'woocommerce'), 'product'));
    }

    // Delete parent product transients.
    if ($parent_id = wp_get_post_parent_id($id))
    {
        wc_delete_product_transients($parent_id);
    }
    return true;
}
