<?php
require_once('class/ClassBanner.php');
$banner = new bannerClass();
$lista = "";
// Definir variável PHP para receber o valor selecionado
//A categoria é só pra manter apenas um metodo de filtragem 
$pagina = @$_GET['p'];
$statusSelecionado = @$_GET['status'];
$paginaSelecionada = @$_GET['pagina'];

//Todas as paginas
if ($statusSelecionado == 'todos' && $paginaSelecionada == 'todas') {
    $lista = $banner->ListarTodos();
}
if ($statusSelecionado == 'ativos' && $paginaSelecionada == 'todas') {
    $lista = $banner->ListarAtivosTodos();
}
if ($statusSelecionado == 'desativados' && $paginaSelecionada == 'todas') {
    $lista = $banner->ListarDesativadosTodos();
}

//Pagina home
if ($statusSelecionado == 'todos' && $paginaSelecionada == 'home') {
    $lista = $banner->ListarTodosHome();
}
if ($statusSelecionado == 'ativos' && $paginaSelecionada == 'home') {
    $lista = $banner->ListarAtivosHome();
}
if ($statusSelecionado == 'desativados' && $paginaSelecionada == 'home') {
    $lista = $banner->ListarDesativadosHome();
}

//Pagina serviço
if ($statusSelecionado == 'todos' && $paginaSelecionada == 'servico') {
    $lista = $banner->ListarTodosServico();
}
if ($statusSelecionado == 'ativos' && $paginaSelecionada == 'servico') {
    $lista = $banner->ListarAtivosServico();
}
if ($statusSelecionado == 'desativados' && $paginaSelecionada == 'servico') {
    $lista = $banner->ListarDesativadosServico();
}

//print_r($lista)
?>

<form action="http://pethouse.smpsistema.com.br/john/patas_e_pelos/admin/index.php?p=banner" id="paginaHomeFiltragemBanner" method="$_POST">
    <div class="opcoes">

        <a href="index.php?p=banner&b=inserir" alt="botão adicionar">Adicionar</a>
        <select id="filtragemStatusBanner" name="filtragemStatusBanner" onchange="filtrar('<?php echo $pagina ?>')">
            <option value="todos" <?php echo $statusSelecionado == 'todos' ? 'selected' : ''; ?>>Todos</option>
            <!-- se o valor da variavel $statusSelecionado for 'todos', a saída(html) fica assim:<option value="todos" selected>Todos</option>
            Senão, saída(html) fica assim:<option value="todos">Todos</option>
            A diferença entre um e outro é q se tem o atributo select nele quer dizer que ele é atributo selecionado-->

            <option value="ativos" <?php echo $statusSelecionado == 'ativos' ? 'selected' : ''; ?>>Ativos</option>
            <!-- se o valor da variavel $statusSelecionado for 'ativos', a saída(html) fica assim:<option value="ativos" selected>Ativos</option>
            Senão, saída(html) fica assim:<option></option> value="ativos">Ativos</option>
                A diferença entre um e outro é q se tem o atributo select nele quer dizer que ele é atributo selecionado>-->

            <option value="desativados" <?php echo $statusSelecionado == 'desativados' ? 'selected' : ''; ?>>Desativados</option>
            <!-- se o valor da variavel $statusSelecionado for 'desativos', a saida(html)fica assim:<option value="desativos" selected>Desativos</option>
            Senão, saída(html) fica assim:<option value="desativos">Desativos<
                A diferença entre um e outro é q se tem o atributo select nele quer dizer que ele é atributo selecionado>-->
        </select>

        <select id="filtragemPaginaBanner" name="filtragemPaginaBanner" onchange="filtrar('<?php echo $pagina ?>')">
            <option value="todas" <?php echo $paginaSelecionada == 'todas' ? 'selected' : ''; ?>>Todas</option>
            <!-- se o valor da variavel $paginaSelecionada for 'todas', a saída(html) fica assim:<option value="todas" selected>Todas</option>
            Senão, saída(html) fica assim:<option value="todas">Todas</option>
            A diferença entre um e outro é q se tem o atributo select nele quer dizer que ele é atributo selecionado-->

            <option value="home" <?php echo $paginaSelecionada == 'home' ? 'selected' : ''; ?>>Home</option>
            <!-- se o valor da variavel $paginaSelecionada for 'home', a saída(html) fica assim:<option value="home" selected>home</option>
            Senão, saída(html) fica assim:<option></option> value="home">home</option>
                A diferença entre um e outro é q se tem o atributo select nele quer dizer que ele é atributo selecionado>-->

            <option value="servico" <?php echo $paginaSelecionada == 'servico' ? 'selected' : ''; ?>>Servico</option>
            <!-- se o valor da variavel $paginaSelecionada for 'servico', a saida(html)fica assim:<option value="servico" selected>servico</option>
            Senão, saída(html) fica assim:<option value="servico">servico<
                A diferença entre um e outro é q se tem o atributo select nele quer dizer que ele é atributo selecionado>-->
        </select>
    </div>
</form>

<?php foreach ($lista as $linha) : ?> <!--laço para exibir todos os banner do banco de dados-->
    <div class="caixaItem">
        <span><img class="imgBanner" src="<?php echo $linha['fotoBanner'] ?>" alt="<?php echo $linha['nomeBanner'] ?>" draggable="false"></span>
        <div class="identificacaoEFuncao">
            <span>
                <h2><?php echo $linha['nomeBanner'] ?></h2>
            </span>
            <button class="botaoAtualizar"><a href="index.php?p=banner&b=atualizar&id=<?php echo $linha['idBanner'] ?>">Atualizar</a></button>

            <button class="<?php echo $linha['statusBanner'] == 'ATIVO' ? 'botaoDesativar' : 'botaoAtivar' ?>"><!--caso o status seja ativo ele chama chama a clase botãoDesativar se n chama o botãoAtivar-->
                <?php
                echo $linha['statusBanner'] == 'ATIVO' ? "<a href='index.php?p=banner&b=desativar&id=" . $linha['idBanner'] . "'>Desativar</a>" : "<a href='index.php?p=banner&b=ativar&id=" . $linha['idBanner'] . "'>Ativar</a>"; ?><!--caso o status seja ativo ele poe o texto como desativar caso contrario coloca como ativar-->
        </div>
    </div>
<?php endforeach; ?>