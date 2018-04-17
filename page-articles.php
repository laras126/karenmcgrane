<?php
/**
 * Template name: Articles
 */

$post = new TimberPost();
$context = Timber::get_context();
$source_cat = get_field('sources_on_articles', 'option');
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$posts_args = array(
	'post_type' => 'post',
	'posts_per_page' => 10,
	'orderby' => 'date',
	'order' => 'ASC',
	'paged' => $paged
);

$sources_args = array(
	'post_type' => 'source',
	'category__in' => $source_cat,
	'posts_per_page' => 10,
	'orderby' => 'date',
	'order' => 'ASC'
);

$context['post'] = $post;
$context['posts'] = new Timber\PostQuery($posts_args);
$context['source_cat'] = new Timber\Term($source_cat);
$context['sources'] = new Timber\PostQuery($sources_args);

Timber::render( 'page-articles.twig', $context );
