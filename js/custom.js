d=document;w=window;c=console;


w.onload=()=>{
  // LAZY LOAD FUNCTIONS MODULE
  var lBs=[].slice.call(d.querySelectorAll(".lazy-background")),lIs=[].slice.call(d.querySelectorAll(".lazy")),opt={threshold:.01};
  if("IntersectionObserver" in window){
    let lBO=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting){let l=e.target;l.classList.add("visible");lBO.unobserve(l)}})},opt),
        lIO=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting){let l=e.target;l.classList.remove("lazy");lIO.unobserve(l);l.srcset=l.dataset.url}})},opt);
    lIs.forEach(lI=>{lIO.observe(lI)});lBs.forEach(lB=>{lBO.observe(lB)});
  }

  d.getElementById("load").style.top="-100vh";
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
  d.activeElement.blur();
}

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
  cart: [1,2],
  add: (x) => {
    cartController.cart.unshift(new CartItem(x));
    var a = d.importNode(d.querySelector("#cartItemTemplate").content, true);
    d.querySelector("#dynamicContList").insertBefore(a, d.getElementById("dynamicCont1"));
    c.log(cartController.cart)
  },
	listUI: (v) => {
		// Test to see if the browser supports the HTML template element by checking
		// for the presence of the template element's content attribute.
		if ('content' in d.createElement('template')) {

			// Instantiate the template
			// and the nodes you will control
			var a = d.importNode(d.querySelector("#cartItemTemplate").content, true);
			// element = a.querySelector(".element"),
			// eColor  = a.querySelector(".eColor"),
			// eChild  = a.querySelector(".eChild"),
			// eTxt    = a.querySelector(".eTxt"),
			// eNav    = a.querySelector(".eNavigate");
			// Make your changes
			// if(v.tck==1){element.classList.add("ticked")}
			// element.setAttribute('id', 'listElement'+this.ord);
			// element.setAttribute('tck', this.tck);
			// element.setAttribute("onclick", "box.selectElement("+this.ord+")");
			// element.setAttribute("ondblclick", "box.loadElements("+JSON.stringify(v)+")");
			// eColor.style.background = "var(--clrPty" + this.pty + ")";
			// eChild.style.color = "var(--clrPty" + this.pty + ")";
			// eTxt.textContent = v.txt;
			// eNav.setAttribute("onclick", "box.loadElements("+JSON.stringify(this)+")");
			// Insert it into the document in the right place
			d.querySelector("#dynamicContList").insertBefore(a, d.getElementById("dynamicCont1"));
		}
		else { // Find another way to add the rows to the table because the HTML template element is not supported.
			c.log("ERROR: your browser does not support required features for the app");
		}
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
