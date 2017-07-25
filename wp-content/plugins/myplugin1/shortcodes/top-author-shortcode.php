<?php

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
	echo "<h1>Meu Plugin</h1>";
	echo '<style>body {background: yellow !important;}</style>';
}

function shortcode_top_autores_front_end() {
	echo "<h1>Top Autores</h1>";
	echo "<p>Uma lista com os usuários que mais postaram em toda a história desse site</p>";

	$dados = get_users(array('oderby' => 'post_count', 'order' => 'DESC'));

	foreach ($dados as $dado) {
		echo '<hr>';
		echo get_avatar($dado->id).'<br>';
		echo '<bold>Nome: esc_html($dado->user_nicename)</bold><br>';
		echo '<bold>Email: esc_html($dado->user_email)</bold><br>';

		if (empty($dado->user_url)) {
			$dado->user_url = 'Esse usuário não possui um site.';
		}

		echo '<bold>Número de posts: count_user_posts($dado->id)</bold><br>';

		echo '<bold>Site: $dado->user_url</bold><br>';

		$link = get_author_posts_url($dado->id);
		echo '<a href="$link"><button>Visualizar Posts</button></a>';
	}

}

function shortcode_top_autores_register() {
	add_shortcode('top-autores', 'shortcode_top_autores_front_end');
}