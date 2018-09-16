@extends('layouts.kss')

@section('content')
	
        <div id="page-wrapper">
			<div class="row horizontal">
				<div class="col-lg-12">
					<h2 class="page-header text-info">รายการสินค้า</h2>
				</div>
            </div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-info">
						<div class="panel-heading text-info">
						@if($method == 'POST')
							<i class="glyphicon glyphicon-plus-sign"></i>  เพิ่มรายการ
						@elseif($method == 'PUT')
							<i class="glyphicon glyphicon-plus-sign"></i>  แก้ไขรายการ
						@endif
						</div>
						</div>
						<div class="panel-body">
							<div class="row">
							<div class="col-lg-12">
								<form action="{{ url('products/' . $product->id) }}" method="POST">
								@csrf
								@method($method)
									<div class="col-lg-6">
											<div class="form-group">
												<label class="text-info">ชื่อสินค้า</label>
												<input type="text" class="form-control" id="name" name="name" placeholder="ชื่อสินค้า" value="{{ $product->name }}" required>
					
												@if ($errors->has('name'))
													<span class="alert alert-danger" role="alert">
														<strong>{{ $errors->first('name') }}</strong>
													</span>
												@endif
											</div>
											<div class="form-group">
												<label class="text-info">โมเดล</label>
												<input type="text" class="form-control" id="model" name="model" placeholder="โมเดล" value="{{ $product->model }}" required>
					
												@if ($errors->has('model'))
													<span class="alert alert-danger" role="alert">
														<strong>{{ $errors->first('model') }}</strong>
													</span>
												@endif
											</div>
											<div class="form-group">
												<label class="text-info">รายละเอียด</label>
												<input type="text" class="form-control" id="description" name="description" placeholder="รายละเอียด" value="{{ $product->description }}" required>
					
												@if ($errors->has('description'))
													<span class="alert alert-danger" role="alert">
														<strong>{{ $errors->first('description') }}</strong>
													</span>
												@endif
											</div>
									</div>		
									<div class="col-lg-6">
											<div class="form-group">
												<label class="text-info">เลือกหมวดหมู่</label>
												<select class="form-control" id="categoryId" name="categoryId" required>
													<option value="">~~เลือกหมวดหมู่~~</option>
												@foreach ($categories as $category)
													<option value="{{ $category->id }}" {{ $category->id === $product->category_id ? "selected" : "" }} >{{ $category->name }}</option>
													@include('shared.categories', ['category' => $category, 'categoryId' => $product->category_id])
												@endforeach
												</select>
											</div>
											<div class="form-group">
												<label class="text-info">เลือกแบรนด์</label>
												<select class="form-control" id="brandId" name="brandId" required>
													<option value="">~~เลือกแบรนด์~~</option>
												@foreach ($brands as $brand)
													<option value="{{ $brand->id }}" {{ $brand->id === $product->brand_id ? "selected" : "" }} >{{ $brand->name }}</option>
												@endforeach
												</select>
											</div>
											<div class="form-group">
												<label class="text-info">เลือกผู้นำเข้า</label>
												<select class="form-control" id="vendorId" name="vendorId" required>
													<option value="">~~เลือกผู้นำเข้า~~</option>
												@foreach ($vendors as $vendor)
													<option value="{{ $vendor->id }}" {{ $vendor->id === $product->vendor_id ? "selected" : "" }}>{{ $vendor->name }}</option>
												@endforeach
												</select>
											</div>
									</div>
									<button type="submit" class="btn btn-primary" id="" data-loading-text="Loading..." autocomplete="off">บันทึกรายการ</button>
									<button type="button" class="btn btn-default">กลับ</button>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	<!--End Content-->

	
	</div>

@endsection
