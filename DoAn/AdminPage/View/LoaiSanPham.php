<?php
session_start();
include_once '../Model/LoaisanphamModel.php';
include_once '../Controller/LoaisanphamController.php';
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
                Loại sản phẩm
            </div>
            <div class="panel-body">
                <div style="display: flex; flex-direction: column;">
                    <form class="navbar-form navbar-left" role="search" method="post">
                        Lựa chọn:
                        <button type="submit" class="btn btn-default" name="All">Tất cả loại sản phẩm</button>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Tìm kiếm ID hoặc Tên" name="text_search">
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
                <div style="text-align: center;">
                    <a href="./ThemLoaiSanPham.php">Thêm loại sản phẩm</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <td>STT</td>
                        <td>ID</td>
                        <td>Tên loại sản phẩm</td>
                        <td>Ngày thêm</td>
                        <td colspan="2">Thao tác</td>
                    </thead>
                    <?php
                    if (isset($_POST["All"])) {
                        $loaiSPController = new LoaisanphamController();
                        $lsp = new LoaisanphamModel("", "", "");
                        $getAll_LSP = $loaiSPController->getAllLoaiSanPham($lsp);
                        if ($getAll_LSP == NULL) { ?>
                            <tr>
                                <td colspan="7" style="text-align: center;">Chưa có loại sản phẩm nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            foreach ($getAll_LSP as $value) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $value["ID"] ?></td>
                                    <td><?php echo $value["Ten"] ?></td>
                                    <td><?php echo $value["NgayThem"] ?></td>
                                    <td><a href="./SuaLoaiSanPham.php?IDLSP_Update=<?php echo $value["ID"] ?>">Sửa</a></td>
                                    <td><a href="./XacNhanDelete.php?IDLSP_Delete=<?php echo $value["ID"] ?>">Xóa</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else if (isset($_POST["Search"])) {

                        //Tìm kiếm Loại Sản Phẩm theo tên hoặc ID của Loại Sản Phẩm.
                        $loaiSPController = new LoaisanphamController();
                        $lsp = new LoaisanphamModel($text_search, "%$text_search%", "");
                        $get_LSP = $loaiSPController->getLoaiSanPham($lsp);
                        if ($get_LSP == NULL) { ?>
                            <tr>
                                <td colspan="7" style="text-align: center;">Không tìm thấy !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            foreach ($get_LSP as $value) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $value["ID"] ?></td>
                                    <td><?php echo $value["Ten"] ?></td>
                                    <td><?php echo $value["NgayThem"] ?></td>
                                    <td><a href="./SuaLoaiSanPham.php?IDLSP_Update=<?php echo $value["ID"] ?>">Sửa</a></td>
                                    <td><a href="./XacNhanDelete.php?IDLSP_Delete=<?php echo $value["ID"] ?>">Xóa</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else if (isset($_POST["Search_date"])) {
                        $date = $_POST["date"];
                        if ($date != "") {
                            $loaiSPController = new LoaisanphamController();
                            $lsp = new LoaisanphamModel("", "", $date);
                            $get_LSP_TheoNgay = $loaiSPController->getLoaiSanPham_TheoNgayDK($lsp);
                            if ($get_LSP_TheoNgay == NULL) { ?>
                                <tr>
                                    <td colspan="7" style="text-align: center;">Không tìm thấy !!!</td>
                                </tr>
                                <?php
                            } else {
                                $dem = 0;
                                foreach ($get_LSP_TheoNgay as $value) {
                                    $dem++;
                                ?>
                                    <tr>
                                        <td><?php echo $dem ?></td>
                                        <td><?php echo $value["ID"] ?></td>
                                        <td><?php echo $value["Ten"] ?></td>
                                        <td><?php echo $value["NgayThem"] ?></td>
                                        <td><a href="./SuaLoaiSanPham.php?IDLSP_Update=<?php echo $value["ID"] ?>">Sửa</a></td>
                                        <td><a href="./XacNhanDelete.php?IDLSP_Delete=<?php echo $value["ID"] ?>">Xóa</a></td>
                                    </tr>
                            <?php
                                }
                            }
                        }
                        if ($date == "") { ?>
                            <script>
                                alert("Hãy nhập ngày");
                                window.location.href = "LoaiSanPham.php";
                            </script>
                        <?php }
                    } else {
                        $loaiSPController = new LoaisanphamController();
                        $lsp = new LoaisanphamModel("", "", "");
                        $getAll_LSP = $loaiSPController->getAllLoaiSanPham($lsp);
                        if ($getAll_LSP == NULL) { ?>
                            <tr>
                                <td colspan="7" style="text-align: center;">Chưa có loại sản phẩm nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            foreach ($getAll_LSP as $value) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $value["ID"] ?></td>
                                    <td><?php echo $value["Ten"] ?></td>
                                    <td><?php echo $value["NgayThem"] ?></td>
                                    <td><a href="./SuaLoaiSanPham.php?IDLSP_Update=<?php echo $value["ID"] ?>">Sửa</a></td>
                                    <td><a href="./XacNhanDelete.php?IDLSP_Delete=<?php echo $value["ID"] ?>">Xóa</a></td>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    </div>
</body>

</html>