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
      
      
      
      let product = cartToLeads.shift();
      // console.log('send '+product.qty+' product: ', product.code)
      
  
      info.code     = product.code;
      info.type     = product.tipo_2;
      info.size     = product.size;
      info.quantity = product.qty;
      
      if(cartToLeads.length!=0){
        createCookie('cartToLeads', JSON.stringify(cartToLeads));
        // createCookie('info', JSON.stringify(info));
        createCookie('lastLead', 'waiting');
      } else {
        createCookie('lastLead', 'sent');
      }
      console.log(info)
      createCookie('leadsSent', parseInt(readCookie('leadsSent')) + 1)
      newLead(info);
    }





  </script>

  <style>
    .load{
      background: white;
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

<script src="js/custom.js"></script>
<script>
  // createCookie('status', 'success')
  // console.log(JSON.parse(readCookie('cartToLeads')))
</script>
</body>
</html>