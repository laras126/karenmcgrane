<?php
/**
 * Template name: Articles
 */

$POSTS_PER_PAGE = 10;

$post = new TimberPost();
$context = Timber::get_context();
$source_cat = get_field('sources_on_articles', 'option');
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$posts_args = array(
	'post_type' => 'post',
	'posts_per_page' => $POSTS_PER_PAGE,
	'orderby' => 'date',
	'order' => 'ASC',
	'paged' => $paged
);

$sources_args = array(
	'post_type' => 'source',
	'category__in' => $source_cat,
	'posts_per_page' => $POSTS_PER_PAGE,
	'orderby' => 'date',
	'order' => 'ASC'
);

$context['post'] = $post;
$context['posts'] = new Timber\PostQuery($posts_args);
$context['source_cat'] = new Timber\Term($source_cat);
$context['sources'] = new Timber\PostQuery($sources_args);

$posts_count = wp_count_posts('post')->publish;
$context['by_karen_count'] = $posts_count - $POSTS_PER_PAGE;

$data = kmg_sources_archive($module_count, $excluded_cats);
$context['remaining_cat_ids'] = $data['remaining_cat_ids'];

Timber::render( 'page-articles.twig', $context );
