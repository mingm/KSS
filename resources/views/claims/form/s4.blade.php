@extends('layouts.kss')

@section('content')

	<div id="page-wrapper">
		<div class="row horizontal">
			<div class="col-lg-12">
				<h2 class="page-header">ระบุรายการเคลมสินค้า</h2>
			</div>
		</div>
		
		<div class="row horizontal">
			<div class="col-lg-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4>STEP 4 : Product claim detail</h4>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group col-md-4">
									<label class="text-info">ชื่อสินค้า:</label>
									{{ $product->name }}
								</div>
								<div class="form-group col-md-4">
									<label class="text-info">รุ่นโมเดล:</label>
									{{ $product->model }}
								</div>
								<div class="form-group col-md-4">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group col-md-4">
									<label class="text-info">แบรนด์:</label>
									{{ $product->brand->name }}
								</div>
								<div class="form-group col-md-4">
									<label class="text-info">ผู้นำเข้า:</label>
									{{ $product->vendor->name }}
								</div>
								<div class="form-group col-md-4">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group col-md-12">
									<label class="text-info">รายละเอียด:</label>
									{{ $product->description }}
								</div>
							</div>
							<div class="col-lg-12">
								<hr />
							</div>
						</div>	
						<div class="row">
							<form class="form-horizontal" action="{{ url('claims/create?step=2') }}" method="POST">
							@csrf
							<input type="hidden" id="productId" name="productId" value="{{ $product->id }}" />
							<div class="col-lg-12">
								<div class="form-group">
									<label class="col-lg-2 control-label text-info">ซีเรียลนัมเบอร์</label>
									<div class="col-lg-6">
										<input type="text" class="form-control" id="serialNumber" name="serialNumber" placeholder="ซีเรียลนัมเบอร์" value="{{ $claimProduct->serial_number }}" required>
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label class="col-lg-2 control-label text-info">อาการเสีย</label>
									<div class="col-lg-6">
										<input type="text" class="form-control" id="claimDetail" name="claimDetail" placeholder="อาการเสีย" value="{{ $claimProduct->claim_detail }}">
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label class="col-lg-2 control-label text-info">ลักษณะพิเศษ</label>
									<div class="col-lg-6">
										<input type="text" class="form-control" id="specificDetail" name="specificDetail" placeholder="ลักษณะพิเศษ" value="{{ $claimProduct->specific_detail }}">
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label class="col-lg-2 control-label text-info">สิ่งที่นำมาด้วย</label>
									<div class="col-lg-6">
										<input type="text" class="form-control" id="packageBundle" name="packageBundle" placeholder="สิ่งที่นำมาด้วย" value="{{ $claimProduct->package_bundle }}">
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label class="col-lg-2 control-label text-info">หมายเหตุ</label>
									<div class="col-lg-6">
										<input type="text" class="form-control" id="note" name="note" placeholder="หมายเหตุ" value="{{ $claimProduct->note }}">
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<div class="col-lg-4">
									</div>
									<div class="col-lg-4">
										<button type="submit" class="btn btn-primary" id="" data-loading-text="Loading..." autocomplete="off">บันทึกรายการ</button>
										<a href="{{ url('claims/create?step=2') }}"  class="btn btn-default">กลับ</a>
									</div>
								</div>
							</div>
							</form>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	
	<!--End Content-->

	
	</div>
@endsection