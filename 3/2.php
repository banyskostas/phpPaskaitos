<?php
$colors = array('white', 'green', 'red', 'blue', 'black');

foreach ($colors as $raktas => $value){
    echo $raktas . '<br>';

    if ($raktas == 2) {
        echo $value . '<br>';
    }
}