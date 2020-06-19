<?php

function newProduct($product = array(), $product_cat = array(), $product_meta = array(), $imagenes = array()){
	// $user_id = 1;

	$product_defaults = array(
		'post_author'            => 1,
		'post_title'             => 'Product Name',
		'post_content'           => 'Product Description Lorem Ipsum Dolor',
		'post_status'            => 'publish',
		'post_type'              => 'product',
		'product_type'           => 'simple',
	);
	$product_meta_defaults = array(
		'_visibility'            => 'visible',
		'_stock_status'          => 'instock',
		'total_sales'            => '0',
		'_downloadable'          => 'no',
		'_virtual'               => 'yes',
		'_regular_price'         => '',
		'_sale_price_dates_from' => '',
		'_sale_price'            => '',
		'_purchase_note'         => '',
		'_featured'              => 'no',
		'_weight'                => '',
		'_length'                => '',
		'_width'                 => '',
		'_height'                => '',
		'_sku'                   => '',
		'_product_attributes'    => array(),
		'_sale_price_dates_to'   => '',
		'_price'                 => '',
		'_sold_individually'     => '',
		'_manage_stock'          => 'no',
		'_backorders'            => 'no',
		'_stock'                 => '',
	);

	foreach ($product_defaults as $key => $value) {
		if(!isset($product[$key])){$product[$key] = $value;}
	}
	foreach ($product_meta_defaults as $key => $value) {
		if(!isset($product_meta[$key])){$product_meta[$key] = $value;}
	}

	$post_id = wp_insert_post( array(
		'post_author'  => $product['post_author'],
		'post_title'   => $product['post_title'],
		'post_content' => $product['post_content'],
		'post_status'  => $product['post_status'],
		'post_type'    => $product['post_type'],
	) );
	wp_set_object_terms( $post_id, $product['product_type'], 'product_type' );


	foreach ($product_meta as $key => $value) {
	update_post_meta( $post_id, $key, $value );
	}

	// $term = get_term_by('slug', 'asis', 'product_cat');
	// $term_id = $term->term_id;

	wp_set_object_terms( $post_id, $product_cat, 'product_cat' );

	if (is_array($imagenes)) {
		if ($imagenes[0]=='') {
			$image_id = get_attachment_id_by_slug( 'no_photo_container' );
		}else{
			$image_id = get_attachment_id_by_slug( $imagenes[0] );
			$commaList = '';
			// code...
			for ($i=1; $i < count($imagenes); $i++) {
				// code...
				$img_id = get_attachment_id_by_slug( $imagenes[$i] );
				if ($i==1) {
					$commaList = $img_id;
				} else {
					$commaList = $commaList . ',' . $img_id;
				}
			}
		}
	} else if($imagenes == '') {
		$image_id = get_attachment_id_by_slug( 'no_photo_container' );
	} else {
		$image_id = get_attachment_id_by_slug( $imagenes );
	}


// $commaList = "20FRCW_1,2ODCCW_1";
	update_post_meta( $post_id, '_product_image_gallery', $commaList);

	// $image_id = get_attachment_id_by_slug( '40RFASIS_1' );
	set_post_thumbnail ( $post_id, $image_id );

	// echo '<br>';
	// echo "<h5>Producto $post_id creado</h5>";
	// echo '<br>';
	// echo '<br>';
	// var_dump($term);
	// echo $post_id;
	return $post_id;

}





// function get_attachment_url_by_slug( $slug ) {
function get_attachment_id_by_slug( $slug ) {
	$args = array(
	'post_type' => 'attachment',
	'name' => sanitize_title($slug),
	'posts_per_page' => 1,
	'post_status' => 'inherit',
	);
	$_header = get_posts( $args );
	$header = $_header ? array_pop($_header) : null;
	// return $header ? wp_get_attachment_url($header->ID) : '';
	return $header->ID;
}


?>
