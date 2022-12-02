<?php
include_once '../Model/HoaDonModel.php';


class HoaDonController
{
    public function getAllHoaDon($hoadon)
    {
        return $hoadon->getAllHoaDon();
    }

    public function getHoaDon($hoadon)
    {
        return $hoadon->getHoaDon();
    }
    public function getHoaDon_TheoID($hoadon)
    {
        return $hoadon->getHoaDon_TheoID();
    }
    public function getHoaDon_TheoNgayMua_Nhan($hoadon)
    {
        return $hoadon->getHoaDon_TheoNgayMua_Nhan();
    }
    public function getHoaDon_TheoNgayMua_Huy($hoadon)
    {
        return $hoadon->getHoaDon_TheoNgayMua_Huy();
    }
    
    public function getChiTietHoaDon_TheoNgayMua($hoadon)
    {
        return $hoadon->getChiTietHoaDon_TheoNgayMua();
    }

    public function getHoaDon_TheoNgayMua($hoadon)
    {
        return $hoadon->getHoaDon_TheoNgayMua();
    }
    public function getHoaDon_TheoNgayMuaVaTenKH($hoadon)
    {
        return $hoadon->getHoaDon_TheoNgayMuaVaTenKH();
    }
    public function updateHoaDon_TrangThai_Nhan($hoadon)
    {
        return $hoadon->updateHoaDon_TrangThai_Nhan();
    }
    public function updateHoaDon_TrangThai_Huy($hoadon)
    {
        return $hoadon->updateHoaDon_TrangThai_Huy();
    }
}

