  <template id="selectBoxOptionTemplate">
    <label for="" class="selectBoxOption" data-test="red">
      <input class="selectBoxInput" id="" type="" name="" value="">
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
