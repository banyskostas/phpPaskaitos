<?php

/**
 * Class Automobilis
 *
 */
class Automobilis
{
    public $isoresSpalva = 'balta';
    public $numeris = '-';
    public $degaluKiekis = 0;

    function pripiltiDegalu($kiekis)
    {
        $this->degaluKiekis += $kiekis;
    }

    function degaluLikutis()
    {
        return $this->degaluKiekis;
    }

    /**
     * @return string
     */
    public function getSpalva()
    {
        return $this->isoresSpalva;
    }

    /**
     * @param string $spalva
     */
    public function setSpalva($spalva)
    {
        $this->isoresSpalva = $spalva;
    }

}

$manoAutomobilis = new Automobilis();
$manoAutomobilis->spalva = "Melyna";

$manoAutomobilis->setSpalva("Melyna");

echo $manoAutomobilis->getSpalva();


$manoAutomobilis->numeris = "HJB654";

$kintamasis = 'numeris';
$manoAutomobilis->$kintamasis = "HJB654";

$manoAutomobilis[$kintamasis] = "HJB654";


$manoAutomobilis->PripiltiDegalu(100);


$arr = [
    [
        'spalva' => "melyna",
        'numeris' => 123456,
    ],
    [
        'spalva' => "melyna",
        'numeris' => 123456
    ]
];
