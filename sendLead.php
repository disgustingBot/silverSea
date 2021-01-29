<?php
session_start();

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



// OID PARA SITIO EN PRODUCCION
$oid        = '00D0X000000uRGw';
$retURL     = 'https%3A%2F%2Fsstc.com.es%2F';
$debug      = '1';
$debugEmail = 'testtter%40aaallll.com';

// esta este activo!!!
$myvars = "oid=$oid&retURL=$retURL&debug=$debug&debugEmail=$debugEmail&first_name=$first_name&last_name=$last_name&email=$email&phone=$phone&company=$company&country=$country&city=$city&00N0X00000CrHzi=$product&00N0X00000AlPaB=$type&00N0X00000AlPaA=$size&00N0X00000AlPaC=$quantity&00N0X00000AlPa9=$message&00N1x000003yrOa=$precio&00N1x000003yrzM=$inmediata&00N0X00000CrQFZ=$traslado&00N6700000DpopN=$source&00N6700000DpopX=$medium&00N6700000DpopS=$campaign&00N6700000Dpopc=$content&00N6700000Dpoph=$term";
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
// PARDOT URL PARA SITIO EN PRODUCCION
$url = 'https://go.pardot.com/l/821023/2020-06-05/9g7r';
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
