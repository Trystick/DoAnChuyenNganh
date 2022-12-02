<?php
include_once '../Model/CTHoaDonModel.php';


class CTHoaDonController
{
    public function getChiTietHoaDon_TheoIDHoaDon($cthoadon)
    {
        return $cthoadon->getChiTietHoaDon_TheoIDHoaDon();
    }

    public function getChiTietHoaDon_TheoTenSanPham($cthoadon)
    {
        return $cthoadon->getChiTietHoaDon_TheoTenSanPham();
    }

    public function insertChiTietHoaDon($cthoadon)
    {
        return $cthoadon->insertChiTietHoaDon();
    }

    public function updateChiTietHoaDon_TrangThai_Nhan($cthoadon)
    {
        $cthoadon->updateChiTietHoaDon_TrangThai_Nhan();
    }

    public function updateChiTietHoaDon_TrangThai_Huy($cthoadon)
    {
        $cthoadon->updateChiTietHoaDon_TrangThai_Huy();
    }
}
