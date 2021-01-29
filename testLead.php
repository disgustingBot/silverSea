<?php
session_start();
$response = array();
function report_error($response){
  echo '
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
    </head>
    <body>
      <h1>'.$response['title'].'</h1>
      <p>'.$response['message'].'</p>
    </body>
  </html>
  ';
}
// you need at least one of the two keys
if(!isset($_SESSION['super_secret_password']) and !isset($_GET['token'])){
  // TODO: que elimine cookies?
  $response['title']   = 'Error';
  $response['message'] = 'you uou how did you?';
  // echo json_encode($response);

  report_error($response);
  exit();
}

$my_pass = '!nGumcA0.lD(n~&r.nwQz1kAm-c.BoY8FGNR2sr@.AU6-iP5X3~>K[nvK-sig0TS';
if(!isset($_SESSION['super_secret_password'])) {
  // si no tiene pasword debe tener token porque sino no hubiera llegado hasta aqui
  // chequear token

  $token = $_GET['token'];
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
    $_SESSION['super_secret_password'] = $my_pass;

  } else {
    // es un bot
    $response['title'] = 'bot';
    $response['message'] = 'dodge this';
    // echo json_encode($response);
    report_error($response);
    exit();
  }
}

// si tiene super_secret_password pero es incorrecta hecharlos afuera
if(isset($_SESSION['super_secret_password']) and $_SESSION['super_secret_password'] != $my_pass) {
    // es un bot
    $response['title'] = 'Bot?';
    $response['message'] = 'how is this possible';
    // echo json_encode($response);
    report_error($response);
    exit();
}

// chequear la cantidad de leads enviados, si fueron todos unset $_SESSION

$cant_leads = $_GET['cant_leads'];

// no se como se podria dar, pero por las dudas
if(!isset($_GET['cant_leads']) and !isset($_SESSION['cant_leads'])) {
    // es un bot
    $response['title'] = 'Bot?';
    $response['message'] = 'what are you even doing?';
    // echo json_encode($response);
    report_error($response);
    exit();
}


// si ya mando todos los leads, quitar la variable session para evitar problemas
if(!isset($_GET['cant_leads']) and isset($_SESSION['cant_leads'])){
  $_SESSION['cant_leads'] = $_SESSION['cant_leads'] - 1;
  if($_SESSION['cant_leads'] == 0){
    unset($_SESSION['cant_leads']);
  }
}

// si tiene super_secret_password pero es incorrecta hecharlos afuera
if(isset($_GET['cant_leads']) and !isset($_SESSION['cant_leads'])){
  $_SESSION['cant_leads'] = $_GET['cant_leads'] - 1;
}
















// !ESTOS SON LOS NAME VALUES COMO LOS ENTREGÓ JONI el 21/08/2020
// First Name        - name="first_name"      id="first_name"      maxlength="40" size="20" type="text"
// Last Name         - name="last_name"       id="last_name"       maxlength="80" size="20" type="text"
// Email             - name="email"           id="email"           maxlength="80" size="20" type="text"
// Phone             - name="phone"           id="phone"           maxlength="40" size="20" type="text"
// Company           - name="company"         id="company"         maxlength="40" size="20" type="text"
// Country           - name="country"         id="country"         maxlength="40" size="20" type="text"
// City              - name="city"            id="city"            maxlength="40" size="20" type="text"
// Producto          - name="00N0X00000CrHzi" id="00N0X00000CrHzi" maxlength="100" size="20" type="text"
// Precio cotizado   - name="00N0X00000DSh9o" id="00N0X00000DSh9o" maxlength="255" size="20" type="text"
// Entrega inmediata - name="00N0X00000DSh9n" id="00N0X00000DSh9n" maxlength="255" size="20" type="text"
// Traslado          - name="00N0X00000CrQFZ" id="00N0X00000CrQFZ" maxlength="255" size="20" type="text"
// ProductSize       - name="00N0X00000AlPaA" id="00N0X00000AlPaA" maxlength="25" size="20" type="text"
// ProductType       - name="00N0X00000AlPaB" id="00N0X00000AlPaB" maxlength="30" size="20" type="text"
// Quantity          - name="00N0X00000AlPaC" id="00N0X00000AlPaC" size="20" type="text"
// Message           - name="00N0X00000AlPa9" id="00N0X00000AlPa9" type="text"

// !ESTOS SON LOS NAME VALUES DEL TESTEO QUE SI LLEGA el 21/08/2020
// First Name        - name="first_name"      id="first_name"      maxlength="40" size="20" type="text"
// Last Name         - name="last_name"       id="last_name"       maxlength="80" size="20" type="text"
// Email             - name="email"           id="email"           maxlength="80" size="20" type="text"
// Phone             - name="phone"           id="phone"           maxlength="40" size="20" type="text"
// Company           - name="company"         id="company"         maxlength="40" size="20" type="text"
// Country           - name="country"         id="country"         maxlength="40" size="20" type="text"
// City              - name="city"            id="city"            maxlength="40" size="20" type="text"
// Producto          - name="00N0X00000CrHzi" id="00N0X00000CrHzi" maxlength="100" size="20" type="text"
// Precio cotizado   - name="00N1x000003yrOa" id="00N0X00000DSh9o" maxlength="255" size="20" type="text"
// Entrega inmediata - name="00N1x000003yrzM" id="00N0X00000DSh9n" maxlength="255" size="20" type="text"
// Traslado          - name="00N0X00000CrQFZ" id="00N0X00000CrQFZ" maxlength="255" size="20" type="text"
// ProductSize       - name="00N0X00000AlPaA" id="00N0X00000AlPaA" maxlength="25" size="20" type="text"
// ProductType       - name="00N0X00000AlPaB" id="00N0X00000AlPaB" maxlength="30" size="20" type="text"
// Quantity          - name="00N0X00000AlPaC" id="00N0X00000AlPaC" size="20" type="text"
// Message           - name="00N0X00000AlPa9" id="00N0X00000AlPa9" type="text"

// $myvars = "oid=$oid&retURL=$retURL&debug=$debug&debugEmail=$debugEmail&first_name=$first_name&last_name=$last_name&email=$email&phone=$phone&company=$company&country=$country&city=$city&00N0X00000CrHzi=$product&00N0X00000AlPaB=$type&00N0X00000AlPaA=$size&00N0X00000AlPaC=$quantity&00N0X00000AlPa9=$message&00N1x000003yrOa=$precio&00N1x000003yrzM=$inmediata&00N0X00000CrQFZ=$traslado";
// $myvars = "
// oid=00D0X000000uRGw&
// retURL=https%3A%2F%2Fsstc.com.es%2F&
// debug=1&
// debugEmail=gportela%40silverseacontainers.com&
// first_name=Testeo&
// last_name=Final&
// email=elmail%40nuevo.email&
// phone=1234567890&
// company=THE+company&
// country=here&
// city=exactly+here&
// 00N0X00000CrHzi=20FR+CW&
// 00N0X00000AlPaB=container&
// 00N0X00000AlPaA=big&
// 00N0X00000AlPaC=22&
// 00N0X00000AlPa9=yet+another+test&
// 00N1x000003yrzM=1&
// 00N0X00000CrQFZ=1&
// 00N1x000003yrOa=25000
// ";































// $oid        = $_GET['oid'];
// $retURL     = $_GET['retURL'];
// $debug      = $_GET['debug'];
// $debugEmail = $_GET['debugEmail'];


$first_name = $_GET['first_name'];
$last_name  = $_GET['last_name'];
$email      = $_GET['email'];
$phone      = $_GET['phone'];
$company    = $_GET['company'];
$country    = $_GET['country'];
$city       = $_GET['city'];
$product    = $_GET['product'];
$type       = $_GET['type'];
$size       = $_GET['size'];
$quantity   = $_GET['quantity'];
$message    = $_GET['message'];
$inmediata  = $_GET['inmediata'];
$traslado   = $_GET['traslado'];
$precio     = $_GET['precio'];

$source   = $_GET['source'];
$medium   = $_GET['medium'];
$campaign = $_GET['campaign'];
$content  = $_GET['content'];
$term     = $_GET['term'];
// $token    = $_GET['token'];



// "&source=$source&medium=$medium&campaign=$campaign&content=$content&term=$term"
// "&00N0X00000DCQ37=$source&00N0X00000DCQ36=$medium&00N0X00000DCQ34=$campaign&00N0X00000DCQ35=$content&00N0X00000DCQ38=$term"
// codigos pasados por Jonatan
// 00N6700000DpopN  Custom Field: UTM_Source
// 00N6700000DpopS  Custom Field: GA_UTM_Campaign
// 00N6700000DpopX  Custom Field: GA_UTM_Medium
// 00N6700000Dpopc  Custom Field: GA_UTM_Content
// 00N6700000Dpoph  Custom Field: GA_UTM_Term

// codigos pasados por jimena
// Google Analytics Campaign:<input  id="00N0X00000DCQ34"
// Google Analytics Content: <input  id="00N0X00000DCQ35"
// Google Analytics Medium:  <input  id="00N0X00000DCQ36"
// Google Analytics Source:  <input  id="00N0X00000DCQ37"
// Google Analytics Term:    <input  id="00N0X00000DCQ38"


// OID PARA SITIO EN PRODUCCION
$oid        = '00D0X000000uRGw';
// nuevo test oid
// $oid        = '00D1x0000008bpY';
// primer test oid
// $oid        = '00D1l0000000ia7';
$retURL     = 'https%3A%2F%2Fsstc.com.es%2F';
$debug      = '1';
$debugEmail = 'testtter%40aaallll.com';

// $first_name = 'Si+llega+a';
// $last_name  = 'salesforce';
// $email      = 'mail%40test.tt';
// $phone      = '1234567890';
// $company    = 'Test inc.';
// $country    = 'Testland';
// $city       = 'Testpolis';
// $product    = '20FR+CW';
// $type       = 'container';
// $size       = 'big';
// $quantity   = '22';
// $message    = 'yet+another+test';
// $inmediata  = '1';
// $traslado   = '1';
// $precio     = '12500';

// inmediata: Id="00N1x000003yrzM" type="checkbox"
// Traslado: Id="00N0X00000CrQFZ" type="checkbox"

// 00N1x000003yrzM=1&00N0X00000CrQFZ=1&00N1x000003yrOa=25000


// $testUrl = 'https://silverseacontainers.com/testLead.php';

// $myvars = "oid=$oid&retURL=$retURL&debug=$debug&debugEmail=$debugEmail&first_name=$first_name&last_name=$last_name&email=$email&phone=$phone&company=$company&country=$country&city=$city&00N0X00000CrHzi=$product&00N0X00000AlPaB=$type&00N0X00000AlPaA=$size&00N0X00000AlPaC=$quantity&00N0X00000AlPa9=$message";



// esta este activo!!!
$myvars = "oid=$oid&retURL=$retURL&debug=$debug&debugEmail=$debugEmail&first_name=$first_name&last_name=$last_name&email=$email&phone=$phone&company=$company&country=$country&city=$city&00N0X00000CrHzi=$product&00N0X00000AlPaB=$type&00N0X00000AlPaA=$size&00N0X00000AlPaC=$quantity&00N0X00000AlPa9=$message&00N1x000003yrOa=$precio&00N1x000003yrzM=$inmediata&00N0X00000CrQFZ=$traslado&00N6700000DpopN=$source&00N6700000DpopX=$medium&00N6700000DpopS=$campaign&00N6700000Dpopc=$content&00N6700000Dpoph=$term";
// $myvars = "oid=$oid&retURL=$retURL&debug=$debug&debugEmail=$debugEmail&first_name=$first_name&last_name=$last_name&email=$email&phone=$phone&company=$company&country=$country&city=$city&00N0X00000CrHzi=$product&00N0X00000AlPaB=$type&00N0X00000AlPaA=$size&00N0X00000AlPaC=$quantity&00N0X00000AlPa9=$message&00N1x000003yrOa=$precio&00N1x000003yrzM=$inmediata&00N0X00000CrQFZ=$traslado&00N0X00000DCQ37=$source&00N0X00000DCQ36=$medium&00N0X00000DCQ34=$campaign&00N0X00000DCQ35=$content&00N0X00000DCQ38=$term";
// $myvars = "oid=$oid&retURL=$retURL&debug=$debug&debugEmail=$debugEmail&first_name=$first_name&last_name=$last_name&email=$email&phone=$phone&company=$company&country=$country&city=$city&00N0X00000CrHzi=$product&00N0X00000AlPaB=$type&00N0X00000AlPaA=$size&00N0X00000AlPaC=$quantity&00N0X00000AlPa9=$message&00N1x000003yrOa=$precio&00N1x000003yrzM=$inmediata&00N0X00000CrQFZ=$traslado";






// $myvars = "oid=$oid&retURL=$retURL&debug=$debug&debugEmail=$debugEmail&first_name=$first_name&last_name=$last_name&email=$email&phone=$phone&company=$company&country=$country&city=$city&00N0X00000CrHzi=$product&00N0X00000AlPaB=$type&00N0X00000AlPaA=$size&00N0X00000AlPaC=$quantity&00N0X00000AlPa9=$message&00N1x000003yrzM=$inmediata&00N0X00000DSh9n=$traslado&00N0X00000DSh9o=$precio";

// $myvars = "oid=$oid           &retURL=$retURL                     &debug=$debug&debugEmail=$debugEmail                       &first_name=$first_name&last_name=$last_name&email=$email              &phone=$phone    &company=$company   &country=$country&city=$city       &00N0X00000CrHzi=$product&00N0X00000AlPaB=$type    &00N0X00000AlPaA=$size&00N0X00000AlPaC=$quantity&00N0X00000AlPa9=$message        &00N1x000003yrzM=$inmediata&00N0X00000DSh9n=$traslado&00N0X00000DSh9o=$precio";
// $myvars = "oid=00D0X000000uRGw&retURL=https%3A%2F%2Fsstc.com.es%2F&debug=1     &debugEmail=gportela%40silverseacontainers.com&first_name=Testeo     &last_name=Final     &email=elmail%40nuevo.email&phone=1234567890&company=THE+company&country=here    &city=exactly+here&00N0X00000CrHzi=20FR+CW &00N0X00000AlPaB=container&00N0X00000AlPaA=big  &00N0X00000AlPaC=22       &00N0X00000AlPa9=yet+another+test&00N1x000003yrzM=1         &00N0X00000CrQFZ=1        &00N1x000003yrOa=25000";

// setcookie("vars", $myvars);
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
</head>
<body>



<?php

// echo '<h1>Variables GET</h1>';
// foreach ($_GET as $key => $value) {
//       # code...
//       echo '<br>';
//       echo '<br>';
//       echo $key . ' => ' . $value;
// }

// $url = 'https://test.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8';
// $url = 'https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8';


// PARDOT URL PARA SITIO EN PRODUCCION
$url = 'https://go.pardot.com/l/821023/2020-06-05/9g7r';
// pardot para sandbox
// $url = 'https://go.pardot.com/l/821023/2020-06-02/8qk1';
// $myvars = "oid=00D1x0000008bpY&retURL=https%3A%2F%2Fsstc.com.es%2F&debug=1&debugEmail=gportela%40silverseacontainers.com&first_name=Cosme&last_name=Fulanito&email=elmail%40nuevo.email&phone=1234567890&company=THE+company&country=here&city=exactly+here&00N0X00000CrHzi=20FR+CW&00N0X00000AlPaB=container&00N0X00000AlPaA=big&00N0X00000AlPaC=22&00N0X00000AlPa9=yet+another+test";


// $myvars = "oid=00D0X000000uRGw&retURL=https%3A%2F%2Fsstc.com.es%2F&debug=1&debugEmail=gportela%40silverseacontainers.com&first_name=Testeo&last_name=Final&email=elmail%40nuevo.email&phone=1234567890&company=THE+company&country=here&city=exactly+here&00N0X00000CrHzi=20FR+CW&00N0X00000AlPaB=container&00N0X00000AlPaA=big&00N0X00000AlPaC=22&00N0X00000AlPa9=yet+another+test&00N1x000003yrzM=1&00N0X00000CrQFZ=1&00N1x000003yrOa=25000";


// $myvars = "oid=00D1x0000008bpY&retURL=https%3A%2F%2Fsstc.com.es%2F&debug=1&debugEmail=gportela%40silverseacontainers.com&first_name=Testeo&last_name=Final&email=elmail%40nuevo.email&phone=1234567890&company=THE+company&country=here&city=exactly+here&00N0X00000CrHzi=20FR+CW&00N0X00000AlPaB=container&00N0X00000AlPaA=big&00N0X00000AlPaC=22&00N0X00000AlPa9=yet+another+test&00N1x000003yrzM=1&00N0X00000CrQFZ=1&00N1x000003yrOa=25000";
// $myvars = "oid=00D1l0000000ia7&retURL=https%3A%2F%2Fsstc.com.es%2F&debug=1&debugEmail=gportela%40silverseacontainers.com&first_name=Cosme&last_name=Fulanito&email=elmail%40nuevo.email&phone=1234567890&company=THE+company&country=here&city=exactly+here&00N0X00000CrHzi=20FR+CW&00N0X00000AlPaB=container&00N0X00000AlPaA=big&00N0X00000AlPaC=22&00N0X00000AlPa9=yet+another+test&00N1x000003yrzM=1&00N0X00000CrQFZ=1&00N1x000003yrOa=25000";
$_SESSION["vars"] = $myvars;

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
?>

<!-- <div style=""> -->
<div style="opacity:0">
<?php var_dump($response); ?>
</div>


</body>
</html>
