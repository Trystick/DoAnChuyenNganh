<?php
session_start();

include_once '../Contronller/HoaDonController.php';
include_once '../Model/HoaDonModel.php';

include_once '../Contronller/CTHoaDonController.php';
include_once '../Model/CTHoaDonModel.php';
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
  <br>



  <div class="col-sm-12 text-center text-success div-tintuc">
    <h2><b class="p-2 border-bottom ">ĐƠN HÀNG - CỦA BẠN</b></h2>
    <p class="text-center"></p>
  </div>

  <div class="container" style="background: white;margin-top: 30pt;">
    <div class="Tieu_de" style="margin-top: 10px;">
      <div>
        Đơn hàng hiện có
      </div>
    </div>

    <h3>Thông tin đơn hàng</h3>
    <table class="table table-striped">
      <thead>
        <td>STT</td>
        <td>Tên người nhận</td>
        <td>Địa chỉ</td>
        <td>SĐT</td>
        <td>Tổng tiền</td>
        <td>Ngày mua</td>
        <td>Ghi chú</td>
        <td>Trạng thái</td>
      </thead>
      <?php
      if (!isset($_SESSION["ID_TK"])) { ?>
        <td colspan="8" style="text-align: center;font-weight: bold;">Vui Lòng Đăng Nhập Để Đặt Hàng !!!</td>

        <?php
      } else {
        $ID_TK = $_SESSION["ID_TK"];
        $hdController = new HoaDonController();
        $hd = new HoaDonModel("", $ID_TK, "", "", "", "", "", "", "");
        $data = $hdController->getHoaDon_TrangThai($hd);
        if ($data == NULL) { ?>
          <tr>
            <td colspan="8" style="text-align: center;font-weight: bold;">Chưa có đơn hàng !!!</td>
          </tr>
          <?php
        } else {
          $dem = 0;
          foreach ($data as $value) {
            $dem++;
          ?>
            <tr>
              <td><?php echo $dem ?></td>
              <td><?php echo $value["TenKH"] ?></td>
              <td><?php echo $value["DiaChi"] ?></td>
              <td><?php echo $value["SDT"] ?></td>
              <td><?php echo number_format($value["TongTien"]) ?><sup>vnđ</sup></td>
              <td><?php echo $value["NgayMua"] ?></td>
              <td><?php echo $value["GhiChu"] ?></td>
              <td><?php echo $value["TenTT"] ?></td>
              <td><a style="width: 70pt;height: auto;padding: 10pt;font-size: large;" class="btn btn-info" href="./ChiTietDonHang.php?IDHoaDon=<?php echo $value["ID"] ?>">Chi tiết </a></td>
              <td><a class="btn btn-danger" href="?HuyHoaDon_ID=<?php echo $value["ID"] ?>">Hủy đơn hàng</a></td>
            </tr>
      <?php
          }
        }
      }      ?>
    </table>
  </div>
  <?php
  if (isset($_GET["HuyHoaDon_ID"])) {
    //Cập nhật trạng thái của Hóa Đơn từ 1(Đang giao hàng) hoặc 2(Đã nhận hàng)   Thành  3(Đã hủy hàng).
    $ID_HoaDon_Huy = $_GET["HuyHoaDon_ID"];
    $hdController = new HoaDonController();
    $hd = new HoaDonModel($ID_HoaDon_Huy, "", "", "", "", "", "", "", "");
    $update_HoaDon_TrangThai = $hdController->updateHoaDon_TrangThai($hd);

    //Tương tự ta cũng Cập nhật trạng thái của Chi Tiết Hóa Đơn từ 1(Đang giao hàng) hoặc 2(Đã nhận hàng)   Thành  3(Đã hủy hàng).

    $CTHDController = new CTHoaDonController();
    $cthd = new CTHoaDonModel("", $ID_HoaDon_Huy,  "", "", "", "", "", "", "");
    $update_ChiTietHoaDon_TrangThai = $CTHDController->updateChiTietHoaDon_TrangThai($cthd);
  ?>
    <script>
      window.location.href = "./DonHang.php";
    </script>
  <?php
  }
  ?>


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