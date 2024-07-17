<?php

require_once('class/ClassBanner.php');
$id = $_GET['id'];
$banner = new bannerClass();

$banner->Desativar($id);