<?php 


	// ----
	// Custom Type for Sources
	// ----

	$labels = array(
		'name'                => _x( 'Sources', 'Post Type General Name', 'tbx' ),
		'singular_name'       => _x( 'Source', 'Post Type Singular Name', 'tbx' ),
		'menu_name'           => __( 'Sources', 'tbx' ),
		'parent_item_colon'   => __( 'Parent Source:', 'tbx' ),
		'all_items'           => __( 'All Sources', 'tbx' ),
		'view_item'           => __( 'View Source', 'tbx' ),
		'add_new_item'        => __( 'Add New Source', 'tbx' ),
		'add_new'             => __( 'Add New', 'tbx' ),
		'edit_item'           => __( 'Edit Source', 'tbx' ),
		'update_item'         => __( 'Update Source', 'tbx' ),
		'search_items'        => __( 'Search Source', 'tbx' ),
		'not_found'           => __( 'Not found', 'tbx' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'tbx' ),
	);
	$rewrite = array(
		'slug'                => 'sources',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'source', 'tbx' ),
		'description'         => __( 'Sources attached to posts.', 'tbx' ),
		'labels'              => $labels,
		'supports'            => array( 'title' ),
		'taxonomies'          => array( 'source_type', 'category' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-admin-links',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
	);
	register_post_type( 'source', $args );

	

	// ----
	// Custom Type for Presentations
	// ----

	$labels = array(
		'name'                => _x( 'Presentations', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Presentation', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Presentations', 'text_domain' ),
		'name_admin_bar'      => __( 'Presentation', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Presentation:', 'text_domain' ),
		'all_items'           => __( 'All Presentations', 'text_domain' ),
		'add_new_item'        => __( 'Add New Presentation', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Presentation', 'text_domain' ),
		'edit_item'           => __( 'Edit Presentation', 'text_domain' ),
		'update_item'         => __( 'Update Presentation', 'text_domain' ),
		'view_item'           => __( 'View Presentation', 'text_domain' ),
		'search_items'        => __( 'Search Presentation', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'presentations',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'presentation', 'text_domain' ),
		'description'         => __( 'The Presentation post type.', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'excerpt', 'thumbnail'),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-slides',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'presentation', $args );
 

	
	// ----
	// Custom Type for Articles
	// ----

	$labels = array(
		'name'                => _x( 'Articles', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Article', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Articles', 'text_domain' ),
		'name_admin_bar'      => __( 'Article', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Article:', 'text_domain' ),
		'all_items'           => __( 'All Articles', 'text_domain' ),
		'add_new_item'        => __( 'Add New Article', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Article', 'text_domain' ),
		'edit_item'           => __( 'Edit Article', 'text_domain' ),
		'update_item'         => __( 'Update Article', 'text_domain' ),
		'view_item'           => __( 'View Article', 'text_domain' ),
		'search_items'        => __( 'Search Article', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'articles',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'Article', 'text_domain' ),
		'description'         => __( 'Article Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'excerpt', 'thumbnail', 'page-attributes', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-media-text',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'article', $args );

 ?>