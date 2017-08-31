<?php
/* WIDGETS */

if ( function_exists( 'register_sidebar' ) ) {
	register_sidebar( array(
        'name'          => __( 'Footer 1', 'textdomain' ),
        'id'            => 'footer-1',
        'description'   => __( 'Widgets do rodapé', 'textdomain' ),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer 2', 'textdomain' ),
        'id'            => 'footer-2',
        'description'   => __( 'Widgets do rodapé', 'textdomain' ),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer 3', 'textdomain' ),
        'id'            => 'footer-3',
        'description'   => __( 'Widgets do rodapé', 'textdomain' ),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
}

if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menu( 'initial_menu', 'Menu Principal' );
}

// Adicionando estilos e scripts
function add_estyle_and_scripts() {	
	wp_enqueue_style('normalize', get_template_directory_uri() . '/assets/css/normalize.css');
	wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');

	wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.1', true);	
}
add_action('wp_enqueue_scripts', 'add_estyle_and_scripts');

function my_function_admin_bar(){
    return false;
}
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

add_theme_support( 'custom-logo' );
function themename_custom_logo_setup() {
    $defaults = array(
        'height'      => 105,
        'width'       => 150,
        'flex-height' => false,
        'flex-width'  => false,
        'header-text' => array( 'otimize', 'otimize-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );