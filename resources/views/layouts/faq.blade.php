@extends('layouts.master')
@section('title','Frequently Asked Questions')
@section('content')

			
			<!-- 
			=============================================
				Theme Inner Banner
			============================================== 
			-->
			<div class="theme-inner-banner section-spacing">
				<div class="overlay">
					<div class="container">
						<h2>Frequently Asked Questions</h2>
						<p>{!! $tangkap2->deskripsicarousel !!}</p>
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.theme-inner-banner -->


			<!--
			=====================================================
				Faq Page
			=====================================================
			-->
			<div class="faq-page section-spacing">
				<div class="container">
					<div class="theme-title-one">
						{{-- <h2 class="text-center">Frequently Asked Questions</h2>
						<p>A tale of a fateful trip that started from this tropic port aboard this tiny ship today stillers</p> --}}
					</div> <!-- /.theme-title-one -->

	        		<div class="faq-panel">
						<div class="panel-group theme-accordion" id="accordion">
							<?php $count = 0 ?>
                    		@foreach ( $faq as $row )
							<div class="panel">
								<div class="panel-heading @if($count == 0) active-panel @endif">
									<h6 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$count}}">
											<p>{{ $row->pertanyaan }}</p>
										</a>
									</h6>
								</div>
								<div id="collapse{{$count}}" class="panel-collapse collapse @if($count == 0) show @endif">
									<div class="panel-body">
										<p>{{ $row->jawaban }}</p>
									</div>
								</div>
							</div> <!-- /panel 1 -->
							<?php $count++ ?>
							@endforeach
						</div> <!-- end #accordion -->
					</div> <!-- /.faq-panel -->
				</div> <!-- /.container -->
			</div> <!-- /.faq-page -->



			<!--
			=====================================================
				Partner Slider
			=====================================================
			-->
			<div class="partner-section bg-color">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-4 col-12">
							<h6>OUR <br>PARTNERS</h6>
						</div>
						<div class="col-md-9 col-sm-8 col-12">
							<div class="partner-slider">
								<div class="item"><img src="{{ asset('assets') }}/front/images/logo/p-1.png" alt=""></div>
								<div class="item"><img src="{{ asset('assets') }}/front/images/logo/p-2.png" alt=""></div>
								<div class="item"><img src="{{ asset('assets') }}/front/images/logo/p-3.png" alt=""></div>
								<div class="item"><img src="{{ asset('assets') }}/front/images/logo/p-4.png" alt=""></div>
								<div class="item"><img src="{{ asset('assets') }}/front/images/logo/p-5.png" alt=""></div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- /.partner-section -->
@endsection