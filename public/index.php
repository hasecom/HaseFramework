<?php 

/// <summary>
/// はじめに読み込まれる
/// </summary>
require __DIR__.'/../vendor/autoload.php';
use App\kernel\kernel;
use App\Controllers\welcomeController;

$aa = new welcomeController();
echo json_encode($aa->Index());
$aaa =new kernel();
$aaa->sample();
?>