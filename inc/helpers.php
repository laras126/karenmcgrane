<?php

/**
   * Helper function to prepare a sources module
   * @param string slug of the category term
	 * @var int $POSTS_NUM Constant for number of posts to return
   * @return array An array data to be used in the template
   */

function kmg_get_sources_module_data($slug) {

	$POSTS_NUM = 3;

	$cat = get_category_by_slug( $slug );
	$count = $cat->count;
	$more_count = $count - $POSTS_NUM;

	$query_args = array(
		'post_type' => array('source'),
		'posts_per_page' => $POSTS_NUM,
		'category_name' => $slug
	);

	$posts = new Timber\PostQuery($query_args);

	$template_data = array(
		'posts' => $posts,
		'more_count' => $more_count
	);

	return $template_data;

}