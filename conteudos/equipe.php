<?php
require_once('admin/class/ClassFuncionario.php');
$funcionario = new funcionarioClass();
$lista = $funcionario->ListarAtivos();

?>

<section class="site">
    <div class="equipe">

        <div>
            <span class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="10s">
                <img src="img\enfeites\esfera_laranja.svg" alt="" draggable=false>
                <img src="img\enfeites\esfera_roxo.svg" alt="" draggable=false>
                <img src="img\enfeites\esfera_laranja.svg" alt="" draggable=false>
            </span>
            <span><img class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="15s" src="img\enfeites\esfera_roxo.svg" alt="" draggable=false></span>
            <span><img class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="20s" src="img\enfeites\esfera_laranja.svg" alt="" draggable=false></span>
        </div>

        <div>
            <div>
                <h2 class="titulo_roxo wow animate__animated animate__flipInX">Conheça a nossa Equipe! </h2>
                <p class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="5s">Conheça a equipe “Patas e Pelos”, as pessoas responsaveis por dar muito amor para o seu pet.</p>
                <p class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="6s">Uma equipe de profissionais preparados.</p>
            </div>
            <div class="carrosel_equipe">

                <?php ?>
                <?php foreach ($lista as $linha) : ?>
                    <?php if ($linha['idFuncionario'] != 1) : ?>
                        <div class="card_funcionario">
                            <img class="fotoFuncionario" src="admin/img/<?php echo $linha['fotoFuncionario'] ?>" alt="<?php echo $linha['altFuncionario'] ?>" draggable=false />
                            <h2><?php echo $linha['nomeFuncionario'] ?></h2>
                            <h4><?php echo $linha['especialidadeFuncionario'] ?></h4>
                            <p><?php echo $linha['descFuncionario'] ?></p>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>

            <span><img class="wow animate__animated animate__fadeInDownBig" data-wow-duration="2s" data-wow-delay:="5s" src="img\enfeites\estrela_roxa.svg" alt="" draggable=false></span>
            <span><img class="wow animate__animated animate__fadeInDownBig" data-wow-delay:="25s" src="img\enfeites\estrela_roxa.svg" alt="" draggable=false></span>

        </div>

        <div>
            <span>
                <img class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="30s" src="img\enfeites\esfera_roxo.svg" alt="" draggable=false>
                <img class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="35s" src="img\enfeites\esfera_roxo.svg" alt="" draggable=false>
                <img class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="40s" src="img\enfeites\esfera_roxo.svg" alt="" draggable=false>
            </span>
            <span class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="45s">
                <img src="img\enfeites\esfera_laranja.svg" alt="" draggable=false>
                <img src="img\enfeites\esfera_roxo.svg" alt="" draggable=false>
            </span>
            <span class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="50s">
                <img src="img\enfeites\esfera_laranja.svg" alt="" draggable=false>
                <img src="img\enfeites\esfera_roxo.svg" alt="" draggable=false>
                <img src="img\enfeites\esfera_laranja.svg" alt="" draggable=false>
            </span>
            <span class="wow animate__animated animate__fadeIn" data-wow-duration="2s" data-wow-delay:="10s"><img src="img\enfeites\estrela_laranja.svg" alt="" draggable=false></span>
        </div>

    </div>
</section>