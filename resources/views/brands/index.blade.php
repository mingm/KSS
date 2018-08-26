@extends('layouts.kss')

@section('content')
<div class="container"><!-- CONTENT ทั้งหมด นอกนั้นเป็น Blade -->

	<div class="row">
		<div class="col-md-12">

			@include('shared.breadcrumb', ['current' => 'แบรนด์'])

			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> จัดการแบรนด์</div>
				</div> <!-- /panel-heading -->
				<div class="panel-body">

					<div class="remove-messages"></div>

					<div class="div-action pull pull-right" style="padding-bottom:20px;">
						<button class="btn btn-default button1" data-toggle="modal" data-target="#addBrandModel"> <i class="glyphicon glyphicon-plus-sign"></i> เพิ่มรายการ </button>
					</div> <!-- /div-action -->				
					
					<table class="table" id="manageBrandTable">
						<thead>
							<tr>							
								<th>ชื่อแบรนด์</th>
								<th>สถานะ</th>
								<th style="width:15%;">คำสั่ง</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($brands as $brand)
							<tr>
								<td>{{ $brand->name }}</td>
								<td>
									@if ($brand->status === 'Active')
										เปิดการใช้งาน
									@else
										ยังไม่เปิดใช้งาน
									@endif
								</td>
								<td>
									<a type="button" data-toggle="modal" data-target="#editBrandModel" onclick="editBrands('{{ $brand->id }}')">
									<i class="glyphicon glyphicon-edit"></i></a>
									
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					{{ $brands->links() }}
					<!-- /table -->

				</div> <!-- /panel-body -->
			</div> <!-- /panel -->		
		</div> <!-- /col-md-12 -->
	</div> <!-- /row -->

	<div class="modal fade" id="addBrandModel" tabindex="-1" role="dialog">
	  <div class="modal-dialog">
		<div class="modal-content">
			
			<form class="form-horizontal" id="submitBrandForm" action="/api/brands" method="POST">
				@csrf
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="glyphicon glyphicon-plus-sign"></i> เพิ่มรายการ</h4>
			  </div>
			  <div class="modal-body">

				<div id="add-brand-messages"></div>

				<div class="form-group">
					<label for="name" class="col-sm-3 control-label">ชื่อแบรนด์ : </label>
					<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-8">
							<input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="ชื่อแบรนด์" name="name" required autofocus>
						</div>
				</div> <!-- /form-group-->	         	        
				<div class="form-group">
					<label for="status" class="col-sm-3 control-label">สถานะ :  </label>
					<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-8">
							<select class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" id="status" name="status">
								<option value="">~~เลือกรายการ~~</option>
								<option value="Active" selected>เปิดการใช้งาน</option>
								<option value="Inactive">ยังไม่เปิดใช้งาน</option>
							</select>
						</div>
				</div> <!-- /form-group-->	         	        

			  </div> <!-- /modal-body -->
			  
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
				
				<button type="submit" class="btn btn-primary" id="createBrandBtn" data-loading-text="Loading..." autocomplete="off">บันทึกรายการ</button>
			  </div>
			  <!-- /modal-footer -->
			</form>
			 <!-- /.form -->
		</div>
		<!-- /modal-content -->
	  </div>
	  <!-- /modal-dailog -->
	</div>
	<!-- / add modal -->

	<!-- edit brand -->
	<div class="modal fade" id="editBrandModel" tabindex="-1" role="dialog">
	  <div class="modal-dialog">
		<div class="modal-content">
			
			<form class="form-horizontal" id="editBrandForm" action="/api/brands" method="PUT">
			@csrf
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-edit"></i> แก้ไขแบรนด์สินค้า</h4>
			  </div>
			  <div class="modal-body">

				<div id="edit-brand-messages"></div>

				<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
							<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
							<span class="sr-only">Loading...</span>
						</div>

				  <div class="edit-brand-result">
					<div class="form-group">
						<label for="name" class="col-sm-3 control-label">ชื่อแบรนด์ : </label>
						<label class="col-sm-1 control-label">: </label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="name" placeholder="ชื่อแบรนด์" name="name" autocomplete="off">
							</div>
					</div> <!-- /form-group-->	         	        
					<div class="form-group">
						<label for="status" class="col-sm-3 control-label">สถานะ :  </label>
						<label class="col-sm-1 control-label">: </label>
							<div class="col-sm-8">
							  <select class="form-control" id="status" name="status">
							<option value="">~~เลือกรายการ~~</option>
							<option value="Active" selected>เปิดการใช้งาน</option>
							<option value="Inactive">ยังไม่เปิดใช้งาน</option>
							  </select>
							</div>
					</div> <!-- /form-group-->	
				  </div>         	        
				  <!-- /edit brand result -->

			  </div> <!-- /modal-body -->
			  
			  <div class="modal-footer editBrandFooter">
				<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> ปิด</button>
				
				<button type="submit" class="btn btn-success" id="editBrandBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> บันทึกรายการ</button>
			  </div>
			  <!-- /modal-footer -->
			</form>
			 <!-- /.form -->
		</div>
		<!-- /modal-content -->
	  </div>
	  <!-- /modal-dailog -->
	</div>
	<!-- / add modal -->
	<!-- /edit brand -->


	<script src="custom/js/brand.js"></script>	
	
	</div> <!-- container --><!-- CONTENT ทั้งหมด นอกนั้นเป็น Blade -->	
@endsection
