<?php
include_once '../Utils/MySQLUtils.php';

class LoaisanphamModel
{
    private $id;
    private $ten;
    private $ngaythem;

    public function getId()
    {
        return $this->id;
    }

    public function getten()
    {
        return $this->ten;
    }
    public function getngaythem()
    {
        return $this->ngaythem;
    }


   
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setten($ten): void
    {
        $this->ten = $ten;
    }


    public function setngaythem($ngaythem): void
    {
        $this->ngaythem = $ngaythem;
    }

    public function __construct($id,$ten,$ngaythem)
    {
        $this->id =$id;
        $this->ten =$ten;
        $this->ngaythem =$ngaythem;
    }

    

    public function getAllLoaiSanPham()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT ID,Ten,NgayThem  FROM loaisanpham ";
        $data = $dbCon->getAllData($query);
        $dbCon->disconnectDatabase();
        return $data;
    }

    public function getLoaiSanPham()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT ID,Ten,NgayThem  FROM loaisanpham where ID=:ID";
        $param = array(":ID" => $this->getid());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user[0];
    }

    
}
