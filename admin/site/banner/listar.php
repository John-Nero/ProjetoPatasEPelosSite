<?php
require_once('class/ClassBanner.php');
$banner = new bannerClass();
$lista = "";
// Definir variável PHP para receber o valor selecionado
$valorSelecionado = $_GET['opcao'];

if ($valorSelecionado == 'ativos') {
    $lista = $banner->ListarAtivos();
} else
if ($valorSelecionado == 'desativados') {
    $lista = $banner->ListarDesativados();
} else {
    $lista = $banner->ListarTodos();
}

//print_r($lista)
?>

<form action="http://localhost/Site-PatasEPelos/admin/index.php?p=banner" id="paginaHomeFiltragemBanner" method="$_POST">
    <div class="opcoes">

        <a href="index.php?p=banner&b=atualizar">Adicionar</a>
        <select id="filtragemStatus" name="filtragemStatus" onchange="filtrar()">
            <option value="todos" <?php echo $valorSelecionado == 'todos' ? 'selected' : ''; ?>>Todos</option>
            <!-- se o valor da variavel $valorSelecionado for 'todos', a saída(html) fica assim:<option value="todos" selected>Todos</option>
            Senão, saída(html) fica assim:<option value="todos">Todos</option>
            A diferença entre um e outro é q se tem o atributo select nele quer dizer que ele é atributo selecionado-->

            <option value="ativos" <?php echo $valorSelecionado == 'ativos' ? 'selected' : ''; ?>>Ativos</option>
            <!-- se o valor da variavel $valorSelecionado for 'ativos', a saída(html) fica assim:<option value="ativos" selected>Ativos</option>
            Senão, saída(html) fica assim:<option></option> value="ativos">Ativos</option>
                A diferença entre um e outro é q se tem o atributo select nele quer dizer que ele é atributo selecionado>-->

            <option value="desativados" <?php echo $valorSelecionado == 'desativados' ? 'selected' : ''; ?>>Desativados</option>
            <!-- se o valor da variavel $valorSelecionado for 'desativos', a saida(html)fica assim:<option value="desativos" selected>Desativos</option>
            Senão, saída(html) fica assim:<option value="desativos">Desativos<
                A diferença entre um e outro é q se tem o atributo select nele quer dizer que ele é atributo selecionado>-->
        </select>
    </div>
</form>

<?php foreach ($lista as $linha) : ?> <!--laço para exibir todos os banner do banco de dados-->
    <div id="caixaBanner">
        <span><img id="imgBanner" src="<?php echo $linha['fotoBanner'] ?>" alt="<?php echo $linha['nomeBanner'] ?>" draggable="false"></span>
        <div id="identificacaoEFuncaoBanner">
            <span>
                <h2><?php echo $linha['nomeBanner'] ?></h2>
            </span>
            <button class="<?php echo $linha['statusBanner'] == 'ATIVO' ? 'botaoDesativar' : 'botaoAtivar' ?>"><!--caso o status seja ativo ele chama chama a clase botãoDesativar se n chama o botãoAtivar-->
                <?php echo $linha['statusBanner'] == 'ATIVO' ? 'Desativar' : 'Ativar' ?></button><!--caso o status seja ativo ele poe o texto como desativar caso contrario coloca como ativar-->
        </div>
    </div>
<?php endforeach; ?>