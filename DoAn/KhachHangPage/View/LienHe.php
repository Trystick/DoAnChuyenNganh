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



  <div class="sub-banner">
    <img class="img-sub-banner" src="./Images/sub_banner.png" alt="sub-banner">
  </div>

  <div class="col-sm-12 text-center p-4 text-success">
    <h2><b class="p-2">HÌNH THỨC ĐẶT HÀNG</b></h2><br>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div class="row">
          <div class="col-sm-4">
            <img src="./Images/PHONE2.png" alt="phone2">
          </div>
          <div class="col-sm-8">
            Gọi trực tiếp & nhắn tin: <br>
            0933.972.541(Zalo/Call)<br>
            0907.280.106(Zalo/Call)
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="row">
          <div class="col-sm-4">
            <img src="./Images/phone-call.png" alt="phone call">
          </div>
          <div class="col-sm-8">
            * Đặt hàng trên website <br>
            <a href="#"> <b>traicaytuoimat.vn</b></a><br>
            * Đặt hàng trên: GRAB-NOW
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="row">
          <div class="col-sm-4">
            <img src="./Images/ICON6.png" alt="ICON6">
          </div>
          <div class="col-sm-8">
            Đặt hàng tại Fanpage <br>
            <a href="#"> <b>/traicaytuoimat.vn</b></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid jumbotron-fluid bg-light mt-5 container-chinhsach">
    <div class="row">
      <div class="col-sm-4">
        <div class="col">
          <div class="row border border-dark bg-success pl-5 pt-3 cs-giaohang">CHÍNH SÁCH GIAO HÀNG</div>
          <div class="row border border-dark pl-5 pt-3 cs-thanhtoan">CHÍNH SÁCH THANH TOÁN</div>
          <div class="row border border-dark pl-5 pt-3 cs-doitra">CHÍNH SÁCH ĐỔI TRẢ</div>
          <div class="row border border-dark pl-5 pt-3 cs-uudai">CHÍNH SÁCH ƯU ĐÃI</div>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="giaohang">
          <p>Shop Trái Cây Xanh hiện sử dụng các hình thức giao hàng: Giao hàng Ahamove, Grab, Xe khách.</p>
          <p>Giao hàng nhanh chóng nội thành TP.HCM <br>
            Đảm bảo chất lượng sản phẩm không bị hư hỏng trong quá trình vận chuyển <br>
            Bảo đảm uy tín, tiết kiệm thời gian
          </p>
          <p>Phí giao hàng:</p>
          <p>Địa điểm của bạn Phí giao hàng Thời gian giao hàng sẽ được báo khi khách hàng chốt đơn với giá thành hợp lý. <br>
            Chúng tôi hỗ trợ FREE SHIP với các đơn hàng trên 500k nội thành TP.HCM <br>
          </p>
          <p> Trân trọng.</p>
        </div>
        <div class="thanhtoan" style="display: none;">
          <p>Sau khi chọn sản phẩm, bạn chọn hình thức mua hàng:</p>
          <p>Thanh toán tiền khi nhận hàng (COD): Khi nào bên vận chuyển tới giao hàng, lúc đó bạn thanh toán tiền cho bên vận chuyển <br>
            Thanh toán qua ngân hàng (Chuyển khoản): Bạn chuyển khoản sau đó chúng tôi sẽ giao hàng cho bạn (sau khi chuyển khoản hãy liên hệ ngay với chúng tôi theo số điện thoại 096.442.8039) <br>
            Thông tin chuyển khoản:
          </p>
          <p>Chủ tài khoản: <b>LƯƠNG THANH CÔNG</b></p>
          <p>Số tài khoản: 04083783201 – TPBank <br>
            Nội dung chuyển khoản: Tên khách hàng + Số điện thoại đặt hàng <br>
          </p>
          <p>(Ví dụ: Hoang Nhan + 0123456789 )</p>
          <p> Mọi chi tiết thắc mắc quý khách vui lòng liên hệ với traicayxanh.vn <br>
            Hotline: 096.442.8039 (Gọi để được tư vấn và đặt hàng) <br>
            Facebook: Trái Cây Xanh Tươi Mát</p>
        </div>
        <div class="doitra" style="display: none;">
          <p>** Đổi trả sản phẩm trong vòng 24h kể từ khi mua hàng. Quý khách vui lòng giữ lại hóa đơn và liên hệ với <br> Shop Trái Cây Xanh 096.442.8039 – 0397.009.824 (Zalo) để được hỗ trợ nhanh nhất.</p>
          <p>Chúng tôi xin lỗi vì những bất tiện của khách hàng đang gặp phải. Mọi ý kiến đóng góp sẽ giúp Shop phát triển hoàn thiện hơn./. <br>
          </p>

        </div>
        <div class="uudai" style="display: none;">
          <p><b>ƯU ĐÃI ĐẶC BIỆT DÀNH CHO KHÁCH HÀNG THÂN THIẾT</b></p>
          <p>*Thông tin liên hệ : <br>
            – SĐT: 096.442.8039 <br>
            – Webstie: traicaytuoimat.vn <br>
            – Email: traicaysach.vungmien@gmail.com <br>
            – Địa chỉ: 99 Thoại Ngọc Hầu, P.Hoà Thạnh, Q.Tân Phú, TP.HCM <br>
          </p>

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
  $(".cs-giaohang").on("click", function() {
    $(".cs-giaohang").addClass("bg-success");
    $(".cs-thanhtoan").removeClass("bg-success");
    $(".cs-doitra").removeClass("bg-success");
    $(".cs-uudai").removeClass("bg-success");
    btnGiaoHang();
  })


  $(".cs-thanhtoan").on("click", function() {
    $(".cs-giaohang").removeClass("bg-success");
    $(".cs-thanhtoan").addClass("bg-success");
    $(".cs-doitra").removeClass("bg-success");
    $(".cs-uudai").removeClass("bg-success");
    btnThanhToan();
  })

  $(".cs-doitra").on("click", function() {
    $(".cs-giaohang").removeClass("bg-success");
    $(".cs-thanhtoan").removeClass("bg-success");
    $(".cs-doitra").addClass("bg-success");
    $(".cs-uudai").removeClass("bg-success");
    btnDoiTra();
  })

  $(".cs-uudai").on("click", function() {
    $(".cs-giaohang").removeClass("bg-success");
    $(".cs-thanhtoan").removeClass("bg-success");
    $(".cs-doitra").removeClass("bg-success");
    $(".cs-uudai").addClass("bg-success");
    btnUudai();
  })

  function btnGiaoHang() {
    $(".giaohang").show();
    $(".thanhtoan").hide();
    $(".doitra").hide();
    $(".uudai").hide();
  }

  function btnThanhToan() {
    $(".giaohang").hide();
    $(".thanhtoan").show();
    $(".doitra").hide();
    $(".uudai").hide();
  }

  function btnDoiTra() {
    $(".giaohang").hide();
    $(".thanhtoan").hide();
    $(".doitra").show();
    $(".uudai").hide();
  }

  function btnUudai() {
    $(".giaohang").hide();
    $(".thanhtoan").hide();
    $(".doitra").hide();
    $(".uudai").show();
  }
</script>

</html>