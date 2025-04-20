<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="Jobboard">

    <title>Job Portal</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/jasny-bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-select.min.css')}}" type="text/css">
    <!-- Material CSS -->
    <link rel="stylesheet" href="{{asset('/css/material-kit.css')}}" type="text/css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/fonts/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/fonts/themify-icons.css')}}">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('assets/extras/animate.css')}}" type="text/css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('assets/extras/owl.carousel.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/extras/owl.theme.css')}}" type="text/css">
    <!-- Rev Slider CSS -->
    <link rel="stylesheet" href="{{asset('assets/extras/settings.css')}}" type="text/css">
    <!-- Slicknav js -->
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.css')}}" type="text/css">
    <!-- Main Styles -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" type="text/css">
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" type="text/css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Color CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/colors/red.css')}}" media="screen" />
    @stack('css')

</head>

<body>
    <!-- Header Section Start -->
    <div class="header">
        <!-- Start intro section -->
        <section id="intro" class="section-intro">
            <div class="logo-menu">
                @if (!empty($showWtag) && $showWtag)
                    <nav class="navbar navbar-default" role="navigation" data-spy="affix" data-offset-top="50">
                    @else
                    <nav class="navbar navbar-default main-navigation" role="navigation" data-spy="affix"  data-offset-top="50">
                @endif
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand logo" href="index.html"><img src="{{asset('assets/img/logo.png')}}"
                                alt=""></a>
                    </div>

                    <div class="collapse navbar-collapse" id="navbar">
                        <!-- Start Navigation List -->
                        <ul class="nav navbar-nav">
                            <li>
                                <a class="{{request()->is('/')=='true'?'active':''}}" href="{{ route('/') }}">
                                    Home
                                </a>
                            </li>
                            <li>
                            <a class="{{ request()->is('jobs') == 'true' || request()->is('job_detail/{id}') == 'true' || request()->is('apply_job/') == 'true' ? 'active' : '' }}" href="{{ route('jobs') }}">
                               Jobs
                            </a>
                            </li>
                            <li>
                                <a class="{{request()->is('about')=='true'?'active':''}}" href="{{ route('about') }}">
                                    About
                                </a>
                            </li>
                            <li>
                                <a class="{{request()->is('contact')=='true'?'active':''}}" href="{{ route('contact') }}">
                                    Contact Us
                                </a>
                            </li>
                            @if(Auth::check() && Auth::user()->role === 'user')
                            <li>
                                <a  class="{{request()->is('my_resume')=='true' || request()->is('update_profile')=='true' || request()->is('my_applied_jobs')=='true' ?'active':''}}" href="#">
                                    Candidates <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown">
                                    <li>
                                        <a href="{{route('my_resume')}}">
                                            My Resume
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('update_profile')}}">
                                            Update Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('my_applied_jobs')}}">
                                            My Applied Jobs
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}">
                                    Logout
                                </a>
                            </li>
                            
                            @elseif(Auth::check() && Auth::user()->role === 'hr')
                            <li>
                                <a class="{{request()->is('post_job')=='true' || request()->is('update_hr_profile_settings')=='true' || request()->is('manage_jobs')=='true' || request()->is('manage_applications')=='true'  || request()->is('view_applied_job/{id}')=='true' || request()->is('edit_job/{id}')=='true' ? 'active':''}}" href="#">
                                    Employers <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown">
                                    <li>
                                        <a href="{{route('post_job')}}">
                                            Add Job
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('manage_jobs')}}">
                                            Manage Jobs
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('manage_applications')}}">
                                            Manage Applications
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('update_hr_profile_settings')}}">
                                            Update Profile
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}">
                                    Logout
                                </a>
                            </li>
                            <!-- Notification Dropdown -->
                            <li>
    <a href="#" class="">
        Notifications <i class="fa fa-bell"></i>
        <span class="badge">{{count($notifications)}}</span> 
    </a>
    <ul class="dropdown">
    @foreach($notifications as $notification)
    <li>
        <a href="{{route('job_detail' , [$notification->job_id])}}">
            {{ $notification->admin_message ?? 'No notification available' }}
        </a>
    </li>
    @endforeach
    
    </ul>
</li>
                            @endif
                            @if(Auth::check() && Auth::user()->role === 'admin')
                            <a href="{{route('dashboard')}}" class="btn btn-danger">
                                Dashbooard
                            </a>
                            @elseif(!Auth::check())
                            <li>
                                <a  class="{{request()->is('login')=='true' || request()->is('register')=='true' ?'active':''}}" href="#">
                                    Login/Register <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown">
                                    <li>
                                        <a href="{{route('login')}}">
                                            Login
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('register')}}">
                                            Register
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                        {{-- <ul class="nav navbar-nav navbar-right float-right">
                            <li class="left"><a class="{{request()->is('')=='true'?'active':''}}" href="{{ route('post_job') }}"><i class="ti-pencil-alt"></i> Post A Job</a>
                            </li>
                        </ul> --}}
                    </div>
                </div>
                <!-- Mobile Menu Start -->
                <ul class="wpb-mobile-menu">
                    <li>
                        <a class="active" href="index.html">Home</a>
                        <ul>
                            <li><a class="active" href="index.html">Home 1</a></li>
                            <li><a href="index-02.html">Home 2</a></li>
                            <li><a href="index-03.html">Home 3</a></li>
                            <li><a href="index-04.html">Home 4</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="about.html">Pages</a>
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Job Page</a></li>
                            <li><a href="#">Job Details</a></li>
                            <li><a href="#">Resume Page</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Pricing Tables</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">For Candidates</a>
                        <ul>
                            <li><a href="#">Browse Jobs</a></li>
                            <li><a href="#">Browse Categories</a></li>
                            <li><a href="#">Add Resume</a></li>
                            <li><a href="#">Manage Resumes</a></li>
                            <li><a href="#">Job Alerts</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">For Employers</a>
                        <ul>
                            <li><a href="#">Add Job</a></li>
                            <li><a href="#">Manage Jobs</a></li>
                            <li><a href="#">Manage Applications</a></li>
                            <li><a href="#">Browse Resumes</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Blog</a>
                        <ul class="dropdown">
                            <li><a href="#">Blog - Right Sidebar</a></li>
                            <li><a href="#">Blog - Left Sidebar</a></li>
                            <li><a href="#">Blog - Full Width</a></li>
                            <li><a href="#">Blog Single Post</a></li>
                        </ul>
                    </li>
                    <li class="btn-m"><a href="#"><i class="ti-pencil-alt"></i> Post A Job</a></li>
                    <li class="btn-m"><a href="#"><i class="ti-lock"></i> Log In</a></li>
                </ul>
                <!-- Mobile Menu End -->
                </nav>

                <!-- Off Canvas Navigation -->
                <div class="navmenu navmenu-default navmenu-fixed-left offcanvas">
                    <!--- Off Canvas Side Menu -->
                    <div class="close" data-toggle="offcanvas" data-target=".navmenu">
                        <i class="ti-close"></i>
                    </div>
                    <h3 class="title-menu">All Pages</h3>
                    <ul class="nav navmenu-nav">
                        <li><a href="{{'/'}}">Home</a></li>
                        <li><a href="{{'jobs'}}">Jobs</a></li>
                        <li><a href="{{'about'}}">About</a></li>
                        <li><a href="{{'contact'}}">Contact Us</a></li>
                        <li><a href="{{'login'}}">Login</a></li>
                       
                    </ul><!--- End Menu -->
                </div> <!--- End Off Canvas Side Menu -->
                <div class="tbtn wow pulse" id="menu" data-wow-iteration="infinite" data-wow-duration="500ms"
                    data-toggle="offcanvas" data-target=".navmenu">
                    <p><i class="ti-files"></i> All Pages</p>
                </div>
            </div>
            <!-- Header Section End -->
            @if (!empty($showWtag) && $showWtag)
                @include('Website.layout.search')
            @endif
        </section>
        <!-- end intro section -->
    </div>
    @yield('content')
    <footer>
        <!-- Footer Area Start -->
        <section class="footer-Content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="widget">
                            <h3 class="block-title"><img src="{{asset('assets/img/logo.png')}}" class="img-responsive"
                                    alt="Footer Logo"></h3>
                            <div class="textwidget">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lobortis tincidunt
                                    est, et euismod purus suscipit quis. Etiam euismod ornare elementum. Sed ex est,
                                    consectetur eget facilisis sed.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="widget">
                            <h3 class="block-title">Quick Links</h3>
                            <ul class="menu">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">License</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="widget">
                            <h3 class="block-title">Trending Jobs</h3>
                            <ul class="menu">
                                <li><a href="#">Android Developer</a></li>
                                <li><a href="#">Senior Accountant</a></li>
                                <li><a href="#">Frontend Developer</a></li>
                                <li><a href="#">Junior Tester</a></li>
                                <li><a href="#">Project Manager</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="widget">
                            <h3 class="block-title">Follow Us</h3>
                            <div class="bottom-social-icons social-icon">
                                <a class="twitter" href="#"><i
                                        class="ti-twitter-alt"></i></a>
                                <a class="facebook" href="#"><i
                                        class="ti-facebook"></i></a>
                                <a class="youtube" href="https://youtube.com"><i class="ti-youtube"></i></a>
                                <a class="dribble" href="#"><i
                                        class="ti-dribbble"></i></a>
                                <a class="linkedin" href="#"><i
                                        class="ti-linkedin"></i></a>
                            </div>
                            <p>Join our mailing list to stay up to date and get notices about our new releases!</p>
                            <form class="subscribe-box">
                                <input type="text" placeholder="Your email">
                                <input type="submit" class="btn-system" value="Send">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer area End -->

        <!-- Copyright Start  -->
        <div id="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="site-info text-center">
                            <p>All Rights reserved &copy; 2017 - Designed & Developed by <a rel="nofollow"
                                    href="http://graygrids.com">GrayGrids</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->

    </footer>
    <!-- Footer Section End -->

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
        <i class="ti-arrow-up"></i>
    </a>

    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_four"></div>
                <div class="object" id="object_five"></div>
                <div class="object" id="object_six"></div>
                <div class="object" id="object_seven"></div>
                <div class="object" id="object_eight"></div>
            </div>
        </div>
    </div>

    <!-- Main JS  -->
    <script type="text/javascript" src="{{asset('assets/js/jquery-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/material.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/material-kit.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.parallax.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.slicknav.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jasny-bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/form-validator.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/contact-form-script.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.themepunch.tools.min.js')}}"></script>
    @if(session('message'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        Swal.fire({
            title: "{{ session('title') }}",
            text: "{{ session('message') }}",
            icon: "{{ session('icon') }}",
        });
    </script>
@endif
@stack('js')
</body>

</html>
