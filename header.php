<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css2?family=Rambla:wght@400;700&display=swap" rel="stylesheet">

  <?php wp_head(); ?>

  <!-- <template id="cartItemTemplate"> -->
    <?php //include get_template_directory().'/dynamicCont.php' ?>
  <!-- </template> -->


  <template id="selectBoxOptionTemplate">
    <!-- <label class="label--checkbox ">
      <input type="checkbox" name="adwords"   class="checkbox my-auto">
      <p class="selectBoxOptionLabel"></p>
    </label> -->

    <label for="" class="selectBoxOption" data-test="red">
      <input class="selectBoxInput" id="" type="" name="" value="">
      <!-- <span class="checkmark"></span> -->
      <p class="selectBoxOptionLabel"></p>
    </label>
  </template>


  <template id="svgTemplate">
    <svg class="svg" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
      <use class="use" xlink:href=""></use>
    </svg>
  </template>


  <template id="cartItemTemplate">
    <div class="cartItem">
      <p class="cartItemQty">1</p>
      <svg class="cartItemSvg cartItemSize" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><use class="use" xlink:href=""></use></svg>
      <svg class="cartItemSvg cartItemTip1" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><use class="use" xlink:href=""></use></svg>
      <svg class="cartItemSvg cartItemTip2" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><use class="use" xlink:href=""></use></svg>
      <svg class="cartItemSvg cartItemCond" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><use class="use" xlink:href=""></use></svg>
      <button class="close" type="button" onclick="cartController.remove()">
        <div class="closeLine"></div>
        <div class="closeLine"></div>
      </button>
    </div>
  </template>


</head>
<body class="body" id="body" <?php body_class(); ?>>

  <?php include 'assets/allIcons.php'; ?>

    <svg class="dynamicContLogo" style="display:none" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
      <path id="test" fill="currentColor" d="M632 64c4.4 0 8-3.6 8-8V40c0-4.4-3.6-8-8-8H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h8v384H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h624c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8h-8V64h8zm-40 384H48V64h544v384zm-472-64h16c4.4 0 8-3.6 8-8V136c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v240c0 4.4 3.6 8 8 8zm96 0h16c4.4 0 8-3.6 8-8V136c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v240c0 4.4 3.6 8 8 8zm96 0h16c4.4 0 8-3.6 8-8V136c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v240c0 4.4 3.6 8 8 8zm96 0h16c4.4 0 8-3.6 8-8V136c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v240c0 4.4 3.6 8 8 8zm96 0h16c4.4 0 8-3.6 8-8V136c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v240c0 4.4 3.6 8 8 8z"></path>
    </svg>




	<view id="load" class="load"><div class="circle"></div></view>

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
      <a href="<?php echo site_url('');  ?>" class="logoLink">
        <img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Silversea Logo">
      </a>
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


  <div class="cart" id="cart">
    <div class="cartHead">
      <h4 class="cartTitle">soy un carrito</h4>
      <button class="btn" type="button" onclick="cartController.send()">
        Finalizar
      </button>
    </div>
    <div class="cartList"></div>
  </div>


  <!-- <div class="cartItem">
  <p class="cartItemQty">1</p>
  <?php newSvg('pies20'); ?>
  <?php newSvg('Dry'); ?>
  <?php newSvg('DC'); ?>
  <?php newSvg('NEW'); ?>

  <button class="close" type="button" onclick="cartController.remove('x')">
  <div class="closeLine"></div>
  <div class="closeLine"></div>
</button>
</div> -->
