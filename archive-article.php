<?php
/**
 * The template for displaying the Article post type archive
 * Posts have been added to the query
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.2
 */

$templates = array( 'archive-article.twig' );

$articles_posts_args = array(
	'post_type' => array('article', 'post')
);

$context = Timber::get_context();

$context['posts'] = new Timber\PostQuery($articles_posts_args);

Timber::render( $templates, $context );
