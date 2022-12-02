<?php
include_once '../Utils/MySQLUtils.php';

class AdminModel
{

    private $id;
    private $tentk;
    private $matkhau;


    public function __construct($id, $tentk, $matkhau)
    {
        $this->id = $id;
        $this->tentk = $tentk;
        $this->matkhau = $matkhau;

    }

    //get
    public function getid()
    {
        return $this->id;
    }

    public function getTenTK()
    {
        return $this->tentk;
    }

    public function getMatKhau()
    {
        return $this->matkhau;
    }


    public function getkiemTraDangNhap()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT ID,TenTK,MatKhau from taikhoan_admin where TenTK=:tentk AND MatKhau=:matkhau";
        $param = array(":tentk" => $this->getTenTK(), ":matkhau" => $this->getMatKhau());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }


}

