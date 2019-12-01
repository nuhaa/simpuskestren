
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login Page Olshop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/owl.transitions.css') }}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/animate.css') }}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/normalize.css') }}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/wave/waves.min.css') }}">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/notika-custom-icon.css') }}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/style.css') }}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/responsive.css') }}">
    <!-- modernizr JS
		============================================ -->
    <script src=" {{ asset('admin/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Login Register area Start-->
    <div class="login-content">
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">
            <form action="{{ route('login') }}" method="post">
              @csrf
              <div class="nk-form">
                  <div class="input-group">
                      <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                      <div class="nk-int-st">
                          <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email">
                      </div>
                      @error('email')
                      <code>{{ $errors->first('email') }}</code>
                      @enderror
                  </div>
                  <div class="input-group mg-t-15">
                      <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                      <div class="nk-int-st">
                          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password">
                      </div>
                      @error('password')
                      <code>{{ $errors->first('password') }}</code>
                      @enderror
                  </div>
              </div>
              <div class="nk-navigation nk-lg-ic">
                <button type="submit" name="" class="btn btn-default notika-btn-default waves-effect">Masuk</button>
              </div>
            </form>
        </div>
    </div>
    <!-- Login Register area End-->
    <!-- jquery
		============================================ -->
    <script src=" {{ asset('admin/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src=" {{ asset('admin/js/bootstrap.min.js') }}"></script>
    <!-- wow JS
		============================================ -->
    <script src=" {{ asset('admin/js/wow.min.js') }}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src=" {{ asset('admin/js/jquery-price-slider.js') }}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src=" {{ asset('admin/js/owl.carousel.min.js') }}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src=" {{ asset('admin/js/jquery.scrollUp.min.js') }}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src=" {{ asset('admin/js/meanmenu/jquery.meanmenu.js') }}"></script>
    <!-- counterup JS
		============================================ -->
    <script src=" {{ asset('admin/js/counterup/jquery.counterup.min.js') }}"></script>
    <script src=" {{ asset('admin/js/counterup/waypoints.min.js') }}"></script>
    <script src=" {{ asset('admin/js/counterup/counterup-active.js') }}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src=" {{ asset('admin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- sparkline JS
		============================================ -->
    <script src=" {{ asset('admin/js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src=" {{ asset('admin/js/sparkline/sparkline-active.js') }}"></script>
    <!-- flot JS
		============================================ -->
    <script src=" {{ asset('admin/js/flot/jquery.flot.js') }}"></script>
    <script src=" {{ asset('admin/js/flot/jquery.flot.resize.js') }}"></script>
    <script src=" {{ asset('admin/js/flot/flot-active.js') }}"></script>
    <!-- knob JS
		============================================ -->
    <script src=" {{ asset('admin/js/knob/jquery.knob.js') }}"></script>
    <script src=" {{ asset('admin/js/knob/jquery.appear.js') }}"></script>
    <script src=" {{ asset('admin/js/knob/knob-active.js') }}"></script>
    <!--  Chat JS
		============================================ -->
    <script src=" {{ asset('admin/js/chat/jquery.chat.js') }}"></script>
    <!--  wave JS
		============================================ -->
    <script src=" {{ asset('admin/js/wave/waves.min.js') }}"></script>
    <script src=" {{ asset('admin/js/wave/wave-active.js') }}"></script>
    <!-- icheck JS
		============================================ -->
    <script src=" {{ asset('admin/js/icheck/icheck.min.js') }}"></script>
    <script src=" {{ asset('admin/js/icheck/icheck-active.js') }}"></script>
    <!--  todo JS
		============================================ -->
    <script src=" {{ asset('admin/js/todo/jquery.todo.js') }}"></script>
    <!-- Login JS
		============================================ -->
    <script src=" {{ asset('admin/js/login/login-action.js') }}"></script>
    <!-- plugins JS
		============================================ -->
    <script src=" {{ asset('admin/js/plugins.js') }}"></script>
    <!-- main JS
		============================================ -->
    <script src=" {{ asset('admin/js/main.js') }}"></script>
</body>

</html>
