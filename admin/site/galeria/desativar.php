<?php

require_once('class/ClassGaleria.php');
$id = $_GET['id'];
$galeria = new galeriaClass();

$galeria->Desativar($id);