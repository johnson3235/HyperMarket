<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="{{ url('assets/fonts/sb-bistro/sb-bistro.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/fonts/font-awesome/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" media="all" href="{{ url('/assets/packages/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" media="all" href="{{ url('/assets/packages/o2system-ui/o2system-ui.css') }}">
    <link rel="stylesheet" type="text/css" media="all" href="{{ url('/assets/packages/owl-carousel/owl-carousel.css') }}">
    <link rel="stylesheet" type="text/css" media="all" href="{{ url('/assets/packages/cloudzoom/cloudzoom.css') }}">
    <link rel="stylesheet" type="text/css" media="all" href="{{ url('/assets/packages/thumbelina/thumbelina.css') }}">
    <link rel="stylesheet" type="text/css" media="all" href="{{ url('/assets/packages/bootstrap-touchspin/bootstrap-touchspin.css') }}">
    <link rel="stylesheet" type="text/css" media="all" href="{{ url('/assets/css/theme.css') }}">
    {{--  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ url('/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ url('/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ url('/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('/plugins/summernote/summernote-bs4.min.css') }}">  --}}







    @yield('css')

    <?php
       function getCarts($id) {
        $numcarts = DB::table('carts')->where('user_id',$id)->count();
        return $numcarts;
    }
    ?>
</head>
<body>
    <div class="page-header">
        <!--=============== Navbar ===============-->

        <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-transparent" id="page-navigation">
            <div class="container">
                <!-- Navbar Brand -->
                @if(!Auth::user())
                <a href="{{ route('indexs') }}" class="navbar-brand">
                    <img src="{{ url('/assets/img/logo/logo-white.png') }}" class="w-100" alt="">
                </a>

                        @else
                        <a href="{{ route('user.index') }}" class="navbar-brand">
                            <img src="{{ url('/assets/img/logo/logo-white.png') }}" class="w-100" alt="">
                        </a>
                        @endif

                <!-- Toggle Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarcollapse">
                    <!-- Navbar Menu -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="{{ route('user.shop') }}" class="nav-link">Shop</a>
                        </li>
                        @if(!Auth::user())
                        <li class="nav-item">
                            <a href="{{ route('users.register') }}" class="nav-link">Register</a>
                        </li>
                        <li class="nav-item">
                           <a href="{{ route('users.login')  }}" class="nav-link">Login</a>
                        </li>
                        @endif
                        <li class="nav-item dropdown">


                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar-header" style="background-color:white;">

                                    @if(Auth::user())
                                        <?php $image=Auth::user()->image;?>
                                        <img src='{{ url("/images/users/$image")}}'>
                                    @else
                                        <img src='{{ url("/assets/img/logo/default.png")}}'>
                                    @endif

                                </div> {{{ Auth::user() ? Auth::user()->name : 'welcome' }}}

                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if(!Auth::user())
                                <a href="{{ route('users.login')  }}" class="dropdown-item">Login</a>
                                <a href="{{ route('users.register') }}" class="dropdown-item">Register</a>
                                @else
                                <?php   $id=Auth::user()->id;?>
                                <a class="dropdown-item" href="{{ route('user.order.listes',$id) }}">
                                    Orders
                                </a>
                                <a class="dropdown-item" href="{{ route('user.profile',$id) }}">
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('users.logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('users.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                @endif
                            </div>
                          </li>
                          @if(auth::user())
                             <?php $id=auth::user()->id;?>

                         <li class="nav-item dropdown">
                            <a href="{{ route('user.cart.showCart',$id) }}" class="nav-link dropdown-toggle"  >
                                <i class="fa fa-shopping-basket"></i>
                                <span class="badge badge-primary">{{ getcarts($id) }}</span>
                            </a>
                        </li>
                     @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div id="page-content" class="page-content">
        @yield('banner')
        @yield('con')
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5>About</h5>
                    <p>Nisi esse dolor irure dolor eiusmod ex deserunt proident cillum eu qui enim occaecat sunt aliqua anim eiusmod qui ut voluptate.</p>
                </div>
                <div class="col-md-3">
                  
                </div>
                <div class="col-md-3">
                     <h5>Contact</h5>
                     <ul>
                        <li>
                            <a href="{{ route('user.about') }}">About</a>
                        </li>
                         <li>
                            <a href="tel:+201277813223"><i class="fa fa-phone"></i> 01277813223</a>
                        </li>
                        <li>
                            <a href="mailto:MarketoMarket22@gmail.com"><i class="fa fa-envelope"></i>MarketoMarket22@gmail.com</a>
                         </li>
                     </ul>

                     <h5>Follow Us</h5>
                     <ul class="social">
                         <li>
                            <a href="javascript:void(0)" target="_blank"><i class="fab fa-facebook-f"></i></a>
                         </li>
                         <li>
                            <a href="javascript:void(0)" target="_blank"><i class="fab fa-instagram"></i></a>
                         </li>
                         <li>
                            <a href="javascript:void(0)" target="_blank"><i class="fab fa-youtube"></i></a>
                         </li>
                     </ul>
                </div>
                <div class="col-md-3">
                     <h5>Get Our App</h5>
                     <ul class="mb-0">
                         <li class="download-app">
                             <a href="#"><img src="{{ url('/assets/img/playstore.png') }}"></a>
                         </li>
                         <li style="height: 200px">
                             <div class="mockup">
                                 <img src="{{ url('/assets/img/mockup.png') }}">
                             </div>
                         </li>
                     </ul>
                </div>
            </div>
        </div>
        <p class="copyright">&copy; 2018 Freshcery | Groceries Organic Store. All rights reserved.</p>
    </footer>
{{--
    <!-- jQuery -->
    <script src="{{ url('/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ url('/plugins/chart.js') }}/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ url('/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ url('/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ url('/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ url('/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ url('/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ url('/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ url('/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ url('/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->  --}}
    <script src="{{ url('/dist/js/pages/dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/js/jquery-migrate.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/packages/bootstrap/libraries/popper.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/packages/bootstrap/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/packages/o2system-ui/o2system-ui.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/packages/owl-carousel/owl-carousel.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/packages/cloudzoom/cloudzoom.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/packages/thumbelina/thumbelina.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/packages/bootstrap-touchspin/bootstrap-touchspin.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/js/theme.js') }}"></script>



    @yield('js')
</body>
</html>
