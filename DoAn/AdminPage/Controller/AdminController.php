<?php
include_once '../Model/AdminModel.php';


class AdminController
{
    public function getkiemTraDangNhap($admin)
    {
        return $admin->getkiemTraDangNhap();
    }
}


if (isset($_POST["submit"])) {
    $taikhoan = $_POST["taiKhoan"];
    $password = md5($_POST["password"]);
    $adcontroller = new AdminController();
    $ad = new AdminModel("", $taikhoan, $password);
    $kiemtradangnhap = $adcontroller->getkiemTraDangNhap($ad);
    if ($kiemtradangnhap == null) {
?>
        <script>
            alert("Sai tài khoản hoặc mật khẩu");
            window.location.href = "../View/Login.php";
        </script>
    <?php
    } else {
        $_SESSION["ID_TK"] = $row[0];
    ?>
        <script>
            alert("Đăng nhập thành công");
            window.location.href = "../View/QuanLyKhachHang.php";
        </script>
<?php
    }
}
?>



