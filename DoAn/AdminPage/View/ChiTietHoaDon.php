<?php
session_start();
include_once '../Controller/HoaDonController.php';
include_once '../Model/HoaDonModel.php';

include_once '../Controller/CTHoaDonController.php';
include_once '../Model/CTHoaDonModel.php';
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
                <table class="table table-striped">
                    <thead>
                        <td>STT</td>
                        <td>ID tài khoản</td>
                        <td>Tên khách hàng</td>
                        <td>Địa chỉ</td>
                        <td>Số điện thoại</td>
                        <td>Tổng tiền</td>
                        <td>Ngày mua</td>
                        <td>Ghi chú</td>
                        <td>Trạng thái</td>
                    </thead>
                    <?php
                    if (isset($_GET["IDHD"])) {
                        $IDHD = $_GET["IDHD"];
                        $HDController = new HoaDonController();
                        $hd = new HoaDonModel($IDHD, "", "", "", "", "", "", "", "");
                        $getHoaDon = $HDController->getHoaDon_TheoID($hd);
                        $dem = 0;
                        foreach ($getHoaDon as $value) {
                            $dem++;
                    ?>
                            <tr>
                                <td><?php echo $dem ?></td>
                                <td><?php echo $value["IDTK"] ?></td>
                                <td><?php echo $value["TenKH"] ?></td>
                                <td><?php echo $value["DiaChi"] ?></td>
                                <td><?php echo $value["SDT"] ?></td>
                                <td><?php echo $value["TongTien"] ?></td>
                                <td><?php echo $value["NgayMua"] ?></td>
                                <td><?php echo $value["GhiChu"] ?></td>
                                <td><?php echo $value["TenTT"] ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
        <div style="display: flex; flex-direction: column;">
            <form class="navbar-form navbar-left" role="search" method="post">
                Lựa chọn:
                <button type="submit" class="btn btn-default" name="All">Tất cả sản phẩm</button>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm theo tên sản phẩm" name="text_search">
                </div>
                <button type="submit" class="btn btn-default" name="Search">Tìm kiếm</button>
            </form>
            <?php
            if (isset($_POST["Search"])) {
                $text_search = $_POST["text_search"] ?>
                <p>Kết quả liên quan đến " <?php echo $text_search ?> "</p>
            <?php }
            ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Chi tiết hóa đơn
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <td>STT</td>
                        <td>ID hóa đơn</td>
                        <td>ID sản phẩm</td>
                        <td>Tên sản phẩm</td>
                        <td>Xuất xứ</td>
                        <td>Đơn giá</td>
                        <td>Số lượng</td>
                        <td>Thành tiền</td>
                    </thead>
                    <?php
                    if (isset($_POST["All"])) {
                        $CTHDController = new CTHoaDonController();
                        $cthd = new CTHoaDonModel("", $IDHD, "", "", "", "", "", "", "");
                        $getChiTietHoaDon = $CTHDController->getChiTietHoaDon_TheoIDHoaDon($cthd);
                        $dem = 0;
                        foreach ($getChiTietHoaDon as $value) {
                            $dem++;
                    ?>
                            <tr>
                                <td><?php echo $dem ?></td>
                                <td><?php echo $value["ID_HoaDon"] ?></td>
                                <td><?php echo $value["IDSanPham"] ?></td>
                                <td><?php echo $value["TenSanPham"] ?></td>
                                <td><?php echo $value["XuatXu"] ?></td>
                                <td><?php echo $value["DonGia"] ?></td>
                                <td><?php echo $value["SoLuong"] ?></td>
                                <td><?php echo $value["ThanhTien"] ?></td>
                            </tr>
                        <?php
                        }
                    } else if (isset($_POST["Search"])) {
                        $CTHDController = new CTHoaDonController();
                        $cthd = new CTHoaDonModel("", $IDHD, "", "%$text_search%", "", "", "", "", "");
                        $getChiTietHoaDon = $CTHDController->getChiTietHoaDon_TheoTenSanPham($cthd);

                        if ($getChiTietHoaDon == NULL) { ?>
                            <tr>
                                <td colspan="10" style="text-align: center;">Chưa có hóa đơn nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            foreach ($getChiTietHoaDon as $value) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $value["ID_HoaDon"] ?></td>
                                    <td><?php echo $value["IDSanPham"] ?></td>
                                    <td><?php echo $value["TenSanPham"] ?></td>
                                    <td><?php echo $value["XuatXu"] ?></td>
                                    <td><?php echo $value["DonGia"] ?></td>
                                    <td><?php echo $value["SoLuong"] ?></td>
                                    <td><?php echo $value["ThanhTien"] ?></td>
                                </tr>
                            <?php
                            }
                        }
                    } else {
                        $CTHDController = new CTHoaDonController();
                        $cthd = new CTHoaDonModel("", $IDHD, "", "", "", "", "", "", "");
                        $getChiTietHoaDon = $CTHDController->getChiTietHoaDon_TheoIDHoaDon($cthd);

                        $dem = 0;
                        foreach ($getChiTietHoaDon as $value) {
                            $dem++;
                            ?>
                            <tr>
                                <td><?php echo $dem ?></td>
                                <td><?php echo $value["ID_HoaDon"] ?></td>
                                <td><?php echo $value["IDSanPham"] ?></td>
                                <td><?php echo $value["TenSanPham"] ?></td>
                                <td><?php echo $value["XuatXu"] ?></td>
                                <td><?php echo $value["DonGia"] ?></td>
                                <td><?php echo $value["SoLuong"] ?></td>
                                <td><?php echo $value["ThanhTien"] ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
        <?php
        if (isset($_GET["Date"])) {
            $Date = $_GET["Date"];
        ?>
            <a href="./ChiTietThongKe.php?Date=<?php echo $Date ?>"><button type="button" class="btn btn-secondary">Trở về</button></a>
        <?php } else { ?>
            <a href="./QuanLyHoaDon.php"><button type="button" class="btn btn-secondary">Trở về</button></a>
        <?php }
        ?>
    </div>
    </div>
</body>

</html>