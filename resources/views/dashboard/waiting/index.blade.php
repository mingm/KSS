@extends('layouts.kss')

@section('content')


        <div id="page-wrapper">
			<div class="row horizontal">
				<div class="col-lg-12">
					<h2 class="page-header">สินค้ารอส่งซ่อม</h2>
				</div>
            </div>
			
			<div class="row horizontal">
				<div class="col-lg-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4>สินค้ารอส่งซ่อม</h4>
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
											<th>เลขที่บิลเคลมสินค้า</th>
											<th>สถานะ</th>
											<th class="text-center" style="width: 100px;">คำสั่ง</th>
										</tr>
									</thead>
									<tbody>
									@foreach ($claims as $claim)
									<tr>
										<td class="text-center">{{ $loop->iteration + (($claims->currentPage() - 1) * $claims->perPage()) }}</td>
										<td>{{ $claim->claim_code}}</td>
										@if ($claim->status === 'Completed')
										<td><label class="label label-danger">เรียบร้อย</label></td>
										@else
										<td><label class="label label-danger">ยังไม่เรียบร้อย</label></td>
										@endif	
										<td class="text-center">
											<div class="btn-group">
												<a href="{{ url('claims/print/' . $claim->id ) }}" target="_blank" class="btn btn-xs btn-info" title="Print"><i class="glyphicon glyphicon-eye-open"></i></a>
												<a href="{{ url('/home/dashboard/waiting/' . $claim->id ) }}"  class="btn btn-xs btn-warning" title="Edit"><i class="glyphicon glyphicon-log-in"></i></a>
											</div>
										</td>
									</tr>
									@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row horizontal">
				<div class="col-lg-12">
					{{ $claims->links('shared.pagination') }}
				</div>
			</div>
	
	<!--End Content-->

	
	</div>
@endsection