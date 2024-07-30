<?php
require_once('class/ClassGaleria.php');
$id = $_GET['id'];
$galeria = new galeriaClass($id);

if (isset($_POST['nomeGaleria'])) {
    $nomeGaleria    = $_POST['nomeGaleria'];
    $altGaleria     = 'foto' . $nomeGaleria;
    $statusGaleria  = "ATIVO";
    $formatoFoto    = $_POST['formatoFoto'];
    $nomeCliente    = $_POST['nomeCliente'];

    require_once('class/Conexao.php');
    $conexao = Conexao::LigarConexao();

    $sql = $conexao->query('SELECT idGaleria FROM tbl_galeria ORDER BY idGaleria DESC LIMIT 1;');

    $resultado = $sql->fetch(pdo::FETCH_ASSOC);

    if ($resultado !== false && isset($resultado['idGaleria'])) {
        $novoId = $resultado['idGaleria'] + 1;
    }

    $arquivo = $_FILES['fotoGaleria'];
    if ($arquivo['error']) {
        throw new Exception("Deu pau, " . $arquivo['error']);
    }

    $extenssao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);

    $nomeGalFoto = str_replace(' ', '', $nomeGaleria);
    $nomeGalFoto = iconv('UTF-8', 'ASCII//TRANSLIT', $nomeGalFoto);
    $nomeGalFoto = preg_replace('/[^a-zA-Z0-9]/', '', $nomeGalFoto);

    $novoNome = $novoId . '_' . $nomeGalFoto . '.' . $extenssao;

    //Mover a imagem
    if (move_uploaded_file($arquivo['tmp_name'], 'img/galeria/' . $novoNome)) //Primeiro atributo é de onde sai e o segundo pra onde vai
    {
        //Esse aqui é o nome final dessa bagunça q é pra fica nesse formato aq servico/ronaldo1.png
        $fotoGaleria = 'img/galeria/' . $novoNome;
    } else {
        throw new Exception('Deu pau, n deu pra subi essa bomba de imagem não. ');
    }

    require_once('class/ClassGaleria.php');
    $galeria = new galeriaClass();

    $galeria->nomeGaleria   = $nomeGaleria;
    $galeria->nomeCliente  = $nomeCliente;
    $galeria->fotoGaleria   = $fotoGaleria;
    $galeria->statusGaleria = $statusGaleria;
    $galeria->altGaleria    = 'foto ' . $nomeGaleria;
    $galeria->formatoFoto   = $formatoFoto;

    $galeria->Atualizar();
}

?>
<form action="index.php?p=galeria&g=atualizar&id=<?php echo $galeria->idGaleria; ?>" method="POST" enctype="multipart/form-data">
    <div class="caixaInserir">
        <div>
            <span><img id="imgFoto" src="<?php echo $galeria->fotoGaleria ?>" draggable="false">
                <input type="file" class="form-control" id="fotoGaleria" name="fotoGaleria" required style="display: none;"></span>
            <div class="dadosDecadastro">
                <div>
                    <label for="nomeGaleria">Nome da foto</label>
                    <input type="text" id="nomeGaleria" name="nomeGaleria" value="<?php echo $galeria->nomeGaleria ?>">
                </div>
                <div>
                    <label for="nomeCliente">Nome do cliente</label>
                    <input type="text" id="nomeCliente" name="nomeCliente" <?php echo $galeria->nomeCliente ?>>
                </div>
                <div>
                    <label for="formatoFoto">Formato que a imagem ficara</label>
                    <select id="formatoFoto" name="formatoFoto">
                        <option value="sobrepossicao_bola.svg">bola</option>
                        <option value="sobrepossicao_quadrado.svg">quadrado</option>
                    </select>
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
        document.getElementById("fotoGaleria").click();
    })
    //esse change ta falando q quando o foto servico receber o "click" ele vai muda o alvo do que vai ser mudado ent em vez de adicionar na caixa de pesquisa ali do input ele vai muda a img na imgFoto
    document.getElementById('fotoGaleria').addEventListener('change', function(event) {

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