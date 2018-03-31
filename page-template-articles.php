<?php
/**
 * Template name: Articles
 */

$context = Timber::get_context();

$posts_args = array(
	'post_type' => 'post',
	'posts_per_page' => 10
);

$sources_args = array(
	'post_type' => 'source',
	'category__in' => get_field('sources_on_articles', 'option'),
	'posts_per_page' => 10
);

$context['posts'] = new Timber\PostQuery($posts_args);
$context['sources'] = new Timber\PostQuery($sources_args);

Timber::render( 'page-articles.twig', $context );
