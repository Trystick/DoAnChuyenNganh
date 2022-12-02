<?php
include_once '../Utils/MySQLUtils.php';

class GioHangModel
{
    private $id;
    private $id_tk;
    private $id_sp;
    private $tensanpham;
    private $xuatxu;
    private $dongia;
    private $soluong;
    private $thanhtien;
    //get
    public function getid()
    {
        return $this->id;
    }

    public function getid_tk()
    {
        return $this->id_tk;
    }

    public function getid_sp()
    {
        return $this->id_sp;
    }

    public function gettensanpham()
    {
        return $this->tensanpham;
    }

    public function getxuatxu()
    {
        return $this->xuatxu;
    }

    public function getdongia()
    {
        return $this->dongia;
    }

    public function getsoluong()
    {
        return $this->soluong;
    }
    public function getthanhtien()
    {
        return $this->thanhtien;
    }

    public function __construct($id, $id_tk, $id_sp, $tensanpham, $xuatxu, $dongia, $soluong, $thanhtien)
    {
        $this->id = $id;
        $this->id_tk = $id_tk;
        $this->id_sp = $id_sp;
        $this->tensanpham = $tensanpham;
        $this->xuatxu = $xuatxu;
        $this->dongia = $dongia;
        $this->soluong = $soluong;
        $this->thanhtien = $thanhtien;
    }



    public function getAllGioHang()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT ID,IDTK,IDSanPham,TenSanPham,XuatXu,DonGia,SoLuong,ThanhTien FROM giohang ";
        $data = $dbCon->getAllData($query);
        $dbCon->disconnectDatabase();
        return $data;
    }

    public function getGioHang_ID()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT ID,IDTK,IDSanPham,TenSanPham,XuatXu,DonGia,SoLuong,ThanhTien FROM giohang where ID=:ID";
        $param = array(":ID" => $this->getid());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }


    public function getGioHangID_TK()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT ID,IDTK,IDSanPham,TenSanPham,XuatXu,DonGia,SoLuong,ThanhTien FROM giohang where IDTK=:IDTK";
        $param = array(":IDTK" => $this->getid_tk());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }


    public function kiemTraSanPhamIDTK_IDSP()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT ID,IDTK,IDSanPham,TenSanPham,XuatXu,DonGia,SoLuong,ThanhTien FROM giohang where IDTK=:IDTK AND IDSanPham=:IDSP";
        $param = array(":IDTK" => $this->getid_tk(), ":IDSP" => $this->getid_sp());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }

    public function insertGioHang()
    {
        $dbCon = new MySQLUtils();
        $query = "INSERT INTO giohang(IDTK,IDSanPham,TenSanPham,XuatXu,DonGia,SoLuong,ThanhTien)  VALUES (:idtk,:idsanpham,:tensanpham,:xuatxu,:dongia,:soluong,:soluong * :dongia)";
        $param = array(":idtk" => $this->getid_tk(), ":idsanpham" => $this->getid_sp(), ":tensanpham" => $this->gettensanpham(), ":xuatxu" => $this->getxuatxu(), ":dongia" => $this->getdongia(), ":soluong" => $this->getsoluong());
        $dbCon->insertData($query, $param);
        $dbCon->disconnectDatabase();
    }

    public function updateGioHang()
    {
        $dbCon = new MySQLUtils();
        $query = "UPDATE giohang SET SoLuong=SoLuong + :soluongmua, ThanhTien=DonGia * SoLuong  where IDTK=:IDTK AND IDSanPham=:IDSP";
        $param = array(":soluongmua" => $this->getsoluong(), ":IDTK" => $this->getid_tk(), ":IDSP" => $this->getid_sp());
        $dbCon->updateData($query, $param);
        $dbCon->disconnectDatabase();
    }

    public function deleteGioHang()
    {
        $dbCon = new MySQLUtils();
        $query = "DELETE FROM giohang where ID=:ID";
        $param = array(":ID" => $this->getid());
        $dbCon->deleteData($query, $param);
        $dbCon->disconnectDatabase();
    }

    public function deleteGioHang_IDTK()
    {
        $dbCon = new MySQLUtils();
        $query = "DELETE FROM giohang where IDTK=:IDTK";
        $param = array(":IDTK" => $this->getid_tk());
        $dbCon->deleteData($query, $param);
        $dbCon->disconnectDatabase();
    }
}
