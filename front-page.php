<?php get_header(); ?>















<section class="ATF frontPageATF sectionWhite">
  <video loop autoplay muted class="frontPageATFBg rowcol1" src="<?php echo get_post_meta($post->ID, 'A-video-portada', true); ?>" alt="">
  </video>


  <div class="cotizador" id="cotizador">
    <h3 class="cotizadorTitle">COTIZA TU<span class="brandColorTxt"> CONTENEDOR</span></h3>

    <div class="currentSemiSelection" id="currentSemiSelection">
      <svg class="currentSemiSelectionSvg" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35">
        <use xlink:href="" id="currentSemiSelectionSize"></use>
      </svg>
      <svg class="currentSemiSelectionSvg" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35">
        <use xlink:href="" id="currentSemiSelectionTip1"></use>
      </svg>
      <svg class="currentSemiSelectionSvg" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35">
        <use xlink:href="" id="currentSemiSelectionTip2"></use>
      </svg>
      <svg class="currentSemiSelectionSvg" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35">
        <use xlink:href="" id="currentSemiSelectionCond"></use>
      </svg>
    </div>


          <div class="cartButton" onclick="altClassFromSelector('alt', '#cart')">
            <svg class="cartButtonSvg" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35">
              <use xlink:href="#simpleTruck" class="cartButtonUse"></use>
            </svg>
          </div>

    <p class="cotizadorTxt">Tras completar el proceso de cotización, recibiás una cotización rápida inmediata</p>
    <div class="dynamicContList" id="dynamicContList">
      <?php include get_template_directory().'/dynamicCont.php' ?>
    </div>
    <div class="contizacionAvanzada">
      <p class="avanzadaTxt">¿Necesitas una cotización mas detallada?</p>
      <a href="#" class="btnSimple">Ir a Cotización avanzada</a>
    </div>

    <button class="btn" type="button" onclick="altClassFromSelector('alt', '#finalizarConsulta')">
    <!-- <button class="btn" type="button" onclick="cartController.newLead"> -->
      Finalizar
    </button>
  </div>



  <div class="features">

    <figure class="feature sectionWhite">
      <svg class="featureIcon"  width="83" height="111" viewBox="0 0 83 111" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M79.8178 21.1423L61.718 3.04253C59.7759 1.10049 57.1434 0 54.4051 0H10.3554C4.63931 0.0215782 0 4.66089 0 10.377V100.125C0 105.841 4.63931 110.48 10.3554 110.48H72.5049C78.221 110.48 82.8603 105.841 82.8603 100.125V28.4767C82.8603 25.7385 81.7598 23.0844 79.8178 21.1423ZM55.2467 7.03233C55.8508 7.18338 56.3903 7.48548 56.8434 7.93862L74.9432 26.0384C75.3964 26.4916 75.6985 27.031 75.8495 27.6352H55.2467V7.03233ZM75.9574 100.125C75.9574 102.024 74.4038 103.578 72.5049 103.578H10.3554C8.4565 103.578 6.90287 102.024 6.90287 100.125V10.377C6.90287 8.47807 8.4565 6.90502 10.3554 6.90502H48.3416V29.3615C48.3416 32.2314 50.6505 34.5251 53.5204 34.5251H75.9574V100.125Z" fill="black"/>
      <path d="M39.7268 20.8308H15.5593C14.6055 20.8308 13.833 20.0583 13.833 19.1045V15.652C13.833 14.6983 14.6055 13.9258 15.5593 13.9258H39.7268C40.6806 13.9258 41.4531 14.6983 41.4531 15.652V19.1045C41.4531 20.0583 40.6806 20.8308 39.7268 20.8308Z" fill="#0674BB"/>
      <path d="M41.4531 29.4621V32.9146C41.4531 33.8684 40.6806 34.6409 39.7268 34.6409H15.5593C14.6055 34.6409 13.833 33.8684 13.833 32.9146V29.4621C13.833 28.5083 14.6055 27.7358 15.5593 27.7358H39.7268C40.6806 27.7358 41.4531 28.5083 41.4531 29.4621Z" fill="#0674BB"/>
      <path d="M37.5699 67.7732L47.2801 70.6863C51.2936 71.8904 54.0945 75.7399 54.0945 80.0491C54.0945 85.3422 49.9838 89.6384 44.8871 89.7744V94.979C44.8871 95.9328 44.1146 96.7053 43.1608 96.7053H39.7083C38.7545 96.7053 37.982 95.9328 37.982 94.979V89.7377C35.5459 89.6125 33.1766 88.7623 31.213 87.2886C30.3714 86.6563 30.3282 85.3961 31.09 84.669L33.6254 82.2501C34.2231 81.6804 35.1121 81.6545 35.8113 82.0925C36.6442 82.6169 37.5936 82.8952 38.5776 82.8952H44.6432C46.0458 82.8952 47.1894 81.6178 47.1894 80.0491C47.1894 78.7652 46.4105 77.6366 45.297 77.3022L35.5869 74.3891C31.5733 73.185 28.7725 69.3355 28.7725 65.0263C28.7725 59.7354 32.8831 55.437 37.9799 55.301V50.0964C37.9799 49.1426 38.7524 48.3701 39.7061 48.3701H43.1586C44.1124 48.3701 44.8849 49.1426 44.8849 50.0964V55.3377C47.3211 55.4629 49.6904 56.3131 51.654 57.7868C52.4955 58.4191 52.5387 59.6793 51.777 60.4064L49.2415 62.8253C48.6438 63.395 47.7548 63.4209 47.0557 62.9829C46.2227 62.4585 45.2733 62.1802 44.2893 62.1802H38.2237C36.8211 62.1802 35.6775 63.4576 35.6775 65.0263C35.6775 66.3102 36.4565 67.4388 37.5699 67.7732Z" fill="#ECC800"/>
      </svg>
      <figcaption class="featureTxt">
        <h3 class="featureTitle brandColorTxt"><?php echo get_post_meta($post->ID, 'B-titulo-beneficio-1', true); ?></h3>
        <p class="featureP"><?php echo get_post_meta($post->ID, 'C-texto-beneficio-1', true); ?></p>
      </figcaption>
    </figure>

    <figure class="feature sectionWhite">
      <svg class="featureIcon" width="118" height="110" viewBox="0 0 118 110" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M63.914 42.5215H9.09583C8.09083 42.5215 7.26855 43.3438 7.26855 44.3488V69.9306C7.26855 70.9356 8.09083 71.7579 9.09583 71.7579H63.914C64.919 71.7579 65.7413 70.9356 65.7413 69.9306V44.3488C65.7413 43.3438 64.919 42.5215 63.914 42.5215ZM62.0868 68.1033H10.9231V46.176H62.0868V68.1033Z" fill="#0674BB"/>
        <path d="M20.0588 49.8301H16.4043V64.4483H20.0588V49.8301Z" fill="#0674BB"/>
        <path d="M29.1965 49.8301H25.542V64.4483H29.1965V49.8301Z" fill="#0674BB"/>
        <path d="M38.3333 49.8301H34.6787V64.4483H38.3333V49.8301Z" fill="#0674BB"/>
        <path d="M47.469 49.8301H43.8145V64.4483H47.469V49.8301Z" fill="#0674BB"/>
        <path d="M56.6057 49.8301H52.9512V64.4483H56.6057V49.8301Z" fill="#0674BB"/>
        <path d="M56.6455 80.4404H1.82727C0.822273 80.4404 0 81.2627 0 82.2677V107.85C0 108.855 0.822273 109.677 1.82727 109.677H56.6455C57.6505 109.677 58.4728 108.855 58.4728 107.85V82.2677C58.4728 81.2627 57.6505 80.4404 56.6455 80.4404ZM54.8182 106.022H3.65455V84.095H54.8182V106.022Z" fill="#ECC800"/>
        <path d="M12.7913 87.75H9.13672V102.368H12.7913V87.75Z" fill="#ECC800"/>
        <path d="M21.927 87.75H18.2725V102.368H21.927V87.75Z" fill="#ECC800"/>
        <path d="M31.0637 87.75H27.4092V102.368H31.0637V87.75Z" fill="#ECC800"/>
        <path d="M40.1995 87.75H36.5449V102.368H40.1995V87.75Z" fill="#ECC800"/>
        <path d="M49.3362 87.75H45.6816V102.368H49.3362V87.75Z" fill="#ECC800"/>
        <path d="M115.446 47.5091H108.137V16.8566C112.157 13.8416 112.979 8.13137 109.964 4.11137C106.949 0.0913636 101.239 -0.730909 97.219 2.28409C95.0948 3.88296 93.77 6.30409 93.5873 8.95364L44.1823 3.83727V1.82727C44.1823 0.822273 43.3601 0 42.3551 0H31.3914C30.3864 0 29.5641 0.822273 29.5641 1.82727V10.9636C29.5641 11.9686 30.3864 12.7909 31.3914 12.7909H35.0459V18.2727C35.0459 19.2777 35.8682 20.1 36.8732 20.1H37.7869C40.2994 20.1 42.3551 22.1557 42.3551 24.6682C42.3551 27.1807 40.2994 29.2364 37.7869 29.2364C35.2744 29.2364 33.2187 27.1807 33.2187 24.6682H29.5641C29.5641 27.1807 30.729 29.5562 32.7162 31.0865L10.8574 42.0273C10.8571 42.0273 61.0846 42.0273 61.0846 42.0273L41.9439 31.726C45.8497 29.4419 47.1745 24.4169 44.8904 20.5111C43.5885 18.2727 41.2815 16.7881 38.7005 16.4911V12.7909H42.3551C43.3601 12.7909 44.1823 11.9686 44.1823 10.9636V7.51466L94.0898 12.6767C94.6836 14.3441 95.7572 15.7831 97.1733 16.8566V47.5091H80.7278C79.7228 47.5091 78.9006 48.3314 78.9006 49.3364V74.9182H75.246C74.241 74.9182 73.4187 75.7405 73.4187 76.7455V107.809C73.4187 108.814 74.241 109.636 75.246 109.636H115.446C116.451 109.636 117.273 108.814 117.273 107.809V49.3364C117.273 48.3314 116.451 47.5091 115.446 47.5091ZM53.3872 42.0273H19.0345L36.8504 33.1193L53.3872 42.0273ZM40.5278 9.13637H33.2187V3.65455H40.5278V9.13637ZM102.655 4.11137C105.693 4.11137 108.137 6.55534 108.137 9.59319C108.137 12.631 105.693 15.075 102.655 15.075C99.6173 15.075 97.1733 12.631 97.1733 9.59319C97.1733 6.57819 99.6401 4.11137 102.655 4.11137ZM106.31 58.724L112.385 63.7947L106.31 67.8604V58.724ZM112.385 80.2402L106.31 84.3058V75.1695L112.385 80.2402ZM112.385 96.6856L106.31 100.751V91.6149L112.385 96.6856ZM102.655 105.982H77.0733V78.5728H102.655V105.982ZM102.655 74.9182H82.5551V51.1637H102.655V74.9182ZM104.482 47.5091H100.828V18.5468C102.038 18.7981 103.272 18.7981 104.482 18.5468V47.5091ZM113.619 105.982H106.31V105.137L113.619 100.272V105.982ZM113.619 92.9397L107.543 87.869L113.619 83.8033V92.9397ZM113.619 76.4942L107.543 71.4236L113.619 67.3579V76.4942ZM113.619 60.0488L106.31 53.9502V51.1637H113.619V60.0488Z" fill="black"/>
      </svg>
      <figcaption class="featureTxt">
        <h3 class="featureTitle brandColorTxt"><?php echo get_post_meta($post->ID, 'D-titulo-beneficio-2', true); ?></h3>
        <p class="featureP"><?php echo get_post_meta($post->ID, 'E-texto-beneficio-2', true); ?></p>
      </figcaption>
    </figure>

    <figure class="feature sectionWhite">
      <svg class="featureIcon" width="138" height="110" viewBox="0 0 138 110" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M51.5481 46.4339V45.0787C51.5481 44.3334 50.6944 43.7236 49.651 43.7236H1.89715C0.853718 43.7236 0 44.3334 0 45.0787L0 46.4339C0 47.1792 0.853718 47.789 1.89715 47.789L1.89715 77.6014C0.853718 77.6014 0 78.2112 0 78.9565L0 80.3116C0 81.0569 0.853718 81.6667 1.89715 81.6667H49.651C50.6944 81.6667 51.5481 81.0569 51.5481 80.3116V78.9565C51.5481 78.2112 50.6944 77.6014 49.651 77.6014V47.789C50.6944 47.789 51.5481 47.1792 51.5481 46.4339ZM43.9595 77.6014H7.58861L7.58861 47.789H43.9595V77.6014Z" fill="#0674BB"/>
        <path d="M27.7058 73.6065H23.9115C23.3897 73.6065 22.9629 73.3016 22.9629 72.929V52.6024C22.9629 52.2297 23.3897 51.9248 23.9115 51.9248H27.7058C28.2275 51.9248 28.6543 52.2297 28.6543 52.6024V72.929C28.6543 73.3016 28.2275 73.6065 27.7058 73.6065Z" fill="#0674BB"/>
        <path d="M38.9685 73.6065H35.1742C34.6524 73.6065 34.2256 73.3016 34.2256 72.929V52.6024C34.2256 52.2297 34.6524 51.9248 35.1742 51.9248H38.9685C39.4902 51.9248 39.917 52.2297 39.917 52.6024V72.929C39.917 73.3016 39.4902 73.6065 38.9685 73.6065Z" fill="#0674BB"/>
        <path d="M16.4431 73.6065H12.6488C12.1271 73.6065 11.7002 73.3016 11.7002 72.929L11.7002 52.6024C11.7002 52.2297 12.1271 51.9248 12.6488 51.9248H16.4431C16.9648 51.9248 17.3917 52.2297 17.3917 52.6024V72.929C17.3917 73.3016 16.9648 73.6065 16.4431 73.6065Z" fill="#0674BB"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M100.387 59.4774H100.388V59.4442V43.0765C100.389 43.0122 100.389 42.9477 100.389 42.8831C100.389 42.8185 100.389 42.754 100.388 42.6896V42.5822H100.385C100.197 36.3224 94.1496 31.2969 86.7176 31.2969C79.2856 31.2969 73.2386 36.3224 73.0503 42.5822H73.0439V59.4442V59.4774H73.044C73.0651 65.861 79.1781 71.0304 86.7157 71.0304C94.2534 71.0304 100.366 65.861 100.387 59.4774Z" fill="#ECC800"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M73.0458 38.9873C73.0458 34.7383 79.1698 31.2969 86.7176 31.2969C94.2654 31.2969 100.389 34.7383 100.389 38.9873V44.9687C100.389 45.1123 100.381 45.2549 100.363 45.3963H100.388V51.3777C100.388 51.521 100.379 51.6632 100.361 51.8043H100.388V57.7857C100.388 57.9291 100.379 58.0715 100.361 58.2128H100.388V64.1942C100.388 67.971 94.2635 71.0301 86.7157 71.0301C79.1679 71.0301 73.0439 67.971 73.0439 64.1942V58.2128H73.0702C73.0528 58.0715 73.0439 57.9291 73.0439 57.7857V51.8043H73.0701C73.0528 51.6632 73.0439 51.521 73.0439 51.3777V45.3963H73.0721C73.0547 45.2549 73.0458 45.1123 73.0458 44.9687V38.9873ZM75.6093 44.9687C75.6093 45.6736 76.3794 46.526 77.7455 47.2849V44.7807C76.9894 44.4156 76.2734 43.9726 75.6093 43.4589V44.9687ZM79.4545 48.0624C80.5636 48.4604 81.7081 48.7522 82.8724 48.934V46.3636C81.7097 46.1752 80.5659 45.8843 79.4545 45.4942V48.0624ZM86.7176 49.2427C87.4599 49.2427 88.1697 49.2064 88.8538 49.1476V46.5746C88.1558 46.6365 87.4461 46.6776 86.7176 46.6776C85.9892 46.6776 85.2794 46.6365 84.5814 46.5746V49.1476C85.2655 49.2064 85.9753 49.2427 86.7176 49.2427ZM90.5628 48.9356C91.7271 48.7538 92.8716 48.462 93.9807 48.064V45.4942C92.8693 45.8843 91.7255 46.1752 90.5628 46.3636V48.9356ZM95.6897 47.2849C97.0558 46.526 97.8259 45.6736 97.8259 44.9687V43.4589C97.1618 43.9726 96.4458 44.4156 95.6897 44.7807V47.2849ZM75.6093 38.9873C75.6093 41.4076 80.3624 44.1142 86.7176 44.1142C93.0755 44.1142 97.8259 41.4076 97.8259 38.9873C97.8259 36.5669 93.0728 33.8603 86.7176 33.8603C80.3624 33.8603 75.6093 36.5669 75.6093 38.9873ZM75.6936 51.8043C75.9298 52.4109 76.6434 53.0827 77.7436 53.6939V51.8043V51.1897C76.9875 50.8246 76.2716 50.3816 75.6074 49.8679V51.3777C75.6074 51.5149 75.6366 51.6577 75.6936 51.8043ZM79.4526 54.4715C80.5618 54.8695 81.7062 55.1613 82.8705 55.3431V52.7727C81.7078 52.5843 80.564 52.2933 79.4526 51.9032V54.4715ZM86.7157 55.6517C87.4581 55.6517 88.1678 55.6154 88.852 55.5567V52.9836C88.1539 53.0456 87.4442 53.0867 86.7157 53.0867C85.9873 53.0867 85.2775 53.0456 84.5795 52.9836V55.5567C85.2636 55.6154 85.9734 55.6517 86.7157 55.6517ZM90.5609 55.3447C91.7252 55.1629 92.8697 54.8711 93.9789 54.4731V51.9032C92.8674 52.2933 91.7237 52.5843 90.5609 52.7727V55.3447ZM97.7378 51.8043C97.7949 51.6577 97.8241 51.5149 97.8241 51.3777V49.8679C97.1599 50.3816 96.444 50.8246 95.6878 51.1897V51.8043V53.6939C96.7881 53.0827 97.5017 52.4109 97.7378 51.8043ZM75.6074 57.7857C75.6074 57.9231 75.6366 58.066 75.6938 58.2128C75.9301 58.8193 76.6437 59.4909 77.7436 60.1019V58.2128V57.5977C76.9875 57.2326 76.2716 56.7896 75.6074 56.2759V57.7857ZM79.4526 60.8795C80.5618 61.2775 81.7062 61.5693 82.8705 61.7511V59.1807C81.7078 58.9923 80.564 58.7013 79.4526 58.3112V60.8795ZM86.7157 62.0598C87.4581 62.0598 88.1678 62.0234 88.852 61.9647V59.3916C88.1539 59.4536 87.4442 59.4947 86.7157 59.4947C85.9873 59.4947 85.2775 59.4536 84.5795 59.3916V61.9647C85.2636 62.0234 85.9734 62.0598 86.7157 62.0598ZM90.5609 61.7527C91.7252 61.5709 92.8697 61.2791 93.9789 60.8811V58.3112C92.8674 58.7013 91.7237 58.9923 90.5609 59.1807V61.7527ZM95.6878 60.1019C96.7878 59.4909 97.5014 58.8193 97.7376 58.2128C97.7948 58.066 97.8241 57.9231 97.8241 57.7857V56.2759C97.1599 56.7896 96.444 57.2326 95.6878 57.5977V58.2128V60.1019ZM77.7436 66.5104C76.3775 65.7515 75.6074 64.8991 75.6074 64.1942V62.6844C76.2716 63.1981 76.9875 63.6411 77.7436 64.0062V66.5104ZM82.8705 68.1595C81.7062 67.9778 80.5618 67.6859 79.4526 67.288V64.7197C80.564 65.1098 81.7078 65.4007 82.8705 65.5891V68.1595ZM88.852 68.3731C88.1678 68.4319 87.4581 68.4682 86.7157 68.4682C85.9734 68.4682 85.2636 68.4319 84.5795 68.3731V65.8001C85.2775 65.862 85.9873 65.9032 86.7157 65.9032C87.4442 65.9032 88.1539 65.862 88.852 65.8001V68.3731ZM93.9789 67.2896C92.8697 67.6875 91.7252 67.9794 90.5609 68.1611V65.5891C91.7237 65.4007 92.8674 65.1098 93.9789 64.7197V67.2896ZM97.8241 64.1942C97.8241 64.8991 97.054 65.7515 95.6878 66.5104V64.0062C96.444 63.6411 97.1599 63.1981 97.8241 62.6844V64.1942Z" fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M86.7156 69.5113H86.7156V69.4845V55.6491C86.7158 55.6309 86.7159 55.6126 86.7159 55.5944C86.7159 55.5762 86.7158 55.558 86.7156 55.5397V55.3411H86.7113C86.5223 50.0914 80.4757 45.877 73.0441 45.877C65.6125 45.877 59.5658 50.0914 59.3768 55.3411H59.3721V69.4845V69.5113H59.3721C59.3925 74.8657 65.5057 79.2019 73.0439 79.2019C80.582 79.2019 86.6953 74.8657 86.7156 69.5113Z" fill="#ECC800"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M59.3723 53.5673C59.3723 49.3184 65.4963 45.877 73.0441 45.877C80.5919 45.877 86.7159 49.3184 86.7159 53.5673V59.5487C86.7159 59.6924 86.707 59.835 86.6895 59.9765H86.7156V65.9579C86.7156 66.101 86.7069 66.2431 86.6895 66.384H86.7156V72.3654C86.7156 76.1423 80.5916 79.2013 73.0439 79.2013C65.4961 79.2013 59.3721 76.1423 59.3721 72.3654V66.384H59.3982C59.3809 66.2431 59.3721 66.101 59.3721 65.9579V59.9765H59.3986C59.3811 59.835 59.3723 59.6924 59.3723 59.5487V53.5673ZM61.9357 59.5487C61.9357 60.2537 62.7058 61.106 64.072 61.8649V59.3608C63.3159 58.9957 62.5999 58.5527 61.9357 58.039V59.5487ZM65.7809 62.6425C66.8901 63.0405 68.0346 63.3323 69.1989 63.5141V60.9437C68.0361 60.7553 66.8924 60.4644 65.7809 60.0743V62.6425ZM73.0441 63.8228C73.7864 63.8228 74.4962 63.7865 75.1803 63.7277V61.1546C74.4823 61.2166 73.7725 61.2577 73.0441 61.2577C72.3156 61.2577 71.6059 61.2166 70.9079 61.1546V63.7277C71.592 63.7865 72.3017 63.8228 73.0441 63.8228ZM76.8893 63.5157C78.0536 63.3339 79.198 63.0421 80.3072 62.6441V60.0743C79.1958 60.4644 78.052 60.7553 76.8893 60.9437V63.5157ZM82.0162 61.8649C83.3823 61.106 84.1524 60.2537 84.1524 59.5487V58.039C83.4882 58.5527 82.7723 58.9957 82.0162 59.3608V61.8649ZM61.9357 53.5673C61.9357 55.9877 66.6888 58.6943 73.0441 58.6943C79.402 58.6943 84.1524 55.9877 84.1524 53.5673C84.1524 51.147 79.3993 48.4404 73.0441 48.4404C66.6888 48.4404 61.9357 51.147 61.9357 53.5673ZM64.0717 68.2741C62.9713 67.6627 62.2575 66.9907 62.0216 66.384C61.9646 66.2376 61.9355 66.0949 61.9355 65.9579V64.4481C62.5997 64.9618 63.3156 65.4048 64.0717 65.7699V66.384V68.2741ZM69.1987 69.9232C68.0344 69.7415 66.8899 69.4496 65.7807 69.0516V66.4834C66.8921 66.8735 68.0359 67.1644 69.1987 67.3528V69.9232ZM75.1801 70.1368C74.496 70.1956 73.7862 70.2319 73.0439 70.2319C72.3015 70.2319 71.5918 70.1956 70.9076 70.1368V67.5638C71.6057 67.6257 72.3154 67.6668 73.0439 67.6668C73.7723 67.6668 74.4821 67.6257 75.1801 67.5638V70.1368ZM80.307 69.0533C79.1978 69.4512 78.0534 69.7431 76.889 69.9248V67.3528C78.0518 67.1644 79.1956 66.8735 80.307 66.4834V69.0533ZM84.1522 65.9579C84.1522 66.0949 84.1231 66.2376 84.0661 66.384C83.8302 66.9907 83.1165 67.6627 82.016 68.2741V66.384V65.7699C82.7721 65.4048 83.488 64.9618 84.1522 64.4481V65.9579ZM64.0717 74.6816C62.7056 73.9227 61.9355 73.0704 61.9355 72.3654V70.8557C62.5997 71.3694 63.3156 71.8124 64.0717 72.1774V74.6816ZM69.1987 76.3308C68.0344 76.149 66.8899 75.8572 65.7807 75.4592V72.8909C66.8921 73.281 68.0359 73.572 69.1987 73.7604V76.3308ZM75.1801 76.5444C74.496 76.6031 73.7862 76.6395 73.0439 76.6395C72.3015 76.6395 71.5918 76.6031 70.9076 76.5444V73.9713C71.6057 74.0333 72.3154 74.0744 73.0439 74.0744C73.7723 74.0744 74.4821 74.0333 75.1801 73.9713V76.5444ZM80.307 75.4608C79.1978 75.8588 78.0534 76.1506 76.889 76.3324V73.7604C78.0518 73.572 79.1956 73.281 80.307 72.8909V75.4608ZM84.1522 72.3654C84.1522 73.0704 83.3821 73.9227 82.016 74.6816V72.1774C82.7721 71.8124 83.488 71.3694 84.1522 70.8557V72.3654Z" fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M115.983 66.7813H115.983V66.759V55.572C115.983 55.5614 115.983 55.5508 115.983 55.5401C115.983 55.5295 115.983 55.5188 115.983 55.5082V55.3362H115.979C115.79 51.0957 109.744 47.6914 102.312 47.6914C94.8796 47.6914 88.8327 51.0957 88.6443 55.3362H88.6396V66.759V66.7813H88.6397C88.6606 71.1058 94.7736 74.6078 102.311 74.6078C109.849 74.6078 115.962 71.1058 115.983 66.7813Z" fill="#ECC800"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M88.6398 55.3818C88.6398 51.1329 94.7638 47.6914 102.312 47.6914C109.859 47.6914 115.983 51.1329 115.983 55.3818V61.3632C115.983 61.5066 115.975 61.6489 115.957 61.7901H115.983V67.7715C115.983 71.5483 109.859 74.6074 102.311 74.6074C94.7636 74.6074 88.6396 71.5483 88.6396 67.7715V61.7901H88.666C88.6486 61.6489 88.6398 61.5066 88.6398 61.3632V55.3818ZM91.2896 61.7901C91.5258 62.3966 92.2394 63.0683 93.3394 63.6794V61.7901V61.1752C92.5833 60.8101 91.8674 60.3671 91.2032 59.8534V61.3632C91.2032 61.5005 91.2324 61.6434 91.2896 61.7901ZM95.0484 64.457C96.1576 64.8549 97.302 65.1468 98.4664 65.3285V62.7581C97.3036 62.5698 96.1598 62.2788 95.0484 61.8887V64.457ZM102.312 65.6372C103.054 65.6372 103.764 65.6009 104.448 65.5422V62.9691C103.75 63.031 103.04 63.0722 102.312 63.0722C101.583 63.0722 100.873 63.031 100.175 62.9691V65.5422C100.859 65.6009 101.569 65.6372 102.312 65.6372ZM106.157 65.3301C107.321 65.1484 108.465 64.8565 109.575 64.4586V61.8887C108.463 62.2788 107.319 62.5698 106.157 62.7581V65.3301ZM113.334 61.7901C113.391 61.6434 113.42 61.5005 113.42 61.3632V59.8534C112.756 60.3671 112.04 60.8101 111.284 61.1752V61.7901V63.6794C112.384 63.0683 113.097 62.3966 113.334 61.7901ZM91.2032 55.3818C91.2032 57.8021 95.9563 60.5087 102.312 60.5087C108.669 60.5087 113.42 57.8021 113.42 55.3818C113.42 52.9615 108.667 50.2549 102.312 50.2549C95.9563 50.2549 91.2032 52.9615 91.2032 55.3818ZM91.2031 67.7715C91.2031 68.4764 91.9732 69.3288 93.3393 70.0877V67.5835C92.5832 67.2184 91.8673 66.7754 91.2031 66.2617V67.7715ZM95.0483 70.8652C96.1575 71.2632 97.3019 71.555 98.4662 71.7368V69.1664C97.3035 68.978 96.1597 68.6871 95.0483 68.297V70.8652ZM102.311 72.0455C103.054 72.0455 103.764 72.0092 104.448 71.9504V69.3774C103.75 69.4393 103.04 69.4804 102.311 69.4804C101.583 69.4804 100.873 69.4393 100.175 69.3774V71.9504C100.859 72.0092 101.569 72.0455 102.311 72.0455ZM106.157 71.7384C107.321 71.5566 108.465 71.2648 109.575 70.8668V68.297C108.463 68.6871 107.319 68.978 106.157 69.1664V71.7384ZM111.284 70.0877C112.65 69.3288 113.42 68.4764 113.42 67.7715V66.2617C112.756 66.7754 112.04 67.2184 111.284 67.5835V70.0877Z" fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M130.145 55C130.145 81.5097 108.625 103 82.0793 103C67.8439 103 55.0538 96.82 46.2526 87H37.2803C47.2728 100.926 63.6149 110 82.0793 110C112.497 110 137.155 85.3757 137.155 55C137.155 24.6243 112.497 0 82.0793 0C63.6149 0 47.2728 9.07389 37.2803 23H46.2526C55.0538 13.18 67.8439 7 82.0793 7C108.625 7 130.145 28.4903 130.145 55Z" fill="black"/>
        <path d="M34.0261 36.6189C32.309 36.8133 30.792 35.4996 30.7391 33.7723L30.0757 12.0878C29.997 9.51388 33.0184 8.07726 34.965 9.76306L57.1853 29.0061C59.1319 30.6919 58.1417 33.8876 55.583 34.1774L34.0261 36.6189Z" fill="black"/>
      </svg>
      <figcaption class="featureTxt">
        <h3 class="featureTitle brandColorTxt"><?php echo get_post_meta($post->ID, 'F-titulo-beneficio-3', true); ?></h3>
        <p class="featureP"><?php echo get_post_meta($post->ID, 'G-texto-beneficio-3', true); ?></p>
      </figcaption>
    </figure>

  </div>
</section>

<!--  ----------------------------------------------------------------------  -->
<!--  NOTE: Please add the following <META> element to your page <HEAD>.      -->
<!--  If necessary, please modify the charset parameter to specify the        -->
<!--  character set of your HTML page.                                        -->
<!--  ----------------------------------------------------------------------  -->

<!-- <META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8"> -->

<!--  ----------------------------------------------------------------------  -->
<!--  NOTE: Please add the following <FORM> element to your page.             -->
<!--  ----------------------------------------------------------------------  -->

<!-- <form action="https://go.pardot.com/l/821023/2020-06-02/8qk1" method="POST">

  <input type=hidden name="oid" value="00D1l0000000ia7">
  <input type=hidden name="retURL" value="https://sstc.com.es/"> -->

<!--  ----------------------------------------------------------------------  -->
<!--  NOTE: These fields are optional debugging elements. Please uncomment    -->
<!--  these lines if you wish to test in debug mode.                          -->
   <!-- <input type="hidden" name="debug" value=1>
   <input type="hidden" name="debugEmail"
   value="gportela@silverseacontainers.com"> -->
<!--  ----------------------------------------------------------------------  -->

  <!-- <label for="first_name">First Name</label><input  id="first_name" maxlength="40" name="first_name" size="20" type="text" /><br>

  <label for="last_name">Last Name</label><input  id="last_name" maxlength="80" name="last_name" size="20" type="text" /><br>

  <label for="email">Email</label><input  id="email" maxlength="80" name="email" size="20" type="text" /><br>

  <label for="phone">Phone</label><input  id="phone" maxlength="40" name="phone" size="20" type="text" /><br>

  <label for="company">Company</label><input  id="company" maxlength="40" name="company" size="20" type="text" /><br>

  <label for="country">Country</label><input  id="country" maxlength="40" name="country" size="20" type="text" /><br>

  <label for="city">City</label><input  id="city" maxlength="40" name="city" size="20" type="text" /><br>

  Producto:<select  id="00N0X00000CrHzi" name="00N0X00000CrHzi" title="Producto"><option value="">--None--</option><option value="Cacahuete">Cacahuete</option>
  <option value="Madera Rolo">Madera Rolo</option>
  <option value="Madera Aserrada">Madera Aserrada</option>
  <option value="Maíz Pisingallo">Maíz Pisingallo</option>
  <option value="Semilla de Girasol">Semilla de Girasol</option>
  <option value="Kernel de Girasol">Kernel de Girasol</option>
  <option value="Chia">Chia</option>
  <option value="Quinoa">Quinoa</option>
  <option value="20DV ASIS">20DV ASIS</option>
  <option value="20DV CW">20DV CW</option>
  <option value="20DV NEW">20DV NEW</option>
  <option value="20RF">20RF</option>
  <option value="20NOR">20NOR</option>
  <option value="20OT ASIS">20OT ASIS</option>
  <option value="20FR ASIS">20FR ASIS</option>
  <option value="20OT CW">20OT CW</option>
  <option value="20FR CW">20FR CW</option>
  <option value="40DV ASIS">40DV ASIS</option>
  <option value="40DV CW">40DV CW</option>
  <option value="40DV PW">40DV PW</option>
  <option value="40DV NEW">40DV NEW</option>
  <option value="40HC ASIS">40HC ASIS</option>
  <option value="40HC CW">40HC CW</option>
  <option value="40HC PW">40HC PW</option>
  <option value="40HC NEW">40HC NEW</option>
  <option value="40HRF CW PTI">40HRF CW PTI</option>
  <option value="40HRF CW">40HRF CW</option>
  <option value="40HNOR">40HNOR</option>
  <option value="40NOR ASIS">40NOR ASIS</option>
  <option value="40OT ASIS">40OT ASIS</option>
  <option value="40FR ASIS">40FR ASIS</option>
  <option value="40OT CW">40OT CW</option>
  <option value="40OT REBUILT CW">40OT REBUILT CW</option>
  <option value="40FR CW">40FR CW</option>
  <option value="45 HC CW">45 HC CW</option>
  <option value="45HC ASIS">45HC ASIS</option>
  </select><br>

  ProductType:<input  id="00N0X00000AlPaB" maxlength="30" name="00N0X00000AlPaB" size="20" type="text" /><br>

  ProductSize:<input  id="00N0X00000AlPaA" maxlength="25" name="00N0X00000AlPaA" size="20" type="text" /><br>

  Quantity:<input  id="00N0X00000AlPaC" name="00N0X00000AlPaC" size="20" type="text" /><br>

  Message:<textarea  id="00N0X00000AlPa9" name="00N0X00000AlPa9" rows="3" type="text" wrap="soft"></textarea><br>

  <input type="submit" name="submit">

</form> -->


  <section class="sectionPadding card60" id="queContainerINeed">
  <style>#queContainerINeed.card0 #card0 {display:flex}</style>


  <?php

  $taxonomy     = 'product_cat';
  // $orderby      = 'name';
  $show_count   = 0;      // 1 for yes, 0 for no
  $pad_counts   = 0;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no
  $title        = '';
  $empty        = 0;

  $args = array(
    'taxonomy'     => $taxonomy,
    // 'orderby'      => $orderby,
    'show_count'   => $show_count,
    'pad_counts'   => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li'     => $title,
    'hide_empty'   => $empty
  );




  $categories = get_categories( $args );
  if($categories) {
    foreach($categories as $category) { ?>
      <?php $lt_meta_desc = get_term_meta($category->term_id, 'lt_meta_desc', true); ?>
      <?php if ($lt_meta_desc == 'on'){ ?>
        <style>#queContainerINeed.card<?php echo $category->term_id .' #card'. $category->term_id; ?>{display:flex}</style>
        <article class="article2 containerNeeded " id="card<?php echo $category->term_id; ?>">
          <div class="sectionSummary Obse" data-observe="#sectioNSummaryCardActivator" data-unobserve="false">
            <div class="summaryTitleContainer">
              <h2 class="summaryTitle"><?php echo  $category->name; ?></h2>
              <?php newSvg(strtoupper($category->slug)); ?>
            </div>
            <p class="summaryTxt"><?php echo $category->description; ?></p>
          </div>
          <img class="article2Media" src="<?php echo wp_get_attachment_url( get_term_meta( $category->term_id, 'thumbnail_id', true ) ); ?>" alt="">
          <div class="redDot" id="sectioNSummaryCardActivator"></div>
        </article>
      <?php } ?>
    <?php } ?>


    <select name="cont_selector" class="btn" id="contSelector"  onchange="if (typeof(this.selectedIndex) != 'undefined') altClassFromSelector(this.value, '#queContainerINeed', 'sectionPadding')">
      <?php $i=0;
      foreach($categories as $category) { ?>
        <?php $lt_meta_desc = get_term_meta($category->term_id, 'lt_meta_desc', true); ?>
        <?php if ($lt_meta_desc == 'on'){ ?>
          <option class="contOption" name="option" <?php if($i==0){echo 'checked';} ?> value="card<?php echo $category->term_id; ?>"><?php echo  $category->name; ?></option>
        <?php } ?>
      <?php $i++; } ?>
    </select>

  <?php } ?>
</section>


  <article class="articleCounter sectionPadding">
    <div class="counter">
      <div class="redDot" id="growUpActivator"></div>
      <div class="count countTitle">
        <p class="countNumber">+<span class="GrowUp Obse" data-observe="#growUpActivator" data-unobserve="true" data-target="<?php echo get_post_meta($post->ID, 'H-numero-metrica-1', true); ?>">0</span></p>
        <p class="countTxt"><?php echo get_post_meta($post->ID, 'I-titulo-metrica-1', true); ?></p>
      </div>
      <div class="count countTitle">
        <p class="countNumber">+<span class="GrowUp Obse" data-observe="#growUpActivator" data-unobserve="true" data-target="<?php echo get_post_meta($post->ID, 'J-numero-metrica-2', true); ?>">0</span></p>
        <p class="countTxt"><?php echo get_post_meta($post->ID, 'K-titulo-metrica-2', true); ?></p>
      </div>
      <div class="count countTitle">
        <p class="countNumber">+<span class="GrowUp Obse" data-observe="#growUpActivator" data-unobserve="true" data-target="<?php echo get_post_meta($post->ID, 'L-numero-metrica-3', true); ?>">0</span></p>
        <p class="countTxt"><?php echo get_post_meta($post->ID, 'M-titulo-metrica-3', true); ?></p>
      </div>
      <div class="count countTitle">
        <p class="countNumber">+<span class="GrowUp Obse" data-observe="#growUpActivator" data-unobserve="true" data-target="<?php echo get_post_meta($post->ID, 'N-numero-metrica-4', true); ?>">0</span></p>
        <p class="countTxt"><?php echo get_post_meta($post->ID, 'O-titulo-metrica-4', true); ?></p>
      </div>
    </div>
  </article>

<section class="sectionPadding">
  <article class="article2">
    <div class="redDot" id="sectioNSummaryAboutUsActivator"></div>
    <hgroup class="sectionSummary Obse" data-observe="#sectioNSummaryAboutUsActivator" data-unobserve="false">
      <h2 class="summaryTitle"><?php echo get_post_meta($post->ID, 'P-titulo-valores', true); ?></h2>
      <p class="summaryTxt brandColorTxt"><?php echo get_post_meta($post->ID, 'Q-texto-valores-1', true); ?></p>
      <p class="summaryTxt"><?php echo get_post_meta($post->ID, 'R-texto-valores-2', true); ?></p>
      <p class="summaryTxt brandColorTxt"><?php echo get_post_meta($post->ID, 'S-texto-valores-3', true); ?></p>
      <p class="summaryTxt"><?php echo get_post_meta($post->ID, 'T-texto-valores-4', true); ?></p>
    </hgroup>
    <img class="article2Media" src="<?php echo get_post_meta($post->ID, 'U-foto-valores', true); ?>" alt="">
  </article>
  <button class="btn"><a href="<?php echo get_post_meta($post->ID, 'V-link-btn-valores', true); ?>"><?php echo get_post_meta($post->ID, 'W-texto-btn-valores', true); ?></a></button>
</section>

<section class="sectionPadding sectionColor3">
  <article class="article2 silverseaEnElMundo">
    <iframe class="article2Media" src="https://www.google.com/maps/d/embed?mid=17c08JkE4KqI6p3EPcDfsiIMtwDveG7D8" width="640" height="480"></iframe>
    <div class="redDot" id="sectioNSummarySilverSeaMundoActivator"></div>
    <hgroup class="sectionSummary Obse" data-observe="#sectioNSummarySilverSeaMundoActivator" data-unobserve="false">
      <h2 class="summaryTitle"><?php echo get_post_meta($post->ID, 'X-titulo-SS-mundo', true); ?></span></h2>
      <p class="summaryTxt brandColorTxt"><?php echo get_post_meta($post->ID, 'Y-texto-SS-mundo-1', true); ?></p>
      <p class="summaryTxt"><?php echo get_post_meta($post->ID, 'Z-texto-SS-mundo-2', true); ?></p>
    </hgroup>
  </article>
</section>

<?php get_footer(); ?>
