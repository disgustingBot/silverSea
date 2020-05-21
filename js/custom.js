d=document;w=window;c=console;
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

    for(i=0;i<this.elements.length;i++){this.elements[i].classList.add("inactive")}
    if(this.j>this.elements.length){this.j=1}
    this.elements[this.j-1].classList.remove("inactive");
    setTimeout(this.carousel, 8000); // Change image every N/1000 seconds

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













// SLIDER TESTIMONIALS
var t=1,e=d.getElementsByClassName("testimonialCarusel");
const showTesti=n=>{
  if(n>e.length){t=1}
  if(n<1){t=e.length}
  for(i=0;i<e.length;i++){e[i].classList.add("inactive");}
  e[t-1].classList.remove("inactive");
}
const testi=()=>{t++;
  for(i=0;i<e.length;i++){e[i].classList.add("inactive");}
  if(t>e.length){t=1}
  e[t-1].classList.remove("inactive");
  setTimeout(testi, 5000); // Change image every N/1000 seconds
}
const plusTesti=n=>{showTesti(t+=n)}
if(e.length>0){showTesti(t);setTimeout(testi, 10000);}



function scrollAlter(){
	if (d.querySelector('#teamCardsContainer')) {
		d.querySelector('#teamCardsContainer').onwheel = (e) => {
			d.querySelector('#teamCardsContainer').scrollLeft += e.deltaY;
			e.preventDefault();
		};
	}
}














// CART CONTROLLER
cartController = {
  currentSemiSelection: {size: false, tipo_1: false, tipo_2: false, condicion: false},
	containerToAdd:false,
  cart: [],
  add: (x) => {
    cartController.cart.unshift(new CartItem(x));
    var a = d.importNode(d.querySelector("#cartItemTemplate").content, true);
    d.querySelector("#dynamicContList").insertBefore(a, d.getElementById("dynamicCont1"));
    console.log(cartController.cart)
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

  selectBoxOption:(key, value = '')=>{

    let a  = d.importNode(d.querySelector("#selectBoxOptionTemplate").content, true),
    option = a.querySelector(".selectBoxOption"),
    input  = a.querySelector(".selectBoxInput"),
    label  = a.querySelector(".selectBoxOptionLabel");
    // Make your changes
    // if(v.tck==1){element.classList.add("ticked")}
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

		d.querySelector('#svgTryStuff').setAttribute('xlink:href', '#pies' + value);
		console.log('value: ', value);

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
		cartController.containerToAdd = cartController.currentSemiSelection.condicion.find(check).salesforce_id;
		// console.log('container To Add: ', cartController.containerToAdd)

		cartController.ready();
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
									// console.log(key);
									selectBoxControler(value, '#selectBox'+key, '#selectBoxCurrent'+key)
									cartController.tipo2Controller(value, true);
								}
								// if(lastCase){
								// 	if (value=='') {
								// 		cartController.selectBoxWipe('Condicion',true)
								// 	}
								// 	cartController.ready();
								// }

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

						if (JSON.parse(v).length == 1) {
							input.setAttribute("checked", true);
							// cartController.cart.unshift(e.id)
						}

						// a los found los tendria que mostrar en la UI
						if (e.condicion == '') {
							cartController.ready()
							cartController.containerToAdd = e.id;
						}
						else {
						// if (e.condicion!='' && e.avanzado_2 == '') {
							d.querySelector('#selectBoxCondicion .selectBoxList').insertBefore(a, null);
						}
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
}
