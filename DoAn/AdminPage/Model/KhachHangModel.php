<?php
include_once '../Utils/MySQLUtils.php';

class KhachHangModel
{

    private $id;
    private $tentk;
    private $matkhau;
    private $trangthai;
    private $ngaydangky;

    public function __construct($id, $tentk, $matkhau, $trangthai, $ngaydangky)
    {
        $this->id = $id;
        $this->tentk = $tentk;
        $this->matkhau = $matkhau;
        $this->trangthai = $trangthai;
        $this->ngaydangky = $ngaydangky;
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

    public function getTrangThai()
    {
        return $this->trangthai;
    }
    public function getNgayDangKy()
    {
        return $this->ngaydangky;
    }


    //set
    public function setid($id)
    {
        $this->id = $id;
    }

    public function setTenTK($tentk)
    {
        $this->tentk = $tentk;
    }

    public function setMatKhau($matkhau)
    {
        $this->matkhau = $matkhau;
    }
    public function setTrangThai($trangthai)
    {
        $this->trangthai = $trangthai;
    }

    public function setNgayDangKy($ngaydangky)
    {
        $this->ngaydangky = $ngaydangky;
    }


    public function insertKhachHang()
    {
        $dbCon = new MySQLUtils();
        $query = "INSERT INTO taikhoan_kh (TenTK,MatKhau)  VALUES (:tentk,:matkhau)";
        $param = array(":tentk" => $this->getTenTK(), ":matkhau" => $this->getMatKhau());
        $dbCon->insertData($query, $param);
        $dbCon->disconnectDatabase();
    }

    public function getAllKhachHang()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT ID,TenTK,MatKhau,TrangThai,NgayDK  from taikhoan_kh order by NgayDK DESC";
        $data = $dbCon->getAllData($query);
        $dbCon->disconnectDatabase();
        return $data;
    }

    public function getKhachHang_TheoTenTK()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT ID,TenTK,MatKhau,TrangThai,NgayDK  from taikhoan_kh where ID=:id or TenTK LIKE :tentk order by NgayDK DESC";
        $param = array(":id" => $this->getid(), ":tentk" => $this->getTenTK());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }

    public function getKhachHang_TheoNgayDK()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT ID,TenTK,MatKhau,TrangThai,NgayDK  from taikhoan_kh where NgayDK BETWEEN :ngaybd AND NOW() ORDER BY NgayDK DESC";
        $param = array(":ngaybd" => $this->getNgayDangKy());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }


    public function getkiemTraDangNhap()
    {
        $dbCon = new MySQLUtils();
        $query = "SELECT ID,TenTK,MatKhau,TrangThai,NgayDK  from taikhoan_kh where TenTK=:tentk AND MatKhau=:matkhau";
        $param = array(":tentk" => $this->getTenTK(), ":matkhau" => $this->getMatKhau());
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnectDatabase();
        return $user;
    }

    public function updateTrangThaiKhachHang_Mo()
    {
        $dbCon = new MySQLUtils();
        $query = "UPDATE taikhoan_kh SET TrangThai=1 where ID=:ID";
        $param = array(":ID" => $this->getid());
        $dbCon->updateData($query, $param);
        $dbCon->disconnectDatabase();
    }

    public function updateTrangThaiKhachHang_Khoa()
    {
        $dbCon = new MySQLUtils();
        $query = "UPDATE taikhoan_kh SET TrangThai=0 where ID=:ID";
        $param = array(":ID" => $this->getid());
        $dbCon->updateData($query, $param);
        $dbCon->disconnectDatabase();
    }

    public function deleteKhachHang()
    {
        $dbCon = new MySQLUtils();
        $query = "DELETE FROM taikhoan_kh where ID=:ID";
        $param = array(":ID" => $this->getid());
        $dbCon->updateData($query, $param);
        $dbCon->disconnectDatabase();
    }
}
