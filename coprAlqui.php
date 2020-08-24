
<div class="coprAlqui">
  <?php
  $ress = $wpdb->get_results("SELECT distinct country FROM locations");
  $countries=array();
  foreach ($ress as $key => $value) {
    $name = $value->country;
    $slug = sanitize_title($name);
    $countries[$slug] = $name;
  }
  
  $ress = $wpdb->get_results("SELECT distinct city FROM locations");
  $cities=array();
  foreach ($ress as $key => $value) {
    $name = $value->city;
    $slug = sanitize_title($name);
    $cities[$slug] = $name;
  }
  ?>


  <div class="coprAlquiLocation" id="origen">
    <h4 class="coprAlquiLocationTitle">*Origen del Pedido</h4>

    <?php selectBox('Country', 'OrigenCountry', $countries); ?>
    <?php selectBox('City', 'OrigenCity', $cities); ?>
  </div>


  <div class="coprAlquiLocation Accordion" id="destino">
    <h4 class="coprAlquiLocationTitle">*Destino</h4>

    <?php selectBox('Country', 'DestinoCountry', $countries); ?>
    <?php selectBox('City', 'DestinoCity', $cities); ?>
  </div>
</div>
