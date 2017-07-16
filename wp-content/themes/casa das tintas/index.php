<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css">-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.6.6/jquery.fullPage.css" rel="stylesheet">
    <!--<script type="text/javascript" src="js/script.js"></script>-->

    <style type="text/css">
      section {
        background: url('https://unsplash.it/1910/1221?image=626') no-repeat center / cover;
      }

      #fp-nav ul li a span, 
      .fp-slidesNav ul li a span {
          background: white;
          width: 8px;
          height: 8px;
          margin: -4px 0 0 -4px;
      }
            
      #fp-nav ul li a.active span, 
      .fp-slidesNav ul li a.active span, 
      #fp-nav ul li:hover a.active span, 
      .fp-slidesNav ul li:hover a.active span {
          width: 16px;
          height: 16px;
          margin: -8px 0 0 -8px;
          background: transparent;
          box-sizing: border-box;
          border: 1px solid #24221F;
      }
    </style>

    <title>Home - Casa das Tintas</title>

  </head>
  <body>
    <!--<div id="header">
      <div class="container">
        <a href="index.html">Casa das Tintas</a>
        <ul>
          <li><a href="index.html">Início</a></li>
          <li><a href="#contato">Contato</a></li>
        </ul>
      </div>
    </div>

    <div class="slug">
      <img src="images/capa.png">
    </div>

    <div class="examples">
      <div class="container">
        <img src="images/img-calculadora-tinta.jpg">
        <img src="images/img-guia-de-pintura.jpg">
        <img src="images/img-iclub.jpg">
        <img src="images/img-simulador-ambientes.jpg">
      </div>
    </div>

    <div id="contato" class="container">
      <h2>Contato</h2>
      <form class="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" class="form-control">
        <label for="email">E-mail:</label>
        <input type="text" name="email" id="email" class="form-control">
        <label for="ass">Assunto:</label>
        <textarea name="ass" id="ass" class="form-control"></textarea>
        <button type="button" onClick="getContactForm();">Enviar</button>
      </form>
    </div>

    <div id="footer">
      <div class="container">
        <div class="facebook">
          ESTAMOS NO FACEBOOK
        </div>
        <div class="map">
          ONDE NOS ENCONTRAR
        </div>
      </div>
    </div>-->

    <div id="fullpage">
      <section class="vertical-scrolling">
          <h2>fullPage.js</h2>
          <h3>This is the first section</h3>
          <div class="scroll-icon">
              <p>Jump into the last slide</p>
              <a href="#fifthSection/1" class="icon-up-open-big"></a>
          </div>
      </section>
      <section class="vertical-scrolling">
          <!-- content here -->
      </section>
      <section class="vertical-scrolling">
          <!-- content here -->
      </section>
      <section class="vertical-scrolling">
          <!-- content here -->
      </section>  
      <section class="vertical-scrolling">
        <div class="horizontal-scrolling">
        <h2>fullPage.js</h2>
        <h3>This is the fifth section and it contains the first slide</h3>
      </div>
      <div class="horizontal-scrolling">
        <h2>fullPage.js</h2>
        <h3>This is the second slide</h3> 
        <p class="end">Thank you!</p>
      </div>
      </section> 
    </div>


    <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.6.6/jquery.fullPage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.6.6/jquery.fullPage.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      alert()
    });

    $('#fullpage').fullpage({
      sectionSelector: '.vertical-scrolling',
      slideSelector: '.horizontal-scrolling',
      controlArrows: false
      // more options here
    });
    </script>
    
  </body>
</html>