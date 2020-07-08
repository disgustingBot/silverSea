
<div class="coprAlqui">
  <!-- <div class="sladRadio">
    <input class="sladRadioInput" onchange="accordionSelector('#destino')" type="radio" id="euro" name="a10" value="euro" checked>
    <label class="sladRadioLabel" for="euro">COMPRAR</label>
    <input class="sladRadioInput" onchange="accordionSelector('#destino')" type="radio" id="dollar" name="a10" value="dollar">
    <div class="sladRadioSignal"></div>
    <label class="sladRadioLabel" for="dollar">ALQUILAR</label><br>
  </div> -->


  <div class="coprAlquiLocation" id="origen">
    <h4 class="coprAlquiLocationTitle">Origen del Pedido</h4>

    <?php selectBox('OrigenCountry', 'OrigenCountry'); ?>
    <?php selectBox('OrigenCity', 'OrigenCity'); ?>
  </div>


  <!-- <div class="coprAlquiLocation Accordion" id="destino">
    <h4 class="coprAlquiLocationTitle">Destino</h4>

    <?php // selectBox('DestinoCountry'); ?>
    <?php // selectBox('DestinoCity'); ?>
  </div> -->
</div>
