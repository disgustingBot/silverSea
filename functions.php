<?php
require_once 'inc/customPosts.php';
require_once 'inc/productFactory.php';
require_once 'inc/formHandler.php';
require_once 'inc/ajax.php';

// require_once get_template_directory() . '/inc/productFactory.php';


function lattte_setup(){

  // TOOOODO ESTO ES PARA AJAX
	global $wp_query;
	// In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');
	// register our main script but do not enqueue it yet
	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/js/myloadmore.js', array('jquery') );

	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages,
		'first_page' => get_pagenum_link(1) // here it is
	) );

 	wp_enqueue_script( 'my_loadmore' );
  // FIN DE PARA AJAX


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

      <svg class="pageSvg" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35">
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



// SINCROTRON
// consultas a base de datos para el sincrotron
add_action( 'wp_ajax_lt_create_products', 'lt_create_products' );
add_action( 'wp_ajax_nopriv_lt_create_products', 'lt_create_products' );
function lt_create_products () {
	$debugMode = true;
	$respuesta = array();
	$products = false;
	// if(isset($_POST['products']) && $_POST['products'] == 'true'){$products=true;}
	$respuesta['greet'] = 'Hi!';
	if(isset($_POST['products'])){
		$products=json_decode(stripslashes($_POST['products']));
		$respuesta['gate0'] = 'productos recibidos';
		// $respuesta['decode'] = $products;
		foreach ($products as $key => $value) {
			$respuesta['name'] = $value->Name;
						// FALTAN LAS IMAGENES
						$basic_data = array(
							'post_title'             => $value->Name,
							'post_content'           => $value->Description,
						);
						$categories = array(
							0 => $value->size,
							1 => $value->tipo_2,
							2 => $value->condition,
						);
						$meta_data = array(
							'alto'  => $value->alto,
							'ancho' => $value->ancho,
							'largo' => $value->largo,
							'_sku'  => $value->SKU,
						);

						// $respuesta['data'] = $basic_data;
						// $respuesta['cate'] = $categories;
						// $respuesta['meta'] = $meta_data;



						$newID = newProduct($basic_data, $categories, $meta_data);
						$respuesta[$key] = "Product '".$newID."' creado";
		}



	}else{$respuesta['gate0'] = 'error al recibir productos';}
	if($debugMode){echo wp_json_encode($respuesta);}
	exit();
}





function get_products_count(){
		$qnty = 0;
		$args = array('post_type'=>'product','posts_per_page'=>-1,);
		$loop = new WP_Query($args);
    while($loop->have_posts()){$loop->the_post();$qnty++;}
		wp_reset_query();
		return $qnty;
}




// consultas a base de datos para el sincrotron
add_action( 'wp_ajax_lt_wipe_products', 'lt_wipe_products' );
add_action( 'wp_ajax_nopriv_lt_wipe_products', 'lt_wipe_products' );
function lt_wipe_products () {
	$debugMode = true;
	$respuesta = array();
	$delete = false;
	$cantidad = 0;
	if(isset($_POST['delete']) && $_POST['delete'] == 'true'){$delete=true;}
	if(isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}

	$respuesta['status'] = 'Saludos desde el servidor, espero orden de eliminar.';
	$respuesta['delete'] = $delete;



	if ($delete) {
		$respuesta['gate0'] = 'orden de eliminar detectada';

		$qnty = get_products_count();
		$respuesta['qnty'] = $qnty;

		$args = array(
			'post_type'      => 'product',
			'posts_per_page' => $cantidad,
		);

		$loop = new WP_Query( $args );
		$i = 0;
    while ( $loop->have_posts() ) : $loop->the_post();
			$respuesta[$i] = get_the_id();
			if (wh_deleteProduct($respuesta[$i])) {
				$respuesta[$i] = "Producto '".get_the_title()."' eliminado";
			}
      // global $product;
      // echo '<br /><a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().' '.get_the_title().'</a>';
			$i++;
    endwhile;
    wp_reset_query();

		if($i==0){$respuesta['status'] = 'No hay productos';}
	}else{
		$qnty = get_products_count();
		$respuesta['qnty'] = $qnty;
		$respuesta['toDelete'] = $qnty;
	}

	if($debugMode){echo wp_json_encode($respuesta);}
	exit();
}

add_action( 'wp_ajax_lt_upload_file', 'lt_upload_file' );
add_action( 'wp_ajax_nopriv_lt_upload_file', 'lt_upload_file' );

function lt_upload_file () {
	$debugMode = false;
	$respuesta = array();
	$file = false;
	if(isset($_FILES['file'])){$respuesta['gate0'] = "Your file '$fileName' got to the server safely";
		$file = $_FILES['file'];

    $fileName    = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize    = $file['size'];
    $fileError   = $file['error'];

		// $respuesta['name'] = $fileName;
    $fileExt= explode('.' , $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $fileName2 = strtolower(($fileExt[0]));

    $allowedExt = array( 'csv','tsv');
    $fileNamesAllowed = array('stock','gastos_adicionales','trenes','contenedores', 'locations');

		$fileNameNew = $fileName2 . '-' . date("m-d-Y"). '.' . $fileActualExt;
		$fileDestination = wp_normalize_path(get_template_directory()."/uploads/".$fileNameNew);

		$fileRead = "C:/xampp/htdocs/Silversea/wp-content/themes/silverSea/uploads/".$fileNameNew;
		if($fileActualExt=='csv'){$saltoDeLinea=",";}
		if($fileActualExt=='tsv'){$saltoDeLinea="\\t";}


    $dbServerName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    // $dbUsername = "contraseñaDificil";
    // $dbPassword = ";$6qha)2L*KU)6nq";
    $dbName = "lattedev_silver";

    $conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
		$query1 = "truncate table $dbName.$fileName2;";
		$query2 = "LOAD DATA INFILE '" . $fileDestination . "' INTO TABLE $dbName.$fileName2 FIELDS TERMINATED BY '" . $saltoDeLinea . "' IGNORE 1 LINES;";
		$qry = "Select
						salesforce_id as SKU,
						CONCAT( size, ' PIES' ) as 'Name',
						container_description as 'Description',
						null as 'Short description',
						1 as 'In stock?',
						1 as 'Stock',
						null as 'Weight (kg)',
						null as 'Length (cm)',
						null as 'Width (cm)',
						null as 'Height (cm)',
						1 as 'Allow customer reviews?',
						REPLACE(categoria,';',',') 'Categoria',
						'http://localhost/Silversea/wp-content/uploads/2020/04/CIMG0468.png' Images,
						ancho as 'ancho',
						alto as 'alto',
						largo as 'largo',
						peso as 'peso',
						tara as 'tara',
						tipo_2 as 'tipo_2',
						condicion as 'condition',
						CONCAT( size, 'pies' ) as 'size'
						from contenedores";

		if($fileError===0){$respuesta['gate1']="No errors uploading";
	    if(in_array($fileName2,$fileNamesAllowed)){$respuesta['gate2']="Your file '$fileName' has a valid name";
				if(in_array($fileActualExt,$allowedExt)){$respuesta['gate3']="Your file '$fileName' has a valid type";
					if($fileSize<7000000){$respuesta['gate4']="File size is ok";
						if(move_uploaded_file($fileTmpName,$fileDestination)){$respuesta['gate5']="File saved in the server correctly";
							if($conn->query($query1)){$respuesta['gate6']="table correctly truncated";
								if ($conn->query($query2)) {$respuesta['gate7']="Data loaded into table";

									if($fileName2 == 'contenedores'){
										// esta parte solo deberi ejecutar en el caso de "contenedores"
										if($conn->query($qry)){
											$ress = $conn->query($qry);
											$resp = $ress->fetch_all(MYSQLI_ASSOC);
											$json_array = wp_json_encode( $resp );
											if (!$debugMode) {
												echo $json_array;
											}
										}
									}else{
										echo wp_json_encode($respuesta);
									}

								}else{$respuesta['gate7']="Error loading data in the table";}
							}else{$respuesta['gate6']="Error truncating old Table";}
						}else{$respuesta['gate5']="Error saving file in the server";}
					}else{$respuesta['gate4']="File is too big";}
				}else{$respuesta['gate3']="Your file '$fileName' DOESN'T have a valid type";}
	    }else{$respuesta['gate2']="Your file '$fileName' DOESN'T have a valid name";}
		}else{$respuesta['gate1']="Error uploading";}
	}else{$respuesta['gate0']="No file recived";}

	if($debugMode){echo wp_json_encode($respuesta);}
	exit();
}










// COTIZADOR


add_action( 'wp_ajax_lt_cart_end', 'lt_cart_end' );
add_action( 'wp_ajax_nopriv_lt_cart_end', 'lt_cart_end' );

function lt_cart_end () {
	$debugMode = false;
	$respuesta = array();
	$contenedor = $_POST['cont'];
	$country = $_POST['country'];
	$city = $_POST['city'];


	    $dbServerName = "localhost";
	    $dbUsername = "root";
	    $dbPassword = "";
	    // $dbUsername = "contraseñaDificil";
	    // $dbPassword = ";$6qha)2L*KU)6nq";
	    $dbName = "lattedev_silver";

	    $conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

	$qry = "SELECT * from stock WHERE id_contenedor = '$contenedor' AND pais = '$country' AND ciudad = '$city';";
	$ress = $conn->query($qry);
	$resp = $ress->fetch_all(MYSQLI_ASSOC);
	$json_array = wp_json_encode( $resp );
	if(!$debugMode){
		echo $json_array;
	}

	$respuesta['query']=$qry;
	$respuesta['contenedor']=$contenedor;
	$respuesta['country']=$country;
	$respuesta['city']=$city;

	$respuesta['test'] = 'saludos desde aca en el server';

	if($debugMode){echo wp_json_encode($respuesta);}
	exit();
}


// consultas a base de datos para el cotizador
// consultas a base de datos para el cotizador
add_action( 'wp_ajax_gatCol', 'gatCol' );
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

  $qry = "SELECT distinct $col FROM contenedores";
  if($size){
    $qry = $qry . " WHERE size = '$size'";
  }
  if($size && $tipo_1){
    $qry = $qry . " AND tipo_1 = '$tipo_1'";
  }
  if($size && $tipo_1 && $tipo_2){
    $qry = "SELECT salesforce_id, condicion FROM contenedores WHERE size = '$size' and tipo_1 = '$tipo_1' and tipo_2 = '$tipo_2'";
  }

  $ress = $conn->query($qry);
  $resp = $ress->fetch_all(MYSQLI_ASSOC);
  echo wp_json_encode( $resp );
  exit();
}



add_action( 'wp_ajax_lt_get_location', 'lt_get_location' );
add_action( 'wp_ajax_nopriv_lt_get_location', 'lt_get_location' );

function lt_get_location () {
	$debugMode = true;
	$respuesta = array();
	$col = $_POST['column'];
	$country = false;
	if(isset($_POST['country'])){$country=$_POST['country'];}


	$dbServerName = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	// $dbUsername = "contraseñaDificil";
	// $dbPassword = ";$6qha)2L*KU)6nq";
	$dbName = "lattedev_silver";

	$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

	$qry = "SELECT distinct $col FROM locations";
	if ($country) {
		$qry = $qry . " WHERE country = '$country'";
		// code...
	}
	  $ress = $conn->query($qry);
	  $resp = $ress->fetch_all(MYSQLI_ASSOC);
		$respuesta['location'] = wp_json_encode( $resp );
		// $respuesta['location'] = $col;


	$respuesta['test'] = 'Hola desde el server';

	if($debugMode){echo wp_json_encode($respuesta);}
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
