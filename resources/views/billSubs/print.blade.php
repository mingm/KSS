@extends('layouts.print')

@section('content')
<div id="wrapper">
	
<!--Start Content-->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<h3>ใบส่งซ่อมสินค้า</h3>
					<p>
					บริษัท เคเอสเอส อินเตอร์เทค กรุ๊ป จำกัด
					</br>เลขที่ 99 หมู่ 8 ถ.พหลโยธิน ต.คูคต อ.ลำลูกกา จ.ปทุมธานี 12130
					</br>โทรศัพท์ 081-914-9736, 02-992-6888 ต่อ  7761, โทรสาร 02-992-7275
					</p>
					<p><strong>SERVICE CODE : {{ $billSub->billsub_code }}</p>
					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th class="text-center" style="width: 50px;">ลำดับ</th>
									<th>ชื่อสินค้า/โมเดล</th>
									<th>อาการเสีย</th>
									<th>ลักษณะพิเศษ</th>
									<th>สิ่งที่นำมาด้วย</th>
									<th>ซีเรียลนัมเบอร์</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($results as $result)
							<tr>
								<td class="text-center">{{ $loop->index + 1 }}</td>
								<td>{{ $result->product_name }}</td>
								<td>{{ $result->claim_detail }}</td>
								<td>{{ $result->specific_detail }}</td>
								<td>{{ $result->package_bundle }}</td>
								<td>{{ $result->serial_number }}</td>
							</tr>
							@endforeach

							</tbody>
						</table>
					</div>

					<table>
						</thead>
								<tr>
									<th width=20%>ผู้ส่งซ่อม..........................</th>
									<th width=20%>ผู้รับซ่อม..........................</th>
									<th width=20%>ผู้ส่งซ่อม..........................</th>
									<th width=20%>ผู้รับซ่อม..........................</th>
								</tr>
						</thead>
						<tbody>
							<tr>
								<td>(............./............./.............)</td>
								<td>(............./............./.............)</td>
								<td>(............./............./.............)</td>
								<td>(............./............./.............)</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!--End Content-->
</div>
<!-- /#wrapper -->
@endsection