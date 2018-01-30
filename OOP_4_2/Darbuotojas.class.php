<?php
include_once('env.php');
include_once('Components/mysql.class.php');
include_once('IprastinisDarbuotojas.class.php');
include_once('AutorinisDarbuotojas.class.php');
include_once('IndividualiVeiklaDarbuotojas.class.php');


/**
 * Class Darbuotojas
 */
class Darbuotojas
{
    /** Employee types */
    const EMPLOYEE_TYPE_DEFAULT = 1;
    const EMPLOYEE_TYPE_AUTHOR = 2;
    const EMPLOYEE_TYPE_INDIVIDUAL_ACTIVITY_CERT = 3;

    /** @var int */
    protected $id;

    /** @var string */
    protected $vardas;
    protected $pavarde;
    protected $pareigos;
    protected $tipas;

    /** @var float */
    protected $alga;

    /** @var array */
    protected static $salaryAfterTaxes = [
        self::EMPLOYEE_TYPE_DEFAULT => [
            'type' => self::EMPLOYEE_TYPE_DEFAULT,
            'percentage' => 60,
            'title' => 'Iprastinis',
            'className' => IprastinisDarbuotojas::class, // 2 variantas
        ],
        self::EMPLOYEE_TYPE_AUTHOR => [
            'type' => self::EMPLOYEE_TYPE_AUTHOR,
            'percentage' => 70,
            'title' => 'Autorius',
            'className' => AutorinisDarbuotojas::class, // 2 variantas
        ],
        self::EMPLOYEE_TYPE_INDIVIDUAL_ACTIVITY_CERT => [
            'type' => self::EMPLOYEE_TYPE_INDIVIDUAL_ACTIVITY_CERT,
            'percentage' => 100,
            'title' => 'Individuali veikla',
            'className' => IndividualiVeiklaDarbuotojas::class,// 2 variantas
        ]
    ];

    /** @var Mysql */
    protected $mysql;

    /**
     * Darbuotojas constructor.
     * @param int $id
     */
    public function __construct($id = null)
    {
        $this->id = $id;
        $this->mysql = new Mysql();

        if ($id) {
            $this->getDBData();
        }
    }

    /**
     * @return bool
     */
    private function getDBData()
    {
        $result = $this->mysql->execQuery("
          SELECT darbuotojai.*, pareigos.name AS 'pareigos_name' 
          FROM darbuotojai 
          LEFT JOIN pareigos ON pareigos_id = pareigos.id 
          WHERE darbuotojai.id =  $this->id", MYSQL::QUERY_TYPE_SELECT);

        $data = $this->mysql->getOneFromSelect($result);

        if ($data) {
            $this->setVardas($data['name']);
            $this->setPavarde($data['surname']);
            $this->setPareigos($data['pareigos_name']);
            $this->setAlga($data['salary']);

            return true;
        }
        return false;
    }

    /**
     * @return array|bool|mysqli_result|null
     */
    public function getProjects()
    {
        return $this->mysql->execQuery("
            SELECT projects.* 
            FROM darbuotojai_projektai 
            LEFT JOIN projects ON darbuotojai_projektai.projektas_id = projects.id
            WHERE darbuotojai_projektai.darbuotojas_id = $this->id", MYSQL::QUERY_TYPE_SELECT);
    }

    /**
     * @param int $projectId
     * @return array|bool|mysqli_result|null
     */
    public function addToProject($projectId)
    {
        return $this->mysql->execQuery("
          INSERT INTO darbuotojai_projektai 
          SET 
          darbuotojas_id = $this->id, 
          projektas_id = $projectId");
    }

    /**
     * @param $float
     * @return array|bool|mysqli_result|null
     */
    public function changeSalary($float)
    {
        return $this->mysql->execQuery("
          UPDATE darbuotojai 
          SET 
          salary = $float
          WHERE id = $this->id");
    }

    /**
     * @return mixed
     */
    public function getVardas()
    {
        return $this->vardas;
    }

    /**
     * @param mixed $vardas
     */
    public function setVardas($vardas)
    {
        $this->vardas = $vardas;
    }

    /**
     * @return mixed
     */
    public function getPavarde()
    {
        return $this->pavarde;
    }

    /**
     * @param mixed $pavarde
     */
    public function setPavarde($pavarde)
    {
        $this->pavarde = $pavarde;
    }

    /**
     * @return mixed
     */
    public function getPareigos()
    {
        return $this->pareigos;
    }

    /**
     * @param mixed $pareigos
     */
    public function setPareigos($pareigos)
    {
        $this->pareigos = $pareigos;
    }

    /**
     * @return mixed
     */
    public function getTipas()
    {
        return $this->tipas;
    }

    /**
     * @param mixed $tipas
     */
    public function setTipas($tipas)
    {
        $this->tipas = $tipas;
    }

    /**
     * @return mixed
     */
    public function getAlga()
    {
        return $this->alga;
    }

    /**
     * @param mixed $alga
     */
    public function setAlga($alga)
    {
        $this->alga = $alga;
    }

    /**
     * @param int $type
     * @return array
     */
    protected function actualGetSalary($type)
    {
        return [
            'salaryAfterTaxes' => $this->calcSalaryAfterTaxesByType($type),
            'salaryBeforeTaxes' => $this->getAlga(),
        ];
    }

    /**
     * @param int $type
     * @return float
     */
    protected function calcSalaryAfterTaxesByType($type)
    {
        return $this->getAlga() * (self::$salaryAfterTaxes[$type]['percentage'] / 100);
    }

    /**
     * @return array
     */
    public static function getSalaryAfterTaxesRules()
    {
        return self::$salaryAfterTaxes;
    }

    /**
     * @return array|bool|mysqli_result|null
     */
    public function save()
    {
        return $this->mysql->execQuery("INSERT INTO `darbuotojai`(`name`, `surname`,`salary`, `idarbinimo_tipas`) 
          VALUES (
               '".$this->getVardas()."', 
               '".$this->getPavarde()."', 
               ".$this->getAlga().", 
               ".$this->getTipas()."
           )");
    }

    /**
     * Get employee type by id and decide which class to use
     */
    public static function getEmployeeObjectAndClassById($id)
    {
        $result = Mysql::actualExecQuery('SELECT idarbinimo_tipas FROM darbuotojai WHERE id = ' . $id);

        $data = Mysql::actualGetOneFromSelect($result);

        if (!$data) {
            return false;
        }

        $className = IprastinisDarbuotojas::class;

        $rules = self::getSalaryAfterTaxesRules();
        if (isset($rules[$data['idarbinimo_tipas']])) {
            $className = $rules[$data['idarbinimo_tipas']]['className'];
        }

        return new $className($id);
    }
}