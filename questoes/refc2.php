<?php

class MyDefaultConn
{
    /** @var DatabaseConnection */
    private static $conn;
    private static $host = 'localhost';
    private static $user = 'root';
    private static $pass = '1234';


    /**
     * @return DatabaseConnection
     */
    public static function getInstance()
    {
        if (self::$conn === null) {
            self::$conn = new DatabaseConnection(self::$host, self::$user, self::$pass);
        }

        return self::$conn;
    }
}

class MyUserClass
{
    /** @var DatabaseConnection */
    private $dbconn;

    /**
     * MyUserClass constructor.
     * @param null|DatabaseConnection $conn
     */
    public function __construct($conn = null)
    {
        if (is_a($conn, 'DatabaseConnection')) {
            $this->dbconn = $conn;
        } else {
            $this->dbconn = MyDefaultConn::getInstance();
        }
    }


    /**
     * @return array
     * @throws Exception
     */
    public function getUserList()
    {
        $userNameList = $this->dbconn->query('select name from user');

        if (!is_array($userNameList)) {
            throw new Exception("Nenhum user foi encontrado!", 404);
        }

        sort($userNameList);

        return $userNameList;
    }
}
