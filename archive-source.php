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

$excluded_cats = array(
	get_cat_ID( 'By Karen' ),
	get_cat_ID( 'About Karen' )
);
$module_count = 4;

$data = kmg_sources_archive($module_count, $excluded_cats);

$context = Timber::get_context();
$context['featured_modules'] = $data['modules'];
$context['remaining_cat_ids'] = $data['remaining_cat_ids'];

Timber::render( 'archive-source.twig', $context );
