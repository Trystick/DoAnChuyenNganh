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
                    <h1>Thêm loại sản phẩm</h1>
                    <form action="" method="post">
                        <p>Loại sản phẩm: <input type="text" name="Ten_LSP"></p>
                        <button type="submit" class="btn btn-primary" name="btnThem">Thêm</button>
                        <a href="./LoaiSanPham.php"><button type="button" class="btn btn-secondary">Trở về</button></a>
                    </form>
                </center>

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
    <?php
    if (isset($_POST["btnThem"])) {
        $Ten_LSP = $_POST['Ten_LSP'];
        $LSPController=new LoaisanphamController();
        $lsp=new LoaisanphamModel("",$Ten_LSP,"");
        $dataThem=$LSPController->insertLoaiSanpham($lsp);
        if ($dataThem == true) {
    ?>
            <script>
                alert("Thêm thành công");
                window.location.href = './LoaiSanPham.php';
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Lỗi thêm !");
            </script>
    <?php
        }
    }
    ?>
    </div>
</body>

</html>