<?php
if (isset($_POST['nomeCliente'])) {
    $nomeCliente = $_POST['nomeCliente'];
    $enderecoCliente = $_POST['enderecoCliente'];
    $telefoneCliente = $_POST['telefoneCliente'];
    $emailCliente = $_POST['emailCliente'];
    $senhaCliente = $_POST['senhaCliente'];
    $altCliente = 'foto' . $nomeCliente;
    $statusCliente = "ATIVO";


    require_once('class/Conexao.php');
    $conexao = Conexao::LigarConexao();

    $sql = $conexao->query('SELECT idCliente FROM tbl_cliente ORDER BY idCliente DESC LIMIT 1;');

    $resultado = $sql->fetch(pdo::FETCH_ASSOC);

    if ($resultado !== false && isset($resultado['idCliente'])) {
        $novoId = $resultado['idCliente'] + 1;
    }

    $arquivo = $_FILES['fotoCliente'];
    if ($arquivo['error']) {
        throw new Exception("Deu pau, " . $arquivo['error']);
    }

    $extenssao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);

    $nomeCliFoto = str_replace(' ', '', $nomeCliente);
    $nomeCliFoto = iconv('UTF-8', 'ASCII//TRANSLIT', $nomeCliFoto);
    $nomeCliFoto = preg_replace('/[^a-zA-Z0-9]/', '', $nomeCliFoto);

    $novoNome = $novoId . '_' . $nomeCliFoto . '.' . $extenssao;

    //Mover a imagem
    if (move_uploaded_file($arquivo['tmp_name'], 'img/cliente/' . $novoNome)) //Primeiro atributo é de onde sai e o segundo pra onde vai
    {
        //Esse aqui é o nome final dessa bagunça q é pra fica nesse formato aq servico/ronaldo1.png
        $fotoCliente = 'img/cliente/' . $novoNome;
    } else {
        throw new Exception('Deu pau, n deu pra subi essa bomba de imagem não. ');
    }

    require_once('class/ClassCliente.php');
    $cliente = new clienteClass();

    $cliente->nomeCliente     = $nomeCliente;
    $cliente->enderecoCliente = $enderecoCliente;
    $cliente->telefoneCliente = $telefoneCliente;
    $cliente->emailCliente    = $emailCliente;
    $cliente->senhaCliente    = $senhaCliente;
    $cliente->fotoCliente     = $fotoCliente;
    $cliente->statusCliente   = $statusCliente;
    $cliente->altCliente      = 'foto ' . $nomeCliente;

    $cliente->inserir();
}
?>

<form action="index.php?p=cliente&cli=inserir" method="POST" enctype="multipart/form-data">
    <div class="caixaInserir caixaInserirCliente">
        <div>
            <span>
                <img id="imgFoto" src="img/semImagem.png" draggable="false">
                <input type="file" class="form-control" id="fotoCliente" name="fotoCliente" required style="display: none;">
            </span>
            <div class="dadosDecadastro dadosDecadastroCliente">
                <div>
                    <label for="nomeCliente">Nome do cliente</label>
                    <input type="text" id="nomeCliente" name="nomeCliente" required>
                </div>
                <div>
                    <div>
                        <label for="enderecoCliente">Endereço do Cliente</label>
                        <input type="text" id="enderecoCliente" name="enderecoCliente" required>
                    </div>
                    <div>
                        <label for="telefoneCliente">Telefone do Cliente</label>
                        <input type="text" id="telefoneCliente" name="telefoneCliente" required>
                    </div>
                </div>
                <div>
                    <div>
                        <label for="emailCliente">Email do Cliente</label>
                        <input type="text" id="emailCliente" name="emailCliente" required>
                    </div>
                    <div>
                        <label for="senhaCliente">Senha do Cliente</label>
                        <input type="text" id="senhaCliente" name="senhaCliente" required>
                    </div>
                </div>

            </div>
        </div>
        <button type="submit">Cadastrar</button>
    </div>

    </div>
</form>

<script>
    //Transformar img em um botão
    //foca na parte 
    document.getElementById("imgFoto").addEventListener('click', function() {
        // alert("hoje eu mato um");
        //aqui a gente ta chamando o input pelo id pq ele é display none ent a gente ta fazendo que quando a gente clique na foto abra ele 
        document.getElementById("fotoCliente").click();
    })
    //esse change ta falando q quando o foto servico receber o "click" ele vai muda o alvo do que vai ser mudado ent em vez de adicionar na caixa de pesquisa ali do input ele vai muda a img na imgFoto
    document.getElementById('fotoCliente').addEventListener('change', function(event) {

        let imgFoto = document.getElementById("imgFoto");
        let arquivo = event.target.files[0]; //quando inserir um arquivo ele vai puxa a primeira propriedade e vai atribuir a variavel arquivo

        if (arquivo) {
            let carregar = new FileReader(); //tamo instanciando a classe FileReader essa é padrão do javaScript

            //aqui a gente ta chamando a função onload da carregar vulgo FileReader
            carregar.onload = function(e) {
                imgFoto.src = e.target.result; //tamo atribuindo pro src(Caminho da foto) o resultado do alvo(target.result)
            }
            carregar.readAsDataURL(arquivo);
        }
    })
</script>