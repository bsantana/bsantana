<?php get_header(); ?>
<div id="conteudo">
    <div id="artigos">
        <div class="artigo">
            <h2>Titulo do artigo 1</h2>
            <p>Postado por administrador em 16/01/2017</p>
            <p>Conteudo do artigo</p>
        </div>
         
        <div class="artigo">
            <h2>Titulo do artigo 2</h2>
            <p>Postado por administrador em 16/01/2017</p>
            <p>Conteudo do artigo</p>

            <form action="#" method="post" enctype="multipart/form-data">
                <input type="file" name="arquivo" />
                <input type="submit" value="UpLoad" />
            </form>

            <a href="wp-content/uploads/jfelicio" title="arquivos no servidor">arquivos no servidor</a>

            <?php
                if($_FILES['arquivo'] != '') {
                    $arquivo = $_FILES['arquivo'];
                    move_uploaded_file($arquivo['tmp_name'], 'wp-content/uploads/jfelicio/' . $arquivo['name']);
                    print_r( $_FILES );
                    echo "foi";
                }
            ?>
        </div>
    </div>

    <!--o código da sidebar ficava aqui-->

    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>