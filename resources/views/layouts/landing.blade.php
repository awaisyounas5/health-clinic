<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="Medcity - Medical Healthcare HTML5 Template">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
    <title>Care Fusion Partner</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets/css/libraries.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style1.css') }}">
</head>

<body>
    <div class="wrapper">
        <div class="preloader">
            <div class="loading"><span></span><span></span><span></span><span></span></div>
        </div>

        <header class="header header-layout1">
            <div class="header-topbar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between">
                                <ul class="contact__list d-flex flex-wrap align-items-center list-unstyled mb-0">
                                    <li>
                                        <button class="miniPopup-emergency-trigger" type="button">24/7
                                            Emergency</button>
                                        <div id="miniPopup-emergency" class="miniPopup miniPopup-emergency text-center">
                                            <div class="emergency__icon">
                                                <i class="icon-call3"></i>
                                            </div>
                                            <a href="tel:+201061245741" class="phone__number">
                                                <i class="icon-phone"></i> <span>+2 01061245741</span>
                                            </a>
                                            <p>Please feel free to contact our friendly reception staff with any general
                                                or medical enquiry.
                                            </p>
                                            <a href="{{ route('appointment') }}"
                                                class="btn btn__secondary btn__link btn__block">
                                                <span>Make Appointment</span> <i class="icon-arrow-right"></i>
                                            </a>
                                        </div>
                                        <!-- /.miniPopup-emergency -->
                                    </li>
                                    <li>
                                        <i class="icon-phone"></i><a href="tel:+5565454117">Emergency Line: (002)
                                            01061245741</a>
                                    </li>
                                    <li>
                                        <i class="icon-location"></i><a href="#">Location: Brooklyn, New York</a>
                                    </li>
                                    <li>
                                        <i class="icon-clock"></i><a href="{{ route('contact_us') }}">Mon - Fri: 8:00 am
                                            - 7:00 pm</a>
                                    </li>
                                </ul>
                                <!-- /.contact__list -->
                                <div class="d-flex">
                                    <ul class="social-icons list-unstyled mb-0 mr-30">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    </ul>
                                    <!-- /.social-icons -->
                                    <form class="header-topbar__search">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <button class="header-topbar__search-btn"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.header-top -->
            <nav class="navbar navbar-expand-lg sticky-navbar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{asset('assets/img/login-logo.png')}}" width="200" alt>
                    </a>
                    <button class="navbar-toggler" type="button">
                        <span class="menu-lines"><span></span></span>
                    </button>
                    <div class="collapse navbar-collapse" id="mainNavigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav__item">
                                <a href="{{ url('/') }}" class="nav__item-link">Home</a>
                            </li>
                            <!-- /.nav-item -->
                            <li class="nav__item">
                                <a href="{{ route('about_us') }}" class="nav__item-link">About Us</a>
                            </li>
                            <li class="nav__item">
                                <a href="{{ route('blog') }}" class="nav__item-link">Blog</a>
                            </li>


                            <li class="nav__item">
                                <a href="{{ route('appointment') }}" class="nav__item-link">Appointment</a>
                            </li>
                            <li class="nav__item">
                                <a href="{{ route('contact_us') }}" class="nav__item-link">Contacts</a>
                            </li>
                            <!-- /.nav-item -->
                        </ul>
                        <!-- /.navbar-nav -->
                        <button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button>
                    </div>
                    <!-- /.navbar-collapse -->
                    <div class="d-none d-xl-flex align-items-center position-relative ml-30">

                        <!-- /.miniPopup-departments -->
                        <a href="{{ route('login') }}" class="btn btn__primary btn__rounded ml-30">
                            <i class="icon-user"></i>
                            <span>Sign In</span>
                        </a>
                    </div>
                </div>
                <!-- /.container -->
            </nav>
            <!-- /.navabr -->
        </header>
        @yield('content')
        <footer class="footer">
            <div class="footer-primary">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <div class="footer-widget-about">
                                <img src="{{asset('assets/img/login-logo.png')}}" alt="logo" class="mb-30">
                                <p class="color-gray">Our goal is to deliver quality of care in a courteous,
                                    respectful, and compassionate manner. We hope you will allow us to care for you and
                                    strive to be the first and best choice for your family healthcare.
                                </p>
                                <a href="{{ route('appointment') }}"
                                    class="btn btn__primary btn__primary-style2 btn__link">
                                    <span>Make Appointment</span> <i class="icon-arrow-right"></i>
                                </a>
                            </div>
                            <!-- /.footer-widget__content -->
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="footer-widget-nav">
                                <h6 class="footer-widget__title">Links</h6>
                                <nav>
                                    <ul class="list-unstyled">
                                        <li><a href="{{route('blog')}}">Blog</a></li>
                                        <li><a href="{{route('about_us')}}">About Us</a></li>
                                        <li><a href="{{route('contact_us')}}">Contact Us</a></li>
                                        <li><a href="{{route('appointment')}}">Appointments</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- /.footer-widget__content -->
                        </div>
                        <!-- /.col-lg-2 -->
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="footer-widget-contact">
                                <h6 class="footer-widget__title color-heading">Quick Contacts</h6>
                                <ul class="contact-list list-unstyled">
                                    <li>If you have any questions or need help, feel free to contact with our team.</li>
                                    <li>
                                        <a href="tel:01061245741" class="phone__number">
                                            <i class="icon-phone"></i> <span>01061245741</span>
                                        </a>
                                    </li>
                                    <li class="color-body">2307 Beverley Rd Brooklyn, New York 11226 United States.
                                    </li>
                                </ul>
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('contact_us') }}" class="btn btn__primary btn__link mr-30">
                                        <i class="icon-arrow-right"></i> <span>Get Directions</span>
                                    </a>
                                    <ul class="social-icons list-unstyled mb-0">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    </ul>
                                    <!-- /.social-icons -->
                                </div>
                            </div>
                            <!-- /.footer-widget__content -->
                        </div>
                        <!-- /.col-lg-2 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.footer-primary -->
            <div class="footer-secondary">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <span class="fz-14">&copy; 2020 DataSoft, All Rights Reserved. With Love by</span>
                            <a class="fz-14 color-primary" href="http://themeforest.net/user/7oroof">7oroof.com</a>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <nav>
                                <ul
                                    class="list-unstyled footer__copyright-links d-flex flex-wrap justify-content-end mb-0">
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Cookies</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.footer-secondary -->
        </footer>
        <!-- /.Footer -->
        <button id="scrollTopBtn"><i class="fas fa-long-arrow-alt-up"></i></button>
    </div>
    <!-- /.wrapper -->

    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
