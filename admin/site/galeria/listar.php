<?php
require_once('class/ClassGaleria.php');
$galeria = new galeriaClass();

$lista = "";

$pagina = @$_GET['p']; //A pagina é só pra manter apenas um metodo de filtragem 
$statusSelecionado = @$_GET['status'];
//Todas as paginas
if ($statusSelecionado == 'todos') {
    $lista = $galeria->ListarTodos();
}
if ($statusSelecionado == 'ativos') {
    $lista = $galeria->ListarAtivos();
}
if ($statusSelecionado == 'desativados') {
    $lista = $galeria->ListarInativos();
}
?>

<form action="http://pethouse.smpsistema.com.br/john/patas_e_pelos/admin/index.php?p=galeria" id="paginaHomeFiltragemGaleria" method="$_POST">
    <div class="opcoes">
        <a href="index.php?p=galeria&g=inserir" alt="botão adicionar">Adicionar</a>
        <select id="filtragemStatusGaleria" name="filtragemStatusGaleria" onchange="filtrar('<?php echo $pagina ?>')">
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
    </div>
</form>
<div class="painelGaleria">
    <?php foreach ($lista as $linha) : ?> <!--laço para exibir todos os Galeria do banco de dados-->
        <div class="caixaItem caixaIteGaleria">
            <span><img class="imgGaleria" src="<?php echo $linha['fotoGaleria'] ?>" alt="<?php echo $linha['nomePetGaleria'] ?>" draggable="false"></span>
            <div class="identificacaoEFuncao identificacaoEFuncaoGaleria">
                <span>
                    <h2>nome: <?php echo $linha['nomeGaleria'] ?></h2>
                    <h2>nome do cliente: <?php echo $linha['nomeCliente'] ?></h2>
                    <h2>formato: <?php echo $linha['formatoFoto'] ?></h2>
                </span>

                <button class="botaoAtualizar"><a href="index.php?p=galeria&g=atualizar&id=<?php echo $linha['idGaleria'] ?>">Atualizar</a></button>
                <button class="<?php echo $linha['statusGaleria'] == 'ATIVO' ? 'botaoDesativar' : 'botaoAtivar' ?>"><!--caso o status seja ativo ele chama chama a clase botãoDesativar se n chama o botãoAtivar-->
                    <?php
                    echo $linha['statusGaleria'] == 'ATIVO' ? "<a href='index.php?p=galeria&g=desativar&id=" . $linha['idGaleria'] . "'>Desativar</a>" :
                        "<a href='index.php?p=galeria&g=ativar&id=" . $linha['idGaleria'] . "'>Ativar</a>"; ?>
                    <!--caso o status seja ativo ele poe o texto como desativar caso contrario coloca como ativar--></button>
            </div>
        </div>
    <?php endforeach; ?>
</div>