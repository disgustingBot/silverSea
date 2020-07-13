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
			if (cartController.cart.length>0) {
				alert('debes vaciar tu carrito primero')
			} else {

				cotizador.classList.add('tren');
				trenController.select40DCCW();
				trenController.setPointerEvents('none');

				buttonFinish.onclick = trenController.finish
	
				accordionSelector('#destino')
			}
		}

		if(option!='tren' && cotizador.classList.contains('tren')){
			cotizador.classList.remove('tren');
			productSelector.unselectAll();
			trenController.setPointerEvents('auto');

			buttonFinish.onclick = cartController.finish


			accordionSelector('#destino')
		}


	},

	finish:()=>{
		// console.log('ooooootre testeeeo')

		// // TODO: que no te deje finalizar consulta si no seleccionas cantidad
		// TODO: no dejar que la consulta termine si no seleccionan lugar
		// TODO: que se guarden las locaciones en cookies



		var formData = new FormData();
		formData.append( 'action', 'lt_tren_end' );
		formData.append( 'cont', "40DC CW" );
		formData.append( 'origen_country', locationSelector.origen[0].capitalize() );
		formData.append( 'origen_city', locationSelector.origen[1].capitalize() );
		formData.append( 'destino_country', locationSelector.destino[0].capitalize() );
		formData.append( 'destino_city', locationSelector.destino[1].capitalize() );


		ajax2(formData).then( data => {
			// console.log(data)
			// precio_origen_data = [data['precio_origen'], data['gastos']]
			// precio_destino_data = [data['precio_destino'], data['gastos']]
			data['precio_origen'].push(data['exchange'])
			data['precio_destino'].push(data['exchange'])
			let gastos = data['gastos'] ? parseInt(data['gastos'].profit) + parseInt(data['gastos'].deposit) + parseInt(data['gastos'].others) : 0;

			precio_origen = processPrice(data['precio_origen'], false)
			precio_destino = processPrice(data['precio_destino'], false)

			// console.log('precio_origen', precio_origen)
			// console.log('precio_destino', precio_destino)

			final_price = precio_origen - precio_destino + gastos
			console.log('final_price', final_price)

			// trenController.precio_en_origen = processPrice(data, false)[0]

			// var formData = new FormData();
			// formData.append( 'action', 'lt_cart_end' );
			// formData.append( 'cont', "40DC CW" );
			// formData.append( 'country', locationSelector.destino[0] );
			// formData.append( 'city', locationSelector.destino[1] );


			// ajax2(formData).then( data => {
			// 	respuesta = processPrice(data, false)
			// 	trenController.precio_en_destino = respuesta[0]
			// 	trenController.gastos_adicionales = respuesta[1]
			// 	// gastos = respuesta[1]
			// 	if(!singlePrice){
			// 		totalPrice = 'Precio no disponible';
			// 		currency = '';
			// 	} else {
			// 		// totalPrice = singlePrice * parseInt(itemQty);
			// 	}
			// 	console.log('precio en destino: ', singlePrice)

			// });



			// cartController.cart[i].setPrice(singlePrice);
			// nuevoElemento = new CartItem(cartController.cart[i].values)
			// cartController.cart[i] = nuevoElemento;


			
			// console.log('El NUEVO ELEMENTO!!!',new CartItem(cartController.cart[i].values))
			// console.log(cartController.cart[i]);


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
	select40DCCW:()=>{
		selectBoxControler('40 Pies', '#selectBoxSize', '#selectBoxCurrentSize')
		d.querySelector('[value="40-pies"]').checked = true

		selectBoxControler('Dry', '#selectBoxTipo_1', '#selectBoxCurrentTipo_1')
		d.querySelector('[value="Dry"]').checked = true

		selectBoxControler('Standard', '#selectBoxTipo_2', '#selectBoxCurrentTipo_2')
		d.querySelector('[value="DC"]').checked = true

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
				locationSelector.searchLocation('origen')
			};
		})

		
		inputs = [...coprAlqui.querySelectorAll('#destino .selectBoxInput')]
		inputs.forEach((input)=>{
			input.onchange = ()=>{
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
		})
	},

	
	searchLocation:(option)=>{
		let coprAlqui = d.querySelector('.coprAlqui');
		let selected = [...coprAlqui.querySelectorAll('#'+option+' .selectBoxInput:checked')];

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
			locationSelector[option] = [
				coprAlqui.querySelector('#selectBox'+option.capitalize()+'Country .selectBoxInput:checked').value,
				coprAlqui.querySelector('#selectBox'+option.capitalize()+'City .selectBoxInput:checked').value,
			]
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
		productSelector.unselectAll();
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
			// console.log(productSelector.allProducts)
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
			d.querySelector('#currentSemiSelection'+selector.name).setAttribute('xlink:href', '#'+selector.value);
			// console.log(selector.name)
			// console.log(selector.value)
			// let input = selector.querySelector('[checked=true]')
			// console.log(input)
		})
		// TODO: hacer el cambio de iconos en el selector de la front page, mas o menos asi:

	},

}







const processPrice = (data, gastos_adicionales = true)=>{

	console.log(data)
	if (data[1]) {
		let exchange = data.pop()
		console.log(exchange)
		data.forEach(element => {
			if(element.currency.includes('USD')){
				element.currency = 'EUR'
				element.supplier_price = element.supplier_price * exchange.rate
				element.fixed_price = element.fixed_price * exchange.rate
				element.sale_price = element.sale_price * exchange.rate
			}
		});

		if (data[0].fixed_price!=0) {
			singlePrice = parseFloat(data[0].fixed_price)
		}else if(data[0].sale_price!=0){
			singlePrice = parseFloat(data[0].sale_price - 300)
		}else if(!data[1]){
			singlePrice = parseFloat(data[0].supplier_price)
		}else{
			let prices = data.map( x => x.supplier_price );
			let pricesSort = prices.sort((a, b) => a - b).slice(0, 2);
			let average = (parseInt(pricesSort[0]) + parseInt(pricesSort[1])) / 2;
			singlePrice = average;
		}
		// totalPrice = singlePrice * parseInt(itemQty);
		if(singlePrice == 0){
			final_price = false;
		} else{
			if(data[0].profit && gastos_adicionales){
				singlePrice += parseInt(data[0].profit) + parseInt(data[0].others) + parseInt(data[0].deposit)
			}
			final_price = singlePrice
		}

	} else {
		final_price = false;
	}

	return final_price
}










// TODO: pasar todo a minuscula... como no se me ocurrio antes???!?!?
// CART CONTROLLER
cartController = {
	setup:()=>{
		if (d.querySelector('#cotizador')) {
			// cartController.ready(false);
			// cartController.getCol('Size');
		}
		// cartController.getLocation();
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
	},
	// currentSemiSelection: {code: false, qty: 1, size: false, tipo_1: false, tipo_2: false, condicion: false, singlePrice: 0},
	containerToAdd:false,
	cart: [],
	cartToLeads: [],
	allProducts:{},
	


	finish:()=>{
		console.log('carrito antes de la transforrmacion', cartController.cart)
		cartController.cart.forEach((item, i) => {
			// cartController.getPrice(item.code);
			// console.log(item);

			var formData = new FormData();
			formData.append( 'action', 'lt_cart_end' );
			formData.append( 'cont', item.code );
			formData.append( 'country', locationSelector.origen[0] );
			formData.append( 'city', locationSelector.origen[1] );
			// console.log('formData');

			// Display the key/value pairs
			// for (var pair of formData.entries()) {
			// 	console.log(pair[0]+ ', ' + pair[1]);
			// }
			ajax2(formData).then( data => {
				let cartItem = d.querySelector('.cartItem[data-code="'+item.code+'"]');
				let itemQty = cartItem.querySelector('.cartItemQty').innerText;
				let itemPrice = cartItem.querySelector('.cartItemPriceNumber');
				let itemCurrency = cartItem.querySelector('.cartItemCurrency');
				let currency = 'EUR';


				singlePrice = processPrice(data)
				if(!singlePrice){
					totalPrice = 'Precio no disponible';
					currency = '';
				} else {
					totalPrice = singlePrice * parseInt(itemQty);
				}

				// console.log('mi nuevo calculador de precio dice: ', singlePrice)




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


				// TODO chequear que lleguen todas las respuestas, no que estemos en la ultima
				if (i==cartController.cart.length - 1){
					console.log('CARRITO luego de la transformacion', cartController.cart)
					// cartController.sendMail();
				}
				// d.querySelector('.cartItem[data-code="'+x.code+'"] .cartItemQty').innerText = parseInt(d.querySelector('.cartItem[data-code="'+x.code+'"] .cartItemQty').innerText) + parseInt(x.qty);
				// }


				itemCurrency.innerText = currency
				itemPrice.innerText = totalPrice;
			})
		});

		altClassFromSelector('alt', '#finalizarConsulta')
		d.querySelector('#cart').classList.add('alt')

		// TODO: encender el lead Sender
		// cartController.cartToLeads = cartController.cart;
		// createCookie('status','next')
		// cartController.sendAllLeads();
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

		// str.split(search).join(replacement)
		console.log(cartController.cart);
		createCookie('cart', JSON.stringify(cartController.cart).split(';').join(':'));

		
		// this part makes sure to only let you finish the consulta si tenes algo en el carrito
		let endButton = d.querySelector('#cotizadorEndButton');
		let isTheCartEmpty = cartController.cart.length < 1;
		endButton.disabled = isTheCartEmpty;

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
		let endButton = d.querySelector('#cotizadorEndButton');
		let isTheCartEmpty = cartController.cart.length < 1;
		endButton.disabled = isTheCartEmpty;
	},


	sendAllLeads:()=>{
		// if(readCookie('status')=='next'){
		// eraseCookie('status')
		
		// cartController.cartToLeads.forEach(product=>{
			
		let product = cartController.cartToLeads.shift();
		console.log('send '+product.qty+' product: ', product.code)
		

		let info = {
			fname:    d.querySelector('#mateputNombre').value,
			email:    d.querySelector('#mateputEmail').value,
			phone:    d.querySelector('#mateputTelefono').value,
			country:  d.querySelector('#selectBoxOrigenCountry .selectBoxInput:checked').value,
			city:     d.querySelector('#selectBoxOrigenCity .selectBoxInput:checked').value,
			code:     product.code,
			type:     product.tipo_2,
			size:     product.size,
			quantity: product.qty,
			company:  '-',
			lname:    '-',
			message:  '-',
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
		eraseCookie('allLeads')
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
	// console.log(location.pathname+where);
	window.location = location.pathname + where;
}




const filterActivate = ()=>{

	if (d.querySelector('#filterButtonAFK')){
		link = d.querySelector('#filterButtonAFK')
		cosos1 = [...d.querySelectorAll('[name=question1]')];
		cosos2 = [...d.querySelectorAll('[name=question2]')];

		urlBase = 'https://silverseacontainers.com/buscar-contenedor/'
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
	if(d.querySelector('[name=cont_selector')){
		d.querySelector('[name=cont_selector').onchange=(option)=>{
			let button = d.querySelector('.cotizarContainer'),
			// urlBase = 'http://localhost/silverSea/buscar-contenedor/'
			urlBase = 'https://silverseacontainers.com/buscar-contenedor/'
			console.log(option.target.value)
			card = option.target.value
			if(card == 'card67'){
				button.href = urlBase + '?use=storage-new';
			}
			if(card == 'card68'){
				button.href = urlBase + '?use=cargo-dry';
			}
			if(card == 'card69'){
				button.href = urlBase + '?use=reefer';
			}
		}
	}
}
