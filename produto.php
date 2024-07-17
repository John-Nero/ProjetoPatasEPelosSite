<?php
require_once('admin/class/ClassProduto.php');
$produto = new ClassProduto();
$lista = '';
// print_r($lista);
require_once('admin/class/ClassCategoria.php');
$categoria = new categoriaClass();
$listaC = $categoria->listarTodos();
// print_r($listaC);

$statusSelecionado = @$_GET['status'];

$categoriaB = @$_GET['c'];


if($categoriaB == "todos"){
    $lista = $produto->Listar();
}
if($categoriaB == "Cachorro"){
    $lista = $produto->ListarCao();
}
if($categoriaB == "Chinchila"){
    $lista = $produto->ListarChinchila();
}
if($categoriaB == "Gato"){
    $lista = $produto->ListarGato();
}
if($categoriaB == "Hamster"){
    $lista = $produto->ListarHamster();
}
if($categoriaB == "Passaro"){
    $lista = $produto->ListarPassaro();
}
if($categoriaB == "Peixe"){
    $lista = $produto->ListarPeixe();
}
if($categoriaB == "Tartaruga"){
    $lista = $produto->ListarTataruga();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
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

    <!--Aponta para o arquivo de estilo-->
    <link rel="stylesheet" href="css/estilo.css" />
    <link rel="stylesheet" href="css/estilo_produto.css">
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
            <div class="produto_main">
                <img src="img/produto/animais.svg" alt="">
                <div class="alinha">
                    <div class="produto_itens">
                        <?php foreach ($lista as $linha) : ?>
                            <div class="produto_div">
                                <div class="produto_exibido">
                                    <img src="img/produto/<?php echo $linha['fotoProduto'] ?>" alt="">
                                    <h2><?php echo $linha['nomeProduto'] ?></h2>
                                </div>

                                <div class="produto_info_fundo">
                                    <div class="produto_info">
                                        <div class="produto_texto">
                                            <h2>A partir de <br><span class="valor">R$<?php echo $linha['valorProduto'] ?></span></h2>
                                            <div class="alinhamento_status">
                                            <p>Estado:</p>
                                            <p2><?php echo $linha['statusProduto'] == 'ATIVO' ? 'Disponivel na loja' : 'Indisponivel na loja' ?></p2>
                                            </div>
                                        </div>
                                        <button><a href="#">Reserve Já</a></button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- lado direito -->
                    <div class="filtro">
                        <h2>Categorias</h2>
                        <nav>
                            <ul>
                                <li class="menu-item">
                                    <h2 class="menu-button">Procure por pets</h2>
                                    <ul class="subMenu">
                                        <!-- Sub Menu Serviço -->
                                        <li><button type="button" onclick="filtrar('todos')">Todos</li>
                                        <?php foreach ($listaC as $linha) : ?>
                                        <li><button type="button" onclick="filtrar('<?php echo $linha['nomeCategoria'] ?>')"><?php echo $linha['nomeCategoria'] ?></button></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <!-- Fim Sub Menu Serviço -->
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="js/script.js"></script>
</body>

</html>