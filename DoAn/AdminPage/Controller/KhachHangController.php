<?php
include_once '../Model/KhachHangModel.php';


class KhachHangController
{
    public function insertKhachHang($khachhang)
    {
        $khachhang->insertKhachHang();
    }
    public function updateTrangThaiKhachHang_Mo($khachhang)
    {
        $khachhang->updateTrangThaiKhachHang_Mo();
    }
    public function updateTrangThaiKhachHang_Khoa($khachhang)
    {
        $khachhang->updateTrangThaiKhachHang_Khoa();
    }

    public function deleteKhachHang($khachhang)
    {
        $khachhang->deletekKhachHang();
    }
    

    public function getKhachHang_TheoTenTK($khachhang)
    {
        return $khachhang->getKhachHang_TheoTenTK();
    }
    public function getKhachHang_TheoNgayDK($khachhang)
    {
        return $khachhang->getKhachHang_TheoNgayDK();
    }

    public function getAllKhachHang($khachhang)
    {
       return $khachhang->getAllKhachHang();
    }

    public function getkiemTraDangNhap($khachhang)
    {
        return $khachhang->getkiemTraDangNhap();
    }
}
