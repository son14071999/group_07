@extends('admins.admin_layout')
@section('title')
Thêm tài khoản
@endsection
@section('content')
<div class="page-content-wrapper animated fadeInRight">
  <div class="page-content" >
    <div class="wrapper border-bottom page-heading">
      <div class="col-lg-12">
        <h2> Thêm tài khoản </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="{{ URL::to('/trangchu-admin') }}">Trang chủ</a> </li>
            <li class="breadcrumb-item"> <a>Tính năng</a> </li>
          <li class="breadcrumb-item active"> <strong> Thêm tài khoản </strong> </li>
           
        </ol>
      </div>
    </div>
    <div class="wrapper-content ">
      <div class="row">
      
       
        <!--Visible labels Form End -->
        <!--All form elements  start -->
        <div class="col-lg-12 mt-md-2  mb-md-2">
          <div class="widgets-container">
            <h5>Thêm tài khoản </h5>
            <hr>
            <form action="{{ URL::to('/save-account') }}" class="themtaikhoan" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group row">
                <label class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                  <input placeholder="Tên đăng nhập" class="form-control" type="text" name="tendangnhap">
                </div>
              </div>

              <hr>
              <div class="form-group row">
                <label class="col-sm-2 control-label">Mật khẩu</label>
                <div class="col-sm-10">
                  <input placeholder="password" class="form-control" type="text" name="pass">
                </div>
              </div>
              <hr>
               <div class="form-group row">
                <label class="col-sm-2 control-label">Họ và tên</label>
                <div class="col-sm-10">
                  <input placeholder="Họ và tên" class="form-control" type="text" name="hovaten">
                </div>
              </div>
              <hr>
               <div class="form-group row">
                <label class="col-sm-2 control-label">Địa chỉ</label>
                <div class="col-sm-10">
                  <input placeholder="Địa chỉ" class="form-control" type="text" name="diachi">
                </div>
              </div>
              <hr>
               <div class="form-group row">
                <label class="col-sm-2 control-label">Điện thoại</label>
                <div class="col-sm-10">
                  <input placeholder="Điện thoại" class="form-control" type="text" name="dienthoai">
                </div>
              </div>
              <hr>
               <div class="form-group row">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input placeholder="Email" class="form-control" type="email" name="email">
                </div>
              </div>
              <hr>
              



                  <div class="form-group row">
                      <label class="col-sm-2 control-label">Quyền</label>
                         <div class="col-sm-10">
                            <select  name="quyen"  class="custom-select">
                              
                              <option value="0" selected>User</option>
                              <option value="1">Admin</option>
                              <option value="2">Mod</option>
                            </select>
                      </div>
                    </div>
              <hr>
        
                  <div class="form-group row">
                                  <label class="col-sm-2 control-label">Avatar</label>
                                  <div class="col-sm-10">
                  
                    <input type="file" id="file" name="avata">
                    
                </div>
              </div>
              <hr>     

               <div class="form-group row">
                <label class="col-sm-2 control-label">Điểm</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="diem"  value="0" readonly>
                </div>
              </div>
               <hr>
              <button class="buttonxxx" name="themtaikhoan" style="color: white; text-align: center"> Thêm tài khoản </button>

            </form>
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