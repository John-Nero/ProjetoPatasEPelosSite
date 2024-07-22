<?php

require_once('class/ClassCliente.php');
$id = $_GET['id'];
$cliente = new clienteClass();

$cliente->Ativar($id);
