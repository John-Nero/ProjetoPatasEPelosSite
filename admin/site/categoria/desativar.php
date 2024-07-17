<?php

require_once('class/ClassCategoria.php');
$id = $_GET['id'];
$banner = new categoriaClass();

$banner->Desativar($id);