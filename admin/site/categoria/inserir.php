<?php
if (isset($_POST['nomeCategoria'])) {
    $nomeCategoria = $_POST['nomeCategoria'];
    $altCategoria = 'foto' . $nomeCategoria;
    $statusCategoria = "ATIVO";

    require_once('class/Conexao.php');
    $conexao = Conexao::LigarConexao();

    $sql = $conexao->query('SELECT idCategoria FROM tbl_categorias ORDER BY idCategoria DESC LIMIT 1;');

    $resultado = $sql->fetch(pdo::FETCH_ASSOC);

    if ($resultado !== false && isset($resultado['idCategoria'])) {
        $novoId = $resultado['idCategoria'] + 1;
    }

    $arquivo = $_FILES['fotoCategoria'];
    if ($arquivo['error']) {
        throw new Exception("Deu pau, " . $arquivo['error']);
    }

    $extenssao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);

    $nomeCatFoto = str_replace(' ', '', $nomeCategoria);
    $nomeCatFoto = iconv('UTF-8', 'ASCII//TRANSLIT', $nomeCatFoto);
    $nomeCatFoto = preg_replace('/[^a-zA-Z0-9]/', '', $nomeCatFoto);

    $novoNome = $novoId . '_' . $nomeCatFoto . '.' . $extenssao;

    //Mover a imagem
    if (move_uploaded_file($arquivo['tmp_name'], 'img/categoria/' . $novoNome)) //Primeiro atributo é de onde sai e o segundo pra onde vai
    {
        //Esse aqui é o nome final dessa bagunça q é pra fica nesse formato aq servico/ronaldo1.png
        $fotoCategoria = 'img/categoria/' . $novoNome;
    } else {
        throw new Exception('Deu pau, n deu pra subi essa bomba de imagem não. ');
    }

    require_once('class/ClassCategoria.php');
    $categoria = new categoriaClass();

    $categoria->nomeCategoria = $nomeCategoria;
    $categoria->fotoCategoria = $fotoCategoria;
    $categoria->statusCategoria = $statusCategoria;
    $categoria->altCategoria = 'foto ' . $nomeCategoria;

    $categoria->inserir();
}

?>
<form action="index.php?p=categoria&ca=inserir" method="POST" enctype="multipart/form-data">
    <div class="caixaInserir">
        <div>
            <span><img id="imgFoto" src="img/semImagem.png" draggable="false">
                <input type="file" class="form-control" id="fotoCategoria" name="fotoCategoria" required style="display: none;"></span>
            <div class="dadosDecadastro">
                <div>
                    <label for="nomeCategoria">Nome da categoria</label>
                    <input type="text" id="nomeCategoria" name="nomeCategoria" required>
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
        document.getElementById("fotoCategoria").click();
    })
    //esse change ta falando q quando o foto servico receber o "click" ele vai muda o alvo do que vai ser mudado ent em vez de adicionar na caixa de pesquisa ali do input ele vai muda a img na imgFoto
    document.getElementById('fotoCategoria').addEventListener('change', function(event) {

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