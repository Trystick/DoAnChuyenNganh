<?php
session_start();
include_once '../Model/HoaDonModel.php';
include_once '../Controller/HoaDonController.php';

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
    $trangthai = $_SESSION['trangthai'];
    if (isset($_GET["Date"])) {
        $Date = $_GET["Date"];
    }
    ?>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thống kê ngày <?php echo $Date ?>
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
                    if (isset($_POST["All"])) {
                        $hdController = new HoaDonController();
                        $hd = new HoaDonModel("", "", "", "", "", "", "%$Date%", "", $trangthai);
                        $get_HoaDon = $hdController->getHoaDon_TheoNgayMua($hd);
                        if ($get_HoaDon == NULL) { ?>
                            <tr>
                                <td colspan="10" style="text-align: center;">Chưa có hóa đơn nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            foreach ($get_HoaDon as $value) {
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
                                    <td><a href="./ChiTietHoaDon.php?IDHD=<?php echo $value["ID"] ?>&Date=<?php echo $Date ?>">Chi tiết</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else 
                    if (isset($_POST["Search"])) {
                        $hdController = new HoaDonController();
                        $hd = new HoaDonModel("", "", "%$text_search%", "", "", "", "%$Date%", "", $trangthai);
                        $get_HoaDon = $hdController->getHoaDon_TheoNgayMuaVaTenKH($hd);
                        if ($get_HoaDon == NULL) { ?>
                            <tr>
                                <td colspan="10" style="text-align: center;">Chưa có hóa đơn nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            foreach($get_HoaDon as $value){
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
                                    <td><a href="./ChiTietHoaDon.php?IDHD=<?php echo $value["ID"] ?>&Date=<?php echo $Date ?>">Chi tiết</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else {
                        $hdController = new HoaDonController();
                        $hd = new HoaDonModel("", "", "", "", "", "", "%$Date%", "", $trangthai);
                        $get_HoaDon = $hdController->getHoaDon_TheoNgayMua($hd);
                        if ($get_HoaDon == NULL) { ?>
                            <tr>
                                <td colspan="10" style="text-align: center;">Chưa có hóa đơn nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            foreach ($get_HoaDon as $value) {
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
                                    <td><a href="./ChiTietHoaDon.php?IDHD=<?php echo $value["ID"] ?>&Date=<?php echo $Date ?>">Chi tiết</a></td>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
        <a href="./ThongKe.php"><button type="button" class="btn btn-secondary">Trở về</button></a>
</body>

</html>