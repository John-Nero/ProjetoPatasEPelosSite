<?php
print_r("sdadsadas");
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['nomePetDepo'])) {
    $nomePetDepo = $_POST['nomePetDepo'];
    $nomeDonoDepo = $_POST['nomeDonoDepo'];
    $textoDepo = $_POST['textoDepo'];
    $avaliDepo = $_POST['avaliacao_final'];
    $altDepo = 'foto' . $nomePetDepo;
    $statusDepo = "ATIVO";


    require_once('class/Conexao.php');
    $conexao = Conexao::LigarConexao();

    $sql = $conexao->query('SELECT idDepo FROM tbl_depo ORDER BY idDepo DESC LIMIT 1;');

    $resultado = $sql->fetch(pdo::FETCH_ASSOC);

    if ($resultado !== false && isset($resultado['idDepo'])) {
        $novoId = $resultado['idDepo'] + 1;
    }

    $arquivo = $_FILES['fotoDepo'];
    if ($arquivo['error']) {
        throw new Exception("Deu pau, " . $arquivo['error']);
    }

    $extenssao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);

    $nomeCliFoto = str_replace(' ', '', $nomePetDepo);
    $nomeCliFoto = iconv('UTF-8', 'ASCII//TRANSLIT', $nomeCliFoto);
    $nomeCliFoto = preg_replace('/[^a-zA-Z0-9]/', '', $nomeCliFoto);

    $novoNome = $novoId . '_' . $nomeCliFoto . '.' . $extenssao;

    //Mover a imagem
    if (move_uploaded_file($arquivo['tmp_name'], 'img/depoimento/' . $novoNome)) //Primeiro atributo é de onde sai e o segundo pra onde vai
    {
        //Esse aqui é o nome final dessa bagunça q é pra fica nesse formato aq servico/ronaldo1.png
        $fotoDepo = 'img/depoimento/' . $novoNome;
    } else {
        throw new Exception('Deu pau, n deu pra subi essa bomba de imagem não. ');
    }

    require_once('class/ClassDepo.php');
    $depo = new depoimentoClass();

    $depo->nomePetDepo     = $nomePetDepo;
    $depo->textoDepo = $textoDepo;
    $depo->avaliDepo = $avaliDepo;
    $depo->fotoDepo     = $fotoDepo;
    $depo->statusDepo   = $statusDepo;
    $depo->altDepo      = 'foto ' . $nomePetDepo;
print_r($depo);
    //$depo->inserir();
}
?>

<form action="index.php?p=cliente&cli=inserir" method="POST" enctype="multipart/form-data">
    <div class="caixaInserir caixaInserirDepoimento">
        <div>
            <div>
                <span>
                    <img id="imgFoto" src="img/semImagem.png" draggable="false">
                    <input type="file" class="form-control" id="fotoDepo" name="fotoDepo" required style="display: none;">
                </span>

                <div class="dadosDecadastro dadosDecadastroDepoimento">
                    <div>
                        <label for="nomePetDepo">Nome do pet</label>
                        <input type="text" id="nomePetDepo" name="nomePetDepo" required>
                    </div>

                    <div>
                        <label for="nomeDonoDepo">Nome do dono</label>
                        <input type="text" id="nomeDonoDepo" name="nomeDonoDepo" required>
                    </div>
                </div>
            </div>

            <div>
                <div class="avaliacao_estrela">
                    <input type="radio" id="5-stars" name="estrela" value="5" />
                    <label for="5-stars" class="star">&#9733;</label>
                    <input type="radio" id="4-stars" name="estrela" value="4" />
                    <label for="4-stars" class="star">&#9733;</label>
                    <input type="radio" id="3-stars" name="estrela" value="3" />
                    <label for="3-stars" class="star">&#9733;</label>
                    <input type="radio" id="2-stars" name="estrela" value="2" />
                    <label for="2-stars" class="star">&#9733;</label>
                    <input type="radio" id="1-stars" name="estrela" value="1" />
                    <label for="1-stars" class="star">&#9733;</label>
                    <input type="" id="avaliacao_final">
                </div>
                <div>
                    <label for="textoDepo"> Avaliação</label>
                    <input type="text" id="textoDepo" name="textoDepo" required>
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
        document.getElementById("fotoDepo").click();
    })
    //esse change ta falando q quando o foto servico receber o "click" ele vai muda o alvo do que vai ser mudado ent em vez de adicionar na caixa de pesquisa ali do input ele vai muda a img na imgFoto
    document.getElementById('fotoDepo').addEventListener('change', function(event) {

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

<script>
        document.querySelectorAll('.avaliacao_estrela input').forEach(input => {
            input.addEventListener('change', () => {
                document.getElementById('avaliacao_final').textContent = input.value;
            });
        });
    </script>