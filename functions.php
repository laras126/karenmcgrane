<?php

if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php') ) . '</a></p></div>';
	});

	add_filter('template_include', function($template) {
		return get_stylesheet_directory() . '/static/no-timber.html';
	});

	return;
}

Timber::$dirname = array('templates', 'views');

class KMGSite extends TimberSite {

	function __construct() {
		add_theme_support( 'post-formats' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		add_action('init',  array( $this, 'register_acf_utils' ));

		parent::__construct();
	}

	function register_post_types(){
		require('inc/custom-types.php');
	}

	function register_taxonomies(){
		require('inc/taxonomies.php');
	}

	function register_menus() {
		require('inc/menus.php');
	}

	function register_acf_utils() {
		require('inc/acf-utils.php');
	}

	function add_to_context( $context ) {
		$context['menu'] = new TimberMenu();
		$context['site'] = $this;
		$context['initial_js'] = file_get_contents(get_template_directory() . '/dist/assets/js/initial.js');

		return $context;
	}

	function add_to_twig( $twig ) {
		/* this is where you can add your own functions to twig */
		return $twig;
	}

}

new KMGSite();


/*

 * Template and Query Helper Functions
 *
*/
require('inc/helpers.php');

function kmg_add_custom_types_to_category( $query ) {
  if( is_category() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'source', 'nav_menu_item'
		));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'kmg_add_custom_types_to_category' );



/*
 * Get file contents from an SVG
 * @param string | name of menu item that must match name of SVG file
 * @return string | SVG markup
 */

function kmg_get_menu_icon($item) {
	$name = strtolower($item);
	$icon = file_get_contents(get_template_directory() . '/inc/svg/' . $name .'.svg');
	return $icon;
}

/**
 * Rewrite Rules and Pagination
 *
 * Categories are only used for sources on the front-end, and category.php is used to handle
 * the sources-in-category pagination.
 * Rewrite: sources/name/page/#
 *
 * Articles are posts, and index.php is used for pagination while page-articles.php
 * accounts for page 1.
 * Rewrite: articles/page/#
 *
 */
// remove_filter( 'template_redirect', 'redirect_canonical' );
add_action( 'init', 'kmg_add_custom_rewrite_rules' );
function kmg_add_custom_rewrite_rules() {
    // add_rewrite_rule(
		// 	'^sources/%category_name%/page/(([0-9]+)?)?/?$',
		// 	'category.php?post_type=source&cat=$matches[1]&paged=$matches[2]', 'top'
		// );
		add_rewrite_rule(
			'^articles/page/(([0-9]+)?)?/?$',
			'index.php?post_type=post&paged=$matches[2]', 'top'
		);
}