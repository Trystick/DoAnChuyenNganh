<?php
session_start();

include_once '../Contronller/LoaisanphamController.php';
include_once '../Model/LoaisanphamModel.php';

include_once '../Contronller/SanphamController.php';
include_once '../Model/SanphamModel.php';
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


  <!-- slide-show -->
  <div class="slide-content">
    <div class="container-xxl">
      <div id="myCarousel" class="carousel slide">

        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li class="item1 active">
          </li>
          <li class="item2"></li>
          <li class="item3"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./Images/buoi.jpg" alt="dau" width="100%" height="580">
            <div class="carousel-caption text-danger">
              <h3>Bưởi xanh</h3>
              <p>Nhiều muối, dày cơm và thơm quả</p>
              <a href="#"> <button class="btn-slide">Xem Chi Tiết</button></a>
            </div>
          </div>
          <div class="carousel-item">
            <img src="./Images/Cam-vàng-Navel-Uc.jpg" alt="cam" width="100%" height="580">
            <div class="carousel-caption text-dark">
              <h3>Cam</h3>
              <p>Vị cam sánh mọng cùng vị ngọt tự nhiên</p>
              <a href="#"> <button class="btn-slide">Xem Chi Tiết</button></a>
            </div>
          </div>
          <div class="carousel-item">
            <img src="./Images/Nho_mẫu_đơn_xanh_Shine_Muscat.jpg" alt="nho" width="100%" height="580">
            <div class="carousel-caption text-warning">
              <h3>Nho</h3>
              <p>Nho ngọt lịm hài hòa hương vị thiên nhiên</p>
              <a href="#"> <button class="btn-slide">Xem Chi Tiết</button></a>
            </div>
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#myCarousel">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
    </div>
  </div>
  <br>
  <!-- Card-content -->
  <div class="container">
    <div class="recommend-fruit">
      <div class="card-deck">
        <div class="card" style="width:200px;">
          <img class="card-recomment" src="./Images/cherry-nhập-khẩu.jpg" alt="Card image" style="width:100%">
          <div class="card-body">
            <h4 class="card-title">Loại trái cây nhập khẩu chứa nhiều dưỡng chất, được nhập từ các nước như Úc, Mỹ,
              Canada, New Zealand</h4>
            <p class="card-text">$600 <strike>$750</strike></p>
          </div>
          <div class="card-footer text-center">
            <a href="#">
              <h4 class="text-warning">Cherry nhập khẩu</h4>
            </a>
          </div>
        </div>

        <div class="card" style="width:200px;">
          <img class="card-recomment" src="./Images/cam-nhập-khẩu.jpg" alt="Card image" style="width:100%">
          <div class="card-body">
            <h4 class="card-title">Được nhiều khách hàng lựa chọn bởi mùi vị và chất lượng, phù hợp là món quà ý nghĩa
            </h4>
            <p class="card-text">$600 <strike>$750</strike></p>
          </div>
          <div class="card-footer text-center">
            <a href="#">
              <h4 class="text-warning">Cam nhập khẩu</h4>
            </a>
          </div>
        </div>

        <div class="card" style="width:100%;">
          <img class="card-recomment" src="./Images/nho-xanh-autum.png" alt="Card image" style="width:100%; height: 348px;">
          <div class="card-body">
            <h4 class="card-title">Chùm nho to, trái to ngọt, nhiều nước, ngọt và giòn, cuốn tươi xanh – 1 chùm có thể
              lên đến 1kg</h4>
            <p class="card-text">$600 <strike>$750</strike></p>
          </div>
          <div class="card-footer text-center">
            <a href="#">
              <h4 class="text-warning">Nho nhập khẩu</h4>
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Trái cây -->
  <?php

  $LoaiController = new LoaisanphamController();
  $loai = new LoaisanphamModel("", "", "");
  $data = $LoaiController->getAllLoaiSanPham($loai);
  ?>

  <?php foreach ($data as  $value) { ?>

    <div class="container">
      <div class="col-sm-12 text-center p-4 mt-4 text-success">
        <h2><b class="p-2 border-bottom"> <?php echo $value["Ten"]  ?> </b></h2>

      </div>
    </div>

    <div class="row">
      <?php
      $sanphamController = new SanphamController();
      $sanpham = new SanphamModel("", "", "", "", "", "", "", "");
      $dataSanPham = $sanphamController->getAllSanPham($sanpham);
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



  <br>

  <hr>
  <div class="container jumbotron bg-info">
    <div class="choice-product">
      <div class="row">
        <div class="col-sm-6">
          <div class="youtube-product">
            <iframe width="420" height="345" src="https://www.youtube.com/embed/62cOxrMXcQE">
            </iframe>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="more">
            <h4>Các phương pháp lựa chọn trái cây hiệu quả</h4>
            <p>Đăng ký nhận thêm những tin tức và phương pháp khác</p>
            <h3>Qua Email của bạn: </h3>
            <form class="form-inline my-2 my-lg-0 form-check-input form-check-email">
              <input class="form-control mr-sm-4 inp-search" type="email" id="dang-ky" placeholder="&emsp; &emsp;Đăng ký">
              <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Đăng ký</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Blog tin tức -->
  <div class="col-sm-12 text-center p-4 mt-4 text-success">
    <h2><b class="p-2 border-bottom">BLOGS/TIN TỨC</b></h2>
  </div>
  <div class="container-fluid jumbotron fluid div-blog">
    <div class="card-deck card-deck-blog">
      <div class="card" style="width:200px;">
        <div class="card-body">
          <img class="card-recomment" src="./Images/Ma-so-tren-trai-cay.jpg" alt="Card image" style="width:100%; height: 230px;">
        </div>
        <div class="card-footer text-center">
          <a href="#">
            <h3 class="text-warning">Hiểu những mã số trên trái cây sẽ cứu cuộc đời bạn</h3>
          </a>
          <a href="#">
            <p>Khi mua trái cây các chị em có chú ý đến mã số trên tem không? Những con số đó ...</p>
          </a>
        </div>
      </div>

      <div class="card" style="width:200px;">
        <div class="card-body">
          <img class="card-recomment" src="./Images/Tai-day-co-ban-gio-trai-cay-mang-di.jpg" alt="Card image" style="width:100%; height: 230px;">
        </div>
        <div class="card-footer text-center">
          <a href="#">
            <h3 class="text-warning">Cửa hàng Trái Cây Nhập khẩu gần đây – Giỏ quà tặng giá rẻ</h3>
          </a>
          <a href="#">
            <p>Bạn đang tìm kiếm cửa hàng trái cây nhập khẩu gần đây, để chính tay lựa chọn những loại trái ...</p>
          </a>
        </div>
      </div>

      <div class="card" style="width:200px;">
        <div class="card-body">
          <img class="card-recomment" src="./Images/Tang-Voucher-thang-10.png" alt="Card image" style="width:100%; height: 230px;">
        </div>
        <div class="card-footer text-center">
          <a href="#">
            <h3 class="text-warning">Mua hàng nhận ngay Voucher chỉ có tại Trái Cây Xanh</h3>
          </a>
          <a href="#">
            <p>Trái cây nhập khẩu cùng với thực phẩm nhập khẩu khác không còn xa lạ với người tiêu...</p>
          </a>
        </div>
      </div>

    </div>
  </div>
  <hr>
  <!-- Comment người mua -->
  <div class="container-fluid comment-customer">
    <div class="row">
      <div class="col-sm-6">
        <div class="row">
          <div class="col-sm-6 mt-3">
            <img class="img-comment" src="./Images/500ae.jpg" alt="500ae" width="100%" height="50%">
          </div>
          <div class="col-sm-6 mt-3">
            <h3>500 anh em</h3>
            <p>Trái cây rất tươi ngon, chúng tôi rất tin tưởng khi mua trái cây Trái Cây Xanh cho gia đình và người
              thân. Cảm ơn Shop rất nhiều!</p>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="row">
          <div class="col-sm-6 mt-3">
            <img class="img-comment" src="./Images/anhchanggoicam.jpg" alt="500ae" width="100%" height="30%">
          </div>
          <div class="col-sm-6 mt-3">
            <h3>Anh chàng gợi cảm</h3>
            <p>Tôi thường mua trái cây với giỏ quà tặng của Shop làm quà tặng khách hàng.
              Bạn đã chọn được quà tặng chưa?</p>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <!-- Footer Start -->
  <?php include 'Layouts/footerpage.php' ?>
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


<script>
  $(document).ready(function() {
    // Activate Carousel
    $("#myCarousel").carousel();

    // Enable Carousel Indicators
    $(".item1").click(function() {
      $("#myCarousel").carousel(0);
    });
    $(".item2").click(function() {
      $("#myCarousel").carousel(1);
    });
    $(".item3").click(function() {
      $("#myCarousel").carousel(2);
    });

    // Enable Carousel Controls
    $(".carousel-control-prev").click(function() {
      $("#myCarousel").carousel("prev");
    });
    $(".carousel-control-next").click(function() {
      $("#myCarousel").carousel("next");
    });

    $("#btn-all").on("click", function() {
      onBtnSelectAll();
    });

    $("#btn-nho").on("click", function() {
      onBtnSelectNho();
    });

    $("#btn-tao").on("click", function() {
      onBtnSelectTao();
    });

    $("#btn-cam").on("click", function() {
      onBtnSelectCam();
    });

    $("#btn-cherry").on("click", function() {
      onBtnSelectCherry();
    });

  });

  function onBtnSelectAll() {
    $(".select-all").show();
    $(".select-nho").hide();
    $(".select-tao").hide();
    $(".select-cam").hide();
    $(".select-cherry").hide();
  }

  function onBtnSelectNho() {
    $(".select-all").hide();
    $(".select-nho").show();
    $(".select-tao").hide();
    $(".select-cam").hide();
    $(".select-cherry").hide();
  }

  function onBtnSelectTao() {
    $(".select-all").hide();
    $(".select-nho").hide();
    $(".select-tao").show();
    $(".select-cam").hide();
    $(".select-cherry").hide();
  }

  function onBtnSelectCam() {
    $(".select-all").hide();
    $(".select-nho").hide();
    $(".select-tao").hide();
    $(".select-cam").show();
    $(".select-cherry").hide();
  }

  function onBtnSelectCherry() {
    $(".select-all").hide();
    $(".select-nho").hide();
    $(".select-tao").hide();
    $(".select-cam").hide();
    $(".select-cherry").show();
  }
</script>

</html>