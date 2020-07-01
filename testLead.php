<?php

// 	$first_name = 'Test NAme';
// 	$last_name  = 'And Last Name';


// 	$url = 'https://go.pardot.com/l/821023/2020-06-02/8qk1';
// 	$data = array(
// 		'oid'             => '00D1l0000000ia7',
// 		'retURL'          => 'https://sstc.com.es/',
// 		'debug'           => '1',
// 		'debugEmail'      => 'gportela@silverseacontainers.com',
// 		'first_name'      => $first_name,
// 		'last_name'       => $last_name,
// 		'email'           => 'email@test.fake',
// 		'phone'           => '0800 666 696969',
// 		'company'         => 'test company',
// 		'country'         => 'my country',
// 		'city'            => 'a city',
// 		'00N0X00000CrHzi' => 'the product code',
// 		'00N0X00000AlPaB' => 'product type',
// 		'00N0X00000AlPaA' => 'product size',
// 		'00N0X00000AlPaC' => 'product quantity',
// 		'00N0X00000AlPa9' => 'el mensajeeeee',
// 	);

// 	// use key 'http' even if you send the request to https://...
// 	$options = array(
// 		'http' => array(
// 			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
// 			'method'  => 'POST',
// 			'content' => http_build_query($data)
// 		)
// 	);
// 	$context  = stream_context_create($options);
// 	$result = file_get_contents($url, false, $context);
// if ($result === FALSE) { /* Handle error */ }

// var_dump($result);
// if($debugMode){echo wp_json_encode($respuesta);}


// echo '<h1>HOla mundo</h1>';


// $oid        = $_POST['oid'];
// $retURL     = $_POST['retURL'];
// $debug      = $_POST['debug'];
// $debugEmail = $_POST['debugEmail'];
// $first_name = $_POST['first_name'];
// $last_name  = $_POST['last_name'];
// $email      = $_POST['email'];
// $phone      = $_POST['phone'];
// $company    = $_POST['company'];
// $country    = $_POST['country'];
// $city       = $_POST['city'];
// $product    = $_POST['00N0X00000CrHzi'];
// $type       = $_POST['00N0X00000AlPaB'];
// $size       = $_POST['00N0X00000AlPaA'];
// $quantity   = $_POST['00N0X00000AlPaC'];
// $message    = $_POST['00N0X00000AlPa9'];

$oid        = '00D1l0000000ia7';
$retURL     = 'https%3A%2F%2Fsstc.com.es%2F';
$debug      = '1';
$debugEmail = 'testtter%40aaallll.com';
$first_name = 'Test de Julio';
$last_name  = 'Testsonaaaaa';
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



$url = 'https://go.pardot.com/l/821023/2020-06-02/8qk1';
// $myvars = "oid=00D1l0000000ia7&retURL=https%3A%2F%2Fsstc.com.es%2F&debug=1&debugEmail=gportela%40silverseacontainers.com&first_name=Cosme&last_name=Fulanito&email=elmail%40nuevo.email&phone=1234567890&company=THE+company&country=here&city=exactly+here&00N0X00000CrHzi=20FR+CW&00N0X00000AlPaB=container&00N0X00000AlPaA=big&00N0X00000AlPaC=22&00N0X00000AlPa9=yet+another+test";
$myvars = "oid=$oid&retURL=$retURL&debug=$debug&debugEmail=$debugEmail&first_name=$first_name&last_name=$last_name&email=$email&phone=$phone&company=$company&country=$country&city=$city&00N0X00000CrHzi=$product&00N0X00000AlPaB=$type&00N0X00000AlPaA=$size&00N0X00000AlPaC=$quantity&00N0X00000AlPa9=$message";

// $myvars = "
// oid=$oid
// &
// retURL=$retURL
// &
// first_name=$first_name
// &
// last_name=$last_name
// &
// email=$email
// &
// phone=$phone
// &
// company=$company
// &
// country=$country
// &
// city=$city
// &
// 00N0X00000CrHzi=$product
// &
// 00N0X00000AlPaB=$type
// &
// 00N0X00000AlPaA=$size
// &
// 00N0X00000AlPaC=$quantity
// &
// 00N0X00000AlPa9=$message
// ";

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );

var_dump($response);

?>

<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	</head>
	<body>
		<form id="postform" name="postform" action="https://test.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="post" style="display: none;">
            <p><input type="hidden" name="oid" value="00D1l0000000ia7" /></p>
            <p><input type="hidden" name="retURL" value="https://sstc.com.es/" /></p>
            <p><input type="hidden" name="debug" value="1" /></p>
            <p><input type="hidden" name="debugEmail" value="Tester@rover.com" /></p>
            <p><input type="hidden" name="first_name" value="Tester" /></p>
            <p><input type="hidden" name="last_name" value="rover" /></p>
            <p><input type="hidden" name="email" value="elmail@nuevo.email" /></p>
            <p><input type="hidden" name="phone" value="1234567890" /></p>
            <p><input type="hidden" name="company" value="THE company" /></p>
            <p><input type="hidden" name="country" value="here" /></p>
            <p><input type="hidden" name="city" value="exactly here" /></p>
            <p><input type="hidden" name="00N0X00000CrHzi" value="20FR CW" /></p>
            <p><input type="hidden" name="00N0X00000AlPaB" value="container" /></p>
            <p><input type="hidden" name="00N0X00000AlPaA" value="big" /></p>
            <p><input type="hidden" name="00N0X00000AlPaC" value="22" /></p>
            <p><input type="hidden" name="00N0X00000AlPa9" value="yet another test" /></p>
        </form>
		<script type="text/javascript">
            document.postform.submit();
		</script>
	</body>
</html> -->