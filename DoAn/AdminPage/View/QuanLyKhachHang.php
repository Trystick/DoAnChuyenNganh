<?php
session_start();
include_once '../Controller/KhachHangController.php';
include_once '../Model/KhachHangModel.php';

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
    include_once './Layouts/menupage.php';

    ?>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tài khoản khách hàng
            </div>
            <div class="panel-body">
                <div style="display: flex; flex-direction: column;">
                    <form class="navbar-form navbar-left" role="search" method="post">
                        Lựa chọn:
                        <button type="submit" class="btn btn-default" name="All">Tất cả tài khoản</button>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Tìm kiếm ID hoặc tên" name="text_search">
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
                        <td>ID</td>
                        <td>Tên tài khoản</td>
                        <td>Mật khẩu</td>
                        <td>Trạng thái</td>
                        <td>Ngày đăng ký</td>
                        <td colspan="2">Thao tác</td>
                    </thead>
                    <?php
                    if (isset($_POST["All"])) {
                        $khController = new KhachHangController();
                        $kh = new KhachHangModel("", "", "", "", "");
                        //lấy tất cả khách hàng sắp xếp theo ngày đăng ký .
                        $getAllKh = $khController->getAllKhachHang($kh);

                        if ($getAllKh == null) { ?>
                            <tr>
                                <td colspan="8" style="text-align: center;">Chưa có tài khoản nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            foreach ($getAllKh as  $value) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $value["ID"] ?></td>
                                    <td><?php echo $value["TenTK"] ?></td>
                                    <td><?php echo $value["MatKhau"] ?></td>
                                    <td><?php echo $value["TrangThai"] ?></td>
                                    <td><?php echo $value["NgayDK"] ?></td>
                                    <td><a href="?IDTK_Mo=<?php echo $value["ID"] ?>">Mở tài khoản</a></td>
                                    <td><a href="?IDTK_Khoa=<?php echo $value["ID"] ?>">Khóa tài khoản</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else 
                    if (isset($_POST["Search"])) {
                        $khController = new KhachHangController();
                        $kh = new KhachHangModel($text_search, "%$text_search%", "", "", "");
                        //lấy tất cả khách hàng theo tên tài khoản sắp xếp theo ngày đăng ký .
                        $getkh = $khController->getKhachHang_TheoTenTK($kh);
                        if ($getkh == null) { ?>
                            <tr>
                                <td colspan="8" style="text-align: center;">Chưa có tài khoản nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            foreach ($getkh as $value) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $value["ID"] ?></td>
                                    <td><?php echo $value["TenTK"] ?></td>
                                    <td><?php echo $value["MatKhau"] ?></td>
                                    <td><?php echo $value["TrangThai"] ?></td>
                                    <td><?php echo $value["NgayDK"] ?></td>
                                    <td><a href="?IDTK_Mo=<?php echo $value["ID"] ?>">Mở tài khoản</a></td>
                                    <td><a href="?IDTK_Khoa=<?php echo $value["ID"] ?>">Khóa tài khoản</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else if (isset($_POST["Search_date"])) {
                        $date = $_POST["date"];
                        if ($date != "") {
                            $khController = new KhachHangController();
                            $kh = new KhachHangModel("", "", "", "", $date);
                            //lấy tất cả khách hàng theo tên Ngày Đăng Ký sắp xếp theo ngày đăng ký .
                            $getkh_theoNgayDK = $khController->getKhachHang_TheoNgayDK($kh);
                            if ($getkh_theoNgayDK == null) { ?>
                                <tr>
                                    <td colspan="8" style="text-align: center;">Chưa có tài khoản nào !!!</td>
                                </tr>
                                <?php
                            } else {
                                $dem = 0;
                                foreach ($getkh_theoNgayDK as $value) {
                                    $dem++;
                                ?>
                                    <tr>
                                        <td><?php echo $dem ?></td>
                                        <td><?php echo $value["ID"] ?></td>
                                        <td><?php echo $value["TenTK"] ?></td>
                                        <td><?php echo $value["MatKhau"] ?></td>
                                        <td><?php echo $value["TrangThai"] ?></td>
                                        <td><?php echo $value["NgayDK"] ?></td>

                                        <td><a href="?IDTK_Mo=<?php echo $value["ID"] ?>">Mở tài khoản</a></td>
                                        <td><a href="?IDTK_Khoa=<?php echo $value["ID"] ?>">Khóa tài khoản</a></td>
                                    </tr>
                            <?php
                                }
                            }
                        } else { ?>
                            <script>
                                alert("Hãy nhập ngày");
                                window.location.href = "QuanLyKhachHang.php";
                            </script>
                        <?php }
                    } else {
                        $khController = new KhachHangController();
                        $kh = new KhachHangModel("", "", "", "", "");
                        //lấy tất cả khách hàng sắp xếp theo ngày đăng ký .
                        $getAllKh = $khController->getAllKhachHang($kh);

                        if ($getAllKh == null) { ?>
                            <tr>
                                <td colspan="8" style="text-align: center;">Chưa có tài khoản nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            foreach ($getAllKh as  $value) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $value["ID"] ?></td>
                                    <td><?php echo $value["TenTK"] ?></td>
                                    <td><?php echo $value["MatKhau"] ?></td>
                                    <td><?php echo $value["TrangThai"] ?></td>
                                    <td><?php echo $value["NgayDK"] ?></td>
                                    <td><a href="?IDTK_Mo=<?php echo $value["ID"] ?>">Mở tài khoản</a></td>
                                    <td><a href="?IDTK_Khoa=<?php echo $value["ID"] ?>">Khóa tài khoản</a></td>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
            </div>
            <?php
            if (isset($_GET["IDTK_Mo"])) {
                $IDTK_Mo = $_GET["IDTK_Mo"];
                $khController = new KhachHangController();
                $kh = new KhachHangModel($IDTK_Mo, "", "", "", "");
                //Mở Tài khoản khách hàng
                $khController->updateTrangThaiKhachHang_Mo($kh);

            ?>
                <script>
                    window.location.href = "./QuanLyKhachHang.php";
                </script>
            <?php }
            if (isset($_GET["IDTK_Khoa"])) {
                $IDTK_Khoa = $_GET["IDTK_Khoa"];
                $khController = new KhachHangController();
                $kh = new KhachHangModel($IDTK_Khoa, "", "", "", "");
                //Khóa Tài khoản khách hàng
                $khController->updateTrangThaiKhachHang_Khoa($kh);
            ?>
                <script>
                    window.location.href = "./QuanLyKhachHang.php";
                </script>
            <?php }
            ?>
        </div>
</body>

</html>