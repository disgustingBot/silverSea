<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <script>
  d=document;w=window;c=console;

  // COOKIES HANDLING
  function createCookie(name,value,days){
    if(days){
      var date=new Date();
      date.setTime(date.getTime()+(days*24*60*60*1000));
      var expires="; expires="+date.toUTCString();
    } else var expires="";
    d.cookie=name+"="+value+expires+"; path=/";
  }
  function readCookie  (n){var m=n+"=",a=d.cookie.split(';');for(var i=0;i<a.length;i++){var c=a[i];while(c.charAt(0)==' ')c=c.substring(1,c.length);if(c.indexOf(m)==0)return c.substring(m.length,c.length);}}
  function eraseCookie (n){createCookie(n,"",-1)}
  </script>

  <style>
  
.load{
  background: var(--grey0);
  display: grid;
  height: 100vh;
  width:  100vw;
  position: fixed;
  top:0;
  left:0;
  transition:.5s;
  z-index: 10000;
}
.circle{
  width:  50px;
  height: 50px;
  border-radius: 50%;
  border-top: 2px solid #0674BB;
  margin: auto;
  animation: wheel 1s infinite;
}
@keyframes wheel{to{transform:rotate(360deg)}}
  
  </style>
</head>
<body>
<view id="load" class="load"><div class="circle"></div></view>


<?php

$url = 'https://test.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8';
// // $url = 'https://go.pardot.com/l/821023/2020-06-02/8qk1';
// $myvars1 = "oid=00D1l0000000ia7&retURL=https%3A%2F%2Fsstc.com.es%2F&debug=1&debugEmail=gportela%40silverseacontainers.com&first_name=Cosme&last_name=Fulanito&email=elmail%40nuevo.email&phone=1234567890&company=THE+company&country=here&city=exactly+here&00N0X00000CrHzi=20FR+CW&00N0X00000AlPaB=container&00N0X00000AlPaA=big&00N0X00000AlPaC=22&00N0X00000AlPa9=yet+another+test";
$myvars = $_SESSION["vars"];

// echo '<br>';
// echo '<br>';
// var_dump($myvars1);
// echo '<br>';
// echo '<br>';
// echo '<br>';
// var_dump($myvars);
// echo '<br>';
// echo '<br>';


$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch ); ?>


<div style="opacity:0">
<?php var_dump($response); ?>
</div>

<script>




    
  const newLead = (info)=>{
		
		// let oid = '00D1l0000000ia7';
		// let retURL  = 'https://silverseacontainers.com/';
		// let debug   = 1;
		// let debugEmail = 'gportela@silverseacontainers.com';
		let first_name = info.fname;
		let last_name  = info.lname;
		let email      = info.email;
		let phone      = info.phone;
		let company    = info.company;
		let country    = info.country;
		let city       = info.city;
		let product    = info.code;
		let type       = info.type;
		let size       = info.size;
		let quantity   = info.quantity;
		let message    = info.message;

		let vars = '?first_name='+first_name+'&last_name='+last_name+'&email='+email+'&phone='+phone+'&company='+company+'&country='+country+'&city='+city+'&product='+product+'&type='+type+'&size='+size+'&quantity='+quantity+'&message='+message;

		let baseURL= 'https://silverseacontainers.com/testLead.php';
		// let baseURL= 'http://localhost/silversea/wp-content/themes/silversea/cookiePractice.php';

		
    let url = baseURL + vars;
    
    window.location.href = url;
		// win2 = window.open(url,'_blank');
		// win2.blur();
		// window.focus();
	}





    if(readCookie('lastLead') == 'sent'){
      createCookie('allLeads', 'success');

    }else {
      let info        = JSON.parse(readCookie('info'))
      cartToLeads = JSON.parse(readCookie('cartToLeads'))
      console.log(info)
      console.log(cartToLeads)
      
      
      
      let product = cartToLeads.shift();
      // console.log('send '+product.qty+' product: ', product.code)
      
  
      info.code     = product.code;
      info.type     = product.tipo_2;
      info.size     = product.size;
      info.quantity = product.qty;
      
      if(cartToLeads.length!=0){
        createCookie('cartToLeads', JSON.stringify(cartToLeads).split(';').join(':'));
        // createCookie('info', JSON.stringify(info));
        createCookie('lastLead', 'waiting');
      } else {
        createCookie('lastLead', 'sent');
      }
      console.log(info)
      createCookie('leadsSent', parseInt(readCookie('leadsSent')) + 1)
      newLead(info);
    }



  // createCookie('status', '<?php // echo $_GET['status'] ?>')
</script>
</body>
</html>