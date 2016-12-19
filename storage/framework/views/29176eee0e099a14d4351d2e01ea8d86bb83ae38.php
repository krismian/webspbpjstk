<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SP BPJS Ketenagakerjaan</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/octicons/3.5.0/octicons.min.css">

    <!--Styles for froster navbar-->
    <link rel="stylesheet" href="/public/css/frosted.bar.css">

    <!--Styles for gliss pictures-->
    <link rel="stylesheet" href="/public/css/glisse.css">

    <style>
        /*
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
        */


        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            right: 10px;
            top: 18px;
        }

        .baris-berita {
            width: 98%;
            height: 120px;
            padding-left: 5px;
            padding-right: 5px;
            margin-bottom: 5px;
            text-align: left;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links p{
            font-family: Arial;
            font-weight: lighter;
        }

        .links li {
            list-style: none;
            padding: 0 25px;
        }
        .links >ul li a {
            color: #636b6f;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }


        .border {
            border: 1px solid red;
        }

        .awesome {
            text-align: left;
            left: 0;
        }

        .logo {
            margin-right: 10px;
            float: left;
        }
        .logo h2 {
            line-height: 10px;
        }



        .nav-tabs li a {
            font-family: Arial;
            font-weight: lighter;
        }

        .row {
            margin-bottom: 20px;
        }

        .tab-content {

            border: 1px solid #e9e9e9;
            border-top: 0px;
            height: auto;
        }

        .custom {
            margin-top: 110px;
        }

        .jarak {
            height: 140px;
        }


        .spasi {
            margin-top: 10px;
        }
        
        .komentar {
            background-color: #eaeaea;
            padding-left: 10px;
        }

        .komentar h4 {
            background-color : white;
            padding-left : 0px;
        }

        .col-md-4 {
            padding-left: 0px;
            padding-right: 0px;
        }

        @media (max-width: 768px) {
            .baris-berita {
                height: auto;
                box-shadow: 2px 2px 5px #e9e9e9;
            }
            .custom {
                margin-top: 70px;
            }
            .custom1 {
                margin-top:5px;
                z-index: 999999999999;
            }
            .navbar-collapse{
                background-color: #2725a2;
            }
            .jarak {
                height: 100px;
            }
            .logo h2 {
                display: none;
            }
            .navbar-collapse ul li a{
                color: white;
            }
            .navbar-toggle{
                font-size: 30px;
                font-weight: lighter;
                color: #2725a2;
            }
        }


    </style>
</head>
<body>
<div class="container">
    <div class="overlayViewport">
        <div class="container">
            <div class="content-wrapper">
            </div>
        </div>
        <div class="overlayContent">
            <nav class="navbar navbar-fixed-top container">
                <div class="row">
                    <div class="logo hidden-xs">
                        <a href="/alter"><img src="/public/pictures/logo.png" width="100px"></a>
                    </div>
                    <div class="logo visible-xs">
                        <img src="/public/pictures/logo.png" width="70px">
                    </div>
                    <div class="logo">
                        <button style="color: black;" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".bs-navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h2>SERIKAT PEKERJA</h2>
                        <h2>BPJS KETENAGAKERJAAN</h2>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="row hidden-xs">
        <nav class="custom navbar navbar-fixed-top">
            <div class="container">
                <div class="navbar-inverse">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle glyphicon glyphicon-log-out" data-toggle="collapse" data-target=".bs-navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="links bs-navbar-collapse navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-left ">
                            <li><a href="/"><span class="fa fa-newspaper-o"></span> Berita & Rubrik</a></li>
                            <li><a href="#"><span class="mega-octicon octicon-organization" style="font-size: 16px"></span>&nbsp;Tentang Kami</a></li>
                            <li><a href="#"><span class="fa fa-paper-plane-o"></span> Program Kerja</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <?php if(Route::has('login')): ?>
                                <?php if(Auth::check()): ?>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <?php echo e(Auth::user()->first_name); ?><span class="caret"></span> </a>
                                        <ul class="dropdown-menu"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <li><a href="#"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
                                        </ul>
                                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                <?php else: ?>
                                    <li><a href="<?php echo e(url('/social/google')); ?>">Login</a></li>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <!-- Navbar untuk minim-->
    <div class="">
        <nav class="custom1 navbar navbar-fixed-top">
            <div class="container">
                <div class="nivbar">
                    <div class="navbar-header ">
                        <button type="button" class="navbar-toggle glyphicon glyphicon-menu-hamburger" data-toggle="collapse" data-target=".bs-navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="links bs-navbar-collapse navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-left">
                            <li><a href="/"><span class="fa fa-newspaper-o"></span> Berita & Rubrik</a></li>
                            <li><a href="#"><span class="mega-octicon octicon-organization" style="font-size: 16px"></span>&nbsp;Tentang Kami</a></li>
                            <li><a href="#"><span class="fa fa-paper-plane-o"></span> Program Kerja</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <?php if(Route::has('login')): ?>
                                <?php if(Auth::check()): ?>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <?php echo e(Auth::user()->first_name); ?><span class="caret"></span> </a>
                                        <ul class="dropdown-menu"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <li><a href="#"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
                                        </ul>
                                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                <?php else: ?>
                                    <li><a href="<?php echo e(url('/social/google')); ?>">Login</a></li>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div class="contentViewport">
        <div class="content">
            <div class="jarak"></div>


            <div class="slider">
                <div class="col-md-4">
                    <?php echo $__env->yieldContent('slider'); ?>
                </div>
                <div class="col-md-4 hidden-xs">
                    <?php echo $__env->yieldContent('slider'); ?>
                </div>
                <div class="col-md-4 hidden-xs">
                    <?php echo $__env->yieldContent('slider'); ?>
                </div>
            </div>

            <div class="row spasi">
                <div class="col-md-8 col-md-push-2">
                    <?php echo $__env->yieldContent('berita'); ?>
                </div>
                <?php echo $__env->yieldContent('panel'); ?>
            </div>
            <div class="row">
                <div class="navbar navbar-static-top navbar-inverse links">
                    <p style="text-align: center; margin-top: 10px">Copyright &copy; Serikat Pekerja BPJS Ketenagakerjaan</p>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php echo $__env->yieldContent('script'); ?>

<script src="/public/vendor/laravel-filemanager/js/lfm.js"></script>
<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="/public/js/glisse.js"></script>



</body>
</html>
