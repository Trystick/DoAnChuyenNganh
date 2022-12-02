<?php
include_once '../Utils/MySQLUtils.php';

class SanphamModel
{
    private $id;
    private $id_loaisanpham;
    private $image;
    private $tensanpham;
    private $giaban;
    private $soluong;
    private $ngaynhap;
    private $xuatxu;

    //get
    public function getId()
    {
        return $this->id;
    }

    public function getid_loaisanpham()
    {
        return $this->id_loaisanpham;
    }
    public function getimage()
    {
        return $this->image;
    }
    public function gettensanpham()
    {
        return $this->tensanpham;
    }

    public function getgiaban()
    {
        return $this->giaban;
    }

    public function getsoluong()
    {
        return $this->soluong;
    }
    public function getNgayNhap()
    {
        return $this->ngaynhap;
    }
    public function getxuatxu()
    {
        return $this->xuatxu;
    }

    public function __construct($id, $id_loaisanpham, $image, $tensanpham, $giaban, $soluong, $ngaynhap, $xuatxu)
    {
        $this->id = $id;
        $this->id_loaisanpham = $id_loaisanpham;
        $this->image = $image;
        $this->tensanpham = $tensanpham;
        $this->giaban = $giaban;
        $this->soluong = $soluong;
        $this->ngaynhap = $ngaynhap;
        $this->xuatxu = $xuatxu;
    }



    public function getAllSanPham()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT sanpham.*, loaisanpham.Ten FROM sanpham 
        INNER JOIN loaisanpham ON sanpham.ID_LoaiSanPham = loaisanpham.ID  ORDER BY NgayNhap DESC ";
        $data = $dbCon->getAllData($query);
        $dbCon->disconnectDatabase();
        return $data;
    }

    public function getSanPham()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT sanpham.*, loaisanpham.Ten FROM sanpham 
        INNER JOIN loaisanpham ON sanpham.ID_LoaiSanPham = loaisanpham.ID 
        WHERE sanpham.ID=:ID OR TenSanPham LIKE :tensp ORDER BY NgayNhap DESC ";
        $param = array(":ID" => $this->getid(), ":tensp" => $this->gettensanpham());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }

    public function getSanPham_TheoIDLoaiSanPham()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT * FROM sanpham WHERE ID_LoaiSanPham=:idlsp";
        $param = array(":idlsp" => $this->getid_loaisanpham());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }
    public function getSanPham_TheoIDSanPham()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT sanpham.*, loaisanpham.Ten FROM sanpham 
        INNER JOIN loaisanpham ON sanpham.ID_LoaiSanPham = loaisanpham.ID 
        WHERE sanpham.ID = :id ";
        $param = array(":id" => $this->getId());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }
    public function getSanPham_TheoNgayNhap()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT sanpham.*, loaisanpham.Ten FROM sanpham 
        INNER JOIN loaisanpham ON sanpham.ID_LoaiSanPham = loaisanpham.ID 
        WHERE NgayNhap BETWEEN :ngaynhap AND NOW() ORDER BY NgayNhap DESC";
        $param = array(":ngaynhap" => $this->getNgayNhap());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }
    public function getSanPham_TheoSoLuong()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT sanpham.*, loaisanpham.Ten FROM sanpham 
        INNER JOIN loaisanpham ON sanpham.ID_LoaiSanPham = loaisanpham.ID   
        WHERE SoLuong < :soluong ORDER BY SoLuong ASC";
        $param = array(":soluong" => $this->getsoluong());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }

    public function insertSanPham()
    {
        $dbCon = new MySQLUtils();
        $query = "INSERT INTO sanpham(ID_LoaiSanPham, Image, TenSanPham, GiaBan, SoLuong, XuatXu) 
        VALUES (:idlsp,:image,:tensp,:giaban,:soluong,:xuatxu)";
        $param = array(":idlsp" => $this->getid_loaisanpham(), ":image" => $this->getimage(), ":tensp" => $this->gettensanpham(), ":giaban" => $this->getgiaban(), ":soluong" => $this->getsoluong(), ":xuatxu" => $this->getxuatxu());
        $user = $dbCon->insertData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }

    public function deleteSanPham_TheoIDLoaiSanPham()
    {
        $dbCon = new MySQLUtils();
        $query = "DELETE FROM sanpham WHERE ID_LoaiSanPham=:IDLSP";
        $param = array(":IDLSP" => $this->getid_loaisanpham());
        $dbCon->updateData($query, $param);
        $dbCon->disconnectDatabase();
    }
    public function deleteSanPham_TheoIDSanPham()
    {
        $dbCon = new MySQLUtils();
        $query = "DELETE FROM sanpham WHERE ID=:id";
        $param = array(":id" => $this->getId());
        $dbCon->updateData($query, $param);
        $dbCon->disconnectDatabase();
    }

    public function updateSanPham_TheoID()
    {
        $dbCon = new MySQLUtils();
        $query = "UPDATE sanpham SET ID_LoaiSanPham= :idlsp,Image=:img,TenSanPham=:tensp,GiaBan=:giaban,SoLuong=:soluong,XuatXu=:xuatxu WHERE ID = :id";
        $param = array(":id" => $this->getId(), ":idlsp" => $this->getid_loaisanpham(), ":img" => $this->getimage(), ":tensp" => $this->gettensanpham(), ":giaban" => $this->getgiaban(), ":soluong" => $this->getsoluong(), ":xuatxu" => $this->getxuatxu());
        $dbCon->updateData($query, $param);
        $dbCon->disconnectDatabase();
    }
}
