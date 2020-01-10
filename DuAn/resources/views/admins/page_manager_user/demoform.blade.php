@extends('admins.admin_layout')
@section('title')
Thêm tài khoản
@endsection
@section('content')
 <div class="dmf ">
 	
	<form action="{{ URL::to('/save-account') }}" class="themtaikhoan" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="text" name="ghi">in
		<button name="ghi">ghi</button>
	</form>
	
</div>
@endsection