<?php
require_once('class/ClassBanner.php');
$id = $_GET['id'];
$banner = new bannerClass($id);

// Verifica se a variável 'nomeBanner' foi definida(preenchida) no corpo da requisição POST(ali no html no form)
if (isset($_POST['nomeBanner'])) {
    $nomeBanner     = $_POST['nomeBanner'];
    $altBanner      = "foto" . $nomeBanner;
    $paginaBanner   = $_POST['paginaDestino'];

    //verificar se a foto foi modificada
    if (!empty($_FILES['fotoBanner']['name'])) {
        //Recuperar o id
        $novoId = $banner->idBanner;

        //Tratar o campo FILES
        $arquivo = $_FILES['fotoBanner'];
        if ($arquivo['error']) {
            throw new Exception('O erro foi: ' . $arquivo['error']);
        }

        //Obter a extensão do arquivo
        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $nomeBanFoto = str_replace(' ', '', $nomeBanner); //substitui um 'espaço' para 'sem espaço'
        $nomeBanFoto = iconv('UTF-8', 'ASCII//TRANSLIT', $nomeBanFoto); //remover sinais diacriticos (remove os caracteres especiais)
        $nomeBanFoto = strtolower($nomeBanFoto);

        //novo nome da imagem
        $novoNome = $novoId . '_' . $nomeBanFoto . '.' . $extensao;

        //print_r($novoNome);

        //Mover a imagem
        if (move_uploaded_file($arquivo['tmp_name'], 'img/banner/' . $novoNome)) {
            $fotoBanner = 'img/banner/' . $novoNome;
        } else {
            throw new Exception('DEU PAU ZÉ');
        }
    } else {
        $fotoBanner = $banner->fotoBanner;
    }
    //agr vamo coloca no banco de dados
    $banner->nomeBanner       = $nomeBanner;
    $banner->fotoBanner       = $fotoBanner;
    $banner->altBanner        = $altBanner;
    $banner->paginaBanner     = $paginaBanner;
    print_r($banner->fotoBanner);
    $banner->atualizar();
}
?>
<form action="index.php?p=banner&b=atualizar&id=<?php echo $banner->idBanner; ?>" method="POST" enctype="multipart/form-data">
    <div class="caixaInserir">
        <div>
            <span><img id="imgFoto" src="<?php echo $banner->fotoBanner ?>" draggable="false">
                <input type="file" class="form-control" id="fotoBanner" name="fotoBanner" style="display: none;"></span>>
            <div class="dadosDecadastro">
                <div>
                    <label for="nomeBanner">Nome do banner</label>
                    <input type="text" id="nomeBanner" name="nomeBanner" value="<?php echo $banner->nomeBanner ?>">
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