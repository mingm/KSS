<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Bootstrap core CSS-->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">ลงชื่อเพื่อเข้าใช้งานระบบ</div>
        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
		  @csrf
            <div class="form-group">
              <div class="form-label-group">
                <input id="emp_id" type="text" class="form-control{{ $errors->has('emp_id') ? ' is-invalid' : '' }}" name="emp_id" value="{{ old('emp_id') }}" placeholder="รหัสพนักงาน" required autofocus>
                <label for="emp_id">รหัสพนักงาน</label>
				
				@if ($errors->has('emp_id'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('emp_id') }}</strong>
					</span>
				@endif
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="รหัสผ่าน">
                <label for="password">รหัสผ่าน</label>
				
				@if ($errors->has('password'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
				
              </div>
            </div>

			<button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
          </form>
        </div>
      </div>
    </div>

	<!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin.min.js') }}"></script>
</body>
</html>