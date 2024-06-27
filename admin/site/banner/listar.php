<?php
require_once('class/ClassBanner.php');
$banner = new bannerClass();

// Definir variável PHP para receber o valor selecionado
$valorSelecionado = "";

// Verificar se o formulário foi submetido e atualizar a variável PHP
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['filtragemStatus'])) {
        $valorSelecionado = $_POST['filtragemStatus'];
    }

    print_r($valorSelecionado);
}
$lista = $banner->Listar();
//print_r($lista)
?>

<form id="paginaHomeFiltragemBanner" method="$_POST">
    <div class="opcoes">

        <a href="index.php?p=banner">Adicionar</a>
        <select id="filtragemStatus" name="filtragemStatus" onchange="filtrar()">
            <option value="todos">Todos</option>
            <option value="ativos">Ativos</option>
            <option value="desativos">Desativos</option>
        </select>
    </div>
</form>

<?php foreach ($lista as $linha) : ?>
    <div id="caixaBanner">
        <span><img id="imgBanner" src="<?php echo $linha['fotoBanner'] ?>" alt="<?php echo $linha['nomeBanner'] ?>" draggable="false"></span>
        <div id="identificacaoEFuncaoBanner">
            <span>
                <h2><?php echo $linha['nomeBanner'] ?></h2>
            </span>
            <button>Ativar</button>
        </div>

    </div>
<?php endforeach; ?>