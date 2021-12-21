<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('template')}}/plugins/images/logo-batulumbung.jpg"> 
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('template')}}/fonts/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('template')}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{asset('template')}}/css/register.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url({{asset('template')}}/plugins/images/img.jpeg);">
					<span class="login100-form-title-1">
						Sign In 
          </span>
          <span class="login100-form-title-2 text-white">
						Sistem Informasi Organisasi Batulumbung
					</span>
				</div>

				<form class="login-form validate-form" method="post" action="{{ route ('loginPost')}}">
				@csrf
					<div class="wrap-input100 validate-input m-b-24" data-validate="Username is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Enter email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
		
					<div class="container-login100-form-btn m-b-26 m-l-71">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

          <div class="txt1">
          <p>Belum punya akun?
            <a href="/register">Registrasi Sekarang</a>
          </p>
          </div>
			</form>
			</div>
		</div>
	</div>
	
<script src="{{asset('template')}}/js/main.js"></script>

</body>
</html>