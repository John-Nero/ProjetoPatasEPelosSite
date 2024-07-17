<?php

require_once('class/ClassCategoria.php');
$id = $_GET['id'];
$categoria = new categoriaClass();

$categoria->Ativar($id);