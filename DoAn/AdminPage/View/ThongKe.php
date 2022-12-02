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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>

<body>
    <?php
    include './Layouts/menupage.php';

    ?>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thống kê
            </div>

            <div class="panel-body">
                <div style="display: flex; flex-direction: column;">
                    <form class="navbar-form navbar-left" role="search" method="post">
                        Lựa chọn:
                        <div class="form-group">
                            Từ: <input type="date" class="form-control" placeholder="Tìm kiếm" name="date">
                        </div>
                        <button type="submit" class="btn btn-default" name="Search_date_Nhan">Thống kê đơn đã nhận</button>
                        <button type="submit" class="btn btn-default" name="Search_date_Huy">Thống kê đơn đã hủy</button>
                        <button type="submit" class="btn btn-default" name="Search_date_SP">Sản phẩm bán chạy</button>
                    </form>
                    <?php
                    if (isset($_POST["Search_date_Nhan"])) {
                        $date = $_POST["date"]; ?>
                        <p>Kết quả từ " <?php echo $date ?> " đến " <?php echo date("Y-m-d") ?> "</p>
                    <?php }
                    if (isset($_POST["Search_date_Huy"])) {
                        $date = $_POST["date"]; ?>
                        <p>Kết quả từ " <?php echo $date ?> " đến "<?php echo date("Y-m-d") ?>"</p>
                    <?php }
                    if (isset($_POST["Search_date_SP"])) {
                        $date = $_POST["date"]; ?>
                        <p>Kết quả từ " <?php echo $date ?> " đến "<?php echo date("Y-m-d") ?>"</p>
                    <?php }
                    ?>
                </div>
                <br />

                <?php
                if (isset($_POST["Search_date_Nhan"])) {
                    $_SESSION["trangthai"] = 2;
                    if ($date != "") {
                        $hdController = new HoaDonController();
                        $hd = new HoaDonModel("", "", "", "", "", "", $date, "", "");
                        $get_HoaDon = $hdController->getHoaDon_TheoNgayMua_Nhan($hd);

                        if ($get_HoaDon == NULL) { ?>
                            <p style="text-align: center;">Không có dữ liệu</p>
                        <?php
                        } else { ?>
                            <div class="container">
                                <div id="chart"></div>
                            </div>
                        <?php }
                        $chart_data = '';
                        $Tong = 0;
                        foreach ($get_HoaDon as $value) {
                            $chart_data .= "{ Date:'" . $value["NgayMua"] . "', NgayMua:'" . $value["Ngay"] . "',ThangMua:'" . $value["Thang"] . "',NamMua:'" . $value["Nam"] . "', TongTien:" . $value["TongTien"] . "}, ";
                            $Tong += $value["TongTien"];
                        }
                        $chart_data = substr($chart_data, 0, -2); ?>
                        <p>Tổng tiền: <?php echo number_format($Tong) ?></p>
                    <?php }
                    if ($date == "") { ?>
                        <script>
                            alert("Hãy nhập ngày");
                            window.location.href = "./ThongKe.php";
                        </script>
                        <?php }
                } else if (isset($_POST["Search_date_Huy"])) {
                    $_SESSION["trangthai"] = 3;
                    if ($date != "") {
                        $hdController = new HoaDonController();
                        $hd = new HoaDonModel("", "", "", "", "", "", $date, "", "");
                        $get_HoaDon = $hdController->getHoaDon_TheoNgayMua_Huy($hd);
                        if ($get_HoaDon == NULL) { ?>
                            <p style="text-align: center;">Không có dữ liệu</p>
                        <?php
                        } else { ?>
                            <div class="container">
                                <div id="chart"></div>
                            </div>
                        <?php }
                        $chart_data = '';
                        $Tong = 0;
                        foreach ($get_HoaDon as $value) {
                            $chart_data .= "{ Date:'" . $value["NgayMua"] . "', NgayMua:'" . $value["Ngay"] . "',ThangMua:'" . $value["Thang"] . "',NamMua:'" . $value["Nam"] . "', TongTien:" . $value["TongTien"] . "}, ";
                            $Tong += $value["TongTien"];
                        }
                        $chart_data = substr($chart_data, 0, -2); ?>
                        <p>Tổng tiền: <?php echo number_format($Tong) ?></p>
                    <?php }
                    if ($date == "") { ?>
                        <script>
                            alert("Hãy nhập ngày");
                            window.location.href = "ThongKe.php";
                        </script>
                    <?php }
                } else if (isset($_POST["Search_date_SP"])) { ?>
                    <table class="table table-striped">
                        <thead>
                            <td>STT</td>
                            <td>ID sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Xuất xứ</td>
                            <td>Đơn giá</td>
                            <td>Số lượng</td>
                            <td>Thành tiền</td>
                        </thead>
                        <?php
                        if ($date != "") {
                            $hdController = new HoaDonController();
                            $hd = new HoaDonModel("", "", "", "", "", "", $date, "", "");
                            $get_ChiTietHoaDon = $hdController->getChiTietHoaDon_TheoNgayMua($hd);

                            if ($get_ChiTietHoaDon == NULL) { ?>
                                <tr>
                                    <td colspan="7" style="text-align: center;">Chưa có sản phẩm nào được mua!!!</td>
                                </tr>
                                <?php } else {
                                $dem = 0;
                                foreach ($get_ChiTietHoaDon as $value) {
                                    $dem++;
                                ?>
                                    <tr>
                                        <td><?php echo $dem ?></td>
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
                        }
                        if ($date == "" ) { ?>
                            <script>
                                alert("Hãy nhập ngày");
                                window.location.href = "ThongKe.php";
                            </script>
                        <?php }
                        ?>
                    </table>
                <?php }
                ?>
            </div>
        </div>
</body>
<script>
    Morris.Bar({
        element: 'chart',
        data: [<?php echo $chart_data; ?>],
        xkey: 'Date',
        ykeys: ['TongTien'],
        labels: ['Tổng tiền'],
        hideHover: 'auto',
    });
    var thisDate, thisData;
    $("#chart").on('click', function() {
        thisDate = $(".morris-hover-row-label").html();
        thisDataHtml = $(".morris-hover-point").html().split(":");
        thisData = thisDataHtml[1].trim();
        window.location.href = "./ChiTietThongKe.php?Date=" + thisDate;
    })
</script>

</html>