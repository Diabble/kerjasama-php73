@extends('layouts.master')
@section('title','Shop')
@section('content')

			
			<!-- 
			=============================================
				Theme Inner Banner
			============================================== 
			-->
			<div class="theme-inner-banner section-spacing">
				<div class="overlay">
					<div class="container">
						<h2>SHOP</h2>
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.theme-inner-banner -->


			<!-- 
			=============================================
				Shop Page
			============================================== 
			-->
			<div class="shop-page section-spacing">
				<div class="container">
					<div class="shop-filter">
						<ul class="clearfix">
							<li>Showing all 1-15 results</li>
							<li>
								<select class="form-control" id="exampleSelect1">
							      <option>Default Sorting</option>
							      <option>Price</option>
							      <option>Size</option>
							      <option>Trending</option>
							      <option>Upcoming</option>
							    </select>
							</li>
						</ul>
					</div> <!-- /.shop-filter -->
					<div class="row">
						<div class="col-lg-3 col-md-4 col-6">
							<div class="single-product">
								<div class="image-box">
									<img src="{{ asset('assets') }}/front/images/shop/1.jpg" alt="">
								</div> <!-- /.image-box -->
								<div class="product-name">
									<h5><a href="shop-details.html">Power of Elevation</a></h5>
									<div class="price">$32.70</div>
									<div class="add-to-cart"><a href="shop-details.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a></div>
								</div>
							</div> <!-- /.single-product -->
						</div> <!-- /.col- -->
						<div class="col-lg-3 col-md-4 col-6">
							<div class="single-product">
								<div class="image-box">
									<img src="{{ asset('assets') }}/front/images/shop/2.jpg" alt="">
								</div> <!-- /.image-box -->
								<div class="product-name">
									<h5><a href="shop-details.html">Business Plans</a></h5>
									<div class="price">$47.70</div>
									<div class="add-to-cart"><a href="shop-details.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a></div>
								</div>
							</div> <!-- /.single-product -->
						</div> <!-- /.col- -->
						<div class="col-lg-3 col-md-4 col-6">
							<div class="single-product">
								<div class="image-box">
									<img src="{{ asset('assets') }}/front/images/shop/3.jpg" alt="">
								</div> <!-- /.image-box -->
								<div class="product-name">
									<h5><a href="shop-details.html">Consulting Bible</a></h5>
									<div class="price">$26.00</div>
									<div class="add-to-cart"><a href="shop-details.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a></div>
								</div>
							</div> <!-- /.single-product -->
						</div> <!-- /.col- -->
						<div class="col-lg-3 col-md-4 col-6">
							<div class="single-product">
								<div class="image-box">
									<img src="{{ asset('assets') }}/front/images/shop/4.jpg" alt="">
								</div> <!-- /.image-box -->
								<div class="product-name">
									<h5><a href="shop-details.html">Process Consulting</a></h5>
									<div class="price">$46.00</div>
									<div class="add-to-cart"><a href="shop-details.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a></div>
								</div>
							</div> <!-- /.single-product -->
						</div> <!-- /.col- -->
						<div class="col-lg-3 col-md-4 col-6">
							<div class="single-product">
								<div class="image-box">
									<img src="{{ asset('assets') }}/front/images/shop/5.jpg" alt="">
								</div> <!-- /.image-box -->
								<div class="product-name">
									<h5><a href="shop-details.html">Science of overcoming</a></h5>
									<div class="price"><del>$36.00 </del> $32.70</div>
									<div class="add-to-cart"><a href="shop-details.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a></div>
								</div>
							</div> <!-- /.single-product -->
						</div> <!-- /.col- -->
						<div class="col-lg-3 col-md-4 col-6">
							<div class="single-product">
								<div class="image-box">
									<img src="{{ asset('assets') }}/front/images/shop/6.jpg" alt="">
								</div> <!-- /.image-box -->
								<div class="product-name">
									<h5><a href="shop-details.html">Threescore & More</a></h5>
									<div class="price">$30.10</div>
									<div class="add-to-cart"><a href="shop-details.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a></div>
								</div>
							</div> <!-- /.single-product -->
						</div> <!-- /.col- -->
						<div class="col-lg-3 col-md-4 col-6">
							<div class="single-product">
								<div class="image-box">
									<img src="{{ asset('assets') }}/front/images/shop/7.jpg" alt="">
								</div> <!-- /.image-box -->
								<div class="product-name">
									<h5><a href="shop-details.html">The Mckinsey Way</a></h5>
									<div class="price"><del>$43.00 </del>$40.00</div>
									<div class="add-to-cart"><a href="shop-details.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a></div>
								</div>
							</div> <!-- /.single-product -->
						</div> <!-- /.col- -->
						<div class="col-lg-3 col-md-4 col-6">
							<div class="single-product">
								<div class="image-box">
									<img src="{{ asset('assets') }}/front/images/shop/8.jpg" alt="">
								</div> <!-- /.image-box -->
								<div class="product-name">
									<h5><a href="shop-details.html">Outlier Approach</a></h5>
									<div class="price">$33.00</div>
									<div class="add-to-cart"><a href="shop-details.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a></div>
								</div>
							</div> <!-- /.single-product -->
						</div> <!-- /.col- -->
						<div class="col-lg-3 col-md-4 col-6">
							<div class="single-product">
								<div class="image-box">
									<img src="{{ asset('assets') }}/front/images/shop/9.jpg" alt="">
								</div> <!-- /.image-box -->
								<div class="product-name">
									<h5><a href="shop-details.html">Velocity Advantage</a></h5>
									<div class="price">$26.15</div>
									<div class="add-to-cart"><a href="shop-details.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a></div>
								</div>
							</div> <!-- /.single-product -->
						</div> <!-- /.col- -->
						<div class="col-lg-3 col-md-4 col-6">
							<div class="single-product">
								<div class="image-box">
									<img src="{{ asset('assets') }}/front/images/shop/10.jpg" alt="">
								</div> <!-- /.image-box -->
								<div class="product-name">
									<h5><a href="shop-details.html">The Insights</a></h5>
									<div class="price"><del>$43.00</del>$38.00</div>
									<div class="add-to-cart"><a href="shop-details.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a></div>
								</div>
							</div> <!-- /.single-product -->
						</div> <!-- /.col- -->
						<div class="col-lg-3 col-md-4 col-6">
							<div class="single-product">
								<div class="image-box">
									<img src="{{ asset('assets') }}/front/images/shop/11.jpg" alt="">
								</div> <!-- /.image-box -->
								<div class="product-name">
									<h5><a href="shop-details.html">Consultant Speaker</a></h5>
									<div class="price">$26.00</div>
									<div class="add-to-cart"><a href="shop-details.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a></div>
								</div>
							</div> <!-- /.single-product -->
						</div> <!-- /.col- -->
						<div class="col-lg-3 col-md-4 col-6">
							<div class="single-product">
								<div class="image-box">
									<img src="{{ asset('assets') }}/front/images/shop/12.jpg" alt="">
								</div> <!-- /.image-box -->
								<div class="product-name">
									<h5><a href="shop-details.html">Irresistible</a></h5>
									<div class="price">$46.00</div>
									<div class="add-to-cart"><a href="shop-details.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a></div>
								</div>
							</div> <!-- /.single-product -->
						</div> <!-- /.col- -->
					</div> <!-- /.row- -->
					<div class="theme-pagination text-center">
						<ul>
							<li><a href="#">1</a></li>
							<li class="active"><a href="#">2</a></li>
							<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div> <!-- /.container -->
			</div> <!-- /.shop-page -->
			
@endsection