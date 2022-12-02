<div id="user-modal-sign-up" class="modal fade modao-lg" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Khách hàng đăng ký</h5>
                <?php
                if (isset($_SESSION["thongbaoDK"])) {
                    alert($_SESSION["thongbaoDK"]);
                    echo ("<b style='color:red;margin:0 auto'>" . '' . '' . $_SESSION['thongbaoDK'] . '' . "</b>");
                    unset($_SESSION["thongbaoDK"]);
                }
                ?>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body - chứa form dữ liệu -->
            <div class="modal-body">
                <form action="../Contronller/KhachHangController.php" method="POST" enctype="multipart/form-data">
                    <!-- form thiết kế như form bình thường, theo grid model -->
                   
                    
                    <div class="row form-group">
                        <label class="col-sm-4 col-form-label">Tên đăng ký</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="userregister_txt_username" name="userregister_txt_username">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-sm-4 col-form-label">Mật khẩu</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="userregister_txt_password" name="userregister_txt_password">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-sm-4 col-form-label">Xác Nhận Mật khẩu</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="userregister_txt_repassword" name="userregister_txt_repassword">
                        </div>
                    </div>

                   

                    <div class="modal-footer">
                        <button type="submit" name="user_action" class="btn btn-success submit-login" value="user_create">
                            <p class="fa fa-check-circle-o"> Đăng kí &ensp;</p>
                        </button>
                        <button type="reset" class="btn btn-warning submit-login" id="btn-sign-up">
                            <p class="fa fa-refresh"> Làm mới &ensp;</p>

                        </button>
                        <button type="button" id="btn-modal-close" class="btn btn-secondary submit-login" data-dismiss="modal">
                            <p class="fa fa-times-circle"> Close &ensp;</p>

                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>