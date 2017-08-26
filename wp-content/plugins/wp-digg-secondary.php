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

/* Version check */
global $wp_version;
$exit_msg = $wp_version . ' WP Digg This requires WordPress 4.8 or newer.
	<a href="http://codex.wordpress.org/Upgrading_WordPress">Please	update!</a>';


if (version_compare($wp_version,"4.8","<"))
{
	exit ($exit_msg);
}


?>