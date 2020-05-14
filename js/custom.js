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

	galleryController.setup()

  if (d.getElementById("load")) {
    d.getElementById("load").style.top="-100vh";
  }
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



// SLIDER:
galleryController = {
	galleries:[],
	setup:()=>{
		if (d.querySelectorAll('.Gallery')) {
			var carousels = d.querySelectorAll('.Gallery');
			carousels.forEach( (item, i) => {
				galleryController.galleries.unshift(new Gallery(item))
			});
		}
	}
}

class Gallery {
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
  carousel(){j++;

    for(i=0;i<this.elements.length;i++){this.elements[i].classList.add("inactive")}
    if(this.j>this.elements.length){this.j=1}
    this.elements[this.j-1].classList.remove("inactive");
    setTimeout(carousel, 8000); // Change image every N/1000 seconds

  }

  plusDivs(n){this.showDivs(this.j+=n)}
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










//Grow Up Handler o algo así, que se sho...

const counters = d.querySelectorAll('.GrowUp');

const sumar1 = (x) => {
  const target = x.dataset.target,
        step = 30;
        timeDuration = 1500;
  x.innerHTML = parseFloat(x.innerHTML).toFixed() + target / step;
  if(parseFloat(x.innerHTML) < target ){
    setTimeout(() =>{
      sumar1(x);
    }, timeDuration / step)
  }else {
    x.innerHTML = target;
  }
}

counters.forEach((item, i) => {
  sumar1(item);
});



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








function arraysEqual(_arr1, _arr2) {

    if (!Array.isArray(_arr1) || ! Array.isArray(_arr2) || _arr1.length !== _arr2.length)
      return false;

    var arr1 = _arr1.concat().sort();
    var arr2 = _arr2.concat().sort();

    for (var i = 0; i < arr1.length; i++) {

        if (arr1[i] != arr2[i])
            return false;

    }

    return true;

}







// CART CONTROLLER
cartController = {
  currentSemiSelection: {size: false, tipo: false, condicion: false, avanzado: false},
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
    cartController.selectBoxWipe('Tipo');
		cartController.selectBoxWipe('Condicion');
    cartController.selectBoxWipe('Avanzado');
    cartController.currentSemiSelection.tipo = false;
    cartController.currentSemiSelection.condicion = false;
		cartController.currentSemiSelection.avanzado = false;

    cartController.ready(false);
    cartController.currentSemiSelection.size = value;
    cartController.getCol('tipo', value);
  },
  tipoController: (value)=>{
    // PRIMERO VACIAR EL SELECT
    cartController.selectBoxWipe('Condicion');
		cartController.selectBoxWipe('Avanzado');
    cartController.currentSemiSelection.condicion = false;
		cartController.currentSemiSelection.avanzado = false;

    cartController.ready(false);
    cartController.currentSemiSelection.tipo = value;
    cartController.getCol('condicion', cartController.currentSemiSelection.size, value);
  },
  condicionController: (value)=>{
    // PRIMERO VACIAR EL SELECT
		cartController.selectBoxWipe('Avanzado');
		cartController.currentSemiSelection.avanzado = false;

		cartController.ready(false);
    cartController.currentSemiSelection.condicion = value;
		cartController.getCol('avanzado_1', cartController.currentSemiSelection.size, cartController.currentSemiSelection.tipo, value);
    // cartController.getCol('condicion', cartController.currentSemiSelection.condicion, value);
  },
  avanzadoController: (value)=>{
		let seleccion = document.querySelectorAll('[name*="Avanzado"]:checked'),
		opciones = cartController.currentSemiSelection.avanzado;
		seleccion = Array.prototype.slice.call(seleccion);
		var x = seleccion.map( e => e.value );
		// console.log(document.getElementsByName('Avanzado')[0].value)
		// console.log('LENGTH: ',seleccion.length)
		if(seleccion.length==0){
			opciones.forEach((item, i) => {
				if(item.avanzado_1==''){cartController.containerToAdd=item.id}
			})
		} else {
			// let success = array_a.every((val) => array_b.includes(val))

			let nuevasOpciones = [];
			// console.log(x)
			opciones.forEach((opcion, i) => {
				let temp = Object.values(opcion)
				temp.shift();

				cleanArray = temp.filter( a => a == '' ? false : true );

				cleanArray.splice(cleanArray.length - 1, 1);
				nuevasOpciones.push(cleanArray)

			});
			// console.log('seleccion: ', x)
			// console.log('nuevasOpciones: ',nuevasOpciones)




			let posibleOptions = [];

			nuevasOpciones.forEach((opcion, i) => {
				let success = x.every((val) => Object.values(opcion).includes(val))
				let sameLength = (x.length == Object.values(opcion).length) ? true : false;
				// console.log(Object.values(opcion).length);
				// console.log(x.length)
				// console.log('found: ', success, 'same LENGTH: ', sameLength, 'opcion: ',  opcion)
				// if (Object.values(opcion).includes(item.value)) {
				// console.log(x.length)
				// var arr1 = _arr1.concat().sort();
				// console.log('SORTED', x.concat().sort())
				// console.log('SORTED', opcion.concat().sort())
				// if (arraysEqual(x, opcion)) {
				if (success && sameLength) {
					// console.log('item: ', item);
					// console.log('opcion: ', opcion.id);
					cartController.containerToAdd=cartController.currentSemiSelection.avanzado[i].id
					// posibleOptions.push(opcion.id);
					// posibleOptions[opcion.id] = opcion.id;
				}
			})
		}
		// console.log('container To Add: ', cartController.containerToAdd)

		cartController.ready();
    // cartController.getCol('condicion', cartController.currentSemiSelection.condicion, value);
  },

  getCol: (col, size = false, tipo = false, cond = false) => {
		let lastCase = (size &&  tipo &&  cond) ? true : false;
    let dataNames = ['action', 'col'],
    dataValues = ['gatCol', col];
    if(size){dataNames.push('size');dataValues.push(size);}
    if(tipo){dataNames.push('tipo');dataValues.push(tipo);}
    if(cond){dataNames.push('cond');dataValues.push(cond);}

    postAjaxCall(lt_data.ajaxurl,dataNames,dataValues).then(v=>{ // console.log(v)
      try{
				if (!lastCase) {
		      JSON.parse(v).forEach(e=>{
						for(var key in e) {
							var value = e[key],
							key = key[0].toUpperCase() + key.slice(1);
							var a = cartController.selectBoxOption(key,value),
							input = a.querySelector(".selectBoxInput");
							input.setAttribute('type', 'radio');

							if (JSON.parse(v).length == 1) {
								cartController.selectBoxWipe(key, true);

								input.setAttribute("checked", true);
								selectBox = d.querySelector('#selectBox'+key);
								current = d.querySelector('#selectBox'+key+' #selectBoxCurrent'+key);

								d.querySelector('#selectBox'+key+' .selectBoxList').insertBefore(a, null);
								if (value != '') {value = value[0].toUpperCase() + value.slice(1);}

								if(size && !tipo){
									selectBoxControler(value, '#selectBox'+key, '#selectBoxCurrent'+key)
									cartController.tipoController(value);
								}
								if(size &&  tipo){
									selectBoxControler(value, '#selectBox'+key, '#selectBoxCurrent'+key)
									cartController.condicionController(value, true);
								}

							} else {

								functionExecute = 'cartController.sizeController("'+value+'")';
								if(size){functionExecute = 'cartController.tipoController("'+value+'")';}
								if(tipo){functionExecute = 'cartController.condicionController("'+value+'")';}
								input.setAttribute("onchange", functionExecute);

								// Insert it into the document in the right place
								d.querySelector('#selectBox'+key+' .selectBoxList').insertBefore(a, null);
							}
						}
					});
				} else {
					cartController.currentSemiSelection.avanzado = new Array();
					cartController.selectBoxWipe('Avanzado', true);
					JSON.parse(v).forEach(e=>{
						cartController.currentSemiSelection.avanzado[e.id] = e;

						var a = cartController.selectBoxOption('Avanzado',e.avanzado_1),
						input = a.querySelector(".selectBoxInput");
						input.setAttribute('type', 'checkbox');
						input.setAttribute('onclick', 'cartController.avanzadoController(this.value)');

						// a los found los tendria que mostrar en la UI
						if (e.avanzado_1 == '') {
							cartController.ready()
							cartController.containerToAdd = e.id;
						}
						if (e.avanzado_1!='' && e.avanzado_2 == '') {
							d.querySelector('#selectBoxAvanzado .selectBoxList').insertBefore(a, null);
						}

					});
					cartController.currentSemiSelection.avanzado = cartController.currentSemiSelection.avanzado.filter( x => {return x != null;} );
					// console.log('container To Add: ', cartController.containerToAdd)
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
