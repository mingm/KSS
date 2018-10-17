@extends('layouts.kss')

@section('content')
	<!--Start Content-->
		

<div id="page-wrapper">
	<div class="row horizontal">
		<div class="col-lg-12">
			<h2 class="page-header">สร้างรายการสินค้าส่งเคลมผู้นำเข้า</h2>
		</div>
	</div>
	
	<div class="row horizontal">
		<div class="col-lg-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4>ขั้นตอนที่ 1 : ค้นหาเลขที่บิล</h4>
				</div>
				<div class="panel-body">
					<form action="{{ url('billSubs/generate/') }}" method="POST">
					@csrf
						<div class="row">
							<div class="col-lg-4">
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label class="text-info">เลือกผู้นำเข้า</label>
									<select class="form-control" id="vendorId" name="vendorId" required>
										<option value="">~~เลือกผู้นำเข้า~~</option>
									@foreach ($vendors as $vendor)
										<option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
									@endforeach
									</select>
								</div>
								You request will run as background, please wait for 2 - 3 minute.
							</div>
							<div class="col-lg-4">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4">
							</div>
							<div class="col-lg-4">							
								<button type="submit" class="btn btn-primary" id="" data-loading-text="Loading..." autocomplete="off">สร้างรายการ</button>
								<a href="{{ url('billSubs/') }}"  class="btn btn-default">กลับ</a>
							</div>
							<div class="col-lg-4">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<!--End Content-->
</div>
@endsection