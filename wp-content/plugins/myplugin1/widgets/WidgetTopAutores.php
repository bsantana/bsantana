<?php

/**
* 
*/
class WidgetTopAutores extends WP_Widget
{
	
	public function __construct()
	{
		$dado = array( 'classname' => 'WidgetTopAutores', 'description' => 'Um widget que lista em ordem decrescente os autores que mais postam' );

		parent::__construct( 'widget_top_autores', 'Top Autores', $dado);
	}

	public function form() {
		echo "Buscar<br><br><input>";
	}

	public function widget() {
		echo "Buscar<input><button>Go</button>";
	}

	public function update() {

	}
}