<?php get_header(); ?>

<div class="container-fluid author-img-bg">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	    <div class="item active">
	      <img src="<?php bloginfo('template_directory'); ?>/img/la.jpg" alt="...">
	      <div class="carousel-caption">
	        ...
	      </div>
	    </div>
	    <div class="item">
	      <img src="<?php bloginfo('template_directory'); ?>/img/chicago.jpg" alt="...">
	      <div class="carousel-caption">
	        ...
	      </div>
	    </div>
	    <div class="item">
	      <img src="<?php bloginfo('template_directory'); ?>/img/ny.jpg" alt="...">
	      <div class="carousel-caption">
	        ...
	      </div>
	    </div>
	  </div>

	  <!-- Controls -->
	  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
</div>

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
    
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="artigo">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p>Postado por <?php the_author_posts_link(); ?> em <?php the_time('d/m/Y'); ?> - <?php comments_popup_link('Sem Comentários', '1 Comentário', '% Comentários', 'comments-link', ''); ?> <?php edit_post_link('(Editar)'); ?></p>
                <p><?php the_content(); ?></p>
            </div>
        <?php endwhile; ?>
            <div class="navegacao">
                <div class="recentes"><?php next_posts_link('Próximo Artigo &raquo;') ?></div>
                <div class="anteriores"><?php previous_posts_link('&laquo; Artigo Anterior') ?></div>
            </div>
        <?php else: ?>
            <div class="artigo">
                <h2>Nada Encontrado</h2>
                <p>Erro 404</p>
                <p>Lamentamos mas não foram encontrados artigos.</p>
            </div>
        <?php endif; ?>
         
    </div>

    <!--o código da sidebar ficava aqui-->

    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>