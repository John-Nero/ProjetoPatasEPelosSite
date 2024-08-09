<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sobre nós - Patas e pelos Pethouse</title>
    <link rel="icon" href="img/favicon.ico">
    <!--Reseta o estilo-->
    <link rel="stylesheet" href="css/reset.min.css" />

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
    <link rel="stylesheet" href="css/estilo.min.css" />
    <link rel="stylesheet" href="css/estilo_sobre_nos.min.css" />

    <link rel="stylesheet" href="css/mobile.css" />

</head>

<body>
    <header>
        <!--FAIXA MENU-->
        <?php include_once 'conteudos/menu-superior.php' ?>
        <!--FIM FAIXA MENU-->
    </header>

    <main>
        <section class="site">
            <!--Primeira sessão do site-->
            <div class="sobre_nos_pt1">
                <span><img src="img/PG_sobre_nos/MascaraGato.svg" alt="Doutora segurando um gato" draggable=false></span>
                <span><img src="img/enfeites/esfera_roxo_escuro.svg" draggable=false></span>
                <span><img src="img/enfeites/esfera_roxo_escuro.svg" draggable=false></span>

                <div>
                    <h1>Sobre nós</h1>
                    <h2 class="subtitulo_laranja">Conheça um pouco mais de nós</h2>
                    <p>A Patas e Pelos foi fundada em 2022 com o propósito de levar amor para os pets dos nossos clientes. </p>
                </div>
                <img src="img/enfeites/blobs_roxo.svg" draggable=false>
            </div>



            <!--Primeira sessão do site-->
            <div class="sobre_nos_pt2">
                <span><img src="img/enfeites/blobs_roxo.svg" draggable=false></span>
                <div>
                    <h2>Quem somos</h2>
                    <h2 class="subtitulo_laranja">Vem saber mais.</h2>
                    <p>Temos uma equipe pronta para oferecer o melhor atendimento ao seu pet. Conte conosco para cuidar dele com carinho e dedicação! </p>
                </div>
                <span><img src="img/PG_sobre_nos/Mascaracachorro.svg" alt="Cachorro vestindo jaleco de veterinario" draggable=false></span>
            </div>
            <span id="mascaraLimpaSobreNos"><img src="img/PG_sobre_nos/mascaraLimpaSobreNos.svg" alt="Cachorro vestindo jaleco de veterinario" draggable=false></span>

        </section>

        <section class="site">
            <!--Carrosel de marcas parceiras-->
            <div class="marcas">
                <div>
                    <h2>Marcas Parceiras</h2>
                    <h2 class="subtitulo_laranja">Conheça as nossas marcas <br> parceiras</h2>
                </div>
                <div class="carrosel_Marcas">
                    <div><span><img src="img/PG_sobre_nos/marcas/marca2.svg" alt="Patas unidas" draggable=false></span>

                    </div>
                    <div><span><img src="img/PG_sobre_nos/marcas/marca3.svg" alt="Personalit cats" draggable=false></span>

                    </div>
                    <div><span><img src="img/PG_sobre_nos/marcas/marca4.svg" alt="União agraria" draggable=false></span>

                    </div>
                    <div><span><img src="img/PG_sobre_nos/marcas/marca5.svg" alt="Love pets" draggable=false></span>

                    </div>
                    <div><span><img src="img/PG_sobre_nos/marcas/marca1.svg" alt="Petz do paraguai" draggable=false></span>

                    </div>
                    <div><span><img src="img/PG_sobre_nos/marcas/marca2.svg" alt="Patas unidas" draggable=false></span>

                    </div>
                    <div><span><img src="img/PG_sobre_nos/marcas/marca3.svg" alt="Personalit cats" draggable=false></span>

                    </div>
                    <div><span><img src="img/PG_sobre_nos/marcas/marca4.svg" alt="União agraria" draggable=false></span>

                    </div>
                    <div><span><img src="img/PG_sobre_nos/marcas/marca5.svg" alt="Love pets" draggable=false></span>

                    </div>
                    <div><span><img src="img/PG_sobre_nos/marcas/marca1.svg" alt="Petz do paraguai" draggable=false></span>

                    </div>
                </div>
            </div>


        </section>
    </main>
    <!--RODAPÉ-->
    <?php include_once 'conteudos/rodape.php' ?>
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

    <!--Script de funções js-->
     <script src="js/script.js">
        </script>

        <!--arquivo de configuração das animações-->
        <script src="js/animacoes.js"></script>
</body>