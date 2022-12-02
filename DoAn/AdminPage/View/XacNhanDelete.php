<?php
session_start();
include_once '../Controller/LoaisanphamController.php';
include_once '../Model/LoaisanphamModel.php';

include_once '../Controller/SanphamController.php';
include_once '../Model/SanphamModel.php';
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
        <?php
        if (isset($_GET["IDLSP_Delete"])) { ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Loại sản phẩm
                </div>
                <div class="panel-body">
                    <div style="text-align: center;">
                        <p style="font-size: 30px;">Xóa loại sản phẩm</p>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <td>STT</td>
                            <td>ID</td>
                            <td>Tên loại sản phẩm</td>
                            <td>Ngày thêm</td>
                        </thead>
                        <?php
                        $IDLSP_Delete = $_GET["IDLSP_Delete"];
                        $LSPController = new LoaisanphamController();
                        $lsp = new LoaisanphamModel($IDLSP_Delete, "", "");
                        $getLSP = $LSPController->getLoaiSanPham_TheoIDLoaiSP($lsp);
                        $dem = 0;
                        foreach ($getLSP as $value) {
                            $dem++;
                        ?>
                            <tr>
                                <td><?php echo $dem ?></td>
                                <td><?php echo $value["ID"] ?></td>
                                <td><?php echo $value["Ten"] ?></td>
                                <td><?php echo $value["NgayThem"] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Sản phẩm bị xóa theo nếu xóa loại sản phẩm
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <td>STT</td>
                            <td>ID</td>
                            <td>Ảnh</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá bán</td>
                            <td>Số lượng</td>
                            <td>Ngày nhập</td>
                            <td>Xuất xứ</td>
                        </thead>
                        <?php
                        $IDLSP_Delete = $_GET["IDLSP_Delete"];
                        $SPController = new SanphamController();
                        $sp = new SanphamModel("", $IDLSP_Delete, "", "", "", "", "", "");
                        $getSP = $SPController->getSanPham_TheoIDLoaiSanPham($sp);
                        if ($getSP == NULL) { ?>
                            <tr>
                                <td colspan="9" style="text-align: center;">Không có sản phẩm nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            foreach ($getSP as $value) {
                                $dem++;
                            ?>
                                <style>
                                    td {
                                        vertical-align: middle !important;
                                    }
                                </style>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $value["ID"] ?></td>
                                    <td><img src="./Images/<?php echo $value["Image"] ?>" alt="" style="max-height: 80px;"></td>
                                    <td><?php echo $value["TenSanPham"] ?></td>
                                    <td><?php echo $value["GiaBan"] ?></td>
                                    <td><?php echo $value["SoLuong"] ?></td>
                                    <td><?php echo $value["NgayNhap"] ?></td>
                                    <td><?php echo $value["XuatXu"] ?></td>
                                </tr>

                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
            <div>
                <form action="" method="post">
                    <a href="./LoaiSanPham.php"><button type="button" class="btn btn-secondary">Trở về</button></a>
                    <button type="submit" class="btn btn-primary" name="btnXoa">Xác nhận xóa</button>
                </form>
            </div>
            <?php
            if (isset($_POST["btnXoa"])) {
                $IDLSP_Delete = $_GET["IDLSP_Delete"];
                $SPController = new SanphamController();
                $sp = new SanphamModel("", $IDLSP_Delete, "", "", "", "", "", "");
                $deleteSanPham = $SPController->deleteSanPham_TheoIDLoaiSanPham($sp);

                $LSPController = new LoaisanphamController();
                $lsp = new LoaisanphamModel($IDLSP_Delete, "", "");
                $deleteLoaiSanPham = $LSPController->deleteLoaiSanPham_TheoID($lsp); ?>
                <script>
                    alert("Xóa thành công");
                    window.location.href = "./LoaiSanPham.php";
                </script>
            <?php }
            ?>

        <?php } else if ($_GET["IDSP_Delete"]) { ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Sản phẩm
                </div>
                <div class="panel-body">
                    <div style="text-align: center;">
                        <p style="font-size: 30px;">Xóa sản phẩm</p>
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
                        </thead>
                        <?php
                        $IDSP_Delete = $_GET["IDSP_Delete"];
                        $SPController = new SanphamController();
                        $sp = new SanphamModel($IDSP_Delete, "", "", "", "", "", "", "");
                        $getSP = $SPController->getSanPham_TheoIDSanPham($sp);
                        $dem = 1;
                        $img = $getSP[0]["Image"];
                        ?>
                        <tr>
                            <td><?php echo $dem ?></td>
                            <td><?php echo $getSP[0]["ID"] ?></td>
                            <td><img src="./Images/<?php echo $getSP[0]["Image"] ?>" alt="" style="max-height: 80px;"></td>
                            <td><?php echo $getSP[0]["Ten"] ?></td>
                            <td><?php echo $getSP[0]["TenSanPham"] ?></td>
                            <td><?php echo $getSP[0]["GiaBan"] ?></td>
                            <td><?php echo $getSP[0]["SoLuong"] ?></td>
                            <td><?php echo $getSP[0]["NgayNhap"] ?></td>
                            <td><?php echo $getSP[0]["XuatXu"] ?></td>
                        </tr>
                        <?php
                        ?>
                    </table>
                </div>
            </div>
            <div>
                <form action="" method="post">
                    <a href="./SanPham.php"><button type="button" class="btn btn-secondary">Trở về</button></a>
                    <button type="submit" class="btn btn-primary" name="btnXoa">Xác nhận xóa</button>
                </form>
            </div>
            <?php
            if (isset($_POST["btnXoa"])) {
                $SPController = new SanphamController();
                $sp = new SanphamModel($IDSP_Delete, "", "", "", "", "", "", "");
                $deleteSanPham = $SPController->deleteSanPham_TheoIDSanPham($sp);

            ?>
                <script>
                    alert("Xóa thành công");
                    window.location.href = "./SanPham.php";
                </script>
        <?php
            }
        }
        ?>
    </div>

    </div>
</body>

</html>