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

  cartController.ready(false);
  cartController.getCol('Size');
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
// TODO: mejorar modulo para poder reutilizarlo sin duplicar codigo
var j=1;
var x=d.getElementsByClassName("carouselItem");
var carousels = d.querySelectorAll('.gallery');
carousels.forEach((item, i) => {
  // c.log(item.querySelectorAll('.element'));
  let j=1,x=item.getElementsByClassName("element");


  const showDivs=n=>{

    if(n>x.length){j=1}
    if(n<1){j=x.length}
    for(i=0;i<x.length;i++){x[i].classList.add("inactive")}
    x[j-1].classList.remove("inactive");

  }
  const carousel=()=>{j++;

    for(i=0;i<x.length;i++){x[i].classList.add("inactive")}
    if(j>x.length){j=1}
    x[j-1].classList.remove("inactive");
    setTimeout(carousel, 8000); // Change image every N/1000 seconds

  }

  const plusDivs=n=>{showDivs(j+=n)}

  if(x.length>0){showDivs(j);setTimeout(carousel, 8000);}

  item.querySelector('#nextButton').onclick = () =>{plusDivs(+1)}
  item.querySelector('#prevButton').onclick = () =>{plusDivs(-1)}

});









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
















// CART CONTROLLER
cartController = {
  currentSemiSelection: {size: false, tipo: false, condicion: false,},
  cart: [1,2],
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
      console.log(btn);
      selector.classList.add('ready')
    } else {
      btn.disabled = true;
      console.log(btn);
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
    // selectBox = d.querySelector('#selectBox'+nombre);
    // current = d.querySelector('#selectBox'+nombre+' #selectBoxCurrent'+nombre);

    // selectBox.classList.remove('alt');
    // current.innerHTML = '';
    selectBoxControler('', '#selectBox'+nombre, '#selectBoxCurrent'+nombre);
    // TODO: falta quitar la seleccion actual
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
    cartController.currentSemiSelection.tipo = false;
    cartController.currentSemiSelection.condicion = false;

    cartController.ready(false);
    cartController.currentSemiSelection.size = value;
    cartController.getCol('tipo', value);
  },
  tipoController: (value)=>{
    // PRIMERO VACIAR EL SELECT
    cartController.selectBoxWipe('Condicion');
    cartController.currentSemiSelection.condicion = false;

    cartController.ready(false);
    cartController.currentSemiSelection.tipo = value;
    cartController.getCol('condicion', cartController.currentSemiSelection.size, value);
  },
  condicionController: (value, oneOption = false)=>{
    if(oneOption){
      let key = 'Condicion';
      cartController.selectBoxWipe(key, true);
      var a = cartController.selectBoxOption(key,value),
          input = a.querySelector(".selectBoxInput");

      input.setAttribute("checked", true);
      selectBox = d.querySelector('#selectBox'+key);
      current = d.querySelector('#selectBox'+key+' #selectBoxCurrent'+key);
      d.querySelector('#selectBox'+key+' .selectBoxList').insertBefore(a, null);


      selectBoxControler(value, '#selectBoxCondicion', '#selectBoxCurrentCondicion')
    }
    // PRIMERO VACIAR EL SELECT
    cartController.currentSemiSelection.condicion = value;
    cartController.ready();
    // cartController.getCol('condicion', cartController.currentSemiSelection.condicion, value);
  },

  getCol: (col, size = false, tipo = false) => {
    let dataNames = ['action', 'col'],
    dataValues = ['gatCol', col];
    if(size){
      dataNames.push('size');
      dataValues.push(size);
    }
    if(tipo){
      dataNames.push('tipo');
      dataValues.push(tipo);
    }

    postAjaxCall(lt_data.ajaxurl,dataNames,dataValues).then(v=>{ // console.log(v)
      try{
        // d.querySelector('#cotizador').innerHTML = v;
        //borrar el nul
        // if (JSON.parse(v).length == 1) {
        //   console.log('Largo = 1')
        //   let nombre = col[0].toUpperCase() + col.slice(1);
        //   cartController.selectBoxWipe(nombre, true);
        //   // TODO: tambien falta preseleccionar la unica opcion cuando hay una sola
        // }


        JSON.parse(v).forEach(e=>{
          for(var key in e) {
            var value = e[key],
            key = key[0].toUpperCase() + key.slice(1);
            // console.log(key);
            // console.log('#selectBox'+key+' .selectBoxList');
            var a = cartController.selectBoxOption(key,value),
                input = a.querySelector(".selectBoxInput");


            if (JSON.parse(v).length == 1) {
              // TODO: tambien falta preseleccionar la unica opcion cuando hay una sola
              cartController.selectBoxWipe(key, true);
              input.setAttribute("checked", true);
              selectBox = d.querySelector('#selectBox'+key);
              current = d.querySelector('#selectBox'+key+' #selectBoxCurrent'+key);
              console.log(key);
              // console.log(current.innerHTML = value);

              // selectBox.classList.add('alt');
              // current.innerText = value;
              console.log(input);
              d.querySelector('#selectBox'+key+' .selectBoxList').insertBefore(a, null);
              value = value[0].toUpperCase() + value.slice(1);
              selectBoxControler(value, '#selectBox'+key, '#selectBoxCurrent'+key)

              if(size){
                console.log(value);
                cartController.tipoController(value);
              }
              if(size && tipo){
                // value = value[0].toUpperCase() + value.slice(1);
                cartController.condicionController(value, true);
              }

            } else {

              functionExecute = 'cartController.sizeController("'+value+'")';
              if(size){
                functionExecute = 'cartController.tipoController("'+value+'")';
              }
              if(tipo){
                functionExecute = 'cartController.condicionController("'+value+'")';
              }
              input.setAttribute("onchange", functionExecute);

              // Insert it into the document in the right place
              d.querySelector('#selectBox'+key+' .selectBoxList').insertBefore(a, null);
            }
          }
        });
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
