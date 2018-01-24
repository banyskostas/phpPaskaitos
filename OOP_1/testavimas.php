<?php
include('stilizuotasTekstas.class.php');

$antraste = new StilizuotasTekstas('Pagr. antraste');
$antraste->keistiSpalva('white')
    ->keistiDydi(23)
    ->keistiTaga('h1');


$subAntraste = new StilizuotasTekstas('Sub. antraste');
$subAntraste->keistiSpalva('green');
$subAntraste->keistiDydi(20);
$subAntraste->keistiTaga('h2');


$turinys = new StilizuotasTekstas('Tekstas tekstas tekstas');
$turinys->keistiSpalva('orange');
$turinys->keistiTaga('p');


echo $antraste->isvesti();
echo $subAntraste->isvesti();
echo $turinys->isvesti();

echo StilizuotasTekstas::$statinisKintamasis;