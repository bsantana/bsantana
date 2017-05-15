<?php

if( is_user_logged_in() )
    wp_redirect( home_url( 'dashboard' ) );

if ( isset( $_POST['submit-cadastro'] ) ) {
    $objUser = ( object ) $_POST;
    //$user_id = username_exists( $objUser->user );
    $require = ['user' => $objUser->user, 'email' => $objUser->email];
    //if ( ! $user_id and email_exists( $objUser->email ) == false )
    $role = 'author';

    $userdata = array(
        'user_login'    =>  str_replace(" ", "_", $objUser->user ),
        'user_email'    =>  sanitize_email( $objUser->email ),
        'user_pass'     =>  $objUser->pass,
        //'display_name'  =>  sanitize_text_field( $objUser->nome ),
        'role'          =>  $role
    );

    //$user_id = wp_create_user( $objUser->user, $objUser->pass, $objUser->email );
    $user_id = wp_insert_user( $userdata );

    // Se não houver erro ele cria os meta
    if ( ! is_wp_error( $user_id ) ) {
        wp_redirect( home_url( 'dashboard' ) );
        var_dump(is_wp_error($user_id));
    }
}

?>

<?php get_header(); ?>

<section class="container jumbotron">
    <div class="row">
        <div class="col-md-7">
            <h1>Built for developers</h1>
        </div>
        <div class="col-md-5">
            <form id="formExemplo" class="form-cadastro" method="post" data-toggle="validator">
                <div class="form-group">
                    <label for="exampleInputEmail1">Usuário</label>
                    <input type="text" class="form-control" name="user" id="exampleInputEmail1" placeholder="Usuário" data-error="Por favor, preencha o campo de usuário." required>
                    <!--<div class="help-block with-errors"></div>-->
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                </div>
                <button type="submit" name="submit-cadastro" name="pass" class="btn btn-default">Cadastrar</button>
            </form>
        </div>
    </div>
</section>

<?php get_footer(); ?>