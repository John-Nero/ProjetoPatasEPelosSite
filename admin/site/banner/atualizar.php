<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Banner</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Cadastro de Banner</h2>
        <form action="processa_cadastro.php" method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <img src="img/banner/semImagem.png" class="img-fluid" id="imgFoto" alt="foto do Banner">
                        <input type="file" class="form-control-file" id="fotoBanner" name="fotoBanner" required style="display: none;">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="nomeBanner">Nome do Banner</label>
                        <input type="text" class="form-control" id="nomeBanner" name="nomeBanner" required>
                    </div>

                    <div class="form-group">
                        <label for="altBanner">Texto Alternativo (alt)</label>
                        <input type="text" class="form-control" id="altBanner" name="altBanner" required>
                    </div>

                    <div class="form-group">
                        <label for="paginaBanner">Página do Banner</label>
                        <select class="form-control" id="paginaBanner" name="paginaBanner" required>
                            <option value="home">Página Home</option>
                            <option value="servicos">Página Serviços</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>


            </div>



        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>