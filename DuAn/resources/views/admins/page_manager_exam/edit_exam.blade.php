@extends('admins.admin_layout')
@section('title')
Cập nhật đề thi
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
          <li class="breadcrumb-item active"> <strong> Cập nhật đề thi </strong> </li>
           
        </ol>
      </div>
    </div>
    <div class="wrapper-content ">
      <div class="row">
      
       
        <!--Visible labels Form End -->
        <!--All form elements  start -->
        <div class="col-lg-12 mt-md-2  mb-md-2">
          <div class="widgets-container">
            <h5>Cập nhật đề thi </h5>
            <hr>
            @foreach($dethi as $value)
            <form action="{{ URL::to('/update-exam'.'/'.$value->id) }}" class="themtaikhoan" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group row">
                <label class="col-sm-2 control-label">Tên đề</label>
                <div class="col-sm-10">
                  <input placeholder="Tên đề" class="form-control" type="text" name="tende" value="{{ $value->tenDe }}">
                </div>
              </div>

                <hr>
                <div class="form-group row">
                <label class="col-sm-2 control-label">Tên đề Không dấu</label>
                <div class="col-sm-10">
                  <input placeholder="Tên đề không dấu" class="form-control" type="text" name="tendekhongdau" value="{{ $value->tenDeKhongDau }}">
                </div>
              </div>
              <hr>
                  <div class="form-group row">
                      <label class="col-sm-2 control-label">Thể loại đề</label>
                         <div class="col-sm-10">
                            <select  name="theloaide"  class="custom-select">
                             @foreach($theloaide as $vtheloaide)
                                @if($value->id_theLoaiDe==$vtheloaide->id)
                                  <option value="{{ $vtheloaide->id }}" selected>{{ $vtheloaide->theLoai }}</option>
                                @else
                                  <option value="{{ $vtheloaide->id }}"> {{ $vtheloaide->theLoai }}</option>
                                @endif
                             @endforeach
                            </select>
                      </div>
                    </div>
              <hr>

              
              
              <div class="form-group row">
                <label class="col-sm-2 control-label">Môn</label>
                <div class="col-sm-10">
                  <input placeholder="Môn" class="form-control" type="text" name="mon" value="{{ $value->mon }}">
                </div>
              </div>

              <hr>
              <div class="form-group row">
                <label class="col-sm-2 control-label">Lớp</label>
                <div class="col-sm-10">
                  <input placeholder="lớp" class="form-control" type="text" name="lop" value="{{ $value->lop }}">
                </div>
              </div>
             <hr>



                  <div class="form-group row">
                      <label class="col-sm-2 control-label">Kiều đề</label>
                         <div class="col-sm-10">
                            <select  name="kieude"  class="custom-select">
                              @if($value->kieuDe==0)
                                <option value="0" selected>Random</option>
                                <option value="1">Có sẵn</option>
                              @else
                                <option value="0" selected>Random</option>
                                <option value="1">Có sẵn</option>
                              @endif
                              
                            </select>
                      </div>
                    </div>
                    
                    <hr>
                <div class="form-group row">
                  <label class="col-sm-2 control-label">Số người làm</label>
                  <div class="col-sm-10">
                    <input placeholder="" class="form-control" type="text" name="songuoilam" value="{{ $value->soNguoiLam }}" readonly>
                  </div>
                </div>
              <hr>
                  <div class="form-group row">
                      <label class="col-sm-2 control-label">Độ khó</label>
                         <div class="col-sm-10">
                            <select  name="dokho"  class="custom-select">
                              @if($value->doKho==0)
                                 <option value="0" selected>Rất dễ</option>
                              <option value="1">Dễ</option>
                              <option value="2">Trung bình</option>
                              <option value="3" >Khó</option>
                               <option value="4">Rất khó</option>
                               @elseif($value->doKho==1)
                                 <option value="0" >Rất dễ</option>
                              <option value="1" selected>Dễ</option>
                              <option value="2">Trung bình</option>
                              <option value="3" >Khó</option>
                               <option value="4">Rất khó</option>
                               @elseif($value->doKho==3)
                                 <option value="0" >Rất dễ</option>
                              <option value="1" >Dễ</option>
                              <option value="2">Trung bình</option>
                              <option value="3" selected >Khó</option>
                               <option value="4">Rất khó</option>
                               @elseif($value->doKho==2)
                                 <option value="0" >Rất dễ</option>
                              <option value="1" >Dễ</option>
                              <option value="2" selected>Trung bình</option>
                              <option value="3"  >Khó</option>
                               <option value="4">Rất khó</option>

                              @else
                                <option value="1" >Dễ</option>
                              <option value="2" >Trung bình</option>
                              <option value="3"  >Khó</option>
                               <option value="4" selected>Rất khó</option>
                              @endif
                             
                            </select>
                      </div>
                    </div>
              
              <hr>
              <div class="form-group row">
                <label class="col-sm-2 control-label">Thời gian</label>
                <div class="col-sm-10">
                  <input placeholder="Thời gian" class="form-control" type="text" name="thoigian" value="{{ $value->thoiGian }}">
                </div>
              </div>

              <hr>
              <button class="buttonxxx" name="themtaikhoan" style="color: white; text-align: center">Cập nhật đề thi </button>

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