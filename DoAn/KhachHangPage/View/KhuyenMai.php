<?php
session_start();

function alert($msg)
{
  echo "<script type='text/javascript'>alert('$msg');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'Layouts/headerpage.php' ?>
</head>

<body>
  <!-- Menu-Start -->
  <?php if (!isset($_SESSION["ID_TK"])) {

    include 'Layouts/menupage.php';
  } else {
    include 'Layouts/menupageLogout.php';
  }
  ?>
  <!-- Menu-End -->


  <div class="col-sm-12 text-center p-4 text-success text-km">
    <h2><b class="p-2">KHUYẾN MÃI</b></h2><br>
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
    <div class="card-deck-blog-2 mt-5">
      <div class="card" style="width:380px;">
        <div class="card-body">
          <img class="card-recomment" src="./Images/tri-an-khach-hang-TXC-600x450.jpg" alt="Card image" style="width:100%; height: 230px;">
        </div>
        <div class="card-footer text-center">
          <a href="#">
            <h3 class="text-warning">[ Tri ân khách hàng ] Tặng ngay dưa xanh Đài Loan – Giá 69k</h3>
          </a>
          <a href="#">
            <p>Chương trình “Tri ân khách hàng” trong tháng 3 này với nhiều qua tặng hấp ...</p>
          </a>
        </div>
      </div>
    </div>
  </div>

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

</html>