<!DOCTYPE html>
<html lang="pt-br">
<head>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<title><?php wp_title(''); ?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" />
<link href="<?php bloginfo('template_directory'); ?>/css/bootstrap.css" rel="stylesheet">
<link href="<?php bloginfo('template_directory'); ?>/css/tema1.css" rel="stylesheet">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>
 
</head>
<body <?php body_class(); ?>>
<div id="corpo">
    <header id="header"><!-- Cabeçalho -->
        <nav class="container-fluid">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <?php
			        if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'meu_menu' ) ) :
				        wp_nav_menu( array(
							'menu' => 'meu_menu',
							'theme_location' => 'meu_menu',
							//'container' => 'ul',
							//'container_class' => 'classe_do_container',
							'container_id' => 'nav',
							'menu_class' => 'classe_do_menu',
							'menu_id' => 'nav',
							'before' => '',
							'after' => '',
							'link_before' => '',
							'link_after' => '',
							'depth' => 0,
							'walker' => '',
						) );
					else:
						echo '<ul id="nav">';
						wp_list_categories('title_li=');
						echo '</ul>';
					endif;
				?>
        </nav>
    </header><!-- Cabeçalho-fim -->