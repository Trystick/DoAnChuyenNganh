
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cửa Hàng Trái Cây Sạch</title>
<!-- các thư viện đã lưu được nhúng vào -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

<!-- css và js tự điều chỉnh -->
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="./css/library.css">


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<!-- bat dau | nut back top -->
<a href="#" id="backTop" class="fa fa-chevron-circle-up"></a>	<style>
 #backTop {
     position: fixed;
     bottom: 60px;
     right: 2px;
     z-index: 9999;
     width: 39px;
     height: 39px;
     text-align: center;
     text-transform: uppercase;
     line-height: 39px;
     background: #f5f5f5;
     color: #444;
     cursor: pointer;
     border-radius: 2px;
     text-decoration: none;
     transition: opacity 0.2s ease-out;
     opacity: 0;
     border: 1px solid #797979;
     border-radius: 10px;
}

 #backTop:hover {
     background: #e9ebec;
}
 #backTop.show {
     opacity: 1;
} 
@media (max-width: 500px) {
 #backTop.show { 
  display: block; 
}
}
</style>
<script>
     (function($) {

         "use strict"

         $(function() {
             if ($('#backTop').length) {
                 var scrollTrigger = 100, // px
                     backToTop = function() {
                         var scrollTop = $(window).scrollTop();
                         if (scrollTop > scrollTrigger) {
                             $('#backTop').addClass('show');
                         } else {
                             $('#backTop').removeClass('show');
                         }
                     };
                 backToTop();
                 $(window).on('scroll', function() {
                     backToTop();
                 });
                 $('#backTop').on('click', function(e) {
                     e.preventDefault();
                     $('html,body').animate({
                         scrollTop: 0
                     }, 700);
                 });
             }

         });

     })(jQuery);
</script>
<!-- kết thúc | nut back top -->