<?php
require_once('admin\class\ClassCategoria.php');
$categoria = new categoriaClass();
$lista = $categoria->listarAtivos();
?>

<section class="site">
  <div class="categorias">
    <!--Estrelas acima das categorias-->
    <div>
      <span><img class="wow animate__animated animate__fadeInDownBig" data-wow-delay:="3s" src="img/enfeites/estrela_roxa.svg" alt="" draggable=false /></span>
      <span><img class="wow animate__animated animate__fadeIn" data-wow-delay:="8s" src="img/enfeites/estrela_laranja.svg" alt="" draggable=false /></span>
      <h2 class="titulo_roxo wow animate__animated animate__flipInX " data-wow-delay:="12s">Categorias</h2>
    </div>

    <!--categorias rotativas--->
    <div class="carrosel_categorias">
      <?php foreach ($lista as $linha) : ?>
        <div>
          <a href="#"><img src="admin/<?php echo $linha['fotoCategoria'] ?>" alt="<?php echo $linha['nomeCategoria'] ?>" draggable=false />
            <p><?php echo $linha['nomeCategoria'] ?></p>
          </a>
        </div>
      <?php endforeach; ?>
    </div>

    <!--Estrelas abaixo das categorias-->
    <div>
      <span><img class="wow animate__animated animate__fadeIn" data-wow-delay:="18s" data-wow-duration="4s" src="img/enfeites/estrela_laranja.svg" alt="" draggable=false /></span>
      <span><img class="wow animate__animated animate__fadeInDownBig" data-wow-delay:="14s" src="img/enfeites/estrela_roxa.svg" alt="" draggable=false /></span>
    </div>
  </div>
</section>