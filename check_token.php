<?php
session_start();

$token = $_POST['token'];
$scrt = '6LecRz0aAAAAAOVC010sTs7NewZVAiF7wSDFIOav';
$response = array();

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


// $result = json_decode($boring_google_response, true);

if ($boring_google_response->success) {
  // no es un bot
  $response['title']   = 'Success';
  $response['message'] = 'Welcome';
  $my_pass = '!nGumcA0.lD(n~&r.nwQz1kAm-c.BoY8FGNR2sr@.AU6-iP5X3~>K[nvK-sig0TS';
  $_SESSION['super_secret_password'] = $my_pass;

} else {
  // es un bot
  $response['title'] = 'bot';
  $response['message'] = 'you fucker';
}

echo json_encode($response);
exit();
