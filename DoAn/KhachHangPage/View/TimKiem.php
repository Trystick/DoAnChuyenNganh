<?php
session_start();


include_once '../Contronller/LoaisanphamController.php';
include_once '../Model/LoaisanphamModel.php';

include_once '../Model/SanphamModel.php';
include_once '../Contronller/SanphamController.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'Layouts/headerpage.php' ?>
</head>

<body>
  <!-- Menu-Start -->
  <?php
  if (!isset($_SESSION["ID_TK"])) {
    include 'Layouts/menupage.php';
  } else {
    include 'Layouts/menupageLogout.php';
  }
  ?>
  <!-- Menu-End -->

  <hr style="margin-top: 120pt;">
  <!-- Trái cây -->
  <?php

  if (isset($_POST["search"])) {
    $text_search = $_POST["text_search"] ?>
    <p style="text-align: center;font-weight: bold;">Kết quả liên quan đến " <?php echo $text_search ?> "</p>
  <?php
  }

  $LoaiController = new LoaisanphamController();
  $loai = new LoaisanphamModel("", "", "");
  $data = $LoaiController->getAllLoaiSanPham($loai);
  ?>
  <?php foreach ($data as  $value) {
    $flag = false;
    $sanphamController = new SanphamController();
    $sanpham = new SanphamModel("", "", "", "%$text_search%", "", "", "", "");
    $dataSanPham = $sanphamController->getSanPham_TheoTenSanPham($sanpham);
    foreach ($dataSanPham as $valuesanpham) {
      if ($value["ID"] ==  $valuesanpham["ID_LoaiSanPham"]) {
        if ($flag == false) { ?>
          <div class="container">
            <div class="col-sm-12 text-center p-4 mt-4 text-success">
              <h2><b class="p-2 border-bottom"> <?php echo $value["Ten"]  ?> </b></h2>
            </div>
          </div>
    <?php
          $flag = true;
        }
      }
    }
    ?>


    <div class="row">
      <?php

      foreach ($dataSanPham as $valuesanpham) {
        if ($value["ID"] ==  $valuesanpham["ID_LoaiSanPham"]) {

          echo '<div class="col-sm-3" style="float:right;"><a href="./ChiTietSanPham.php?ID=' . $valuesanpham["ID"] . '&IDLSP=' . $valuesanpham["ID_LoaiSanPham"] . '" style="color: black;text-decoration: none;">
                        <div class="card" style="width: 18rem;margin-top: 20pt; margin-left: 30pt;;">
                          <img src="./Images/' . $valuesanpham['Image'] . '" class="card-img-top"  alt="...">
                          <div class="card-body">
                            Tên: ' . $valuesanpham['TenSanPham'] . '<br>
                            Xuất sứ: ' . $valuesanpham["XuatXu"] . '<br>
                            Giá bán: ' . number_format($valuesanpham['GiaBan']) . '/kg<br>
                            Số lượng:  ' . $valuesanpham['SoLuong'] . 'kg
                          </div>
                        </div></a>
                    </div>';
        }
      }
      ?>
    </div>
  <?php } ?>


  <hr style="margin-top: 50pt;">

  <!-- Footer Start -->
  <div style="margin: 0 -150pt;">
    <?php include 'Layouts/footerpage.php' ?>
  </div>
  <!-- Footer End -->
  <!-- chatbox Start -->
  <?php include 'Layouts/chatboxpage.php' ?>
  <!-- chatbox End -->

  <!-- Modal đăng nhập Start -->
  <?php include 'Layouts/FormLogin.php' ?>
  <!-- Modal đăng nhập End -->

  <!-- Modal đăng kí Start-->

  <?php include 'Layouts/FormRegister.php' ?>

  <!-- Modal đăng kí End-->

  <script type="text/javascript" src="./Js/Js.js"></script>
</body>

</html>