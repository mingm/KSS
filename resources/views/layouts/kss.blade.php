<!DOCTYPE html>
<html>
	<head>
		<title><!--BLANL--></title>
		
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
	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      

				<ul class="nav navbar-nav navbar-right">        

					<li id="navDashboard"><a href="#"><i class="glyphicon glyphicon-list-alt"></i>  แผงควบคุม</a></li>        

					<li class="dropdown" id="navData">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-folder-open"></i>    ตั้งค่าข้อมูล  <span class="caret"></span></a>
						<ul class="dropdown-menu">            
							<li id="navBrand"><a href="#"> <i class="glyphicon glyphicon-plus"></i> เพิ่มแบรนด์สินค้า</a></li>            
							<li id="navCategories"><a href="#"> <i class="glyphicon glyphicon-plus"></i>  เพิ่มหมวดหมู่สินค้า</a></li>
							<li id="navProduct"><a href="#"> <i class="glyphicon glyphicon-plus"></i>  เพิ่มสินค้า</a></li>
							<div class="divider"></div>
								<li id="navVendors"><a href="#"> <i class="glyphicon glyphicon-plus"></i>  ผู้จัดจำหน่าย</a></li> 
							<div class="dropdown-divider"></div>  
								<li id="navCustomers"><a href="#"> <i class="glyphicon glyphicon-plus"></i>  ข้อมูลลูกค้า</a></li>
						</ul>
					</li>

					<li class="dropdown" id="navClaim">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-th-large"></i>  ระบบเคลมสินค้า  <span class="caret"></span></a>
						<ul class="dropdown-menu">            
							<li id="navBrand"><a href="#"> <i class="glyphicon glyphicon-edit"></i> เพิ่มรายการเคลมสินค้า</a></li>   
								<div class="divider"></div>							
							<li id="navCategories"><a href="#"> <i class="glyphicon glyphicon-edit"></i>  เพิ่มรายการส่งเคลมสินค้า</a></li>
								<div class="divider"></div>  
						</ul>
					</li> 					

					<li id="navReport"><a href="#"> <i class="glyphicon glyphicon-check"></i> รายงาน </a></li>
					
					<li class="dropdown" id="navSetting">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
						<ul class="dropdown-menu">            
							<li id="topNavSetting"><a href="#"> <i class="glyphicon glyphicon-wrench"></i> การตั้งค่า</a></li>            
							<li id="topNavLogout"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="glyphicon glyphicon-log-out"></i> ออกจากระบบ</a></li>            
						</ul>
					</li>           
				</ul>
				
			</div><!-- /.navbar-collapse -->
			
		</div><!-- /.container-fluid -->
		
	</nav>

	@yield('content')

	</body>
</html>
