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
						<h4>STEP 2 : Claim Product</h4>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group col-md-4">
									<label for="customer" class="text-info">ชื่อลูกค้า:</label>
									{{ $customer->first_name . ' ' . $customer->last_name }}
								</div>
								<div class="form-group col-md-4">
									<label for="customer" class="text-info">เบอร์โทร:</label>
									{{ $customer->phone }}
								</div>
								<div class="form-group col-md-4">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group col-md-12">
									<label for="customer" class="text-info">ที่อยู่:</label>
									{{ $customer->address }}
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
								<ul class="pagination pull-left">
									<li><a href="{{ url('/claims/create?step=3') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> เพิ่มรายการสินค้า</a></li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<div class="table-responsive">
										<table class="table table-condensed table-hover">
											<thead>
												<tr>			  			
													<th class="text-info">ชื่อสินค้า/โมเดล</th>
													<th class="text-info">ซีเรียลนัมเบอร์</th>
													<th class="text-info">อาการเสีย</th>
													<th class="text-info">ลักษณะพิเศษ</th>	
													<th class="text-info">สิ่งที่นำมาด้วย</th>	
													<th class="text-info">หมายเหตุ</th>
													<th class="text-info">เครื่องมือ</th>
												</tr>
											</thead>
											<tbody>
											@foreach ($claimProductAll as $claimProduct)
												<tr>
													<td>{{ $claimProduct->product->name }}</td>
													<td>{{ $claimProduct->serial_number }}</td>
													<td>{{ $claimProduct->claim_detail }}</td>
													<td>{{ $claimProduct->specific_detail }}</td>
													<td>{{ $claimProduct->package_bundle }}</td>
													<td>{{ $claimProduct->note }}</td>
													<td>														
														<button class="btn btn-danger" type="button" id="removeProductClaimBtn"><i class="glyphicon glyphicon-trash"></i></button>
														<a href="{{ url('claims/create?step=4&productId=' . $claimProduct->product_id ) }}"  class="btn btn-warning" data-toggle="tooltip" title="Copy"><i class="glyphicon glyphicon-copy"></i></a>
													</td>
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
									<form class="form-horizontal" action="{{ url('claims/create?step=5') }}" method="POST">
									@csrf
									@if (count($claimProductAll) > 0)
										<button type="submit" class="btn btn-primary" id="" data-loading-text="Loading..." autocomplete="off">บันทึกรายการ</button>
									@endif
										<a href="{{ url('claims/') }}"  class="btn btn-default">กลับ</a>
									</form>
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