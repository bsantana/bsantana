<?php

add_theme_support( 'post-thumbnails' ); 

add_image_size( 'slider', 980, 400, true );
add_image_size( 'portfolio', 260, 260, true );

//CPT Slider

add_action( 'init', 'create_post_type_slider' );
function create_post_type_slider() {
    register_post_type( 'slider',
        array(
            'labels' => array(
                'name' => __( 'Destaques' ),
                'singular_name' => __('Destaque'),
                'add_new' => __('Novo Destaque'),
                'add_new_item' => __('Adicionar Novo Destaque'),
                'edit_item' => __('Editar Destaque'),
                'new_item' => __('Novo Destaque'),
                'all_items' => __('Todas os Destaques'),
            ),
            'public' => true,
            'publicly_queryable' => true,
            'rewrite' => true,
            'supports' => array( 'title','thumbnail','excerpt'),
            'has_archive' => true,
            'menu_position' => 5,
        )
    );
}

//Campo Link Destaque

add_action( 'add_meta_boxes', 'link_destaque_add_meta_box' );
 
function link_destaque_add_meta_box() {
    add_meta_box(
        'link_destaque_metaboxid',
        'URL',
        'link_destaque_inner_meta_box',
        'slider'
    );
}
 
function link_destaque_inner_meta_box( $slider ) {
?>

  <br />
  <input type="text" name="link_destaque" size="100" value="<?php echo get_post_meta( $slider->ID, '_link_destaque', true ); ?>" />
</p>
<?php
}

add_action( 'save_post', 'link_destaque_save_post', 10, 2 );
 
function link_destaque_save_post( $link_destaque_id, $slider ) {
 
   // Verificar se os dados foram enviados, neste caso se a metabox existe, garantindo-nos que estamos a guardar valores da página de filmes.
   if ( ! $_POST['link_destaque'] ) return;
 
   // Fazer a saneação dos inputs e guardá-los
   update_post_meta( $link_destaque_id, '_link_destaque', strip_tags( $_POST['link_destaque'] ) );
 
   return true;
 
}

//CPT Portfolio

add_action( 'init', 'create_post_type_portfolio' );
function create_post_type_portfolio() {
    register_post_type( 'portfolio',
        array(
            'labels' => array(
                'name' => __( 'Portfólio' ),
                'singular_name' => __('Portfólio'),
                'add_new' => __('Novo Item'),
                'add_new_item' => __('Adicionar Novo Item'),
                'edit_item' => __('Editar Itens'),
                'new_item' => __('Novo Item'),
                'all_items' => __('Todos os Itens do Portfólio'),
            ),
            'public' => true,
            'publicly_queryable' => true,
            'rewrite' => array('slug' => 'portfolio'),
            'supports' => array( 'title','thumbnail','excerpt'),
            'has_archive' => true,
            'menu_position' => 5,
        )
    );
}

//Taxonomia Categoria do Portfólio

add_action( 'init', 'create_portfolio_taxonomies', 0 );

function create_portfolio_taxonomies() {
    $labels = array(
    'name'              => _x( 'Categorias dos Portfólios', 'taxonomy general name' ),
    'singular_name'     => _x( 'Categoria do Portfólio', 'taxonomy singular name' ),
    'search_items'      => __( 'Procurar Portfólios' ),
    'all_items'         => __( 'Todos Portfólios' ),
    'edit_item'         => __( 'Editar Portfólios' ),
    'update_item'       => __( 'Alterar Portfólios' ),
    'add_new_item'      => __( 'Adicionar Novo Portfólio' ),
    'new_item_name'     => __( 'Novo Portfólio' ),
    'menu_name'         => __( 'Categoria do Portfólio' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'tipo-portfolio' ),
  );

register_taxonomy( 'tipo-portfolio', array( 'portfolio' ), $args );

}