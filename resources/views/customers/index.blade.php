@extends('layouts.kss')

@section('content')

        <div id="page-wrapper">
			<div class="row horizontal">
				<div class="col-lg-12">
					<h2 class="page-header">ลูกค้า</h2>
				</div>
            </div>
			
			<div class="row horizontal">
				<div class="col-lg-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4>ข้อมูลลูกค้า</h4>
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
											<th>email</th>
											<th>ชื่อลูกค้า</th>
											<th>สกุล</th>
											<th>ที่อยู่</th>
											<th>หมายเหตุ</th>
											<th>เบอร์โทรศัพท์</th>
											<th class="text-center" style="width: 100px;">คำสั่ง</th>
										</tr>
									</thead>
									<tbody>		
									@foreach ($customers as $customer)
									<tr>
										<td class="text-center">{{ $loop->iteration + (($customers->currentPage() - 1) * $customers->perPage()) }}</td>
										<td>{{ $customer->email}}</td>
										<td>{{ $customer->first_name}}</td>
										<td>{{ $customer->last_name}}</td>
										<td>{{ $customer->address}}</td>
										<td>{{ $customer->note}}</td>
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
				</div>
			</div>
			
			<div class="row horizontal">
				<div class="col-lg-12">
					<ul class="pagination pull-left">
						<li><a href="{{ url('/customers/create') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> เพิ่มรายการ</a></li>
					</ul>
					{{ $customers->links('shared.pagination') }}
				</div>
			</div>
	
	<!--End Content-->

	
	</div>
@endsection