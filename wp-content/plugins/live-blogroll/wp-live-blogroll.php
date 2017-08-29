<?php
/*
Plugin Name: Live Blogroll
Version: 0.1
Description: Shows a number of 'recent posts' for each link in
your Blogroll using Ajax.
Author: Jaci Felicio
Author URI: http://jfelicio.com/
Plugin URI: http://www.jfelicio.com/wordpress-plugins/
live-blogroll
*/

if ( ! defined( 'ABSPATH' ) ) exit;

/* Version check */
global $wp_version;
$exit_msg = $wp_version . ' WP Digg This requires WordPress 4.8 or newer.
	<a href="http://codex.wordpress.org/Upgrading_WordPress">Please	update!</a>';

if ( version_compare( $wp_version, "4.8", "<" ) )
{
	exit( $exit_msg );
}

define( 'BLOGROLL__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'BLOGROLL__PLUGIN_FILE', __FILE__ );

//require_once(ABSPATH . WPINC . '/rss.php');

add_filter( 'get_bookmarks', 'WPLiveRoll_GetBookmarksFilter' );

function WPLiveRoll_GetBookmarksFilter( $items )
{
	// do nothing if in the admin menu
	if ( is_admin() )
	{
		return $items;
	}
	// parse all blogroll items
	foreach( $items as $item )
	{
		// check if the link is public
		if ( $item->link_visible == 'Y' )
		{
			$link_url = trailingslashit( $item->link_url );
			// simple feed guessing
			if ( strstr( $link_url, "blogspot" ) )
			{
				// blogspot blog
				$feed_url = $link_url . "feeds/posts/default/";
			}
			else if ( strstr( $link_url, "typepad" ) )
			{
				// typepad blog
				$feed_url = $link_url . "atom.xml";
			}
			else
			{
				// own domain or wordpress blog
				$feed_url = $link_url . "feed/";
			}
			// use WordPress to fetch the RSS feed
			$feedfile = fetch_rss( $feed_url );
			// check if we got valid response
			if ( is_array( $feedfile->items ) && !empty( $feedfile->items ) )
			{
				// this is the last post
				$feeditem = $feedfile->items[0];
				// replace name and url with post link and title
				$item->link_url = $feeditem['link'];
				$item->link_name = $feeditem['title'];
			}
		}
	}
	// return the items back
	return $items;
}

add_action( 'wp_enqueue_scripts', 'WPLiveRoll_ScriptsAction' );
add_action( 'wp_enqueue_scripts', 'WPLiveRoll_StylesAction' );
function WPLiveRoll_ScriptsAction()
{
	wp_enqueue_script( 'wp_live_blogroll_script', plugins_url( 'wp-live-blogroll.js', BLOGROLL__PLUGIN_FILE ), array( 'jquery' ) );

	wp_localize_script('wp_live_blogroll_script', 'ajax_object', array('plugin_url' => admin_url('admin-ajax.php')));
}
function WPLiveRoll_StylesAction()
{
	wp_enqueue_style( 'wp_live_blogroll_style', plugins_url( 'wp-live-blogroll.css', BLOGROLL__PLUGIN_FILE ), array() );
}

add_action( 'wp_ajax_apply_like', 'apply_like_post' );
add_action( 'wp_ajax_nopriv_apply_like', 'apply_like_post' );
function apply_like_post()
{
	echo json_encode( array( 'class' => 'erro', 'mensagem' => 'Todos os campos são obrigatórios.', 'link_url' => $_POST['link_url'], 'boolstring' => 'true', 'bool' => true) );
	wp_die();
}