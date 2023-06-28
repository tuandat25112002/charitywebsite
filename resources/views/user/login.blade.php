<!DOCTYPE html>
<html lang="en">
<head>
   <title>Đăng nhập</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/signin.css')}}">
</head>
<body>

   <div class="limiter">
      <div class="container-login100">
         <div class="wrap-login100">
            <form method="POST" action="{{URL::to('confirm_login')}}" class="login100-form validate-form">
               @csrf
               <span class="login100-form-title p-b-43">
                  Đăng nhập
               </span>


               <div class="wrap-input100 validate-input">
                  <input class="input100" type="text" name="email">
                  <span class="focus-input100"></span>
                  <span class="label-input100">Email</span>
               </div>
               <div class="wrap-input100 validate-input">
                  <input class="input100" type="password" name="password">
                  <span class="focus-input100"></span>
                  <span class="label-input100">Mật khẩu</span>
               </div>
               @if (session('status'))
                  <div>
                     <p class="text-danger">{{session('status')}}</p>
                  </div>
               @endif
               <div class="flex-sb-m w-full p-t-3 p-b-32">
                  <div class="contact100-form-checkbox">
                     <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                     <label class="label-checkbox100" for="ckb1">
                        Nhớ mật khẩu
                     </label>
                  </div>

                  <div>
                     <a href="#" class="txt1">
                        Quên mật khẩu
                     </a>
                  </div>
               </div>


               <div class="container-login100-form-btn">
                  <button type="submit" class="login100-form-btn">
                     Đăng nhập
                  </button>
               </div>

               <div class="text-center p-t-46 p-b-20">
                  Nếu chưa có tài khoản hãy
                  <a href="{{URL::to('register')}}" class="text-primary">
                     Đăng ký
                  </a>
               </div>

            </form>

            <div class="login100-more" style="background-image: url('https://res.cloudinary.com/dcugpagjy/image/upload/v1685765800/background/3T-15-scaled.jpg-2407.jpg');">
            </div>
         </div>
      </div>
   </div>
</body>
</html>
