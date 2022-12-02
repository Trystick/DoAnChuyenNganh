<?php
session_start();
include_once '../Controller/LoaisanphamController.php';
include_once '../Model/LoaisanphamModel.php';
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
                <center style="width: 500px; margin: auto;">
                    <h1>Sửa loại sản phẩm</h1>
                    <form action="" method="post">
                        <?php
                        if (isset($_GET["IDLSP_Update"])) {
                            $IDLSP_Update = $_GET['IDLSP_Update'];
                            $LSPController = new LoaisanphamController();
                            $lsp = new LoaisanphamModel($IDLSP_Update, "", "");
                            $getLSP = $LSPController->getLoaiSanPham_TheoIDLoaiSP($lsp);
                        }
                        ?>
                        <p>Loại sản phẩm cũ: <input type="text" name="loai_SP_old" readonly value="<?php echo $getLSP[0]["Ten"] ?>"></p>
                        <p>Loại sản phẩm mới: <input type="text" name="TenLSP_new"></p>
                        <button type="submit" class="btn btn-primary" name="btnSua">Sửa</button>
                        <a href="./LoaiSanPham.php"><button type="button" class="btn btn-secondary">Trở về</button></a>
                    </form>
                </center>

                <?php
                if (isset($_POST["btnSua"])) {
                    $TenLSP_new = $_POST["TenLSP_new"];
                    $LSPController = new LoaisanphamController();
                    $lsp = new LoaisanphamModel($IDLSP_Update, $TenLSP_new, "");
                    $dataThem = $LSPController->updateTen_LoaiSanPham($lsp); ?>
                    <script>
                        alert("Sửa thành công");
                        window.location.href = "./LoaiSanPham.php";
                    </script>
                <?php }
                ?>
                <style>
                    p {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                    }

                    select,
                    input,
                    Textarea {
                        padding: 5px;
                        width: 400px;
                    }
                </style>
            </div>
        </div>
    </div>

    </div>
</body>

</html>