<?php 
require_once('class/ClassBanner.php');
$banner = new bannerClass();

$lista = $banner->Listar();
//print_r($lista)
?>

<table class="table table-dark table-hover">
    <caption>DADOS BANNER</caption>
    <thead>
        <tr>
            <td scope="col">Id</td>
            <td scope="col">Nome</td>
            <td scope="col">Foto</td>
            <td scope="col">Alt</td>
            <td scope="col">Status</td>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($lista as $linha) : ?>
            <tr>
                <td><?php echo $linha['idBanner'] ?></td>
                <td><?php echo $linha['nomeBanner'] ?></td>
                <td><?php echo $linha['fotoBanner'] ?></td>
                <td><?php echo $linha['altBanner'] ?></td>
                <td><?php echo $linha['statusBanner'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


