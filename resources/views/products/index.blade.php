@extends('layouts.kss')

@section('content')

        <div id="page-wrapper">
			<div class="row horizontal">
				<div class="col-lg-12">
					<h2 class="page-header">รายการสินค้า</h2>
				</div>
            </div>
			
			<div class="row horizontal">
				<div class="col-lg-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4>สินค้าทั้งหมด</h4>
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
											<th>ชื่อสินค้า</th>
											<th>รุ่นโมเดล</th>
											<th>รายละเอียด</th>
											<th class="text-center" style="width: 100px;">คำสั่ง</th>
										</tr>
									</thead>
									<tbody>
									@foreach ($products as $product)
									<tr>
										<td class="text-center">{{ $loop->iteration + (($products->currentPage() - 1) * $products->perPage()) }}</td>
										<td>{{ $product->name }}</td>
										<td>{{ $product->model }}</td>
										<td>{{ $product->description }}</td>
										<td class="text-center">
											<div class="btn-group">
												<a href="{{ url('/products/' . $product->id ) }}"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-log-in"></i></a>
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
						<li><a href="{{ url('/products/create') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> เพิ่มรายการ</a></li>
					</ul>
					{{ $products->links('shared.pagination') }}

				</div>
			</div>
	
	<!--End Content-->

	
	</div>
@endsection