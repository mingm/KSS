@extends('layouts.kss')

@section('content')
<div id="page-wrapper">
			<div class="row horizontal">
				<div class="col-lg-12">
					<h2 class="page-header text-info">ผู้นำเข้าสินค้า</h2>
				</div>
            </div>
			<div class="row">
				<div class="col-lg-6">
					<div class="panel panel-info">
						<div class="panel-heading">
						@if($vendorMethod == 'POST')
							<i class="glyphicon glyphicon-plus-sign"></i>  เพิ่มรายการ
						@elseif($vendorMethod == 'PUT')
							<i class="glyphicon glyphicon-plus-sign"></i>  แก้ไขรายการ
						@endif
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<form action="{{ url('vendors/' . $vendor->id) }}" method="POST">
									@csrf
									@method($vendorMethod)
										<div class="form-group">
											<label class="text-info">ชื่อผู้นำเข้าสินค้า</label>
											<input type="text" class="form-control" id="name" name="name" placeholder="ชื่อผู้นำเข้าสินค้า" value="{{ $vendor->name }}" required>
				
											@if ($errors->has('name'))
												<span class="alert alert-danger" role="alert">
													<strong>{{ $errors->first('name') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group">
											<label class="text-info">ที่อยู่ติดต่อ</label>
											<textarea class="form-control" rows="3" id="details" name="details" placeholder="ที่อยู่ติดต่อ" required>{{ $vendor->details }}</textarea>
											
											@if ($errors->has('details'))
												<span class="alert alert-danger" role="alert">
													<strong>{{ $errors->first('details') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group">
											<label class="text-info">เบอร์โทรศัพท์</label>
											<input type="text" class="form-control" id="phone" name="phone" placeholder="เบอร์โทรศัพท์" value="{{ $vendor->phone }}" required>
				
											@if ($errors->has('phone'))
												<span class="alert alert-danger" role="alert">
													<strong>{{ $errors->first('phone') }}</strong>
												</span>
											@endif
										</div>

										<button type="submit" class="btn btn-primary" id="" data-loading-text="Loading..." autocomplete="off">บันทึกรายการ</button>
										<a href="{{ url('/vendors') }}" class="btn btn-default">กลับ</a>
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
