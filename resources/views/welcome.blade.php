<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>{{ config('app.name', 'Laravel') }}</title>
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{ asset('assests/bootstrap/css/bootstrap.min.css') }}">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="{{ asset('assests/bootstrap/css/bootstrap-theme.min.css') }}">
	<!-- font awesome -->
	<link rel="stylesheet" href="{{ asset('assests/font-awesome/css/font-awesome.min.css') }}">
	<!-- custom css -->
	<link rel="stylesheet" href="{{ asset('custom/css/custom.css') }}">
	<!-- jquery -->
	<script src="{{ asset('assests/jquery/jquery.min.js') }}"></script>
	<!-- jquery ui -->
	<link rel="stylesheet" href="{{ asset('assests/jquery-ui/jquery-ui.min.css') }}">
	<script src="{{ asset('assests/jquery-ui/jquery-ui.min.js') }}"></script>
	<!-- bootstrap js -->
	<script src="{{ asset('assests/bootstrap/js/bootstrap.min.js') }}"></script>
</head>
<body>
	<div class="container">
		<div class="row vertical">
			<div class="col-md-5 col-md-offset-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">ลงชื่อเข้าใช้งานระบบ</h3>
					</div>
					
					<div class="panel-body">
						<form class="form-horizontal" method="POST" action="{{ route('login') }}">
						@csrf
							<fieldset>
							
								<div class="form-group">
									<label for="username" class="col-sm-4 control-label">รหัสพนักงาน</label>
									<div class="col-sm-8">
										<input type="text" class="form-control{{ $errors->has('emp_id') ? ' is-invalid' : '' }}" id="emp_id" name="emp_id" placeholder="รหัสพนักงาน" value="{{ old('emp_id') }}" required autofocus />
										
										@if ($errors->has('emp_id'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('emp_id') }}</strong>
											</span>
										@endif
									</div>
								</div>
								
								<div class="form-group">
									<label for="password" class="col-sm-4 control-label">รหัสผ่าน</label>
									<div class="col-sm-8">
										<input type="password" class="form-control" id="password" name="password" placeholder="รหัสผ่าน" required />
				
										@if ($errors->has('password'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-sm-offset-4 col-sm-8">
										<button type="submit" class="btn btn-default"> <i class="glyphicon glyphicon-log-in"></i> เข้าสู่ระบบ</button>
									</div>
								</div>
								
							</fieldset>
						</form>
					</div>
					<!-- panel-body -->
				</div>
				<!-- /panel -->
			</div>
			<!-- /col-md-4 -->
		</div>
		<!-- /row -->
	</div>
	<!-- container -->
</body>
</html>