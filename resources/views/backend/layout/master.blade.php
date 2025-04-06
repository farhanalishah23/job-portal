<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{asset('backend')}}/assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Job Portal</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{asset('backend')}}/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{asset('backend')}}/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{asset('backend')}}/assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('backend')}}/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
@stack('css')

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="{{asset('backend')}}/assets/img/sidebar-5.jpg">


        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{route('/')}}" class="simple-text">
                    Admin
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="{{url('dashboard')}}">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                    <a href="{{url('categories')}}">
                        <i class="fa-light fa-list"></i>
                        <p>Category</p>
                    </a>
                    <a href="{{url('location')}}">
                        <i class="pe-7s-graph"></i>
                        <p>Location</p>
                    </a>
                    <a href="{{url('admin_job')}}">
                        <i class="pe-7s-graph"></i>
                        <p>Admin Job</p>
                    </a>
                    <a href="{{url('logout')}}">
                        <i class="pe-7s-graph"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>

    <div class="main-panel">

                @yield('content')



        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        </footer>

    </div>
</div>


</body>


<script src="{{asset('backend')}}/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="{{asset('backend')}}/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('backend')}}/assets/js/chartist.min.js"></script>
<script src="{{asset('backend')}}/assets/js/bootstrap-notify.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<script src="{{asset('backend')}}/assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="{{asset('backend')}}/assets/js/demo.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        demo.initChartist();
    });
</script>
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
</html>
