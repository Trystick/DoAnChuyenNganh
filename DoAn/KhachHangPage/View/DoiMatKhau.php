<?php
session_start();

include_once '../Contronller/KhachHangController.php';
include_once '../Model/KhachHangModel.php';

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
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="text-align: center;">
        <h3 style="color: blue;text-align: center;">Đổi mật khẩu</h3>
        <form action="../Contronller/KhachHangController.php" method="POST" ">
          <div class="form-group" style="text-align: center;">
            <label for="user_signin">Mật khẩu cũ</label>
            <input type="password" class="form-control" id="password_old" name="password_old" style="width: 300pt; text-align: center;margin: 0 260pt;">
          </div>
          <div class="form-group">
            <label for="user_signin">Mật khẩu mới</label>
            <input type="password" class="form-control" id="password_new" name="password_new" style="width: 300pt; text-align: center;margin: 0 260pt;">
          </div>
          <div class="form-group">
            <label for="user_signin">Nhập lại mật khẩu mới</label>
            <input type="password" class="form-control" id="password_new_repeat" name="password_new_repeat" style="width: 300pt; text-align: center;margin: 0 260pt;">
          </div>
          <a href="./index.php" class="btn btn-secondary">
            Trở về
          </a>
          <button type="submit" class="btn btn-primary" id="submit_PassWord_Change" name="user_action" value="Change_PassWord">
            Thay đổi
          </button>
          <br><br>
          <div class="alert alert-danger hidden"></div>
        </form>
      </div>
    </div>
  </div>


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