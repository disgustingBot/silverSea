<?php

require_once 'customPosts.php';

function lattte_setup(){
  wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime(), 'all');
  wp_enqueue_script('main', get_theme_file_uri('/js/custom.js'), NULL, microtime(), true);
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

    $allowed = array( 'csv', 'xls', 'xlsx' );
    // console_log($fileName);
    // console_log($fileTmpName);
    // console_log($fileSize);
    // console_log($fileError);
    // console_log($fileType);
    // print_r($file);
    // echo $fileName."<br >";
    // echo $fileTmpName."<br >";
    // echo $fileSize."<br >";
    // echo $fileError."<br >";
    // echo $fileType."<br >";
    // print_r($allowed);
    // echo $fileActualExt."<br >";


    if(in_array($fileActualExt, $allowed)){
      if($fileError=== 0 ){
        if ($fileSize < 7000000) {
          $fileNameNew = uniqid('',true).'.'.$fileActualExt;
          echo $_SERVER['DOCUMENT_ROOT']."<br />";
          echo "get_template_directory_uri: ".get_template_directory_uri()."/uploads"."<br />";
          $fileDestination = get_template_directory_uri()."/uploads".$fileNameNew;
          echo $fileDestination;
          move_uploaded_file($fileTmpName,$fileDestination);
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
