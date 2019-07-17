@extends('layouts.kss')

@section('content')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">รายงานเปรียบเทียบ/เดือน</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
								เปลี่ยนเทียบยอดเคลมสินค้า
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-bar-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
			
@endsection


@section('endjavascript')
	
<script>
$(function() {
    Morris.Bar({
        element: 'morris-bar-chart',
		data: {!! $chartData !!},
        xkey: 'Month',
        ykeys: ['Total'],
        labels: ['products'],
        hideHover: 'auto',
        resize: true
    });
    
});
</script>
    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('vendor/morrisjs/morris.min.js') }}"></script>
	
@endsection