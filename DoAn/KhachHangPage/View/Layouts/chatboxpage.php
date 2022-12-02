<div class="form-chat">
    <button class="nut-mo-chatbox" onclick="moForm()">
      <i class="fas fa-headset fa-fw"  aria-hidden="true"></i>
    </button>
    <div class="Chatbox" id="myForm">
      <form action="" class="form-container">
        <h1>Liên hệ cửa hàng</h1>
        <label for="msg"><b>Chat với chúng tôi</b></label>
        <textarea placeholder="Bạn hãy nhập lời nhắn.." name="msg" required></textarea>
        <button type="submit" class="btn"><i class="fa fa-paper-plane icon-chatbox" aria-hidden="true"></i>Gửi</button>
        <button type="button" class="btn nut-dong-chatbox" onclick="dongForm()"><i class="fa fa-window-close icon-chatbox" aria-hidden="true"></i>Đóng</button>
      </form>
    </div>
  </div>
