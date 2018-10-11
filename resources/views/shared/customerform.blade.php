<form action="{{ url('customers/' . $customer->id) }}" method="POST">
@csrf
@method($method)
@isset($isClaim)
	<input type="hidden" value="{{ $isClaim }}" name="isClaim">
@endisset


	<div class="form-group">
		<label class="text-info">อีเมล์</label>
		<input type="text" class="form-control" id="email" name="email" placeholder="อีเมล์" value="{{ $customer->email }}" required>

		@if ($errors->has('email'))
			<span class="alert alert-danger" role="alert">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
		@endif
	</div>
	
	<div class="form-group">
		<label class="text-info">ชื่อลูกค้า</label>
		<input type="text" class="form-control" id="first_name" name="first_name" placeholder="ชื่อลูกค้า" value="{{ $customer->first_name }}" required>

		@if ($errors->has('first_name'))
			<span class="alert alert-danger" role="alert">
				<strong>{{ $errors->first('first_name') }}</strong>
			</span>
		@endif
	</div>
	
	<div class="form-group">
		<label class="text-info">ชื่อสกุล</label>
		<input type="text" class="form-control" id="last_name" name="last_name" placeholder="ชื่อลูกค้า" value="{{ $customer->last_name }}" required>

		@if ($errors->has('last_name'))
			<span class="alert alert-danger" role="alert">
				<strong>{{ $errors->first('last_name') }}</strong>
			</span>
		@endif
	</div>

	<div class="form-group">
		<label class="text-info">เบอร์โทรศัพท์</label>
		<input type="text" class="form-control" id="phone" name="phone" placeholder="เบอร์โทรศัพท์" value="{{ $customer->phone }}" required>

		@if ($errors->has('phone'))
			<span class="alert alert-danger" role="alert">
				<strong>{{ $errors->first('phone') }}</strong>
			</span>
		@endif
	</div>
	
	<div class="form-group">
		<label class="text-info">ที่อยู่ติดต่อ</label>
		<textarea class="form-control" rows="3" id="address" name="address" placeholder="ที่อยู่ติดต่อ" required>{{ $customer->address }}</textarea>
		
		@if ($errors->has('address'))
			<span class="alert alert-danger" role="alert">
				<strong>{{ $errors->first('address') }}</strong>
			</span>
		@endif
	</div>

	<div class="form-group">
		<label class="text-info">หมายเหตุ</label>
		<textarea class="form-control" rows="3" id="note" name="note" placeholder="หมายเหตุ">{{ $customer->note }}</textarea>
		
	</div>

	<button type="submit" class="btn btn-primary" id="" data-loading-text="Loading..." autocomplete="off">บันทึกรายการ</button>
	
@isset($isClaim)
	<a href="{{ url('/claims') }}" class="btn btn-default">กลับ</a>
@endisset
@empty($customers)
	<a href="{{ url('/customers') }}" class="btn btn-default">กลับ</a>
@endempty
</form>