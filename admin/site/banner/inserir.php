<?php
if (isset($_POST['nomeBanner'])) {
    $nomeBanner = $_POST['nomeBanner'];
    $altBanner = 'foto' . $nomeBanner;
    $statusBanner = "ATIVO";
    $paginaBanner = $_POST['paginaDestino'];

    require_once('class/Conexao.php');
    $conexao = Conexao::LigarConexao();

    $sql = $conexao->query('SELECT idBanner FROM tbl_banner ORDER BY idBanner DESC LIMIT 1;');

    $resultado = $sql->fetch(pdo::FETCH_ASSOC);

    if ($resultado !== false && isset($resultado['idBanner'])) {
        $novoId = $resultado['idBanner'] + 1;
    }

    $arquivo = $_FILES['fotoBanner'];
    if ($arquivo['error']) {
        throw new Exception("Deu pau, " . $arquivo['error']);
    }

    $extenssao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);

    $nomeBanFoto = str_replace(' ', '', $nomeBanner);
    $nomeBanFoto = iconv('UTF-8', 'ASCII//TRANSLIT', $nomeBanFoto);
    $nomeBanFoto = preg_replace('/[^a-zA-Z0-9]/', '', $nomeBanFoto);

    $novoNome = $novoId . '_' . $nomeBanFoto . '.' . $extenssao;

    //Mover a imagem
    if (move_uploaded_file($arquivo['tmp_name'], 'img/banner/' . $novoNome)) //Primeiro atributo é de onde sai e o segundo pra onde vai
    {
        //Esse aqui é o nome final dessa bagunça q é pra fica nesse formato aq servico/ronaldo1.png
        $fotoBanner = 'img/banner/' . $novoNome;
    } else {
        throw new Exception('Deu pau, n deu pra subi essa bomba de imagem não. ');
    }

    require_once('class/ClassBanner.php');
    $banner = new bannerClass();

    $banner->nomeBanner = $nomeBanner;
    $banner->fotoBanner = $fotoBanner;
    $banner->statusBanner = $statusBanner;
    $banner->altBanner = 'foto ' . $nomeBanner;
    $banner->paginaBanner = $paginaBanner;

    $banner->inserir();
}

?>
<form action="index.php?p=banner&b=inserir" method="POST" enctype="multipart/form-data">
    <div class="caixaBannerInserir">
        <div>
            <span><img id="imgFoto" src="img/banner/semImagem.png" draggable="false">
                <input type="file" class="form-control" id="fotoBanner" name="fotoBanner" required style="display: none;"></span>
            <div class="dadosDecadastro">
                <div>
                    <label for="nomeBanner">Nome do banner</label>
                    <input type="text" id="nomeBanner" name="nomeBanner" required>
                </div>
                <div>
                    <label for="paginaDestino">Página de destino </label>
                    <select id="paginaDestino" name="paginaDestino" onchange="filtrar()">
                        <option value="HOME">Home</option>
                        <option value="SERVICO">Serviços</option>
                    </select>
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