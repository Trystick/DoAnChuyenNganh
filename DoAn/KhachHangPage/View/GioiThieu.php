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
  <!-- Menu-End --><br>


  <div class="backgroundheader">
    <img class="img-company" src="./Images/company01.jpg" alt="company">
  </div>

  <div class="col-sm-12 text-center p-4 mt-4 text-success">
    <h2><b class="p-2 border-bottom">VỀ CHÚNG TÔI</b></h2><br>
  </div>

  <div class="col-sm-12 text-center p-4 text-success">
    <h2><b class="p-2">SHOP TRÁI CÂY NHẬP KHẨU – TRÁI CÂY NỘI ĐỊA</b></h2><br>
  </div>

  <div class="container">
    <div class="formation">
      <i class="fa fa-hand-o-right" aria-hidden="true"></i> Hãy đến với <span class="text-warning">#TráiCâyTươiMát!</span>
      <p>Chúng tôi chuyên cung cấp các loại trái cây tươi nhập khẩu trực tiếp từ Châu Âu, Nam Phi, Mỹ, Pháp, Hàn Quốc, Nhật Bản, Úc và cùng với nhiều loại Trái cây Miền Tây khác nhau!</p>
      <br>
      <p>Hiểu được thị hiếu và nhu cần đang càng ngày phát triển của trái cây nhập, <span class="text-warning" style="text-decoration: underline;">#TráiCâyTươiMát!</span> không ngừng nhập những loại trái cây có chất lượng mẫu mã đẹp để khách hàng là quà tặng với người thân, bạn bèn và đồng nghiệp mà còn cải tiến dịch vụ bổ sung các sản phẩm như giỏ quà trái cây bánh kẹo, hộp quà trái cây bánh kẹo để giúp khách hàng có nhiều sự lựa chọn hơn.</p><br>
      <p>Các loại trái cây nhập khẩu là những loại trái cây có giá trị dinh dưỡng cao, được chọn lọc kỹ lưỡng để đảm bảo sức khỏe người sử dụng.</p>
      <p>Cam kết 100% trái cây tươi ngon, chất lượng với giá tốt nhất thị trường!</p>
    </div>
    <div class="text-gift">
      <p><i class="fa fa-bell icon-gift" aria-hidden="true"></i> Giỏ trái cây, hộp, khay, bó hoa trái cây ý nghĩa tặng người thân thương:</p>
      <p><i class="fa fa-gift icon-gift" aria-hidden="true"></i> Quà tặng khách hàng</p>
      <p><i class="fa fa-gift icon-gift" aria-hidden="true"></i> Quà sinh nhật</p>
      <p><i class="fa fa-gift icon-gift" aria-hidden="true"></i> Quà thăm hỏi</p>
      <p><i class="fa fa-gift icon-gift" aria-hidden="true"></i> Quà ra mắt</p>
      <p><i class="fa fa-gift icon-gift" aria-hidden="true"></i> Quà cảm ơn</p>
      <p><i class="fa fa-gift icon-gift" aria-hidden="true"></i> Quà dạm ngõ</p>
      <p><i class="fa fa-gift icon-gift" aria-hidden="true"></i> Quà 20/10</p>
      <p><i class="fa fa-gift icon-gift" aria-hidden="true"></i> Quà 20/11</p>
      <p><i class="fa fa-check-square icon-gift" aria-hidden="true"></i> Đám giỗ</p>
      <p><i class="fa fa-check-square icon-gift" aria-hidden="true"></i> Đám tang</p>
      <p><i class="fa fa-check-square icon-gift" aria-hidden="true"></i> Cúng dường</p>
    </div>

    <p>==============<i class="fa fa-thumbs-o-up icon-good" aria-hidden="true"></i><i class="fa fa-thumbs-o-up icon-good" aria-hidden="true"></i><i class="fa fa-thumbs-o-up icon-good" aria-hidden="true"></i>==============</p>
    <p><i class="fa fa-home" aria-hidden="true"></i> Liên hệ mua hàng trực tiếp & Online tại:</p>
    <h6 class="text-success">TRÁI CÂY TƯƠI MÁT SHOP</h6>
    <p><b>Địa chỉ: </b> 271 Lê Văn Lương, Quận 7, Thành phố Hồ Chí Minh</p>
    <p><b>Liên hệ: </b> 0933972541 - 0907280106 (Zalo)</p>
    <p><b>Website: </b> www.traicaytuoimat.vn</p>
    <i class="fa fa-heart icon-tranfer" aria-hidden="true"></i><i class="fa fa-heart icon-tranfer" aria-hidden="true"></i><i class="fa fa-motorcycle icon-tranfer" aria-hidden="true"></i> Miễn phí giao hàng trong nội thành HCM với đơn hàng từ 500.000đ.
  </div><br><br>

  <div class="container">
    <img class="img-import" src="./Images/Export_Import.jpg" alt="">
  </div>


  <div class="col-sm-12 text-center p-4 text-success">
    <h2><b class="p-2 border-bottom">MÓN QUÀ SỨC KHỎE</b></h2>
  </div>
  <div class="container">
    <h6 class="text-center">Shop Trái Cây Xanh là cửa hàng trái cây nhập khẩu lớn tại Miền Nam, chúng tôi cung cấp các loại trái cây, bánh keo, hạt khô, nước uống nhập khẩu và các loại giỏ quà, giỏ bánh kẹo nhập khẩu từ các nước Nhật Bản, Mỹ, Hàn Quốc, Úc, Pháp, Ấn Độ, New Zealand, Nam Phi, Canada, Tây Ban Nha,… Bạn đang cần lựa chọn một món quà dinh dưỡng phù hợp để tặng cho gia đình hoặc người thân hãy liên hệ chúng tôi ngay hôm nay.</h6>
  </div><br>

  <div class="col-sm-12 text-center p-4 text-success">
    <h2><b class="p-2 border-bottom">LOẠI TRÁI CÂY</b></h2>
  </div>

  <div class="container-fluid">
    <img src="./Images/global.jpg" alt="global" class="img-global">
  </div><br>

  <h5 class="text-center text-success">Các loại trái cây xuất xứ từ nhiều nước trên thế giới</h5>
  <hr>
  <br>
  <div class="col-sm-12 text-center p-4 text-success">
    <h2><b class="p-2 border-bottom">THÔNG TIN LIÊN HỆ SHOP TCTM</b></h2>
  </div>
  <p class="text-center"><b>Add: </b>271 Lê Văn Lương, Quận 7, Thành phố Hồ Chí Minh</p>
  <p class="text-center"><b>Call: </b>0933972541 - 0907280106 (Zalo) | <b>Email: </b> traicaytuoimat@gmail.com</p>
  <br>
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