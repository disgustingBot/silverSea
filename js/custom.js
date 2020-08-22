d=document;w=window;c=console;
String.prototype.capitalize=function(){return this.charAt(0).toUpperCase()+this.slice(1);}

// color console
c.lof = (message, farbe = false)=>{
	if(farbe){c.log("%c" + message, "color:" + farbe);}
	else{c.log(message)}
};


// const language_redirect = () =>{
// 	let getUrl = window.location;
// 	current_language = getUrl.pathname.split('/')[1],

// 	let url = getUrl .protocol + "//" + getUrl.host + "/",
// 	allowed_laguages = [ 'es', 'en', 'de' ],
// 	default_language = 'es',
// 	current_language = getUrl.pathname.split('/')[1],
// 	user_language = navigator.language || navigator.userLanguage;
// 	user_language = user_language.substring(0, 2);

// 	let redirect = false;
// 	let vars = '';

// 	if( current_language != default_language ){
// 		redirect = true;
// 		language = default_language;
// 	}



// 	if(redirect){ w.location.replace( url + language + vars ); }


// 	console.log('current language: ', current_language);
// 	console.log('allowed_laguages: ', allowed_laguages);
// 	console.log('default_language: ', default_language);
// 	console.log('user_language: ', user_language);

// }

//
// const language_select = (language) => {
//
// 	createCookie('trp_language', language, 1)
// 	if (language == 'es') language = '';
//
// 	// w.location.replace( lt_data.homeurl + '/' + language );
// }


//
w.onload=()=>{
	// if (readCookie('trp_language')) d.querySelector('#languageScreen').classList.add('hide');
	// language_redirect();

	// LAZY LOAD FUNCTIONS MODULE
	var lBs=[].slice.call(d.querySelectorAll(".lazy-background")),lIs=[].slice.call(d.querySelectorAll(".lazy")),opt={threshold:.01};
	if("IntersectionObserver" in window){
	let lBO=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting){let l=e.target;l.classList.add("visible");lBO.unobserve(l)}})},opt),
		lIO=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting){let l=e.target;l.classList.remove("lazy");lIO.unobserve(l);l.srcset=l.dataset.url}})},opt);
	lIs.forEach(lI=>{lIO.observe(lI)});lBs.forEach(lB=>{lBO.observe(lB)});
	}

	cartController.setup();
	productSelector.setup();
	locationSelector.setup();

	carouselController.setup()
	growUpController.setup()
	obseController.setup()
	cuantosController.setup();
	selectBoxSpace.poblate();
	startMateput();
	cardSetup();

	filterActivate();




	scrollAlter();
	if (d.getElementById("load")) {
		d.getElementById("load").style.top="-100vh";
	}
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
const selectBoxControler=(a, selectBoxId, current)=>{ //c.log(a)
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
		
// let test_product = {
// 	Categoria: "size > 20PIES, Condition > NEW, general > Dry > DC",
// 	Name: "20 PIES",
// 	SKU: "20DC NEW",
// 	Stock: "1",
// 	alto: "2",
// 	ancho: "2",
// 	condition: "NEW",
// 	description: "Contenedores en excelente estado, vinieron con carga desde donde los producimos en Asia y luego quedan vaciados en nuetros depositos. Son aptos para carga, modificarlos para casa u oficina o para almancenaje. A todo lo que te da un contenedor usado se le suma a estos la estetica como el punto mas alto.",
// 	imagenes: (3) ["20DCNEW_1", "20DCNEW_2", "20DCNEW_3"],
// 	largo: "6",
// 	size: "20 pies",
// 	tipo_2: "DC",
// }
// let formData = new FormData();
// formData.append('products', JSON.stringify(productSincrotron.temp));
// formData.append('action', 'lt_create_products');
// ajax2(formData).then(data => {console.log(data)})

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
		// console.log(data['error'])
		altClassFromSelector('loaded', '#updateController', 'updateController');

		d.querySelector('.updateText').innerHTML = data['error'];

		d.querySelector('.loadBarProgress').style.width = '100%';
		// console.log('archivo subido, base de datos actualizada');
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
		return await response.text();
	}catch(err){
		console.error(err);
	}
}








function string_to_slug (str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();

    // remove accents, swap ñ for n, etc
    var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
    var to   = "aaaaeeeeiiiioooouuuunc------";
    for (var i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
        .replace(/\s+/g, '-') // collapse whitespace and replace by -
        .replace(/-+/g, '-'); // collapse dashes

    return str;
}










// COOKIES HANDLING

function createCookie(n,value,days){if(days){var date=new Date();date.setTime(date.getTime()+(days*24*60*60*1000));var expires="; expires="+date.toUTCString();}else var expires="";d.cookie=n+"="+value+expires+"; path=/";}
// function readCookie  (n){var m=n+"=",a=d.cookie.split(';');for(var i=0;i<a.length;i++){var c=a[i];while(c.charAt(0)==' ')c=c.substring(1,c.length);if(c.indexOf(m)==0)return c.substring(m.length,c.length);}return null;}
function readCookie  (n){var m=n+"=",a=d.cookie.split(';');for(var i=0;i<a.length;i++){var c=a[i];while(c.charAt(0)==' ')c=c.substring(1,c.length);if(c.indexOf(m)==0)return c.substring(m.length,c.length);}}
function eraseCookie (n){createCookie(n,"",-1)}



















trenController = {
	setup:()=>{
		console.log("let's go with the trains!!")
	},
	precio_en_origen:0,
	precio_en_destino:0,
	gastos_adicionales:{},
	altTrainAndCont:(option)=>{
		let cotizador = d.querySelector('#cotizador')
		let buttonFinish = d.querySelector('#buttonFinishCart');
		// altClassFromSelector('tren', '#cotizador')
		if(option=='tren' && !cotizador.classList.contains('tren')){
			// // TODO: if cart is full, you should empty it first
			// TODO: % chequear si tenes en el carrito el contenedor habilitado...
			cartController.emptyCart()
			cartController.endButtonsSwitch();

			cotizador.classList.add('tren');
			trenController.selectUniqeOption();
			trenController.setPointerEvents('none');

			// buttonFinish.onclick = trenController.finish

			accordionSelector('#destino')
			d.querySelector('#trenExplanation').style.display = 'block';
		}

		if(option!='tren' && cotizador.classList.contains('tren')){
			cotizador.classList.remove('tren');
			productSelector.unselectAll();
			trenController.setPointerEvents('auto');

			// buttonFinish.onclick = cartController.finish


			accordionSelector('#destino')
			d.querySelector('#trenExplanation').style.display = 'none';
		}
	},




	get_prices:()=>{
		var formData = new FormData();
		formData.append( 'action', 'lt_tren_end' );
		formData.append( 'cont', "40HC CW" );
		formData.append( 'origen_country' , locationSelector.origen[0] .capitalize() );
		formData.append( 'origen_city'    , locationSelector.origen[1] .capitalize() );
		formData.append( 'destino_country', locationSelector.destino[0].capitalize() );
		formData.append( 'destino_city'   , locationSelector.destino[1].capitalize() );

		ajax2(formData).then( data => {

			let gastos = data.gastos ? parseInt(data.gastos.profit) + parseInt(data.gastos.deposit) + parseInt(data.gastos.others) : 0;
			let precio_origen  = price_data_pre_processor( data.precio_origen, data.exchange )
			let precio_destino = price_data_pre_processor( data.precio_destino, data.exchange )
			let final_price = 0;
			// console.log('precio_origen', precio_origen)
			// console.log('precio_destino', precio_destino)
			// let total_price = 0;
			
			price_is_avaliable = ( !!precio_origen && !!precio_destino )
			console.log('price_is_avaliable', price_is_avaliable)
			this_is_not_the_correct_currency = !locationSelector.origen.final_currency.includes('EUR');
			
			
			if( price_is_avaliable ){
				final_price = precio_origen - precio_destino + gastos
				if ( this_is_not_the_correct_currency ){
					currency = 'USD';
					exchange_rate = parseFloat(data.exchange.rate)
					final_price = final_price / exchange_rate;
				}
			} else {
				final_price = 'Precio no disponible';
				currency = '';
			}

			// console.log('single price: ', final_price)
			cartController.cart[0].setPrice(final_price);
			nuevoElemento = new CartItem(cartController.cart[0].values)
			cartController.cart[0] = nuevoElemento;

			console.log(cartController.cart)
		})
	},





	show_prices:()=>{

		let cartItem = d.querySelector('.cartItem[data-code="40HC CW"]');
		let itemQty = cartItem.querySelector('.cartItemQty').innerText;
		let itemPrice = cartItem.querySelector('.cartItemPriceNumber');
		let itemCurrency = cartItem.querySelector('.cartItemCurrency');
		let currency = 'EUR';

		let total_price = 0;
		final_price = cartController.cart[0].singlePrice;
		// price_is_avaliable = final_price != "Precio no disponible" ? true : false;
		price_is_avaliable = isNaN(final_price) ? false : true;

		// console.log('price_is_avaliable', price_is_avaliable)
		this_is_not_the_correct_currency = !locationSelector.origen.final_currency.includes('EUR');

		if( price_is_avaliable ){
			if ( this_is_not_the_correct_currency ){
				currency = 'USD';
				// TODO: poner el exchange rate verdadero
				exchange_rate = 0.85
				final_price = final_price / exchange_rate;
				// totalPrice  = totalPrice  / exchange_rate;
			}
			total_price = final_price * parseInt(itemQty);
			total_price = total_price.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		} else {
			final_price = 'Precio no disponible';
			total_price = 'Precio no disponible';
			currency = '';
		}
		let gran_total = total_price;

		itemCurrency.innerText = currency
		itemPrice.innerText = total_price;
		// let total_price = final_price * itemQty;


		// console.log('single price: ', final_price)
		cartController.cart[0].setPrice(final_price);
		nuevoElemento = new CartItem(cartController.cart[0].values)
		cartController.cart[0] = nuevoElemento;
		// console.log(cartController.cart[0])
		// console.log('cart price: ', cartController.cart[0].singlePrice)


		// let list_of_product_with_price = cartController.cart.filter(product => product.singlePrice)
		// console.log('list_of_product_with_price: ', list_of_product_with_price);


		let gran_total_display = [...d.querySelectorAll('.cartTotal')];
		console.log(gran_total_display)
		gran_total_display.forEach(element=>{
			// console.log(element.target)
			element.innerHTML = gran_total;
		})
		// console.log('CARRITO luego de la transformacion', cartController.cart)
		if ( price_is_avaliable ){
			altClassFromSelector('allPricesThere', '#cartList', 'cartList');
		} else {
			altClassFromSelector('nonePricesThere', '#cartList', 'cartList');
		}

		altClassFromSelector('consultaFinalizada', '#cart')
	},



	finish:()=>{
		// TODO: que se guarden las locaciones en cookies

		trenController.show_prices();

		altClassFromSelector('alt', '#finalizarConsulta')
		d.querySelector('#cart').classList.add('alt')

		// TODO: que envie el mail
		cartController.sendMail(true);

		// TODO: que envie el lead
		// TODO: aqui poner el destino como mensaje como asi tambien que es una interaccion de tren...
		cartController.cartToLeads = cartController.cart;
		createCookie('status','next')
		cartController.sendAllLeads( tren = true );

	},



	// TODO: eliminar finish_old
	finish_old:()=>{
		// console.log('ooooootre testeeeo')

		// // TODO: que no te deje finalizar consulta si no seleccionas cantidad
		// TODO: no dejar que la consulta termine si no seleccionan lugar
		// TODO: que se guarden las locaciones en cookies



		var formData = new FormData();
		formData.append( 'action', 'lt_tren_end' );
		formData.append( 'cont', "40HC CW" );
		formData.append( 'origen_country' , locationSelector.origen[0] .capitalize() );
		formData.append( 'origen_city'    , locationSelector.origen[1] .capitalize() );
		formData.append( 'destino_country', locationSelector.destino[0].capitalize() );
		formData.append( 'destino_city'   , locationSelector.destino[1].capitalize() );


		ajax2(formData).then( data => {
			console.log(data)

			let cartItem = d.querySelector('.cartItem[data-code="40HC CW"]');
			let itemQty = cartItem.querySelector('.cartItemQty').innerText;
			let itemPrice = cartItem.querySelector('.cartItemPriceNumber');
			let itemCurrency = cartItem.querySelector('.cartItemCurrency');
			let currency = 'EUR';




			let gastos = data.gastos ? parseInt(data.gastos.profit) + parseInt(data.gastos.deposit) + parseInt(data.gastos.others) : 0;
			let precio_origen  = price_data_pre_processor( data.precio_origen, data.exchange )
			let precio_destino = price_data_pre_processor( data.precio_destino, data.exchange )
			let final_price = precio_origen - precio_destino + gastos
			console.log('precio_origen', precio_origen)
			console.log('precio_destino', precio_destino)
			let total_price = 0;





			price_is_avaliable = ( !!precio_origen && !!precio_destino )
			console.log('price_is_avaliable', price_is_avaliable)
			this_is_not_the_correct_currency = !locationSelector.origen.final_currency.includes('EUR');


			if( price_is_avaliable ){
				if ( this_is_not_the_correct_currency ){
					currency = 'USD';
					exchange_rate = parseFloat(data.exchange.rate)
					final_price = final_price / exchange_rate;
					// totalPrice  = totalPrice  / exchange_rate;
				}
				total_price = final_price * parseInt(itemQty);
			} else {
				final_price = 'Precio no disponible';
				total_price = 'Precio no disponible';
				currency = '';
			}
			let gran_total = total_price;

			if ( typeof gran_total == 'number' ) {
				gran_total = gran_total.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				total_price = total_price.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			}

			itemCurrency.innerText = currency
			itemPrice.innerText = total_price;
			// let total_price = final_price * itemQty;


			console.log('single price: ', final_price)
			cartController.cart[0].setPrice(final_price);
			nuevoElemento = new CartItem(cartController.cart[0].values)
			cartController.cart[0] = nuevoElemento;
			console.log(cartController.cart[0])
			console.log('cart price: ', cartController.cart[0].singlePrice)





			// let list_of_product_with_price = cartController.cart.filter(product => product.singlePrice)
			// console.log('list_of_product_with_price: ', list_of_product_with_price);


			let gran_total_display = [...d.querySelectorAll('.cartTotal')];
			console.log(gran_total_display)
			gran_total_display.forEach(element=>{
				// console.log(element.target)
				element.innerHTML = gran_total;
			})
			// console.log('CARRITO luego de la transformacion', cartController.cart)
			if ( price_is_avaliable ){
				altClassFromSelector('allPricesThere', '#cartList', 'cartList');
			} else {
				altClassFromSelector('nonePricesThere', '#cartList', 'cartList');
			}

			altClassFromSelector('consultaFinalizada', '#cart')





			// TODO: que envie el mail
			cartController.sendMail(true);
			// TODO: que envie el lead
			cartController.cartToLeads = cartController.cart;
			createCookie('status','next')
			cartController.sendAllLeads( tren = true );


			// TODO chequear que lleguen todas las respuestas, no que estemos en la ultima
		})
		// });

		altClassFromSelector('alt', '#finalizarConsulta')
		d.querySelector('#cart').classList.add('alt')

		// TODO: encender el lead Sender
		// TODO: aqui poner el destino como mensaje como asi tambien que es una interaccion de tren...
		// cartController.cartToLeads = cartController.cart;
		// createCookie('status','next')
		// cartController.sendAllLeads();
	},


	setPointerEvents:(value)=>{
		d.querySelector('#selectBoxSize').style.pointerEvents = value
		d.querySelector('#selectBoxTipo_1').style.pointerEvents = value
		d.querySelector('#selectBoxTipo_2').style.pointerEvents = value
		d.querySelector('#selectBoxCondicion').style.pointerEvents = value
	},
	selectUniqeOption:()=>{
		selectBoxControler('40 Pies', '#selectBoxSize', '#selectBoxCurrentSize')
		d.querySelector('[value="40-pies"]').checked = true

		selectBoxControler('Dry', '#selectBoxTipo_1', '#selectBoxCurrentTipo_1')
		d.querySelector('[value="Dry"]').checked = true

		selectBoxControler('High Cube', '#selectBoxTipo_2', '#selectBoxCurrentTipo_2')
		d.querySelector('[value="HC"]').checked = true

		selectBoxControler('Cargo	', '#selectBoxCondicion', '#selectBoxCurrentCondicion')
		d.querySelector('[value="CW"]').checked = true

		productSelector.searchProduct()
	},
}














locationSelector = {
	// first dowloads the hole location table and then executes searches on the object
	allLocations:[],
	currentSearch:[],
	selectors: [],
	origen:[],
	destino:[],
	setup: ()=>{
		// this setup populates the selectors and sets their onchange function
		coprAlqui = d.querySelector('.coprAlqui');
		locationSelector.getAllLocations();
		locationSelector.origenSelectors = [
			d.querySelector('#selectBoxOrigenCountry'),
			d.querySelector('#selectBoxOrigenCity'),
		];

		locationSelector.destinoSelectors = [
			d.querySelector('#selectBoxDestinoCountry'),
			d.querySelector('#selectBoxDestinoCity'),
		];

		inputs = [...coprAlqui.querySelectorAll('#origen .selectBoxInput')]
		inputs.forEach((input)=>{
			input.onchange = ()=>{
				if ( input.id == 'nulOrigenCountry' ){
					d.querySelector('#nulOrigenCity').checked = true
					selectBoxControler('','#selectBoxOrigenCity','#selectBoxCurrentOrigenCity')
				}
				locationSelector.searchLocation('origen')
			};
		})


		inputs = [...coprAlqui.querySelectorAll('#destino .selectBoxInput')]
		inputs.forEach((input)=>{
			input.onchange = ()=>{
				if ( input.id == 'nulDestinoCountry' ){
					d.querySelector('#nulDestinoCity').checked = true
					selectBoxControler('','#selectBoxDestinoCity','#selectBoxCurrentDestinoCity')
				}
				locationSelector.searchLocation('destino')
			};
		})
	},



	getAllLocations: () => {
		var formData = new FormData();
		formData.append( 'action', 'lt_get_all' );
		formData.append( 'table', 'locations' );

		ajax2(formData).then( data => {
			locationSelector.allLocations   = data;
			locationSelector.currentSearch  = data;

			// console.log(locationSelector.allLocations)
		})
	},


	searchLocation:(option)=>{
		let coprAlqui = d.querySelector('.coprAlqui');
		let selected = [...coprAlqui.querySelectorAll('#'+option+' .selectBoxInput:checked')];

		// console.log('previous search', locationSelector.currentSearch)

		locationSelector.currentSearch = locationSelector.allLocations;
		// console.log(locationSelector.currentSearch);

		// filtra los productos que coincidan con la busqueda actual
		selected.forEach((input)=>{
			if(input.value!='0'){
				let key = input.name.toLowerCase().replace(option,''),
				value   = input.value;
				// console.log(key, value);

				let helperArray = [];
				locationSelector.currentSearch.forEach(location => {
					if( string_to_slug(location[key]) == value ){ helperArray.push(location) }
				})
				locationSelector.currentSearch = helperArray;
			}
		})
		// console.log(locationSelector.currentSearch);

		let uniqueLocationFound = locationSelector.currentSearch.length == 1;
		// TODO: si hay solo un location encontrado habilitar boton de finalizar
		// TODO: %si hay uno solo que complete el otro?...
		// TODO: %que garde seleccion en cookie?...
		if( uniqueLocationFound ){
			locationSelector[option] = locationSelector.currentSearch[0]
			locationSelector[option][0] = locationSelector.currentSearch[0].country;
			locationSelector[option][1] = locationSelector.currentSearch[0].city;
			locationSelector[option][2] = locationSelector.currentSearch[0].final_currency;


			// !NUEVO MODULO:
			// activa la busqueda de precios en la seleccion de lugar
			// aqui va:

			// checkear si tenemos opcion de tren o de contenedor
			let is_option_cont = d.querySelector('[name="cotizadorOption"]:checked').value == 'cont' ? true : false;
			if ( is_option_cont ) {
				console.log('option container')
				cartController.get_prices();
			} else {
				console.log('option tren')
				let both_locations_are_selected = ( !!locationSelector['origen'][0] && !!locationSelector['destino'][0] ) ? true : false;
				console.log('are both options selected?: ', both_locations_are_selected)
				if ( both_locations_are_selected ){
					trenController.get_prices();
				}
			}
			// console.log('opcion seleccionada: ', d.querySelector('[name="cotizadorOption"]:checked').value);





			// locationSelector[option] = [
			// 	locationSelector.currentSearch[0].country,
			// 	locationSelector.currentSearch[0].city,
			// 	locationSelector.currentSearch[0].final_currency,
			// 	// coprAlqui.querySelector('#selectBox'+option.capitalize()+'Country .selectBoxInput:checked').value,
			// 	// coprAlqui.querySelector('#selectBox'+option.capitalize()+'City .selectBoxInput:checked').value,
			// ]
			// console.log(locationSelector[option])
		} else {
			locationSelector[option] = []
		}
		// esconde todos los option que no coincidan con elementos de la busqueda actual
		locationSelector.hideUnwantedOptions(option);
	},


	hideUnwantedOptions:(origenDestino)=>{ console.log('asi??')
		// esconde todos los option que no coincidan con elementos de la busqueda actual
		let options = [...coprAlqui.querySelectorAll('#'+origenDestino+' .selectBoxOption')];
		options.forEach(option=>{
			let input = option.querySelector('.selectBoxInput');
			if (input.value != 0){
				let key   = input.name.toLowerCase().replace(origenDestino,''),
				val = input.value,
				found = false;

				// search on currentSearch
				locationSelector.currentSearch.forEach(location=>{
					if(string_to_slug(location[key])==val){
						found = true;
					}
				})

				if(found){
					option.style.display = 'block';
				} else {
					option.style.display = 'none';
				}
			}
		})
	},
}

















productSelector = {
	allProducts:[],
	currentSearch:[],
	selectors: [],
	setup: ()=>{
		dynamicCont = d.querySelector('.dynamicCont');
		if (dynamicCont) {
			productSelector.getAllProducts();
			productSelector.selectors = [
				d.querySelector('#selectBoxSize'),
				d.querySelector('#selectBoxTipo_1'),
				d.querySelector('#selectBoxTipo_2'),
				d.querySelector('#selectBoxCondicion'),
			];
			// console.log(productSelector.selectors)

			inputs = [...dynamicCont.querySelectorAll('.selectBoxInput')]
			inputs.forEach((input)=>{
				// input.addEventListener('change',productSelector.searchProduct.bind(input))
				// input.onchange = productSelector.searchProduct.bind(input);
				input.onchange = ()=>{productSelector.searchProduct()};
			})
		}
	},

	addToCart:(product)=>{
		product.qty = parseInt(d.querySelector('.dynamicCont .cuantosQnt').value)
		product.code = product.salesforce_id

		cartController.add(product)


		d.querySelector('#currentSemiSelection').classList.remove('cond');
		let selected = [...dynamicCont.querySelectorAll('.selectBoxInput:checked')];

		setTimeout(()=>{
			selected.forEach((selector)=>{
				d.querySelector('#currentSemiSelection'+selector.name).setAttribute('xlink:href', '#');
			})
			d.querySelector('#currentSemiSelection').classList.add('cond');
		}, 800);

		cot_option = d.querySelector('[name="cotizadorOption"]:checked').value;
		// console.log(cot_option)
		// console.log('option value: ', cot_option)
		if (cot_option=='cont') {
			productSelector.unselectAll();
		}

	},
	unselectAll:()=>{
		let nuls = [...dynamicCont.querySelectorAll('.selectBoxInput[value="0"]')];
		nuls.forEach((nul)=>{
			nul.checked = true
			selectBoxControler('','#selectBox'+nul.name,'#selectBoxCurrent'+nul.name)
		})
		productSelector.searchProduct();
		// console.log(nuls)
	},

	getAllProducts: () => {
		var formData = new FormData();
		formData.append( 'action', 'lt_get_all' );
		formData.append( 'table', 'contenedores' );

		ajax2(formData).then( data => {
			productSelector.allProducts   = data;
			productSelector.currentSearch = data;
			console.log(productSelector.allProducts)
		})
	},

	searchProduct:()=>{
		let dynamicCont = d.querySelector('.dynamicCont');
		let selected = [...dynamicCont.querySelectorAll('.selectBoxInput:checked')];

		productSelector.currentSearch = productSelector.allProducts;

		// filtra los productos que coincidan con la busqueda actual
		selected.forEach((input)=>{
			if(input.value!='0'){
				let key   = input.name.toLowerCase(),
				value = key == 'size' ? input.value.match(/(\d+)/)[0] : input.value;

				let helperArray = [];
				productSelector.currentSearch.forEach(product => {
					if( product[key] == value ){ helperArray.push(product) }
				})
				productSelector.currentSearch = helperArray;
			}
		})
		// console.log(productSelector.currentSearch);

		// si hay solo un producto encontrado habilitar boton de agregar al carrito
		let uniqueProductFound = productSelector.currentSearch.length == 1,
		btn = dynamicCont.querySelector('.btn');
		btn.disabled = !uniqueProductFound;

		// esconde todos los option que no coincidan con elementos de la busqueda actual
		productSelector.hideUnwantedOptions();

		productSelector.iconPlay();
	},


	hideUnwantedOptions:()=>{ console.log('asi??')
		// esconde todos los option que no coincidan con elementos de la busqueda actual
		let options = [...dynamicCont.querySelectorAll('.selectBoxOption')];
		options.forEach(option=>{
			let input = option.querySelector('.selectBoxInput');
			if (input.value != 0){
				let key   = input.name.toLowerCase(),
				val = key == 'size' ? input.value.match(/(\d+)/)[0] : input.value,
				found = false;
				// search on currentSearch
				productSelector.currentSearch.forEach(product=>{
					if(product[key]==val){
						found = true;
					}
				})

				if(found){
					option.style.display = 'block';
				} else {
					option.style.display = 'none';
				}
			}
		})
	},

	iconPlay:()=>{
		let selected = [...dynamicCont.querySelectorAll('.selectBoxInput:checked')];
		selected.forEach((selector)=>{
			d.querySelector('#currentSemiSelection'+selector.name).setAttribute('xlink:href', '#'+selector.value.replace(/\s+/g, '-'));
			// console.log(selector.name)
			// console.log(selector.value)
			// let input = selector.querySelector('[checked=true]')
			// console.log(input)
		})
		// TODO: hacer el cambio de iconos en el selector de la front page, mas o menos asi:

	},

}







const price_data_pre_processor = (data, exchange)=>{

	// console.log('data in price_data_processor', data)
	if ( data ) {
		// console.log(exchange)
		data.forEach(element => {
			if(element.currency.includes('USD')){
				element.currency = 'EUR'
				element.supplier_price = element.supplier_price * exchange.rate
				element.fixed_price    = element.fixed_price    * exchange.rate
				element.sale_price     = element.sale_price     * exchange.rate
			}
		});

		if ( data[0].fixed_price != 0 ) {

			singlePrice = parseFloat(data[0].fixed_price)
			// console.log('FIXED PRICE')

		} else if ( data[0].sale_price != 0 ) {

			singlePrice = parseFloat(data[0].sale_price - 300)
			// console.log('SALE PRICE')

		}else if( data.length == 1 ){

			singlePrice = parseFloat(data[0].supplier_price)
			// console.log('UNICO SUPPLIER PRICE')

		}else{
			let prices = data.map( x => x.supplier_price );
			let pricesSort = prices.sort((a, b) => a - b).slice(0, 2);
			let average = (parseInt(pricesSort[0]) + parseInt(pricesSort[1])) / 2;
			singlePrice = average;
			// console.log('PROMEDIO DE LOS 2 SUPPLIER PRICE MAS TOBARA')
		}
		// totalPrice = singlePrice * parseInt(itemQty);
		if(singlePrice != 0){

			final_price = singlePrice

		} else{ final_price = false; }
	} else { final_price = false; }

	return final_price
}








// TODO: pasar todo a minuscula... como no se me ocurrio antes???!?!?
// CART CONTROLLER
cartController = {
	setup:()=>{

		if(readCookie('cart')){
			JSON.parse(readCookie('cart')).forEach((item, i) => {
				cartController.cart.unshift(new CartItem(item));
				cartController.cart[0].cartUI();
			});
		}
		cartController.endButtonsSwitch();

		if ( cartController.cart.length < 2 ) {
			d.querySelectorAll('.cartButtonUse').forEach((item, i) => {
				item.setAttribute('xlink:href', '#simpleTruck');
			});
		} else {
			d.querySelectorAll('.cartButtonUse').forEach((item, i) => {
				item.setAttribute('xlink:href', '#doubleTruck');
			});
		}

	},

	containerToAdd:false,
	cart: [],
	cartToLeads: [],
	allProducts:{},

	emptyCart:()=>{
		// TODO: % chequear si tenes en el carrito el contenedor habilitado...
		// alert('debes vaciar tu carrito primero')
		console.log('cart: ', cartController.cart.length)
		let to_be_deleted = []
		cartController.cart.forEach( product =>{
			to_be_deleted.unshift(product.code);
		})

		to_be_deleted.forEach( code => {
			cartController.remove(code)
		})


		list = d.querySelector('.cartList');
		let elementos_visuales = [...list.querySelectorAll('.cartItem')];
		elementos_visuales.forEach(element=>{
			list.removeChild(element);
		})



	},

	get_prices:()=>{
		createCookie('price_returns', 0)
		cartController.cart.forEach((item, i) => {

			var formData = new FormData();
			formData.append( 'action', 'lt_cart_end' );
			formData.append( 'cont', item.code );
			formData.append( 'country', locationSelector.origen[0] );
			formData.append( 'city', locationSelector.origen[1] );

			ajax2(formData).then( data => {
				let price_returns = parseInt(readCookie('price_returns'))
				price_returns++;
				createCookie('price_returns', price_returns)

				price_pre_processed = price_data_pre_processor( data.price_data, data.exchange );
				// TODO: estaria bueno que ellos puedan elegir en el dashboard el 'gastos' por defecto
				let gastos = 0
				if ( data.gastos ) {
					gastos = parseFloat(data.gastos.profit) + parseFloat(data.gastos.deposit) + parseFloat(data.gastos.others);
				}

				price_is_avaliable = !!price_pre_processed

				this_is_not_the_correct_currency = !locationSelector.origen.final_currency.includes('EUR');


				if( price_is_avaliable ){
					singlePrice = price_pre_processed + gastos;
					if ( this_is_not_the_correct_currency ){
						currency = 'USD';
						exchange_rate = parseFloat(data['exchange'].rate)
						singlePrice = singlePrice / exchange_rate;
					}
				} else {
					singlePrice = 'Precio no disponible';
					currency = '';
				}

				cartController.cart[i].setPrice(singlePrice);
				nuevoElemento = new CartItem(cartController.cart[i].values)
				cartController.cart[i] = nuevoElemento;


				if( price_returns == cartController.cart.length ){
					console.log('llego el ultimo precio')
					console.log(cartController.cart[i]);
					eraseCookie('price_returns');
					createCookie('price_ready', true);
				}
			})
		});
	},



	show_prices:()=>{
		let currency = 'EUR';

		cartController.cart.forEach((item, i) => {

			let cartItem = d.querySelector('.cartItem[data-code="'+item.code+'"]');
			let itemQty = cartItem.querySelector('.cartItemQty').innerText;
			let itemPrice = cartItem.querySelector('.cartItemPriceNumber');
			let itemCurrency = cartItem.querySelector('.cartItemCurrency');

			// price_is_avaliable = item.singlePrice != "Precio no disponible" ? true : false;
			price_is_avaliable = isNaN(item.singlePrice) ? false : true;

			this_is_not_the_correct_currency = !locationSelector.origen.final_currency.includes('EUR');

			singlePrice = item.singlePrice;
			if( price_is_avaliable ){
				if ( this_is_not_the_correct_currency ){
					currency = 'USD';
					// TODO: traer el exchange rate
					exchange_rate = 0.85;
					singlePrice = singlePrice / exchange_rate;
				}
				totalPrice = singlePrice * parseInt(itemQty);
				totalPrice = totalPrice.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			} else {
				totalPrice = 'Precio no disponible';
				currency = '';
			}

			itemCurrency.innerText = currency;
			itemPrice.innerText = totalPrice;
		});

		
		// // chequear que lleguen todas las respuestas, no que estemos en la ultima
		// console.log('llego el ultimo precio')
		let list_of_product_with_price = cartController.cart.filter(product => product.singlePrice != "Precio no disponible")
		console.log('list_of_product_with_price: ', list_of_product_with_price);
		let gran_total = 0;
		cartController.cart.forEach(product=>{
			if( typeof product.singlePrice == 'number'){
				gran_total += product.singlePrice * product.qty;
			}
		})

		if ( typeof gran_total == 'number' ) {
			// console.log(totalPrice)
			gran_total = gran_total.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}


		let gran_total_display = [...d.querySelectorAll('.cartTotal')];
		gran_total_display.forEach(element=>{
			element.innerHTML = gran_total;
		})

		let currency_display = [...d.querySelectorAll('.cartTotalCurrency')];
		currency_display.forEach(element=>{
			element.innerHTML = currency;
		})

		// console.log('CARRITO luego de la transformacion', cartController.cart)
		if ( list_of_product_with_price.length == 0 ){
			altClassFromSelector('nonePricesThere', '#cartList', 'cartList');
		} else if ( list_of_product_with_price.length < cartController.cart.length ) {
			altClassFromSelector('somePricesThere', '#cartList', 'cartList');
		} else {
			altClassFromSelector('allPricesThere', '#cartList', 'cartList');
		}
		altClassFromSelector('consultaFinalizada', '#cart')

	},







	finish:()=>{
		eraseCookie('allLeads');
		eraseCookie('cartToLeads');
		eraseCookie('lastLead');
		eraseCookie('info');
		eraseCookie('status');
		eraseCookie('leadsSent');
		
		cartController.show_prices();

		altClassFromSelector('alt', '#finalizarConsulta')
		d.querySelector('#cart').classList.add('alt')

		// TODO: encender el mail Sender
		cartController.sendMail();
		// TODO: encender el lead Sender
		cartController.cartToLeads = cartController.cart;
		createCookie('status','next');
		cartController.sendAllLeads();
	},














	finish_old:()=>{
		eraseCookie('allLeads');
		eraseCookie('price_returns');
		eraseCookie('cartToLeads');
		eraseCookie('lastLead');
		eraseCookie('info');
		eraseCookie('status');
		eraseCookie('leadsSent');
		

		// console.log('carrito antes de la transforrmacion', cartController.cart)s
		cartController.cart.forEach((item, i) => {
			// cartController.getPrice(item.code);
			// console.log(item);

			var formData = new FormData();
			formData.append( 'action', 'lt_cart_end' );
			formData.append( 'cont', item.code );
			formData.append( 'country', locationSelector.origen[0] );
			formData.append( 'city', locationSelector.origen[1] );
			createCookie('price_returns', 0)
			// console.log('formData');

			// Display the key/value pairs
			// for (var pair of formData.entries()) {
			// 	console.log(pair[0]+ ', ' + pair[1]);
			// }
			ajax2(formData).then( data => {
				let price_returns = parseInt(readCookie('price_returns'))
				price_returns++;
				createCookie('price_returns', price_returns)

				let cartItem = d.querySelector('.cartItem[data-code="'+item.code+'"]');
				let itemQty = cartItem.querySelector('.cartItemQty').innerText;
				let itemPrice = cartItem.querySelector('.cartItemPriceNumber');
				let itemCurrency = cartItem.querySelector('.cartItemCurrency');
				let currency = 'EUR';


				price_pre_processed = price_data_pre_processor( data.price_data, data.exchange );
				// console.log('pre processed price of '+item.code+': ', price_pre_processed)
				// console.log('item', item)
				// TODO: estaria bueno que ellos puedan elegir en el dashboard el 'gastos' por defecto
				let gastos = 0
				if ( data.gastos ) {
					gastos = parseFloat(data.gastos.profit) + parseFloat(data.gastos.deposit) + parseFloat(data.gastos.others);
				}

				price_is_avaliable = !!price_pre_processed
				// console.log('price_is_avaliable', price_is_avaliable)

				this_is_not_the_correct_currency = !locationSelector.origen.final_currency.includes('EUR');


				if( price_is_avaliable ){
					singlePrice = price_pre_processed + gastos;
					if ( this_is_not_the_correct_currency ){
						currency = 'USD';
						exchange_rate = parseFloat(data['exchange'].rate)
						singlePrice = singlePrice / exchange_rate;
					}
					totalPrice = singlePrice * parseInt(itemQty);
				} else {
					singlePrice = 'Precio no disponible';
					totalPrice = 'Precio no disponible';
					currency = '';
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


				// // chequear que lleguen todas las respuestas, no que estemos en la ultima
				if( price_returns == cartController.cart.length ){
					// console.log('llego el ultimo precio')
					let list_of_product_with_price = cartController.cart.filter(product => product.singlePrice != "Precio no disponible")
					console.log('list_of_product_with_price: ', list_of_product_with_price);
					let gran_total = 0;
					cartController.cart.forEach(product=>{
						if( typeof product.singlePrice == 'number'){
							gran_total += product.singlePrice * product.qty;
						}
					})

					if ( typeof gran_total == 'number' ) {
						// console.log(totalPrice)
						gran_total = gran_total.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
						// totalPrice = totalPrice.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					}


					let gran_total_display = [...d.querySelectorAll('.cartTotal')];
					gran_total_display.forEach(element=>{
						element.innerHTML = gran_total;
					})

					let currency_display = [...d.querySelectorAll('.cartTotalCurrency')];
					currency_display.forEach(element=>{
						element.innerHTML = currency;
					})

					// console.log('CARRITO luego de la transformacion', cartController.cart)
					if ( list_of_product_with_price.length == 0 ){
						altClassFromSelector('nonePricesThere', '#cartList', 'cartList');
					} else if ( list_of_product_with_price.length < cartController.cart.length ) {
						altClassFromSelector('somePricesThere', '#cartList', 'cartList');
					} else {
						altClassFromSelector('allPricesThere', '#cartList', 'cartList');
					}
					altClassFromSelector('consultaFinalizada', '#cart')

					// TODO: encender el mail Sender
					cartController.sendMail();
					// TODO: encender el lead Sender
					cartController.cartToLeads = cartController.cart;
					createCookie('status','next');
					cartController.sendAllLeads();
				}
				// if (i==cartController.cart.length - 1){
				// }
				// d.querySelector('.cartItem[data-code="'+x.code+'"] .cartItemQty').innerText = parseInt(d.querySelector('.cartItem[data-code="'+x.code+'"] .cartItemQty').innerText) + parseInt(x.qty);
				// }

				if ( typeof totalPrice == 'number' ) {
					// console.log(totalPrice)
					totalPrice = totalPrice.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				}


				itemCurrency.innerText = currency;
				itemPrice.innerText = totalPrice;
			})
		});

		altClassFromSelector('alt', '#finalizarConsulta')
		d.querySelector('#cart').classList.add('alt')

	},



















	sendMail:(is_case_tren = false)=>{
		// console.log(cart)
		// cart[0].toJSON="I won't allow you to use sails toJSON, just use the native stringification";
		// console.log(JSON.stringify(cart))
		var formData = new FormData();
		formData.append( 'action', 'lt_ajax_mail' );
		formData.append( 'cont', JSON.stringify(cartController.cart) );
		formData.append( 'country', locationSelector.origen[0] );
		formData.append( 'city', locationSelector.origen[1] );
		formData.append( 'currency', locationSelector.origen[2] );
		formData.append( 'name', d.querySelector('#mateputNombre').value );
		formData.append( 'phone', d.querySelector('#mateputTelefono').value );
		formData.append( 'mail', d.querySelector('#mateputEmail').value );

		if ( is_case_tren ) {
			formData.append( 'title', 'Servicio de tren' );
			formData.append( 'destino_country', locationSelector.destino[0] );
			formData.append( 'destino_city', locationSelector.destino[1] );
		} else {
			formData.append( 'title', 'Contenedor Maritimo' );
		}

		ajax2(formData).then( data => {
			// TODO: reportar al usuario exito o error
			console.log(data);
		});
	},

	add: (x) => {
		const check = (element) => {
			return element.code == x.code;
		}
		if (cartController.cart.find(check)) {
			let index = cartController.cart.findIndex(check)
			cartController.cart[index].setQty(parseInt(cartController.cart[index].qty) + parseInt(x.qty));
			d.querySelector('.cartItem[data-code="'+x.code+'"] .cartItemQty').innerText = cartController.cart[index].qty;
			// d.querySelector('.cartItem[data-code="'+x.code+'"] .cartItemQty').innerText = parseInt(d.querySelector('.cartItem[data-code="'+x.code+'"] .cartItemQty').innerText) + parseInt(x.qty);
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

		// str.split(search).join(replacement)
		console.log(cartController.cart);
		createCookie('cart', JSON.stringify(cartController.cart).split(';').join(':'));

		altClassFromSelector('cartItemAdded','.cardBtnContainer')
		setTimeout(() => {
			altClassFromSelector('cartItemAdded','.cardBtnContainer')
		}, 1500);


		// this part makes sure to only let you finish the consulta si tenes algo en el carrito
		cartController.endButtonsSwitch();
	},

	finalButtonSwitch:()=>{
		let finalButton = d.querySelector('#buttonFinishCart');

		let privacidad = d.querySelector('#privacidad').checked;
		let mateputEmail = d.querySelector('#mateputEmail').value;
		let mateputTelefono = d.querySelector('#mateputTelefono').value;
		let mateputNombre = d.querySelector('#mateputNombre').value;
		let origenCountry = d.querySelector('#selectBoxOrigenCountry .selectBoxInput:checked').value == '0' ? false : true;
		let origenCity = d.querySelector('#selectBoxOrigenCity .selectBoxInput:checked').value == '0' ? false : true;
		let trenDestination = true;

		let price_ready = readCookie('price_ready') == 'true' ? true : false;


		if(!!d.querySelector('#trenOption')){

			if ( d.querySelector('#trenOption').checked ) {
				let destinoCountry = d.querySelector('#selectBoxOrigenCountry .selectBoxInput:checked').value == '0' ? false : true;
				let destinoCity = d.querySelector('#selectBoxOrigenCity .selectBoxInput:checked').value == '0' ? false : true;
				if ( destinoCountry && destinoCity ) {
					trenDestination = true;
				} else {
					trenDestination = false;
				}
			} else {
				trenDestination = true;
			}
		}

		if( privacidad && !!mateputNombre ){
			console.log('habilitarrrrrr')
		}

		if ( price_ready && privacidad && !!mateputNombre && !!mateputTelefono && !!mateputEmail && origenCountry && origenCity && trenDestination ) {
			// finalButton.disabled = false;
			if(!!d.querySelector('#trenOption')){
				if(d.querySelector('#trenOption').checked){
					console.log(cartController.cart)
					// console.log('trenController.finish()')
					trenController.finish()
				}else{
					console.log(cartController.cart)
					// console.log('cartController.finish()')
					cartController.finish()
				}
			}else{
				console.log(cartController.cart)
				// console.log('cartController.finish()')
				cartController.finish()
			}
		} else {
			alert('Todos los campos son requeridos')
			// finalButton.disabled = true;
		}
	},

	endButtonsSwitch:()=>{
		// this part makes sure to only let you finish the consulta si tenes algo en el carrito
		let endButtons = [...d.querySelectorAll('.CotizadorEndButton')];
		let isTheCartEmpty = cartController.cart.length < 1;
		endButtons.forEach((endButton)=>{
			// console.log('activate all buttons')
			endButton.disabled = isTheCartEmpty;
		})
		if ( isTheCartEmpty ) {
			d.querySelector('.itemAddedIcon').style.color = 'transparent';
		} else {
			d.querySelector('.itemAddedIcon').style.color = 'var(--primaryColor)';
		}
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
		createCookie('cart', JSON.stringify(cartController.cart).split(';').join(':'));

		// this part makes sure to only let you finish the consulta si tenes algo en el carrito
		cartController.endButtonsSwitch();

	},


	sendAllLeads:( tren = false )=>{
		// if(readCookie('status')=='next'){
		// eraseCookie('status')

		// cartController.cartToLeads.forEach(product=>{
		let mensaje = '-';
		if ( tren ) {
			mensaje = 'Servicio de tren hasta: ' + d.querySelector('#selectBoxDestinoCountry .selectBoxInput:checked').value + ', ' + d.querySelector('#selectBoxDestinoCity .selectBoxInput:checked').value;
		}

		let product = cartController.cartToLeads.shift();
		console.log('send '+product.qty+' product: ', product.code)
		let price;
		if( typeof product.singlePrice == 'number' ){
			price = product.singlePrice * product.qty;
		} else {
			price = product.singlePrice;
		}

		let info = {
			fname:     d.querySelector('#mateputNombre').value,
			email:     d.querySelector('#mateputEmail').value,
			phone:     d.querySelector('#mateputTelefono').value,
			country:   d.querySelector('#selectBoxOrigenCountry .selectBoxInput:checked').value,
			city:      d.querySelector('#selectBoxOrigenCity .selectBoxInput:checked').value,
			code:      product.code,
			type:      product.tipo_2,
			size:      product.size,
			quantity:  product.qty,
			company:   '-',
			lname:     '-',
			message:   mensaje,
			inmediata: d.querySelector('#inmediata').checked,
			traslado:  d.querySelector('#trasporte').checked,
			precio:    price,
		}

		if(cartController.cartToLeads.length!=0){
			createCookie('cartToLeads', JSON.stringify(cartController.cartToLeads).split(';').join(':'));
			createCookie('info', JSON.stringify(info));
			createCookie('lastLead', 'waiting');
		} else {
			createCookie('lastLead', 'sent');
		}
		console.log(info)
		createCookie('leadsSent', '1');
		cartController.newLead(info);
		// });


		// }

		// if(readCookie('status')=='success'){
		// 	win2.close()
		// 	eraseCookie('status')
		// 	if(cartController.cartToLeads.length>0){
		// 		createCookie('status','next')
		// 		cartController.sendAllLeads();
		// 	} else {
		// 		console.log('todos los elementos del carrito fueron enviados con exitooo')
		// 	}
		// 	// console.log('FOUNDDDD, close cycle')
		// 	// console.log('respuesta de salesforce: ' + readCookie('status'))
		// } else {
		// 	console.log(readCookie('status'))
		// 	setTimeout(() => {
		// 		cartController.sendAllLeads();
		// 	}, 200);
		// }
		// }
	},

	newLead:(info)=>{
		console.log(info);

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
		let inmediata  = info.inmediata;
		let traslado   = info.traslado;
		let precio     = info.precio;

		let vars = '?first_name='+first_name+'&last_name='+last_name+'&email='+email+'&phone='+phone+'&company='+company+'&country='+country+'&city='+city+'&product='+product+'&type='+type+'&size='+size+'&quantity='+quantity+'&message='+message+'&inmediata='+inmediata+'&traslado='+traslado+'&precio='+precio;
		// let vars = '?first_name='+first_name+'&last_name='+last_name+'&email='+email+'&phone='+phone+'&company='+company+'&country='+country+'&city='+city+'&product='+product+'&type='+type+'&size='+size+'&quantity='+quantity+'&message='+message;

		let baseURL= 'https://silverseacontainers.com/testLead.php';
		// let baseURL= 'http://localhost/silversea/wp-content/themes/silversea/cookiePractice.php';


		let url = baseURL + vars;
		win2 = window.open(url,'_blank');
		win2.blur();
		window.focus();
		//TODO: que la pagina que se abre se cierre...
		checkForClose();

	},


}

const checkForClose = ()=>{
	console.log(readCookie('allLeads')=='success')
    if(readCookie('allLeads')=='success'){
		// console.log('FOUNDDDD, close cycle')
		let cant = parseInt(readCookie('leadsSent'))
		console.log('cantidad de Leads enviados: ', cant)
		eraseCookie('allLeads');
		eraseCookie('price_returns');
		eraseCookie('cartToLeads');
		eraseCookie('lastLead');
		eraseCookie('info');
		eraseCookie('status');
		eraseCookie('leadsSent');
		win2.close()
    } else {
		console.log(readCookie('status'))
		setTimeout(() => {
			checkForClose();
		}, 200);
    }
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






function filterStock(){
	let pais  = document.getElementById('getPais').value,
	ciudad    = document.getElementById('getCiudad').value,
	container = document.getElementById('getContainer').value;

	var where = '';


	if(pais!="*"){
		where +=  '?pais='+pais;
	}
	if(ciudad!="*"){
		where += '?ciudad='+ciudad;
	}
	if(container!="*"){
		where +=   '?id_contenedor='+container;
	}
	if(pais!="*"&&ciudad!="*"){
		where = '?pais='+pais+'&ciudad='+ciudad;
	}
	if(pais!="*"&&container!="*"){
		where = '?pais='+pais+'&id_contenedor='+container;
	}
	if(ciudad!="*"&&container!="*"){
		where = '?ciudad='+ciudad+'&id_contenedor='+container;
	}
	if(pais!="*"&&ciudad!="*"&&container!="*"){
		where = '?pais='+pais+'&ciudad='+ciudad+'&id_contenedor='+container;
	}
	// console.log(location.pathname+where);
	window.location = location.pathname + where;
}




const filterActivate = ()=>{

	if (d.querySelector('#filterButtonAFK')){
		link = d.querySelector('#filterButtonAFK')
		cosos1 = [...d.querySelectorAll('[name=question1]')];
		cosos2 = [...d.querySelectorAll('[name=question2]')];

		urlBase = 'https://silverseacontainers.com/buscar-contenedor-maritimo/'
		// urlBase = 'http://localhost/silverSea/buscar-contenedor/'

		console.log(link)
		cosos1.forEach((coso)=>{
			coso.onchange = ()=>{
				console.log(coso.value)
				// link.href = urlBase + '?uso=' + coso.value
				if(d.querySelector('[name=question2]:checked')){
					otro=d.querySelector('[name=question2]:checked')
					link.href = urlBase + '?use=' + coso.value + '&sizes=' + otro.value
				} else {
					link.href = urlBase + '?use=' + coso.value
				}
			}
		})
		cosos2.forEach((coso)=>{
			coso.onchange = ()=>{
				if(d.querySelector('[name=question1]:checked')){
					otro=d.querySelector('[name=question1]:checked')
					console.log(otro);
					link.href = urlBase + '?use=' + otro.value + '&sizes=' + coso.value
				} else {
					link.href = urlBase + '?sizes=' + coso.value
				}
				console.log(coso.value)
			}
		})

	}
	if(d.querySelector('[name=cont_selector]')){
		d.querySelector('[name=cont_selector]').onchange=(option)=>{
			altClassFromSelector(option.target.value, '#queContainerINeed', 'sectionPadding')
			// let button = d.querySelector('.cotizarContainer');
			// // urlBase = 'http://localhost/silverSea/buscar-contenedor/'
			// let homeUrl = lt_data.homeurl;
			// console.log(homeUrl);
			// urlBase = homeUrl + readCookie('trp_language') + '/buscar-contenedor-maritimo/';
			// // urlBase = 'https://silverseacontainers.com/buscar-contenedor-maritimo/'
			// console.log(option.target.value)
			// card = option.target.value
			// if(card == 'card67'){
			// 	button.href = urlBase + '?use=storage-new';
			// 	console.log('storage-new');
			// }
			// if(card == 'card68'){
			// 	button.href = urlBase + '?use=reefer';
			// 	console.log('reefer');
			// }
			// if(card == 'card69'){
			// 	button.href = urlBase + '?use=cargo-dry';
			// 	console.log('cargo-dry');
			// }
		}
	}
}




const addBullshitToCart = ()=>{
	example1 = '[{"values":{"size":"6","tipo_1":"Dry","tipo_1_description":"Seco | Dry","tipo_2":"HC","tipo_2_description":"High Cube","condicion":"CW","condicion_description":"Carga | Cargo Worthy","salesforce_id":"6HC CW","id":"7","categoria":"size > 6PIES: Condition > CW: general > Dry > HC","imagenes":"","ancho":"2.43","alto":"2.59","largo":"1.98","peso":"0","tara":null,"container_description":null,"qty":6,"code":"6HC CW"},"size":"6","tipo_1":"Dry","tipo_1_description":"Seco | Dry","tipo_2":"HC","tipo_2_description":"High Cube","condicion":"CW","condicion_description":"Carga | Cargo Worthy","salesforce_id":"6HC CW","id":"7","categoria":"size > 6PIES: Condition > CW: general > Dry > HC","imagenes":"","ancho":"2.43","alto":"2.59","largo":"1.98","peso":"0","tara":null,"container_description":null,"qty":6,"code":"6HC CW"},{"values":{"size":"40","tipo_1":"Special","tipo_1_description":"Special | Especiales","tipo_2":"OT","tipo_2_description":"Open Top","condicion":"CW","condicion_description":"Carga | Cargo Worthy","salesforce_id":"40OT CW","id":"114","categoria":"size > 40PIES: Condition > CW: general > Special > OT","imagenes":"","ancho":"2.43","alto":"2.59","largo":"12.19","peso":"0","tara":null,"container_description":null,"qty":6,"code":"40OT CW"},"size":"40","tipo_1":"Special","tipo_1_description":"Special | Especiales","tipo_2":"OT","tipo_2_description":"Open Top","condicion":"CW","condicion_description":"Carga | Cargo Worthy","salesforce_id":"40OT CW","id":"114","categoria":"size > 40PIES: Condition > CW: general > Special > OT","imagenes":"","ancho":"2.43","alto":"2.59","largo":"12.19","peso":"0","tara":null,"container_description":null,"qty":6,"code":"40OT CW"},{"values":{"size":"40","tipo_1":"Reefer","tipo_1_description":"Refrigerado | Reefer","tipo_2":"RF","tipo_2_description":"Reefer Standard","condicion":"CW","condicion_description":"Carga | Cargo Worthy","salesforce_id":"40RF CW","id":"100","categoria":"size > 40PIES: Condition > CW: general > Reefer > RF","imagenes":"40HCRFCW_1","ancho":"2.43","alto":"2.59","largo":"12.19","peso":"0","tara":null,"container_description":null,"qty":6,"code":"40RF CW"},"size":"40","tipo_1":"Reefer","tipo_1_description":"Refrigerado | Reefer","tipo_2":"RF","tipo_2_description":"Reefer Standard","condicion":"CW","condicion_description":"Carga | Cargo Worthy","salesforce_id":"40RF CW","id":"100","categoria":"size > 40PIES: Condition > CW: general > Reefer > RF","imagenes":"40HCRFCW_1","ancho":"2.43","alto":"2.59","largo":"12.19","peso":"0","tara":null,"container_description":null,"qty":6,"code":"40RF CW"},{"values":{"size":"40","tipo_1":"Dry","tipo_1_description":"Seco | Dry","tipo_2":"HC","tipo_2_description":"High Cube","condicion":"CW","condicion_description":"Carga | Cargo Worthy","salesforce_id":"40HC CW","id":"88","categoria":"size > 40PIES: Condition > CW: general > Dry > HC","imagenes":"40HCCW_1, 40HCCW_2, 40HCCW_3, 40HCCW_4","ancho":"2.43","alto":"2.89","largo":"12.19","peso":"0","tara":null,"container_description":null,"qty":4,"code":"40HC CW"},"size":"40","tipo_1":"Dry","tipo_1_description":"Seco | Dry","tipo_2":"HC","tipo_2_description":"High Cube","condicion":"CW","condicion_description":"Carga | Cargo Worthy","salesforce_id":"40HC CW","id":"88","categoria":"size > 40PIES: Condition > CW: general > Dry > HC","imagenes":"40HCCW_1, 40HCCW_2, 40HCCW_3, 40HCCW_4","ancho":"2.43","alto":"2.89","largo":"12.19","peso":"0","tara":null,"container_description":null,"qty":4,"code":"40HC CW"}]';

	JSON.parse(example1).forEach((item, i) => {
		cartController.cart.unshift(new CartItem(item));
		cartController.cart[0].cartUI();
	});
}