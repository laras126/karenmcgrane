<?php
/**
 * Front Page Template
 */

$article_args = array(
        'post_type' => 'article',
        'posts_per_page' => 5
      );

$talk_args = array(
        'post_type' => 'presentation',
        'posts_per_page' => 5
      );

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['recent_articles'] = Timber::get_posts($article_args);
$context['recent_talks'] = Timber::get_posts($talk_args);

Timber::render(array('front-page.twig'), $context);
