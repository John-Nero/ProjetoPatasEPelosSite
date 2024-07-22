<?php

require_once('class/ClassCategoria.php');
$id = $_GET['id'];
$categoria = new categoriaClass($id);

// Verifica se a variável 'nomeCategoria' foi definida(preenchida) no corpo da requisição POST(ali no html no form)
if (isset($_POST['nomeCategoria'])) {
    $nomeCategoria     = $_POST['nomeCategoria'];
    $altCategoria      = "foto" . $nomeCategoria;

    //verificar se a foto foi modificada
    if (!empty($_FILES['fotoCategoria']['name'])) {
        //Recuperar o id
        $novoId = $categoria->idCategoria;

        //Tratar o campo FILES
        $arquivo = $_FILES['fotoCategoria'];
        if ($arquivo['error']) {
            throw new Exception('O erro foi: ' . $arquivo['error']);
        }

        //Obter a extensão do arquivo
        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $nomeCatFoto = str_replace(' ', '', $nomeCategoria); //substitui um 'espaço' para 'sem espaço'
        $nomeCatFoto = iconv('UTF-8', 'ASCII//TRANSLIT', $nomeCatFoto); //remover sinais diacriticos (remove os caracteres especiais)
        $nomeCatFoto = strtolower($nomeCatFoto);

        //novo nome da imagem
        $novoNome = $novoId . '_' . $nomeCatFoto . '.' . $extensao;

        //print_r($novoNome);

        //Mover a imagem
        if (move_uploaded_file($arquivo['tmp_name'], 'img/categoria/' . $novoNome)) {
            $fotoCategoria = 'categoria/' . $novoNome;
        } else {
            throw new Exception('DEU PAU ZÉ');
        }
    } else {
        $fotoCategoria = $categoria->fotoCategoria;
    }
    //agr vamo coloca no banco de dados
    $categoria->nomeCategoria       = $nomeCategoria;
    $categoria->fotoCategoria       = $fotoCategoria;
    $categoria->altCategoria        = $altCategoria;
    $categoria->atualizar();
}
?>

<form action="index.php?p=categoria&ca=atualizar&id=<?php echo $categoria->idCategoria; ?>" method="POST" enctype="multipart/form-data">
    <div class="caixaInserir">
        <div>
            <span><img id="imgFoto" src="<?php echo $categoria->fotoCategoria ?>" draggable="false">
                <input type="file" class="form-control" id="fotoCategoria" name="fotoCategoria" style="display: none;"></span>>
            <div class="dadosDecadastro">
                <div>
                    <label for="nomeCategoria">Nome da categoria</label>
                    <input type="text" id="nomeCategoria" name="nomeCategoria" value="<?php echo $categoria->nomeCategoria ?>">
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
        document.getElementById("fotoBanner").click();
    })
    //esse change ta falando q quando o foto servico receber o "click" ele vai muda o alvo do que vai ser mudado ent em vez de adicionar na caixa de pesquisa ali do input ele vai muda a img na imgFoto
    document.getElementById('fotoBanner').addEventListener('change', function(event) {

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