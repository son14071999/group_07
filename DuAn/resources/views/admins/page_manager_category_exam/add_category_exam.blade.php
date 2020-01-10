@extends('admins.admin_layout')
@section('title')
Thêm thể loại đề
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
          <li class="breadcrumb-item active"> <strong> Thêm thể loại đề </strong> </li>
           
        </ol>
      </div>
    </div>
    <div class="wrapper-content ">
      <div class="row">
      
       
        <!--Visible labels Form End -->
        <!--All form elements  start -->
        <div class="col-lg-12 mt-md-2  mb-md-2">
          <div class="widgets-container">
            <h5>Thêm thể loại đề </h5>
            <hr>
            <form action="{{ URL::to('/save-category-exam') }}" class="themtaikhoan" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group row">
                <label class="col-sm-2 control-label">Thể loại</label>
                <div class="col-sm-10">
                  <input placeholder="Tên thể loại" class="form-control" type="text" name="tentheloai">
                </div>
              </div>

              <hr>
              <div class="form-group row">
                <label class="col-sm-2 control-label">Lớp</label>
                <div class="col-sm-10">
                  <input placeholder="lớp" class="form-control" type="text" name="lop" value="0">
                </div>
              </div>
             <hr>
              <button class="buttonxxx" name="themtaikhoan" style="color: white; text-align: center"> Thêm thể loại </button>

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