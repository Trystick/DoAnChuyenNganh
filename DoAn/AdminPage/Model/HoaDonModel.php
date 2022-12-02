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

    public function getAllHoaDon()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT hoadon.*, TenTT FROM hoadon 
        INNER JOIN trangthai ON trangthai.ID = hoadon.TrangThai WHERE TrangThai = 1 ORDER BY NgayMua DESC";
        $user = $dbCon->getData_NoParam($query);
        $dbCon->disconnectDatabase();
        return $user;
    }

    public function getHoaDon()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT hoadon.*, TenTT FROM hoadon INNER JOIN trangthai ON trangthai.ID = hoadon.TrangThai
        WHERE (hoadon.ID = :id OR TenKH LIKE :tenkh) AND TrangThai = 1 ORDER BY NgayMua DESC";
        $param = array(":id" => $this->getid(), ":tenkh" => $this->gettenkhachhang());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }

    public function getHoaDon_TheoID()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT hoadon.*, TenTT FROM hoadon 
        INNER JOIN trangthai ON trangthai.ID = hoadon.TrangThai WHERE hoadon.ID = :id";
        $param = array(":id" => $this->getid());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }

    public function getHoaDon_TheoNgayMua()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT hoadon.*, TenTT FROM hoadon 
        INNER JOIN trangthai ON trangthai.ID = hoadon.TrangThai
        WHERE NgayMua BETWEEN :ngaymua AND NOW() AND TrangThai = :trangthai ORDER BY NgayMua DESC";
        $param = array(":ngaymua" => $this->getngaymua(), ":trangthai" => $this->gettrangthai());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }
    
    public function getHoaDon_TheoNgayMuaVaTenKH()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT hoadon.*, TenTT FROM hoadon INNER JOIN trangthai ON trangthai.ID = hoadon.TrangThai
        WHERE TenKH LIKE :tenkh  AND TrangThai = :trangthai AND NgayMua LIKE :ngaymua ORDER BY NgayMua DESC";
        $param = array(":tenkh" => $this->gettenkhachhang(), ":ngaymua" => $this->getngaymua(), "trangthai" => $this->gettrangthai());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }

    public function getHoaDon_TheoNgayMua_Nhan()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT date(NgayMua) as NgayMua , day(NgayMua) AS Ngay, month(NgayMua) AS Thang, year(NgayMua) AS Nam, SUM(TongTien) AS TongTien FROM hoadon
        WHERE NgayMua BETWEEN :ngaymua AND NOW() AND TrangThai = 2 GROUP BY day(NgayMua)";
        $param = array(":ngaymua" => $this->getngaymua());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }

    public function getHoaDon_TheoNgayMua_Huy()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT date(NgayMua) as NgayMua , day(NgayMua) AS Ngay, month(NgayMua) AS Thang, year(NgayMua) AS Nam, SUM(TongTien) AS TongTien FROM hoadon
        WHERE NgayMua BETWEEN :ngaymua AND NOW() AND TrangThai = 3 GROUP BY day(NgayMua)";
        $param = array(":ngaymua" => $this->getngaymua());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }

    public function getChiTietHoaDon_TheoNgayMua()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT IDSanPham, TenSanPham, XuatXu, DonGia, SUM(SoLuong) AS SoLuong, SUM(ThanhTien) AS ThanhTien FROM hoadon 
        INNER JOIN cthoadon ON hoadon.ID = cthoadon.ID_HoaDon WHERE hoadon.NgayMua BETWEEN :ngaymua AND NOW() AND cthoadon.TrangThai = 2 
        GROUP BY IDSanPham ORDER BY SoLuong DESC";
        $param = array(":ngaymua" => $this->getngaymua());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }



    public function updateHoaDon_TrangThai_Nhan()
    {
        $dbCon = new MySQLUtils();
        $query = "UPDATE hoadon SET TrangThai = 2 WHERE ID = :id";
        $param = array(":id" => $this->getid());
        $dbCon->updateData($query, $param);
        $dbCon->disconnectDatabase();
    }
    public function updateHoaDon_TrangThai_Huy()
    {
        $dbCon = new MySQLUtils();
        $query = "UPDATE hoadon SET TrangThai = 3 WHERE ID = :id";
        $param = array(":id" => $this->getid());
        $dbCon->updateData($query, $param);
        $dbCon->disconnectDatabase();
    }
}
