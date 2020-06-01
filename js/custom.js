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

	if(d.querySelector('#cotizador')){
		cartController.ready(false);
		cartController.getCol('Size');
		cartController.getLocation()
		cartController.getLocation(false, 'Destino')
	}

	carouselController.setup()
	growUpController.setup()
	obseController.setup()


  if (d.getElementById("load")) {
    d.getElementById("load").style.top="-100vh";
  }
	scrollAlter();



}



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



// CAROUSEL:
carouselController = {
	carousels:[],
	setup:()=>{
		if (d.querySelectorAll('.Carousel')) {
			var carousels = d.querySelectorAll('.Carousel');
			carousels.forEach( carousel => {
				carouselController.carousels.unshift(new Carousel(carousel))
			});
		}
	}
}

class Carousel {
	constructor(gallery){
		// TODO: quitar la propiedad "values" y reemplazar por nueva implementacion
		this.j = 1;
		this.elements = gallery.querySelectorAll('.Element');
		this.title = gallery.id;

	  gallery.querySelector('#nextButton').onclick = () =>{this.plusDivs(+1)}
	  gallery.querySelector('#prevButton').onclick = () =>{this.plusDivs(-1)}
		if(this.elements.length>0){this.showDivs(this.j);setTimeout(this.carousel, 8000);}

	}

  showDivs(n){

    if(n>this.elements.length){this.j=1}
    if(n<1){this.j=this.elements.length}
    for(i=0;i<this.elements.length;i++){this.elements[i].classList.add("inactive")}
    this.elements[this.j-1].classList.remove("inactive");

  }
  carousel(){this.j++;
		if (this.elements) {
			for(i=0;i<this.elements.length;i++){this.elements[i].classList.add("inactive")}
			if(this.j>this.elements.length){this.j=1}
			this.elements[this.j-1].classList.remove("inactive");
			setTimeout(this.carousel, 8000); // Change image every N/1000 seconds
		}

  }

  plusDivs(n){this.showDivs(this.j+=n)}
}




// OBSE:
obseController = {
	obses:[],
	setup:()=>{
		if (d.querySelectorAll('.Obse')) {
			var obses = d.querySelectorAll('.Obse');
			obses.forEach( obse => {
				obseController.obses.unshift(new Obse(obse))
			});
		}
	}
}

class Obse {
	constructor(element){
		// TODO: quitar la propiedad "values" y reemplazar por nueva implementacion
		this.j = 1;
		this.id = element.id;
		this.observe = d.querySelector(element.dataset.observe);
		this.unobserve = element.dataset.unobserve;
		// console.log(this.observe);
		// console.log(this.unobserve);

		this.options = { root: null, threshold: 1, rootMargin: "0px 0px 0px 0px" };
		this.observer = new IntersectionObserver(function(entries, observer){
			entries.forEach(entry => {
				// const x = d.querySelector('#'+this.id);
				if(entry.isIntersecting){
					// if(!reverse){
					element.classList.add('observed')
					// } else {
						// x.classList.remove('observed')
						// }
					if(this.unobserve=='true'){observer.unobserve(entry.target)}
				} else {
				// if(!reverse){
					element.classList.remove('observed')
					// } else {
						// x.classList.add('observed')
						// }
				}
			})
		}, this.options);

		this.activate();

	}

	activate(){
		// console.log()
		// d.querySelectorAll(observado).forEach(e => {
			this.observer.observe(this.observe);
		// })
	}
}









// OBSE:
//Grow Up Handler o algo así, que se sho...
growUpController = {
	growUps:[],
	setup:()=>{
		if (d.querySelectorAll('.GrowUp')) {
			var growUps = d.querySelectorAll('.GrowUp');
			growUps.forEach( growUp => {
				growUpController.growUps.unshift(new GrowUp(growUp))
			});
		}
	},
	again:()=>{
		growUpController.growUps.forEach( growUp => {
			growUp.again();
		});
	}
}
class GrowUp {
	constructor(element){
		// console.log(element);
		this.element = element;
		this.className = element.className;
		this.target = element.dataset.target;
		this.step = 50;
		this.timeDuration = 1500;
		this.current = parseFloat(element.innerHTML);

		this.config = { attributes: true, childList: true, characterData: true }

		this.init();
	}

	init(){
		this.observer = new MutationObserver( (mutations) => {
	    mutations.forEach((mutation) => {
        if (mutation.type === 'attributes') {
					if (mutation.target.className.includes('observed')) {
						console.log(mutation.target.className)
						this.grow();
					}
        }
	    });
		});
		this.observer.observe(this.element, this.config);
	}

	grow(){
		this.observer.disconnect();
		this.current = this.current + this.target / this.step;
		// console.log('number of ' + this.element.id + ', is: ', this.current);
		this.element.innerHTML = parseInt(this.current);
		if (parseFloat(this.element.innerHTML) < this.target ) {
			setTimeout(() =>{
				this.grow();
			}, this.timeDuration / this.step)
		} else {
			this.element.innerHTML = this.target;
		}
	}
	again(){
		this.element.innerHTML = 0;
		this.current = 0;
		// this.grow();
		setTimeout(() =>{
			this.grow();
		}, 1000)
	}
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



















// quantity selector on the thing
const changeQuantity = (value) => {
  let quantity = parseInt(d.querySelector('#addToCartQantity').value);
  quantity += value;
  if (quantity<=1) {
    quantity = 1;
  }
  d.querySelector('#addToCartQantity').value       = quantity;
  // d.querySelector('#myAddToCart').dataset.quantity = quantity;
}












// SELECT BOX CONTROLER
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














//Accordion //Desplegable
var acc = d.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click",()=>{
    this.classList.toggle("active");
    // TODO: Hacer que se puede elegir el elemento a acordionar
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {d
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
		d.querySelector('.updateText').innerHTML = "Eliminando productos viejos";
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
				let porcentage = productSincrotron.created.length * 100 / productSincrotron.qnty;
				d.querySelector('.loadBarProgress').style.width = porcentage + '%';

				d.querySelector('.loadBarProgress').style.width = '100%';
				d.querySelector('.updateText').innerHTML = "Todos los productos eliminados";
				setTimeout(1000, productSincrotron.productFabrik());
				// productSincrotron.productFabrik();

			}
			// if (data.status == 'No hay productos') {
			// 	// productSincrotron.wipeProducts();
			// 	d.querySelector('.loadBarProgress').style.width = '100%';
			// 	d.querySelector('.updateText').innerHTML = "Todos los productos eliminados";
			// 	setTimeout(1000, productSincrotron.productFabrik());
			// 	// productSincrotron.productFabrik();
			// }else{
			// 	// productSincrotron.wipeProducts();
			// }
		})
	},
	productFabrik:()=>{
		d.querySelector('.loadBarProgress').style.width = '0%';
		d.querySelector('.updateText').innerHTML = "Creando productos";
		// productSincrotron.products = [{sku: "6DC CW",Description:''}]
		// productSincrotron.products.unshift({sku: "6DC CW",Description:''});
		// console.log('cantidad de productos a crear: ', productSincrotron.products.length);
		for (var i = 0; i < 1; i++) {
			// productSincrotron.temp.unshift(productSincrotron.products.shift(productSincrotron.products[i]));
			let productoZero = productSincrotron.products.splice(0, 1);
			productSincrotron.temp.unshift(productoZero[0]);
			// console.log(productoZero)
			// array[i]
		}
		// console.log('cantidad de productos a crear', productSincrotron.products.length);
		// console.clear();

		console.log('envio a fabricar:')
		console.log(productSincrotron.temp);
			let formData = new FormData();
			formData.append('products', JSON.stringify(productSincrotron.temp));
			formData.append('action', 'lt_create_products');
			console.log('enviando '+productSincrotron.temp.length+' producto/s para crear');
			ajax3(formData).then(data => {
				// d.querySelector('.updateText').innerHTML = "Let's wipe things!";
				// productSincrotron.created.unshift(productSincrotron.temp.shift());;
				// console.log('largo del vector temp: ', productSincrotron.temp.length);
				for (var i = 0; i < productSincrotron.temp.length; i++) {
					productSincrotron.created.unshift(productSincrotron.temp.splice(0, 1));
				}
				// console.log(data);
				console.log('products created: ', productSincrotron.created.length)
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
// console.log(productSincrotron);


// const url = 'process.php'
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
		altClassFromSelector('loaded', '#updateController', 'updateController');
		d.querySelector('.updateText').innerHTML = 'Tabla actualizada!, el Sicrotron esta en desarrollo.';
		console.log('archivo subido, base de datos actualizada');
		productSincrotron.products = data;
		productSincrotron.qnty = productSincrotron.products.length;
		if(!data.gate7){
			productSincrotron.wipeProducts();
		}
	});
}

async function ajax2(formData) {
  try{
	  let response = await fetch(lt_data.ajaxurl, {
			method: 'POST',
			body: formData,
		});
    return await response.json();
  }catch(err){
    console.error(err);
  }
}

async function ajax3(formData) {
  try{
	  let response = await fetch(lt_data.ajaxurl, {
			method: 'POST',
			body: formData,
		});
    // return await response.json();
		return await response.text();
  }catch(err){
    console.error(err);
  }
}





























// TODO: pasar todo a minuscula... como no se me ocurrio antes???!?!?
// CART CONTROLLER
cartController = {
  currentSemiSelection: {code: false, qty: 1, size: false, tipo_1: false, tipo_2: false, condicion: false},
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
		ajax2(formData).then( data => {

			JSON.parse(data.location).forEach( e => {

				for(var key in e) {
					var value = e[key].replace(/(?:\r\n|\r|\n)/g, '');
					key = option + key.capitalize();
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
	// cart: [{code:'20DC NEW'}],
	// cart: [{code:'20DC CW'}],
	// locationOrigen:{
	// 	// country:'ARGENTINA',
	// 	// city:'BUENOS AIRES',
	// 		country:'BELGIUM',
	// 		city:'ANTWERP',
	// },
	finish:()=>{
		cartController.cart.forEach((item, i) => {
			// cartController.getPrice(item.code);
			console.log(item.code);
		});

	},
	getPrice:(code)=>{
		console.log('terminar consulta!!')
		// console.log(cartController.cart[0].code)
		console.log( cartController.locationOrigen['country'] );
		console.log( cartController.locationOrigen['city'] );
		var formData = new FormData();
		formData.append( 'action', 'lt_cart_end' );
		formData.append( 'cont', code );
		// formData.append( 'cont', cartController.cart[0].code );
		formData.append( 'country', cartController.locationOrigen['country'] );
		formData.append( 'city', cartController.locationOrigen['city'] );
		ajax2(formData).then( data => {
			console.log(data)
			let prices = data.map((x)=>{
				return x.supplier_price;
			})
	    let pricesSort = prices.sort((a,b) => a - b).slice(0, 2);
			let average = (parseInt(pricesSort[0]) + parseInt(pricesSort[1])) / 2;

			let finalPrice = average + 200;
	    console.log(average);
			alert('tu precio es: ' + finalPrice)

			// data.forEach((item, i) => {
			// 	console.log(item.supplier_price)
			//
			// });
			// var arr = [5, 4, 7, 2, 10, 1];
	    // let res = arr.sort((a,b) => a - b).slice(0, 2);
	    // console.log(res);

		})
	},
  add: (x) => {
		const check = (element) => {
			return element.code == x.code;
		}
		if (cartController.cart.find(check)) {
			cartController.cart.find(check).qty += x.qty
			d.querySelector('.cartItem[data-code="'+x.code+'"] .cartItemQty').innerText = parseInt(d.querySelector('.cartItem[data-code="'+x.code+'"] .cartItemQty').innerText) + x.qty;
		} else {
			cartController.cart.unshift(new CartItem(x));
			cartController.cart[0].cartUI();
			console.log(cartController.cart)
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

		d.querySelector('#dynamicContLogo').setAttribute('xlink:href', '#' + value + '-pies');
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

		d.querySelector('#dynamicContLogo').setAttribute('xlink:href', '#' + value);

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
		d.querySelector('#dynamicContLogo').setAttribute('xlink:href', '#' + value);
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


		value = value.replace(/\s/g, '');
		d.querySelector('#dynamicContLogo').setAttribute('xlink:href', '#' + value);
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
		// Esta parte define las propiedades del elemento como vienen del objeto v
		for(var k in v){Object.defineProperty(this,k,{enumerable: true,value:v[k]})}
	}


	cartUI(){
		let cartItemTemplate = d.importNode(d.querySelector("#cartItemTemplate").content, true);
		// console.log(cartItemTemplate);
		let cartItem = cartItemTemplate.querySelector(".cartItem");
		cartItem.setAttribute('data-code', this.code);

		let cartItemQty = cartItemTemplate.querySelector(".cartItemQty");

		let cartItemSize = cartItemTemplate.querySelector(".cartItemSize .use");
		let cartItemTip1 = cartItemTemplate.querySelector(".cartItemTip1 .use");
		let cartItemTip2 = cartItemTemplate.querySelector(".cartItemTip2 .use");
		let cartItemCond = cartItemTemplate.querySelector(".cartItemCond .use");

		let close = cartItemTemplate.querySelector(".close");

		cartItemQty.innerText = this.qty;
		// cartItemQty.innerText = this.ord;
		cartItemSize.setAttribute('xlink:href', '#pies' + this.size);
		cartItemTip1.setAttribute('xlink:href', '#' + this.tipo_1);
		cartItemTip2.setAttribute('xlink:href', '#' + this.tipo_2);
		cartItemCond.setAttribute('xlink:href', '#' + this.condicion);

		close.setAttribute('onclick', 'cartController.remove("' + this.code + '")');


    d.querySelector('.cartList').insertBefore(cartItemTemplate, null);
	}
}
