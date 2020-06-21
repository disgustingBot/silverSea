<div class="dynamicCont" id="dynamicCont1">

  <?php selectBox('Size', 'Size'); ?>
  <?php selectBox('Tipo 1', 'Tipo_1'); ?>
  <?php selectBox('Tipo 2', 'Tipo_2'); ?>
  <?php selectBox('Condicion', 'Condicion'); ?>

  <div class="cuantos">
    <input class="cuantosQnt" id="addToCartQantity" type="text" value="1" onchange="console.log('HOLA MUNDO')">
    <div class="cuantosBtn" onclick="cartController.changeQuantity(-1)">-</div>
    <div class="cuantosBtn" onclick="cartController.changeQuantity(+1)">+</div>
  </div>

  <button class="btn" onclick="cartController.add(cartController.currentSemiSelection)" disabled>AGREGAR</button>
</div>
