<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css2?family=Rambla:wght@400;700&display=swap" rel="stylesheet">

  <?php wp_head(); ?>

  <template id="cartItemTemplate">
    <?php include get_template_directory().'/dynamicCont.php' ?>
  </template>


  <template id="selectBoxOptionTemplate">
    <label for="" class="selectBoxOption">
      <input class="selectBoxInput" id="" type="radio" name="" value="">
      <!-- <span class="checkmark"></span> -->
      <p class="selectBoxOptionLabel"></p>
    </label>
  </template>


</head>
<body class="body" id="body" <?php body_class(); ?>>

	<!-- <view id="load" class="load">
			<div class="circle"></div>
	</view> -->

  <?php include('blueBar.php') ?>
  <header class="header" id="header">

    <!-- NAVIGATION BAR -->
    <a href="<?php echo site_url('');  ?>" class="logoLink">
      <img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Silversea Logo">
    </a>
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
    <div class="upperHeader" id="cosaTest">
      <img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Silversea Logo">
      <div class="hamburgerMenu" onclick="altClassFromSelector('mobileNavMenu','#body')">
        <div class="hamStripe"></div>
        <div class="hamStripe"></div>
        <div class="hamStripe"></div>
      </div>
    </div>
  </header>
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
