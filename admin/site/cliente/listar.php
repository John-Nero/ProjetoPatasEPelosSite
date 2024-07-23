<?php
require_once('class/ClassCliente.php');
$cliente = new clienteClass();
$lista = "";

$pagina = @$_GET['p']; //A pagina é só pra manter apenas um metodo de filtragem 
$statusSelecionado = @$_GET['status'];
//Todas as paginas
if ($statusSelecionado == 'todos') {
    $lista = $cliente->ListarTodos();
}
if ($statusSelecionado == 'ativos') {
    $lista = $cliente->ListarAtivos();
}
if ($statusSelecionado == 'desativados') {
    $lista = $cliente->ListarInativos();
}
?>

<form action="http://pethouse.smpsistema.com.br/john/patas_e_pelos/admin/index.php?p=cliente" id="paginaHomeFiltragem" method="$_POST">
    <div class="opcoes">
        <a href="index.php?p=cliente&cli=inserir" alt="botão adicionar">Adicionar</a>
        <select id="filtragemStatusCliente" name="filtragemStatusCliente" onchange="filtrar('<?php echo $pagina ?>')">
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


<?php foreach ($lista as $linha) : ?> <!--laço para exibir todos as cliente do banco de dados-->
    <div class="caixaItem caixaItemCliente">
        <span><img class="imgCliente" src="<?php echo $linha['fotoCliente'] ?>" alt="<?php echo $linha['altCliente'] ?>" draggable="false"></span>
        <div class="identificacaoEFuncao identificacaoEFuncaoCliente">
            <div>
                <span>
                    <h2><?php echo $linha['nomeCliente'] ?></h2>
                </span>
                <span>
                    <h2><?php echo $linha['telefoneCliente'] ?></h2>
                    <h2><?php echo $linha['enderecoCliente'] ?></h2>
                    <h2><?php echo $linha['emailCliente'] ?></h2>
                    <h2>Senha: <?php echo $linha['senhaCliente'] ?></h2>
                </span>
            </div>
            <div>
                <?php
                $datCadCliente = $linha['datCadCliente'];
                // Converta o valor datetime para um formato apenas de data
                $dataFormatada = date('d/m/Y', strtotime($datCadCliente));
                ?>
                <h2>Data Cad: <?php echo $dataFormatada ?></h2>
                <button class="botaoAtualizar"><a href="index.php?p=cliente&cli=atualizar&id=<?php echo $linha['idCliente'] ?>">Atualizar</a></button>
                <button class="<?php echo $linha['statusCliente'] == 'ATIVO' ? 'botaoDesativar' : 'botaoAtivar' ?>"><!--caso o status seja ativo ele chama chama a clase botãoDesativar se n chama o botãoAtivar-->
                    <?php
                    echo $linha['statusCliente'] == 'ATIVO' ? "<a href='index.php?p=cliente&cli=desativar&id=" . $linha['idCliente'] . "'>Desativar</a>" :
                        "<a href='index.php?p=cliente&cli=ativar&id=" . $linha['idCliente'] . "'>Ativar</a>"; ?>
                    <!--caso o status seja ativo ele poe o texto como desativar caso contrario coloca como ativar-->
                </button>
            </div>

        </div>
    </div>
<?php endforeach; ?>