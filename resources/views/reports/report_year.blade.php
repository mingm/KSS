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
									<form action="{{ url('reportMonthYear/search') }}" method="POST">
									@csrf
									@method('POST')
										<div class="col-lg-4">
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
										
										<div class="col-lg-4">
										</div>
											
										
										<div class="col-lg-12">
											<button type="submit" class="btn btn-primary" id="" data-loading-text="Loading..." autocomplete="off">ค้นหา</button>
										</div>
									</form>
																		
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
@endsection
