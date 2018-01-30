<?php
include_once('env.php');
include_once('Components/mysql.class.php');
include_once('Darbuotojas.class.php');


/**
 * Class AutorinisDarbuotojas
 */
class AutorinisDarbuotojas extends Darbuotojas
{
    protected $type = self::EMPLOYEE_TYPE_AUTHOR;

    /**
     * @return array
     */
    public function gautiDarboUzmokesti()
    {
        return $this->actualGetSalary($this->type);
    }
}