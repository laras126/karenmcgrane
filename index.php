<?php
/**
 * Template to display page 2 + of posts
 * This is normally the main WordPress template file, but for our
 * purposes, it is only showing posts with a `paged` value of 2
 * or higher. The default query is completely disregarded
 * and replaces with a manual query that does exactly the same 
 * thing, but pagination is working this way so that's that.
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

// @link: https://codex.wordpress.org/Pagination#Static_Front_Page
if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
else { $paged = 1; }

$posts_args = array(
	'post_type' => 'post',
	'posts_per_page' => 10,
	'orderby' => 'date',
	'order' => 'DESC',
	'paged' => $paged
);

$context = Timber::get_context();
$context['posts'] = new Timber\PostQuery($posts_args);

$templates = array( 'index.twig' );

if ( is_home() ) {
	array_unshift( $templates, 'home.twig' );
}
Timber::render( $templates, $context );
