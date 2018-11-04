@extends('layouts.kss')

@section('content')

	<div id="page-wrapper">
		<div class="row horizontal">
			<div class="col-lg-12">
				<h2 class="page-header">รายการเคลมสินค้า</h2>
			</div>
		</div>
		
		<div class="row horizontal">
			<div class="col-lg-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4>Claim code: {{ $claim->claim_code }}</h4>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group col-md-4">
									<label for="customer" class="text-info">ชื่อลูกค้า:</label>
									{{ $claim->customer->first_name . ' ' . $claim->customer->last_name }}
								</div>
								<div class="form-group col-md-4">
									<label for="customer" class="text-info">เบอร์โทร:</label>
									{{ $claim->customer->phone }}
								</div>
								<div class="form-group col-md-4">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group col-md-12">
									<label for="customer" class="text-info">ที่อยู่:</label>
									{{ $claim->customer->address }}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<!--h2>รายการสินค้าส่งเคลม</h2-->
								<hr />
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<div class="table-responsive">
										<table class="table table-condensed table-hover">
											<thead>
												<tr>			  		
													<th class="text-info">ผู้นำเข้าสินค้า</th>
													<th class="text-info">ชื่อสินค้า/โมเดล</th>
													<th class="text-info">ซีเรียลนัมเบอร์</th>
													<th class="text-info">อาการเสีย</th>
													<th class="text-info">ลักษณะพิเศษ</th>	
													<th class="text-info">สิ่งที่นำมาด้วย</th>	
													<th class="text-info">หมายเหตุ</th>
													<th class="text-info">สถานะ</th>
												</tr>
											</thead>
											<tbody>
											@foreach ($claimProductAll as $claimProduct)
												<tr>
													<td>{{ $claimProduct->product->vendor->name }}</td>
													<td>{{ $claimProduct->product->name }}</td>
													<td>{{ $claimProduct->serial_number }}</td>
													<td>{{ $claimProduct->claim_detail }}</td>
													<td>{{ $claimProduct->specific_detail }}</td>
													<td>{{ $claimProduct->package_bundle }}</td>
													<td>{{ $claimProduct->note }}</td>
													<td>{{ $claimProduct->latestClaimProductAction()->status }}</td>
												</tr>
											@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<div class="col-lg-4">
									</div>
									<div class="col-lg-4">
										<a href="{{ url('/home/dashboard/waiting/') }}"  class="btn btn-default">กลับ</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
			
	
	<!--End Content-->

	
	</div>
@endsection