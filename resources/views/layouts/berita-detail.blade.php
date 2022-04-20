@extends('layouts.master')
@section('title','Berita Detail')
@section('content')

			
			<!-- 
			=============================================
				Theme Inner Banner
			============================================== 
			-->
			<div class="theme-inner-banner section-spacing">
				<div class="overlay">
					<div class="container">
						{{-- <h2>Berita Detail</h2> --}}
						{{-- <p>{!! $beranda->deskripsicarousel !!}</p> --}}
						<h3>{{ $berita->judul }}</h3>
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.theme-inner-banner -->


			<!-- 
			=============================================
				Our Blog
			============================================== 
			-->
			<div class="our-blog section-spacing">
				<div class="container">
					<div class="row">
						<div class="col-xl-9 col-lg-8 col-12">
							<div class="post-wrapper blog-details">
								<div class="single-blog">
									<div class="image-box">
										<img src="{{ asset('storage/' . $berita->poto) }}" alt="">
										<div class="overlay">
											<div class="date">
												{{ Carbon\Carbon::parse($berita->created_at)->translatedFormat('l, d F Y') }}
											</div>
										</div>
									</div> <!-- /.image-box -->
									<div class="post-meta">
										{{-- <h5 class="title">{{ $berita->judul }}</h5> --}}
										<p>{!! $berita->deskripsi !!}</p>
									</div> <!-- /.post-meta -->
									<div class="share-option clearfix">
										<ul class="tag-meta float-left">
											<li><i class="fa fa-tags" aria-hidden="true"></i> Kategori :</li>
											<li><a href="#">{{ $berita->kategori->nama_kategori }}</a></li>
										</ul>
										<ul class="social-icon float-right">
											<li><i class="fa fa-share-alt" aria-hidden="true"></i> Share :</li>
											<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
										</ul>
									</div> <!-- /.share-option -->
								</div> <!-- /.single-blog -->
							</div> <!-- /.post-wrapper -->
							<hr>
							{{-- <!-- ==================== Comment Area ================= -->
							<div class="inner-box comment-area">
								<div class="theme-title-one">
									<h2>COMMENTS(02)</h2>
								</div> <!-- /.theme-title-one -->
								<div class="single-comment clearfix">
									<img src="{{ asset('assets') }}/front/images/blog/17.jpg" alt="" class="float-left">
									<div class="comment float-left">
										<h6>Alex Martin</h6>
										<p>Its a civilizations to boldly go where no man has gone before you would see the biggest gift would be from me and the card attached would say thank you.</p>
										<a href="#">REPLY</a>
									</div> <!-- /.comment -->
								</div> <!-- /.single-comment -->
								<div class="single-comment clearfix">
									<img src="{{ asset('assets') }}/front/images/blog/17.jpg" alt="" class="float-left">
									<div class="comment float-left">
										<h6>James Frank</h6>
										<p>Its a civilizations to boldly go where no man has gone before you would see the biggest gift would be from me and the card attached would say thank you.</p>
										<a href="#">REPLY</a>
									</div> <!-- /.comment -->
								</div> <!-- /.single-comment -->
							</div> <!-- /.inner-box -->
							<!-- ==================== Comment Form ================= -->
							<div class="inner-box comment-form">
								<div class="theme-title-one">
									<h2>POST A COMMENTS</h2>
								</div> <!-- /.theme-title-one -->
								<form action="#" class="theme-form-one">
									<div class="row">
										<div class="col-md-6 col-12"><input type="text" placeholder="Name"></div>
										<div class="col-md-6 col-12"><input type="text" placeholder="Phone"></div>
										<div class="col-12"><input type="email" placeholder="Email"></div>
										<div class="col-12"><textarea placeholder="Comments"></textarea></div>
									</div>
									<button class="theme-button-one">POST COMMENT</button>
								</form>
							</div> <!-- /.inner-box --> --}}
							<div id="disqus_thread"></div>
							<script>
								/**
								*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
								*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
								/*
								var disqus_config = function () {
								this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
								this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
								};
								*/
								(function() { // DON'T EDIT BELOW THIS LINE
								var d = document, s = d.createElement('script');
								s.src = 'https://kerjasama.disqus.com/embed.js';
								s.setAttribute('data-timestamp', +new Date());
								(d.head || d.body).appendChild(s);
								})();
							</script>
							<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
						</div>
						<!-- ===================== Blog Sidebar ==================== -->
						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-8 col-12 blog-sidebar">
							<div class="sidebar-container sidebar-search">
								<form action="{{ url('berita') }}" method="GET">
									<input type="text" name="keyword" autocomplete="off" placeholder="Search..." value="{{ $keyword }}">
									<button><i class="fa fa-search" aria-hidden="true"></i></button>
								</form>
							</div> <!-- /.sidebar-search -->
							<div class="sidebar-container sidebar-categories">
								<h5 class="title">Categories</h5>
								<ul>
									<div class="row">
										@foreach ( $kabet as $row )
										<div class="col-md-6">
											<li><a>{{ $row->nama_kategori }}</a></li>
										</div>
										<div class="col-md-6">
											<li class="float-right" style="line-height: 36px;">{{ $row->berita()->get()->count() }}</li>
										</div>
										@endforeach
									</div>
								</ul>
							</div> <!-- /.sidebar-categories -->
							<div class="sidebar-container sidebar-recent-post">
								<h5 class="title">Recent Posts</h5>
								<ul>
									@foreach ($postbaru as $val)
									<li class="clearfix">
										<img src="{{ asset('storage/' . $val->poto) }}" alt="" class="float-left">
										<div class="post float-left">
											<a href="{{ route('berita-detail', $val->slug) }}">{{ $val->judul }}</a>
											<div class="date">{{ Carbon\Carbon::parse($val->created_at)->translatedFormat('l, d F Y') }}</div>
										</div>
									</li>
									@endforeach
								</ul>
							</div> <!-- /.sidebar-recent-post -->
							{{-- <div class="sidebar-container sidebar-archives">
								<h5 class="title">Archives</h5>
								<ul>
									<li><a href="#">January 2018</a></li>
									<li><a href="#">February 2018</a></li>
									<li><a href="#">March 2018</a></li>
								</ul>
							</div> <!-- /.sidebar-archives --> --}}
							{{-- <div class="sidebar-tags">
								<h5 class="title">tags</h5>
								<ul class="clearfix">
									<li><a href="#">Business</a></li>
									<li><a href="#">Consulting</a></li>
									<li><a href="#">Sales</a></li>
									<li><a href="#">Startup</a></li>
									<li class="active"><a href="#">Marketing</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Financial</a></li>
									<li><a href="#">Research</a></li>
								</ul>
							</div> <!-- /.sidebar-tags --> --}}
						</div> <!-- /.col- -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.blog-details -->
			
@endsection