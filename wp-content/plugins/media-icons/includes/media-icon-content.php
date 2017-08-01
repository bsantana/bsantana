<?php

function sm_plugin_register_content( $post ) {
	echo $post;
	require_once( SM_DIR .  'templates/content.php' );
}

add_filter( 'the_content', 'sm_plugin_register_content');