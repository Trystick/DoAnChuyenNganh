<?php
session_start();
include_once '../Model/HoaDonModel.php';
include_once '../Controller/HoaDonController.php';

include_once '../Model/CTHoaDonModel.php';
include_once '../Controller/CTHoaDonController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php
    include_once './Layouts/headerpage.php';
    ?>
</head>

<body>
    <?php
    include './Layouts/menupage.php';
    ?>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
                Hóa đơn
            </div>
            <div class="panel-body">
                <div style="display: flex; flex-direction: column;">
                    <form class="navbar-form navbar-left" role="search" method="post">
                        Lựa chọn:
                        <button type="submit" class="btn btn-default" name="All">Tất cả hóa đơn</button>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Tìm kiếm" name="text_search">
                        </div>
                        <button type="submit" class="btn btn-default" name="Search">Tìm kiếm</button>
                        <div class="form-group">
                            Từ: <input type="date" class="form-control" name="date">
                        </div>
                        <button type="submit" class="btn btn-default" name="Search_date">Tìm kiếm theo ngày</button>
                    </form>
                    <?php
                    if (isset($_POST["Search"])) {
                        $text_search = $_POST["text_search"] ?>
                        <p>Kết quả liên quan đến " <?php echo $text_search ?> "</p>
                    <?php }
                    ?>
                </div>
                <table class="table table-striped">

                    <thead>
                        <td>STT</td>
                        <td>ID_HoaDon</td>
                        <td>Tên khách hàng</td>
                        <td>Địa chỉ</td>
                        <td>Số điện thoại</td>
                        <td>Tổng tiền</td>
                        <td>Ngày mua</td>
                        <td>Ghi chú</td>
                        <td>Trạng thái</td>
                        <td colspan="3">Thao tác</td>
                    </thead>
                    <?php
                    if (isset($_POST["All"])) {
                        $HDController = new HoaDonController();
                        $hd = new HoaDonModel("", "", "", "", "", "", "", "", "");
                        $getAll_HD = $HDController->getAllHoaDon($hd);
                        if ($getAll_HD == NULL) { ?>
                            <tr>
                                <td colspan="10" style="text-align: center;">Chưa có hóa đơn nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            foreach ($getAll_HD as $value) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $value["ID"] ?></td>
                                    <td><?php echo $value["TenKH"] ?></td>
                                    <td><?php echo $value["DiaChi"] ?></td>
                                    <td><?php echo $value["SDT"] ?></td>
                                    <td><?php echo $value["TongTien"] ?></td>
                                    <td><?php echo $value["NgayMua"] ?></td>
                                    <td><?php echo $value["GhiChu"] ?></td>
                                    <td><?php echo $value["TenTT"] ?></td>
                                    <td><a href="./ChiTietHoaDon.php?IDHD=<?php echo $value["ID"] ?>">Chi tiết</a></td>
                                    <td><a href="?IDHD_Nhan=<?php echo $value["ID"] ?>">Đã nhận hàng</a></td>
                                    <td><a href="?IDHD_Huy=<?php echo $value["ID"] ?>">Đã hủy hàng</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else 
                    if (isset($_POST["Search"])) {
                        $HDController = new HoaDonController();
                        $hd = new HoaDonModel($text_search, "", "%$text_search%", "", "", "", "", "", "");
                        $get_HD = $HDController->getHoaDon($hd);
                        if ($get_HD == NULL) { ?>
                            <tr>
                                <td colspan="10" style="text-align: center;">Chưa có hóa đơn nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            foreach ($get_HD as $value) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $value["ID"] ?></td>
                                    <td><?php echo $value["TenKH"] ?></td>
                                    <td><?php echo $value["DiaChi"] ?></td>
                                    <td><?php echo $value["SDT"] ?></td>
                                    <td><?php echo $value["TongTien"] ?></td>
                                    <td><?php echo $value["NgayMua"] ?></td>
                                    <td><?php echo $value["GhiChu"] ?></td>
                                    <td><?php echo $value["TenTT"] ?></td>
                                    <td><a href="./ChiTietHoaDon.php?IDHD=<?php echo $value["ID"] ?>">Chi tiết</a></td>
                                    <td><a href="?IDHD_Nhan=<?php echo $value["ID"] ?>">Đã nhận hàng</a></td>
                                    <td><a href="?IDHD_Huy=<?php echo $value["ID"] ?>">Đã hủy hàng</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else 
                    if (isset($_POST["Search_date"])) {
                        $date = $_POST["date"];
                        if ($date != "") {
                            $HDController = new HoaDonController();
                            $hd = new HoaDonModel("", "", "", "", "", "", $date, "", 1);
                            $get_HD = $HDController->getHoaDon_TheoNgayMua($hd);
                            if ($get_HD == NULL) { ?>
                                <tr>
                                    <td colspan="10" style="text-align: center;">Chưa có hóa đơn nào !!!</td>
                                </tr>
                                <?php
                            } else {
                                $dem = 0;
                                foreach ($get_HD as $value) {
                                    $dem++;
                                ?>
                                    <tr>
                                        <td><?php echo $dem ?></td>
                                        <td><?php echo $value["ID"] ?></td>
                                        <td><?php echo $value["TenKH"] ?></td>
                                        <td><?php echo $value["DiaChi"] ?></td>
                                        <td><?php echo $value["SDT"] ?></td>
                                        <td><?php echo $value["TongTien"] ?></td>
                                        <td><?php echo $value["NgayMua"] ?></td>
                                        <td><?php echo $value["GhiChu"] ?></td>
                                        <td><?php echo $value["TenTT"] ?></td>
                                        <td><a href="./ChiTietHoaDon.php?IDHD=<?php echo $value["ID"] ?>">Chi tiết</a></td>
                                        <td><a href="?IDHD_Nhan=<?php echo $value["ID"] ?>">Đã nhận hàng</a></td>
                                        <td><a href="?IDHD_Huy=<?php echo $value["ID"] ?>">Đã hủy hàng</a></td>
                                    </tr>
                            <?php
                                }
                            }
                        }
                        if ($date == "") { ?>
                            <script>
                                alert("Hãy nhập ngày");
                                window.location.href = "QuanLyHoaDon.php";
                            </script>
                        <?php }
                    } else {
                        $HDController = new HoaDonController();
                        $hd = new HoaDonModel("", "", "", "", "", "", "", "", "");
                        $getAll_HD = $HDController->getAllHoaDon($hd);
                        if ($getAll_HD == NULL) { ?>
                            <tr>
                                <td colspan="10" style="text-align: center;">Chưa có hóa đơn nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            foreach ($getAll_HD as $value) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $value["ID"] ?></td>
                                    <td><?php echo $value["TenKH"] ?></td>
                                    <td><?php echo $value["DiaChi"] ?></td>
                                    <td><?php echo $value["SDT"] ?></td>
                                    <td><?php echo $value["TongTien"] ?></td>
                                    <td><?php echo $value["NgayMua"] ?></td>
                                    <td><?php echo $value["GhiChu"] ?></td>
                                    <td><?php echo $value["TenTT"] ?></td>
                                    <td><a href="./ChiTietHoaDon.php?IDHD=<?php echo $value["ID"] ?>">Chi tiết</a></td>
                                    <td><a href="?IDHD_Nhan=<?php echo $value["ID"] ?>">Đã nhận hàng</a></td>
                                    <td><a href="?IDHD_Huy=<?php echo $value["ID"] ?>">Đã hủy hàng</a></td>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </table>
            </div>



            <?php
            if (isset($_GET["IDHD_Nhan"])) {
                $IDHD_Nhan = $_GET["IDHD_Nhan"];
                $HDController = new HoaDonController();
                $hd = new HoaDonModel($IDHD_Nhan, "", "", "", "", "", "", "", "");
                $update_HoaDon_DaNhanHang = $HDController->updateHoaDon_TrangThai_Nhan($hd);

                $CTHDController = new CTHoaDonController();
                $cthd = new CTHoaDonModel("", $IDHD_Nhan, "", "", "", "", "", "", "");
                $update_CTHoaDon_DaNhanHang = $CTHDController->updateChiTietHoaDon_TrangThai_Nhan($cthd); ?>
                <script>
                    window.location.href = "./QuanLyHoaDon.php";
                </script>
            <?php }
            
            if (isset($_GET["IDHD_Huy"])) {
                $IDHD_Huy = $_GET["IDHD_Huy"];
                $HDController = new HoaDonController();
                $hd = new HoaDonModel($IDHD_Huy, "", "", "", "", "", "", "", "");
                $update_HoaDon_DaHuyHang = $HDController->updateHoaDon_TrangThai_Huy($hd);

                $CTHDController = new CTHoaDonController();
                $cthd = new CTHoaDonModel("", $IDHD_Huy, "", "", "", "", "", "", "");
                $update_CTHoaDon_DaNhanHang = $CTHDController->updateChiTietHoaDon_TrangThai_Nhan($cthd); ?>
                <script>
                    window.location.href = "./QuanLyHoaDon.php";
                </script>
            <?php }
            ?>
        </div>
</body>

</html>