<?php

// PAGINATION
// bloque inspirado en el comienzo de este post:
// https://rudrastyh.com/wordpress/load-more-and-pagination.html
function ajax_paginator_2( $first_page_url ){

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
		$pagination.= '<a class="pagination_link" data-pagination="1">1</a>';

		if( $first_link_in_the_middle != 2 )
			$pagination .= '<span class="page-numbers extend">...</span>';
	}

	// arrow left (previous page)
	if ($current_page != 1)
		$pagination.= '<a class="pagination_link prev" data-pagination="prev">prev</a>';


	// loop page links in the middle between "..." and "..."
	for($i = $first_link_in_the_middle; $i <= $last_link_in_the_middle; $i++) {
		if($i == $current_page) {
			$pagination.= '<span class="paginationCurrent">'.$i.'</span>';
		} else {
			$pagination .= '<a class="pagination_link" data-pagination="'.$i.'">'.$i.'</a>';
		}
	}

	// arrow right (next page)
	if ($current_page != $last_link_in_the_middle )
		$pagination.= '<a class="pagination_link next" data-pagination="next">next</a>';


	// when to display "..." and the last page after it
	if ( $last_link_in_the_middle < $max_page ) {

		if( $last_link_in_the_middle != ($max_page-1) )
			$pagination .= '<span class="page-numbers extend">...</span>';

		$pagination .= '<a class="pagination_link" data-pagination="'. $max_page .'">'. $max_page .'</a>';
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
add_action( 'wp_ajax_lt_pagination_2', 'lt_pagination_2' );
// We allow non-logged in users to access our pagination
add_action( 'wp_ajax_nopriv_lt_pagination_2', 'lt_pagination_2' );
function lt_pagination_2() {
	//gets the global query var object
	global $wp_query;
	// $respuesta = [];

	if(!is_admin()){
	  require_once 'inc/multi_cards.php';
	}

	$args = json_decode( stripslashes( $_POST['query'] ), true );

	$page = sanitize_text_field($_POST['page']);
	$args['paged'] = $page;
	$args['post_status'] = 'publish';
	$card = $_POST['card'];

	query_posts( $args );

	include 'multi_cards.php';

	if( have_posts() ){
		// run the loop
		while(have_posts()){the_post();

			call_user_func($card);
			// entry_card();

		}
		echo ajax_paginator_2(get_pagenum_link());
	}
	// echo ajax_paginator(get_pagenum_link());




	// $respuesta['title'] = 'You go girl!';

	// echo json_encode($respuesta);
	exit();
}