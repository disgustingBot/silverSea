<?php

// Built by www.lattedev.com
add_action( 'init', 'lattedev_custom_posts' );
function lattedev_custom_posts() {

	// EQUIPO
	/* Añado las etiquetas que aparecerán en el escritorio de WordPress */
	$labels = array(
	'name'               => _x( 'Equipo', 'post type general name', 'text-domain' ),
	'singular_name'      => _x( 'Miembro', 'post type singular name', 'text-domain' ),
	'menu_name'          => _x( 'Equipo', 'admin menu', 'text-domain' ),
	'add_new'            => _x( 'Agregar nuevo', 'miembro', 'text-domain' ),
	'add_new_item'       => __( 'Agregar nuevo miembro', 'text-domain' ),
	'new_item'           => __( 'Nuevo miembro', 'text-domain' ),
	'edit_item'          => __( 'Editar miembro', 'text-domain' ),
	'view_item'          => __( 'Ver miembro', 'text-domain' ),
	'all_items'          => __( 'Todos los miembros', 'text-domain' ),
	'search_items'       => __( 'Buscar miembros', 'text-domain' ),
	'not_found'          => __( 'No se encontraron miembros.', 'text-domain' ),
	'not_found_in_trash' => __( 'No hay miembros en la papelera.', 'text-domain' )
	);
	/* Configuro el comportamiento y funcionalidades del nuevo custom post type */
	$args = array(
	'labels'             => $labels,
	'description'        => __( 'Desctription.', 'text-domain' ),
	'public'             => true,
	'publicly_queryable' => true,
	'show_ui'            => true,
	'show_in_nav_menus'  => true,
	'parent_item_colon'  => true,
	'show_in_menu'       => true,
	'show_in_rest'       => true,
	'query_var'          => true,
	'rewrite'            => array( 'slug' => 'equipo' ),
	'capability_type'    => 'post',
	'has_archive'        => true,
	'hierarchical'       => true,
	'menu-icon'          => 'dashicons-groups',
	'menu_position'      => 5,
	'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes', 'revisions', 'custom-fields' )
	);
	register_post_type( 'equipo', $args );


		/* Configuramos las etiquetas que mostraremos en el escritorio de WordPress */
		$labels = array(
			'name'             => _x( 'Áreas', 'taxonomy general name' ),
			'singular_name'    => _x( 'Área', 'taxonomy singular name' ),
			'search_items'     => __( 'Buscar por área' ),
			'all_items'        => __( 'Todas las áreas' ),
			'parent_item'      => __( 'Área principal' ),
			'parent_item_colon'=> __( 'Área principal:' ),
			'edit_item'        => __( 'Editar Área' ),
			'update_item'      => __( 'Actualizar Área' ),
			'add_new_item'     => __( 'Agregar nueva Área' ),
			'new_item_name'    => __( 'Nombre de la nueva área' ),
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

	// FINEQUIPO

	// TESTIMONIALS
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

	// FIN TESTIMONIALS

	// CLIENTES
		/* Añado las etiquetas que aparecerán en el escritorio de WordPress */
	$labels = array(
		'name'               => _x( 'Clientes', 'post type general name', 'text-domain' ),
		'singular_name'      => _x( 'Cliente', 'post type singular name', 'text-domain' ),
		'menu_name'          => _x( 'Clientes', 'admin menu', 'text-domain' ),
		'add_new'            => _x( 'Add new', 'cliente', 'text-domain' ),
		'add_new_item'       => __( 'Add new cliente', 'text-domain' ),
		'new_item'           => __( 'New cliente', 'text-domain' ),
		'edit_item'          => __( 'Edit cliente', 'text-domain' ),
		'view_item'          => __( 'See cliente', 'text-domain' ),
		'all_items'          => __( 'All clientes', 'text-domain' ),
		'search_items'       => __( 'Search clientes', 'text-domain' ),
		'not_found'          => __( 'There are no clientes.', 'text-domain' ),
		'not_found_in_trash' => __( 'No clientes in the bin.', 'text-domain' )
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
		'rewrite'            => array( 'slug' => 'clientes' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'taxonomies'         => array('loc'),
		'menu_icon'          => 'dashicons-id-alt',
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions' )
	);
	register_post_type( 'clientes', $args );

	// FIN CLIENTES

}
