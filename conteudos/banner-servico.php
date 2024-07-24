<?php
require_once('../admin/class/ClassBanner.php');
$banner = new bannerClass();
$lista = $banner->ListarAtivosServico();
?>

<section class="site">
  <!--banner rotativo-->
  <div class="banner">
    <?php foreach ($lista as $linha) : ?>
      <img src="admin/<?php echo $linha['fotoBanner'] ?>" alt="<?php echo $linha['nomeBanner'] ?>" draggable=false />
    <?php endforeach; ?>
  </div>
</section>