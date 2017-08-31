<!DOCTYPE html>
<html lang="pt-br">
<head>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<title><?php wp_title(''); ?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>
 
</head>
<body <?php body_class(); ?>>
    <header id="header"><!-- Cabeçalho -->
        <nav class="container">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="logo">
        	<?php if ( function_exists( 'the_custom_logo' ) ) {
			    the_custom_logo();
			} ?>
        </div>
        <?php
	        if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'initial_menu' ) ) :
		        wp_nav_menu( array(
					'menu' => 'initial_menu',
					'theme_location' => 'initial_menu',
					//'container' => 'ul',
					//'container_class' => 'classe_do_container',
					'container_id' => 'nav',
					'menu_class' => '',
					'menu_id' => '',
					'before' => '',
					'after' => '',
					'link_before' => '',
					'link_after' => '',
					'depth' => 0,
					'walker' => '',
				) );
			endif;
		?>
        </nav>
    </header><!-- Cabeçalho-fim -->