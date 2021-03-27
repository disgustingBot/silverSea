<?php


add_action(        'admin_post_lt_form_handler', 'lt_form_handler');
add_action( 'admin_post_nopriv_lt_form_handler', 'lt_form_handler');
function lt_form_handler() {
	$debugMode = false;
	$respuesta = array();


  $link=$_POST['link'];

	if($_POST['a00'] != ""){
		$link = add_query_arg( array('status' => 'sneaky',), $link );
	} else {

		$email1='info@silverseacontainers.com';
    // $email2='administracion-eu@silverseacontainers.com';


    // $email='molinerozadkiel@gmail.com';

		$subject='Form from '. $link;
		$message='';

    foreach ($_POST as $key => $value) {
      if ( $key != 'a00' && $key != 'action' && $key != 'link' && $key != 'status' && $key != 'submit' && $key != 'token' ) {
        $message=$message.'<strong>'.$key.':</strong> '.$value.' - <br>';
      }
    }

    $headers = array('Content-Type: text/html; charset=UTF-8');


		$site = '6LecRz0aAAAAAKUrJIYGOD7oNzplt6aPwhdJj_Pa';
		$scrt = '6LecRz0aAAAAAOVC010sTs7NewZVAiF7wSDFIOav';

    $token = $_POST['token'];
		// $link = add_query_arg( array( 'token' => $token , ), $link );

		// get validation from google
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, array(
		  'secret' => $scrt,
		  'response' => $token,
		  'remoteip' => $_SERVER['REMOTE_ADDR']
		));
		// save response in a variable
		$boring_google_response = json_decode(curl_exec($ch));
		curl_close($ch);
		// end of get validation


    if ($boring_google_response->success) {
			if (wp_mail( $email1 , $subject , $message , $headers )) {
				// wp_mail( $email2 , $subject , $message , $headers );
				// wp_mail( $_POST['email'] , $subject , $message , $headers );
				$link = add_query_arg( array( 'status' => 'sent' , ), $link );
			} else {
				$link = add_query_arg( array( 'status' => 'error', ), $link );
			}
    } else {
			$link = add_query_arg( array( 'status' => 'bot' , ), $link );
			// foreach ($_POST as $key => $value) {
			// 	$link = add_query_arg( array( $key => $value , ), $link );
			// 	// code...
			// }
    }
	}
	wp_redirect($link);
	// if($debugMode){echo wp_json_encode($respuesta);}
	exit();
}












add_action(        'wp_ajax_lt_ajax_mail', 'lt_ajax_mail');
add_action( 'wp_ajax_nopriv_lt_ajax_mail', 'lt_ajax_mail');
function lt_ajax_mail() {
	$debugMode = true;
	$respuesta = array();


  // $link=$_POST['link'];
  $cont = json_decode(stripslashes($_POST['cont']));
  $currency        = $_POST[ 'currency' ];
  $country         = $_POST[ 'country' ];
  $phone           = $_POST[ 'phone' ];
  $city            = $_POST[ 'city' ];
  $name            = $_POST[ 'name' ];
  $mail            = $_POST[ 'mail' ];
  $title           = $_POST[ 'title' ];
  $destino_city    = $_POST[ 'destino_city' ];
  $destino_country = $_POST[ 'destino_country' ];

  $destino = '';
  $origen = " - En: <span class='ubicacion'>$country - $city</span>";
  if(isset($_POST['destino_country'])){
    $origen = " - Desde: <span class='ubicacion'>$country - $city</span>";
    $destino = "Hasta: <span class='ubicacion'>$destino_country - $destino_city</span>";
  }

	// if($_POST['a00'] != ""){
    // $respuesta['gate0'] = 'ROBOT';
		// $link = add_query_arg( array('status' => 'nope',), $link );
	// } else {
    // $respuesta['gate0'] = 'no es robot';



    // $respuesta['cont'] = json_encode($cont);
    $totalPrice = 0;
    $tablaDePrecios = '';
    foreach ($cont as $key => $value) {
      $respuesta[$key] = $value;
      if($value->singlePrice != 'Precio no disponible'){
        $finalPrice = $value->qty * $value->singlePrice;
        $totalPrice = $totalPrice + $finalPrice;

        // $finalPrice = $finalPrice . ' ' . $currency;
        $finalPrice = number_format($finalPrice, 2, ',', ' ') . ' ' . $currency;
        // $singlePrice = $value->singlePrice . ' ' . $currency;


        $singlePrice = number_format($value->singlePrice, 2, ',', ' ') . ' ' . $currency;

      } else {
        $finalPrice = '-';
        $singlePrice = $value->singlePrice;
      }
      $clase = '';
      if($key & 1){
        $clase = 'budget-row-colored';
      }

      $tablaDePrecios = $tablaDePrecios . "
      <tr style='border-collapse:collapse;color:white;text-transform:uppercase'>
        <td style='padding:10px;Margin:0;color:black;border-collapse:collapse;line-break:anywhere;font-size:14px'>$value->code</td>
        <td style='padding:10px;Margin:0;color:black;border-collapse:collapse;line-break:anywhere;font-size:14px'>$value->qty</td>
        <td style='padding:10px;Margin:0;color:black;border-collapse:collapse;line-break:anywhere;font-size:14px'>$singlePrice</td>
        <td style='padding:10px;Margin:0;color:black;border-collapse:collapse;line-break:anywhere;font-size:14px'> - </td>
        <td style='padding:10px;Margin:0;color:black;border-collapse:collapse;line-break:anywhere;font-size:14px'>$finalPrice</td>
      </tr>";
    }
    $totalPrice = number_format($totalPrice, 2, ',', ' ') . ' ' . $currency;



    $mail1 = 'molinerozadkiel@gmail.com';
    $mail2 = 'tomas.moralparra@gmail.com';

		$subject="Cotizacion para $name";
    // $message='';
    // $message=$mail;

    $respuesta['test'] = 'testeo de respuesta';


    // foreach ($_POST as $key => $value) {
    //   if ( $key != 'a00' && $key != 'action' && $key != 'link' && $key != 'status' && $key != 'submit' && $key != 'g-recaptcha-response' ) {
    //     $message=$message.'<strong>'.$key.':</strong> '.$value.' - <br>';
    //   }
    // }

    require_once 'mailv2.php';
    $headers = array('Content-Type: text/html; charset=UTF-8');

    // wp_mail( $mail1 , $subject , $message , $headers );
    if (wp_mail( $mail , $subject , $message , $headers )) {
			// wp_mail( $mail2 , $subject , $message , $headers );
      // $link = add_query_arg( array( 'status' => 'sent' , ), $link );
      $respuesta['gate1'] = 'mail enviado';
    } else {
      // $link = add_query_arg( array( 'status' => 'error', ), $link );
      $respuesta['gate1'] = 'error al enviar mensaje';
    }
	// }
	if($debugMode){echo wp_json_encode($respuesta);}
	exit();
}