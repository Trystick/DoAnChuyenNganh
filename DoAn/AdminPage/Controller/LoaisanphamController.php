<?php
include_once '../Model/LoaisanphamModel.php';


class LoaisanphamController
{

    public function getAllLoaiSanPham($loai)
    {
        return $loai->getAllLoaiSanPham();
    }

    public function getLoaiSanPham($loai)
    {
        return $loai->getLoaiSanPham();
    }

    public function getLoaiSanPham_TheoIDLoaiSP($loai)
    {
        return $loai->getLoaiSanPham_TheoIDLoaiSP();
    }

    public function getLoaiSanPham_TheoNgayDK($loai)
    {
        return $loai->getLoaiSanPham_TheoNgayDK();
    }

    public function insertLoaiSanpham($loai)
    {
        return $loai->insertLoaiSanpham();
    }

    public function updateTen_LoaiSanPham($loai)
    {
         $loai->updateTen_LoaiSanPham();
    }

    public function deleteLoaiSanPham_TheoID($loai)
    {
         $loai->deleteLoaiSanPham_TheoID();
    }
}
