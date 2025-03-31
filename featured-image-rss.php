<?php
/**
 * Plugin Name: Featured Image in RSS Feed
 * Description: Adds featured images to WordPress RSS feeds.
 * Version: 1.0
 * Author: Shubham Sawarkar
 * Author URI: https://github.com/Shubham2D
 * License: MIT
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

function add_featured_image_to_rss($content) {
    if (is_feed() && has_post_thumbnail()) {
        $image = get_the_post_thumbnail(get_the_ID(), 'full', array('style' => 'max-width:100%; height:auto;'));
        $content = $image . $content;
    }
    return $content;
}
add_filter('the_excerpt_rss', 'add_featured_image_to_rss');
add_filter('the_content_feed', 'add_featured_image_to_rss');
