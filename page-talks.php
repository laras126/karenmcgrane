<?php
/**
 * Template Name: Talks
 */

$talk_args = array(
	'post_type' => 'presentation',
	'posts_per_page' => -1
);

$post = new TimberPost();

$context = Timber::get_context();
$context['post'] = $post;
$context['talks'] = Timber::get_posts($talk_args);

Timber::render( array( 'page-talks.twig', 'page.twig' ), $context );