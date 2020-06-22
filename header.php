<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- GOOGLE FONTS -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Rambla:wght@400;700&display=swap" rel="stylesheet"> -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet"> -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

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
    <svg class="svg" aria-hidden="true" focusable="false" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 24 24">
      <use class="use" xlink:href=""></use>
    </svg>
  </template>


  <template id="cartItemTemplate">
    <div class="cartItem">
      <p class="cartItemCode"></p>
      <svg class="cartItemSvg cartItemSize" aria-hidden="true" focusable="false" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 35 35"><use class="use" xlink:href=""></use></svg>
      <svg class="cartItemSvg cartItemTip1" aria-hidden="true" focusable="false" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 35 35"><use class="use" xlink:href=""></use></svg>
      <svg class="cartItemSvg cartItemTip2" aria-hidden="true" focusable="false" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 35 35"><use class="use" xlink:href=""></use></svg>
      <svg class="cartItemSvg cartItemCond" aria-hidden="true" focusable="false" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 35 35"><use class="use" xlink:href=""></use></svg>
      <p class="cartItemQty">1</p>
      <p class="cartItemPrice">
        <span class="cartItemPriceNumber"></span>
        <span class="cartItemCurrency"></span>
      </p>
      <button class="close" type="button" onclick="cartController.remove()">
        <div class="closeLine"></div>
        <div class="closeLine"></div>
      </button>
    </div>
  </template>


</head>
<body class="body" id="body" <?php body_class(); ?>>

  <?php include 'assets/allIcons.php'; ?>

	<view id="load" class="load"><div class="circle"></div></view>

  <header class="header" id="header">

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

    <div class="cardBtnContainer">
      <div class="cartButton" onclick="altClassFromSelector('alt', '#cart')">
        <svg class="cartButtonSvg" aria-hidden="true" focusable="false" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 35 35">
          <use xlink:href="#simpleTruck" class="cartButtonUse"></use>
        </svg>
      </div>
      <p class="cartButtonTxt">Ver pedido</p>
    </div>


    <div class="hamburgerMenu" onclick="altClassFromSelector('mobileNavMenu','#body')">
      <span class="hamStripe"></span>
      <span class="hamStripe"></span>
      <span class="hamStripe"></span>
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


  <div class="cart" id="cart">
    <div class="cartHead">
      <h4 class="cartTitle">Tu Carrito</h4>
      <button class="btn" type="button" onclick="altClassFromSelector('alt', '#finalizarConsulta')">
        FINALIZAR
      </button>
      <button class="btn" type="button" onclick="altClassFromSelector('alt', '#cart')">
        CERRAR
      </button>
    </div>
    <div class="cartList"></div>
  </div>

  <div class="finalizarConsulta" id="finalizarConsulta">
    <p class="closeCross" onclick="altClassFromSelector('alt', '#finalizarConsulta'),altClassFromSelector('alt', '#cart')">&#10006;</p>
    <h4 class="finalizarConsultaTitle txtCenter">Un paso mas...</h4>
    <p class="finalizarConsultaSubTitle txtCenter">Necesitamos algunos datos para poder darte una cotización rápida.</p>
    <p class="finalizarConsultaSubTitle txtCenter">Además, te enviaremos un email con el detalle.</p>
    <?php require_once 'coprAlqui.php'; ?>


    <div class="mateput">
      <input class="mateputInput" id="mateputNombre" type="text" name="nombre" autocomplete="off">
      <label for="mateputNombre" class="mateputLabel">
        <span class="mateputName">Nombre</span>
      </label>
    </div>

    <div class="mateput">
      <input class="mateputInput" id="mateputTelefono" type="tel" name="telefono" autocomplete="off">
      <label for="mateputTelefono" class="mateputLabel">
        <span class="mateputName">Telefono</span>
      </label>
    </div>

    <div class="mateput">
      <input class="mateputInput" id="mateputEmail" type="email" name="email" autocomplete="off">
      <label for="mateputEmail" class="mateputLabel">
        <span class="mateputName">Email</span>
      </label>
    </div>


    <button class="btn" onclick="cartController.finish()">dame precio rapido</button>
  </div>



  <!-- <div
    id="redSquare"

    style="
      position:fixed;
      bottom:235px;
      left:25%;
      height:400px;
      width:400px;
      background:red;
      z-index:2000;
    "
  ></div> -->
