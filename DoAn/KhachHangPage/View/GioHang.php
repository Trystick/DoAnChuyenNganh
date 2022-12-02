<?php
session_start();

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

  <div class="container" style="background: white;margin-top: 130pt;">
    <div class="Tieu_de" style="margin-top: 10px;">
      <div>
        Giỏ hàng
      </div>
    </div>
    <h3> Thông tin giỏ hàng </h3>

    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Tên</th>
          <th scope="col">Xuất xứ</th>
          <th scope="col">Đơn giá/kg</th>
          <th scope="col">Số lượng</th>
          <th scope="col">Thành tiền</th>
          <th scope="col">Xóa</th>
        </tr>
      </thead>
      <tbody>

        <?php
        if (!isset($_SESSION["ID_TK"])) { ?>
          <th colspan="7" style="text-align: center;">Vui Lòng Đăng Nhập Để Đặt Hàng !!!</th>
          <?php
        } else {
          $ID_TK = $_SESSION["ID_TK"];
          //Kiểm tra xem Giỏ Hàng có Sản Phẩm nào khong ? Nếu rỗng thì sẽ thông báo ["Chưa có gì trong giỏ hàng !!!"] 
          //ngược lại thì hiển thị thông tin giỏ hàng.  
          $giohangController = new GioHangController();
          $gh = new GioHangModel("",  $ID_TK, "", "", "", "", "", "");
          $data = $giohangController->getGioHangID_TK($gh);
          if ($data == NULL) { ?>
            <tr>
              <th colspan="7" style="text-align: center;">Chưa có gì trong giỏ hàng !!!</th>
            </tr>
            <?php
          } else {
            //Xử lý nút Xóa sản phẩm ra khỏi giỏ hàng.
            if (isset($_GET['delete_id'])) {
              //Lấy dữ liệu của Giỏ Hàng cần Xóa bằng ID_giohang.
              $id_delete = $_GET['delete_id'];
              $gh_ID_delete = new GioHangModel($id_delete, "", "", "", "", "", "", "");
              $row_soluong_GioHang_delete = $giohangController->getGioHang_ID($gh_ID_delete);
              //Cập nhật lại số lượng của bảng sản phẩm .
              $spController = new SanphamController();
              $sp = new SanphamModel($row_soluong_GioHang_delete[0]["IDSanPham"],  "", "", "", "",  $row_soluong_GioHang_delete[0]["SoLuong"], "", "");
              $row_update_sanpham = $spController->updateSoLuongSanPham_SauKhiCong($sp);
              //Xóa dữ liệu khỏi bảng giỏ hàng .
              $giohangController->deleteGioHang($gh_ID_delete);
            ?>
              <script>
                window.location.href = './GioHang.php';
              </script>
            <?php
            }
            $dem = 0;
            $Tong = 0;

            foreach ($data as $value) {
              $dem++;

            ?>
              <tr>
                <th scope="data"><?php echo $dem ?></th>
                <td><?php echo $value["TenSanPham"] ?></td>
                <td><?php echo $value["XuatXu"] ?></td>
                <td><?php echo number_format($value["DonGia"]) ?><sup>vnđ</sup></td>
                <td><?php echo $value["SoLuong"] ?></td>
                <td><?php echo number_format($value["ThanhTien"]) ?><sup>vnđ</sup></td>
                <td><a href="?delete_id=<?php echo $value["ID"] ?>" class="btn btn-danger">Xóa</a></td>
              </tr>
            <?php
              $Tong += $value["ThanhTien"];
            } ?>
      <tfoot>
        <td colspan="5" style="text-align: right; border-right: 1px solid #333;">Tổng:</td>
        <td><?php echo number_format($Tong) ?> <sup>vnđ</sup></td>
        <td></td>
      </tfoot>
  <?php
          }
        }
  ?>


  </tbody>
    </table>

    </table>

    <style>
      input,
      textarea,
      select {
        min-width: 300px;
        width: 70%;
        background: #F7F7F7;
        border: 1px solid #D6D6D6;
        padding: 5px 10px;
      }
    </style>

    <hr class="hr_clear">


    <div style="margin-left: 2%;">
      <h3>Thông tin khách hàng</h3>
      <form action="../Contronller/GioHangController.php" method="POST" enctype="multipart/form-data" style="margin: auto;max-width: 50%;">
        <div class="item_donhang">
          <p>Họ và tên: <span>*</span></p><input type="text" name="ho_ten" required>
        </div>
        <div class="item_donhang">
          <p>Điện thoại: <span>*</span></p><input type="text" name="sdt" maxlength="10" required>
        </div>

        <div class="item_donhang">
          <p>Địa chỉ cụ thể: </p><input type="text" name="DiaChi">
        </div>
        <div class="item_donhang">
          <p style="align-self: flex-start;">Ghi chú: </p><textarea name="ghi_chu" id="" cols="30" rows="10" maxlength="200" placeholder="Tối đa 200 ký tự"></textarea>
        </div>
        <div class="item_donhang" hidden>
        <p>Tổng : <span>*</span></p><input type="text" name="Tong" value="<?php echo $Tong;?>">
        </div>
        <div style="margin-bottom: 10px; margin-left: 10%;">
          <button type="button" class="btn btn-info"><a href="./index.php" class="Tiep_tuc_mua_hang">Tiếp tục mua hàng</a></button>
          <button type="submit" class="btn btn-danger" name="action" value="Dat_Hang">Đặt hàng</button>
        </div>
      </form>
    </div>

  
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