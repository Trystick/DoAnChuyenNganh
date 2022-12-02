<div class="container-xxl text-navbar fixed-top">
    <div class="navbar navbar-expand-lg top-green">
        <p class="p-title "> Xin Chào Bạn <i class="fas fa-user-tie fa-fw"></i> <?php echo $_SESSION["user"]; ?></p>


        <div class="right-info">
            <a href="https://g.page/congnghesaigon?share" class="address-shop"><i class="fas fa-map-marker-alt fa-fw" aria-hidden="true"> &nbsp;</i>Địa chỉ Shop</a>
            <div class="white-space"></div>
            <a href="#" class="time"><i class="fa fa-clock-o" aria-hidden="true">&nbsp; </i>8:00 - 21:00</a>
            <div class="white-space"></div>
            <i class="fa fa-phone phone" aria-hidden="true">&nbsp; </i>0933972541

        </div>

        <div class="sign-in-out" style="margin-top: 10pt;margin-left: 10pt;">
            <form action="../Contronller/KhachHangController.php" method="POST" enctype="multipart/form-data">
                <button type="submit" class="btn btn-danger " name="user_action" value="user_logout">
                    <p class="fas fa-sign-out-alt fa-fw"></p> Đăng Xuất
                </button>
            </form>
        </div>
        <div class="sign-in-out" style="margin-top: 10pt;margin-left: 10pt;">
            <form action="./DoiMatKhau.php" >
                <button type="submit" class="btn btn-primary">
                    <p class="fas fa-key fa-fw"></p>PassWord
                </button>
            </form>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-product">
        <a class="navbar-brand" href="#">
            <img src="./images/logo2.jfif" alt="logo" id="logo">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">TRANG CHỦ <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="GioiThieu.php">GIỚI THIỆU</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="DonHang.php">ĐƠN HÀNG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="KhuyenMai.php">KHUYẾN MÃI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="LienHe.php">LIÊN HỆ</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-danger" href="GioHang.php">
                        <p class="fas fa-cart-plus"></p> GIỎ HÀNG
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-danger" href="../../AdminPage/View/Login.php" style="font-weight: bold;">
                        <p class="fas fa-tools fa-fw"></p> ADMIN
                    </a>
                </li>
            </ul>
            <form action="./TimKiem.php" method="POST" class="form-inline my-2 my-lg-0 form-search" >
                <i class="fa fa-search icon-search" aria-hidden="true"></i>
                <input class="form-control mr-sm-4 inp-search" type="search" id="search" placeholder="&emsp;Tìm kiếm sản phẩm"  name="text_search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="search">Tìm kiếm</button>
            </form>
        </div>
    </nav>
    <div class="auto-text-run container-xxl">
        <marquee scrollamount="12">
            << Liên hệ 0933972541 (Zalo) để nhận đặt hàng << </marquee>
    </div>
</div>