<div class="dynamicCont" id="dynamicCont1">
  <?php
  global $wpdb;
  // Get sizes
  $ress = $wpdb->get_results("SELECT distinct size FROM contenedores");
  $sizes=array();
  foreach ($ress as $key => $value) {
    $slug = $value->size . '-pies';
    $name = $value->size . ' Pies';
    $sizes[$slug] = $name;
  }
  // Get tipo_1's
  $ress = $wpdb->get_results("SELECT distinct tipo_1, tipo_1_description FROM contenedores");
  $tipos_1=array();
  foreach ($ress as $key => $value) {
    $slug = $value->tipo_1;
    $name = $value->tipo_1_description;
    $tipos_1[$slug] = $name;
  }
  // Get tipo_2's
  $ress = $wpdb->get_results("SELECT distinct tipo_2, tipo_2_description FROM contenedores");
  $tipos_2=array();
  foreach ($ress as $key => $value) {
    $slug = $value->tipo_2;
    $name = $value->tipo_2_description;
    $tipos_2[$slug] = $name;
  }
  // Get condicions
  $ress = $wpdb->get_results("SELECT distinct condicion, condicion_description FROM contenedores");
  $condiciones=array();
  foreach ($ress as $key => $value) {
    $slug = $value->condicion;
    $name = $value->condicion_description;
    $condiciones[$slug] = $name;
  }
  ?>
  <?php selectBox('Tamaño', 'Size', $sizes); ?>
  <?php selectBox('Tipo', 'Tipo_1', $tipos_1); ?>
  <?php selectBox('Modelo', 'Tipo_2', $tipos_2); ?>
  <?php selectBox('Condicion', 'Condicion', $condiciones); ?>

  <?php // selectBox('Tamaño', 'Size'); ?>
  <?php // selectBox('Tipo', 'Tipo_1'); ?>
  <?php // selectBox('Modelo', 'Tipo_2'); ?>
  <?php // selectBox('Condicion', 'Condicion'); ?>




  <div class="cuantos Cuantos">
    <input class="cuantosQnt cuantosQantity" id="addToCartQantity" type="text" value="1">
    <div class="cuantosBtn cuantosMins">-</div>
    <div class="cuantosBtn cuantosPlus">+</div>
  </div>

  <button class="btn" onclick="productSelector.addToCart(productSelector.currentSearch[0])" disabled>AGREGAR</button>
  <!-- <button class="btn" onclick="cartController.add(cartController.currentSemiSelection)" disabled>AGREGAR</button> -->
</div>
