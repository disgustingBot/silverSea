<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">


  <?php wp_head(); ?>

  <?php include __DIR__ . '/header_templates.php'; ?>
  <?php include __DIR__ . '/header_third_parties.php'; ?>


</head>
<body class="body" id="body" <?php body_class(); ?>>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FWBCN9"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->


  <?php
  // TODO: ojo aca, esta llamando a TODOS los iconos, tambien a los que no se usan
  include 'assets/allIcons.php';
  ?>

	<!-- <view id="load" class="load"><div class="circle"></div></view> -->
  <header class="header" id="header">

    <!-- NAVIGATION BAR -->
    <a class="headerLogoLink" href="<?php echo site_url('');  ?>" class="logoLink">
      <img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/silversea_logo_color_encajado.png" alt="SilverSea Logo">
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

      <!-- add to cart notification -->
      <div class="itemAddedToCart">
        <p class="itemAddedTxt">Se ha añadido un elemento al pedido.</p>
      </div>
      <svg class="itemAddedIcon" aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 448c-110.532 0-200-89.431-200-200 0-110.495 89.472-200 200-200 110.491 0 200 89.471 200 200 0 110.53-89.431 200-200 200zm42-104c0 23.159-18.841 42-42 42s-42-18.841-42-42 18.841-42 42-42 42 18.841 42 42zm-81.37-211.401l6.8 136c.319 6.387 5.591 11.401 11.985 11.401h41.17c6.394 0 11.666-5.014 11.985-11.401l6.8-136c.343-6.854-5.122-12.599-11.985-12.599h-54.77c-6.863 0-12.328 5.745-11.985 12.599z"></path>
      </svg>
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
      <p class="cartTitle">Tu Pedido</p>

      <p class="closeCross" type="button" onclick="altClassFromSelector('alt', '#cart')">&#10006;</p>
    </div>

    <div class="cartList" id="cartList">

      <!--- PRECIO DISPONIBLE -->
      <p class="cartTotalTxt allPricesThere"><strong><?php echo get_post_meta('150', 'ZH-cotizador-precio-disponible-titulo', true); ?></strong></p>
      <p class="cartTotalTxt allPricesThere">
        <?php echo get_post_meta('150', 'ZI-cotizador-precio-disponible-texto1', true); ?>
        <span class="cartTotal brandColorTxt txtUnderlined">1234</span>

        <!-- ESTE ES EL CAMPO PARA EL TIPO DE CURRENCIE -->
        <span class="cartTotalCurrency brandColorTxt txtUnderlined">€</span>.
        <?php echo get_post_meta('150', 'ZJ-cotizador-precio-disponible-texto2', true); ?>
      </p>


      <!-- ALGUNOS CONTENEDORES SELECCIONADOS NO TIENEN PRECIO RAPIDO  -->

      <p class="cartTotalTxt somePricesThere"><strong><?php echo get_post_meta('150', 'ZK-cotizador-algunos-precios-no-disponibles-titulo', true); ?> </strong></p>
      <p class="cartTotalTxt somePricesThere"><?php echo get_post_meta('150', 'ZL-cotizador-algunos-precios-no-disponibles-texto1', true); ?></p>
      <p class="cartTotalTxt somePricesThere"> <span class="cartTotal brandColorTxt txtUnderlined">1234</span><span class="cartTotalCurrency brandColorTxt txtUnderlined">€</span>. <?php echo get_post_meta('150', 'ZN-cotizador-algunos-precios-no-disponibles-texto3', true); ?></p>


      <!-- PRECIO NO DISPONIBLE -->

      <p class="cartTotalTxt nonePricesThere"><strong><?php echo get_post_meta('150', 'ZO-cotizador-precio-no-disponible-titulo', true); ?></strong></p>
      <p class="cartTotalTxt nonePricesThere"><?php echo get_post_meta('150', 'ZP-cotizador-precio-no-disponible-texto', true); ?></p>


      <p class="cartTitle txtCenter txtUnderlined"><?php echo get_post_meta('150', 'ZQ-cotizador-detalle-consulta-titulo', true); ?></p>
    </div>

    <div class="cartButtons">

      <button class="btn CotizadorEndButton buttonsAtBegin" disabled type="button" onclick="cartController.emptyCart()">
        Vaciar Carrito
      </button>
      <button class="btn CotizadorEndButton buttonsAtBegin" disabled type="button" onclick="altClassFromSelector('alt', '#finalizarConsulta')">
        FINALIZAR
      </button>


      <button class="btn buttonsAtEnd" type="button" onclick="cartController.emptyCart();window.location.replace('https://silverseacontainers.com/');">
      <!-- <button class="btn buttonsAtEnd" type="button" onclick="altClassFromSelector('consultaFinalizada', '#cart', 'cart');cartController.emptyCart();"> -->
        REALIZAR OTRA CONSULTA
      </button>
      <button class="btn buttonsAtEnd" type="button" onclick="altClassFromSelector('alt', '#cart')">
        CERRAR
      </button>

    </div>

  </div>

  <div class="finalizarConsulta" id="finalizarConsulta">
<!-- https://silverseacontainers.com/en/?utm_source=test_source&utm_medium=test_medium&utm_campaign=test_campaign&utm_content=test_content&utm_term=test_term -->
    <input class="utm_source"   type="hidden">
    <input class="utm_medium"   type="hidden">
    <input class="utm_campaign" type="hidden">
    <input class="utm_content"  type="hidden">
    <input class="utm_term"     type="hidden">

    <p class="closeCross" onclick="altClassFromSelector('alt', '#finalizarConsulta'),altClassFromSelector('alt', '#cart')">&#10006;</p>
    <h4 class="finalizarConsultaTitle txtCenter"><?php echo get_post_meta('150', 'ZC-cotizador-formulario-Titulo', true); ?></h4>
    <p class="finalizarConsultaSubTitle txtCenter"><?php echo get_post_meta('150', 'ZD-cotizador-formulario-texto1', true); ?><br><?php echo get_post_meta('150', 'ZE-cotizador-formulario-texto2', true); ?></p>
    <!-- <p class="finalizarConsultaSubTitle txtCenter"><?php // echo get_post_meta('150', 'ZE-cotizador-formulario-texto2', true); ?></p> -->
    <?php require_once 'coprAlqui.php'; ?>


    <div class="mateput">
      <input class="mateputInput" id="mateputNombre" type="text" name="nombre" autocomplete="off" required>
      <label for="mateputNombre" class="mateputLabel">
        <span class="mateputName">*Nombre</span>
      </label>
    </div>

    <div class="mateput">
      <input class="mateputInput" id="mateputTelefono" type="tel" name="telefono" autocomplete="off" required>
      <label for="mateputTelefono" class="mateputLabel">
        <span class="mateputName">*Telefono</span>
      </label>
    </div>

    <div class="mateput">
      <input class="mateputInput" id="mateputEmail" type="email" name="email" autocomplete="off" required>
      <label for="mateputEmail" class="mateputLabel">
        <span class="mateputName">*Email</span>
      </label>
    </div>

    <div class="finalizarConsultaCheckboxes">
      <input id="inmediata" type="checkbox">
      <label for="inmediata" class="termsDescription"><?php echo get_post_meta('150', 'ZF-cotizador-formulario-checkbox2', true); ?></label>
    </div>
    <div class="finalizarConsultaCheckboxes">
      <input id="trasporte" type="checkbox">
      <label for="trasporte" class="termsDescription"><?php echo get_post_meta('150', 'ZG-cotizador-formulario-checkbox3', true); ?></label>
    </div>
    <div class="finalizarConsultaCheckboxes">
      <input id="privacidad" type="checkbox">
      <label for="privacidad" class="termsDescription">*Acepto la <a href="https://silverseacontainers.com/privacy-policy/" target="_blank" style="text-decoration: underline;">Política de privacidad</a> de Silversea</label>
    </div>

    <button
      class="btn unPasoMasButton"
      id="buttonFinishCart"
      onclick="cartController.finalButtonSwitch()"
    >Solicitar cotización</button>

  </div>
