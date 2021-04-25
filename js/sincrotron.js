
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
		console.log(productSincrotron.temp[0]);
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
