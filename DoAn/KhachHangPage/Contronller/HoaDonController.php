<?php
include_once '../Model/HoaDonModel.php';


class HoaDonController
{

    public function insertHoaDon($hoadon)
    {
        return $hoadon->insertHoaDon();
    }

    public function getID_Cuoi_HoaDon($hoadon)
    {
        return $hoadon->getID_Cuoi_HoaDon();
    }

    public function getHoaDon_TrangThai($hoadon)
    {
        return $hoadon->getHoaDon_TrangThai();
    }

    public function getHoaDon_TheoID($hoadon)
    {
        return $hoadon->getHoaDon_TheoID();
    }

    public function updateHoaDon_TrangThai($hoadon)
    {
        return $hoadon->updateHoaDon_TrangThai();
    }
}

