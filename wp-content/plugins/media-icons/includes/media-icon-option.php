<?php

function sm_page_option_front() {
	require_once( SM_DIR . 'templates/op.php' );
}

function sm_page_option_register() {
	add_options_page( 'SM Opções', 'SM Opções', 'manage_options', 'sm', 'sm_page_option_front' );
}

add_action( 'admin_menu', 'sm_page_option_register' );

function sm_load_settings_api() {
	register_setting( 'sm_op', 'sm_op_icons' );
}

add_action( 'admin_init', 'sm_load_settings_api' );