<?php

$mail = '
<html style="overflow-x: hidden;">
    <head>
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Simple Transactional Email</title>
        <style>
            /* -------------------------------------
                GLOBAL RESETS
            ------------------------------------- */
            * {
            font-family: sans-serif;
            box-sizing: border-box;
            }
    
            body {
            margin: 0;
            overflow-x: hidden;
            background: #f5f5f5;
            }
    
    
    
            th {
                text-align: left;
            }
    
            /* -------------------------------------
                BODY & CONTAINER
            ------------------------------------- */
            .wrapper {
                padding: 16px;
                width: 100%;
            }
            .bg-1 {background: #f5f5f5}
            .bg-2 {background: #eeeeee}
            .bg-3 {background: #e0e0e0}
            .bg-4 {background: #bdbdbd}
    
    
    
    
            /* -------------------------------------
                HEADER, FOOTER, MAIN
            ------------------------------------- */
    
            .mailLogo {
                width: 250px;
                margin-left: 50%;
                transform: translateX(-50%);
            }
    
            .mailData {
                width: 50%;
                padding: 16px 0;
                float: left;
                list-style: none;
            }
    
            .mailBudget {margin: 64px auto;}
    
            .mailBudget, .mailBudget th, .mailBudget td {
                border: 1px dotted black;
                border-collapse: collapse;
                padding: 10px;
                line-break: anywhere;
                font-size: 16px;
            }
    
            .mailBudget th {
                padding: 5px;
            }
    
            .budget-row {
                padding: 40px;
            }
    
            .budget-title {
                background:#00498a;
                color: white;
                text-transform: uppercase;
            }
    
            .budget-row-colored {
                background: #e0e0e0;
            }
    
            .CTA-1 {
            width: 50%;
            height: 230px;
            padding-top: 50px;
            }
    
            .mail-menu {
                width: 50%;
                list-style: none;
                padding: 16px;
                margin: 0;
                height: 230px;
                float: right;
            }
    
    
            .mail-menu-item {
                text-decoration: none;
                color: black;
                position: relative;
                margin-right: 16px;
                margin-bottom: 16px;
            }
    
    
            /* -------------------------------------
                MODIFYERS
            ------------------------------------- */
    
            .mail-menu-item a {text-decoration: none}
            .padding-bottom-0 {padding-bottom: 0}
            .padding-bottom-16px {padding-bottom: 16px}
            .margin-top-16px {margin-top: 16px}
            .border-none {border: none!important}
    
    
            .DP2 {
            box-shadow: 0px 1px 5px  rgba(0, 0, 0, 0.2),  0px 3px 4px  rgba(0, 0, 0, 0.12), 0px 2px 4px   rgba(0, 0, 0, 0.14);
            }
    
    
    
            /* -------------------------------------
                TYPOGRAPHY
            ------------------------------------- */
    
            .text-center {text-align: center}
            .text-justify {text-align: justify}
            .text-right {text-align: right}
    
            .px12 {font-size:12px}
            .px16 {font-size:16px}
            .px20 {font-size:20px}
            .px24 {font-size:24px}
    
            /* -------------------------------------
                BUTTONS
            ------------------------------------- */
    
            .btn {
            background: #ecc800;
            border:none;
            box-shadow: 0px 1px 5px  rgba(0, 0, 0, 0.2),  0px 3px 4px  rgba(0, 0, 0, 0.12), 0px 2px 4px   rgba(0, 0, 0, 0.14);
            cursor: pointer;
            display: flex;
            font-size: 18px;
            font-weight: bold;
            height: min-content;
            justify-content: center;
            margin: auto;
            margin-bottom: 24px;
            padding: 12px;
            text-transform: uppercase;
            transition: .35s;
            width: max-content;
            text-decoration: none;
            color: black;
            }
    
            .btn::before {
            display: none;
            }
    
            .btn-2 {background: #00498a}
            .btn-2 a {
            color: white;
            text-decoration: none;
            }
    
            .socialMedia {
            width: max-content;
            margin-left: 50%;
            transform: translateX(-50%);
            }
    
            .socialMediaLink {
            width: 25px;
            height: 25px;
            text-decoration: none;
            color: black;
            transition: .3s ease-in;
            }
    
            .socialMediaLink:hover {
            color: white;
            }
    
            /* -------------------------------------
                RESPONSIVE AND MOBILE FRIENDLY STYLES
            ------------------------------------- */
            @media only screen and (max-width: 620px) {
            .CTA-1 {
                float: none;
                width: 100%;
            }
    
            .mail-menu {
                width: 100%;
                float: none;
            }
    
            .mailData {
                width: 100%;
                float: none;
            }
    
            .mailBudget, .mailBudget th, .mailBudget td  {
                font-size: 8px;
            }
    
            }
        </style>
    </head>

  <body>

    <header class="wrapper bg-2 padding-bottom-0 DP2">
      <img class="mailLogo" src="https://silverseacontainers.com/wp-content/uploads/2020/04/logo.png" alt="" />
      <p class="px20 text-center padding-bottom-16px"><strong>Cotización <span class="cliente">%nombre-cliente%</span> - <span class="pedido">%titulo-pedido%</span> - <span class="ubicacion">%ubicacion-cliente%</span></strong></p>
    </header>

    <div class="wrapper bg-1">
      <ul class="mailData">
        <li><strong>Silversea</strong></li>
        <li>Rambla Cataluña 20 3-1</li>
        <li>Barcelona</li>
        <li>España</li>
        <li>(+34) 935 958 800</li>
      </ul>
      <ul class="mailData">
        <li><strong>Cliente</strong></li>
        <li>%nombre-cliente%</li>
        <li>%telefono-cliente%</li>
        <li>%email-cliente%</li>
        <li>%direccion-cliente%</li>
      </ul>



    <p class="mailText">Estimado %nombre-cliente%, detallamos debajo la cotización por el pedido que ha solicitado en nuestra web.
    En breve nos pondremos en contacto con usted para asesorarlo acerca de las diferentes posibilidades que podemos ofrecerle.</p>
    <table class="mailBudget">
        <tr class="budget-row budget-title px14">
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio. Unit.</th>
            <th>Imp. (%)</th>
            <th>Sub-Total</th>
        </tr>
        <tr class="budget-row budget-row-colored">
            <td>%fila-producto%</td>
            <td>%fila-cantidad%</td>
            <td>%fila-precio-unit%</td>
            <td>%fila-impuesto%</td>
            <td>%fila-subtotal%</td>
        </tr>
        <tr class="budget-row">
            <td>%fila-producto%</td>
            <td>%fila-cantidad%</td>
            <td>%fila-precio-unit%</td>
            <td>%fila-impuesto%</td>
            <td>%fila-subtotal%</td>
        </tr>
        <tr class="budget-row budget-row-colored">
            <td>%fila-producto%</td>
            <td>%fila-cantidad%</td>
            <td>%fila-precio-unit%</td>
            <td>%fila-impuesto%</td>
            <td>%fila-subtotal%</td>
        </tr>
        <tr class="budget-row budget-row-colored">
            <td class="bg-1 border-none"></td>
            <td class="bg-1 border-none"></td>
            <td class="bg-1 border-none"></td>
            <td class="budget-title"><strong>Total</strong></td>
            <td class="budget-title"><strong>%suma-total%</strong></td>
        </tr>
    </table>

    </div>

    <ul class="mail-menu bg-3">
      <p class="px20 text-center">CONÓCENOS: </p>
        <li class="btn btn-2 mail-menu-item"><a href="#" style="color: white"> ABOUT US</a></li>
        <li class="btn btn-2 mail-menu-item"><a href="#" style="color: white"> EQUIPO</a></li>
    </ul>
    <div class="CTA-1 bg-2">
      <p class="text-center px24">¿Necesitas otra cotización?</p>
      <a class="btn text-center" href="#" style="color: black">Cotizar contenedores</a>
    </div>
    <div style="clear:both;"></div>

    <div class="wrapper bg-1 margin-top-16px">
      <p class="px12 text-justify">Condiciones generales: Los contenedores marítimos vendidos por SILVERSEA son usados, pueden tener tanto un viaje como varios años de uso,
        por lo tanto, pueden presentar signos de desgaste y golpes producto del uso previo del mismo. La oferta esta sujeta a disponibilidad al momento de
        confirmación. Forma de pago es a convenir Si el servicio logístico es coordinado por el cliente, el mismo debe coordinar la entrega con Logistic
        Control control@sstc.com.uy con una antelación de 48 horas suministrando toda la información necesaria Es responsabilidad del cliente que el
        servicio contratado cuente con los elementos necesarios para el transporte de los contenedores marítimos restándose SILVERSEA el derecho a no
        entregar el/los contenedores sino se cumple con la normativa para el traslado de contenedores marítimos del medio nacional en el que este
        transcurriendo la entrega. En caso en el que el servicio logístico sea brindado por SILVERSEA, el cliente deberá proporcionar toda la información
        necesaria para evaluar la viabilidad de la entrega de los contenedores marítimos. En caso de ser necesario SILVERSEA solicita coordinar una visita
        a los lugares de entrega y/o fotos del lugar si se considera necesario. Si el servicio no puede ser completado por falta de información relevante,
        SILVERSEA no será responsable por los extra costes generados, los cuales serán facturados y abonados por el cliente. En caso que el cliente no
        retire el/los contenedor/es facturado/s al cabo de 10 días corridos, la empresa le cargara costos de almacenaje de € 10 + I.V.A. por contenedor por
        día o el equivalente en la moneda que se este facturando el servicio según el TC del dia.
        Los datos personales proporcionados para la elaboración del presupuesto de nuestros servicios, son tratados bajo la responsabilidad de
        SILVERSEA S.L. –CIF B67110601, Rambla de Catalunya 20, 3o - 1a, 08007, Barcelona, +34 935 958 8000— con la finalidad de gestionar una futura
        relación comercial; por tanto, legitimado por la necesidad para la aplicación de una medida precontractual Puede ejercer sus derechos de acceso,
        rectificación, supresión y portabilidad de datos, oposición y limitación del tratamiento, entre otros, dirigiendo un correo electrónico a la dirección de
        dataprotection@sstc.com.uy, indicando el derecho Este mensaje y sus archivos adjuntos pueden contener información confidencial, sometida a
        secreto profesional, no estando permitida su comunicación, reproducción o distribución. Si usted no es el destinatario final, por favor, infórmenos por
        esta vía y elimine el mensaje original, incluido los archivos adjuntos que pudiera contener. Los datos personales contenidos son tratados bajo la
        responsabilidad de SILVERSEA S.L., puede ejercer los derechos de acceso, rectificación, supresión y portabilidad de datos o limitación y oposición
        del tratamiento enviando un mensaje a dataprotection@sstc.com.uy</p>
    </div>

    <div class="wrapper bg-4 padding-bottom-0 DP2">
      <p class="px20 text-center">Siguenos en:</p>
      <div class="socialMedia padding-bottom-16px">
        <a class="socialMediaLink" rel="external" target="_blank" href="https://www.linkedin.com/company/silversea-trading-co.">
          <svg class="socialMSVG linkedin" width="33" height="33" viewBox="0 0 33 33" fill="currentColor" xmlns="https://www.w3.org/2000/svg">
            <path d="M16.0088 1.07805e-06C12.8435 -0.00116051 9.7489 0.936408 7.11646 2.69413C4.48402 4.45184 2.43197 6.95075 1.21984 9.87481C0.00771942 12.7989 -0.31003 16.0167 0.306783 19.1213C0.923597 22.226 2.44727 25.078 4.68508 27.3166C6.9229 29.5553 9.77434 31.08 12.8788 31.6979C15.9832 32.3159 19.2011 31.9993 22.1256 30.7883C25.0501 29.5772 27.5498 27.5261 29.3085 24.8943C31.0672 22.2625 32.0059 19.1683 32.0059 16.0029C32.0012 11.7611 30.3145 7.69433 27.3157 4.69437C24.3168 1.69442 20.2506 0.00621816 16.0088 1.07805e-06ZM12.0037 23.191C12.0086 23.2276 12.0058 23.2648 11.9955 23.3003C11.9852 23.3357 11.9676 23.3686 11.9438 23.3968C11.92 23.425 11.8906 23.4479 11.8574 23.4641C11.8242 23.4802 11.788 23.4892 11.7512 23.4905H8.65627C8.6208 23.4905 8.58567 23.4836 8.55289 23.47C8.52012 23.4564 8.49034 23.4365 8.46525 23.4114C8.44017 23.3863 8.42027 23.3566 8.4067 23.3238C8.39312 23.291 8.38613 23.2559 8.38613 23.2204V12.8435C8.38767 12.7728 8.41681 12.7056 8.4673 12.6562C8.5178 12.6068 8.58563 12.5792 8.65627 12.5792H11.7512C11.8212 12.5792 11.8885 12.607 11.938 12.6566C11.9876 12.7061 12.0154 12.7734 12.0154 12.8435L12.0037 23.191ZM10.0892 11.1932C9.7059 11.1932 9.33122 11.0796 9.01252 10.8666C8.69382 10.6537 8.44543 10.351 8.29875 9.9969C8.15207 9.64279 8.11369 9.25313 8.18846 8.8772C8.26324 8.50127 8.44781 8.15595 8.71885 7.88492C8.98987 7.61389 9.33519 7.42932 9.71112 7.35454C10.087 7.27977 10.4767 7.31814 10.8308 7.46482C11.1849 7.61151 11.4876 7.8599 11.7006 8.1786C11.9135 8.49729 12.0272 8.87198 12.0272 9.25528C12.0272 9.76926 11.823 10.2622 11.4595 10.6256C11.0961 10.9891 10.6032 11.1932 10.0892 11.1932ZM25.0527 23.191C25.0535 23.2267 25.047 23.2622 25.0337 23.2954C25.0205 23.3285 25.0006 23.3586 24.9753 23.3838C24.9501 23.4091 24.92 23.429 24.8869 23.4423C24.8537 23.4555 24.8182 23.462 24.7825 23.4612H21.6994C21.6642 23.4612 21.6293 23.4542 21.5969 23.4405C21.5644 23.4269 21.535 23.4069 21.5104 23.3817C21.4858 23.3565 21.4665 23.3267 21.4535 23.294C21.4406 23.2612 21.4343 23.2262 21.4351 23.191V17.6179C21.4351 16.1556 20.9125 15.1573 19.6029 15.1573C19.1942 15.1591 18.7961 15.2877 18.4637 15.5255C18.1313 15.7632 17.8809 16.0983 17.7471 16.4845C17.648 16.7731 17.6061 17.0783 17.6238 17.383V23.191C17.6246 23.2262 17.6183 23.2612 17.6054 23.294C17.5925 23.3267 17.5731 23.3565 17.5485 23.3817C17.5239 23.4069 17.4945 23.4269 17.462 23.4405C17.4296 23.4542 17.3947 23.4612 17.3595 23.4612H14.2764C14.2407 23.462 14.2052 23.4555 14.1721 23.4423C14.1389 23.429 14.1088 23.4091 14.0836 23.3838C14.0583 23.3586 14.0385 23.3285 14.0252 23.2954C14.0119 23.2622 14.0054 23.2267 14.0062 23.191C14.0062 21.7111 14.0474 14.5348 14.0062 12.8493C14.0054 12.8136 14.0119 12.7781 14.0252 12.745C14.0385 12.7119 14.0583 12.6818 14.0836 12.6565C14.1088 12.6313 14.1389 12.6114 14.1721 12.5981C14.2052 12.5848 14.2407 12.5784 14.2764 12.5792H17.3536C17.4237 12.5792 17.491 12.607 17.5405 12.6566C17.5901 12.7061 17.6179 12.7734 17.6179 12.8435V14.0943C17.9509 13.5306 18.4317 13.0685 19.0081 12.758C19.5846 12.4475 20.235 12.3004 20.889 12.3325C23.238 12.3325 25.0527 13.8888 25.0527 17.2303V23.191Z" fill="currentColor"/>
          </svg>
        </a>

        <a class="socialMediaLink" rel="external" target="_blank" href="https://www.facebook.com/silverseauy/">
          <svg class="socialMSVG facebook" width="33" height="33" viewBox="0 0 33 33" fill="currentColor" xmlns="https://www.w3.org/2000/svg">
            <path d="M16.0029 0C12.8376 2.12356e-07 9.74337 0.938704 7.11158 2.69739C4.47978 4.45607 2.42865 6.95573 1.2176 9.88023C0.00654519 12.8047 -0.310024 16.0227 0.307928 19.1271C0.92588 22.2315 2.45059 25.083 4.68923 27.3208C6.92787 29.5586 9.77986 31.0823 12.8845 31.6991C15.9892 32.3159 19.207 31.9982 22.1311 30.786C25.0551 29.5739 27.554 27.5219 29.3117 24.8894C31.0695 22.257 32.007 19.1624 32.0059 15.9971C32.0012 11.7548 30.3135 7.6877 27.3132 4.68851C24.3129 1.68931 20.2452 0.00310306 16.0029 0ZM20.4404 9.49038C20.4404 9.55412 20.4151 9.61526 20.37 9.66033C20.3249 9.7054 20.2638 9.73072 20.2 9.73072H18.2773C18.0504 9.73072 17.8327 9.82089 17.6722 9.98139C17.5117 10.1419 17.4215 10.3596 17.4215 10.5866V12.603H20.159C20.1921 12.603 20.2249 12.6097 20.2552 12.6229C20.2856 12.636 20.3129 12.6553 20.3355 12.6795C20.358 12.7037 20.3754 12.7324 20.3864 12.7636C20.3973 12.7948 20.4018 12.828 20.3993 12.861L20.159 15.704C20.1532 15.7636 20.1253 15.8188 20.0808 15.859C20.0364 15.8991 19.9786 15.9212 19.9187 15.9209H17.4215V25.3468C17.4215 25.4105 17.3962 25.4716 17.3511 25.5167C17.306 25.5618 17.2449 25.5871 17.1812 25.5871H13.7344C13.6706 25.5871 13.6095 25.5618 13.5644 25.5167C13.5194 25.4716 13.4941 25.4105 13.4941 25.3468V15.9209H11.7765C11.7445 15.9216 11.7126 15.916 11.6827 15.9043C11.6529 15.8926 11.6257 15.875 11.6028 15.8526C11.5798 15.8302 11.5616 15.8034 11.5492 15.7739C11.5367 15.7443 11.5303 15.7126 11.5303 15.6805V12.8434C11.5303 12.8113 11.5367 12.7796 11.5492 12.75C11.5616 12.7205 11.5798 12.6937 11.6028 12.6713C11.6257 12.6489 11.6529 12.6314 11.6827 12.6196C11.7126 12.6079 11.7445 12.6023 11.7765 12.603H13.4882V9.86554C13.4882 8.94829 13.8526 8.0686 14.5012 7.42001C15.1498 6.77141 16.0294 6.40703 16.9467 6.40703H20.1942C20.2262 6.40702 20.258 6.41343 20.2875 6.42587C20.3171 6.43832 20.3438 6.45655 20.3662 6.47949C20.3886 6.50243 20.4062 6.52962 20.4179 6.55946C20.4297 6.5893 20.4353 6.62118 20.4345 6.65323L20.4404 9.49038Z" fill="currentColor"/>
          </svg>
        </a>

        <a class="socialMediaLink" rel="external" target="_blank" href="https://www.instagram.com/silversea.containers/">
          <svg class="socialMSVG instagram" width="33" height="33" viewBox="0 0 33 33" fill="currentColor" xmlns="https://www.w3.org/2000/svg">
            <path d="M16.003 32.0059C12.8379 32.0059 9.74387 31.0673 7.11219 29.3089C4.48052 27.5505 2.42938 25.0512 1.21816 22.127C0.00693393 19.2029 -0.309978 15.9852 0.307499 12.8809C0.924977 9.77667 2.44911 6.92522 4.68716 4.68716C6.92522 2.44911 9.77667 0.924977 12.8809 0.307499C15.9852 -0.309978 19.2029 0.00693393 22.127 1.21816C25.0512 2.42938 27.5505 4.48052 29.3089 7.11219C31.0673 9.74387 32.0059 12.8379 32.0059 16.003C32.0028 20.2462 30.3158 24.3148 27.3153 27.3153C24.3148 30.3158 20.2462 32.0028 16.003 32.0059V32.0059ZM21.4022 9.51208C21.1688 9.51208 20.9406 9.5813 20.7465 9.71098C20.5524 9.84066 20.4012 10.025 20.3119 10.2406C20.2225 10.4563 20.1992 10.6936 20.2447 10.9225C20.2902 11.1514 20.4026 11.3617 20.5677 11.5267C20.7327 11.6918 20.943 11.8042 21.1719 11.8497C21.4009 11.8953 21.6382 11.8719 21.8538 11.7826C22.0695 11.6932 22.2538 11.542 22.3834 11.3479C22.5131 11.1538 22.5823 10.9257 22.5823 10.6922C22.5823 10.3792 22.458 10.0791 22.2367 9.85774C22.0154 9.63642 21.7152 9.51208 21.4022 9.51208ZM16.1387 11.0345C15.1546 11.0345 14.1926 11.3264 13.3745 11.8732C12.5563 12.4201 11.9187 13.1973 11.5424 14.1066C11.1661 15.0159 11.0679 16.0164 11.2603 16.9815C11.4527 17.9466 11.9271 18.8329 12.6234 19.5284C13.3196 20.2238 14.2065 20.6971 15.1718 20.8884C16.1372 21.0796 17.1375 20.9803 18.0464 20.6029C18.9552 20.2255 19.7317 19.587 20.2776 18.7682C20.8235 17.9494 21.1142 16.987 21.113 16.003C21.1099 14.6852 20.5846 13.4223 19.6523 12.4911C18.7199 11.5598 17.4565 11.036 16.1387 11.0345V11.0345ZM16.1387 19.1894C15.5085 19.1894 14.8924 19.0025 14.3684 18.6524C13.8444 18.3022 13.436 17.8046 13.1948 17.2223C12.9536 16.6401 12.8905 15.9994 13.0135 15.3813C13.1364 14.7632 13.4399 14.1954 13.8855 13.7498C14.3312 13.3042 14.8989 13.0007 15.517 12.8778C16.1351 12.7548 16.7758 12.8179 17.3581 13.0591C17.9403 13.3003 18.438 13.7087 18.7881 14.2327C19.1382 14.7567 19.3251 15.3727 19.3251 16.003C19.3251 16.848 18.9894 17.6585 18.3918 18.2561C17.7942 18.8537 16.9838 19.1894 16.1387 19.1894ZM26.17 11.8724C26.17 10.2636 25.5309 8.72068 24.3933 7.58308C23.2557 6.44548 21.7128 5.80639 20.104 5.80639H12.1025C10.4937 5.80639 8.95081 6.44548 7.81321 7.58308C6.67561 8.72068 6.03652 10.2636 6.03652 11.8724V19.8798C6.03341 20.6784 6.18802 21.4697 6.49147 22.2084C6.79493 22.9471 7.24126 23.6186 7.80485 24.1844C8.36844 24.7501 9.0382 25.1991 9.7757 25.5054C10.5132 25.8117 11.3039 25.9694 12.1025 25.9694H20.104C20.9026 25.9694 21.6933 25.8117 22.4308 25.5054C23.1683 25.1991 23.8381 24.7501 24.4017 24.1844C24.9653 23.6186 25.4116 22.9471 25.7151 22.2084C26.0185 21.4697 26.1731 20.6784 26.17 19.8798V11.8724ZM24.27 19.8798C24.27 20.9847 23.8311 22.0443 23.0498 22.8256C22.2685 23.6068 21.2089 24.0457 20.104 24.0457H12.1025C10.9971 24.0457 9.93687 23.607 9.15467 22.8259C8.37246 22.0448 7.93224 20.9852 7.93067 19.8798V11.8724C7.93224 10.767 8.37246 9.70736 9.15467 8.92626C9.93687 8.14517 10.9971 7.70644 12.1025 7.70644H20.104C21.2089 7.70644 22.2685 8.14536 23.0498 8.92662C23.8311 9.70789 24.27 10.7675 24.27 11.8724V19.8798Z" fill="currentColor"/>
          </svg>
        </a>

        <a class="socialMediaLink" rel="external" target="_blank" href="weixin://dl/chat?{sindertamimi}">
          <svg class="socialMSVG instagram" width="33" height="33" viewBox="0 0 33 33" fill="currentColor" xmlns="https://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5 33C25.6127 33 33 25.6127 33 16.5C33 7.3873 25.6127 0 16.5 0C7.3873 0 0 7.3873 0 16.5C0 25.6127 7.3873 33 16.5 33ZM20.9649 13.1015C20.7263 13.0704 20.4876 13.0587 20.2413 13.0587C16.6848 13.0587 13.8749 15.7472 13.8788 19.0503C13.8788 19.6028 13.9635 20.1358 14.1174 20.6377C13.8788 20.6572 13.6517 20.6688 13.4131 20.6688C12.6233 20.6688 11.9696 20.534 11.2232 20.3801C11.082 20.351 10.9374 20.3211 10.788 20.2914L8.17064 21.6181L8.91351 19.3382C7.04287 18.0115 5.91509 16.2957 5.91509 14.2181C5.91509 10.6154 9.28302 7.78302 13.4092 7.78302C17.0889 7.78302 20.326 10.0513 20.9649 13.1015ZM17.1505 11.9499C17.1505 11.378 16.7771 11.0006 16.219 11.0006C15.6532 11.0006 15.0951 11.378 15.0912 11.9499C15.0912 12.514 15.6494 12.8914 16.219 12.8914C16.7771 12.8914 17.1505 12.514 17.1505 11.9499ZM9.84113 11.9499C9.84113 12.514 10.4108 12.8914 10.9689 12.8914C11.5386 12.8914 11.9081 12.5179 11.9081 11.9499C11.9081 11.378 11.5386 11.0006 10.9689 11.0006C10.4108 11.0006 9.84113 11.3741 9.84113 11.9499ZM20.7186 13.4672C24.0865 13.4672 27.0849 15.9339 27.0849 18.9647C27.0849 20.6688 25.9687 22.1823 24.4598 23.3261L25.0295 25.217L22.9741 24.077C22.9281 24.0883 22.8822 24.0997 22.8362 24.1111C22.1244 24.2871 21.4164 24.4622 20.7186 24.4622C17.1543 24.4622 14.3522 21.9955 14.3522 18.9647C14.3522 15.9339 17.1505 13.4672 20.7186 13.4672ZM17.9088 17.2489C17.9088 17.6341 18.2783 18.0115 18.6516 18.0115C19.2174 18.0115 19.5908 17.638 19.5908 17.2489C19.5908 16.8754 19.2213 16.4981 18.6516 16.4981C18.2821 16.4981 17.9088 16.8716 17.9088 17.2489ZM22.0311 17.2489C22.0311 17.6341 22.4006 18.0115 22.774 18.0115C23.3321 18.0115 23.717 17.638 23.7131 17.2489C23.7131 16.8754 23.3321 16.4981 22.774 16.4981C22.4045 16.4981 22.0311 16.8716 22.0311 17.2489Z" fill="currentColor"/>
          </svg>

        </a>
      </div>
    </div>

  </body>
</html>';


?>