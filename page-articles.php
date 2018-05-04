<?php

/**
 * Template name: Articles
 *
 * Articles displays one column of actual articles "By Karen". These are posts.
 * The other column, "About Karen" displays sources catgegorized "About Karen".
 * This category is selected in an ACF option.
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

// Add main queries to context.
$context['post'] = $post;
$context['posts'] = new Timber\PostQuery($posts_args);
$context['source_cat'] = new Timber\Term($source_cat);
$context['sources'] = new Timber\PostQuery($sources_args);

/**
 * Prepare "Browse X More" counts.
 * These link to paginatied lists of the query.
 */
$posts_count = wp_count_posts('post')->publish;
$sources_count = get_term($source_cat, 'category')->count;
$context['by_karen_count'] = $posts_count - $POSTS_PER_PAGE;
$context['about_karen_count'] = $sources_count - $POSTS_PER_PAGE;

Timber::render( 'page-articles.twig', $context );
