<?php
include_once '../Model/SanphamModel.php';

include_once '../Model/GioHangModel.php';
include_once '../Contronller/GioHangController.php';

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

    public function getSanPham_TheoTenSanPham($sanpham)
    {
        return $sanpham->getSanPham_TheoTenSanPham();
    }

    public function updateSoLuongSanPham_SauKhiCong($sanpham)
    {
        return $sanpham->updateSoLuongSanPham_SauKhiCong();
    }
    public function updateSoLuongSanPham_SauKhiTru($sanpham)
    {
        return $sanpham->updateSoLuongSanPham_SauKhiTru();
    }
}

if (isset($_POST["ThemGioHang"])) {
    if (!isset($_SESSION["user"])) {
?>
        <script>
            alert("Hãy đăng nhập để đặt hàng !");
        </script>
        <?php
    } else {
        $ID_TK = $_SESSION["ID_TK"];
        $IDSanPham = $_GET["ID"];
        $Ten = $_POST["TenSP"];
        $Gia = (float)$_SESSION["Gia"];
        $XuatXu = $_POST["XuatXu"];
        $SoLuongMua = (int)$_POST["SoLuongMua"];
        $SoLuongCo = (int)$_POST["SoLuongCo"];
        if ($SoLuongMua == "" || $SoLuongMua == 0 || $SoLuongMua > $SoLuongCo) {
        ?>
            <script>
                alert("Số lượng mua không phù hợp !");
            </script>
            <?php
        } else {
            $ghController = new GioHangController();
            $gh = new GioHangModel("",  $ID_TK, $IDSanPham, $Ten, $XuatXu, $Gia, $SoLuongMua, "");
            //Kiểm tra sản phẩm với khách hàng mua đã tồn tại trong giỏ hàng chưa.
            $data = $ghController->kiemTraSanPhamIDTK_IDSP($gh);

            //Sản phẩm chưa có thì thêm vào.
            if ($data == null) {
                //Thêm sản phẩm vào giỏ hàng
                $data_insert_giohang = $ghController->insertGioHang($gh);
                //Cập nhật số lại số lượng sản phẩm bằng số lượng hiện có trừ đi số lượng khách mua của khách.
                $spController = new SanphamController();
                $sp = new SanphamModel($IDSanPham,  "", "", "", "", $SoLuongMua, "", "");
                $data_update_sanpham = $spController->updateSoLuongSanPham_SauKhiTru($sp);

            ?>
                <script>
                    alert("Thêm thành công !");
                    window.location.href = "./ChiTietSanPham.php?ID=<?php echo $IDSanPham ?>&IDLSP=<?php echo $ID_LSP ?>";
                </script>
            <?php

                //Nếu sản phẩm đã tồn tại trong giỏ hàng , thì sẽ bổ sung thêm số lượng cần mua vào giỏ hàng.
            } else {
                $data_update_soluong_giohang = $ghController->updateGioHang($gh);
                //Cập nhật số lại số lượng sản phẩm bằng số lượng hiện có trừ đi số lượng khách mua của khách.
                $spController = new SanphamController();
                $sp = new SanphamModel($IDSanPham,  "", "", "", "", $SoLuongMua, "", "");
                $data_update_sanpham = $spController->updateSoLuongSanPham_SauKhiTru($sp);
            ?>
                <script>
                    alert("Thêm thành công !");
                    window.location.href = "./ChiTietSanPham.php?ID=<?php echo $IDSanPham ?>&IDLSP=<?php echo $ID_LSP ?>";  
                </script>
<?php

            }
        }
    }
}
?>



