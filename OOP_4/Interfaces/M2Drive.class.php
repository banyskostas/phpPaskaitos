<?php

class M2Drive extends Device implements ProductInterface {

    public function getPrice()
    {

    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getName()
    {

    }

    public function getCard()
    {
        $kintamasis = (isset($_GET['name'])? $_GET['name'] : null;
    }

    public function getProcessor(Processor $processor, $price):ProductInterface {
        $price *= 2;
    }
}

/**
 * public function getName(Person $person):Name{
}
 */