<?php
/*
	Plugin Name: Media Icons
	Author: Jaci Felicio
	Author URI: http://jfelicio.com
*/

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'SM_DIR', plugin_dir_path( __FILE__ ) );

require_once( SM_DIR . 'includes/media-icon-content.php' );
require_once( SM_DIR . 'includes/media-icon-option.php' );