@extends('layouts.kss')

@section('content')

        <div id="page-wrapper">
			<div class="row horizontal">
				<div class="col-lg-12">
					<h2 class="page-header">แบรนด์สินค้า</h2>
				</div>
            </div>
			
			<div class="row horizontal">
				<div class="col-lg-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4>แบรนด์สินค้า</h4>
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
											<th class="text-center" style="width: 100px;">ลำดับ</th>
											<th>รายการ</th>
											<th class="text-center" style="width: 200px;">สถานะ</th>
											<th class="text-center" style="width: 200px;">คำสั่ง</th>
										</tr>
									</thead>
									<tbody>
									@foreach ($brands as $brand)
										<tr>
											<td class="text-center">{{ $loop->iteration + (($brands->currentPage() - 1) * $brands->perPage()) }}</td>
											<td>{{ $brand->name }}</td>
											@if ($brand->status === 'Active')
												<td class="text-center"><label class="label label-success">เปิดการใช้งาน</label></td>
											@else
												<td class="text-center"><label class="label label-danger">ยังไม่เปิดใช้งาน</label></td>
											@endif									
											<td class="text-center">
												<div class="btn-group">
													<a href="{{ url('/brands/' . $brand->id ) }}" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-log-in"></i></a>
													<!--button class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove"><i class="glyphicon glyphicon-trash"> </i></button-->
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
					<ul class="pagination pull-left">
						<li><a href="{{ url('/brands/create') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> เพิ่มรายการ</a></li>
					</ul>
					{{ $brands->links('shared.pagination') }}
				</div>
			</div>
	
	<!--End Content-->

	
	</div>
@endsection
