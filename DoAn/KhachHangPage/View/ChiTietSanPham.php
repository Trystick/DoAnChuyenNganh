<!DOCTYPE html>
<html lang="en">

<?php
session_start();

include_once '../Contronller/SanphamController.php';
include_once '../Model/SanphamModel.php';


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
 
    <div class="container" style="background: white;">
        <?php
        $IDSanPham = $_GET["ID"];
        $ID_LSP = $_GET["IDLSP"];
        $sanphamController = new SanphamController();
        $sanpham = new SanphamModel($IDSanPham,  $ID_LSP, "", "", "", "", "", "");
        $data = $sanphamController->getSanPham($sanpham);
        $gia = $data["GiaBan"];
        ?>
        <hr>
        <div class="Tieu_de" style="margin-top: 120pt;">
            <div>
                Chi tiết sản phẩm: <?php echo $data["TenSanPham"] ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5 chitietsanpham">
                <img src="./Images/<?php echo $data["Image"] ?>" alt="" id="img_main" class="img_main">
                <div class="row" style="margin-top: 5px;">
                </div>
            </div>

            <div class="col-md-7">
                <form action="" method="post">
                    <h3 style="padding-bottom: 5px;"><input type="text" name="TenSP" value="<?php echo $data["TenSanPham"] ?>" readonly></h3>
                    <p>Giá: <input type="text" name="Gia" value="<?php echo $gia; $_SESSION["Gia"]=$gia; ?>" readonly style="text-align: right;">/kg </p>
                    <p>Xuất xứ: <input type="text" name="XuatXu" value="<?php echo $data["XuatXu"] ?>" readonly> </p>
                    <p>Số lượng hiện có: <input type="text" name="SoLuongCo" value="<?php echo $data["SoLuong"] ?>" readonly style="text-align: right;"> kg</p>
                    <p>Số lượng mua: <input type="number" name="SoLuongMua" min="0" max="<?php echo $data["SoLuong"] ?>" oninput="this.value = Math.abs(this.value)"></p>
                    <button type="submit" class="btn btn-danger" name="ThemGioHang"><i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng</button>
                </form>

            </div>
        </div>
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