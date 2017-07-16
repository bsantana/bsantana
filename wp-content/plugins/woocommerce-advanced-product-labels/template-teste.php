<?php // template name: TESTANDO A HOME! ?>


<?php
$img1 = theme_url('assets/img/como-fazemos/foto-1-alt.png');
$img2 = theme_url('assets/img/como-fazemos/foto-4-alt.png');
$img3 = theme_url('assets/img/como-fazemos/foto-3-alt.png');
$img4 = theme_url('assets/img/como-fazemos/foto-2-alt.png');
$img5 = theme_url('assets/img/como-fazemos/foto-5-alt.png');
$img6 = theme_url('assets/img/como-fazemos/foto-6-alt.png');
$icone1 = theme_url('assets/img/como-fazemos/um.png');
$icone2 = theme_url('assets/img/como-fazemos/dois.png');
$icone3 = theme_url('assets/img/como-fazemos/tres.png');
$icone4 = theme_url('assets/img/como-fazemos/quatro.png');
$icone5 = theme_url('assets/img/como-fazemos/cinco.png');
$icone6 = theme_url('assets/img/como-fazemos/seis.png');
$ico_vermelho = theme_url('assets/img/como-fazemos/ico-vermelho-1.png');
$icone_dif1 = theme_url('assets/img/diferencial/icone-dif-01.png');
$icone_dif2 = theme_url('assets/img/diferencial/icone-dif-02.png');
$icone_dif3 = theme_url('assets/img/diferencial/icone-dif-03.png');
$icone_dif4 = theme_url('assets/img/diferencial/icone-dif-04.png');
$icone_dif5 = theme_url('assets/img/diferencial/icone-dif-05.png');
$icone_dif6 = theme_url('assets/img/diferencial/icone-dif-06.png');
$depoimento = theme_url('assets/img/depoimento.png');
$barra = theme_url('assets/img/barra-red.png');
$carta = theme_url('assets/img/carta.png');
$aviao = theme_url('assets/img/aviao-botao.png');
$imprensa = theme_url('assets/img/logos-midia.png');
$play = theme_url('assets/img/play2.png');

/*Icones planos*/
$ico1 = theme_url('assets/img/slider/ico1.png');
$ico2 = theme_url('assets/img/slider/ico2.png');
$ico3 = theme_url('assets/img/slider/ico3.png');
$ico4 = theme_url('assets/img/slider/ico4.png');
$ico5 = theme_url('assets/img/slider/ico5.png');
$img_mobile = theme_url('assets/img/banner-responsivo-globo.png');
?>

    <style>
        #woocommerce_product_categories-2 {
            display: block !important;
        }
    </style>

<?php get_header(); ?>

<section class="banner-home">
    <div class="slider-desktop">
        <?php echo do_shortcode('[rev_slider home-v3]');?>
    </div>
    <div class="slider-responsivo">
        <?php echo do_shortcode('[rev_slider responsivo]');?>
    </div>
</section>

<!--    <div class="lava-jato">-->
<!--        <h3 style="color: white; font-size: 23px">Tão importante quanto saber o que a Russel é</h3>-->
<!--        <p style="font-size: 23px; color: white;">É saber o que ela não é</p>-->
<!--        <a class="fancybox btn-assista" data-fancybox-type="iframe" type="button" href="https://www.youtube.com/embed/pQwVIOhm_fg?rel=0">Assista já</a>-->
<!--    </div>-->
<!--    <div class="background-home" style="background: #000000; height: 525px">-->
<!--        <figure>-->
<!--            <img class="banner_responsivo" src="--><?php //echo $img_mobile;?><!--">-->
<!--        </figure>-->
<!--        <video class="russel-globo" width="100%" height="auto" autoplay>-->
<!--            <source src="https://www.russelservicos.com.br/mkt/video/russel-globo.mp4" type="video/mp4">-->
<!--        </video>-->
<!--    </div>-->


    <section class="banner-planos-home">
        <div class="faixa-regulamento">
            <p>Conheça os novos Planos de Franquias de Horas</p>
            <p></p>
        </div>
        <div class="faixa-regulamento-responsivo">
            <p>Conheça os novos planos <br>de franquias de horas</p>
        </div>
        <div class="regulamento">
            <div class="centralizar-regulamento">
                <div class="beneficios-planos">
                    <p><br>Russel <br>Hora Mais</p>
                    <p class="beneficios-planos-responsivo" style="display: none">Russel Hora Mais</p>
                    <ul>
                        <div class="central1">
                            <img style="width: 44%;margin-left: 7px" src="<?php echo $ico1; ?>"> <li style="color: white; font-size: 21px; font-weight: bold">Implantação em até <span
                                    style="color: #900000; font-weight: bold">48 </span>horas</li>
                        </div>
                        <div class="central1">
                            <img style="width: 44%" src="<?php echo $ico2; ?>"><li style="color: white; font-size: 21px; font-weight: bold; margin-left: -15px">Pagamento em até <span
                                    style="color: #900000; font-weight: bold">15 parcelas</li>
                        </div>
                        <div class="central1">
                            <img style="width: 44%;margin-left: 8px" src="<?php echo $ico3; ?>"> <li style="color: white; font-size: 21px; font-weight: bold"><span
                                    style="color: #900000; font-weight: bold">70</span> horas extras grátis</li>
                        </div>
                        <div class="central1">
                            <img style="width: 44%;margin-left: 8px" src="<?php echo $ico4; ?>"> <li style="color: white; font-size: 21px; font-weight: bold"><span
                                    style="color: #900000; font-weight: bold">5</span> diárias gratuitas</li>
                        </div>
                        <div class="central1">
                            <img style="width: 44%;margin-left: 8px" src="<?php echo $ico5; ?>"> <li style="color: white; font-size: 21px; font-weight: bold"><span
                                    style="color: #900000; font-weight: bold">150%</span> de Garantia</li>
                        </div>
                    </ul>

                    <a class="btn-regulamento" href="http://www.russelservicos.com.br/planos/">Saiba mais</a>
                </div>
            </div>
        </div>

    </section>

    <section class="container">
    <main id="main" class="site-main" style="overflow-x: initial">

        <div class="produtos">
            <h1 class="sublinhado-h1">Mão de Obra Operacional</h1>
            <div class="filtro-categoria">
                <?php get_sidebar('search-bar'); ?>
            </div>
        </div>
        <?php echo do_shortcode( '[product_category category="energia" per_page="6" orderby="rand"]' ); ?>
        <div class="flex-carousel">
            <?php echo do_shortcode( '[product_category category="energia" per_page="6" orderby="rand"]' ); ?>
            
            <div class="owl-controls">
                <div class="owl-nav">
                    <div class="owl-prev">prev</div>
                    <div class="owl-next">next</div>
                </div>
                <div class="owl-dots">
                    <div class="owl-dot active"><span></span></div>
                    <div class="owl-dot"><span></span></div>
                    <div class="owl-dot"><span></span></div>
                </div>
            </div>
        </div>

        <div class="produtos-destaques">
            <?php echo do_shortcode("[wpcsp id='10516']"); ?><!--Promoção 1-->
            <?php echo do_shortcode("[wpcsp id='10528']"); ?><!--Varejo-->
            <?php echo do_shortcode("[wpcsp id='10519']"); ?><!--Promoção 3-->
            <?php echo do_shortcode("[wpcsp id='10529']"); ?><!--Logistica-->
            <?php echo do_shortcode("[wpcsp id='10517']"); ?><!--Promoção 2-->
        </div>

        <h3 class="sublinhado" style="margin-top: 55px;">Conheça a Russel</h3>
    </main>
    </section>

    <section class="background canvas-animate">
        <?php $back = theme_url('assets/img/cel-alt.png');?>
        <div class="second-image">
            <img src="<?php echo $back;?>">
        </div>
        <div class="play">
            <?php $play_video = theme_url('assets/img/play2_alt3.svg');?>
            <a class="fancybox" data-fancybox-type="iframe" href="https://www.youtube.com/embed/Mo4lI-Tz3Bs?rel=0"><img src="<?php echo $play_video;?>"></a>
        </div>
        <div class="botoes">
            <div class="btnvideo">
                <a class="fancybox" data-fancybox-type="iframe" type="button" href="https://www.youtube.com/embed/nhtf7bmynz8">Sobre a Empresa</a>
            </div>
            <div class="btnvideo2">
                <a class="fancybox" data-fancybox-type="iframe" href="https://www.youtube.com/embed/Mo4lI-Tz3Bs?rel=0">Como Funciona</a>
            </div>
        </div>
    </section>


    <section class="container">
        <main id="main" class="site-main" style="overflow-x: initial">

        <section class="galeria-clientes">
            <h3 style="margin-top: 50px;" class="sublinhado">Nossos Clientes</h3>
            <div class="clientes-fileira1">
                <div class="cliente">
                    <?php $logo1 = theme_url('assets/img/clientes/rio-2016.jpg')?>
                    <a href="#"><img src="<?php echo $logo1;?>"></a>
                </div>
                <div class="cliente">
                    <?php $logo2 = theme_url('assets/img/clientes/atlas-full.png');?>
                    <a href="#"><img src="<?php echo $logo2;?>"></a>
                </div>
                <div class="cliente">
                    <?php $logo3 = theme_url('assets/img/clientes/furnas.jpg');?>
                    <a href="#"><img src="<?php echo $logo3;?>"></a>
                </div>
                <div class="cliente">
                    <?php $logo4 = theme_url('assets/img/clientes/gafisa.jpg');?>
                    <a href="#"><img src="<?php echo $logo4;?>"></a>
                </div>
            </div>
            <div class="button-clientes">
                <a class="btn-clientes" href="https://www.russelservicos.com.br/nossos-clientes/">Veja todos os clientes</a>
            </div>
        </section>
    </main>
    </section>


        <!--------------DEPOIMENTO 1--------------->

        <section class="depoimento">
            <div class="depoimento1">
                <div class="image-aspas">
                    <?php $aspas = theme_url('assets/img/depoimentos/aspas.png');?>
                    <img src="<?php echo $aspas;?>">
                </div>
                <div class="text-depoimento">
                    <p>Qualidade significa oferecer a nós clientes produtos inovadores que
                        satisfaçam plenamente as nossas exigências e com a Russel Serviços
                        foi assim, agilidade no ato da compra, ótimo atendimento,
                        colaboradores e dirigentes sempre prontos a ajudar e bom preço.</p>
                </div>
                <div class="img-cliente">
                    <?php $cliente1 = theme_url('assets/img/depoimentos/img-depoimento.jpg');?>
                    <img src="<?php echo $cliente1;?>" width="100px">
                </div>
                <div class="img-logo">
                    <?php $panorama = theme_url('assets/img/depoimentos/logo-panorama.png');?>
                    <!--                    <img src="--><?php //echo $panorama;?><!--" width="90px" height="60px">-->
                    <p class="nome-cliente">Guilherme Capucci</p>
                    <p class="cargo-cliente">Panorama Brazil</p>
                </div>
            </div>

            <!--------------DEPOIMENTO 2--------------->
            <div class="depoimento1">
                <div class="image-aspas">
                    <?php $aspas = theme_url('assets/img/depoimentos/aspas.png');?>
                    <img src="<?php echo $aspas;?>">
                </div>
                <div class="text-depoimento">
                    <p>Venho por meio desta parabenizá-los pelo atendimento, tudo perfeito,
                        do primeiro contato ao final. O atendimento, a gerência e os
                        profissionais que contratamos eram de uma atenção e educação ímpar.
                        Parabéns! Só tenho a aplaudir.</p>
                </div>
                <div class="img-cliente">
                    <?php $cliente2 = theme_url('assets/img/depoimentos/jane-img.jpg');?>
                    <img src="<?php echo $cliente2;?>" width="100px">
                </div>
                <div class="img-logo">
                    <p class="nome-cliente">Jane Barbosa</p>
                    <p class="cargo-cliente">LV Logística</p>
                </div>
            </div>

            <!--------------DEPOIMENTO 3--------------->
            <div class="depoimento1">
                <div class="image-aspas">
                    <?php $aspas = theme_url('assets/img/depoimentos/aspas.png');?>
                    <img src="<?php echo $aspas;?>">
                </div>
                <div class="text-depoimento">
                    <p>Nos dias de hoje, o tempo é um fator crucial em nosso mercado. A Russel
                        Serviços me possibilitou uma otimização em meus processos de
                        contratação de mão de obra operacional, tudo feito com praticidade e
                        segurança. Recomendo aos meus amigos engenheiros.</p>
                </div>
                <div class="img-cliente">
                    <?php $cliente3 = theme_url('assets/img/depoimentos/carlos-img.jpg');?>
                    <img src="<?php echo $cliente3;?>" width="100px">
                </div>
                <div class="img-logo">
                    <?php $panorama = theme_url('assets/img/depoimentos/logo-panorama.png');?>
                    <p class="nome-cliente">Junior Carletti</p>
                    <p class="cargo-cliente">Carletti Engenharia</p>
                </div>
            </div>
        </section>

    <section class="container">
        <main id="main" class="site-main" style="overflow-x: initial">
        <section class="imprensa" style="margin-bottom: 90px">
            <h3 class="sublinhado">Na Mídia</h3>
            <a href="https://www.russelservicos.com.br/na-midia/"><img src="<?php echo $imprensa;?>"></a>
        </section>


        <section class="blog-home">
            <a href="https://www.russelservicos.com.br/blog/"><h3 class="sublinhado">Blog</h3></a>
            <?php $args = array('post_type' => 'post', 'posts_per_page' => 3);
            $blog = new WP_Query($args);?>
            <?php while ($blog->have_posts()):$blog->the_post(); ?>
                <div class="blog-3">
                    <h3><?php the_category(); ?></h3>
                    <div class="image">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumb-destaque'); ?></a>
                    </div>
                    <div class="descricao" style="float: left !important; margin-top: 0">
                        <p class="title-blog"><?php the_title(); ?></p>
                        <p><?php the_excerpt(); ?></p>
                        <a style="color: #CD1F25; padding-left: 12px; font-weight: bold; font-size: 18px" href="<?php the_permalink(); ?>">Leia mais >></a>
                    </div>
                </div>
            <?php endwhile; ?>
        </section>
        <section class="newsletter">
            <div class="news-content">
                <div class="carta">
                    <img class="img-carta" src="<?php echo $carta;?>" alt="Terceirização de Mão de Obra RJ - Russel Serviços">
                </div>
                <div class="desc-news">
                    <p>Assine nossa NEWSLETTER e <br>receba novidades e dicas <br>profissionais em primeira mão!</p>
                </div>
            <div class="input-news">
                <?php echo do_shortcode('[contact-form-7 id="6769" title="Newsletter"]');?>
            </div>
                <img class="aviao-botao" src="<?php echo $aviao;?>">
            </div>
        </section>
    </main>
    </section>
<?php get_footer(); ?>