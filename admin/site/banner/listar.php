<?php
require_once('class/ClassBanner.php');
$banner = new bannerClass();

$lista = $banner->Listar();
//print_r($lista)
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>

    <link rel="stylesheet" href="css/estilo_conteudo.css">
</head>

<body>
    <div class="opcoes">

        <a href="index.php?p=banner">Adicionar</a>
        <select id="selecao" name="selecao">
            <option value="todos">Todos</option>
            <option value="ativos">Ativos</option>
            <option value="desativos">Desativos</option>
        </select>
    </div>


    <?php foreach ($lista as $linha) : ?>
        <div id="caixaBanner">
            <span><img id="imgBanner" src="<?php echo $linha['fotoBanner'] ?>" alt="<?php echo $linha['nomeBanner'] ?>" draggable="false"></span>
            <div id="identificacaoEFuncaoBanner">
                <h2><?php echo $linha['nomeBanner'] ?></h2>
                <button>Ativar</button>
            </div>

        </div>
    <?php endforeach; ?>
</body>

</html>