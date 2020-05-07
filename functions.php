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





















    function selectBox($placeholder){ ?>
      <div class="selectBox" tabindex="1" id="selectBox<? $placeholder; ?>">
        <div class="selectBoxButton">
          <p class="selectBoxPlaceholder"><?php echo $placeholder; ?></p>
          <p class="selectBoxCurrent" id="selectBoxCurrentOrigenCity"></p>
        </div>
        <div class="selectBoxList">
          <label for="nulOrigenCity" class="selectBoxOption">
            <input
              class="selectBoxInput"
              id="nulOrigenCity"
              type="radio"
              data-slug="0"
              data-parent="city"
              name="filter_city"
              onclick="selectBoxControler('','#selectBoxOrigenCity','#selectBoxCurrentOrigenCity')"
              value="0"
            >
            <!-- <span class="checkmark"></span> -->
            <p class="colrOptP"></p>
          </label>
          <label for="barcelona" class="selectBoxOption">
            <input
              class="selectBoxInput"
              id="barcelona"
              data-slug="barcelona"
              data-parent="city"
              type="radio"
              name="filter_city"
              onclick="selectBoxControler('Barcelona', '#selectBoxOrigenCity', '#selectBoxCurrentOrigenCity')"
              value="barcelona"
            >
            <!-- <span class="checkmark"></span> -->
            <p class="colrOptP">Barcelona</p>
          </label>
          <label for="buenos-aires" class="selectBoxOption">
            <input
              class="selectBoxInput"
              id="buenos-aires"
              data-slug="buenos-aires"
              data-parent="city"
              type="radio"
              name="filter_city"
              onclick="selectBoxControler('Buenos Aires', '#selectBoxOrigenCity', '#selectBoxCurrentOrigenCity')"
              value="Buenos Aires"
            >
            <!-- <span class="checkmark"></span> -->
            <p class="colrOptP">Buenos Aires</p>
          </label>
        </div>
      </div>
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

    $allowed = array( 'csv', 'xls', 'xlsx' );



    if(in_array($fileActualExt, $allowed)){
      if($fileError=== 0 ){
        if ($fileSize < 7000000) {
          $fileNameNew = $fileName2 . '-' . date("m-d-Y"). '.' . $fileActualExt;
          $fileDestination = get_template_directory()."/uploads/".$fileNameNew;
          if(move_uploaded_file($fileTmpName,$fileDestination)){
            echo "Your file uploaded correctly";
          }
          else{
            echo "Error inesperado: " . $fileError;
          }
          // header("Location:index.php?uploadSucess");
          $link = add_query_arg( array( 'status'  => 'success', ), $link );
        }
        else {
            // echo "Your File is too big";
            $link = add_query_arg( array( 'error'  => 'tooBig', ), $link );
        }
      }
      else {
        // echo "Error uploading File";
        $link = add_query_arg( array( 'error'  => 'uploading', ), $link );
      }
    }
    else{
      // echo "You cannot upload Files of this type";
      $link = add_query_arg( array( 'error'  => 'wrongType', ), $link );
    }
  }
  // $link = add_query_arg( array( 'success'  => true, ), $link );
  wp_redirect($link);
}







// Receive the Request post that came from AJAX
add_action( 'wp_ajax_ajaxTest', 'ajaxTest' );
// We allow non-logged in users to access our pagination
add_action( 'wp_ajax_nopriv_ajaxTest', 'ajaxTest' );

function ajaxTest () { ?>

    <?php
    $args = array(
      'post_type'=>$_POST['post_type'],
      'posts_per_page'=>4,
    );
    $blogPosts=new WP_Query($args); ?>

    <h3 class="sliderTitle title">Chupame la pija</h3>
    <div class="sliderCards">
      <?php while($blogPosts->have_posts()){$blogPosts->the_post(); ?>
        <?php global $product; ?>


        <figure class="card"  id="card<?php echo get_the_id();?>">
          <a class="cardImg" href="<?php echo get_permalink(); ?>">
            <img class="cardImg lazy" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
          </a>
          <figcaption class="cardCaption">
            <p class="cardTitle"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></p>
            <p class="productCardPrice"><a href="<?php echo get_permalink(); ?>"> <?php echo $product->get_price_html(); ?> </a></p>
          </figcaption>
        </figure>
      <?php } ?>
<?php }
