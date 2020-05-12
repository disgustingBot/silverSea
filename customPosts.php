<?php

// Built by www.lattedev.com
add_action( 'init', 'lattedev_custom_posts' );
function lattedev_custom_posts() {
    /* Añado las etiquetas que aparecerán en el escritorio de WordPress */
	$labels = array(
		'name'               => _x( 'Containers', 'post type general name', 'text-domain' ),
		'singular_name'      => _x( 'Container', 'post type singular name', 'text-domain' ),
		'menu_name'          => _x( 'Containers', 'admin menu', 'text-domain' ),
		'add_new'            => _x( 'Add new', 'container', 'text-domain' ),
		'add_new_item'       => __( 'Add new container', 'text-domain' ),
		'new_item'           => __( 'New container', 'text-domain' ),
		'edit_item'          => __( 'Edit container', 'text-domain' ),
		'view_item'          => __( 'See container', 'text-domain' ),
		'all_items'          => __( 'All containers', 'text-domain' ),
		'search_items'       => __( 'Search containers', 'text-domain' ),
		'not_found'          => __( 'There are no containers.', 'text-domain' ),
		'not_found_in_trash' => __( 'No containers in the bin.', 'text-domain' )
	);
    /* Configuro el comportamiento y funcionalidades del nuevo custom post type */
	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Desctription.', 'text-domain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'parent_item_colon'  => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
    'show_in_rest'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'container' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
    'menu-icon'          => 'dashicons-palmtree',
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes', 'revisions', 'custom-fields' )
	);
	register_post_type( 'container', $args );



	// EQUIPO
	/* Añado las etiquetas que aparecerán en el escritorio de WordPress */
	$labels = array(
	'name'               => _x( 'Equipo', 'post type general name', 'text-domain' ),
	'singular_name'      => _x( 'Miembro', 'post type singular name', 'text-domain' ),
	'menu_name'          => _x( 'Equipo', 'admin menu', 'text-domain' ),
	'add_new'            => _x( 'Add new', 'miembro', 'text-domain' ),
	'add_new_item'       => __( 'Add new miembro', 'text-domain' ),
	'new_item'           => __( 'New miembro', 'text-domain' ),
	'edit_item'          => __( 'Edit miembro', 'text-domain' ),
	'view_item'          => __( 'See miembro', 'text-domain' ),
	'all_items'          => __( 'All miembros', 'text-domain' ),
	'search_items'       => __( 'Search miembros', 'text-domain' ),
	'not_found'          => __( 'There are no miembros.', 'text-domain' ),
	'not_found_in_trash' => __( 'No miembros in the bin.', 'text-domain' )
	);
	/* Configuro el comportamiento y funcionalidades del nuevo custom post type */
	$args = array(
	'labels'             => $labels,
	'description'        => __( 'Desctription.', 'text-domain' ),
	'public'             => true,
	'publicly_queryable' => true,
	'parent_item_colon'  => true,
	'show_ui'            => true,
	'show_in_menu'       => true,
	'show_in_nav_menus'  => true,
	'show_in_rest'       => true,
	'query_var'          => true,
	'rewrite'            => array( 'slug' => 'equipo' ),
	'capability_type'    => 'post',
	'has_archive'        => true,
	'hierarchical'       => true,
	'menu-icon'          => 'dashicons-admin-users',
	'menu_position'      => 5,
	'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes', 'revisions', 'custom-fields' )
	);
	register_post_type( 'equipo', $args );


	// FINEQUIPO


    /* Añado las etiquetas que aparecerán en el escritorio de WordPress */
	$labels = array(
		'name'               => _x( 'Testimonials', 'post type general name', 'text-domain' ),
		'singular_name'      => _x( 'Testimonial', 'post type singular name', 'text-domain' ),
		'menu_name'          => _x( 'Testimonials', 'admin menu', 'text-domain' ),
		'add_new'            => _x( 'Add new', 'testimonial', 'text-domain' ),
		'add_new_item'       => __( 'Add new testimonial', 'text-domain' ),
		'new_item'           => __( 'New testimonial', 'text-domain' ),
		'edit_item'          => __( 'Edit testimonial', 'text-domain' ),
		'view_item'          => __( 'See testimonial', 'text-domain' ),
		'all_items'          => __( 'All testimonials', 'text-domain' ),
		'search_items'       => __( 'Search testimonials', 'text-domain' ),
		'not_found'          => __( 'There are no testimonials.', 'text-domain' ),
		'not_found_in_trash' => __( 'No testimonials in the bin.', 'text-domain' )
	);


    /* Configuro el comportamiento y funcionalidades del nuevo custom post type */
	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Desctription.', 'text-domain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_nav_menus'  => true,
		'show_in_menu'       => true,
    'show_in_rest'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'restaurant' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
    'taxonomies'         => array('loc'),
		'menu_icon'          => 'dashicons-format-quote',
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions' )
	);
	register_post_type( 'testimonials', $args );


  /* Configuramos las etiquetas que mostraremos en el escritorio de WordPress */
  $labels = array(
    'name'             => _x( 'Area', 'taxonomy general name' ),
    'singular_name'    => _x( 'Area', 'taxonomy singular name' ),
    'search_items'     => __( 'Search by Area' ),
    'all_items'        => __( 'All Areas' ),
    'parent_item'      => __( 'Parent area' ),
    'parent_item_colon'=> __( 'Parent area:' ),
    'edit_item'        => __( 'Edit Area' ),
    'update_item'      => __( 'Update Area' ),
    'add_new_item'     => __( 'Add new Area' ),
    'new_item_name'    => __( 'Name of new Area' ),
  );

  /* Registramos la taxonomía y la configuramos como jerárquica (al estilo de las categorías) */
  register_taxonomy( 'area', array( 'equipo' ), array(
    'labels'             => $labels,
    'public'             => true,
    'hierarchical'       => true,
    'show_ui'            => true,
    'query_var'          => true,
    'show_in_nav_menus'  => true,
    'show_admin_column'  => true,
    'show_in_rest'       => true, // Needed for tax to appear in Gutenberg editor.
    'rewrite'            => array( 'slug' => 'area' ),
  ));
}
