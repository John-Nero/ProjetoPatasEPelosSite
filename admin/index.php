<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard Patas e pelos</title>
    <link rel="icon" href="..\img\favicon.ico">



    <!--API do google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100..1000&family=Roboto:wght@900&1display=swap" rel="stylesheet" />


    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Reseta o estilo-->
    <link rel="stylesheet" href="css/reset.css" />

    <!--Aponta para o arquivo de estilo da pagina index-->
    <link rel="stylesheet" href="css\estilo.css" />

    <!--Aponta para o arquivo de estilo dos conteudos das categorias-->
    <link rel="stylesheet" href="css\estilo_conteudo.css" />
</head>

<body>
    <main>
        <div class="site">
            <div class="menu_lateral">
                <img src="..\img\Logo_Patas_e_pelos.svg" alt="Logo Patas e pelos" draggable="false">
                <nav>
                    <ul>
                        <li><a href="index.php?p=banner&status=todos&pagina=todas">Banner's</a></li>
                        <li><a href="index.php?p=depoimento&status=todos">Depoimentos </a></li>
                        <li><a href="index.php?p=categoria">Categorias</a></li>
                        <li><a href="index.php?p=cliente">Clientes</a></li>
                        <li><a href="index.php?p=pet">Pet's</a></li>
                    </ul>
                </nav>
            </div>
            <div>
                <div class="faixa_superior">
                    <h2>DashBoard</h2>
                    <div class="usuario">
                        <img src="img/perfil.png" alt="">
                        <span>
                            <h2>El Puta</h2>
                            <h2>Administrador</h2>
                        </span>
                    </div>
                </div>
                <div class="conteudo_central">
                    <?php
                    $pagina = @$_GET['p'];

                    switch ($pagina) {
                        case 'banner':
                            $titulo = 'Banner';
                            require_once('site/banner/banner.php');
                            break;

                        case 'depoimento':
                            $titulo = 'Depoimento';
                            require_once('site/depoimento/depoimento.php');
                            break;

                        case 'categoria':
                            $titulo = 'Categoria';
                            require_once('site/categoria/categoria.php');
                            break;

                        case 'cliente':
                            $titulo = 'Cliente';
                            require_once('site/cliente/cliente.php');
                            break;

                        case 'pet':
                            $titulo = 'Pet';
                            require_once('site/pet/pet.php');
                            break;

                        default:
                            $titulo = 'Banner';
                            break;
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>

    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    <!--Estamos chamando o javascript pelo php porque nós usaremos o valor que será retornado da função em uma variavel no php-->
    <script src="js/script.js"></script>


</body>

</html>