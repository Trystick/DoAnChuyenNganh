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
    public function getNhayNhap()
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
        $query = "SELECT ID,ID_LoaiSanPham,Image,TenSanPham,GiaBan,SoLuong,NgayNhap,XuatXu  FROM sanpham ";
        $data = $dbCon->getAllData($query);
        $dbCon->disconnectDatabase();
        return $data;
    }

    public function getSanPham()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT ID,ID_LoaiSanPham,Image,TenSanPham,GiaBan,SoLuong,NgayNhap,XuatXu  FROM sanpham where ID=:ID";
        $param = array(":ID" => $this->getid());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user[0];
    }

    public function getSanPham_TheoTenSanPham()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT ID,ID_LoaiSanPham,Image,TenSanPham,GiaBan,SoLuong,NgayNhap,XuatXu  FROM sanpham where TenSanPham LIKE :tensp";
        $param = array(":tensp" => $this->gettensanpham());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }

    public function updateSoLuongSanPham_SauKhiCong()
    {
        $dbCon = new MySQLUtils();
        $query = "UPDATE sanpham SET SoLuong=SoLuong + :soluong where ID=:ID";
        $param = array(":ID" => $this->getId(), ":soluong" => $this->getsoluong());
        $dbCon->updateData($query, $param);
        $dbCon->disconnectDatabase();
    }

    public function updateSoLuongSanPham_SauKhiTru()
    {
        $dbCon = new MySQLUtils();
        $query = "UPDATE sanpham SET SoLuong=SoLuong - :soluong where ID=:ID";
        $param = array(":ID" => $this->getId(), ":soluong" => $this->getsoluong());
        $dbCon->updateData($query, $param);
        $dbCon->disconnectDatabase();
    }
}
