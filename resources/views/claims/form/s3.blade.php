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
						<h4>STEP 3 : Add Product</h4>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
							<form action="{{ url('claims/create?step=3') }}" method="POST">
							@csrf
								<div class="col-lg-6">
										<div class="form-group">
											<label class="text-info">ชื่อสินค้า</label>
											<input type="text" class="form-control" id="name" name="name" placeholder="ชื่อสินค้า">
										</div>
										<div class="form-group">
											<label class="text-info">โมเดล</label>
											<input type="text" class="form-control" id="model" name="model" placeholder="โมเดล">
										</div>
								</div>		
								<div class="col-lg-6">
										<div class="form-group">
											<label class="text-info">เลือกหมวดหมู่</label>
											<select class="form-control" id="categoryId" name="categoryId">
												<option value="">~~เลือกหมวดหมู่~~</option>
											@foreach ($categories as $category)
												<option value="{{ $category->id }}">{{ $category->name }}</option>
												@include('shared.categories', ['category' => $category, 'categoryId' => ''])
											@endforeach
											</select>
										</div>
										<div class="form-group">
											<label class="text-info">เลือกแบรนด์</label>
											<select class="form-control" id="brandId" name="brandId">
												<option value="">~~เลือกแบรนด์~~</option>
											@foreach ($brands as $brand)
												<option value="{{ $brand->id }}">{{ $brand->name }}</option>
											@endforeach
											</select>
										</div>
										<div class="form-group">
											<label class="text-info">เลือกผู้นำเข้า</label>
											<select class="form-control" id="vendorId" name="vendorId">
												<option value="">~~เลือกผู้นำเข้า~~</option>
											@foreach ($vendors as $vendor)
												<option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
											@endforeach
											</select>
										</div>
								</div>
								<button type="submit" class="btn btn-primary" id="" data-loading-text="Loading..." autocomplete="off">ค้นหาสินค้า</button>
								<a href="{{ url('claims/create?step=2') }}"  class="btn btn-default">กลับ</a>
							</form>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		
		<div class="row horizontal">
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-condensed table-hover">
						<thead>
							<tr>
								<th class="text-center" style="width: 100px;">คำสั่ง</th>
								<th>ชื่อสินค้า</th>
								<th>รุ่นโมเดล</th>
								<th>รายละเอียด</th>
								<th>แบรนด์</th>
								<th>ผู้นำเข้า</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($products as $product)
						<tr>
							<td class="text-center">
								<div class="btn-group">
									<a href="{{ url('/claims/create?step=4&productId=' . $product->id ) }}"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-ok"></i></a>
								</div>
							</td>
							<td>{{ $product->name }}</td>
							<td>{{ $product->model }}</td>
							<td>{{ $product->description }}</td>
							<td>{{ $product->brand->name }}</td>
							<td>{{ $product->vendor->name }}</td>
						</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
			
		<div class="row horizontal">
			<div class="col-lg-12">
				{{ $products->appends(['step' => '3'])->links('shared.pagination') }}
			</div>
		</div>
		
		
			
	
	<!--End Content-->

	
	</div>
@endsection