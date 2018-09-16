@extends('layouts.kss')

@section('content')


    <link href="{{ asset('css/bootstrap-treeview.min.css') }}" rel="stylesheet">
	
        <div id="page-wrapper">
			<div class="row horizontal">
				<div class="col-lg-12">
					<h2 class="page-header">หมวดหมู่สินค้า</h2>
				</div>
            </div>
			
			<div class="row horizontal">
				<div class="col-lg-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4>หมวดหมู่สินค้า</h4>
						</div>
							<div class="panel-body">
														
							<div class="panel-group">
								
							<div class="col-sm-4">
							  <div id="treeview4" class=""></div>
							</div>
							
							<div class="col-sm-8" id="categoryAction" style="display:none;">
							  <h2>You are working on <span id="node-name"></span></h2>
							  <div>

							  <!-- Nav tabs -->
							  <ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#addNode" aria-controls="addNode" role="tab" data-toggle="tab">Add Node</a></li>
								<li role="presentation"><a href="#updateNode" aria-controls="updateNode" role="tab" data-toggle="tab">Update Node</a></li>
								<li role="presentation"><a href="#deleteNode" aria-controls="deleteNode" role="tab" data-toggle="tab">Delete Node</a></li>
							  </ul>

							  <!-- Tab panes -->
							  
							  <div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="addNode">
								<form action="{{ url('categories') }}" method="POST">
									@csrf
									@method('POST')
									<input type="hidden" id="parentId" name="parentId" value="" />
									<div class="form-group">
										<label class="text-info">ชื่อหมวดหมู่สินค้า</label>
										<input type="text" class="form-control" id="name" name="name" placeholder="ชื่อหมวดหมู่สินค้า" required>
			
										@if ($errors->has('name'))
											<span class="alert alert-danger" role="alert">
												<strong>{{ $errors->first('name') }}</strong>
											</span>
										@endif
									</div>
									
									<div class="form-group">
										<input type="checkbox" id="isRoot" name="isRoot" placeholder="หมวดหมู่สินค้าหลัก">&nbsp;<label class="text-info" for="isRoot">หมวดหมู่สินค้าหลัก</label>
									</div>
									
									<button type="submit" class="btn btn-primary" id="" data-loading-text="Loading..." autocomplete="off">บันทึกรายการ</button>
									
								</form>								
								</div>
								<div role="tabpanel" class="tab-pane" id="updateNode">
								<form id="updateForm" name="updateForm" action="{{ url('categories/') }}" method="POST">
									@csrf
									@method('PUT')
									<input type="hidden" id="categoryId" name="categoryId" value="" />
									<div class="form-group">
										<label class="text-info">ชื่อหมวดหมู่สินค้า</label>
										<input type="text" class="form-control" id="updateName" name="updateName" placeholder="ชื่อหมวดหมู่สินค้า" required>
			
										@if ($errors->has('name'))
											<span class="alert alert-danger" role="alert">
												<strong>{{ $errors->first('name') }}</strong>
											</span>
										@endif
									</div>
									
									<button type="submit" class="btn btn-primary" onclick="javascript:updateCategory()">บันทึกรายการ</button>
									
								</form>		
								</div>
								<div role="tabpanel" class="tab-pane" id="deleteNode">
								
								Delete Node - Not implement yet
								
								</div>
							  </div>

							</div>
							</div>
							</div>
							
							</div>
						</div>
					</div>
				</div>
			</div>
	
	<!--End Content-->

	
	</div>

@endsection


@section('endjavascript')
    <script src="{{ asset('js/bootstrap-treeview.min.js') }}"></script>
	<script type="text/javascript">
	
	$(function() {

		
        var defaultData = {!! $datas !!};

        $('#treeview4').treeview({
          levels: 99,
          color: "#428bca",
          data: defaultData,
		  multiSelect: false,
		  onNodeSelected: function(event, node) {
			  $('#node-name').text(node.text);
			  $('#parentId').val(node.id);
			  $('#updateName').val(node.text);
			  $('#categoryId').val(node.id);
			  $('#categoryAction').css({ display: "block" });
            },
            onNodeUnselected: function (event, node) {
			  $('#node-name').text('');
			  $('#parentId').val('');
			  $('#updateName').val('');
			  $('#categoryId').val('');
			  $('#categoryAction').css({ display: "none" });
            }
        });
		
	});
		
	
	function updateCategory() {
		$("#updateForm").attr("action", "/categories/" + $('#categoryId').val());
		
	}
	</script>
	
@endsection