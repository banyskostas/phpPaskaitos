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
    protected static $host = DB_HOST;
    protected static $username = DB_USERNAME;
    protected static $password = DB_PASSWORD;
    protected static $dbName = DB_DATABASE;

    /** @var mysqli */
    protected $db;

    public static $kintamasis = 1;

    protected static function actualConnect()
    {
        $db = new mysqli(self::$host, self::$username, self::$password, self::$dbName);
        $db->set_charset(self::DEFAULT_CHARSET);

        return $db;
    }

    protected function connect()
    {
        $this->db = self::actualConnect();
    }

    public static function actualExecQuery($q, $type = null)
    {
        $output = null;

        $db = self::actualConnect();

        $result = $db->query($q);

        if ($error = mysqli_error($db)) {
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
        mysqli_close($db);

        return $output;
    }

    public function execQuery($q, $type = null)
    {
        return self::actualExecQuery($q, $type);
    }

    public static function actualGetOneFromSelect($result)
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
     * @param mysqli_result[] $result
     * @return bool|null|mysqli_result
     */
    public function getOneFromSelect($result)
    {
       return self::actualGetOneFromSelect($result);
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return self::$host ?: DB_HOST;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        self::$host = $host;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return  self::$username?: DB_USERNAME;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        self::$username = $username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return self::$password ?: DB_PASSWORD;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        self::$password = $password;
    }

    /**
     * @return string
     */
    public function getDbName()
    {
        return self::$dbName ?: DB_DATABASE;
    }

    /**
     * @param string $dbName
     */
    public function setDbName($dbName)
    {
        self::$dbName = $dbName;
    }

    public static function manoFunkcija()
    {
        self::$kintamasis = 2;

        return self::$kintamasis;
    }
}