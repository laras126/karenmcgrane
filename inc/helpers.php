<?php

/**
   * Helper function to prepare a sources module
   * @param string slug of the category term
   * @var int $POSTS_NUM Constant for number of posts to return
   * @return array An array data to be used in the template
   */

function kmg_get_sources_module_data($slug) {

	$cat = get_category_by_slug( $slug );
	$count = $cat->count;
	$name = $cat->name;

	$POSTS_NUM = 3;
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
		'title' => $name
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
 * @return array An array containing the newest post from each category
 */

function kmg_get_array_of_posts_from_each_category($excluded_cats = null) {

	$category_args = array(
		'hide_empty' => true,
		'orderby' => 'count',
		'order' => 'DESC',
		// TODO Confirm this:
		'exclude' => $excluded_cats
	);

	$categories = get_categories($category_args);
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
		$post = $query[0];

		array_push($newest_posts_arr, $post);
	}

	return $newest_posts_arr;
}



/**
 * Build an array of categories from an array of posts
 * @param array $posts_array Array of posts sorted by date
 * @return array Array of categories from $posts_array
 */

function kmg_get_array_of_categories_from_sorted_posts($posts_arr) {
	$categories_arr = [];

	foreach ($posts_arr as $post) {
		$cat = get_the_category( $post->ID )[0];
		array_push($categories_arr, $cat);
	}

	return $categories_arr;
}



/**
 * Get an array of sources module data for use in template
 * @param array $category_arr Array of categories from which to build the data
 * @param int $featured_count Number of modules to return
 * @param array $excluded_cat_ids Array of category IDs to exclude
 * @return array Array of data to be used in the to template context
 */

function kmg_sources_archive($module_count = 4, $excluded_cat_ids) {

	$post_from_each_category = kmg_get_array_of_posts_from_each_category($excluded_cats);
	usort($post_from_each_category, "kmg_post_date_comparison");
	$sorted_cats = kmg_get_array_of_categories_from_sorted_posts($post_from_each_category);

	$sources_modules_arr = [];

	for( $i=0; $i < $module_count; $i++ ) {
		$slug = $sorted_cats[$i]->slug;
		$module = kmg_get_sources_module_data($slug);
		array_push($sources_modules_arr, $module);
	}

	$data = array(
		'modules' => $sources_modules_arr,
		'remaining_cats' => array_slice($sorted_cats, 4)
	);

	return $data;
}
