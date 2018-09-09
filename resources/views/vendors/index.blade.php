@extends('layouts.kss')

@section('content')


<div id="page-wrapper">
			<div class="row horizontal">
				<div class="col-lg-12">
					<h2 class="page-header">ผู้นำเข้าสินค้า</h2>
				</div>
            </div>
			
			<div class="row horizontal">
				<div class="col-lg-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4>ผู้นำเข้าสินค้า</h4>
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
											<th>รายการ</th>
											<th>ที่อยู่ติดต่อ</th>
											<th>เบอร์โทรศัพท์</th>
											<th class="text-center" style="width: 100px;">คำสั่ง</th>
										</tr>
									</thead>
									<tbody>									
									@foreach ($vendors as $vendor)
									<tr>
										<td class="text-center">{{ $loop->iteration + (($vendors->currentPage() - 1) * $vendors->perPage()) }}</td>
										<td>{{ $vendor->name }}</td>
										<td>{{ $vendor->details }}</td>
										<td>{{ $vendor->phone }}</td>
										<td class="text-center">
											<div class="btn-group">
												<a href="{{ url('/vendors/' . $vendor->id ) }}" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-log-in"></i></a>
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
						<li><a href="{{ url('/vendors/create') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> เพิ่มรายการ</a></li>
					</ul>
					{{ $vendors->links('shared.pagination') }}

				</div>
			</div>
	
	<!--End Content-->

	
	</div>
@endsection