<?php
/* WIDGETS */

if ( function_exists( 'register_sidebar' ) ) {
	register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'textdomain' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
}

if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menu( 'meu_menu', 'Este é meu primeiro menu' );
	register_nav_menu( 'segundo_menu', 'Este é meu segundo menu' );
}

register_nav_menus (array (
	'Pluginbuddy_mobile' => 'Menu de navegação do PluginBuddy Mobile',
	'Footer_menu' => 'Meu menu de rodapé personalizado',
));

// Removendo ações padrão do woocommerce
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// Adicionando minhas ações 
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}


function vamos_testar() {
	echo "Nós aqui";
}
add_action('foo', 'vamos_testar'); 

// Adicionando estilos e scripts
function add_estyle_and_scripts() {	
	wp_enqueue_style('metisMenu', get_template_directory_uri() . '/css/metisMenu.min.css');
	wp_enqueue_style('sb-admin-2', get_template_directory_uri() . '/css/sb-admin-2.min.css');
	wp_enqueue_style('morris', get_template_directory_uri() . '/css/morris.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');

	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', '1.1', true);
	wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.1', true);
	wp_enqueue_script('metisMenu', get_template_directory_uri() . '/js/metisMenu.min.js', array('jquery'), '1.1', true);
	wp_enqueue_script('sb-admin-2', get_template_directory_uri() . '/js/sb-admin-2.min.js', array('jquery'), '1.1', true);


	if (is_home()) {
		//wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css');
		wp_enqueue_style('home', get_template_directory_uri() . '/css/home.css');
		wp_enqueue_script('bootstrapValidator', get_template_directory_uri() . '/js/bootstrapValidator.min.js', 'jquery', '1.1', true);
	}

	if (is_page_template('/home.php')) {
		wp_enqueue_style('kkkkkkkkkkkkkkkkkk', get_template_directory_uri() . '/css/kkkkkkkkkkkkkkk.css');
	}
	
}
add_action('wp_enqueue_scripts', 'add_estyle_and_scripts');

function eu(){
	echo "FOIIIII";
}


// Create the simple role
function add_simple_role() {
    add_role( 'simple_role', 'Simple Role', array(
            'read' => true,
            'edit_posts' => true,
            'upload_files' => true,
            ) );
}
//Adds the simple role
add_action('init', 'add_simple_role');