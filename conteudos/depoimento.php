<?php
require_once('admin\class\ClassDepo.php');
$depo = new depoimentoClass();
$lista = $depo->ListarAtivos();
?>

<section class="site">
  <div class="depo">

    <!--Detalhes do topo da sessão-->
    <div class="depo_topo">

      <span><img class="wow animate__animated animate__fadeIn" data-wow-delay:="14s" src="img/enfeites/estrela_laranja.svg" alt="" draggable=false /></span>
      <span><img class="wow animate__animated animate__fadeIn" data-wow-delay:="18s" src="img/enfeites/estrela_laranja.svg " alt="" draggable=false /> </span>
      <span><img class="wow animate__animated animate__fadeIn" data-wow-delay:="20s" src="img/enfeites/estrela_laranja.svg" alt="" draggable=false /></span>
      <span><img class="wow animate__animated animate__fadeIn" data-wow-delay:="25s" src="img/enfeites/esfera_roxo.svg" alt="" draggable=false /></span>
    </div>

    <div class="depo_principal">
      <!--Detalhes centrais e imagem do carrosel-->
      <div>

        <span class="wow animate__animated animate__fadeIn" data-wow-delay:="30s">
          <img src="img/enfeites/esfera_laranja.svg" alt="" draggable=false />
          <img class="parallax" src="img/enfeites/Colar.svg" alt="" draggable=false />
        </span>
        <span><img class="wow animate__animated animate__fadeIn" data-wow-delay:="35s" src="img/enfeites/esfera_roxo.svg" alt="" draggable=false /></span>
        <span><img class="wow animate__animated animate__fadeIn" data-wow-delay:="40s" src="img/enfeites/esfera_roxo.svg" alt="" draggable=false /></span>


        <!--Imagens dos pets do carrosel-->
        <div class="carrosel_depo_imagem">
          <?php foreach ($lista as $linha) : ?>
            <img src="admin/<?php echo $linha['fotoDepo'] ?>" alt="<?php echo $linha['altDepo'] ?>" draggable=false />
          <?php endforeach; ?>
        </div>

        <!--Detalhes abaixo da imagem-->
        <span class="wow animate__animated animate__fadeIn" data-wow-delay:="50s">
          <img src="img/enfeites/esfera_laranja.svg" alt="" draggable=false />
          <img class="parallax" src="img/enfeites/cama.svg" alt="" draggable=false />
        </span>
        <span><img class="wow animate__animated animate__fadeIn" src="img/enfeites/estrela_laranja.svg" data-wow-delay:="4s" alt="" draggable=false /></span>
        <span><img class="wow animate__animated animate__fadeIn" src="img/enfeites/estrela_laranja.svg" data-wow-delay:="10s" alt="" draggable=false /></span>

        <span><img class="wow animate__animated animate__fadeInDownBig" src="img/enfeites/estrela_roxa.svg" data-wow-delay:="20s" alt="" draggable=false /></span>
      </div>

      <div>
        <!--Titulo e subtitulo da sessão-->
        <div class="wow animate__animated animate__flipInX">
          <h2 class="titulo_roxo">Depoimentos</h2>
          <h3 class="subtitulo_laranja">Confira o amor dos nossos clientes</h3>
        </div>

        <!--Texto do carrosel-->
        <div class="carrosel_depo_texto">
          <!--Cada Div é um depoimento idependete-->
          <?php foreach ($lista as $linha) : ?>
            <div>
              <h2 class="titulo_roxo"><?php echo $linha['nomePetDepo'] ?></h2>
              <h3 class="subtitulo_laranja"><?php echo $linha['nomeDonoDepo'] ?></h3>
              <ul>
                <li class="<?php echo $linha['avaliDepo'] > 0 ? '' : 'removeUmDeAvaliacao' ?>">
                  <img src="img/enfeites/comida.svg" alt="" draggable=false />
                </li>

                <li class="<?php echo $linha['avaliDepo'] > 1 ? '' : 'removeUmDeAvaliacao' ?>">
                  <img src="img/enfeites/comida.svg" alt="" draggable=false />
                </li>

                <li class="<?php echo $linha['avaliDepo'] > 2 ? '' : 'removeUmDeAvaliacao' ?>">
                  <img src="img/enfeites/comida.svg" alt="" draggable=false />
                </li>

                <li class="<?php echo $linha['avaliDepo'] > 3 ? '' : 'removeUmDeAvaliacao' ?>">
                  <img src="img/enfeites/comida.svg" alt="" draggable=false />
                </li>

                <li class="<?php echo $linha['avaliDepo'] > 4 ? '' : 'removeUmDeAvaliacao' ?>">
                  <img src="img/enfeites/comida.svg" alt="" draggable=false />
                </li>
              </ul>
              <div>
                <p><?php echo $linha['textoDepo'] ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <!--Detalhes da base da sessão-->
        <div>
          <span class="wow animate__animated animate__fadeInDownBig" data-wow-delay:="30s"><img src="img/enfeites/estrela_roxa.svg" alt="" draggable=false /></span>
          <span><img src="img/enfeites/esferas_laranja_e_roxa.svg" alt="" draggable=false /></span>
        </div>
      </div>
    </div>
  </div>
</section>