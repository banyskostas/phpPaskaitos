<?php

/**
 * Class StilizuotasTekstas
 *
 * @property string tekstas
 * @property string spalva
 * @property int dydis
 * @property string tag
 *
 */
class StilizuotasTekstas
{
    const FORBIDDEN_COLOR = 'white';
    const FONT_SIZE_MIN = 8;
    const FONT_SIZE_MAX = 24;

    public $tekstas = 'default';
    private $spalva = 'red';
    private $dydis = 14;
    private $tag = 'div';

    public static $statinisKintamasis = 'Goat';

    public function __construct($tekstas)
    {
        $this->tekstas = $tekstas;

        var_dump(self::statinisKintamasis);
    }

    /**
     * @return string
     */
    public function isvesti()
    {
        return '<' . $this->tag . ' style="color:' . $this->spalva . '; font-size:' . $this->dydis . 'px">
            ' . $this->tekstas . '
        </' . $this->tag . '>';
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->tekstas;
    }

    /**
     * @param string $str
     */
    public function keistiSpalva($str)
    {
        if ($str != self::FORBIDDEN_COLOR) {
            $this->spalva = (string)$str;
        }
        return $this;
    }

    /**
     * @param int $int
     */
    public function keistiDydi($int)
    {
        if ($int > self::FONT_SIZE_MIN && $int < self::FONT_SIZE_MAX) {
            $this->dydis = (int)$int;
        }
        return $this;
    }

    /**
     * @param string $str
     * @return $this
     */
    public function keistiTaga($str)
    {
        $this->tag = $str;
        return $this;
    }

    /**
     * @return string
     */
    public function getParagraph()
    {
        return $this->isvestiPagalTaga('p');
    }

    /**
     * @return string
     */
    public function getHeader()
    {
        return $this->isvestiPagalTaga('header');
    }

    /**
     * @param $str
     * @return string
     */
    protected function isvestiPagalTaga($str)
    {
        $this->keistiTaga($str);
        return $this->isvesti();
    }
}