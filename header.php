<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css2?family=Rambla:wght@400;700&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
</head>
<body class="body" id="body" <?php body_class(); ?>>

	<view id="load" class="load">
			<div class="circle"></div>
	</view>

  <header class="header" id="header">
    <?php include('blueBar.php') ?>

    <!-- NAVIGATION BAR -->
    <img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Silversea Logo">
  	<?php
    	$args = array(
    	  'theme_location' => 'header',
    	  'depth' => 0,
    	  'container'	=> false,
    	  'fallback_cb' => false,
    	  'menu_class' => 'navBar',
    	);
    	wp_nav_menu($args);
  	?>
  </header>

  <header class="headerMob" id="headerMob">
    <?php include('blueBar.php') ?>
    <div class="upperHeader">
      <img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Silversea Logo">
      <div class="hamburgerMenu" onclick="altClassFromSelector('mobileNavMenu','#body')">
        <div class="hamStripe"></div>
        <div class="hamStripe"></div>
        <div class="hamStripe"></div>
      </div>
    </div>
    <?php
      $args = array(
        'theme_location' => 'navBarMobile',
        'depth' => 0,
        'container'	=> false,
        'fallback_cb' => false,
        'menu_class' => 'navBarMobile',
      );
      wp_nav_menu($args);
      ?>
  </header>
