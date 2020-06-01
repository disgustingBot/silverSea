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

  <header class="header" id="header">
    <?php include('blueBar.php') ?>

    <!-- NAVIGATION BAR -->
    <a class="headerLogoLink" href="<?php echo site_url('');  ?>" class="logoLink">
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

    <div class="cartButton" onclick="altClassFromSelector('alt', '#cart')">
      <svg class="cartButtonSvg" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
        <path fill="currentColor" d="M551.991 64H129.28l-8.329-44.423C118.822 8.226 108.911 0 97.362 0H12C5.373 0 0 5.373 0 12v8c0 6.627 5.373 12 12 12h78.72l69.927 372.946C150.305 416.314 144 431.42 144 448c0 35.346 28.654 64 64 64s64-28.654 64-64a63.681 63.681 0 0 0-8.583-32h145.167a63.681 63.681 0 0 0-8.583 32c0 35.346 28.654 64 64 64 35.346 0 64-28.654 64-64 0-17.993-7.435-34.24-19.388-45.868C506.022 391.891 496.76 384 485.328 384H189.28l-12-64h331.381c11.368 0 21.177-7.976 23.496-19.105l43.331-208C578.592 77.991 567.215 64 551.991 64zM240 448c0 17.645-14.355 32-32 32s-32-14.355-32-32 14.355-32 32-32 32 14.355 32 32zm224 32c-17.645 0-32-14.355-32-32s14.355-32 32-32 32 14.355 32 32-14.355 32-32 32zm38.156-192H171.28l-36-192h406.876l-40 192z"></path>
      </svg>
    </div>
  </header>

  <header class="headerMob" id="headerMob">
    <div class="upperHeader" id="cosaTest">
      <a class="logoLink" href="<?php echo site_url('');  ?>">
        <img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Silversea Logo">
      </a>
      <div class="hamburgerMenu" onclick="altClassFromSelector('mobileNavMenu','#body')">
        <div class="hamStripe"></div>
        <div class="hamStripe"></div>
        <div class="hamStripe"></div>
      </div>
    </div>
  </header>
  <nav class="navBarMobileContainer">
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
    <?php include('blueBar.php') ?>
  </nav>


<div class="redDot" id="cartFixerActivator"></div>
  <div class="cart Obse" id="cart" data-observe="#cartFixerActivator" data-unobserve="false">
    <div class="cartHead">
      <h4 class="cartTitle">Tu Carrito</h4>
      <button class="btn" type="button" onclick="altClassFromSelector('alt', '#finalizarConsulta')">
        Finalizar
      </button>
    </div>
    <div class="cartList"></div>
  </div>

  <div class="finalizarConsulta alt" id="finalizarConsulta">
    <?php require_once 'coprAlqui.php'; ?>
    <!-- <p>comprAlqui</p> -->
    <p>datos de contacto</p>
    <button class="btn" onclick="cartController.send()">dame precio rapido</button>
  </div>
