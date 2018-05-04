<?php

/**
 * Helper function to prepare a sources module for a category
 * @param string slug of the category term
 * @var int $POSTS_NUM Constant for number of posts to return
 * @return array An array data to be used in the template
 */

function kmg_get_sources_module_data($slug) {

	$POSTS_NUM = 3;
	$cat = get_category_by_slug( $slug );
	$count = $cat->count;
	$name = $cat->name;
	$link = get_category_link( $cat );
	$more_count = $count - $POSTS_NUM;

	$query_args = array(
		'post_type' => 'source',
		'posts_per_page' => $POSTS_NUM,
		'category_name' => $slug
	);

	$posts = new Timber\PostQuery($query_args);

	$template_data = array(
		'posts' => $posts,
		'more_count' => $more_count,
		'title' => $name,
		'link' => $link
	);

	return $template_data;

}


/**
 * Sort an array of dates, to be called in conjuction with usort
 * @param string first comparison
 * @param string second comparison
 * @return array An array data to be used in the template
 * @link https://stackoverflow.com/a/40462935
 * @link http://php.net/manual/en/function.usort.php
 * @link http://php.net/manual/en/function.strcmp.php
 */

function kmg_post_date_comparison($a, $b) {
	$a_date = $a->post_date;
	$b_date = $b->post_date;
	return strcmp(strtotime($b_date), strtotime($a_date));
}



/**
 * Helper function to prepare a sources module
 * @var array $categories Array of all categories
 * @param array $excluded_cat_ids Array of excluded category IDs
 * @return array An array containing the newest post from each category
 */

function kmg_get_array_of_posts_from_each_category($excluded_cat_ids) {

	$category_args = array(
		'hide_empty' => true,
		'orderby' => 'count',
		'order' => 'DESC',
		'exclude' => $excluded_cat_ids
	);

	$categories = get_terms('category', $category_args);
	$newest_posts_arr = [];

	foreach ($categories as $cat) {

		// Args for a single, most recent post
		// Default ordered descending by date
		$newest_post_args = array(
			'post_type' => 'source',
			'posts_per_page' => 1,
			'category_name' => $cat->slug
		);

		$query = new Timber\PostQuery($newest_post_args);
		
		if( count($query) ) {
			$post = $query[0];
			array_push($newest_posts_arr, $post);
		}
	}

	return $newest_posts_arr;
}



/**
 * Build an array of categories from an array of posts
 *
 * NOTE: this returns only the first category of the targeted posts
 * This is a problem for posts with more than one category.
 * A potential solution is to build a temporary array of the categories
 * encountered thus far, compare the category, and skip it if
 * it exists in the temporary array
 *
 * @param array $posts_array Array of posts sorted by date
 * @return array Array of categories from $posts_array
 */

function kmg_get_array_of_categories_from_sorted_posts($posts_arr) {
	$categories_arr = [];

	foreach ($posts_arr as $post) {

		// Account for posts with multiple categories, the first of which is one of the excluded categories.
		$cat = get_the_category( $post->ID )[0];
		if( $cat->name == "By Karen" || $cat->name == "About Karen" ) {
			$cat = get_the_category( $post->ID )[1];
		}

		array_push($categories_arr, get_cat_ID($cat->name));
	}

	$remove_dups = array_unique($categories_arr);
	$cats_arr = array_filter(array_values($remove_dups));

	return $cats_arr;
}



/**
 * Get an array of Sources module data for use in template
 * Each "sources module" corresponds to a category term, displaying an array of Sources in that category
 *
 * The categories should be sorted by the ones with a source (a CPT) most recently published
 *
 * @param int $featured_count Number of modules to return
 * @param array $excluded_cat_ids Array of category IDs to exclude
 * @return array Array of data to be used in the to template context
 */

function kmg_sources_archive($module_count = 4) {

	$excluded_cat_ids = array(
		get_cat_ID( 'By Karen' ),
		get_cat_ID( 'About Karen' ),
		get_cat_ID( 'Uncategorized' )
	);

	// First, build an array of posts containing the most recent post from each category
	$post_from_each_category = array_filter(kmg_get_array_of_posts_from_each_category($excluded_cat_ids));

	// Sort that array by date
	usort($post_from_each_category, "kmg_post_date_comparison");
	$sorted_cats = kmg_get_array_of_categories_from_sorted_posts($post_from_each_category);

	// Prepare an empty array to hold the custom sources module object
	$sources_modules_arr = [];

	// Prepare the module data for each of the featured sources modules and add it to the array
	for( $i=0; $i < $module_count; $i++ ) {
		$cat = get_category($sorted_cats[$i]);
		$slug = $cat->slug;
		$module = kmg_get_sources_module_data($slug);
		array_push($sources_modules_arr, $module);
	}

	// Return the template data, including the module objects and an array of the remaining categories
	$template_data = array(
		'modules' => $sources_modules_arr,
		'additional_sources' => array_slice($sorted_cats, 4),
		'cats' => $sorted_cats
	);

	return $template_data;
}
