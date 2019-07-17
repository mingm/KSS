@extends('layouts.kss')

@section('content')
		
        <div id="page-wrapper">
			<div class="row horizontal">
				<div class="col-lg-12">
					<h2 class="page-header text-info">รายงานระบบ</h2>
				</div>
            </div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-info">
						<div class="panel-heading text-info">
							<i class="glyphicon glyphicon-plus-sign"></i>  เลือกรายการตรงตามเงื่อนไข
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<form action="{{ url('reports/search') }}" method="POST">
									@csrf
									@method('POST')
										<div class="col-lg-4">
												<div class="form-group">
													<label class="text-info">เลือกรายงานที่ต้องการ</label>
													<select class="form-control" id="report_id" name="report_id" required>
														<option value="">~~  เลือกเรายงาน  ~~</option>
														<option value="1">ยอดสินค้าส่งเคลมสูงสุด</option>
													</select>
					
													@if ($errors->has('report_id'))
														<span class="alert alert-danger" role="alert">
															<strong>{{ $errors->first('report_id') }}</strong>
														</span>
													@endif
												</div>
										</div>	
										<div class="col-lg-4">
												<div class="form-group">
													<label class="text-info">เลือกเดือนที่ต้องการ</label>
													<select class="form-control" id="month_id" name="month_id" required>
														<option value="">~~  เลือกเดือน  ~~</option>
														<option value="1">มกราคม</option>
														<option value="2">กุมภาพันธ์ </option>
														<option value="3">มีนาคม </option>
														<option value="4">เมษายน  </option>
														<option value="5">พฤษภาคม </option>
														<option value="6">มิถุนายน </option>
														<option value="7">กรกฎาคม </option>
														<option value="8">สิงหาคม </option>
														<option value="9">กันยายน </option>
														<option value="10">ตุลาคม </option>
														<option value="11">พฤศจิกายน </option>
														<option value="12">ธันวาคม </option>
													</select>
					
													@if ($errors->has('month_id'))
														<span class="alert alert-danger" role="alert">
															<strong>{{ $errors->first('month_id') }}</strong>
														</span>
													@endif
												</div>
										</div>
										
										<div class="col-lg-4">
												<div class="form-group">
													<label class="text-info">เลือกปีที่ต้องการ</label>
													<select class="form-control" id="year_id" name="year_id" required>
														<option value="">~~  เลือกปี  ~~</option>
														@foreach ($years as $year)
															<option value="{{ $year }}">{{ $year }}</option>
														@endforeach
													</select>
					
													@if ($errors->has('year_id'))
														<span class="alert alert-danger" role="alert">
															<strong>{{ $errors->first('year_id') }}</strong>
														</span>
													@endif
												</div>
										</div>
											
										<button type="submit" class="btn btn-primary" id="" data-loading-text="Loading..." autocomplete="off">ค้นหา</button>
									</form>
																		
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
@endsection
