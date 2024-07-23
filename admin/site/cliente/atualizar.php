<?php 
require_once('class/ClassCliente.php');
$id = $_GET['id'];
$cliente = new clienteClass($id);


// Verifica se a variável 'nomeCliente' foi definida(preenchida) no corpo da requisição POST(ali no html no form)
if (isset($_POST['nomeCliente'])) {

    $nomeCliente     = $_POST['nomeCliente'];
    $enderecoCliente = $_POST['enderecoCliente'];
    $telefoneCliente = $_POST['telefoneCliente'];
    $emailCliente    = $_POST['emailCliente'];
    $senhaCliente    = $_POST['senhaCliente'];

    $statusCliente   = $_POST['statusCliente'];;
    $altCliente      = "foto" . $nomeCliente;

    //verificar se a foto foi modificada
    if (!empty($_FILES['fotoCliente']['name'])) {
        //Recuperar o id
        $novoId = $cliente->idCliente;

        //Tratar o campo FILES
        $arquivo = $_FILES['fotoCliente'];
        if ($arquivo['error']) {
            throw new Exception('O erro foi: ' . $arquivo['error']);
        }

        //Obter a extensão do arquivo
        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $nomeCliFoto = str_replace(' ', '', $nomeCliente); //substitui um 'espaço' para 'sem espaço'
        $nomeCliFoto = iconv('UTF-8', 'ASCII//TRANSLIT', $nomeCliFoto); //remover sinais diacriticos (remove os caracteres especiais)
        $nomeCliFoto = strtolower($nomeCliFoto);

        //novo nome da imagem
        $novoNome = $novoId . '_' . $nomeCliFoto . '.' . $extensao;

        print_r($novoNome);

        //Mover a imagem
        if (move_uploaded_file($arquivo['tmp_name'], 'img/cliente/' . $novoNome)) {
            $fotoCliente = 'img/cliente/' . $novoNome;
        } else {
            throw new Exception('DEU PAU ZÉ');
        }
    } else {
        $fotoCliente = $cliente->fotoCliente;
    }
    //agr vamo coloca no banco de dados
    $cliente->nomeCliente       = $nomeCliente;
    $cliente->enderecoCliente   = $enderecoCliente;
    $cliente->telefoneCliente   = $telefoneCliente;
    $cliente->emailCliente      = $emailCliente;
    $cliente->senhaCliente      = $senhaCliente;
    $cliente->fotoCliente       = $fotoCliente;
    $cliente->altCliente        = $altCliente;


    $cliente->atualizar();
}
?>

<form action="index.php?p=cliente&cli=atualizar&id=<?php echo $cliente->idCliente; ?>" method="POST" enctype="multipart/form-data">
    <div class="caixaInserir caixaInserirCliente">
        <div>
            <span>
                <img id="imgFoto" src="<?php echo $cliente->fotoCliente ?>" draggable="false">
                <input type="file" class="form-control" id="fotoCliente" name="fotoCliente"  style="display: none;">
            </span>
            <div class="dadosDecadastro dadosDecadastroCliente">
                <div>
                    <label for="nomeCliente">Nome do cliente</label>
                    <input type="text" id="nomeCliente" name="nomeCliente"   value="<?php echo $cliente->nomeCliente ?>">
                </div>
                <div>
                    <div>
                        <label for="enderecoCliente">Endereço do Cliente</label>
                        <input type="text" id="enderecoCliente" name="enderecoCliente"  value="<?php echo $cliente->enderecoCliente ?>">
                    </div>
                    <div>
                        <label for="telefoneCliente">Telefone do Cliente</label>
                        <input type="text" id="telefoneCliente" name="telefoneCliente"  value="<?php echo $cliente->telefoneCliente ?>">
                    </div>
                </div>
                <div>
                    <div>
                        <label for="emailCliente">Email do Cliente</label>
                        <input type="text" id="emailCliente" name="emailCliente"  value="<?php echo $cliente->emailCliente ?>">
                    </div>
                    <div>
                        <label for="senhaCliente">Senha do Cliente</label>
                        <input type="text" id="senhaCliente" name="senhaCliente"  value="<?php echo $cliente->senhaCliente ?>">
                    </div>
                </div>

            </div>
        </div>
        <button type="submit">Atualizar</button>
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