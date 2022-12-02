<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once './Layouts/headerpage.php';

    include_once '../Controller/AdminController.php';
    include_once '../Model/AdminModel.php';
    ?>
</head>

<body>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"> <img src="./Images/admin.png" alt=""></div>
            <form action="../Controller/AdminController.php" method="post" enctype="multipart/form-data">
                <h2 class="text-center">ĐĂNG NHẬP ADMIN</h2>
                <div class="form-group"><input class="form-control" type="text" name="taiKhoan" placeholder="Tài khoản"></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Mật khẩu"></div>
                <div class="form-group"><button class="btn btn-success btn-block" type="submit" name="submit">Đăng nhập</button></div>
            </form>
        </div>
    </div>
</body>



</html>
