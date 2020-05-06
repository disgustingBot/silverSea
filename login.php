<?php

// Template Name: Custom Login Page

global $user_ID;
global $wpdb;

if (!$user_ID) {
  if ($_POST) {
    $username = $wpdb->escape($_POST['username']);
    $password = $wpdb->escape($_POST['password']);

    $login_array = array();
    $login_array['user_login'] = $username;
    $login_array['user_password'] = $password;

    $verify_user = wp_signon($login_array, true);
    if(!is_wp_error($verify_user)) {

      echo "<script>window.location = '".site_url()."'</script>";

    }else {
      echo "<p>Invalid Credentials</p>";
    }


  }else {
  // User in logged out state
  get_header();
  ?>
  <form action="" class="login">
    <input type="text" name="" value="" placeholder="User">
    <input type="password" name="" value="" placeholder="Password">
    <input type="checkbox" name="" value="">Remember me
    <a href="">Forget Password?</a>
    <button class="btn blue" type="button" name="button">Entrar</button>
  </form>
  <?php
  get_footer();
  }


?>


  <?php


} else {
  // User is logged in
}


 ?>
