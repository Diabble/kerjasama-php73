<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- For Window Tab Color -->
		<!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#061948">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#061948">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#061948">
		<title>Kerjasama dan Pengembangan Lembaga - @yield('title')</title>
		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets') }}/front/images/fav-icon/icon-uinsgd-32x32.png">
		<!-- Main style sheet -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/front/css/style.css">
		<!-- responsive style sheet -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/front/css/responsive.css">
		<!-- Fontawesome -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css">
		<!-- Datatables -->
		{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet"> --}}
        <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">

		<!-- Fix Internet Explorer ______________________________________-->
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->	
	</head>

	<body>

        <div class="main-page-wrapper">

			<!-- ===================================================
				Loading Transition
			==================================================== -->
			{{-- <div id="loader-wrapper">
				<div id="loader"></div>
			</div> --}}

            <!-- Navbar -->
            @include('layouts.header')
            <!-- Navber End -->

            <!-- Content -->
            @yield('content')
            <!-- Content End -->

            <!-- Footer Start -->
            @include('layouts.footer')
            <!-- Footer End -->

            <!-- Scroll Top Button -->
            <button class="scroll-top tran3s">
                <i class="fa fa-angle-up" aria-hidden="true"></i>
            </button>

        </div>
        <!-- /.main-page-wrapper -->

        <!-- Optional JavaScript _____________________________  -->

    	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    	<!-- jQuery -->
		<script src="{{ asset('assets') }}/front/vendor/jquery.2.2.3.min.js"></script>
		<!-- Popper js -->
		<script src="{{ asset('assets') }}/front/vendor/popper.js/popper.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="{{ asset('assets') }}/front/vendor/bootstrap/js/bootstrap.min.js"></script>
		<!-- Camera Slider -->
		<script src="{{ asset('assets') }}/front/vendor/Camera-master/scripts/jquery.mobile.customized.min.js"></script>
	    <script src="{{ asset('assets') }}/front/vendor/Camera-master/scripts/jquery.easing.1.3.js"></script> 
	    <script src="{{ asset('assets') }}/front/vendor/Camera-master/scripts/camera.min.js"></script>
	    <!-- menu  -->
		<script src="{{ asset('assets') }}/front/vendor/menu/src/js/jquery.slimmenu.js"></script>
		<!-- WOW js -->
		<script src="{{ asset('assets') }}/front/vendor/WOW-master/dist/wow.min.js"></script>
		<!-- owl.carousel -->
		<script src="{{ asset('assets') }}/front/vendor/owl-carousel/owl.carousel.min.js"></script>
		<!-- js count to -->
		<script src="{{ asset('assets') }}/front/vendor/jquery.appear.js"></script>
		<script src="{{ asset('assets') }}/front/vendor/jquery.countTo.js"></script>
		<!-- Fancybox -->
		<script src="{{ asset('assets') }}/front/vendor/fancybox/dist/jquery.fancybox.min.js"></script>
        <!-- Google map js -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjQLCCbRKFhsr8BY78g2PQ0_bTyrm_YXU"></script>
		<script src="{{ asset('assets') }}/front/vendor/sanzzy-map/dist/snazzy-info-window.min.js"></script>

		<!-- Theme js -->
		<script src="{{ asset('assets') }}/front/js/theme.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/fontawesome.min.js"></script>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Work',     11],
            ['Eat',      2],
            ['Commute',  2],
            ['Watch TV', 2],
            ['Sleep',    7]
            ]);

            var options = {
            is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
        </script>

		<!-- Datatables -->
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
		<script>
			$(document).ready(function() {
				$('#example').DataTable();
			} );
		</script>
	</body>
</html>