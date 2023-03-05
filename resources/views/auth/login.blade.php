<x-guest-layout>


    <!doctype html>
<html lang="en">
  <head>
  	<title>Login 07</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('login-form-11\css\style.css') }}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2> مرحبا بكم في   </h2>
								<p>إرشيف مكتب وزير الأوقاف والإرشاد</p>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4 float-right">تسجيل الدخول</h3>
			      		</div>
							
			      	</div>
							<form method="POST" action="{{ route('login') }}" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label class="label float-right" for="name">البريد الإلكتروني</label>
			      			<input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus>
			      		</div>
		            <div class="form-group mb-3 ">
		            	<x-jet-label for="password" class="float-right" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
           </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary submit px-3">{{ __('Log in') }}</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
                            <label for="remember_me" class="flex items-center">
                                <label for="remember_me" class="flex items-center">

                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">نسيت كلمة المرور</a>
									</div>
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('login-form-11\js\main.js') }}"></script>
  <script src="{{ asset('login-form-11\js\popper.js') }}"></script>
  <script src="{{ asset('login-form-11\js\bootstrap.min.js') }}"></script>
  <script src="{{ asset('login-form-11\js\main.js') }}"></script>

	</body>
</html>


</x-guest-layout>
