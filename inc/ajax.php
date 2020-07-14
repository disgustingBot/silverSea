<?php
add_action('pre_get_posts','alter_query');

function alter_query($query) {
	if(!is_admin()){
		//gets the global query var object
		global $wp_query;
		$max_page = $query->max_num_pages;
		// var_dump($max_page);

		//gets the front page id set in options
		$front_page_id = get_option('page_on_front');

		if ( !$query->is_main_query() ) return;

			// $args['paged'] = $page;
			// if (isset($_GET['page']) AND $_GET['page'] <= $max_page ) {
		if (isset($_GET['page'])) {
			$query-> set('paged' , $_GET['page']);
		} else {
			$query-> set('paged' , 1);
		}

		$filters = array('dry', 'reefer', 'special', 'condition', 'size');
		foreach ($filters as $key => $value) {
			if (isset($_GET[$value])) {
				$query->query_vars['tax_query'][$value] = array(
					'taxonomy' => 'product_cat',
					'field'    => 'slug',
					'terms'    => $_GET[$value],
				);
			}
		}

		//we remove the actions hooked on the '__after_loop' (post navigation)
		remove_all_actions ( '__after_loop');
	}
}


// REMOVES WORDPRESS URL PAGINATION
remove_action('template_redirect', 'redirect_canonical');
// PAGINATION
// bloque inspirado en el comienzo de este post:
// https://rudrastyh.com/wordpress/load-more-and-pagination.html
function ajax_paginator( $first_page_url ){

	// the function works only with $wp_query that's why we must use query_posts() instead of WP_Query()
	global $wp_query;

	// remove the trailing slash if necessary
	$first_page_url = untrailingslashit( $first_page_url );


	// it is time to separate our URL from search query
	$first_page_url_exploded = array(); // set it to empty array
	$first_page_url_exploded = explode("/?", $first_page_url);
	// by default a search query is empty
	$search_query = '';
	// if the second array element exists
	if( isset( $first_page_url_exploded[1] ) ) {
		$search_query = "/?" . $first_page_url_exploded[1];
		$first_page_url = $first_page_url_exploded[0];
	}

	// get parameters from $wp_query object
	// how much posts to display per page (DO NOT SET CUSTOM VALUE HERE!!!)
	$posts_per_page = (int) $wp_query->query_vars['posts_per_page'];
	// current page
	$current_page = (int) $wp_query->query_vars['paged'];
	// the overall amount of pages
	$max_page = $wp_query->max_num_pages;

	// we don't have to display pagination or load more button in this case
	if( $max_page <= 1 ) return;

	// set the current page to 1 if not exists
	if( empty( $current_page ) || $current_page == 0) $current_page = 1;

	// you can play with this parameter - how much links to display in pagination
	$links_in_the_middle = 4;
	$links_in_the_middle_minus_1 = $links_in_the_middle-1;

	// the code below is required to display the pagination properly for large amount of pages
	// I mean 1 ... 10, 12, 13 .. 100
	// $first_link_in_the_middle is 10
	// $last_link_in_the_middle is 13
	$first_link_in_the_middle = $current_page - floor( $links_in_the_middle_minus_1/2 );
	$last_link_in_the_middle = $current_page + ceil( $links_in_the_middle_minus_1/2 );

	// some calculations with $first_link_in_the_middle and $last_link_in_the_middle
	if( $first_link_in_the_middle <= 0 ) $first_link_in_the_middle = 1;
	if( ( $last_link_in_the_middle - $first_link_in_the_middle ) != $links_in_the_middle_minus_1 ) { $last_link_in_the_middle = $first_link_in_the_middle + $links_in_the_middle_minus_1; }
	if( $last_link_in_the_middle > $max_page ) { $first_link_in_the_middle = $max_page - $links_in_the_middle_minus_1; $last_link_in_the_middle = (int) $max_page; }
	if( $first_link_in_the_middle <= 0 ) $first_link_in_the_middle = 1;

	// begin to generate HTML of the pagination
	$pagination = '<nav class="pagination" role="navigation">';

	// when to display "..." and the first page before it
	if ($first_link_in_the_middle >= 3 && $links_in_the_middle < $max_page) {
		$pagination.= '<a class="paginationLink" data-pagination="1">1</a>';

		if( $first_link_in_the_middle != 2 )
			$pagination .= '<span class="page-numbers extend">...</span>';
	}

	// arrow left (previous page)
	if ($current_page != 1)
		$pagination.= '<a class="paginationLink prev" data-pagination="prev">prev</a>';


	// loop page links in the middle between "..." and "..."
	for($i = $first_link_in_the_middle; $i <= $last_link_in_the_middle; $i++) {
		if($i == $current_page) {
			$pagination.= '<span class="paginationCurrent">'.$i.'</span>';
		} else {
			$pagination .= '<a class="paginationLink" data-pagination="'.$i.'">'.$i.'</a>';
		}
	}

	// arrow right (next page)
	if ($current_page != $last_link_in_the_middle )
		$pagination.= '<a class="paginationLink next" data-pagination="next">next</a>';


	// when to display "..." and the last page after it
	if ( $last_link_in_the_middle < $max_page ) {

		if( $last_link_in_the_middle != ($max_page-1) )
			$pagination .= '<span class="page-numbers extend">...</span>';

		$pagination .= '<a class="paginationLink" data-pagination="'. $max_page .'">'. $max_page .'</a>';
	}

	// end HTML
	// $pagination.= "</div></nav>\n";
	$pagination.= "</nav>\n";

	// haha, this is our load more posts link
	// if( $current_page < $max_page )
		// $pagination.= '<div id="misha_loadmore">More posts</div>';

	// replace first page before printing it
	echo str_replace(array("/page/1?", "/page/1\""), array("?", "\""), $pagination);
}



// Receive the Request post that came from AJAX
add_action( 'wp_ajax_latte_pagination', 'latte_pagination' );
// We allow non-logged in users to access our pagination
add_action( 'wp_ajax_nopriv_latte_pagination', 'latte_pagination' );
function latte_pagination() {
	//gets the global query var object
	global $wp_query;


  // if(isset($_POST['page'])){
		$args = json_decode( stripslashes( $_POST['query'] ), true );
		// var_dump($args);
		// var_dump($args['term']);
		unset($args->term);
		$args['term'] = null;
		// foreach ($args as $key => $value) {
		// 	// code...
		// 	echo $key;
		// }
		// echo 'tax_query solicitada';
		// echo '<br><br>';
		// var_dump($args['tax_query']);
		$oldArgs = $args;

		// Sanitize the received page
		if($_POST['type']=='story'){$story=true;}else{$story=false;}
		$page = sanitize_text_field($_POST['page']);
		$args['paged'] = $page;
		$args['post_status'] = 'publish';


		query_posts( $args );

		if( have_posts() ) :

			// run the loop
			while( have_posts() ): the_post();
				if(get_post_type()=='product'){
					$_pf = new WC_Product_Factory();
					$_product = $_pf->get_product(get_the_ID());
				}
				// FIND OUT WHICH CARACTERISTICS
				include 'getAtributes.php';
				?>



				<article
					class="card"
					contenedor="true"
					data-code="<?php echo $code; ?>"
					data-size="<?php echo $sizeNumber; ?>"
					data-tip1="<?php echo $tipo_1; ?>"
					data-tip2="<?php echo strtoupper($tipo_2Slug); ?>"
					data-cond="<?php echo strtoupper($conditionSlug); ?>"
				>


					<div class="cardHead">
						<div class="cardThumbnail">
							<?php newSvg(ucwords($tipo_1Slug)); ?>
						</div>
						<h4 class="cardTitle"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
						<p class="cardSubTitle"><?php echo $tipo_2 . ', ' . $condition ?></p>
					</div>

					<?php $attachment_ids = $_product->get_gallery_attachment_ids(); ?>

					<div class="cardMedia<?php if($attachment_ids){ echo ' Carousel'; } ?>">

						<a class="cardImgA Element" href="<?php echo get_permalink(); ?>">
							<img class="productGalleryImg" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="product gallery">
						</a>

						<?php if($attachment_ids){$count=0; foreach( $attachment_ids as $attachment_id ) { ?>
							<a class="cardImgA Element" href="<?php echo get_permalink(); ?>">
								<img class="productGalleryImg"  src="<?php echo $image_link = wp_get_attachment_url( $attachment_id ); ?>" alt="product gallery">
							</a>
						<?php $count++; }} ?>

						<?php if($attachment_ids){ ?>
							<button class="arrowBtn arrowButtonNext rowcol1" id="nextButton">
								<svg class="arrowSVG" viewBox="0 0 106 106" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<circle cx="53" cy="53" r="53" fill="currentColor"/>
									<path d="M72.7972 50.8521C74.0047 52.0295 74.0047 53.9705 72.7972 55.1479L46.3444 80.9415C44.4438 82.7947 41.25 81.4481 41.25 78.7936L41.25 27.2064C41.25 24.5519 44.4438 23.2053 46.3444 25.0585L72.7972 50.8521Z" fill="white"/>
								</svg>
								</button>
								<button class="arrowBtn arrowButtonPrev rowcol1" id="prevButton">
								<svg class="arrowSVG" viewBox="0 0 106 106" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<circle r="53" transform="matrix(-1 0 0 1 53 53)" fill="currentColor"/>
									<path d="M33.2028 50.8521C31.9953 52.0295 31.9953 53.9705 33.2028 55.1479L59.6556 80.9415C61.5562 82.7947 64.75 81.4481 64.75 78.7936L64.75 27.2064C64.75 24.5519 61.5562 23.2053 59.6556 25.0585L33.2028 50.8521Z" fill="white"/>
								</svg>
							</button>
						<?php } ?>
					</div>


					<div class="cardCaption">

						<div class="cardFeatures">
							<?php if ($categories) {
								newSvg($sizeSlug);
								newSvg(ucwords($tipo_1Slug));
								newSvg(strtoupper($tipo_2Slug));
								newSvg(strtoupper($conditionSlug));
							} ?>
						</div>

						<div class="cardActions">

							<div class="cuantos Cuantos">
								<input class="cuantosQnt cuantosQantity" type="text" value="1" min="1">
								<button class="cuantosBtn cuantosMins">-</button>
								<button class="cuantosBtn cuantosPlus">+</button>
							</div>
							<button class="cardAdd btn btnSimple">AGREGAR</button>
						</div>
					</div>
				</article>
				<?php

			endwhile;

		endif;

	echo ajax_paginator(get_pagenum_link());

	// }
	// Always exit to avoid further execution
	exit();
}

?>
