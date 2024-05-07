<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Patas e pelos Pethouse</title>
    
    <!--Reseta o estilo-->
    <link rel="stylesheet" href="css/reset.css" />

    <!--API do google para os icones-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!--API do google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100..1000&family=Roboto:wght@900&1display=swap" rel="stylesheet" />

    <!--SLICK-->
    <link rel="stylesheet" href="css/slick.css" />
    <link rel="stylesheet" href="css/slick-theme.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!--ANIMATE STYLE-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!--Aponta para o arquivo de estilo-->
    <link rel="stylesheet" href="css/estilo.css" />
    <link rel="stylesheet" href="css/mobile.css" />
    
  </head>

  <body>
    <header>
      <!--FAIXA MENU-->
      <?php include_once 'conteudos/menu_superior.php'?>
      <!--FIM FAIXA MENU-->
    </header>
    <main>
      <!--BANNER PRINCIPAL-->
      <?php include_once 'conteudos/banners.php'?>
      <!--fIM BANNER PRINCIPAL-->

      <!--AGENDE SEU HORARIO-->
      <?php include_once 'conteudos/agenda_horario.php'?>
      <!--FIM AGENDE SEU HORARIO-->

      <!--CATEGORIAS-->
      <?php include_once 'conteudos/categorias.php'?>
      <!--FIM CATEGORIAS-->

      <!-- TOSA E BANHO -->
      <?php include_once 'conteudos/banho_e_tosa.php'?>
      <!-- FIM TOSA E BANHO -->

      <!-- SOBRE NOS -->
      <?php include_once 'conteudos/sobre_nos.php'?>
      <!-- FIM SOBRE NOS -->

      <!--EQUIPE-->
      <?php include_once 'conteudos/equipe.php'?>
      <!-- FIM EQUIPE-->

      <!--DEPOIMENTO-->
      <?php include_once 'conteudos/depoimento.php'?>
      <!--FIM DEPOIMENTO-->

      <!--VENHA NOS VISITAR-->
      <?php include_once 'conteudos/visita.php'?>
      <!--FIM VENHA NOS VISITAR-->
    </main>

    <!--RODAPÉ-->
    <?php include_once 'conteudos/rodape.php'?>
    <!--FIM RODAPÉ-->

    <!--Aqui a gente ta chamando o jquery para o slick funcionar-->
    <!--jQuery-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!--Slick para animações-->
    <script type="text/javascript" src="js/slick.min.js"></script>


     <!--WOW-->
     <script src="js/wow.min.js"></script>
     <script>
              new WOW().init();
              </script>
    


    <!--arquivo de configuração das animações-->
    <script src="js/animacoes.js"></script>
  </body>
</html>
