<?php
session_start();


// $oid        = $_GET['oid'];
// $retURL     = $_GET['retURL'];
// $debug      = $_GET['debug'];
// $debugEmail = $_GET['debugEmail'];


// $first_name = $_GET['first_name'];
// $last_name  = $_GET['last_name'];
// $email      = $_GET['email'];
// $phone      = $_GET['phone'];
// $company    = $_GET['company'];
// $country    = $_GET['country'];
// $city       = $_GET['city'];
// $product    = $_GET['product'];
// $type       = $_GET['type'];
// $size       = $_GET['size'];
// $quantity   = $_GET['quantity'];
// $message    = $_GET['message'];



$oid        = '00D1l0000000ia7';
$retURL     = 'https%3A%2F%2Fsstc.com.es%2F';
$debug      = '1';
$debugEmail = 'testtter%40aaallll.com';

$first_name = 'Si+llega+a+salesforce';
$last_name  = 'entiendo';
$email      = 'mail%40test.tt';
$phone      = '1234567890';
$company    = 'Test inc.';
$country    = 'Testland';
$city       = 'Testpolis';
$product    = '20FR+CW';
$type       = 'container';
$size       = 'big';
$quantity   = '22';
$message    = 'yet+another+test';

// $testUrl = 'https://silverseacontainers.com/testLead.php';


// $myvars = "oid=$oid&retURL=$retURL&debug=$debug&debugEmail=$debugEmail&first_name=$first_name&last_name=$last_name&email=$email&phone=$phone&company=$company&country=$country&city=$city&00N0X00000CrHzi=$product&00N0X00000AlPaB=$type&00N0X00000AlPaA=$size&00N0X00000AlPaC=$quantity&00N0X00000AlPa9=$message";
// setcookie("vars", $myvars);
$_SESSION["vars"] = $myvars;
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

// $url = 'https://test.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8';
// $url = 'https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8';
$url = 'https://go.pardot.com/l/821023/2020-06-02/8qk1';
// $myvars = "oid=00D1l0000000ia7&retURL=https%3A%2F%2Fsstc.com.es%2F&debug=1&debugEmail=gportela%40silverseacontainers.com&first_name=Cosme&last_name=Fulanito&email=elmail%40nuevo.email&phone=1234567890&company=THE+company&country=here&city=exactly+here&00N0X00000CrHzi=20FR+CW&00N0X00000AlPaB=container&00N0X00000AlPaA=big&00N0X00000AlPaC=22&00N0X00000AlPa9=yet+another+test";
$myvars = "oid=00D1l0000000ia7&retURL=https%3A%2F%2Fsstc.com.es%2F&debug=1&debugEmail=gportela%40silverseacontainers.com&first_name=Cosme&last_name=Fulanito&email=elmail%40nuevo.email&phone=1234567890&company=THE+company&country=here&city=exactly+here&00N0X00000CrHzi=20FR+CW&00N0X00000AlPaB=container&00N0X00000AlPaA=big&00N0X00000AlPaC=22&00N0X00000AlPa9=yet+another+test&00N1x000003yrzM=1&00N0X00000CrQFZ=1&00N1x000003yrOa=25000";

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
?>

<div style="">
<!-- <div style="opacity:0"> -->
<?php var_dump($response); ?>
</div>


</body>
</html>