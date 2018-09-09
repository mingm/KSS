<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Laravel') }}</title>
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- MetisMenu CSS -->
    <link href="{{ asset('vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">
	
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

</head>


<body>

    <div class="container">
        <div class="row vertical">
            <div class="col-md-5 col-md-offset-3">
                <div class="login-panel panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">ลงชื่อเพื่อใช้งานระบบ</h3>
                    </div>
					<div class="panel-body">
						<form class="form-horizontal" action="{{ route('login') }}" method="POST" id="loginForm">
						@csrf
							<fieldset>
								@if ($errors->has('emp_id'))
								<div class="form-group">
									<div class="col-md-8 col-md-offset-3 ">
										<div class="alert alert-danger" role="alert">Error! รหัสผ่านหรือรหัสผู้ใช้งานไม่ถูกต้อง</div>
									</div>
								</div>
								@endif
								<div class="form-group">
									<label for="emp_id" class="col-sm-3 control-label">รหัสพนักงาน</label>
									<div class="col-sm-8">
										<input type="text" class="form-control{{ $errors->has('emp_id') ? ' is-invalid' : '' }}" id="emp_id" name="emp_id" placeholder="รหัสพนักงาน" value="{{ old('emp_id') }}" required autofocus />
									</div>
								</div>
								
								<div class="form-group">
									<label for="password" class="col-sm-3 control-label">รหัสผ่าน</label>
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
									<div class="col-sm-offset-4 col-sm-6">
										<button type="submit" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-log-in"></i>          เข้าสู่ระบบ</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- jQuery -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('vendor/metisMenu/metisMenu.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('dist/js/sb-admin-2.js') }}"></script>

</body>

</html>
