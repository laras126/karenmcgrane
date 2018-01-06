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

$post_from_each_category = kmg_get_array_of_posts_from_each_category();
usort($post_from_each_category, "kmg_post_date_comparison");
$sorted_cats = kmg_get_array_of_categories_from_sorted_posts($post_from_each_category);

$templates = array( 'archive-source.twig' );

$context = Timber::get_context();

$context['newest_posts'] = $post_from_each_category;
$context['cats'] = $sorted_cats;

$context['test'] = count($post_from_each_category);

Timber::render( $templates, $context );
