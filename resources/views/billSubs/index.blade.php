@extends('layouts.kss')

@section('content')
	<!--Start Content-->
		

<div id="page-wrapper">
	<div class="row horizontal">
		<div class="col-lg-12">
			<h2 class="page-header">รายการสินค้าส่งเคลมผู้นำเข้า</h2>
		</div>
	</div>
	
	<div class="row horizontal">
		<div class="col-lg-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4>รายการส่งเคลม</h4>
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
						<table class="table table-condensed table-hover">
							<thead>
								<tr>
									<th class="text-center" style="width: 50px;">ลำดับ</th>
									<th>เลขที่บิลส่งผู้จำหน่าย</th>
									<th>ผู้จำหน่าย</th>
									<th>สถานะ</th>
									<th class="text-center" style="width: 100px;">คำสั่ง</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($billSubs as $billSub)
							<tr>
								<td class="text-center">{{ $loop->iteration + (($billSubs->currentPage() - 1) * $billSubs->perPage()) }}</td>
								<td>{{ $billSub->billsub_code}}</td>
								<td>{{ $billSub->vendor->name }}</td>
								<td>{{ $billSub->status }}</td>	
								<td class="text-center">
									<form class="form-horizontal" action="{{ url('/billSubs/moveToDealer/' . $billSub->id) }}" method="POST">
									@csrf
									<div class="btn-group">
										<a href="{{ url('billSubs/print/' . $billSub->id ) }}" target="_blank" class="btn btn-xs btn-info" title="Print"><i class="glyphicon glyphicon-eye-open"></i></a>
									@if ($billSub->status === 'New')
										<button type="submit" class="btn btn-xs btn-success" title="Move to dealer"><i class="fa fa-arrow-circle-right"></i></button>
									@endif
									</div>
									</form>
								</td>
							</tr>
							@endforeach
							</tbody>
						</table>
					</div>
					
	
					<div class="row horizontal">
						<div class="col-lg-12">
							<ul class="pagination pull-left">
								<li><a href="{{ url('billSubs/generate') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> สร้างรายการสินค้าส่งเคลมผู้นำเข้า</a></li>
							</ul>
							{{ $billSubs->links('shared.pagination') }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!--End Content-->
</div>
@endsection