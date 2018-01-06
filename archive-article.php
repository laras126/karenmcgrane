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

// TODO make helper function for these
$aboutKaren_cat = get_category_by_slug( 'about-karen' );
$aboutKaren_count = $aboutKaren_cat->count;
$aboutKaren_more = $aboutKaren_count - 3;

$sourcesByKaren_args = array(
	'post_type' => array('source'),
	'posts_per_page' => 3,
	'category_name' => 'by-karen'
);

$byKaren_cat = get_category_by_slug( 'by-karen' );
$byKaren_count = $byKaren_cat->count;
$byKaren_more = $byKaren_count - 3;

$sourcesAboutKaren_args = array(
	'post_type' => array('source'),
	'posts_per_page' => 3,
	'category_name' => 'about-karen'
);

$context = Timber::get_context();

$context['posts'] = new Timber\PostQuery($articles_posts_args);
$context['sourcesByKaren'] = new Timber\PostQuery($sourcesByKaren_args);
$context['sourcesByKaren_more'] = $byKaren_more;

$context['sourcesAboutKaren'] = new Timber\PostQuery($sourcesAboutKaren_args);
$context['sourcesAboutKaren_more'] = $aboutKaren_more;

$context['test'] = $byKaren_cat;

Timber::render( $templates, $context );
