<?php
/*
Plugin Name: Meu Plugin 1
Plugin URI: http://wordpress.org/plugins/meu-plugin-1/
Description: Esta é a Descrição.
Version: 0.1
Author URI: http://author1.me/
*/

add_action('admin_menu', 'pone_register_menus');

function pone_register_menus() {
	add_options_page( 
		'My Title Options',
		'Meu Plugin 1',
		'manage_options',
		'hello_page',
		'render_page'
	);
}

function render_page() {
	echo "Meu Plugin";
}