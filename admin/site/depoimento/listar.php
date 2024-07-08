<?php
require_once('class/ClassDepo.php');
$depo = new depoimentoClass();
$lista = "";

$categoria = @$_GET['p']; //A categoria é só pra manter apenas um metodo de filtragem 
$statusSelecionado = @$_GET['status'];

//Todas as paginas
if ($statusSelecionado == 'todos') {
    $lista = $depo->ListarTodos();
}
if ($statusSelecionado == 'ativos') {
    $lista = $depo->ListarAtivos();
}
if ($statusSelecionado == 'desativados') {
    $lista = $depo->ListarInativos();
}
?>

<form action="http://localhost/Site-PatasEPelos/admin/index.php?p=depoimento" id="paginaHomeFiltragemDepoimento" method="$_POST">
    <div class="opcoes">
        <select id="filtragemStatusDepo" name="filtragemStatusDepo" onchange="filtrar('<?php echo $categoria ?>')">
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

<?php foreach ($lista as $linha) : ?> <!--laço para exibir todos os depo do banco de dados-->
    <div class="caixaItem caixaItemDepo">
        <span><img class="imgDepoimento" src="<?php echo $linha['fotoDepo'] ?>" alt="<?php echo $linha['nomePetDepo'] ?>" draggable="false"></span>
        <div class="identificacaoEFuncao identificacaoEFuncaoDepo">
            <span>
                <h2><?php echo $linha['nomePetDepo'] ?></h2>
                <h2><?php echo $linha['nomeDonoDepo'] ?></h2>
            </span>
            <span>
                <p><?php echo $linha['textoDepo'] ?></p>
            </span>
            <button class="<?php echo $linha['statusDepo'] == 'ATIVO' ? 'botaoDesativar' : 'botaoAtivar' ?>"><!--caso o status seja ativo ele chama chama a clase botãoDesativar se n chama o botãoAtivar-->
                <?php
                echo $linha['statusDepo'] == 'ATIVO' ? "<a href='index.php?p=depoimento&d=desativar&id=" . $linha['idDepo'] . "'>Desativar</a>" :
                    "<a href='index.php?p=depoimento&d=ativar&id=" . $linha['idDepo'] . "'>Ativar</a>"; ?>
                <!--caso o status seja ativo ele poe o texto como desativar caso contrario coloca como ativar--></button>
        </div>
    </div>
<?php endforeach; ?>