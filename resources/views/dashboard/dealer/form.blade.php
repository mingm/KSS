@extends('layouts.kss')

@section('content')
	<!--Start Content-->
		

<div id="page-wrapper">
	<div class="row horizontal">
		<div class="col-lg-12">
			<h2 class="page-header">สินค้าที่รับคืนจากผู้จำหน่าย</h2>
		</div>
	</div>
	
	<div class="row horizontal">
		<div class="col-lg-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4>สินค้าที่รับคืนจากผู้จำหน่าย</h4>
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
									<th>เลขที่บิลเคลมสินค้า</th>
									<th>ชื่อสินค้า</th>
									<th>ซีเรียลนัมเบอร์</th>									
									<th>สถานะ</th>
									<th class="text-center" style="width: 100px;">คำสั่ง</th>
								</tr>
							</thead>
							<form class="form-horizontal" action="{{ url('/home/dashboard/dealer/' . $billSub->id) }}" method="POST">
							@csrf
							<tbody>
							@foreach ($billSub->billsubProducts as $billSubProduct)
							<tr>
								<td class="text-center">{{ $loop->index + 1 }}</td>
								<td>{{ $billSub->billsub_code}}</td>
								<td>{{ $billSubProduct->claim->claim_code }}</td>
								<td>{{ $billSubProduct->claimProduct->product->name }}</td>
								<td>{{ $billSubProduct->claimProduct->serial_number }}</td>
								<td>{{ $billSubProduct->claimProduct->latestClaimProductAction()->status }}</td>	
								<td class="text-center">
								@if ($billSubProduct->claimProduct->latestClaimProductAction()->status === 'Transfer to dealer')
									<input type="checkbox" name="updateList[]" value="{{ $billSubProduct->claimProduct->id }}" />
								@else
									-
								@endif	
								</td>
							</tr>
							@endforeach
							<tr>
								<td colspan="7">
									<button type="submit" class="btn btn-primary" id="" data-loading-text="Loading..." autocomplete="off">บันทึกรายการ</button>
								</td>
							</tr>
							</tbody>
							</form>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

<!--End Content-->
</div>
@endsection