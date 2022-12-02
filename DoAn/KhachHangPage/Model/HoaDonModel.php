<?php
include_once '../Utils/MySQLUtils.php';

class HoaDonModel
{
    private $id;
    private $id_tk;
    private $tenkhachhang;
    private $diachi;
    private $sdt;
    private $tongtien;
    private $ngaymua;
    private $ghichu;
    private $trangthai;

    //get
    public function getid()
    {
        return $this->id;
    }

    public function getid_tk()
    {
        return $this->id_tk;
    }

    public function gettenkhachhang()
    {
        return $this->tenkhachhang;
    }

    public function getdiachi()
    {
        return $this->diachi;
    }

    public function getsdt()
    {
        return $this->sdt;
    }

    public function gettongtien()
    {
        return $this->tongtien;
    }
    public function getngaymua()
    {
        return $this->ngaymua;
    }

    public function getghichu()
    {
        return $this->ghichu;
    }

    public function gettrangthai()
    {
        return $this->trangthai;
    }

    public function __construct($id, $id_tk, $tenkhachhang, $diachi, $sdt, $tongtien, $ngaymua, $ghichu, $trangthai)
    {
        $this->id = $id;
        $this->id_tk = $id_tk;
        $this->tenkhachhang = $tenkhachhang;
        $this->diachi = $diachi;
        $this->sdt = $sdt;
        $this->tongtien = $tongtien;
        $this->ngaymua = $ngaymua;
        $this->ghichu = $ghichu;
        $this->trangthai = $trangthai;
    }


    public function insertHoaDon()
    {
        $dbCon = new MySQLUtils();
        $query = "INSERT INTO hoadon(IDTK,TenKH,DiaChi,SDT,TongTien,GhiChu,TrangThai)  VALUES (:idtk,:tenkh,:diachi,:sdt,:tongtien,:ghichu,:trangthai)";
        $param = array(":idtk" => $this->getid_tk(), ":tenkh" => $this->gettenkhachhang(), ":diachi" => $this->getdiachi(), ":sdt" => $this->getsdt(), ":tongtien" => $this->gettongtien(), ":ghichu" => $this->getghichu(), ":trangthai" => $this->gettrangthai());
        $kq = $dbCon->insertData($query, $param);
        $dbCon->disconnectDatabase();
        return $kq;
    }

    public function getID_Cuoi_HoaDon()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT ID FROM hoadon ORDER BY ID DESC LIMIT 0,1";
        $user = $dbCon->getData_NoParam($query);
        $dbCon->disconnectDatabase();
        return $user;
    }

    public function getHoaDon_TrangThai()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT TenKH, DiaChi, SDT, TongTien, NgayMua, GhiChu, trangthai.TenTT, hoadon.ID FROM hoadon 
        INNER JOIN trangthai ON trangthai.ID = hoadon.TrangThai WHERE IDTK = :idtk AND TrangThai = 1 ORDER BY NgayMua DESC";
        $param = array(":idtk" => $this->getid_tk());
        $user = $dbCon->getData($query,$param);
        $dbCon->disconnectDatabase();
        return $user;
    }

    public function getHoaDon_TheoID()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT TenKH, DiaChi, SDT, TongTien, NgayMua, GhiChu, trangthai.TenTT FROM hoadon 
        INNER JOIN trangthai ON trangthai.ID = hoadon.TrangThai WHERE hoadon.ID = :idhd";
        $param = array(":idhd" => $this->getid());
        $user = $dbCon->getData($query,$param);
        $dbCon->disconnectDatabase();
        return $user;
    }

    public function updateHoaDon_TrangThai()
    {
        $dbCon = new MySQLUtils();
        $query = "UPDATE hoadon SET TrangThai = '3' WHERE ID = :id";
        $param = array(":id" => $this->getid());
        $dbCon->updateData($query, $param);
        $dbCon->disconnectDatabase();
    }
}
