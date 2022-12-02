<!DOCTYPE html>
<html lang="en">

<?php
session_start();

include_once '../Contronller/HoaDonController.php';
include_once '../Model/HoaDonModel.php';

include_once '../Contronller/CTHoaDonController.php';
include_once '../Model/CTHoaDonModel.php';


?>

<head>
    <?php include 'Layouts/headerpage.php' ?>
</head>

<body>
    <!-- Menu-Start -->
    <?php if (!isset($_SESSION["ID_TK"])) {
        include 'Layouts/menupage.php';
    } else {
        include 'Layouts/menupageLogout.php';
    }
    ?>
    <!-- Menu-End -->
    <hr>

    <div class="container" style="background: white;margin-top: 120pt;">
        <div class="Tieu_de" style="margin-top: 10px;">
            <div>
                Đơn Hàng
            </div>
        </div>

        <h3>Đơn Hàng</h3>
        <table class="table table-striped">
            <thead>
                <td>STT</td>
                <td>Tên người nhận</td>
                <td>Địa chỉ</td>
                <td>SĐT</td>
                <td>Tổng tiền</td>
                <td>Ngày mua</td>
                <td>Ghi chú</td>
                <td>Trạng thái</td>
            </thead>
            <?php
            $IDHoaDon = $_GET["IDHoaDon"];
            $hdController = new HoaDonController();
            $hd = new HoaDonModel($IDHoaDon, "", "", "", "", "", "", "", "");
            $data = $hdController->getHoaDon_TheoID($hd);
            
            $dem = 0;
            foreach ($data as $value) {
                $dem++;
            ?>
                <tr>
                    <td><?php echo $dem ?></td>
                    <td><?php echo $value["TenKH"] ?></td>
                    <td><?php echo $value["DiaChi"] ?></td>
                    <td><?php echo $value["SDT"] ?></td>
                    <td><?php echo number_format($value["TongTien"]) ?><sup>vnđ</sup></td>
                    <td><?php echo $value["NgayMua"] ?></td>
                    <td><?php echo $value["GhiChu"] ?></td>
                    <td><?php echo $value["TenTT"] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <div class="container" style="background: white;margin-top: 30pt;">
        <div class="Tieu_de" style="margin-top: 10px;">
            <div>
                Chi tiết đơn hàng
            </div>
        </div>

        <h3>Chi Tiết</h3>
        <table class="table table-striped">
            <thead>
                <td>STT</td>
                <td>Tên sản phẩm</td>
                <td>Xuất xứ</td>
                <td>Đơn giá</td>
                <td>Số lượng</td>
                <td>Thành tiền</td>
            </thead>
            <?php
             $IDHoaDon = $_GET["IDHoaDon"];
             $cthdController = new CTHoaDonController();
             $cthd = new CTHoaDonModel("",$IDHoaDon, "", "", "", "", "", "", "");
             $data_ChiTietHoaDon = $cthdController->getChiTietHoaDon_Theo_IDHD($cthd);
           
            $dem = 0;
            foreach ($data_ChiTietHoaDon as $value) {
                $dem++;
            ?>
                <tr>
                    <td><?php echo $dem ?></td>
                    <td><?php echo $value["TenSanPham"] ?></td>
                    <td><?php echo $value["XuatXu"] ?></td>
                    <td><?php echo number_format($value["DonGia"]) ?><sup>vnđ</sup></td>
                    <td><?php echo $value["SoLuong"] ?></td>
                    <td><?php echo number_format($value["ThanhTien"]) ?><sup>vnđ</sup></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <hr>
    <!-- Footer Start -->
    <?php include 'Layouts/footerpage.php' ?>
    <!-- Footer End -->

    <!-- chatbox Start -->
    <?php include 'Layouts/chatboxpage.php' ?>
    <!-- chatbox End -->


    <!-- Modal đăng nhập Start -->
    <?php include 'Layouts/FormLogin.php' ?>
    <!-- Modal đăng nhập End -->

    <!-- Modal đăng kí Start-->

    <?php include 'Layouts/FormRegister.php' ?>

    <!-- Modal đăng kí End-->

    <script type="text/javascript" src="./Js/Js.js"></script>
</body>

</html>