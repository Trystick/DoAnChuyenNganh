<?php
include_once '../Utils/MySQLUtils.php';

class CTHoaDonModel
{
    private $id;
    private $id_hd;
    private $id_sp;
    private $tensanpham;
    private $xuatxu;
    private $dongia;
    private $soluong;
    private $thanhtien;
    private $trangthai;

    //get
    public function getid()
    {
        return $this->id;
    }

    public function getid_hd()
    {
        return $this->id_hd;
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


    public function gettrangthai()
    {
        return $this->trangthai;
    }

    public function __construct($id, $id_hd, $id_sp, $tensanpham, $xuatxu, $dongia, $soluong, $thanhtien, $trangthai)
    {
        $this->id = $id;
        $this->id_hd = $id_hd;
        $this->id_sp = $id_sp;
        $this->tensanpham = $tensanpham;
        $this->xuatxu = $xuatxu;
        $this->dongia = $dongia;
        $this->soluong = $soluong;
        $this->thanhtien = $thanhtien;
        $this->trangthai = $trangthai;
    }

    public function getChiTietHoaDon_TheoIDHoaDon()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT * FROM cthoadon WHERE ID_HoaDon = :idhd";
        $param = array(":idhd" => $this->getid_hd());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }
    public function getChiTietHoaDon_TheoTenSanPham()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT * FROM cthoadon 
        WHERE ID_HoaDon = :idhd AND TenSanPham LIKE :tensp ";
        $param = array(":idhd" => $this->getid_hd(), ":tensp" => $this->gettensanpham());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }

    public function insertChiTietHoaDon()
    {
        $dbCon = new MySQLUtils();
        $query = "INSERT INTO cthoadon(ID_HoaDon,IDSanPham,TenSanPham,XuatXu,DonGia,SoLuong,ThanhTien)  VALUES (:idhd,:idsp,:tensp,:xuatxu,:dongia,:soluong,:thanhtien)";
        $param = array(":idhd" => $this->getid_hd(), ":idsp" => $this->getid_sp(), ":tensp" => $this->gettensanpham(), ":xuatxu" => $this->getxuatxu(), ":dongia" => $this->getdongia(), ":soluong" => $this->getsoluong(), ":thanhtien" => $this->getthanhtien());
        $kq = $dbCon->insertData($query, $param);
        $dbCon->disconnectDatabase();
        return $kq;
    }

    public function updateChiTietHoaDon_TrangThai_Nhan()
    {
        $dbCon = new MySQLUtils();
        $query = "UPDATE cthoadon SET TrangThai = 2 WHERE ID_HoaDon = :idhd";
        $param = array(":idhd" => $this->getid_hd());
        $dbCon->updateData($query, $param);
        $dbCon->disconnectDatabase();
    }

    public function updateChiTietHoaDon_TrangThai_Huy()
    {
        $dbCon = new MySQLUtils();
        $query = "UPDATE cthoadon SET TrangThai = 3 WHERE ID_HoaDon = :idhd";
        $param = array(":idhd" => $this->getid_hd());
        $dbCon->updateData($query, $param);
        $dbCon->disconnectDatabase();
    }
}
