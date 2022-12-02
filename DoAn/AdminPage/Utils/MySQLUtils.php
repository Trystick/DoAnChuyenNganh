<?php
class MySQLUtils
{
    private $servername;
    private $user;
    private $password;
    private $database;

    private static $connection;

    public function __construct()
    {
        $this->servername = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->database = "trai_cay";
        if (self::$connection == null) {
            $this->connectDatabase();
        }
        return self::$connection;
    }
    public function __destruct()
    {
        $this->servername = "";
        $this->user = "";
        $this->password = "";
        $this->database = "";
        self::$connection = NULL;
    }
    private function connectDatabase()
    {
        self::$connection = new PDO("mysql:host=$this->servername;dbname=$this->database;charset=utf8", $this->user,  $this->password);
        self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$connection;
    }
    public function disconnectDatabase()
    {
        self::$connection = NULL; 
    }


    //Truy vấn tất cả dữ liệu trong table 
    public function getAllData($query)
    {
        $smt = self::$connection->prepare($query);
        $smt->execute();
        return $smt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Truy vấn một đối tượng cụ thể nào đó
    public function getData($query, $param = array())   
    {
        $smt = self::$connection->prepare($query);
        $smt->execute($param);
        return $smt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getData_NoParam($query)   
    {
        $smt = self::$connection->prepare($query);
        $smt->execute();
        return $smt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Thêm
    public function insertData($query, $param = array())
    {
        $smt = self::$connection->prepare($query);
        return $smt->execute($param);
    }
    //Xóa
    public function deleteData($query, $param = array())
    {
        $smt = self::$connection->prepare($query);
        $smt->execute($param);
        //return $smt->row_Count();
    }
    //Sửa
    public function updateData($query, $param = array())
    {
        $smt = self::$connection->prepare($query);
        $smt->execute($param);
       // return $smt->row_Count();
    }
}
