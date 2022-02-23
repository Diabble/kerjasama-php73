<!doctype html>
<html lang="en">
  <head>
  	<title>Admin Sistem Kerjasama dan Informasi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('assets/login')}}/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Admin Sistem Kerjasama dan Informasi</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<!--h3 class="mb-4 text-center">Sign In</h3-->
		      	<form action="/postlogin" method="POST" class="signin-form">
					  @csrf
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="email" placeholder="Email" required>
		      		</div>
	            <div class="form-group">
	              <input type="password" class="form-control" name="password" placeholder="Password" required>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
	            </div>
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('assets/login')}}/js/jquery.min.js"></script>
  <script src="{{asset('assets/login')}}/js/popper.js"></script>
  <script src="{{asset('assets/login')}}/js/bootstrap.min.js"></script>
  <script src="{{asset('assets/login')}}/js/main.js"></script>

	</body>
</html>