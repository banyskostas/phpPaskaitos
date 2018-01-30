<?php
include_once('env.php');
include_once('Components/mysql.class.php');
include_once('Darbuotojas.class.php');


/**
 * Class IndividualiVeiklaDarbuotojas
 */
class IndividualiVeiklaDarbuotojas extends Darbuotojas
{
    protected $type = self::EMPLOYEE_TYPE_INDIVIDUAL_ACTIVITY_CERT;

    /**
     * @return array
     */
    public function gautiDarboUzmokesti()
    {
        return $this->actualGetSalary($this->type);
    }
}