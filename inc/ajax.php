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

	include get_template_directory() . '/inc/multi_cards.php';
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	unset($args->term);
	$args['term'] = null;

	// Sanitize the received page
	if($_POST['type']=='story'){$story=true;}else{$story=false;}
	$page = sanitize_text_field($_POST['page']);
	$args['paged'] = $page;
	$args['post_status'] = 'publish';


	query_posts( $args );

	if( have_posts() ) {
		while( have_posts() ){ the_post();
			simpla_card();
		}
	}
	echo ajax_paginator(get_pagenum_link());

	// Always exit to avoid further execution
	exit();
}