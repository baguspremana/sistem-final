<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<!--fav icon-->
    <link rel="icon" type="image/jpg" href="{{asset('asset1/images/logoitcc.png')}}">

    <!-- Google Fonts -->
  	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  	<!-- Bootstrap CSS File -->
  	<link href="{{asset('asset1/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  	<!-- Libraries CSS Files -->
  	<link href="{{asset('asset1/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  	<link href="{{asset('asset1/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  	<link href="{{asset('asset1/lib/animate/animate.min.css')}}" rel="stylesheet">

  	<!-- Main Stylesheet File -->
  	<link href="{{asset('asset1/css/style.css')}}" rel="stylesheet">
  	<link href="{{asset('asset1/css/custom.css')}}" rel="stylesheet">
  	<link href="{{asset('asset1/css/myStyle.css')}}" rel="stylesheet">
  	<!--link href="{{ asset('css/app.css') }}" rel="stylesheet"-->

  	<!--meta-->
    <meta name       ="description" content="Information Technology Creative Competition (ITCC) adalah kompetisi bidang Teknologi Informasi yang diselenggarakan oleh Himpunan Mahasiswa Teknologi Informasi (HMTI), Fakultas Teknik, Universitas Udayana.">
    <meta name       ='keywords' content="ITCC 2018, TI Udayana, Fakultas Teknik, Universitas Udayana, ITCC Unud, ITCC Udayana"/>
    <meta http-equiv ="content-type" content="text/html;charset=UTF-8">
    <meta property   ="og:type" content="website" />
    <meta property   ="og:title" content="ITCC 2018" />
    <meta property   ="og:site_name" content="ITCC 2018"/>
    <meta property   ="og:image" itemprop="image" content="images/capture1.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- JavaScript Libraries -->
	<script src="{{asset('asset1/lib/jquery/jquery.min.js')}}"></script>
	<!--script src="lib/jquery/jquery-migrate.min.js"></script-->
	<script src="{{asset('asset1/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('asset1/lib/easing/easing.min.js')}}"></script>
	<script src="{{asset('asset1/lib/wow/wow.min.js')}}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVsIiuzFRNvG7RRSfKLM8o4QY2-qzCtR8"></script>

	<!--script src="lib/waypoints/waypoints.min.js"></script-->
	<script src="{{asset('asset1/lib/counterup/counterup.min.js')}}"></script>
	<script src="{{asset('asset1/lib/superfish/hoverIntent.js')}}"></script>
	<script src="{{asset('asset1/lib/superfish/superfish.min.js')}}"></script>

	<!-- Contact Form JavaScript File -->
	<!--script src="{{asset('asset1/contactform/contactform.js')}}"></script-->

	<!-- Template Main Javascript File -->
	<script src="{{asset('asset1/js/main.js')}}"></script>
	<!--script src="{{asset('js/app.js')}}" defer></script>
	<script src="{{asset('js/validator.min.js')}}" defer></script-->
  <style>
    .has-error {
      border: 1px solid red;
    }
  </style>

	@yield('head')

</head>
<body>
	<!--==========================
  				Header
  	============================-->
	<header id="header">
    	<div class="container">

	      	<div id="logo" class="pull-left">
	        	<a href="#hero" title="Information Technology Creative Competition"><img src="{{asset('asset1/images/logo_top_left.png')}}"/></img></a>
	      	</div>

		    <nav id="nav-menu-container">
		      	<ul class="nav-menu">
		      		@yield('navbar')
		        </ul>
		    </nav><!-- #nav-menu-container -->

    	</div>
  	</header><!-- #header -->

  	@yield('intro')

  	<main id="main">

  		@yield('content')

  	</main>

  	<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    @yield('scripts')

</body>
</html>