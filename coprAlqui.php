
<div class="coprAlqui">
  <h3 class="cotizadorTitle">COTIZA TU <span class="brandColorTxt">CONTENEDOR</span></h3>
  <h5 class="cotizadorTxt">Cotiza tu contenedor online y recibe el precio en instantes</h5>
  <div class="sladRadio">
    <input class="sladRadioInput" onchange="accordionSelector('#destino')" type="radio" id="euro" name="a10" value="euro" checked>
    <label class="sladRadioLabel" for="euro">COMPRAR</label>
    <input class="sladRadioInput" onchange="accordionSelector('#destino')" type="radio" id="dollar" name="a10" value="dollar">
    <div class="sladRadioSignal"></div>
    <label class="sladRadioLabel" for="dollar">ALQUILAR</label><br>
  </div>

    <div class="coprAlquiLocation">
      <h4 class="coprAlquiLocationTitle">Origen</h4>


              <div class="selectBox" tabindex="1" id="selectBoxOrigenCountry">
                <div class="selectBoxButton">
                  <p class="selectBoxPlaceholder">Pais</p>
                  <p class="selectBoxCurrent" id="selectBoxCurrentOrigenCountry"></p>
                </div>
                <div class="selectBoxList">
                  <label for="nulOrigenCountry" class="selectBoxOption">
                    <input
                      class="selectBoxInput"
                      id="nulOrigenCountry"
                      type="radio"
                      data-slug="0"
                      data-parent="city"
                      name="filter_city"
                      onclick="selectBoxControler('','#selectBoxOrigenCountry','#selectBoxCurrentOrigenCountry')"
                      value="0"
                    >
                    <!-- <span class="checkmark"></span> -->
                    <p class="colrOptP"></p>
                  </label>
                  <label for="españa" class="selectBoxOption">
                    <input
                      class="selectBoxInput"
                      id="españa"
                      data-slug="españa"
                      data-parent="city"
                      type="radio"
                      name="filter_city"
                      onclick="selectBoxControler('España', '#selectBoxOrigenCountry', '#selectBoxCurrentOrigenCountry')"
                      value="España"
                    >
                    <!-- <span class="checkmark"></span> -->
                    <p class="colrOptP">España</p>
                  </label>
                  <label for="francia" class="selectBoxOption">
                    <input
                      class="selectBoxInput"
                      id="francia"
                      data-slug="francia"
                      data-parent="city"
                      type="radio"
                      name="filter_city"
                      onclick="selectBoxControler('Francia', '#selectBoxOrigenCountry', '#selectBoxCurrentOrigenCountry')"
                      value="Francia"
                    >
                    <!-- <span class="checkmark"></span> -->
                    <p class="colrOptP">Francia</p>
                  </label>
                </div>
              </div>


              <div class="selectBox" tabindex="1" id="selectBoxOrigenCity">
                <div class="selectBoxButton">
                  <p class="selectBoxPlaceholder">Ciudad</p>
                  <p class="selectBoxCurrent" id="selectBoxCurrentOrigenCity"></p>
                </div>
                <div class="selectBoxList">
                  <label for="nulOrigenCity" class="selectBoxOption">
                    <input
                      class="selectBoxInput"
                      id="nulOrigenCity"
                      type="radio"
                      data-slug="0"
                      data-parent="city"
                      name="filter_city"
                      onclick="selectBoxControler('','#selectBoxOrigenCity','#selectBoxCurrentOrigenCity')"
                      value="0"
                    >
                    <!-- <span class="checkmark"></span> -->
                    <p class="colrOptP"></p>
                  </label>
                  <label for="barcelona" class="selectBoxOption">
                    <input
                      class="selectBoxInput"
                      id="barcelona"
                      data-slug="barcelona"
                      data-parent="city"
                      type="radio"
                      name="filter_city"
                      onclick="selectBoxControler('Barcelona', '#selectBoxOrigenCity', '#selectBoxCurrentOrigenCity')"
                      value="barcelona"
                    >
                    <!-- <span class="checkmark"></span> -->
                    <p class="colrOptP">Barcelona</p>
                  </label>
                  <label for="buenos-aires" class="selectBoxOption">
                    <input
                      class="selectBoxInput"
                      id="buenos-aires"
                      data-slug="buenos-aires"
                      data-parent="city"
                      type="radio"
                      name="filter_city"
                      onclick="selectBoxControler('Buenos Aires', '#selectBoxOrigenCity', '#selectBoxCurrentOrigenCity')"
                      value="Buenos Aires"
                    >
                    <!-- <span class="checkmark"></span> -->
                    <p class="colrOptP">Buenos Aires</p>
                  </label>
                </div>
              </div>









    </div>
      <div class="coprAlquiLocation Accordion" id="destino">
        <h4 class="coprAlquiLocationTitle">Destino</h4>


                <div class="selectBox" tabindex="1" id="selectBoxOrigenCountry">
                  <div class="selectBoxButton">
                    <p class="selectBoxPlaceholder">Pais</p>
                    <p class="selectBoxCurrent" id="selectBoxCurrentOrigenCountry"></p>
                  </div>
                  <div class="selectBoxList">
                    <label for="nulOrigenCountry" class="selectBoxOption">
                      <input
                        class="selectBoxInput"
                        id="nulOrigenCountry"
                        type="radio"
                        data-slug="0"
                        data-parent="city"
                        name="filter_city"
                        onclick="selectBoxControler('','#selectBoxOrigenCountry','#selectBoxCurrentOrigenCountry')"
                        value="0"
                      >
                      <!-- <span class="checkmark"></span> -->
                      <p class="colrOptP"></p>
                    </label>
                    <label for="barcelona" class="selectBoxOption">
                      <input
                        class="selectBoxInput"
                        id="barcelona"
                        data-slug="barcelona"
                        data-parent="city"
                        type="radio"
                        name="filter_city"
                        onclick="selectBoxControler('Barcelona', '#selectBoxOrigenCountry', '#selectBoxCurrentOrigenCountry')"
                        value="barcelona"
                      >
                      <!-- <span class="checkmark"></span> -->
                      <p class="colrOptP">España</p>
                    </label>
                  </div>
                </div>


                <div class="selectBox" tabindex="1" id="selectBoxOrigenCity">
                  <div class="selectBoxButton">
                    <p class="selectBoxPlaceholder">Ciudad</p>
                    <p class="selectBoxCurrent" id="selectBoxCurrentOrigenCity"></p>
                  </div>
                  <div class="selectBoxList">
                    <label for="nulOrigenCity" class="selectBoxOption">
                      <input
                        class="selectBoxInput"
                        id="nulOrigenCity"
                        type="radio"
                        data-slug="0"
                        data-parent="city"
                        name="filter_city"
                        onclick="selectBoxControler('','#selectBoxOrigenCity','#selectBoxCurrentOrigenCity')"
                        value="0"
                      >
                      <!-- <span class="checkmark"></span> -->
                      <p class="colrOptP"></p>
                    </label>
                    <label for="barcelona" class="selectBoxOption">
                      <input
                        class="selectBoxInput"
                        id="barcelona"
                        data-slug="barcelona"
                        data-parent="city"
                        type="radio"
                        name="filter_city"
                        onclick="selectBoxControler('Barcelona', '#selectBoxOrigenCity', '#selectBoxCurrentOrigenCity')"
                        value="barcelona"
                      >
                      <!-- <span class="checkmark"></span> -->
                      <p class="colrOptP">Barcelona</p>
                    </label>
                  </div>
                </div>









      </div>
</div>
