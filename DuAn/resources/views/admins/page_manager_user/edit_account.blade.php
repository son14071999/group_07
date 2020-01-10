@extends('admins.admin_layout')
@section('title')
Cập nhật tài khoản
@endsection
@section('content')
<div class="page-content-wrapper animated fadeInRight">
  <div class="page-content" >
    <div class="wrapper border-bottom page-heading">
      <div class="col-lg-12">
        <h2> Cập nhật tài khoản </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="{{ URL::to('/trangchu-admin') }}">Trang chủ</a> </li>
            <li class="breadcrumb-item"> <a>Tính năng</a> </li>
          <li class="breadcrumb-item active"> <strong> Cập nhật tài khoản </strong> </li>
           
        </ol>
      </div>
    </div>
    <div class="wrapper-content ">
      <div class="row">
      
       
        <!--Visible labels Form End -->
        <!--All form elements  start -->
        <div class="col-lg-12 mt-md-2  mb-md-2">
          <div class="widgets-container">
            <h5>Cập nhật tài khoản </h5>
            <hr>
             @foreach($get_user_by_id as $key => $value)
            <form action="{{ URL::to('/update-account').'/'.$value->id }}" class="capnhattaikhoan" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
             
              <div class="form-group row">
                <label class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                  <input placeholder="Tên đăng nhập" class="form-control" type="text" name="tendangnhap" value="{{ $value->name }}">
                </div>
              </div>

              <hr>
              <div class="form-group row">
                <label class="col-sm-2 control-label">Mật khẩu</label>
                <div class="col-sm-10">
                  <input placeholder="password" class="form-control" type="text" name="pass" value="{{ ($value->password) }}">
                </div>
              </div>
              <hr>
               {{-- <div class="form-group row">
                <label class="col-sm-2 control-label">Họ và tên</label>
                <div class="col-sm-10">
                  <input placeholder="Họ và tên" class="form-control" type="text" name="hovaten" value="{{ ($value->hovaten) }}">
                </div>
              </div>
              <hr> --}}
               <div class="form-group row">
                <label class="col-sm-2 control-label">Địa chỉ</label>
                <div class="col-sm-10">
                  <input placeholder="Địa chỉ" class="form-control" type="text" name="diachi" value="{{ ($value->diaChi) }}">
                </div>
              </div>
              <hr>
               <div class="form-group row">
                <label class="col-sm-2 control-label">Điện thoại</label>
                <div class="col-sm-10">
                  <input placeholder="Điện thoại" class="form-control" type="text" name="dienthoai" value="{{ ($value->SDT) }}">
                </div>
              </div>
              <hr>
               <div class="form-group row">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input placeholder="Email" class="form-control" type="email" name="email" value="{{ ($value->email) }}">
                </div>
              </div>
              <hr>
              



                  <div class="form-group row">
                                  <label class="col-sm-2 control-label">Quyền</label>
                                  <div class="col-sm-10">
                  <select  name="quyen"  class="custom-select">
                    @if($value->quyen==0)
                    <option value="0" selected>User</option>
                     <option value="1">Admin</option>
                    <option value="2">Mod</option>
                    @elseif($value->quyen==1)
                    <option value="0" >User</option>
                    <option value="1" selected>Admin</option>
                    <option value="2">Mod</option>
                    @else
                    <option value="0" >User</option>
                    <option value="1" >Admin</option>
                    <option value="2" selected>Mod</option>
                    @endif

                  </select>
                </div>
              </div>
              <hr>
        
                  <div class="form-group row">
                                  <label class="col-sm-2 control-label">Avatar</label>
                                  <div class="col-sm-10">
                  
                    <input type="file" id="file" name="avata">
                    <img src="{{ URL::to('images/'.$value->avata) }}" height="50" width="50">
                    
                </div>
              </div>
              <hr>     

               <div class="form-group row">
                <label class="col-sm-2 control-label">Điểm</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="diem"  value="{{ $value->score }}" >
                </div>
              </div>
              
               <hr>
              <button class="buttonxxx" name="themtaikhoan" style="color: white; text-align: center"> Cập nhật tài khoản </button>

            </form>
            @endforeach
          </div>
        </div>
       
      </div>
    </div> 
    
     <div class="footer">
              <div class="pull-right">
                
              </div>
              <div> <strong>Copyright</strong> Admin &copy; 2019 </div>
            </div>
  </div>
</div>

@endsection