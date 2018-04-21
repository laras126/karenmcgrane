<?php
/**
 * Template Name: Talks
 */

$talk_args = array(
	'post_type' => 'presentation',
	'posts_per_page' => -1
);

$data = kmg_sources_archive($module_count, $excluded_cats);
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['talks'] = Timber::get_posts($talk_args);
$context['remaining_cat_ids'] = $data['remaining_cat_ids'];

Timber::render( array( 'page-talks.twig', 'page.twig' ), $context );