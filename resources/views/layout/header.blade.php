    <!-- header area -->
    <header class="header">

        <!-- header-top -->
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="header-top-left">
                            <div class="top-social">
                                <a href="https://www.facebook.com/LibyaEuro"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://twitter.com/eurolibya"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.linkedin.com/company/eurolibya/"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                            <div class="top-contact-info">
                                <ul>
                                    <li><a href="tel:+218914719932"><i class="far fa-phone-arrow-down-left"></i>+218 91-4719932</a></li>
                                    <li><a href="mailto:info@example.com"><i class="far fa-envelopes"></i>info@eurolibya.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="header-top-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-navigation">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="index.html">
                        {{-- logo_eurolibya.jpg --}}
                        <img src="{{asset("logo_eurolibya.jpg")}}" style="width: 11%;border-radius: 63px;" class="logo-display" alt="logo">
                        <img src="{{asset("logo_eurolibya.jpg")}}" style="width: 9%;border-radius: 63px;" class="logo-scrolled" alt="logo">
                    </a>
                    <div class="mobile-menu-right">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-btn-icon"><i class="far fa-bars"></i></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="main_nav">
                        <ul class="navbar-nav">


                            <li class="nav-item"><a class="nav-link" href="{{ route("trips.search")}}"> Tickets</a></li>
                        </ul>

                    </div>
                </div>
            </nav>
        </div>

    </header>
    <!-- header area end -->
