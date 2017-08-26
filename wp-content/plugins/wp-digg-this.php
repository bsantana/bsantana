<?php
/*
Plugin Name: WP Digg This
Version: 0.1
Description: Automatically adds Digg This button to your posts.
Author: Jaci Felicio
Author URI: http://jfelicio.com/
Plugin URI: http://jfelicio.com/wordpress-plugins/
 wp-digg-this
*/

if ( ! defined( 'ABSPATH' ) ) exit;

/* Version check */
global $wp_version;
$exit_msg = $wp_version . ' WP Digg This requires WordPress 4.8 or newer.
	<a href="http://codex.wordpress.org/Upgrading_WordPress">Please	update!</a>';


if (version_compare($wp_version,"4.8","<"))
{
	exit ($exit_msg);
}

/* Show a Digg This link */
function WPDiggThis_Link()
{
	global $post;
	// get the URL to the post
	$link = urlencode(get_permalink($post->ID));

	// get the post title
	$title = urlencode($post->post_title);
	// get first 350 characters of post and strip it off
	// HTML tags
	$text = urlencode(substr(strip_tags($post->post_content), 0, 350));
	// create a Digg link and return it
	return '<a href="http://digg.com/submit?url='.$link.'&amp;title='.$title.'&amp;bodytext='.$text.'">Digg This</a>';
}

/* Return a Digg button */
function WPDiggThis_Button()
{
	global $post;
	// get the URL to the post
	$link=esc_js(get_permalink($post->ID));
	// get the post title
	$title=esc_js($post->post_title);

	// get the content
	$text=esc_js(substr(strip_tags($post->post_content),
	0, 350));
	// create a Digg button and return it
	$button="
		<script type='text/javascript'>
		digg_url = '$link';
		digg_title = '$title';
		digg_bodytext = '$text';
		</script>
		<script src='http://digg.com/tools/diggthis.js'
		type='text/javascript'></script>";

	// encapsulate the button in a div
	$button='
		<div style="float: right; margin-left:
		10px; margin-bottom: 4px;">
		'.$button.'
		</div>';
	return ($button.'kk');
}

/* Add Digg link to the end of the post */
function WPDiggThis_ContentFilter($content)
{
	// if on single post or page display the button
	if (is_single() || is_page())
		return WPDiggThis_Button().$content;
	else {
		return $content.WPDiggThis_Link();
	}
}
add_filter('the_content', 'WPDiggThis_ContentFilter', 9);

function setDate_PostTitle( $post_title )
{
    return $post_title . ' ' . date('d/m/Y');
}
add_filter('the_title', 'setDate_PostTitle');

function setUpperCaseComments( $comments )
{
	return ucfirst($comments);
}
add_filter('comment_text', 'setUpperCaseComments');