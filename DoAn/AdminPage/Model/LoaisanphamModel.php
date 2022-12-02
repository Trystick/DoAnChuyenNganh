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

    public function __construct($id, $ten, $ngaythem)
    {
        $this->id = $id;
        $this->ten = $ten;
        $this->ngaythem = $ngaythem;
    }



    public function getAllLoaiSanPham()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT ID,Ten,NgayThem  FROM loaisanpham ORDER BY NgayThem DESC ";
        $data = $dbCon->getAllData($query);
        $dbCon->disconnectDatabase();
        return $data;
    }

    public function getLoaiSanPham()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT ID,Ten,NgayThem  FROM loaisanpham where ID=:ID OR Ten like :ten ORDER BY NgayThem DESC";
        $param = array(":ID" => $this->getid(), ":ten" => $this->getten());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }
    public function getLoaiSanPham_TheoIDLoaiSP()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT ID,Ten,NgayThem  FROM loaisanpham where ID=:ID";
        $param = array(":ID" => $this->getid());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }

    public function getLoaiSanPham_TheoNgayDK()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT ID,Ten,NgayThem  FROM loaisanpham where NgayThem BETWEEN :ngaythem AND NOW() ORDER BY NgayThem DESC";
        $param = array(":ngaythem" => $this->getngaythem());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }

    public function insertLoaiSanpham()
    {
        $dbCon = new MySQLUtils();
        $query = "INSERT INTO loaisanpham (Ten)  VALUES (:ten)";
        $param = array(":ten" => $this->getten());
        $user = $dbCon->insertData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }

    public function updateTen_LoaiSanPham()
    {
        $dbCon = new MySQLUtils();
        $query = "UPDATE loaisanpham SET Ten=:ten where ID=:ID";
        $param = array(":ID" => $this->getid(), ":ten" => $this->getten());
        $dbCon->updateData($query, $param);
        $dbCon->disconnectDatabase();
    }

    public function deleteLoaiSanPham_TheoID()
    {
        $dbCon = new MySQLUtils();
        $query = "DELETE FROM loaisanpham WHERE ID=:id";
        $param = array(":id" => $this->getId());
        $dbCon->updateData($query, $param);
        $dbCon->disconnectDatabase();
    }
}
