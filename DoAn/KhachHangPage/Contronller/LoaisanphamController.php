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
}

