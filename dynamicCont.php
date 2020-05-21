<div class="dynamicCont" id="dynamicCont1">

  <!-- <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"> -->
  <svg class="dynamicContLogo" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
    <use xlink:href="#test" id="dynamicContLogo"></use>
  </svg>
  <?php
  // include 'img/svg/allIcons.php';
  ?>

    <!-- <object id="E" type="image/svg+xml" data="test.svg" width="320" height="240">
     <param name="src" value="test.svg">
    </object> -->

  <!-- <div class="dynamicContSelector"> -->
    <?php selectBox('Size'); ?>
    <?php selectBox('Tipo_1'); ?>
    <?php selectBox('Tipo_2'); ?>
    <?php selectBox('Condicion'); ?>
  <!-- </div> -->




  <div class="addToCartQntContainer">
    <input class="addToCartQnt" id="addToCartQantity" type="number" value="1" min="1">
    <div class="addToCartQntBtn" onclick="changeQuantity(-1)">-</div>
    <div class="addToCartQntBtn" onclick="changeQuantity(+1)">+</div>
  </div>

  <button class="btn" onclick="console.log(cartController.currentSemiSelection)" disabled>AGREGAR</button>
</div>
