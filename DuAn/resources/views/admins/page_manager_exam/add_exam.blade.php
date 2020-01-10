@extends('admins.admin_layout')
@section('title')
Thêm đề thi
@endsection
@section('content')
<div class="page-content-wrapper animated fadeInRight">
  <div class="page-content" >
    <div class="wrapper border-bottom page-heading">
      <div class="col-lg-12">
        <h2> Thêm đề thi </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="{{ URL::to('/trangchu-admin') }}">Trang chủ</a> </li>
            <li class="breadcrumb-item"> <a>Tính năng</a> </li>
          <li class="breadcrumb-item active"> <strong> Thêm đề thi </strong> </li>
           
        </ol>
      </div>
    </div>
    <div class="wrapper-content ">
      <div class="row">
      
       
        <!--Visible labels Form End -->
        <!--All form elements  start -->
        <div class="col-lg-12 mt-md-2  mb-md-2">
          <div class="widgets-container">
            <h5>Thêm đề thi </h5>
            <hr>
            <form action="{{ URL::to('/save-exam') }}" class="themtaikhoan" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group row">
                <label class="col-sm-2 control-label">Tên đề</label>
                <div class="col-sm-10">
                  <input placeholder="Tên đề" class="form-control" type="text" name="tende">
                </div>
              </div>

                <hr>
                <div class="form-group row">
                <label class="col-sm-2 control-label">Tên đề Không dấu</label>
                <div class="col-sm-10">
                  <input placeholder="Tên đề không dấu" class="form-control" type="text" name="tendekhongdau">
                </div>
              </div>
              <hr>
                  <div class="form-group row">
                      <label class="col-sm-2 control-label">Thể loại đề</label>
                         <div class="col-sm-10">
                            <select  name="theloaide"  class="custom-select">
                              @foreach($theloaide as $key=>$value)
                                 <option value="{{ $value->id }}" >{{ $value->theLoai }}</option>
                              @endforeach
                            </select>
                      </div>
                    </div>
              <hr>

              
              
              <div class="form-group row">
                <label class="col-sm-2 control-label">Môn</label>
                <div class="col-sm-10">
                  <input placeholder="Môn" class="form-control" type="text" name="mon">
                </div>
              </div>

              <hr>
              <div class="form-group row">
                <label class="col-sm-2 control-label">Năm</label>
                <div class="col-sm-10">
                  <input placeholder="lớp" class="form-control" type="text" name="lop" value="0">
                </div>
              </div>
             <hr>



                  <div class="form-group row">
                      <label class="col-sm-2 control-label">Kiều đề</label>
                         <div class="col-sm-10">
                            <select  name="kieude"  class="custom-select">
                              
                              <option value="0" selected>Random</option>
                              <option value="1">Có sẵn</option>
                              
                            </select>
                      </div>
                    </div>
                    
                    <hr>
                <div class="form-group row">
                  <label class="col-sm-2 control-label">Số người làm</label>
                  <div class="col-sm-10">
                    <input placeholder="" class="form-control" type="text" name="songuoilam" value="0" readonly>
                  </div>
                </div>
              <hr>
                  <div class="form-group row">
                      <label class="col-sm-2 control-label">Độ khó</label>
                         <div class="col-sm-10">
                            <select  name="dokho"  class="custom-select">
                              
                              <option value="1" >Rất dễ</option>
                              <option value="2">Dễ</option>
                              <option value="3">Trung bình</option>
                              <option value="4" selected>Khó</option>
                               <option value="5">Rất khó</option>
                            </select>
                      </div>
                    </div>
              
              <hr>
              <div class="form-group row">
                <label class="col-sm-2 control-label">Thời gian</label>
                <div class="col-sm-10">
                  <input placeholder="Thời gian" class="form-control" type="text" name="thoigian">
                </div>
              </div>

              <hr>
              <button class="buttonxxx" name="themtaikhoan" style="color: white; text-align: center">Thêm đề thi </button>

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