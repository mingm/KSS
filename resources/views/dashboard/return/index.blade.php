@extends('layouts.kss')

@section('content')
	<!--Start Content-->
		

<div id="page-wrapper">
	<div class="row horizontal">
		<div class="col-lg-12">
			<h2 class="page-header">รายการสินค้ารอส่งคืนลูกค้า</h2>
		</div>
	</div>
	
	<div class="row horizontal">
		<div class="col-lg-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4>รายการสินค้ารอส่งคืนลูกค้า</h4>
				</div>
				<div class="panel-body">
					
					<div class="panel-group">
						<div class="col-md-8"></div>
						<div class="input-group custom-search-form col-md-4">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<button class="btn btn-default" type="button">
								<i class="fa fa-search"></i>
							</button>
						</span>
						</div>
					</div>							
					
					<div class="table-responsive">
						<form class="form-horizontal" action="{{ url('/home/dashboard/return/') }}" method="POST">
						@csrf
						<table class="table table-condensed table-hover">
							<thead>
								<tr>
									<th class="text-center" style="width: 50px;">ลำดับ</th>
									<th>เลขที่บิลเคลมสินค้า</th>
									<th>ชื่อสินค้า/โมเดล</th>
									<th>ชื่อลูกค้า</th>
									<th>สกุล</th>
									<th>เบอร์โทรศัพท์</th>
									<th class="text-center" style="width: 100px;">คำสั่ง</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($claimProducts as $claimProduct)
								<tr>
									<td class="text-center">{{ $loop->iteration + (($claimProducts->currentPage() - 1) * $claimProducts->perPage()) }}</td>
									<td>{{ $claimProduct->claim->claim_code}}</td>
									<td>{{ $claimProduct->product->name}}</td>
									<td>{{ $claimProduct->claim->customer->first_name}}</td>
									<td>{{ $claimProduct->claim->customer->last_name}}</td>
									<td>{{ $claimProduct->claim->customer->phone}}</td>									
									<td class="text-center">
										<div class="btn-group">
											<input type="checkbox" name="updateList[]" value="{{ $claimProduct->id }}" />
										</div>
									</td>
								</tr>
								@endforeach
								<tr>
									<td colspan="7">
										<button type="submit" class="btn btn-primary" id="" data-loading-text="Loading..." autocomplete="off">บันทึกรายการ</button>
									</td>
								</tr>
							</tbody>
						</table>
						</form>
					</div>
					
	
					<div class="row horizontal">
						<div class="col-lg-12">
							{{ $claimProducts->links('shared.pagination') }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!--End Content-->
</div>
@endsection