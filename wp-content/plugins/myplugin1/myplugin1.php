<?php
/*
Plugin Name: Meu Plugin 1
Plugin URI: http://wordpress.org/plugins/meu-plugin-1/
Description: Esta é a Descrição.
Version: 0.1
Author URI: http://author1.me/
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'DIRETORIO_RAIZ_TOP_AUTORES', plugin_dir_path( __FILE__ ) );

require_once( DIRETORIO_RAIZ_TOP_AUTORES . 'shortcodes/top-author-shortcode.php' );

// Hook Action
add_action( 'init', 'render_page' );
add_action( 'init', 'shortcode_top_autores_register' );
add_action( 'admin_menu', 'pone_register_menus' );

// Hook Filter
add_filter( 'admin_footer_text', 'render_page' );