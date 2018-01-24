<?php

/**
 * Class Demo
 */
class Demo
{
    public $name;

    /**
     * Demo constructor.
     * @param string $name
     */
    function __construct($name){
        $this->name = $name;
    }


    function sayHello()
    {
        echo "Hello ".$this->name." !";
    }
}

$demo = new Demo('Petras');
$demo->sayHello();
?>
