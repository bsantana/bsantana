<?php get_header(); ?>
<div id="conteudo">
    <div id="artigos">
        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
        <?php /* If this is a category archive */ if (is_category()) { ?>
            Arquivo da Categoria "<?php echo single_cat_title(); ?>"
        <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
            Arquivo de <?php the_time('j de F de Y'); ?>
        <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
            Arquivo de <?php the_time('F de Y'); ?>
        <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
            Arquivo de <?php the_time('Y'); ?>
        <?php /* If this is an author archive */ } elseif (is_author()) { ?>
            Arquivo do Autor
        <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
            Arquivo do Blog
        <?php } ?>
    
        <?php woocommerce_content(); ?>
         
    </div>

    <!--o código da sidebar ficava aqui-->

    <?php get_sidebar(); ?>sssssssssss
</div>
<?php get_footer(); ?>