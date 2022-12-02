<?php
session_start();
include_once '../Model/SanphamModel.php';
include_once '../Controller/SanphamController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php
    include_once './Layouts/headerpage.php';
    ?>
    <style>
        td {
            vertical-align: middle !important;
        }
    </style>
</head>

<body>
    <?php
    include './Layouts/menupage.php';
    ?>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
                Sản phẩm
            </div>
            <div class="panel-body">
                <div style="display: flex; flex-direction: column;">
                    <form class="navbar-form navbar-left" role="search" method="post">
                        Lựa chọn:
                        <button type="submit" class="btn btn-default" name="All">Tất cả sản phẩm</button>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Tìm kiếm ID hoặc Tên SP" name="text_search">
                            <button type="submit" class="btn btn-default" name="Search">Tìm kiếm</button>
                        </div>
                        <div class="form-group">
                            Từ: <input type="date" class="form-control" name="date">
                            <button type="submit" class="btn btn-default" name="Search_date">Tìm kiếm theo ngày</button>
                        </div>
                        <div class="form-group" style="margin-top: 5px;">
                            <button type="submit" class="btn btn-default" name="Quantity">Số lượng nhỏ hơn</button>
                            <input style="font-size: 12pt;" type="number" class="form-control"  name="text_quantity" min="0" oninput="this.value = Math.abs(this.value)">
                        </div>
                    </form>
                    <?php
                    if (isset($_POST["Search"])) {
                        $text_search = $_POST["text_search"] ?>
                        <p>Kết quả liên quan đến " <?php echo $text_search ?> "</p>
                    <?php }
                    ?>
                </div>
                <div style="text-align: center;display: flex;justify-content: space-evenly;">
                    <a href="./ThemSanPham.php">Thêm sản phẩm</a>
                </div>
                <table class="table table-striped">

                    <thead>
                        <td>STT</td>
                        <td>ID</td>
                        <td>Ảnh</td>
                        <td>Loại sản phẩm</td>
                        <td>Tên sản phẩm</td>
                        <td>Giá bán</td>
                        <td>Số lượng</td>
                        <td>Ngày nhập</td>
                        <td>Xuất xứ</td>
                        <td colspan="2">Thao tác</td>
                    </thead>
                    <?php
                    if (isset($_POST["All"])) {
                        $SPController = new SanphamController();
                        $sp = new SanphamModel("", "", "", "", "", "", "", "");
                        $getAll_SP = $SPController->getAllSanPham($sp);
                        if ($getAll_SP == NULL) { ?>
                            <tr>
                                <td colspan="12" style="text-align: center;">Chưa có sản phẩm nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            foreach ($getAll_SP as $value) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $value["ID"] ?></td>
                                    <td><img src="./Images/<?php echo $value["Image"] ?>" alt="" style="max-height: 80px;"></td>
                                    <td><?php echo $value["Ten"] ?></td>
                                    <td><?php echo $value["TenSanPham"] ?></td>
                                    <td><?php echo $value["GiaBan"] ?></td>
                                    <td><?php echo $value["SoLuong"] ?></td>
                                    <td><?php echo $value["NgayNhap"] ?></td>
                                    <td><?php echo $value["XuatXu"] ?></td>
                                    <td><a href="./SuaSanPham.php?IDSP_Update=<?php echo $value["ID"] ?>">Sửa</a></td>
                                    <td><a href="./XacNhanDelete.php?IDSP_Delete=<?php echo $value["ID"] ?>">Xóa</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else 
                    if (isset($_POST["Search"])) {
                        $SPController = new SanphamController();
                        $sp = new SanphamModel($text_search, "", "", "%$text_search%", "", "", "", "", "");
                        $getSP = $SPController->getSanPham($sp);
                        if ($getSP == NULL) { ?>
                            <tr>
                                <td colspan="12" style="text-align: center;">Chưa có sản phẩm nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            foreach ($getSP as $value) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $value["ID"] ?></td>
                                    <td><img src="./Images/<?php echo $value["Image"] ?>" alt="" style="max-height: 80px;"></td>
                                    <td><?php echo $value["Ten"] ?></td>
                                    <td><?php echo $value["TenSanPham"] ?></td>
                                    <td><?php echo $value["GiaBan"] ?></td>
                                    <td><?php echo $value["SoLuong"] ?></td>
                                    <td><?php echo $value["NgayNhap"] ?></td>
                                    <td><?php echo $value["XuatXu"] ?></td>
                                    <td><a href="./SuaSanPham.php?IDSP_Update=<?php echo $value["ID"] ?>">Sửa</a></td>
                                    <td><a href="./XacNhanDelete.php?IDSP_Delete=<?php echo $value["ID"] ?>">Xóa</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else if (isset($_POST["Search_date"])) {
                        $date = $_POST["date"];
                        if ($date != "") {
                            $SPController = new SanphamController();
                            $sp = new SanphamModel("", "", "", "", "", "", $date, "");
                            $getSP = $SPController->getSanPham_TheoNgayNhap($sp);
                            if ($getSP == NULL) { ?>
                                <tr>
                                    <td colspan="12" style="text-align: center;">Chưa có sản phẩm nào !!!</td>
                                </tr>
                                <?php
                            } else {
                                $dem = 0;
                                foreach ($getSP as $value) {
                                    $dem++;
                                ?>
                                    <tr>
                                        <td><?php echo $dem ?></td>
                                        <td><?php echo $value["ID"] ?></td>
                                        <td><img src="./Images/<?php echo $value["Image"] ?>" alt="" style="max-height: 80px;"></td>
                                        <td><?php echo $value["Ten"] ?></td>
                                        <td><?php echo $value["TenSanPham"] ?></td>
                                        <td><?php echo $value["GiaBan"] ?></td>
                                        <td><?php echo $value["SoLuong"] ?></td>
                                        <td><?php echo $value["NgayNhap"] ?></td>
                                        <td><?php echo $value["XuatXu"] ?></td>
                                        <td><a href="./SuaSanPham.php?IDSP_Update=<?php echo $value["ID"] ?>">Sửa</a></td>
                                        <td><a href="./XacNhanDelete.php?IDSP_Delete=<?php echo $value["ID"] ?>">Xóa</a></td>
                                    </tr>
                            <?php
                                }
                            }
                        }


                        if ($date == "") { ?>
                            <script>
                                alert("Hãy nhập ngày");
                                window.location.href = "SanPham.php";
                            </script>
                        <?php }
                    } else if (isset($_POST["Quantity"])) {
                        $text_quantity = $_POST["text_quantity"];
                        if ($text_quantity == "") { ?>
                            <script>
                                alert("Chưa nhập số lượng");
                                window.location.href = "SanPham.php";
                            </script>
                        <?php }
                        $SPController = new SanphamController();
                        $sp = new SanphamModel("", "", "", "", "", $text_quantity, "", "");
                        $getSP = $SPController->getSanPham_TheoSoLuong($sp);
                        if ($getSP == NULL) { ?>
                            <tr>
                                <td colspan="12" style="text-align: center;">Chưa có sản phẩm nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            foreach ($getSP as $value) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $value["ID"] ?></td>
                                    <td><img src="./Images/<?php echo $value["Image"] ?>" alt="" style="max-height: 80px;"></td>
                                    <td><?php echo $value["Ten"] ?></td>
                                    <td><?php echo $value["TenSanPham"] ?></td>
                                    <td><?php echo $value["GiaBan"] ?></td>
                                    <td><?php echo $value["SoLuong"] ?></td>
                                    <td><?php echo $value["NgayNhap"] ?></td>
                                    <td><?php echo $value["XuatXu"] ?></td>
                                    <td><a href="./SuaSanPham.php?IDSP_Update=<?php echo $value["ID"] ?>">Sửa</a></td>
                                    <td><a href="./XacNhanDelete.php?IDSP_Delete=<?php echo $value["ID"] ?>">Xóa</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else {
                        $SPController = new SanphamController();
                        $sp = new SanphamModel("", "", "", "", "", "", "", "", "");
                        $getAll_SP = $SPController->getAllSanPham($sp);
                        if ($getAll_SP == NULL) { ?>
                            <tr>
                                <td colspan="12" style="text-align: center;">Chưa có sản phẩm nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            foreach ($getAll_SP as $value) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $value["ID"] ?></td>
                                    <td><img src="./Images/<?php echo $value["Image"] ?>" alt="" style="max-height: 80px;"></td>
                                    <td><?php echo $value["Ten"] ?></td>
                                    <td><?php echo $value["TenSanPham"] ?></td>
                                    <td><?php echo $value["GiaBan"] ?></td>
                                    <td><?php echo $value["SoLuong"] ?></td>
                                    <td><?php echo $value["NgayNhap"] ?></td>
                                    <td><?php echo $value["XuatXu"] ?></td>
                                    <td><a href="./SuaSanPham.php?IDSP_Update=<?php echo $value["ID"] ?>">Sửa</a></td>
                                    <td><a href="./XacNhanDelete.php?IDSP_Delete=<?php echo $value["ID"] ?>">Xóa</a></td>
                                </tr>   
                    <?php
                            }
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
</body>

</html>