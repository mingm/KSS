@extends('layouts.kss')

@section('content')
<div id="page-wrapper">
			<div class="row horizontal">
				<div class="col-lg-12">
					<h2 class="page-header text-info">แบรนด์สินค้า</h2>
				</div>
            </div>
			<div class="row">
				<div class="col-lg-6">
					<div class="panel panel-info">
						<div class="panel-heading">
						@if($brandMethod == 'POST')
							<i class="glyphicon glyphicon-plus-sign"></i>  เพิ่มรายการ
						@elseif($brandMethod == 'PUT')
							<i class="glyphicon glyphicon-plus-sign"></i>  แก้ไขรายการ
						@endif
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">									
									<form action="{{ url('brands/' . $brand->id) }}" method="POST">
									@csrf
									@method($brandMethod)
										<div class="form-group">
											<label class="text-info">ชื่อแบรนด์สินค้า</label>
											<input type="text" class="form-control" id="name" name="name" placeholder="ชื่อแบรนด์สินค้า" value="{{ $brand->name }}" required>
				
											@if ($errors->has('name'))
												<span class="alert alert-danger" role="alert">
													<strong>{{ $errors->first('name') }}</strong>
												</span>
											@endif
										</div>
										
										<div class="form-group">
											<label class="text-info">เลือกสถานะ</label>
											<select class="form-control" id="status" name="status" required>
												<option value="">~~เลือกสถานะ~~</option>
												<option {{ $brand->status === "Active" ? "selected" : "" }} value="Active" >เปิดการใช้งาน</option>
												<option {{ $brand->status === "Inactive" ? "selected" : "" }} value="Inactive">ยังไม่เปิดใช้งาน</option>
											</select>
											
											@if ($errors->has('status'))
												<span class="alert alert-danger" role="alert">
													<strong>{{ $errors->first('status') }}</strong>
												</span>
											@endif
										</div>
										<button type="submit" class="btn btn-primary" id="" data-loading-text="Loading..." autocomplete="off">บันทึกรายการ</button>
										<a href="{{ url('/brands') }}" class="btn btn-default">กลับ</a>
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
