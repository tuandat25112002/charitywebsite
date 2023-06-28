<?php
 $user = Session::get('user');
 $categories = Session::get('categories');
  $logo = Session::get('logo');
  $name = Session::get('name');
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo env('APP_NAME'); ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('vendor/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('vendor/summernote/summernote-bs4.min.css')}}">
   <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('vendor/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendor/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendor/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- jQuery -->
  <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css
" rel="stylesheet">
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/animate.css')}}">
  <link rel="stylesheet" href="{{asset('css/carousel.css')}}">
  <link rel="stylesheet" href="{{asset('css/intro.css')}}">
  <link rel="stylesheet" href="{{asset('css/user.css')}}">
  <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/details.css')}}">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
 <!-- <script src="{{asset('js/carousel.js')}}"></script> -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/popper.js')}}"></script>
<style type="text/css">
    .contact-bottom{
        background: #005a87;
    }
    footer{
            background: linear-gradient(135deg, rgba(0,90,135,1) 11%, rgba(0,107,161,1) 32%, rgba(0,124,186,1) 100%);
            color: white !important;
    }
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="w-100 text-light bg-img-header">
  <div class="bg-header h-100">
    <div class="head-for-web container">
      <div class="h-100 row">
        <a href="{{URL::to('/')}}" class="h-100 col-md-6 col-xl-3 col-lg-3 d-flex">
        <img class="logo" src="<?php echo $logo->content?>">
        <div class="mt-auto mb-auto txt-name text-light">
          <div>Quỹ từ thiện</div>
          <b class="text-upscase">{{$name->content}}</b>
        </div>
      </a>
      <div class="mt-auto s-18 mb-auto p-2 col-md-6 text-center">
          <b class="s-20 mr-1">"</b><i> Be all you can be - Là tất những gì bạn có thể</i>
          <div class="slogan">- Slogan Ước Mơ Của Em</div>
      </div>
      <div class="mt-auto s-18 mb-auto p-2 col-md-3 hidden-responesive">
        <div class="float-right">
          <a href="" class="btn btn-warning btn-half-circle"> <i class="fas fa-hand-holding-medical"></i> Donate </a>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
  <div class="container">
    <a class="text-dark mr-2" href="{{URL::to('/')}}"><b>Trang chủ</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown pl-2 pr-2">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <b>Danh mục chương trình</b>
          </a>
          <div class="dropdown-menu slideIn animate" aria-labelledby="navbarDropdown">
            @foreach($categories as $category)
            <a class="dropdown-item" href="#{{$category->id}}">{{$category->name_category}}</a>
            @endforeach
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{URL::to('all')}}"><b>Xem tất cả</b></a>
          </div>
        </li>
        <li class="nav-item pl-2 pr-2">
          <a class="nav-link text-dark " href="#"><b>Báo cáo tài chính</b></a>
        </li>
        <li class="nav-item pl-2 pr-2">
          <a class="nav-link text-dark " href="{{URL::to('all-news')}}"><b>Tin tức</b></a>
        </li>
        <li class="nav-item pl-2 pr-2">
          <a class="nav-link text-dark " href="#"><b>Liên hệ</b></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input type="text" class="form-control search-input" placeholder="Search">
          <div class="input-group-append mr-2">
            <button class="btn btn-web btn-search-home" type="submit"><i class="fas fa-search"></i></button>
           </div>
            <ul class="navbar-nav mr-auto">

               <li class="nav-item dropdown pl-2 pr-2">
                @if(!$user)
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <b>Tài khoản</b>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{URL::to('login')}}">Đăng nhập</a>
                <a class="dropdown-item" href="{{URL::to('register')}}">Đăng ký</a>
              </div>
            </li>
              @else
              <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="avatar" src="https://res.cloudinary.com/dcugpagjy/image/upload/v1686597652/avatar/avatar_default_lotm7k.png">
                </a>
                <div class="dropdown-menu animate slideIn" aria-labelledby="navbarDropdown">
                <a href="{{URL::to('profile')}}" class="dropdown-item pointer bottom-line d-flex pl-3 pb-2" >
                   <div class="avatar_img ">
                       <img class="img_avatar" src="https://res.cloudinary.com/dcugpagjy/image/upload/v1686597652/avatar/avatar_default_lotm7k.png">
                   </div>
                   <div class="name_user">
                        <b>{{$user->name}}</b><div class="s-13 text-primary">Xem thông tin</div>
                    </div>
                <a class="dropdown-item bottom-line pt-2 pb-2" href="{{URL::to('login')}}"><i class="fas fa-history"></i> Lịch sử ủng hộ</a>
                <a class="dropdown-item pt-2 pb-2 bottom-line" href="{{URL::to('login')}}"><i class="fas fa-hand-holding-heart"></i> Tạo dự án</a>
                <a class="dropdown-item pt-2 pb-2" href="{{URL::to('logout')}}"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
              </div>
              @endif
        </ul>
      </form>
    </div>
  </div>
</nav>
@yield('content')
<!-- Footer -->
<footer class="text-lg-start bg-white text-muted">
  <!-- Section: Social media -->
  <section class="d-flex text-light contact-bottom justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block s-20">
      <span>Liên hệ với chúng tôi qua các trang mạng xã hội:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-light s-20">
         <i class="fab fa-facebook-f"></i> Ước mơ của em
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
          <a href="{{URL::to('/')}}" class="d-flex">
        <img class="logo" src="<?php echo $logo->content?>">
        <div class="mt-auto mb-auto txt-name text-light">
          <div>Quỹ từ thiện</div>
          <b class="text-upscase">{{$name->content}}</b>
        </div>
      </a>
      <hr class="border-light">
      <div class="mt-2 ml-3 text-light">
        <div class="mb-1"><i class="fas fa-home "></i> 470 Trần Đại Nghĩa, Hòa Hải, Ngũ Hành Sơn, TP Đà Nẵng</div>
          <div class="mb-1">
            <i class="fas fa-envelope "></i>
            uocmocuaem@gmail.com
          </div>
          <div class="mb-1"><i class="fas fa-phone"></i> 0946 234 470</div>
       </div>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 text-light col-lg-3 col-xl-3 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-hand-holding-heart"></i> Chương trình nổi bật
          </h6>
          <?php $categories = Session::get('categories')?>
          @foreach($categories as $value)
          <p>
            <a href="#{{$value->id}}" class="text-reset">{{$value->name_category}}</a>
          </p>
          @endforeach
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 text-light mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-link"></i> Liên kết
          </h6>
          <p>
            <a href="{{URL::to('/')}}" class="text-reset">Trang chủ</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Báo cáo tài chính</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Tin tức</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Liên hệ</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 text-light mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4"><i class="fas fa-users"></i> Đối tác chính</h6>
          <p>
            <a href="#!" class="text-reset">Nhóm từ thiện Hand In Hand Việt - Hàn</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Quỹ bông sen vàng</a>
          </p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->
  <!-- Copyright -->
</footer>
<!-- Footer -->
</body>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script type="text/javascript">
  (function($) {

  "use strict";

  var fullHeight = function() {

    $('.js-fullheight').css('height', $(window).height());
    $(window).resize(function(){
      $('.js-fullheight').css('height', $(window).height());
    });

  };
  fullHeight();

  var carousel = function() {
    $('.carousel-intro').owlCarousel({
      loop:true,
      autoplay: true,
      margin:30,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      nav:false,
      dots: true,
      autoplayHoverPause: false,
      items: 1,
      navText : ["<p><small>Prev</small><span class='ion-ios-arrow-round-back'></span></p>","<p><small>Next</small><span class='ion-ios-arrow-round-forward'></span></p>"],
      responsive:{
        0:{
          items:1
        },
        600:{
          items:1
        },
        1000:{
          items:1
        }
      }
    });

  };
  carousel();

})(jQuery);
</script>
<script type="text/javascript">
  (function($) {

  "use strict";

  var fullHeight = function() {

    $('.js-fullheight').css('height', $(window).height());
    $(window).resize(function(){
      $('.js-fullheight').css('height', $(window).height());
    });

  };
  fullHeight();

  var owl = $('.carousel-slider');

  $('.carousel-slider').owlCarousel({
      animateOut: 'fadeOut',
      center: false,
      items: 1,
      loop: true,
      stagePadding: 0,
      margin: 0,
      smartSpeed: 1500,
      autoplay: true,
      dots: false,
      nav: false,
      navText: ['<span class="icon-keyboard_arrow_left">', '<span class="icon-keyboard_arrow_right">']
  });

  $('.thumbnail li').each(function(slide_index){
      $(this).click(function(e) {
          owl.trigger('to.owl.carousel',[slide_index,1500]);
          e.preventDefault();
      })
  })

  owl.on('changed.owl.carousel', function(event) {
      $('.thumbnail li').removeClass('active');
      $('.thumbnail li').eq(event.item.index - 2).addClass('active');
  })

})(jQuery);
</script>
 <script>

                            $('.skill-per').each(function(){
                                var $this = $(this);
                                var per = $this.attr('per');
                                $this.css("width",per+'%');
                                $({animatedValue: 0}).animate({animatedValue: per},{
                                  duration: 1000,
                                  step: function(){
                                    $this.attr('per', Math.floor(this.animatedValue) + '%');
                                  },
                                  complete: function(){
                                    $this.attr('per', Math.floor(this.animatedValue) + '%');
                                  }
                                });
                                if($this.attr('per')==100){
                                  $this.addClass("bg-success");
                                }
                              });
                            </script>
<script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendor/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendor/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendor/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendor/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendor/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('vendor/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('vendor/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<script src="{{asset('js/simple.money.format.js')}}"></script>
<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>
 <script type="text/javascript">
    $('.money').simpleMoneyFormat();
</script>
 <script type="text/javascript">

        function ChangeToSlug()
            {
                var slug;

                //Lấy text từ thẻ input title
                slug = document.getElementById("slug").value;
                slug = slug.toLowerCase();
                //Đổi ký tự có dấu thành không dấu
                    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                    slug = slug.replace(/đ/gi, 'd');
                    //Xóa các ký tự đặt biệt
                    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                    //Đổi khoảng trắng thành ký tự gạch ngang
                    slug = slug.replace(/ /gi, "-");
                    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                    slug = slug.replace(/\-\-\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-/gi, '-');
                    //Xóa các ký tự gạch ngang ở đầu và cuối
                    slug = '@' + slug + '@';
                    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                    //In slug ra textbox có id “slug”
                document.getElementById('convert_slug').value = slug;
            }
    </script>
    {{-- CKEditor --}}
<script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('editor');
</script>

</html>
