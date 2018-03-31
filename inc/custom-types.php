<?php


	// ----
	// Custom Type for Sources
	// ----

	$labels = array(
		'name'                => _x( 'Sources', 'Post Type General Name', 'kmg' ),
		'singular_name'       => _x( 'Source', 'Post Type Singular Name', 'kmg' ),
		'menu_name'           => __( 'Sources', 'kmg' ),
		'parent_item_colon'   => __( 'Parent Source:', 'kmg' ),
		'all_items'           => __( 'All Sources', 'kmg' ),
		'view_item'           => __( 'View Source', 'kmg' ),
		'add_new_item'        => __( 'Add New Source', 'kmg' ),
		'add_new'             => __( 'Add New', 'kmg' ),
		'edit_item'           => __( 'Edit Source', 'kmg' ),
		'update_item'         => __( 'Update Source', 'kmg' ),
		'search_items'        => __( 'Search Source', 'kmg' ),
		'not_found'           => __( 'Not found', 'kmg' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'kmg' ),
	);
	$rewrite = array(
		'slug'                => 'sources',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'source', 'kmg' ),
		'description'         => __( 'Sources attached to posts.', 'kmg' ),
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
		'name'                => _x( 'Talks', 'Post Type General Name', 'kmg' ),
		'singular_name'       => _x( 'Talk', 'Post Type Singular Name', 'kmg' ),
		'menu_name'           => __( 'Talks', 'kmg' ),
		'name_admin_bar'      => __( 'Talk', 'kmg' ),
		'parent_item_colon'   => __( 'Parent Talk:', 'kmg' ),
		'all_items'           => __( 'All Talks', 'kmg' ),
		'add_new_item'        => __( 'Add New Talk', 'kmg' ),
		'add_new'             => __( 'Add New', 'kmg' ),
		'new_item'            => __( 'New Talk', 'kmg' ),
		'edit_item'           => __( 'Edit Talk', 'kmg' ),
		'update_item'         => __( 'Update Talk', 'kmg' ),
		'view_item'           => __( 'View Talk', 'kmg' ),
		'search_items'        => __( 'Search Talk', 'kmg' ),
		'not_found'           => __( 'Not found', 'kmg' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'kmg' ),
	);
	$rewrite = array(
		'slug'                => 'talks',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'presentation', 'kmg' ),
		'description'         => __( 'The Talk post type.', 'kmg' ),
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

 ?>
