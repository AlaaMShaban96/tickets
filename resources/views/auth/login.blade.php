<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- title -->
    <title>MyTrip - Travel Booking HTML5 Template</title>

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/logo/favicon.png">

    <!-- css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all-fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/nice-select.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/jquery.timepicker.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <!-- preloader -->
    <div class="preloader">
        <div class="loader">
            <span style="--i:1;"></span>
            <span style="--i:2;"></span>
            <span style="--i:3;"></span>
            <span style="--i:4;"></span>
            <span style="--i:5;"></span>
            <span style="--i:6;"></span>
            <span style="--i:7;"></span>
            <span style="--i:8;"></span>
            <span style="--i:9;"></span>
            <span style="--i:10;"></span>
            <span style="--i:11;"></span>
            <span style="--i:12;"></span>
            <span style="--i:13;"></span>
            <span style="--i:14;"></span>
            <span style="--i:15;"></span>
            <span style="--i:16;"></span>
            <span style="--i:17;"></span>
            <span style="--i:18;"></span>
            <span style="--i:19;"></span>
            <span style="--i:20;"></span>
            <div class="loader-plane"></div>
        </div>
    </div>
    <!-- preloader end -->





    <main class="main mt-5">
        <!-- login area -->
        <div class="login-area py-120">
            <div class="container">
                <div class="col-md-5 mx-auto">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="alert-body">
                                <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                @foreach ($errors->all() as $error)
                                    <span>{{ $error }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <div class="login-form">
                        <div class="login-header">
                            <img src="{{ asset('logo_eurolibya.jpg') }}" style="width: 20%;border-radius: 63px;"
                                alt="">
                            <p>Euro Libya System</p>
                        </div>
                        <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                {{-- <label>Email Address</label> --}}
                                <div class="form-group-icon">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email">
                                    <i class="far fa-envelope"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                {{-- <label>Password</label> --}}
                                <div class="form-group-icon">
                                    <input type="password" name="password" class="form-control" placeholder="Your Password">
                                    <i class="far fa-lock"></i>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <button type="submit" class="theme-btn"><i class="far fa-sign-in"></i> Login</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- login area end -->


    </main>



    <!-- footer area -->
    <footer class="footer-area">
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p class="copyright-text">
                            &copy; Copyright <span id="date"></span> <a href="https://www.eurolibya.com/"> EuroLibya </a> All Rights Reserved.
                        </p>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <ul class="footer-social">
                            <li><a href="https://www.facebook.com/LibyaEuro"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://twitter.com/eurolibya"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/eurolibya/"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->




    <!-- scroll-top -->
    <a href="#" id="scroll-top"><i class="far fa-angle-up"></i></a>
    <!-- scroll-top end -->
    @include('sweetalert::alert')

    <!-- js -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/jquery.appear.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/counter-up.js"></script>
    <script src="assets/js/masonry.pkgd.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/jquery.timepicker.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>
