<?php


add_action(        'admin_post_lt_form_handler', 'lt_form_handler');
add_action( 'admin_post_nopriv_lt_form_handler', 'lt_form_handler');
function lt_form_handler() {
	$debugMode = false;
	$respuesta = array();


  $link=$_POST['link'];

	if($_POST['a00'] != ""){
		$link = add_query_arg( array('status' => 'nope',), $link );
	} else {
    $email='molinerozadkiel@gmail.com';

		$subject='Form from '. $link;
		$message='';

    foreach ($_POST as $key => $value) {
      if ( $key != 'a00' && $key != 'action' && $key != 'link' && $key != 'status' && $key != 'submit' && $key != 'g-recaptcha-response' ) {
        $message=$message.'<strong>'.$key.':</strong> '.$value.' - <br>';
      }
    }

    $headers = array('Content-Type: text/html; charset=UTF-8');


    // $site = '6LcRuNAUAAAAADtamJW75fYf8YtNHceSngjKsf-B';
    // $scrt = '6LcRuNAUAAAAALBu7Ymh0yxmTXTJmP0rsnkjGyj0';

    // $response = $_POST['g-recaptcha-response'];
    // $payload = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$scrt.'&response='.$response);

    // $result = json_decode($payload,true);
    // if ($result['success']!=1) {
     // $link = add_query_arg( array( 'status' => 'bot' , ), $link );
    // } else {


      if (wp_mail( $email , $subject , $message , $headers )) {
      	$link = add_query_arg( array( 'status' => 'sent' , ), $link );
      } else {
        $link = add_query_arg( array( 'status' => 'error', ), $link );
      }
    // }
	}
	// wp_redirect($link);
	if($debugMode){echo wp_json_encode($respuesta);}
	exit();
}



 ?>
