<?php
include_once('env.php');
include_once('Components/mysql.class.php');


/**
 * Class Darbuotojas
 */
class Darbuotojas
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $vardas;
    protected $pavarde;
    protected $pareigos;

    /** @var float */
    protected $alga;

    /** @var Mysql */
    protected $mysql;

    /**
     * Darbuotojas constructor.
     * @param int $id
     */
    public function __construct($id)
    {
        $this->id = $id;
        $this->mysql = new Mysql();
        $this->getDBData();
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
}