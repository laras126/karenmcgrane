<?php
/**
 * Template Name: Books
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
Timber::render( array( 'page-books.twig', 'page.twig' ), $context );