<?php
include_once '../Model/GioHangModel.php';

include_once '../Contronller/HoaDonController.php';
include_once '../Model/HoaDonModel.php';

include_once '../Contronller/CTHoaDonController.php';
include_once '../Model/CTHoaDonModel.php';

class GioHangController
{

    public function getAllGioHang($giohang)
    {
        return $giohang->getAllGioHang();
    }
    public function getGioHang_ID($giohang)
    {
        return $giohang->getGioHang_ID();
    }

    public function getGioHangID_TK($giohang)
    {
        return $giohang->getGioHangID_TK();
    }

    public function kiemTraSanPhamIDTK_IDSP($giohang)
    {
        return $giohang->kiemTraSanPhamIDTK_IDSP();
    }
    public function insertGioHang($giohang)
    {
        $giohang->insertGioHang();
    }
    public function updateGioHang($giohang)
    {
        $giohang->updateGioHang();
    }
    public function deleteGioHang($giohang)
    {
        $giohang->deleteGioHang();
    }
    public function deleteGioHang_IDTK($giohang)
    {
        $giohang->deleteGioHang_IDTK();
    }
}


if (isset($_POST["action"])) {
    session_start();
    $user_action = $_POST["action"];

    switch ($user_action) {
        case "Dat_Hang":
            //Xử lý Nút  đặt hàng
            $ID_TK = $_SESSION["ID_TK"];
            //Kiểm tra xem Giỏ Hàng có Sản Phẩm nào khong ? Nếu rỗng thì sẽ thông báo ["Chưa có gì trong giỏ hàng !!!"] 
            //ngược lại thì hiển thị thông tin giỏ hàng.  
            $giohangController = new GioHangController();
            $gh = new GioHangModel("",  $ID_TK, "", "", "", "", "", "");
            $data = $giohangController->getGioHangID_TK($gh);


            if ($data  == NULL) {
?>
                <script>
                    alert("Chưa có gì trong giỏ hàng !!!");
                </script>
                <?php
            } else {
                $ho_ten = $_POST['ho_ten'];
                $DiaChi = $_POST['DiaChi'];
                $sdt = $_POST['sdt'];
                $ghi_chu = $_POST['ghi_chu'];
                $Tong = $_POST["Tong"];
                $hdController = new HoaDonController();
                $hd = new HoaDonModel("", $ID_TK, $ho_ten, $DiaChi, $sdt, $Tong, "", $ghi_chu, "1");
                $KQ_hoadon_insert = $hdController->insertHoaDon($hd);

                //Kiểm trả xem công việc thêm thành công hay không. $KQ_hoadon_insert là kết quả của công việc thêm thành công(true)
                // hay thất bại(false).
                if ($KQ_hoadon_insert == true) {
                    //Lấy ID hóa đơn vừa thêm vào để thêm vào chi tiết hóa đơn.
                    $ThongTinHoaDonVuaThem = $hdController->getID_Cuoi_HoaDon($hd);
                    $ID_HoaDon = $ThongTinHoaDonVuaThem[0]["ID"];
                    $gh_all = new GioHangModel("", "", "", "", "", "", "", "");
                    $data_GioHang = $giohangController->getAllGioHang($gh_all);

                    //Thêm từng đơn hàng vào chi tiết đơn hàng .
                    foreach ($data_GioHang as $chitiet) {
                        $CTHDController = new CTHoaDonController();
                        $cthd = new CTHoaDonModel("", $ID_HoaDon, $chitiet["IDSanPham"], $chitiet["TenSanPham"], $chitiet["XuatXu"], $chitiet["DonGia"], $chitiet["SoLuong"], $chitiet["ThanhTien"], " ");
                        $data_insert_CTHoaDon = $CTHDController->insertChiTietHoaDon($cthd);
                    }

                ?>
                    <script>
                        alert("Đặt hàng thành công");
                        window.location.href = "../View/GioHang.php";
                    </script>
                <?php
                    //Sau khi đặt hàng thì Xóa Giỏ Hàng của chủ tài khoản.
                    $giohangController = new GioHangController();
                    $gh = new GioHangModel("",  $ID_TK, "", "", "", "", "", "");
                    $data_delete_GioHang_IDTK = $giohangController->deleteGioHang_IDTK($gh);
                } else { ?>
                    <script>
                        alert("Lỗi đặt hàng");
                    </script>
<?php
                }
            }


            break;

        default:
            break;
    }
}
