@extends('layouts.master')
@section('title','Shop Details')
@section('content')

			
			<!-- 
			=============================================
				Theme Inner Banner
			============================================== 
			-->
			<div class="theme-inner-banner section-spacing">
				<div class="overlay">
					<div class="container">
						<h2>SHOP DETAILS</h2>
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.theme-inner-banner -->


			<!-- 
			=============================================
				Shop Details
			============================================== 
			-->
			<div class="shop-details">
				<div class="container">
					<div class="product-details">
						<div class="row">
							<div class="col-lg-5 col-12">
								<div class="product-tab clearfix">
									<div class="product-preview">
										<div class="tab-content">
										    <div id="tag-one" class="tab-pane active">
										      <img src="{{ asset('assets') }}/front/images/shop/13.jpg" alt="">
										    </div>
										    <div id="tag-two" class="tab-pane fade">
										      <img src="{{ asset('assets') }}/front/images/shop/14.jpg" alt="">
										    </div>
										</div>
									</div> <!-- /.product-preview -->
									<div class="product-thumbnail">
										<ul class="nav-tabs nav">
										    <li class="nav-item">
										      <a class="nav-link active" data-toggle="tab" href="#tag-one"><img src="{{ asset('assets') }}/front/images/shop/15.jpg" alt=""></a>
										    </li>
										    <li class="nav-item">
										      <a class="nav-link" data-toggle="tab" href="#tag-two"><img src="{{ asset('assets') }}/front/images/shop/16.jpg" alt=""></a>
										    </li>
										  </ul>
									</div> <!-- /.product-thumbnail -->
								</div> <!-- /.product-tab -->
							</div>
							<div class="col-lg-7 col-12">
								<div class="product-info">
									<h5 class="title">Contract and Fee-Setting Guide for Consultants</h5>
									<div class="price"><del>$43.00</del>$38.00</div>
									<p>A tale of a fateful trip that started from this tropic port aboard this tiny ship today still wanted by the government  apartment in the sky moving on up to the east side a family to explore strange new worlds to seek out new life and new civilizations to boldly go where no man has gone before you would see the biggest gift would be from me and the card attached would say thank you for being a friend.</p>
									<ul class="order-box">
										<li>Qty:</li>
										<li>
											<button id="value-decrease">-</button>
											<input type="number" min="1" max="22" value="3" class="val" disabled id="product-value">
											<button id="value-increase">+ </button>
										</li>
									</ul>
									<a href="#" class="theme-button-one"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a>
								</div> <!-- /.product-info -->
							</div>
						</div>
					</div> <!-- /.product-details -->
					<div class="product-review-tab">
						<ul class="nav nav-tabs">
						    <li class="nav-item">
						      <a class="nav-link active" data-toggle="tab" href="#description">Description</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" data-toggle="tab" href="#review">Reviews(02)</a>
						    </li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
						    <div id="description" class="tab-pane active">
						      <p>This tropic port aboard this tiny ship today still wanted by the government apartment in the sky moving on up to the east side a family to explore strange new worlds to seek out new life and new civilizations to boldly go where new worlds to seek out new life and new civilizations to boldly no man has gone before you would see the biggest gift would be from me and the card.</p>
						      <p>That this group would somehow form a family that's the way we all became the Brady Bunch apartment in the sky moving on up to the east side a family to explore strange new worlds.</p>
						    </div>
						    <div id="review" class="tab-pane fade">
						      <div class="single-review clearfix">
									<img src="images/blog/17.jpg" alt="" class="float-left">
									<div class="comment float-left">
										<h6>Alex Martin</h6>
										<ul>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star-half-o" aria-hidden="true"></i></li>
										</ul>
										<p>Its a civilizations to boldly go where no man has gone before you would see the biggest gift would be from me and the card attached would say thank you.</p>
									</div> <!-- /.comment -->
								</div> <!-- /.single-review -->
								<div class="single-review clearfix">
									<img src="{{ asset('assets') }}/front/images/blog/17.jpg" alt="" class="float-left">
									<div class="comment float-left">
										<h6>James Frank</h6>
										<ul>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star-half-o" aria-hidden="true"></i></li>
										</ul>
										<p>Its a civilizations to boldly go where no man has gone before you would see the biggest gift would be from me and the card attached would say thank you.</p>
									</div> <!-- /.comment -->
								</div> <!-- /.single-review -->
						    </div>
						</div>
					</div> <!-- /.product-review-tab -->
					<div class="related-product shop-page">
						<div class="theme-title-one">
							<h2>RELATED PRODUCTS</h2>
						</div> <!-- /.theme-title-one -->
						<div class="celarfix">
							<div class="related-product-slider">
								<div class="item">
									<div class="single-product">
										<div class="image-box">
											<img src="{{ asset('assets') }}/front/images/shop/1.jpg" alt="">
										</div> <!-- /.image-box -->
										<div class="product-name">
											<h5><a href="#">Power of Elevation</a></h5>
											<div class="price">$32.70</div>
											<div class="add-to-cart"><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a></div>
										</div>
									</div> <!-- /.single-product -->
								</div> <!-- /.col- -->
								<div class="item">
									<div class="single-product">
										<div class="image-box">
											<img src="{{ asset('assets') }}/front/images/shop/2.jpg" alt="">
										</div> <!-- /.image-box -->
										<div class="product-name">
											<h5><a href="#">Business Plans</a></h5>
											<div class="price">$47.70</div>
											<div class="add-to-cart"><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a></div>
										</div>
									</div> <!-- /.single-product -->
								</div> <!-- /.col- -->
								<div class="item">
									<div class="single-product">
										<div class="image-box">
											<img src="{{ asset('assets') }}/front/images/shop/3.jpg" alt="">
										</div> <!-- /.image-box -->
										<div class="product-name">
											<h5><a href="#">Consulting Bible</a></h5>
											<div class="price">$26.00</div>
											<div class="add-to-cart"><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a></div>
										</div>
									</div> <!-- /.single-product -->
								</div> <!-- /.col- -->
								<div class="item">
									<div class="single-product">
										<div class="image-box">
											<img src="{{ asset('assets') }}/front/images/shop/4.jpg" alt="">
										</div> <!-- /.image-box -->
										<div class="product-name">
											<h5><a href="#">Process Consulting</a></h5>
											<div class="price">$46.00</div>
											<div class="add-to-cart"><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a></div>
										</div>
									</div> <!-- /.single-product -->
								</div> <!-- /.col- -->
								<div class="item">
									<div class="single-product">
										<div class="image-box">
											<img src="{{ asset('assets') }}/front/images/shop/5.jpg" alt="">
										</div> <!-- /.image-box -->
										<div class="product-name">
											<h5><a href="#">Science of overcoming</a></h5>
											<div class="price"><del>$36.00 </del> $32.70</div>
											<div class="add-to-cart"><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a></div>
										</div>
									</div> <!-- /.single-product -->
								</div> <!-- /.col- -->
								<div class="item">
									<div class="single-product">
										<div class="image-box">
											<img src="{{ asset('assets') }}/front/images/shop/6.jpg" alt="">
										</div> <!-- /.image-box -->
										<div class="product-name">
											<h5><a href="#">Threescore & More</a></h5>
											<div class="price">$30.10</div>
											<div class="add-to-cart"><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a></div>
										</div>
									</div> <!-- /.single-product -->
								</div> <!-- /.col- -->
								<div class="item">
									<div class="single-product">
										<div class="image-box">
											<img src="{{ asset('assets') }}/front/images/shop/7.jpg" alt="">
										</div> <!-- /.image-box -->
										<div class="product-name">
											<h5><a href="#">The Mckinsey Way</a></h5>
											<div class="price"><del>$43.00 </del>$40.00</div>
											<div class="add-to-cart"><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a></div>
										</div>
									</div> <!-- /.single-product -->
								</div> <!-- /.col- -->
								<div class="item">
									<div class="single-product">
										<div class="image-box">
											<img src="{{ asset('assets') }}/front/images/shop/8.jpg" alt="">
										</div> <!-- /.image-box -->
										<div class="product-name">
											<h5><a href="#">Outlier Approach</a></h5>
											<div class="price">$33.00</div>
											<div class="add-to-cart"><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a></div>
										</div>
									</div> <!-- /.single-product -->
								</div> <!-- /.col- -->
								<div class="item">
									<div class="single-product">
										<div class="image-box">
											<img src="{{ asset('assets') }}/front/images/shop/9.jpg" alt="">
										</div> <!-- /.image-box -->
										<div class="product-name">
											<h5><a href="#">Velocity Advantage</a></h5>
											<div class="price">$26.15</div>
											<div class="add-to-cart"><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART</a></div>
										</div>
									</div> <!-- /.single-product -->
								</div> <!-- /.col- -->
							</div> <!-- /.related-product-slider -->
						</div>
					</div> <!-- /.related-product -->
				</div> <!-- /.container -->
			</div> <!-- /.shop-details -->
			
@endsection