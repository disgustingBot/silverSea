
<div class="coprAlqui">
  <!-- <div class="sladRadio">
    <input class="sladRadioInput" onchange="accordionSelector('#destino')" type="radio" id="euro" name="a10" value="euro" checked>
    <label class="sladRadioLabel" for="euro">COMPRAR</label>
    <input class="sladRadioInput" onchange="accordionSelector('#destino')" type="radio" id="dollar" name="a10" value="dollar">
    <div class="sladRadioSignal"></div>
    <label class="sladRadioLabel" for="dollar">ALQUILAR</label><br>
  </div> -->

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
    <h4 class="coprAlquiLocationTitle">Origen</h4>

    <?php selectBox('Country', 'OrigenCountry', $countries); ?>
    <?php selectBox('City', 'OrigenCity', $cities); ?>
  </div>


  <div class="coprAlquiLocation Accordion" id="destino">
    <h4 class="coprAlquiLocationTitle">Destino</h4>

    <?php selectBox('Country', 'DestinoCountry', $countries); ?>
    <?php selectBox('City', 'DestinoCity', $cities); ?>
  </div>
</div>
