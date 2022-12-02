function moForm() {
    document.getElementById("myForm").style.display = "block";
  }
  /*Hàm Đóng Form*/
  function dongForm() {
    document.getElementById("myForm").style.display = "none";
  }


  $(".sign-in").on("click",function(){
    onBtnModalSignIn();
  });

  $(".sign-up").on("click",function(){
    onBtnModalSignUp();
  });

  function onBtnModalSignIn(){
    $("#user-modal-sign-in").modal("show");
  }

  function onBtnModalSignUp(){
    $("#user-modal-sign-up").modal("show");
  }

  $("#btn-sign-up").on("click",function(){
    onBtnSignUp();
  });

  function onBtnSignUp(){
    var vObjectData = {
      tenDangKy: "",
      password:"",
      checkPassword: ""
    }
    getInfoSignUp(vObjectData);
    if(checkValidateSingUp(vObjectData)){
      alert("Bạn đã đăng kí thành công");
      $("#user-modal-sign-up").modal("hide");
    }
  }

  function getInfoSignUp(vObjectData){
    var vInputTenDangKy = $("#input-modal-name-sign-up").val().trim();
    var vInputPassword = $("#input-modal-password-sign-up").val().trim();
    var vInputCheckPassword = $("#input-modal-check-password").val().trim();

    vObjectData.tenDangKy = vInputTenDangKy;
    vObjectData.password = vInputPassword;
    vObjectData.checkPassword = vInputCheckPassword;
  }

  function checkValidateSingUp(paramCheck){
    //Tối thiểu tám ký tự, ít nhất một chữ cái viết hoa, một chữ cái viết thường, một số và một ký tự đặc biệt:
    var regexPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if(paramCheck.tenDangKy == ""){
      alert("Cần nhập tên.");
      return false;
    }
    if(!regexPass.test(paramCheck.password)){
      alert("Cần nhập lại password tối thiểu tám ký tự, ít nhất một chữ cái viết hoa, một chữ cái viết thường, một số và một ký tự đặc biệt.");
      return false;
    }
    if(paramCheck.checkPassword == ""){
      alert("Cần nhập xác nhận password.");
      return false;
    }
    if(paramCheck.checkPassword != paramCheck.password){
      alert("Xác nhận sai");
      return false;
    }
    return true;
  }

  
