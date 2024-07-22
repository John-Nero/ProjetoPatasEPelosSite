<?php
require_once('class/ClassCategoria.php');
$categoria = new categoriaClass();
$lista = "";

$pagina = @$_GET['p']; //A pagina é só pra manter apenas um metodo de filtragem 
$statusSelecionado = @$_GET['status'];
//Todas as paginas
if ($statusSelecionado == 'todos') {
    $lista = $categoria->ListarTodos();
}
if ($statusSelecionado == 'ativos') {
    $lista = $categoria->ListarAtivos();
}
if ($statusSelecionado == 'desativados') {
    $lista = $categoria->ListarInativos();
}
?>

<form action="http://pethouse.smpsistema.com.br/john/patas_e_pelos/admin/index.php?p=categoria" id="paginaHomeFiltragemCategoria" method="$_POST">
    <div class="opcoes">
        <a href="index.php?p=categoria&ca=inserir" alt="botão adicionar">Adicionar</a>
        <select id="filtragemStatusCategoria" name="filtragemStatusCategoria" onchange="filtrar('<?php echo $pagina ?>')">
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

<div class="painelCategoria"> <!-- O objetivo dessa classe é só pra deixa todos os itens lado a lado no display flex e wrap pra caber certinho na tela-->
    <?php foreach ($lista as $linha) : ?> <!--laço para exibir todos as categoria do banco de dados-->
        <div class="caixaItem caixaItemCategoria">
            <span><img class="imgCategoria" src="<?php echo $linha['fotoCategoria'] ?>" alt="<?php echo $linha['altCategoria'] ?>" draggable="false"></span>
            <div class="identificacaoEFuncao identificacaoEFuncaoCategoria">
                <span>
                    <h2><?php echo $linha['nomeCategoria'] ?></h2>
                </span>
                <button class="<?php echo $linha['statusCategoria'] == 'ATIVO' ? 'botaoDesativar' : 'botaoAtivar' ?>"><!--caso o status seja ativo ele chama chama a clase botãoDesativar se n chama o botãoAtivar-->
                    <?php
                    echo $linha['statusCategoria'] == 'ATIVO' ? "<a href='index.php?p=categoria&ca=desativar&id=" . $linha['idCategoria'] . "'>Desativar</a>" :
                        "<a href='index.php?p=categoria&ca=ativar&id=" . $linha['idCategoria'] . "'>Ativar</a>"; ?>
                    <!--caso o status seja ativo ele poe o texto como desativar caso contrario coloca como ativar--></button>
            </div>
        </div>
    <?php endforeach; ?>
</div>