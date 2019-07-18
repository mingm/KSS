@extends('layouts.kss')

@section('content')

        <div id="page-wrapper">
			<div class="row horizontal">
				<div class="col-lg-12">
					<h2 class="page-header text-info">ลูกค้า</h2>
				</div>
            </div>
			<div class="row">
				<div class="col-lg-6">
					<div class="panel panel-info">
						<div class="panel-heading">
						@if($method == 'POST')
							<i class="glyphicon glyphicon-plus-sign"></i>  เพิ่มรายการ
						@elseif($method == 'PUT')
							<i class="glyphicon glyphicon-plus-sign"></i>  แก้ไขรายการ
						@endif
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									@include('shared.customerform', ['customer' => $customer, 'method' => $method])
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	<!--End Content-->

	
	</div>

@endsection
