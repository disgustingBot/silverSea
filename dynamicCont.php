<div class="dynamicCont" id="dynamicCont1">

  <?php selectBox('Size'); ?>
  <?php selectBox('Tipo_1'); ?>
  <?php selectBox('Tipo_2'); ?>
  <?php selectBox('Condicion'); ?>

  <div class="cuantos">
    <input class="cuantosQnt" id="addToCartQantity" type="text" value="1" onchange="console.log('HOLA MUNDO')">
    <div class="cuantosBtn" onclick="cartController.changeQuantity(-1)">-</div>
    <div class="cuantosBtn" onclick="cartController.changeQuantity(+1)">+</div>
  </div>

  <button class="btn" onclick="cartController.add(cartController.currentSemiSelection)" disabled>AGREGAR</button>
</div>
