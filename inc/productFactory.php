<?php



function newProduct($product = array(), $product_cat = array(), $product_meta = array()){
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
    // code...
  }

  // update_post_meta( $post_id, '_visibility', $product_meta['_visibility'] );
  // update_post_meta( $post_id, '_stock_status', $product_meta['_stock_status']);
  // update_post_meta( $post_id, 'total_sales', $product_meta['total_sales'] );
  // update_post_meta( $post_id, '_downloadable', $product_meta['_downloadable'] );
  // update_post_meta( $post_id, '_virtual', $product_meta['_virtual'] );
  // update_post_meta( $post_id, '_regular_price', $product_meta['_regular_price'] );
  // update_post_meta( $post_id, '_sale_price', $product_meta['_sale_price'] );
  // update_post_meta( $post_id, '_purchase_note', $product_meta['_purchase_note'] );
  // update_post_meta( $post_id, '_featured', $product_meta['_featured'] );
  // update_post_meta( $post_id, '_weight', $product_meta['_weight'] );
  // update_post_meta( $post_id, '_length', $product_meta['_length'] );
  // update_post_meta( $post_id, '_width', $product_meta['_width'] );
  // update_post_meta( $post_id, '_height', $product_meta['_height'] );
  // update_post_meta( $post_id, '_sku', $product_meta['_sku'] );
  // update_post_meta( $post_id, '_product_attributes', $product_meta['_product_attributes'] );
  // update_post_meta( $post_id, '_sale_price_dates_from', $product_meta['_sale_price_dates_from'] );
  // update_post_meta( $post_id, '_sale_price_dates_to', $product_meta['_sale_price_dates_to'] );
  // update_post_meta( $post_id, '_price', $product_meta['_price'] );
  // update_post_meta( $post_id, '_sold_individually', $product_meta['_sold_individually'] );
  // update_post_meta( $post_id, '_manage_stock', $product_meta['_manage_stock'] );
  // update_post_meta( $post_id, '_backorders', $product_meta['_backorders'] );
  // update_post_meta( $post_id, '_stock', $product_meta['_stock'] );
							// }


  // foreach ($product_cat as $key => $value) {
  //   echo "<p><b>$key:</b> $value</p>";
	// 	$term = get_term_by('slug', $value, 'product_cat');
	// 	$term_id = $term->term_id;
	// 	wp_set_object_terms( $post_id, $term_id, 'product_cat' );
  // // code...
  // }

							// $term = get_term_by('slug', 'asis', 'product_cat');
							// $term_id = $term->term_id;
							wp_set_object_terms( $post_id, $product_cat, 'product_cat' );

							// echo '<br>';
							// echo "<h5>Producto $post_id creado</h5>";
							// echo '<br>';
							// echo '<br>';
							// var_dump($term);
							// echo $post_id;
							return $post_id;

}


 ?>
