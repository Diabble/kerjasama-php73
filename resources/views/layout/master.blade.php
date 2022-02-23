<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Bagian Kerjasama dan Kelembagaan - UIN Sunan Gunung Djati Bandung" name="keywords">
        <meta content="Bagian Kerjasama dan Kelembagaan - UIN Sunan Gunung Djati Bandung" name="description">

        <!-- Favicon -->
        <link href="{{asset('assets')}}/img/Doni-kecil.png" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@1,600;1,700;1,800&family=Roboto:wght@400;500&display=swap" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{asset('assets')}}/lib/animate/animate.min.css" rel="stylesheet">
        <link href="{{asset('assets')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">
    </head>

    <body>
        <div class="wrapper">
            <!-- Nav Bar Start -->
            @include('layout.navbar')
            <!-- Nav Bar End -->
            
            <!-- Carousel Start -->
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('assets')}}/img/uin-slide-1.jpg" alt="Carousel Image" style="heigh:1000px">
                        <div class="carousel-caption">
                            <h1 class="animated fadeInLeft">{{ $tangkap->judulcarousel }}</h1>
                            <p class="animated fadeInRight">{{ $tangkap->deskripsicarousel }}</p>
                            <a class="btn animated fadeInUp" href="/mitra">{{ $tangkap->tombolcarousel }}</a>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="{{asset('assets')}}/img/uin-slide-2.jpg" alt="Carousel Image">
                        <div class="carousel-caption">
                            <h1 class="animated fadeInLeft">{{ $tangkap->judulcarousel }}</h1>
                            <p class="animated fadeInRight">{{ $tangkap->deskripsicarousel }}</p>
                            <a class="btn animated fadeInUp" href="/mitra">{{ $tangkap->tombolcarousel }}</a>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="{{asset('assets')}}/img/uin-slide-3.jpg" alt="Carousel Image">
                        <div class="carousel-caption">
                            <h1 class="animated fadeInLeft">{{ $tangkap->judulcarousel }}</h1>
                            <p class="animated fadeInRight">{{ $tangkap->deskripsicarousel }}</p>
                            <a class="btn animated fadeInUp" href="/mitra">{{ $tangkap->tombolcarousel }}</a>
                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- Carousel End -->

            <!-- Content -->
            @yield('content')
            <!-- Content End -->

            <!-- Footer Start -->
            @include('layout.footer')
            <!-- Footer End -->
            
            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('assets')}}/lib/easing/easing.min.js"></script>
        <script src="{{asset('assets')}}/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="{{asset('assets')}}/lib/isotope/isotope.pkgd.min.js"></script>

        <!-- Template Javascript -->
        <script src="{{asset('assets')}}/js/main.js"></script>
    </body>
</html>
