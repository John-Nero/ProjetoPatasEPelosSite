<?php

require_once('class/ClassDepo.php');
$id = $_GET['id'];
$depo = new depoimentoClass();

$depo->Ativar($id);