<?php
include_once '../Model/SanphamModel.php';


class SanphamController
{

    public function getAllSanPham($sanpham)
    {
        return $sanpham->getAllSanPham();
    }
    public function getSanPham($sanpham)
    {
        return $sanpham->getSanPham();
    }
    public function getSanPham_TheoIDLoaiSanPham($sanpham)
    {
        return $sanpham->getSanPham_TheoIDLoaiSanPham();
    }
    public function getSanPham_TheoIDSanPham($sanpham)
    {
        return $sanpham->getSanPham_TheoIDSanPham();
    }
    public function getSanPham_TheoNgayNhap($sanpham)
    {
        return $sanpham->getSanPham_TheoNgayNhap();
    }
    public function getSanPham_TheoSoLuong($sanpham)
    {
        return $sanpham->getSanPham_TheoSoLuong();
    }

    public function insertSanPham($sanpham)
    {
        $sanpham->insertSanPham();
    }

    public function deleteSanPham_TheoIDLoaiSanPham($sanpham)
    {
        $sanpham->deleteSanPham_TheoIDLoaiSanPham();
    }
    public function deleteSanPham_TheoIDSanPham($sanpham)
    {
        $sanpham->deleteSanPham_TheoIDSanPham();
    }
    
    public function updateSanPham_TheoID($sanpham)
    {
        $sanpham->updateSanPham_TheoID();
    }
}
