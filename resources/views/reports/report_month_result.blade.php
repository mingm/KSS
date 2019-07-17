@extends('layouts.kss')

@section('content')
		
        <div id="page-wrapper">
			<div class="row horizontal">
				<div class="col-lg-12">
					<h2 class="page-header">รายงานระบบ</h2>
				</div>
            </div>
			
			<div class="row horizontal">
				<div class="col-lg-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4>ยอดสินค้าส่งเคลมสูงสุด</h4>
						</div>
						<div class="panel-body">

							<div class="table-responsive">
								<table class="table table-condensed table-hover">
									<thead>
										<tr>
											<th class="text-center" style="width: 50px;">ลำดับ</th>
											<th>ชื่อสินค้า</th>
											<th>รุ่นโมเดล</th>
											<th>รายละเอียด</th>
										</tr>
									</thead>
									<tbody>
									@if (count($results) > 0)
									@foreach ($results as $result)
									<tr>
										<td class="text-center">{{ $loop->iteration + (($results->currentPage() - 1) * $results->perPage()) }}</td>
										<td>{{ $result->name }}</td>
										<td>{{ $result->model }}</td>
										<td>{{ $result->total }}</td>
									</tr>
									@endforeach
									@else
									<tr>
										<td colspan="4" class="text-center">NO RESULT FOUND</td>
									</tr>
									@endif
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row horizontal">
				<div class="col-lg-12">
				
					<ul class="pagination pull-left">
						<li><a href="{{ url('/reports') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i>ย้อนกลับ</a></li>
					</ul>
					
					{{ $results->links('shared.pagination') }}
				</div>
			</div>
			
@endsection
