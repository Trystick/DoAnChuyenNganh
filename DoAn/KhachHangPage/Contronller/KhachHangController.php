<?php
include_once '../Model/KhachHangModel.php';


class KhachHangController
{
    public function insertKhachHang($khachhang)
    {
        $khachhang->insertKhachHang();
    }
    public function updateKhachHang_MatKhau($khachhang)
    {
        return $khachhang->updateKhachHang_MatKhau();
    }
    public function deleteKhachHang($khachhang)
    {
        $khachhang->deletekKhachHang();
    }


    public function getKhachHang($khachhang)
    {
        return $khachhang->getKhachHang();
    }
    public function getAllKhachHang($khachhang)
    {
        return $khachhang->getAllKhachHang();
    }

    public function getkiemTraDangNhap($khachhang)
    {
        return $khachhang->getkiemTraDangNhap();
    }

    public function getkiemTraDangKy($khachhang)
    {
        return $khachhang->getkiemTraDangKy();
    }
}



if (isset($_POST["user_action"])) {
    session_start();
    $user_action = $_POST["user_action"];
    $khController = new KhachHangController();
    switch ($user_action) {
        case "user_create":
            $txt_username = $_POST["userregister_txt_username"];
            $txt_password = ($_POST["userregister_txt_password"]);
            $txt_repassword = $_POST["userregister_txt_repassword"];

            $kh = new KhachHangModel("", $txt_username, "", "", "");
            if ($txt_password != $txt_repassword) {
?>
                <script>
                    alert("Mật Khẩu không giống nhau xin mời nhập lại !");
                    window.location.href = "../View/index.php";
                </script>
            <?php
            } else if ($khController->getkiemTraDangKy($kh) != NULL) {
            ?>
                <script>
                    alert("Tên Tài khoản đã tồn tại!");
                    window.location.href = "../View/index.php";
                </script>
            <?php
            } else {
                $txt_password = md5($txt_password);
                $user_new = new KhachHangModel("", $txt_username, $txt_password, "", "");
                $khController->insertKhachHang($user_new);
            ?>
                <script>
                    alert("Đăng ký thành công");
                    window.location.href = "../View/index.php";
                </script>
            <?php
            }
            break;
        case "user_login":
            $txt_username = $_POST["userlogin_txt_username"];
            $txt_password = md5($_POST["userlogin_txt_password"]);

            $kh = new KhachHangModel("", $txt_username, $txt_password, "", "");
            $data = $khController->getkiemTraDangNhap($kh);
            if ($data == NULL) {
            ?>
                <script>
                    alert("Thông tin không hợp lệ xin vui lòng nhập lại !");
                    window.location.href = "../View/index.php";
                </script>
            <?php
            } else if ($data[0]["TrangThai"] == 0) {
            ?>
                <script>
                    alert("Tài khoản của bạn đã bị khóa xin vui lòng liên hệ Admin để mở khóa.");
                    window.location.href = "../View/index.php";
                </script>
            <?php
            } else {
                $_SESSION["user"] = $txt_username;
                $_SESSION["ID_TK"] = $data[0]["ID"];
            ?>
                <script>
                    alert("Đăng nhập thành công .");
                    window.location.href = "../View/index.php";
                </script>
            <?php
            }
            break;

        case "user_logout":
            header("location: ../View/index.php");
            unset($_SESSION["user"]);
            unset($_SESSION["ID_TK"]);
            break;

        case "Change_PassWord":
            $password_old = md5($_POST["password_old"]);
            $password_new = md5($_POST["password_new"]);
            $password_new_repeat = md5($_POST["password_new_repeat"]);
            if ($password_new == "" || $password_new_repeat == "" || $password_old == "") {
            ?>
                <script>
                    alert("Không được để trống !!!")
                </script>
            <?php
                return;
            }
            if ($password_new != $password_new_repeat) {
            ?>
                <script>
                    alert("Mật khẩu nhập lại sai !")
                </script>
            <?php
                return;
            }
            if ($password_new == $password_old) {
            ?>
                <script>
                    alert("Mật khẩu mới phải khác mật khẩu cũ !")
                </script>
            <?php
                return;
            }
            $IDTK = $_SESSION["ID_TK"];
            $khController = new KhachHangController();
            $kh = new KhachHangModel($IDTK, "", "", "", "");
            $data = $khController->getKhachHang($kh);

            if ($data[0]["MatKhau"] != $password_old) {
            ?>
                <script>
                    alert("Mật khẩu cũ không đúng");
                </script>
            <?php
                die();
            }

            $khController = new KhachHangController();
            $kh = new KhachHangModel($IDTK, "", $password_new, "", "");
            $updatePassWord = $khController->updateKhachHang_MatKhau($kh);
            ?>
            <script>
                alert("Đổi mật khẩu thành công");
                window.location.href = "../View/index.php";
            </script>
<?php


            break;
        default:
            header("location: ../View/index.php");
            break;
    }
}
