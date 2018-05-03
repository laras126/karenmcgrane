<?php
/**
 * Front Page Template
 */

$article_args = array(
        'post_type' => 'post',
        'posts_per_page' => 4
      );

$talk_args = array(
        'post_type' => 'presentation',
        'posts_per_page' => 1
      );


function getSourcesCategoriesArray() {
  $terms_arr = [];
  foreach (get_categories() as $cat) {
    $count = $cat->category_count;

    if( $count > 5 ) {
      $term = new TimberTerm($cat);
      array_push($terms_arr, $term);
    }
  }
  return $terms_arr;
}


$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['featured_posts'] = Timber::get_posts($article_args);
$context['featured_talk'] = Timber::get_posts($talk_args)[0];
$context['recent_sources_cats'] = getSourcesCategoriesArray();

Timber::render(array('front-page.twig'), $context);
