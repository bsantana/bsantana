<?php
/*
	Plugin Name: WP Popover
	Author: Jaci Felicio
	Author URI: http://jfelicio.com
*/

if ( ! defined( 'ABSPATH' ) ) exit;

/* Version check */
global $wp_version;
$exit_msg = $wp_version . ' WP Popover This requires WordPress 4.8 or newer.
	<a href="http://codex.wordpress.org/Upgrading_WordPress">Please	update!</a>';

if ( version_compare( $wp_version, "4.8", "<" ) )
{
	exit( $exit_msg );
}

class Popover
{
	
	public function __construct()
	{
		$this->define_constants();
		//$this->init();
		$this->init_hooks();
	}

	public function init_hooks() 
	{

	}

	public function init()
	{

	}

	public function define_constants()
	{
		define( 'POPOVER__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
		define( 'POPOVER__PLUGIN_FILE', __FILE__ );
	}
}