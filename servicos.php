<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$contador = 0;
require_once('admin/class/ClassServico.php');
$servico = new servicoClass();
$lista = $servico->listar();
// print_r($lista);

// Inclui o arquivo de conexão e a classe Galeria
require_once('admin/class/ClassGaleria.php');

// Cria uma nova instância da classe GaleriaClass
$galeria = new galeriaClass();
$listaGaleria = $galeria->listarAtivos(); // Obtém todos os itens da galeria
// print_r($listaGaleria);
require_once('admin/class/ClassBanner.php');
$banner = new bannerClass();
$listaBanner = $banner->ListarAtivosServico();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Patas e pelos Pethouse</title>
    <!--Reseta o estilo-->
    <link rel="stylesheet" href="css/reset.min.css" />

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

    <!--Aponta para o arquivo de estilo-->
    <link rel="stylesheet" href="css/estilo.min.css" />
    <link rel="stylesheet" href="css/estilo_servico.min.css" />
    <link rel="stylesheet" href="css/mobile.css" />
    <link rel="stylesheet" href="css/mobile_servico.min.css" />
</head>

<body>
    <header>
        <!--FAIXA MENU-->
        <?php include_once 'conteudos/menu-superior.php' ?>
        <!--FIM FAIXA MENU-->
    </header>
    <main>
        <!--BANNER PRINCIPAL-->
        <section class="site">
    <!--banner rotativo-->
    <div class="banner">
        <?php foreach ($listaBanner as $linha) : ?>
        <img src="admin/<?php echo $linha['fotoBanner'] ?>" alt="<?php echo $linha['nomeBanner'] ?>" draggable=false />
        <?php endforeach; ?>
    </div>
    </section>



        <section class="fundo_site">
            <div class="site">
                <div class="topo-servico">
                    <div class="topo-servico-textos">
                        <h2 class="wow animate__animated animate__flipInX">Nossos Serviços</h2>
                        <p class="wow animate__animated animate__fadeIn">E ache o que melhor se encaixa com voce:</p>
                    </div>
                </div>
            </div>

            <div class="carrosel_alinhamento">
                <div class="carrosel_servico">
                    <?php
                    $contador = 0; // Inicializa o contador antes do loop
                    $contadorImg = 0;
                    foreach ($lista as $linha) : ?>
                        <?php if ($linha['statusServico'] == "ATIVO") : ?>
                            <?php if ($contador % 2 == 0) : ?>
                                <!-- Bloco para contadores pares -->
                                <div class="fade_delay1 wow animate__animated animate__fadeIn">
                                    <div class="servico_imagem_container">
                                        <div class="carrosel_icons">
                                            <?php if ($contadorImg == 0) : ?>
                                                <img src="img/servicos/carrosel/1.svg" alt="" class="circle-image">
                                                <?php $contadorImg++; ?>
                                            <?php elseif ($contadorImg == 1) : ?>
                                                <img src="img/servicos/carrosel/2.svg" alt="" class="circle-image">
                                                <?php $contadorImg = 0; ?>
                                            <?php endif; ?>
                                            <img src="admin/img/<?php echo $linha['fotoServico'] ?>" alt="" class="icon-image">
                                        </div>

                                        <img src="img/servicos/carrosel/fundo_1.svg" alt=""> <!--adicionar outro contador pra bola do fundo como fazer se vira -->
                                        <div class="carrosel_conteudo">
                                            <div class="carrosel_texto">
                                                <h2 class="wow animate__animated animate__flipInX"><?php echo $linha['nomeServico'] ?></h2>
                                                <p class="wow animate__animated animate__fadeIn"><?php echo $linha['descricaoServico'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <!-- Bloco para contadores ímpares -->
                                <div class="fade_delay1 wow animate__animated animate__fadeIn">
                                    <div class="servico_imagem_container">
                                        <div class="carrosel_icons_v2">
                                            <?php if ($contadorImg == 0) : ?>
                                                <img src="img/servicos/carrosel/1.svg" alt="" class="circle-image">
                                                <?php $contadorImg++; ?>
                                            <?php elseif ($contadorImg == 1) : ?>
                                                <img src="img/servicos/carrosel/2.svg" alt="" class="circle-image">
                                                <?php $contadorImg = 0; ?>
                                            <?php endif; ?>
                                            <img src="admin/img/<?php echo $linha['fotoServico'] ?>" alt="" class="icon-image">
                                        </div>
                                        <img src="img/servicos/carrosel/fundo_2.svg" alt="">
                                        <div class="carrosel_conteudo_v2">
                                            <div class="carrosel_texto_v2">
                                                <h2 class="wow animate__animated animate__flipInX"><?php echo $linha['nomeServico'] ?></h2>
                                                <p class="wow animate__animated animate__fadeIn"><?php echo $linha['descricaoServico'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php $contador++; // Incrementa o contador 
                        ?>
                    <?php endforeach; ?>
                </div>

                <!-- <div class="fade_delay2 wow animate__animated animate__fadein">
                        <div class="servico_imagem_container_v2">
                        <img src="img/servicos/carrosel/tosa_icon.svg" alt="">
                            <img src="img/servicos/carrosel/fundo_2.svg" alt="">
                            <div class="carrosel_conteudo_v2">
                                <div class="carrosel_texto_v2">
                                    <h2 class="wow animate__animated animate__flipInX">Produtos</h2>
                                    <p class="wow animate__animated animate__fadeIn">Daske no mate la shuri kine daskina
                                        prukunia prukinu baskineia. Daskina de prukununia de la kunia transkina de la kuni
                                        prutukia nas daski daskina tereia daki.</p>
                                </div>
                                <a href="#">Consulte</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="fade_delay3 wow animate__animated animate__fadein">
                        <div class="servico_imagem_container">
                        <img src="img/servicos/carrosel/blusa_icon.svg" alt="">
                            <img src="img/servicos/carrosel/fundo_1.svg" alt="">
                            <div class="carrosel_conteudo">
                                <div class="carrosel_texto">
                                    <h2 class="wow animate__animated animate__flipInX">Produtos</h2>
                                    <p class="wow animate__animated animate__fadeIn">Daske no mate la shuri kine daskina
                                        prukunia prukinu baskineia. Daskina de prukununia de la kunia transkina de la kuni
                                        prutukia nas daski daskina tereia daki.</p>
                                </div>
                                <a href="#">Consulte</a>
                            </div>
                        </div>
                    </div>

                    <div class="fade_delay1 wow animate__animated animate__fadein">
                        <div class="servico_imagem_container_v2">
                        <img src="img/servicos/carrosel/tosa_icon.svg" alt="">
                            <img src="img/servicos/carrosel/fundo_2.svg" alt="">
                            <div class="carrosel_conteudo_v2">
                                <div class="carrosel_texto_v2">
                                    <h2 class="wow animate__animated animate__flipInX">Produtos</h2>
                                    <p class="wow animate__animated animate__fadeIn">Daske no mate la shuri kine daskina
                                        prukunia prukinu baskineia. Daskina de prukununia de la kunia transkina de la kuni
                                        prutukia nas daski daskina tereia daki.</p>
                                </div>
                                <a href="#">Consulte</a>
                            </div>
                        </div>
                    </div> -->

            </div>

            </div>


        </section>

        <section class="fundo_site">
            <div class="site">


                <div class="servico_fundo">
                    <span class="fade_batata1 wow animate__animated animate__fadein"><img src="img/enfeites/bolota1.svg" alt="" /> </span>
                    <span class="fade_batata2 wow animate__ animate__fadein animated"><img src="img/enfeites/bolota2.svg" alt="" /> </span>
                    <span class="fade_batata3 wow animate__animated animate__fadein"><img src="img/enfeites/bolota3.svg" alt="" /> </span>
                    <span class="fade_batata4 wow animate__animated animate__fadein"><img src="img/enfeites/bolota4.svg" alt="" /> </span>
                    <span class="fade_batata5 wow animate__animated animate__fadein"><img src="img/enfeites/bolota5.svg" alt="" /> </span>
                </div>
                <div class="servico_card_main">
                    <div class="servico_card">
                        <img class="fade_fundo1 wow animate__animated animate__fadein" src="img/servicos/servicos/serviço_fundo.svg" alt="">
                        <div class="servico_banner_v2">
                            <img class="fade_icone1 wow animate__animated animate__fadein" src="img/servicos/servicos/bolas.svg" alt="">
                            <div class="servico_conteudo_v2">
                                <h2 class="animate__animated animate__flipInX">Pet house</h2>
                                <p class="animate__animated animate__fadeIn">Oferecemos serviços de Pet House. Traga seu pet para nós! </p>
                                
                            </div>
                        </div>
                    </div>

                    <div class="servico_card">
                        <img class="fade_fundo2 wow animate__animated animate__fadein" src="img/servicos/servicos/serviço_fundo.svg" alt="">
                        <div class="servico_banner">
                            <img class="fade_icone2 wow animate__animated animate__fadein" src="img/servicos/servicos/shampoo.svg" alt="">
                            <div class="servico_conteudo">
                                <h2 class="wow animate__animated animate__flipInX">Banho e tosa</h2>
                                <p class="wow animate__animated animate__fadeIn">Oferecemos serviços de banho e tosa. Vem saber mais! </p>
                                
                            </div>
                        </div>
                    </div>

                    <div class="servico_card">
                        <img class="fade_fundo3 wow animate__animated animate__fadein" src="img/servicos/servicos/serviço_fundo.svg" alt="">
                        <div class="servico_banner">
                            <img class="fade_icone3 wow animate__animated animate__fadein" src="img/servicos/servicos/coleira.svg" alt="">
                            <div class="servico_conteudo">
                                <h2 class="wow animate__animated animate__flipInX">Passeio</h2>
                                <p class="wow animate__animated animate__fadeIn">Seu pet merece sair um pouquinho também. Oferecemos passeios com os nossos profissionais! </p>
                                
                            </div>
                        </div>
                    </div>

                    <div class="servico_card">
                        <img class="fade_fundo4 wow animate__animated animate__fadein" src="img/servicos/servicos/serviço_fundo.svg" alt="">
                        <div class="servico_banner">
                            <img class="fade_icone4 wow animate__animated animate__fadein" src="img/servicos/servicos/sacola.svg" alt="">
                            <div class="servico_conteudo">
                                <h2 class="wow animate__animated animate__flipInX">Produtos</h2>
                                <p class="wow animate__animated animate__fadeIn">Confira a nossa loja e compre agora mesmo um presente para o seu amigo de quatro patas! </p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- galeria -->
        <section class="fundo_site">
            <div class="site">
                <div class="galeria">
                    <div class="galeria_Esquerdo_mainDIV">
                        <div class="galeria_Esquerdo">
                            <span><img class="wow animate__animated animate__fadeInDown estrela-animation-delay" src="img/enfeites/estrela_roxa.svg" alt=""></span>
                            <span><img class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="20s" src="img/enfeites/estrela_laranja.svg" alt=""></span>
                            <span><img class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="20s" src="img/enfeites/estrela_laranja.svg" alt=""></span>
                            <?php
                            $contador_G = 1;
                            if (!empty($listaGaleria)) {
                                foreach ($listaGaleria as $item) {
                                    // Exibe o HTML para cada item
                                    echo '<div class="galeria_Esquerdo_img' . $contador_G . '">';
                                    echo '    <img class="' . htmlspecialchars($item['formatoFoto'] ?? 'default-formato') . '" src="' . htmlspecialchars($item['fotoGaleria'] ?? 'default.jpg') . '" alt="Imagem Base">';
                                    // Determina qual imagem sobreposta usar com base nas condições
                                    $imagemSobreposta = $item['formatoFoto']; // Valor padrão

                                    // Verifica se formatoFoto é 'circulo'
                                    if ($item['formatoFoto'] === 'circulo') {
                                        // Se o contador_G estiver em 5, 6 ou 7, modifica a imagem para 'sobrepossicao_bola_laranja.svg'
                                        if ($contador_G === 5 || $contador_G === 6 || $contador_G === 7) {
                                            $imagemSobreposta = 'sobrepossicao_bola_laranja.svg';
                                        }
                                        else{
                                            $imagemSobreposta = 'sobrepossicao_bola_roxa.svg';
                                        }
                                    }
                                    // Verifica se formatoFoto é 'quadrado'
                                    else if ($item['formatoFoto'] === 'quadrado') {
                                        // Se o contador_G estiver em 5, 6 ou 7, modifica a imagem para 'sobrepossicao_quadrado_laranja.svg'
                                        if ($contador_G === 5 || $contador_G === 6 || $contador_G === 7) {
                                            $imagemSobreposta = 'sobrepossicao_quadrado3_laranja.svg';
                                        }
                                        else{
                                            $imagemSobreposta = 'sobrepossicao_quadrado_roxo.svg';
                                        }
                                    }

                                    // Classe de conteúdo-texto
                                    $classeConteudoTexto = $item['formatoFoto'] === 'circulo' ? 'conteudo-texto' : 'conteudo-texto-v2';

                                    // Imagem sobreposta (com condicional aplicada)
                                    echo '    <div class="conteudo-sobreposto">';
                                    echo '        <img class="imagem-sobreposta" src="img/servicos/galeria/' . htmlspecialchars($imagemSobreposta) . '" alt="Imagem Sobreposta" id="img' . $contador_G . '">';
                                    echo '        <div class="' . $classeConteudoTexto . '">';
                                    echo '            <p>' . htmlspecialchars($item['nomeGaleria'] ?? 'Nome Desconhecido') . '</p>';
                                    echo '            <p1>' . htmlspecialchars($item['nomeCliente'] ?? 'Nome Desconhecido') . '</p1>';
                                    echo '        </div>';
                                    echo '    </div>';
                                    echo '</div>';

                                    $contador_G++; // Incrementa o contador

                                    // Para após 11 iterações
                                    if ($contador_G >= 12) {
                                        break;
                                    }
                                }
                            } else {
                                echo "Nenhum registro encontrado.";
                            }

                            ?>

                            <!-- <div class="galeria_Esquerdo_img1">
                                <img class="imagem-base" src="img/servicos/galeria/foto1.svg" alt="Imagem Base">
                                <div class="conteudo-sobreposto">
                                    <img class="imagem-sobreposta" src="img/servicos/galeria/sobrepossicao_bola_roxa.svg" alt="Imagem Sobreposta" id="img1">
                                    <div class="conteudo-texto">
                                        <p>Nome</p>
                                        <p1>Nome</p1>
                                    </div>
                                </div>
                            </div> -->


                            <span><img class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="20s" src="img/enfeites/estrela_laranja.svg" alt=""></span>
                            <!-- <div class="galeria_Esquerdo_img2">
                                <img class="imagem-base" src="img/servicos/galeria/foto2.svg" alt="Imagem Base">
                                <div class="conteudo-sobreposto">
                                    <img class="imagem-sobreposta" src="img/servicos/galeria/sobrepossicao_quadrado_roxo.svg" alt="Imagem Sobreposta" id="img2">
                                    <div class="conteudo-texto">
                                        <p>Nome</p>
                                        <p1>Nome</p1>
                                    </div>
                                </div>
                            </div> -->


                            <span><img class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="20s" src="img/enfeites/estrela_laranja.svg" alt=""></span>
                            <span><img class="wow animate__animated animate__fadeIn" data-wow-durawdqwdtion="2s" data-wow-delay:="20s" src="img/enfeites/estrela_laranja.svg" alt=""></span>
                            <span><img class="wow animate__animated animate__fadeInDown estrela-animation-delay" src="img/enfeites/estrela_roxa.svg" alt=""></span>
                            <span><img class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="20s" src="img/enfeites/estrela_laranja.svg" alt=""></span>
                            <!-- <div class="galeria_Esquerdo_img3">
                                <img class="imagem-base" src="img/servicos/galeria/foto1.svg" alt="Imagem Base">
                                <div class="conteudo-sobreposto">
                                    <img class="imagem-sobreposta" src="img/servicos/galeria/sobrepossicao_bola_roxa.svg" alt="Imagem Sobreposta" id="img3">
                                    <div class="conteudo-texto">
                                        <p>Nome</p>
                                        <p1>Nome</p1>
                                    </div>
                                </div>
                            </div> -->
                            <span><img class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="20s" src="img/enfeites/estrela_laranja.svg" alt=""></span>
                            <!-- <div class="galeria_Esquerdo_img4">
                                <img class="imagem-base" src="img/servicos/galeria/foto2.svg" alt="Imagem Base">
                                <div class="conteudo-sobreposto">
                                    <img class="imagem-sobreposta" src="img/servicos/galeria/sobrepossicao_quadrado_roxo.svg" alt="Imagem Sobreposta" id="img4">
                                    <div class="conteudo-texto">
                                        <p>Nome</p>
                                        <p1>Nome</p1>
                                    </div>
                                </div>
                            </div> -->
                            <span><img class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="20s" src="img/enfeites/estrela_laranja.svg" alt=""></span>
                            <span><img class="wow animate__animated animate__fadeInDown estrela-animation-delay" src="img/enfeites/estrela_roxa.svg" alt=""></span>
                            <span><img class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="20s" src="img/enfeites/estrela_laranja.svg" alt=""></span>
                            <span><img class="wow animate__animated animate__fadeIn" data-wow-duration="2.5s" data-wow-delay:="20s" src="img/servicos/galeria/fundo1.svg" alt=""></span>
                            <span><img class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="20s" src="img/enfeites/estrela_laranja.svg" alt=""></span>

                            <span><img class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="20s" src="img/enfeites/estrela_laranja.svg" alt=""></span>
                            <!-- <div class="galeria_Esquerdo_img5">
                                <img class="imagem-base" src="img/servicos/galeria/foto3.svg" alt="Imagem Base">
                                <div class="conteudo-sobreposto">
                                    <img class="imagem-sobreposta" src="img/servicos/galeria/sobrepossicao_quadrado3_laranja.svg" alt="Imagem Sobreposta" id="img5">
                                    <div class="conteudo-texto">
                                        <p>Nome</p>
                                        <p2>Nome</p2>
                                    </div>
                                </div>
                            </div> -->
                            <span><img class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="20s" src="img/enfeites/estrela_laranja.svg" alt=""></span>
                            <!-- <div class="galeria_Esquerdo_img6">
                                <img class="imagem-base" src="img/servicos/galeria/foto1.svg" alt="Imagem Base">
                                <div class="conteudo-sobreposto">
                                    <img class="imagem-sobreposta" src="img/servicos/galeria/sobrepossicao_bola_laranja.svg" alt="Imagem Sobreposta" id="img6">
                                    <div class="conteudo-texto">
                                        <p>Nome</p>
                                        <p2>Nome</p2>
                                    </div>
                                </div>
                            </div> -->
                            <span><img class="wow animate__animated animate__fadeIn" data-wow-duration="2.5s" data-wow-delay:="20s" src="img/servicos/galeria/fundo2.svg" alt=""></span>
                            <!-- <div class="galeria_Esquerdo_img7">
                                <img class="imagem-base" src="img/servicos/galeria/foto2.svg" alt="Imagem Base">
                                <div class="conteudo-sobreposto">
                                    <img class="imagem-sobreposta" src="img/servicos/galeria/sobrepossicao_quadrado_laranja.svg" alt="Imagem Sobreposta" id="img7">
                                    <div class="conteudo-texto">
                                        <p>Nome</p>
                                        <p2>Nome</p2>
                                    </div>
                                </div>
                            </div> -->
                            <span><img class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="20s" src="img/enfeites/estrela_laranja.svg" alt=""></span>

                            <span><img class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="20s" src="img/enfeites/estrela_laranja.svg" alt=""></span>
                            <span><img class="wow animate__animated animate__fadeIn" data-wow-duration="2.5s" data-wow-delay:="20s" src="img/servicos/galeria/fundo3.svg" alt=""></span>
                            <!-- <div class="galeria_Esquerdo_img8">
                                <img class="imagem-base" src="img/servicos/galeria/foto5.svg" alt="Imagem Base">
                                <div class="conteudo-sobreposto">
                                    <img class="imagem-sobreposta" src="img/servicos/galeria/sobrepossicao_quadrado4_roxo.svg" alt="Imagem Sobreposta" id="img8">
                                    <div class="conteudo-texto">
                                        <p>Nome</p>
                                        <p1>Nome</p1>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="galeria_Esquerdo_img9">
                                <img class="imagem-base" src="img/servicos/galeria/foto4.svg" alt="Imagem Base">
                                <div class="conteudo-sobreposto">
                                    <img class="imagem-sobreposta" src="img/servicos/galeria/sobrepossicao_bola2_roxa.svg" alt="Imagem Sobreposta" id="img9">
                                    <div class="conteudo-texto">
                                        <p>Nome</p>
                                        <p1>Nome</p1>
                                    </div>
                                </div>
                            </div> -->
                            <span><img class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="20s" src="img/enfeites/estrela_laranja.svg" alt=""></span>
                            <span><img class="wow animate__animated animate__fadeInDown estrela-animation-delay" src="img/enfeites/estrela_roxa.svg" alt=""></span>
                            <!-- <div class="galeria_Esquerdo_img10">
                                <img class="imagem-base" src="img/servicos/galeria/foto4.svg" alt="Imagem Base">
                                <div class="conteudo-sobreposto">
                                    <img class="imagem-sobreposta" src="img/servicos/galeria/sobrepossicao_bola2_roxa.svg" alt="Imagem Sobreposta" id="img10">
                                    <div class="conteudo-texto">
                                        <p>Nome</p>
                                        <p1>Nome</p1>
                                    </div>
                                </div>
                            </div> -->
                            <span><img class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="20s" src="img/enfeites/estrela_laranja.svg" alt=""></span>
                            <span><img class="wow animate__animated animate__fadeInDown estrela-animation-delay" data-wow-duration="6s" src="img/enfeites/estrela_roxa.svg" alt=""></span>
                            <span><img class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="20s" src="img/enfeites/estrela_laranja.svg" alt=""></span>
                            <!-- <div class="galeria_Esquerdo_img11">
                                <img class="imagem-base" src="img/servicos/galeria/foto4.svg" alt="Imagem Base">
                                <div class="conteudo-sobreposto">
                                    <img class="imagem-sobreposta" src="img/servicos/galeria/sobrepossicao_bola_roxa.svg" alt="Imagem Sobreposta" id="img11">
                                    <div class="conteudo-texto">
                                        <p>Nome</p>
                                        <p1>Nome</p1>
                                    </div>
                                </div>
                            </div> -->
                            <span><img class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="20s" src="img/enfeites/estrela_laranja.svg" alt=""></span>
                            <span><img class="wow animate__animated animate__fadeInDown estrela-animation-delay" data-wow-duration="6s" src="img/enfeites/estrela_roxa.svg" alt=""></span>
                        </div>
                    </div>


                    <div class="galeria_D">
                        <h2 class="titulo_roxo animate__animated animate__flipInX">Nossa Galeria!</h2>
                        <p class="subtitulo_laranja animate__animated animate__fadeIn">Confira conosco as nossas fofurices e se apaixone por eles.</p>
                    </div>
                </div>
            </div>
            </div>

        </section>

        <section class="site">
            <div class="contato">
                <div>
                    <h2 class="titulo_roxo wow animate__animated animate__flipInX ">Entre em contato agora!</h2>
                    <h2 class="subtitulo_laranja wow animate__animated animate__flipInX" data-wow-delay:="3s">E faça o seu pet feliz.</h2>
                    <a href="https://pethouse.smpsistema.com.br/john/Patas_e_pelos/contato.php" class="wow animate__animated animate__fadeIn" data-wow-delay:="6s">clique aqui!</a>

                </div>
                <img src="img/servicos/contato/contato.svg" alt="" />
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

    <script src="https://cdn.jsdelivr.net/npm/simple--js@5.5.1/dist/simple.min.js"></script>

    <!--arquivo de configuração das animações-->
    <script src="js/animacoes.js"></script>
    <!--WOW-->
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
</body>