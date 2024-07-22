<?php

require_once('class/classDepo.php');
$id = $_GET['id'];
$depo = new depoimentoClass();

$depo->Ativar($id);