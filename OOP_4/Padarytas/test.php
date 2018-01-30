<?php
require_once 'product.interface.php';

require_once 'device.class.php';
require_once 'processor.class.php';
require_once 'memory.class.php';
require_once 'harddrive.class.php';
require_once 'ssd.class.php';
require_once 'cart.class.php';

$procesorius=new Processor('XAAA55', '001');
$procesorius->setManufacturer('Intel');
$procesorius->setModel('I7');
$procesorius->setCores(8);
$procesorius->setSpeed('3.5 Ghz');
$procesorius->setSocket('LG');
$procesorius->setPrice(100);
$ram=new Memory('asda54', '003');
$ram->setModel('DDR333');
$ram->setPrice(20);

$kietasisDiskas=new HardDrive('WD55555', '002');
$kietasisDiskas->setManufacturer('WesterDigital');
$kietasisDiskas->setModel('WD-600');
$kietasisDiskas->setAmount('600 GB');
$kietasisDiskas->setPrice(60);

$cart=new ComputerCart();
$cart->addProduct($procesorius);
$cart->addProduct($kietasisDiskas);
$cart->addProduct($ram);
echo $cart->getList();
echo '<br><br>';
echo "Kaina: ".$cart->getTotalPrice();
echo '<br>';
if ($cart->checkComputer()){
	echo 'Kompiuteri sudaryti galime';
}else{
	echo 'TRUKSTA DALIU !!!';
}

