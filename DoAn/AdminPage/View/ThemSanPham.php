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
                <center style="width: 70%; margin: auto;">
                    <h1>Thêm sản phẩm</h1>
                    <?php
                    $LSPController = new LoaisanphamController();
                    $lsp = new LoaisanphamModel("", "", "");
                    $getAll_LSP = $LSPController->getAllLoaiSanPham($lsp);
                    ?>
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
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
                            <label for="" class="col-sm-2 control-label">Giá </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="" placeholder="Giá" name="gia" oninput="this.value = Math.abs(this.value)" min="0">
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
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" name="btnThem">Thêm</button>
                                <a href="./SanPham.php"><button type="button" class="btn btn-secondary">Trở về</button></a>
                            </div>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST["btnThem"])) {
        $loaisanpham = $_POST["loaisanpham"];
        $image = $_FILES["Image"]["name"];
        $tensanpham = $_POST["tensanpham"];
        $gia = $_POST["gia"];
        $soluong = $_POST["soluong"];
        $xuatxu = $_POST["xuatxu"];
        $check = true;
        if ($loaisanpham == "" || $image == "" || $tensanpham == "" || $gia == "" || $soluong == "" || $xuatxu == "") {
            $check = false;
            echo "<p style='text-align: center;'>Thiếu thông tin</p>";
            die();
        }
        if ($check == true) {
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
            $LSPController = new LoaisanphamController();
            $lsp = new LoaisanphamModel($loaisanpham, "", "");
            $dataThem = $LSPController->getLoaiSanPham_TheoIDLoaiSP($lsp);

            $SPController = new SanphamController();
            $sp = new SanphamModel("", $loaisanpham, $image, $tensanpham, $gia, $soluong, "", $xuatxu);
            $ThemSanPham = $SPController->insertSanPham($sp);
    ?>
            <script>
                alert("Thêm thành công");
                window.location.href = "./SanPham.php";
            </script>
    <?php

        }
    }
    ?>
    </div>
</body>

</html>