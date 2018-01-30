<?php
include_once('env.php');
include_once('Components/mysql.class.php');
include_once('Darbuotojas.class.php');


/**
 * Class IprastinisDarbuotojas
 */
class IprastinisDarbuotojas extends Darbuotojas
{
    protected $type = self::EMPLOYEE_TYPE_DEFAULT;

    /**
     * @return array
     */
    public function gautiDarboUzmokesti()
    {
        return $this->actualGetSalary($this->type);
    }
}