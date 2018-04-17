<?php
/**
 * Template Name: Talks
 */

$talk_args = array(
	'post_type' => 'presentation',
	'posts_per_page' => -1
);

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['talks'] = Timber::get_posts($talk_args);

Timber::render( array( 'page-talks.twig', 'page.twig' ), $context );