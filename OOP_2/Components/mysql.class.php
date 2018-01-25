<?php

/**
 * Class Mysql
 *
 * @params string host
 * @params string username
 * @params string password
 * @params string dbName
 */
class Mysql
{
    const DEFAULT_CHARSET = "utf8";

    /** Query types */
    const QUERY_TYPE_SELECT = 1;
    const QUERY_TYPE_INSERT = 2;
    const QUERY_TYPE_UPDATE = 3;
    const QUERY_TYPE_DELETE = 4;

    /** @var string */
    protected $host;
    protected $username;
    protected $password;
    protected $dbName;

    /** @var mysqli */
    protected $db;


    protected function connect()
    {
        $this->db = new mysqli($this->getHost(), $this->getUsername(), $this->getPassword(), $this->getDbName());
        $this->db->set_charset(self::DEFAULT_CHARSET);
    }

    public function execQuery($q, $type = null)
    {
        $output = null;

        $this->connect();

        $result = $this->db->query($q);

        if ($error = mysqli_error($this->db)) {
            echo $error;
            return $output;
        }

        switch ($type) {
            case self::QUERY_TYPE_SELECT:
                $output = [];
                while ($row = $result->fetch_assoc()) {
                    $output[] = $row;
                }
                break;

            case self::QUERY_TYPE_INSERT:
            case self::QUERY_TYPE_UPDATE:
            case self::QUERY_TYPE_DELETE:
            default:
                $output = $result;
                break;
        }
        mysqli_close($this->db);

        return $output;
    }

    /**
     * @param mysqli_result[] $result
     * @return bool|null|mysqli_result
     */
    public function getOneFromSelect($result)
    {
        $data = null;

        if (!$result) {
            echo 'Something went wrong ...';
            return false;
        }

        foreach ($result as $item) {
            $data = $item;
            break;
        }

        if (!$data) {
            echo 'Item not found on DB';
            return false;
        }
        return $data;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host ?: DB_HOST;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username?: DB_USERNAME;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password ?: DB_PASSWORD;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getDbName()
    {
        return $this->dbName ?: DB_DATABASE;
    }

    /**
     * @param string $dbName
     */
    public function setDbName($dbName)
    {
        $this->dbName = $dbName;
    }
}