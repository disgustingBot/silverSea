d=document;w=window;c=console;
String.prototype.capitalize=function(){return this.charAt(0).toUpperCase()+this.slice(1);}

// color console
c.lof = (message, farbe = false)=>{
	if(farbe){c.log("%c" + message, "color:" + farbe);}
	else{c.log(message)}
};


w.onload=()=>{
	// LAZY LOAD FUNCTIONS MODULE
	var lBs=[].slice.call(d.querySelectorAll(".lazy-background")),lIs=[].slice.call(d.querySelectorAll(".lazy")),opt={threshold:.01};
	if("IntersectionObserver" in window){
	let lBO=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting){let l=e.target;l.classList.add("visible");lBO.unobserve(l)}})},opt),
		lIO=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting){let l=e.target;l.classList.remove("lazy");lIO.unobserve(l);l.srcset=l.dataset.url}})},opt);
	lIs.forEach(lI=>{lIO.observe(lI)});lBs.forEach(lB=>{lBO.observe(lB)});
	}

	cartController.setup();

	carouselController.setup()
	growUpController.setup()
	obseController.setup()
	cuantosController.setup();
	selectBoxSpace.poblate();
	startMateput();
	cardSetup();


	if (d.getElementById("load")) {
		d.getElementById("load").style.top="-100vh";
	}
	scrollAlter();
}
// console.log(lt_data.ajaxurl)


// deprecated
function postAjaxCall(url,dataNames,dataValues){// return a new promise.
	return new Promise((resolve,reject)=>{// do the usual XHR stuff
		var req=new XMLHttpRequest();
		req.open('post',url);
		//NOW WE TELL THE SERVER WHAT FORMAT OF POST REQUEST WE ARE MAKING
		req.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		req.onload =()=>{if(req.status>=200&&req.status<300){resolve(req.response)}else{reject(Error(req.statusText));console.log("ERROR")}}
		req.onerror=()=>{reject(Error("Network Error"))}// handle network errors
		// prepare the data to be sent
		let data;
		for(var i=0;i<dataNames.length;i++){data=data+"&"+dataNames[i]+"="+dataValues[i]}
		// make the request
    req.send(data)
	})
}














// alternates a class from a selector of choice, example:
// <div class="someButton" onclick="altClassFromSelector('activ', '#navBar')"></div>
const altClassFromSelector = ( clase, selector, mainClass = false )=>{
	const x = d.querySelector(selector);
	// if there is a main class removes all other classes
	if(mainClass){
		x.classList.forEach( item=>{
			// TODO: testear si anda con el nuevo condicional
			if( item!=mainClass && item!=clase ){
			x.classList.remove(item);
			}
		});
	}

	if(x.classList.contains(clase)){
		x.classList.remove(clase)
	}else{
		x.classList.add(clase)
	}
}



















// SELECT BOX CONTROLER
// TODO: mejorar eso a clases y POO
const selectBoxControler=(a, selectBoxId, current)=>{ // c.log(a)
	if(!!a){d.querySelector(selectBoxId).classList.add('alt')}
	else   {d.querySelector(selectBoxId).classList.remove('alt')}

	d.querySelector(current).innerHTML=a;
	d.querySelector(selectBoxId).classList.remove('focus')
	d.activeElement.blur();
}

// ACCORDION SELECTOR CONTROLLER
const accordionSelector = (selector) => {
	var acc = d.querySelectorAll(selector);

	acc.forEach((item, i) => {
		item.classList.toggle("active");
		// var panel = this.nextElementSibling;
		if (item.style.maxHeight!=0) {
			item.style.maxHeight = null;
			// item.style.maxHeight = null;
		} else {
			item.style.maxHeight = item.scrollHeight + 20 + "px";
		}
	});
}




// GO BACK BUTTONS
function goBack(){w.history.back()}









// mateput controller
// TODO: mejorar esto a clases y POO
const startMateput = () =>{
	const updateRequired=e=>{if(e.value==''){e.classList.remove('alt')}else{e.classList.add('alt')}}
	if(d.querySelectorAll('.mateputInput')){
		mateput=d.querySelectorAll('.mateputInput');
		mateput.forEach(e=>{
			updateRequired(e);
			e.addEventListener('input',()=>{updateRequired(e)});
		});
	}
}




//Accordion //Desplegable
var acc = d.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
	acc[i].addEventListener("click",()=>{
		this.classList.toggle("active");
		// TODO: Hacer que se puede elegir el elemento a acordionar
		var panel = this.nextElementSibling;
		if (panel.style.maxHeight) {
			panel.style.maxHeight = null;
			panel.style.padding = "0";
		} else {
			panel.style.maxHeight = panel.scrollHeight + "px";
			panel.style.padding = "20px";
		}
	});
}














function scrollAlter(){
	if (d.querySelector('#teamCardsContainer')) {
		d.querySelector('#teamCardsContainer').onwheel = (e) => {
			d.querySelector('#teamCardsContainer').scrollLeft += e.deltaY;
			e.preventDefault();
		};
	}
}




// URL HANDLING
const setUrlVar = ( variable, value = '' ) => {
	var filterQueries = new Array();
	// urlVirg es la url sin variables
	var urlVirg = w.location.href.split('?')[0];
	// urlVars será el vector de variables en la url
	// var urlVars = w.location.href.split('?');
	// urlVars.shift();
	// urlVars = !urlVars[0] ? [] : urlVars.join().split('&');

	var urlVars = getUrlVars();

	var variables = urlVars.map( x => x.split('=')[0] );
	var values  = urlVars.map( x => x.split('=')[1] );

	// c.log(page)


	if(variable){
		if(variables.includes(variable)){
			let j=0;
			urlVars.forEach((item, i) => {
				if ( variables[i] == variable ) {
					// si la categoria es 0 quita el filtro
					if (value != '') { filterQueries[j] = variable + '=' + value; j+=1; }
				} else { filterQueries[j] = item; j+=1; }
			});
		} else if (value != '') {
			urlVars.forEach((item, i) => {
				filterQueries[i] = item;
			});
			filterQueries.push(variable + '=' + value);
		}
	}
	let conector = filterQueries.length != 0 ? '?' : '';
	w.history.replaceState('', 'Title', urlVirg + conector + filterQueries.join('&'));
	// c.log(filterQueries)
	return filterQueries;
}

const getUrlVars = () => {
	var urlVars = w.location.href.split('?');
	urlVars.shift();
	urlVars = !urlVars[0] ? [] : urlVars.join().split('&');

	return urlVars;
}
// END OF URL HANDLING






productSincrotron = {
	qnty:0,
	toDelete:0,
	deleted:0,
	products: [],
	created:[],
	temp:[],
	wipeProducts:(del = false, cantidad = 1)=>{
		d.querySelector('.updateText').innerHTML = "Eliminando productos viejos, esto puede tardar unos minutos, por favor no abandone la pagina";
		let formData = new FormData();
		if(del){formData.append('delete', 'true');
		}else  {formData.append('delete', 'false');}
		formData.append('cantidad', cantidad);
		formData.append('action', 'lt_wipe_products');
		console.log('Dale, eliminá clia');
		ajax2(formData).then(data => {
			console.log(data);
			if(data.toDelete>0){productSincrotron.toDelete=data.toDelete;}
			if(data.qnty>0){
				let porcentage = productSincrotron.deleted * 100 / productSincrotron.toDelete;
				d.querySelector('.loadBarProgress').style.width = porcentage + '%';

				productSincrotron.deleted += cantidad;
				productSincrotron.wipeProducts(true, cantidad);
			} else {
				// productSincrotron.wipeProducts();
				// let porcentage = productSincrotron.created.length * 100 / productSincrotron.qnty;
				// d.querySelector('.loadBarProgress').style.width = porcentage + '%';

				d.querySelector('.loadBarProgress').style.width = '100%';
				d.querySelector('.updateText').innerHTML = "Todos los productos eliminados";
				setTimeout(1000, productSincrotron.productFabrik());
			}
		})
	},
	productFabrik:()=>{
		d.querySelector('.loadBarProgress').style.width = '0%';
		d.querySelector('.updateText').innerHTML = "Creando productos, esto puede tardar unos minutos, por favor no abandone la pagina";
		// productSincrotron.products = [{sku: "6DC CW",Description:''}]
		// productSincrotron.products.unshift({sku: "6DC CW",Description:''});
		// console.log('cantidad de productos a crear: ', productSincrotron.products.length);
		for (var i = 0; i < 1; i++) {
			// productSincrotron.temp.unshift(productSincrotron.products.shift(productSincrotron.products[i]));
			let productoZero = productSincrotron.products.splice(0, 1);
			productoZero[0].imagenes = productoZero[0].imagenes.split(', ');
			console.log('temp imagenes:')
			console.log(productoZero[0].imagenes);
			productSincrotron.temp.unshift(productoZero[0]);
		}


// var names = '20FRCW_1, 2ODCCW_1';
// var nameArr = names.split(', ');
// console.log(nameArr);



		console.log('envio a fabricar:')
		console.log(productSincrotron.temp);
		let formData = new FormData();
		formData.append('products', JSON.stringify(productSincrotron.temp));
		formData.append('action', 'lt_create_products');
		// console.log('enviando '+productSincrotron.temp.length+' producto/s para crear');
		ajax2(formData).then(data => {
			// console.log('largo del vector temp: ', productSincrotron.temp.length);
			for (var i = 0; i < productSincrotron.temp.length; i++) {
				productSincrotron.created.unshift(productSincrotron.temp.splice(0, 1));
			}
			// console.log(data);
			// console.log('products created: ', productSincrotron.created.length)
			if (productSincrotron.created.length<productSincrotron.qnty) {
			// if (productSincrotron.created.length<3) {
				productSincrotron.productFabrik();
			} else {
				d.querySelector('.updateText').innerHTML = "Productos creados!!";
			}
			let porcentage = productSincrotron.created.length * 100 / productSincrotron.qnty;
			d.querySelector('.loadBarProgress').style.width = porcentage + '%';
		})
	}
}


const lt_upload_file = () => {
	const controller = d.querySelector('.updateController'),
	file = controller.querySelector('[type=file]');
	var formData = new FormData();
	console.clear();
	console.log('subiendo archivo con ajax');
	formData.append('file', file.files[0]);
	formData.append('action', 'lt_upload_file');

	altClassFromSelector('loading', '#updateController', 'updateController')
	ajax2(formData).then(data => {
		console.log(data)
		altClassFromSelector('loaded', '#updateController', 'updateController');
		d.querySelector('.updateText').innerHTML = 'Tabla actualizada!.';
		d.querySelector('.loadBarProgress').style.width = '100%';
		console.log('archivo subido, base de datos actualizada');
		productSincrotron.products = data;
		productSincrotron.qnty = productSincrotron.products.length;
		if(!data.gate0){
			productSincrotron.wipeProducts();
		}
	});
}
// {mode: 'cors'}
async function ajax2(formData, url = lt_data.ajaxurl) {
	try{
		let response = await fetch(url, {
			method: 'POST',
			body: formData,
			mode: 'no-cors',
		});
		return await response.json();
	}catch(err){
		console.error(err);
	}
}

async function ajax3(formData, url = lt_data.ajaxurl) {
	try{
		let response = await fetch(url, {
			method: 'POST',
			body: formData,
		});
	// return await response.json();
		return await response.text();
	}catch(err){
		console.error(err);
	}
}

















//
// // Create the XHR object.
// function createCORSRequest(method, url) {
//   var xhr = new XMLHttpRequest();
//   if ("withCredentials" in xhr) {
//     // XHR for Chrome/Firefox/Opera/Safari.
//     xhr.open(method, url, true);
//   } else if (typeof XDomainRequest != "undefined") {
//     // XDomainRequest for IE.
//     xhr = new XDomainRequest();
//     xhr.open(method, url);
//   } else {
//     // CORS not supported.
//     xhr = null;
//   }
//   return xhr;
// }
//
// // Helper method to parse the title tag from the response.
// function getTitle(text) {
//   return text.match('<title>(.*)?</title>')[1];
// }
//
// // Make the actual CORS request.
// function makeCorsRequest() {
//   // This is a sample server that supports CORS.
//   var url = 'http://html5rocks-cors.s3-website-us-east-1.amazonaws.com/index.html';
//
//   var xhr = createCORSRequest('GET', url);
//   if (!xhr) {
//     alert('CORS not supported');
//     return;
//   }
//
//   // Response handlers.
//   xhr.onload = function() {
//     var text = xhr.responseText;
//     var title = getTitle(text);
//     alert('Response from CORS request to ' + url + ': ' + title);
//   };
//
//   xhr.onerror = function() {
//     alert('Woops, there was an error making the request.');
//   };
//
//   xhr.send();
// }
//
//
// var url = 'https://go.pardot.com/l/821023/2020-06-02/8qk1';
// var xhr = createCORSRequest('GET', url);
// console.log(xhr.send());










// COOKIES HANDLING

function createCookie(n,value,days){if(days){var date=new Date();date.setTime(date.getTime()+(days*24*60*60*1000));var expires="; expires="+date.toUTCString();}else var expires="";d.cookie=n+"="+value+expires+"; path=/";}
// function readCookie  (n){var m=n+"=",a=d.cookie.split(';');for(var i=0;i<a.length;i++){var c=a[i];while(c.charAt(0)==' ')c=c.substring(1,c.length);if(c.indexOf(m)==0)return c.substring(m.length,c.length);}return null;}
function readCookie  (n){var m=n+"=",a=d.cookie.split(';');for(var i=0;i<a.length;i++){var c=a[i];while(c.charAt(0)==' ')c=c.substring(1,c.length);if(c.indexOf(m)==0)return c.substring(m.length,c.length);}}
function eraseCookie (n){createCookie(n,"",-1)}


// TODO: pasar todo a minuscula... como no se me ocurrio antes???!?!?
// CART CONTROLLER
cartController = {
	setup:()=>{
		if (d.querySelector('#cotizador')) {
			cartController.ready(false);
			cartController.getCol('Size');
		}
		cartController.getLocation();
		// cartController.getLocation(false, 'Destino');

		// cartController.cart = JSON.parse(readCookie('cart'));
		// cartController.cart = JSON.parse(readCookie('cart'));
		if(readCookie('cart')){
			JSON.parse(readCookie('cart')).forEach((item, i) => {
				cartController.cart.unshift(new CartItem(item));
				cartController.cart[0].cartUI();

			});
		}

		if (cartController.cart.length<2) {
			d.querySelectorAll('.cartButtonUse').forEach((item, i) => {
				item.setAttribute('xlink:href', '#simpleTruck');
			});
		}else{
			d.querySelectorAll('.cartButtonUse').forEach((item, i) => {
				item.setAttribute('xlink:href', '#doubleTruck');
			});
		}

		// console.log('la concha de la EXPLORAR')
	},
	currentSemiSelection: {code: false, qty: 1, size: false, tipo_1: false, tipo_2: false, condicion: false, singlePrice: 0},
	containerToAdd:false,
	cart: [],
	locationOrigen:[],
	locationDestino:[],
	getLocation: ( country = false, option = 'Origen' ) => {
		var formData = new FormData();
		formData.append( 'action', 'lt_get_location' );
		if (country) {
			if(option=='Origen'){cartController.locationOrigen['country'] = country;
			}else{cartController.locationDestino['country'] = country;}
			cartController.selectBoxWipe(option+'City');
			formData.append( 'country', country );
			formData.append( 'column', 'city' );
		}else{
			formData.append( 'column', 'country' );
		}
		// console.log(formData);
		ajax2(formData).then( data => {
			// console.log(data)

			JSON.parse(data.location).forEach( e => {
				for(var key in e) {
					var value = e[key].replace(/(?:\r\n|\r|\n)/g, '');
					key = option + key.capitalize();
					// console.log(key);
					// console.log(d.querySelector('#selectBox'+key+' .selectBoxList'))
					var a = cartController.selectBoxOption(key,value),
					input = a.querySelector(".selectBoxInput");
					input.setAttribute('type', 'radio');
					if (country) {
						if(option=='Origen'){functionExecute = "cartController.locationOrigen['city'] = value;console.log(cartController.locationOrigen);";
						}else{functionExecute = "cartController.locationDestino['city'] = value;console.log(cartController.locationDestino);";}
					}else{functionExecute = 'cartController.getLocation("'+value+'", "'+option+'")';}
					input.setAttribute("onchange", functionExecute);
					d.querySelector('#selectBox'+key+' .selectBoxList').insertBefore(a, null);
				}
			});
		})
	},


	finish:()=>{
		console.log('carrito antes de la transforrmacion', cartController.cart)
		cartController.cart.forEach((item, i) => {
			// cartController.getPrice(item.code);
			// console.log(item);

			var formData = new FormData();
			formData.append( 'action', 'lt_cart_end' );
			formData.append( 'cont', item.code );
			formData.append( 'country', cartController.locationOrigen['country'] );
			formData.append( 'city', cartController.locationOrigen['city'] );
			// console.log('formData');
			
			// Display the key/value pairs
			// for (var pair of formData.entries()) {
			// 	console.log(pair[0]+ ', ' + pair[1]); 
			// }
			ajax2(formData).then( data => {
				console.log(data)
				let singlePrice, currency;
				
				cartItem = d.querySelector('.cartItem[data-code="'+item.code+'"]');
				itemQty = cartItem.querySelector('.cartItemQty').innerText;
				itemPrice = cartItem.querySelector('.cartItemPriceNumber');
				itemCurrency = cartItem.querySelector('.cartItemCurrency');

				if (data[0]) {
					currency = data[0].currency;

					if (data[0].fixed_price!=0) {
						singlePrice = parseFloat(data[0].fixed_price)
					}else if(data[0].sale_price!=0){
						singlePrice = parseFloat(data[0].sale_price - 300)
					}else if(!data[1]){
						singlePrice = parseFloat(data[0].supplier_price)
					}else{
						let prices = data.map( x => x.supplier_price );
						let pricesSort = prices.sort((a,b) => a - b).slice(0, 2);
						let average = (parseInt(pricesSort[0]) + parseInt(pricesSort[1])) / 2;
						singlePrice = average + 200;
					}
					totalPrice = singlePrice * parseInt(itemQty);

				} else {
					currency = '';
					singlePrice = 0;
					totalPrice = 'NaN';
				}
				
				// const check = (element) => {
				// 	return element.code == x.code;
				// }
				// // if (cartController.cart.find(check)) {
				// let index = cartController.cart.findIndex(check)
				// cartController.cart[index].setQty(parseInt(cartController.cart[index].qty) + parseInt(x.qty));
				cartController.cart[i].setPrice(singlePrice);
				nuevoElemento = new CartItem(cartController.cart[i].values)
				cartController.cart[i] = nuevoElemento;
				// console.log('El NUEVO ELEMENTO!!!',new CartItem(cartController.cart[i].values))
				// console.log(cartController.cart[i]);
				if (i==cartController.cart.length - 1){

					console.log('CARRITO luego de la transformacion', cartController.cart)
					cartController.sendMail();
				}
				// d.querySelector('.cartItem[data-code="'+x.code+'"] .cartItemQty').innerText = parseInt(d.querySelector('.cartItem[data-code="'+x.code+'"] .cartItemQty').innerText) + parseInt(x.qty);
				// }



				itemCurrency.innerText = currency
				itemPrice.innerText = totalPrice;
			})
		});
		altClassFromSelector('alt', '#finalizarConsulta')
		d.querySelector('#cart').classList.add('alt')
		// console.log('send Mail')
		// console.log(cartController.cart)



		// cartController.sendMail(falsoCarrito);
		// let info = {
		// 	fname:   'Fake',
		// 	lname:   'Name',
		// 	email:   'email@test.fake',
		// 	phone:   '0800 666 696969',
		// 	company: 'test company',
		// 	country: 'my country',
		// 	city:    'a city',
		// 	code:    'the product code',
		// 	type:    'product type',
		// 	size:    'product size',
		// 	quantity:'product quantity',
		// 	message: 'el mensajeeeee',
		// }
		// cartController.newLead(info);
	},


	sendMail:(cart)=>{
		// console.log(cart)
		// cart[0].toJSON="I won't allow you to use sails toJSON, just use the native stringification";
		// console.log(JSON.stringify(cart))
		var formData = new FormData();
		formData.append( 'action', 'lt_ajax_mail' );
		formData.append( 'cont', JSON.stringify(cartController.cart) );
		formData.append( 'country', cartController.locationOrigen['country'] );
		formData.append( 'city', cartController.locationOrigen['city'] );
		formData.append( 'name', d.querySelector('#mateputNombre').value );
		formData.append( 'phone', d.querySelector('#mateputTelefono').value );
		formData.append( 'mail', d.querySelector('#mateputEmail').value );


		ajax2(formData).then( data => {
			console.log(data);
		});
	},


	newLead:(info)=>{
		let oid = '00D1l0000000ia7',
		retURL  = 'https://silverseacontainers.com/',
		debug   = 1,
		debugEmail = 'gportela@silverseacontainers.com',
		first_name = info.fname,
		last_name  = info.lname,
		email      = info.email,
		phone      = info.phone,
		company    = info.company,
		country    = info.country,
		city       = info.city,
		product    = info.code,
		type       = info.type,
		size       = info.size,
		quantity   = info.quantity,
		message    = info.message;

		var formData = new FormData();
		formData.append( 'action', 'lt_new_lead' );
		formData.append( 'oid', oid );
		formData.append( 'retURL'    , retURL );
		formData.append( 'debug'     , debug );
		formData.append( 'debugEmail', debugEmail );
		formData.append( 'first_name', first_name );
		formData.append( 'last_name', last_name );
		formData.append( 'email', email );
		formData.append( 'phone', phone );
		formData.append( 'company', company );
		formData.append( 'country', country );
		formData.append( 'city', city );
		formData.append( '00N0X00000CrHzi', product );
		formData.append( '00N0X00000AlPaB', type );
		formData.append( '00N0X00000AlPaA', size );
		formData.append( '00N0X00000AlPaC', quantity );
		formData.append( '00N0X00000AlPa9', message );
		ajax3(formData, 'https://go.pardot.com/l/821023/2020-06-02/8qk1').then( data => {
			console.log(data)
		})
	},
	add: (x) => {
		const check = (element) => {
			return element.code == x.code;
		}
		if (cartController.cart.find(check)) {
			let index = cartController.cart.findIndex(check)
			cartController.cart[index].setQty(parseInt(cartController.cart[index].qty) + parseInt(x.qty));
			d.querySelector('.cartItem[data-code="'+x.code+'"] .cartItemQty').innerText = parseInt(d.querySelector('.cartItem[data-code="'+x.code+'"] .cartItemQty').innerText) + parseInt(x.qty);
		} else {
			cartController.cart.unshift(new CartItem(x));
			cartController.cart[0].cartUI();
			// console.log(cartController.cart)
		}
		if (cartController.cart.length<2) {
			d.querySelectorAll('.cartButtonUse').forEach((item, i) => {
				item.setAttribute('xlink:href', '#simpleTruck');
			});
		}else{
			d.querySelectorAll('.cartButtonUse').forEach((item, i) => {
				item.setAttribute('xlink:href', '#doubleTruck');
			});
		}


		if(d.querySelector('#cotizador')){
			setTimeout(()=>{
				d.querySelector('#currentSemiSelectionSize').setAttribute('xlink:href', '#');
				d.querySelector('#currentSemiSelectionTip1').setAttribute('xlink:href', '#');
				d.querySelector('#currentSemiSelectionTip2').setAttribute('xlink:href', '#');
				d.querySelector('#currentSemiSelectionCond').setAttribute('xlink:href', '#');
			}, 800);
			d.querySelector('#currentSemiSelection').classList.remove('size');
			d.querySelector('#currentSemiSelection').classList.remove('tip1');
			d.querySelector('#currentSemiSelection').classList.remove('tip2');
			d.querySelector('#currentSemiSelection').classList.remove('cond');
		}
		// console.log(cartController.cart);
		createCookie('cart', JSON.stringify(cartController.cart));

	},
	remove:(code)=>{
		console.log(code)
		list = d.querySelector('.cartList');
		list.removeChild(list.querySelector('.cartItem[data-code="'+code+'"]'));

		const check = (element) => {
			return element.code == code;
		}
		cartController.cart.splice(cartController.cart.findIndex(check), 1)
		if (cartController.cart.length<2) {
			d.querySelectorAll('.cartButtonUse').forEach((item, i) => {
				item.setAttribute('xlink:href', '#simpleTruck');
			});
		}else{
			d.querySelectorAll('.cartButtonUse').forEach((item, i) => {
				item.setAttribute('xlink:href', '#doubleTruck');
			});
		}
		createCookie('cart', JSON.stringify(cartController.cart));
	},
	ready:(ready = true)=>{
		let selector = d.querySelector('#dynamicCont1'),btn=d.querySelector('#dynamicCont1 .btn');
		if (ready) {
			btn.disabled = false;
			selector.classList.add('ready')
		} else {
			btn.disabled = true;
			selector.classList.remove('ready')
		}
	},

	changeQuantity:(value)=>{
		let quantity = parseInt(d.querySelector('#addToCartQantity').value);
		quantity += value;
		if (quantity<=1) {
			quantity = 1;
		}
		cartController.currentSemiSelection.qty = quantity;
		d.querySelector('#addToCartQantity').value   = quantity;
	},

	selectBoxOption:(key, value = '')=>{

		let a  = d.importNode(d.querySelector("#selectBoxOptionTemplate").content, true),
		option = a.querySelector(".selectBoxOption"),
		input  = a.querySelector(".selectBoxInput"),
		label  = a.querySelector(".selectBoxOptionLabel");
		if(value == 'nul'){
			option.setAttribute('for', 'nul'+key);
			input.setAttribute ('id' , 'nul'+key);
			input.setAttribute('value', 0);
		} else {
			option.setAttribute('for', key+value);
			input.setAttribute ('id' , key+value);
			input.setAttribute('value', value);
		}
		label.textContent = value;
		input.setAttribute('name', key);
		input.setAttribute("onclick", 'selectBoxControler("'+value+'", "#selectBox'+key+'", "#selectBoxCurrent'+key+'")');

		return a;
	},

	selectBoxWipe:(nombre, comptleteWipe = false)=>{
		list = d.querySelector('#selectBox'+nombre+' .selectBoxList');
		selectBoxControler('', '#selectBox'+nombre, '#selectBoxCurrent'+nombre);
		if (list.firstChild) {
			while (list.firstChild) {
			list.removeChild(list.firstChild);
			}
		}
		if(!comptleteWipe){
			list.appendChild(cartController.selectBoxOption(nombre));
		}
	},

	sizeController: (value)=>{
		// PRIMERO VACIAR EL/LOS SELECT
		cartController.selectBoxWipe('Tipo_1');
		cartController.selectBoxWipe('Tipo_2');
		cartController.selectBoxWipe('Condicion');
		cartController.currentSemiSelection.tipo_1 = false;
		cartController.currentSemiSelection.tipo_2 = false;
		cartController.currentSemiSelection.condicion = false;

		d.querySelector('#currentSemiSelectionSize').setAttribute('xlink:href', '#' + value + '-pies');
		d.querySelector('#currentSemiSelectionTip1').setAttribute('xlink:href', '#');
		d.querySelector('#currentSemiSelectionTip2').setAttribute('xlink:href', '#');
		d.querySelector('#currentSemiSelectionCond').setAttribute('xlink:href', '#');
		d.querySelector('#currentSemiSelection').classList.add('size');
		d.querySelector('#currentSemiSelection').classList.remove('tip1');
		d.querySelector('#currentSemiSelection').classList.remove('tip2');
		d.querySelector('#currentSemiSelection').classList.remove('cond');
		// console.log('value: ', value);

		cartController.ready(false);
		cartController.currentSemiSelection.size = value;
		cartController.getCol('tipo_1', value);
	},

	tipo1Controller: (value)=>{
		// PRIMERO VACIAR EL SELECT
		cartController.selectBoxWipe('Tipo_2');
		cartController.selectBoxWipe('Condicion');
		cartController.currentSemiSelection.tipo_2 = false;
		cartController.currentSemiSelection.condicion = false;

		// d.querySelector('#dynamicContLogo').setAttribute('xlink:href', '#' + value);
		// d.querySelector('#currentSemiSelectionSize').setAttribute('xlink:href', '#' + value + '-pies');
		d.querySelector('#currentSemiSelectionTip1').setAttribute('xlink:href', '#' + value);
		d.querySelector('#currentSemiSelectionTip2').setAttribute('xlink:href', '#');
		d.querySelector('#currentSemiSelectionCond').setAttribute('xlink:href', '#');
		d.querySelector('#currentSemiSelection').classList.add('tip1');
		d.querySelector('#currentSemiSelection').classList.remove('tip2');
		d.querySelector('#currentSemiSelection').classList.remove('cond');

		cartController.ready(false);
		cartController.currentSemiSelection.tipo_1 = value;
		cartController.getCol('tipo_2', cartController.currentSemiSelection.size, value);
	},

	tipo2Controller: (value)=>{
		// PRIMERO VACIAR EL SELECT
		cartController.selectBoxWipe('Condicion');
		cartController.currentSemiSelection.condicion = false;


		cartController.ready(false);
		cartController.currentSemiSelection.tipo_2 = value;
		cartController.getCol('condicion', cartController.currentSemiSelection.size, cartController.currentSemiSelection.tipo_1, value);
		// cartController.getCol('tipo_2', cartController.currentSemiSelection.tipo_2, value);
		value = value.replace(/\s/g, '');
		// d.querySelector('#dynamicContLogo').setAttribute('xlink:href', '#' + value);
		// d.querySelector('#currentSemiSelectionTip1').setAttribute('xlink:href', '#' + value);
		d.querySelector('#currentSemiSelectionTip2').setAttribute('xlink:href', '#' + value);
		d.querySelector('#currentSemiSelectionCond').setAttribute('xlink:href', '#');
		d.querySelector('#currentSemiSelection').classList.add('tip2');
		d.querySelector('#currentSemiSelection').classList.remove('cond');
	},

	condicionController: (value)=>{
		// console.log(value)
		// console.log(document.getElementsByName('Condicion')[0].value)
		// if (cartController.currentSemiSelection.condicion) {
		//
		// }
		// PRIMERO VACIAR EL SELECT
		// console.log('value: ', value);
		const check = (element) => {
			return element.condicion == value;
		}
		cartController.currentSemiSelection.code = cartController.currentSemiSelection.condicion.find(check).salesforce_id;
		cartController.containerToAdd = cartController.currentSemiSelection;
		cartController.containerToAdd.condicion = value;
		// cartController.currentSemiSelection.condicion = value;
		// console.log('container To Add: ', cartController.containerToAdd)

		cartController.ready();


		value = value.replace(/\s/g, '-');
		// d.querySelector('#dynamicContLogo').setAttribute('xlink:href', '#' + value);
		d.querySelector('#currentSemiSelectionCond').setAttribute('xlink:href', '#' + value.toUpperCase());
		d.querySelector('#currentSemiSelection').classList.add('cond');

		// console.log('value: ', value);
		// cartController.getCol('condicion', cartController.currentSemiSelection.condicion, value);
	},

	getCol: (col, size = false, tipo_1 = false, tipo_2 = false) => {
		let lastCase = (size &&  tipo_1 &&  tipo_2) ? true : false;
		let dataNames = ['action', 'col'],
		dataValues = ['gatCol', col];
		if(size){dataNames.push('size');dataValues.push(size);}
		if(tipo_1){dataNames.push('tipo_1');dataValues.push(tipo_1);}
		if(tipo_2){dataNames.push('tipo_2');dataValues.push(tipo_2);}

		postAjaxCall(lt_data.ajaxurl,dataNames,dataValues).then(v=>{ // console.log(v)
			try{
				if (!lastCase) {
					JSON.parse(v).forEach(e=>{
						for(var key in e) {
							var value = e[key],
							key = key[0].toUpperCase() + key.slice(1);
							// console.log(key);
							// console.log(value);
							var a = cartController.selectBoxOption(key,value),
							input = a.querySelector(".selectBoxInput");

							// if(lastCase){
							// 	input.setAttribute('type', 'checkbox');
							// } else {
							// }
							input.setAttribute('type', 'radio');

							if (JSON.parse(v).length == 1) {
								// TODO: tambien falta preseleccionar la unica opcion cuando hay una sola
								cartController.selectBoxWipe(key, true);

								input.setAttribute("checked", true);
								selectBox = d.querySelector('#selectBox'+key);
								current = d.querySelector('#selectBox'+key+' #selectBoxCurrent'+key);

								d.querySelector('#selectBox'+key+' .selectBoxList').insertBefore(a, null);
								if (value != '') {value = value[0].toUpperCase() + value.slice(1);}

								if(size && !tipo_1 && !tipo_2){
									selectBoxControler(value, '#selectBox'+key, '#selectBoxCurrent'+key)
									cartController.tipo1Controller(value);
								}
								if(size &&  tipo_1 && !tipo_2){
									selectBoxControler(value, '#selectBox'+key, '#selectBoxCurrent'+key)
									cartController.tipo2Controller(value, true);
								}

							} else {

								functionExecute = 'cartController.sizeController("'+value+'")';
								if(size){functionExecute = 'cartController.tipo1Controller("'+value+'")';}
								if(tipo_1){functionExecute = 'cartController.tipo2Controller("'+value+'")';}
								// if(tipo_2){functionExecute = 'console.log("EL NENE ESTA BIEN!!!");cartController.ready()';}
								input.setAttribute("onchange", functionExecute);

								// Insert it into the document in the right place
								d.querySelector('#selectBox'+key+' .selectBoxList').insertBefore(a, null);
							}
						}
					});
				} else {
					cartController.currentSemiSelection.condicion = new Array();
					// cartController.currentSemiSelection.condicion = new Array();
					cartController.selectBoxWipe('Condicion', true);
					// console.log('comienza el ultimo caso')
					JSON.parse(v).forEach(e=>{
						cartController.currentSemiSelection.condicion.push(e);

						var a = cartController.selectBoxOption('Condicion', e.condicion),
						input = a.querySelector(".selectBoxInput");
						input.setAttribute('type', 'radio');
						input.setAttribute('onchange', 'cartController.condicionController("' + e.condicion + '")');

						// if (JSON.parse(v).length == 1) {
							// input.setAttribute("checked", true);
							// cartController.cart.unshift(e.id)
						// }

						// a los found los tendria que mostrar en la UI
						// if (e.condicion == '') {
						// 	cartController.ready()
						// 	cartController.containerToAdd = e.id;
						// }
						// else {
						// if (e.condicion!='' && e.avanzado_2 == '') {
							d.querySelector('#selectBoxCondicion .selectBoxList').insertBefore(a, null);
						// }
						// console.log(e.length)

					});
					// console.log(cartController.currentSemiSelection.condicion)
				}
			} catch(err) {
				console.log(err);
				console.log(v);
			}
		})
	},
}




class CartItem {
	constructor(v){
		// TODO: quitar la propiedad "values" y reemplazar por nueva implementacion
		this.values = v;
		// this.singlePrice = 0;
		// Esta parte define las propiedades del elemento como vienen del objeto v
		for(var k in v){Object.defineProperty(this,k,{enumerable: true,value:v[k],writable: true})}
	}

	setQty(x){
		this.qty = x;
		this.values.qty = x;
	}
	setPrice(x){
		this.singlePrice = x;
		this.values.singlePrice = x;
	}


	cartUI(){
		let cartItemTemplate = d.importNode(d.querySelector("#cartItemTemplate").content, true);
		// console.log(cartItemTemplate);
		let cartItem = cartItemTemplate.querySelector(".cartItem");
		cartItem.setAttribute('data-code', this.code);

		let cartItemQty = cartItemTemplate.querySelector(".cartItemQty");
		let cartItemCode = cartItemTemplate.querySelector(".cartItemCode");

		let cartItemSize = cartItemTemplate.querySelector(".cartItemSize .use");
		let cartItemTip1 = cartItemTemplate.querySelector(".cartItemTip1 .use");
		let cartItemTip2 = cartItemTemplate.querySelector(".cartItemTip2 .use");
		let cartItemCond = cartItemTemplate.querySelector(".cartItemCond .use");

		let close = cartItemTemplate.querySelector(".close");

		cartItemQty.innerText = this.qty;
		cartItemCode.innerText = this.code;
		// cartItemQty.innerText = this.ord;
		cartItemSize.setAttribute('xlink:href', '#' + this.size + '-pies');
		cartItemTip1.setAttribute('xlink:href', '#' + this.tipo_1);
		cartItemTip2.setAttribute('xlink:href', '#' + this.tipo_2);

		cartItemCond.setAttribute('xlink:href', '#' + this.condicion.replace(/\s/g, '-').toUpperCase());

		close.setAttribute('onclick', 'cartController.remove("' + this.code + '")');


    d.querySelector('.cartList').insertBefore(cartItemTemplate, null);
	}
}
