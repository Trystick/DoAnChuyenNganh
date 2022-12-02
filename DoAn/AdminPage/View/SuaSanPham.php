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
</head>

<body onload="document.forms['old'].submit()">
    <?php
    include './Layouts/menupage.php';
    ?>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
                Sản phẩm
            </div>
            <div class="panel-body">
                <center style="width: 100%; margin: auto;">
                    <h1>Sửa sản phẩm</h1>
                    <?php
                    $IDSP_Update = $_GET["IDSP_Update"];
                    $LSPController = new LoaisanphamController();
                    $lsp = new LoaisanphamModel("", "", "");
                    $getAll_LSP = $LSPController->getAllLoaiSanPham($lsp);

                    $SPController = new SanphamController();
                    $sp = new SanphamModel($IDSP_Update, "", "", "", "", "", "", "");
                    $getSP = $SPController->getSanPham_TheoIDSanPham($sp);
                    ?>
                    <form class="form-horizontal" method="post" enctype="multipart/form-data" style="display: flex;justify-content: space-around;width: 100%;">
                        <div>
                            <center style="font-size: 20px;">Sản phẩm ban đầu</center>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Loại sản phẩm</label>
                                <div class="col-sm-10">
                                    <select name="loaisanpham_old" id="" class="form-control">
                                        <option value="<?php echo $getSP[0]["ID_LoaiSanPham"] ?>"><?php echo $getSP[0]["Ten"] ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Ảnh</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="image_old" readonly value="<?php echo $getSP[0]["Image"] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Tên sản phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tensanpham_old" readonly value="<?php echo $getSP[0]["TenSanPham"] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Giá bán</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="giaban_old" readonly value="<?php echo $getSP[0]["GiaBan"] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Số lượng</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="soluong_old" readonly value="<?php echo $getSP[0]["SoLuong"] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Xuất xứ</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="xuatxu_old" readonly value="<?php echo $getSP[0]["XuatXu"] ?>">
                                </div>
                            </div>
                        </div>

                        <div>
                            <center style="font-size: 20px;">Sản phẩm sau khi đổi</center>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Loại sản phẩm</label>
                                <div class="col-sm-10">
                                    <select name="loaisanpham" id="" class="form-control">
                                        <option value=""></option>
                                        <?php
                                        foreach ($getAll_LSP as $value) { ?>
                                            <option value="<?php echo $value["ID"] ?>"><?php echo $value["Ten"] ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Ảnh</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="" name="Image">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Tên sản phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" placeholder="Tên sản phẩm" name="tensanpham">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Giá bán</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="" placeholder="Giá bán" name="giaban" oninput="this.value = Math.abs(this.value)" min="0">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Số lượng</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="" placeholder="Số lượng" name="soluong" oninput="this.value = Math.abs(this.value)" min="0">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Xuất xứ</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" placeholder="Xuất Xứ" name="xuatxu">
                                </div>
                            </div>
                            <div class="form-group">
                                <center>Nếu để trống thì sẽ lấy dữ liệu cũ</center>
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="btnSua">Sửa</button>
                                    <a href="./SanPham.php"><button type="button" class="btn btn-secondary">Trở về</button></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST["btnSua"])) {
        $loaisanpham_old = $_POST["loaisanpham_old"];
        $image_old = $_POST["image_old"];
        $tensanpham_old = $_POST["tensanpham_old"];
        $giaban_old = $_POST["giaban_old"];
        $soluong_old = $_POST["soluong_old"];
        $xuatxu_old = $_POST["xuatxu_old"];

        $loaisanpham = $_POST["loaisanpham"];
        $image = $_FILES["Image"]["name"];
        $tensanpham = $_POST["tensanpham"];
        $giaban = $_POST["giaban"];
        $soluong = $_POST["soluong"];
        $xuatxu = $_POST["xuatxu"];

        if ($loaisanpham == "") {
            $loaisanpham = $_POST["loaisanpham_old"];
        }
        if ($tensanpham == "") {
            $tensanpham = $_POST["tensanpham_old"];
        }
        if ($giaban == "") {
            $giaban = $_POST["giaban_old"];
        }
        if ($soluong == "") {
            $soluong = $_POST["soluong_old"];
        }
        if ($xuatxu == "") {
            $xuatxu = $_POST["xuatxu_old"];
        }
        $LSPController = new LoaisanphamController();
        $lsp = new LoaisanphamModel($loaisanpham, "", "");
        $getLSP = $LSPController->getLoaiSanPham_TheoIDLoaiSP($lsp);
        if ($image != "") {
            $check_img = true;
            $folder_path = "./Images/";
            $file_path = $folder_path . $_FILES["Image"]["name"];
            $ex = array('jpg', 'png');
            $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
            if (!in_array($file_type, $ex)) {
                echo "<p style='text-align: center;'>Loại file không hợp lệ</p>";
                $check_img == false;
                die();
            }
            $SPController = new SanphamController();
            $sp = new SanphamModel($IDSP_Update, $loaisanpham, $image, $tensanpham, $giaban, $soluong, "", $xuatxu);
            $updateSanPham = $SPController->updateSanPham_TheoID($sp);
    ?>
            <script>
                alert("Sửa thành công");
                window.location.href = "SanPham.php";
            </script>
        <?php

        } else {
            $image = $image_old;
            $SPController = new SanphamController();
            $sp = new SanphamModel($IDSP_Update, $loaisanpham, $image, $tensanpham, $giaban, $soluong, "", $xuatxu);
            $updateSanPham = $SPController->updateSanPham_TheoID($sp);
        ?>
            <script>
                alert("Sửa thành công");
                window.location.href = "./SanPham.php";
            </script>
    <?php
        }
    }
    ?>
    </div>
</body>

</html>