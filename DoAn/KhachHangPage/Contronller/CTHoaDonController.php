<?php
include_once '../Model/CTHoaDonModel.php';


class CTHoaDonController
{

    public function insertChiTietHoaDon($cthoadon)
    {
        return $cthoadon->insertChiTietHoaDon();
    }

    public function updateChiTietHoaDon_TrangThai($cthoadon)
    {
         $cthoadon->updateChiTietHoaDon_TrangThai();
    }

    public function getChiTietHoaDon_Theo_IDHD($cthoadon)
    {
        return $cthoadon->getChiTietHoaDon_Theo_IDHD();
    }

}

