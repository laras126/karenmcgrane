<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.2
 */

$templates = array( 'archive-article.twig' );

$articles_posts_args = array(
	'post_type' => array('article', 'post')
);

// $sources_args = array(
// 	'post_type' => array('source')
// );

$context = Timber::get_context();

$context['posts'] = new Timber\PostQuery($articles_posts_args);
// $context['sources'] = new Timber\PostQuery($sources_args);

Timber::render( $templates, $context );
