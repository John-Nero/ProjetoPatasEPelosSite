<?php
// Verificar se os dados do formulário estão sendo enviados
print_r($_POST);

if (isset($_POST['nomeGaleria'])) {
    print_r("chegamos aqui");
    $nomeGaleria = $_POST['nomeGaleria'];
    $altGaleria = 'foto' . $nomeGaleria;
    $statusGaleria = "ATIVO";

    require_once('class/Conexao.php');
    $conexao = Conexao::LigarConexao();

    $sql = $conexao->query('SELECT idGaleria FROM tbl_galeria ORDER BY idGaleria DESC LIMIT 1;');
    $resultado = $sql->fetch(PDO::FETCH_ASSOC);

    print_r("chegamos aqui 2");
    if ($resultado !== false && isset($resultado['idGaleria'])) {
        $novoId = $resultado['idGaleria'] + 1;
    } else {
        $novoId = 1; // Caso não haja nenhum registro, o novo ID será 1
    }

    $arquivo = $_FILES['fotoGaleria'];
    if ($arquivo['error'] !== UPLOAD_ERR_OK) {
        throw new Exception("Erro no upload: " . $arquivo['error']);
    }

    print_r("chegamos aqui 3");
    $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);

    $nomeGalFoto = str_replace(' ', '', $nomeGaleria);
    $nomeGalFoto = iconv('UTF-8', 'ASCII//TRANSLIT', $nomeGalFoto);
    $nomeGalFoto = preg_replace('/[^a-zA-Z0-9]/', '', $nomeGalFoto);

    $novoNome = $novoId . '_' . $nomeGalFoto . '.' . $extensao;

    print_r("chegamos aqui 4");
    $destino = 'img/galeria/' . $novoNome;
    if (!file_exists('img/galeria')) {
        mkdir('img/galeria', 0777, true);
    }

    if (move_uploaded_file($arquivo['tmp_name'], $destino)) {
        $fotoGaleria = $destino;
    } else {
        throw new Exception('Falha ao mover o arquivo para o destino.');
    }

    print_r("chegamos aqui 5");
    require_once('class/ClassGaleria.php');
    $galeria = new galeriaClass();

    $galeria->nomeGaleria = $nomeGaleria;
    $galeria->fotoGaleria = $fotoGaleria;
    $galeria->statusGaleria = $statusGaleria;
    $galeria->formatoFoto = $_POST['tipoFoto']; // Capturando o valor do select
    $galeria->altGaleria = 'foto ' . $nomeGaleria;

    print_r("chegamos aqui 6");
    print_r($galeria);

    // Descomente esta linha se desejar realmente inserir no banco de dados
    // $galeria->inserir();
} else {
    print_r("Os dados do formulário não foram enviados corretamente.");
}
?>
<form action="index.php?p=galeria&status=todos" method="POST" enctype="multipart/form-data">
    <div class="caixaInserir">
        <div>
            <span><img id="imgFoto" src="img/semImagem.png" draggable="false">
                <input type="file" class="form-control" id="fotoGaleria" name="fotoGaleria" required style="display: none;"></span>
            <div class="dadosDecadastro">
                <div>
                    <label for="nomeGaleria">Nome da foto</label>
                    <input type="text" id="nomeGaleria" name="nomeGaleria" required>
                </div>
                <div>
                    <select id="tipoFoto" name="tipoFoto">
                        <option value="bola_roxa">bola roxa</option>
                        <option value="bola_laranja">bola laranja</option>
                        <option value="quadrado_roxo">Quadrado roxo</option>
                        <option value="quadrado_laranja">Quadrado laranja</option>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit">Cadastrar</button>
    </div>
</form>

<script>
    //Transformar img em um botão
    document.getElementById("imgFoto").addEventListener('click', function() {
        document.getElementById("fotoGaleria").click();
    });

    document.getElementById('fotoGaleria').addEventListener('change', function(event) {
        let imgFoto = document.getElementById("imgFoto");
        let arquivo = event.target.files[0];

        if (arquivo) {
            let carregar = new FileReader();

            carregar.onload = function(e) {
                imgFoto.src = e.target.result;
            }
            carregar.readAsDataURL(arquivo);
        }
    });
</script>
