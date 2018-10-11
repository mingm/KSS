@extends('layouts.kss')

@section('content')

        <div id="page-wrapper">
			<div class="row horizontal">
				<div class="col-lg-12">
					<h2 class="page-header">เพิ่มรายการเคลมสินค้า</h2>
				</div>
            </div>
			
			<div class="row horizontal">
				<div class="col-lg-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4>STEP 1 : Search customer</h4>
						</div>
						<div class="panel-body">
							@empty($customers)
							<div class="row">
								<form action="{{ url('claims/create') }}" method="POST">
								@csrf
								@method('POST')
								<input type="hidden" value="1" name="step">
									<div class="row">
										<div class="col-lg-12">
											<div class="col-lg-6">
												<div class="form-group">
													<label class="text-info">ชื่อลูกค้า</label>
													<input type="text" class="form-control" id="first_name" name="first_name" placeholder="ชื่อลูกค้า">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label class="text-info">เบอร์โทรศัพท์</label>
													<input type="text" class="form-control" id="phone" name="phone" placeholder="เบอร์โทรศัพท์">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4"></div>
										<div class="col-lg-4"><button type="submit" class="btn btn-primary" id="" data-loading-text="Loading..." autocomplete="off">ค้นหา</button></div>
										<div class="col-lg-4"></div>
									</div>
								</form>
							</div>
							<div class="row">
								<div class="col-lg-12">
									&nbsp;
								</div>
							</div>
							@endempty
							@isset($customers)
							@if (count($customers) > 0)
							<div class="row">
								<div class="col-lg-12">
									<div class="table-responsive">
										<table class="table table-condensed table-hover">
											<thead>
												<tr>
													<th>ชื่อลูกค้า</th>
													<th>สกุล</th>
													<th>ที่อยู่</th>
													<th>เบอร์โทรศัพท์</th>
													<th class="text-center" style="width: 100px;">คำสั่ง</th>
												</tr>
											</thead>
											<tbody>		
											@foreach ($customers as $customer)
											<tr>
												<td>{{ $customer->first_name}}</td>
												<td>{{ $customer->last_name}}</td>
												<td>{{ $customer->address}}</td>
												<td>{{ $customer->phone}}</td>
												<td class="text-center">
													<div class="btn-group">
														<a href="{{ url('/customers/' . $customer->id ) }}" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-log-in"></i></a>
													</div>
												</td>
											</tr>
											@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							@else
							<div class="row">
								<div class="col-lg-12">
									ไม่พบข้อมูลลูกค้า, กรุณาเพิ่มข้อมูลลูกค้าใหม่
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									&nbsp;
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									@include('shared.customerform', ['customer' => new App\Customer, 'isClaim' => true, 'method' => 'POST'])
								</div>
							</div>
							@endif
							@endisset
						</div>
					</div>
				</div>
			</div>
	
	<!--End Content-->

	
	</div>
@endsection