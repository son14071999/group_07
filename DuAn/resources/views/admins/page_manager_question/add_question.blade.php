@extends('admins.admin_layout')
@section('title')
Thêm câu hỏi
@endsection
@section('content')
<div class="page-content-wrapper animated fadeInRight">
  <div class="page-content" >
    <div class="wrapper border-bottom page-heading">
      <div class="col-lg-12">
        <h2> Thêm câu hỏi </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="{{ URL::to('/trangchu-admin') }}">Trang chủ</a> </li>
            <li class="breadcrumb-item"> <a>Tính năng</a> </li>
          <li class="breadcrumb-item active"> <strong> Thêm câu hỏi</strong> </li>
           
        </ol>
      </div>
    </div>
    <div class="wrapper-content ">
      <div class="row">
      
       
        <!--Visible labels Form End -->
        <!--All form elements  start -->
        <div class="col-lg-12 mt-md-2  mb-md-2">
          <div class="widgets-container">
            <h5>Thêm câu hỏi </h5>
            <hr>
            <form action="{{ URL::to('/save-question') }}" class="themtaikhoan" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group row">
                <label class="col-sm-2 control-label">Cho đề</label>
                <div class="col-sm-10">
                  <select  name="chode"  class="custom-select">
                              @foreach($dethi as $key=>$value)
                                 <option value="{{ $value->id }}" >{{ $value->tenDe }}</option>
                              @endforeach
                  </select>
                </div>
              </div>

                <hr>
                <div class="form-group row">
                <label class="col-sm-2 control-label">Câu số</label>
                <div class="col-sm-10">
                  <input placeholder="Câu số" class="form-control" type="text" name="causo">
                </div>
              </div>
              <hr>
                <div class="form-group row">
                <label class="col-sm-2 control-label">Độ khó</label>
                <div class="col-sm-10">
                   <select  name="dokho"  class="custom-select">
                              
                                 <option value="1"  >Rất dễ</option>
                                 <option value="2"  >Dễ</option>
                                 <option value="3"  >Trung bình</option>
                                 <option value="4"  >Khó</option>
                                 <option value="5"  >Rất khó</option>
                             
                    </select>
                </div>
              </div>
              <hr>
                <div class="form-group row">
                <label class="col-sm-2 control-label">Nội dung câu hỏi</label>
                <div class="col-sm-10">
                  <input placeholder="Nội dung câu hỏi" class="form-control" type="text" name="noidungcauhoi">
                </div>
              </div>
              <hr>
                <div class="form-group row">
                <label class="col-sm-2 control-label">Hình ảnh nếu có</label>
                <div class="col-sm-10">
                    <input type="file" id="file" name="image">
                </div>
              </div>
              <hr>
                <div class="form-group row">
                <label class="col-sm-2 control-label">Câu trả lời 1</label>
                <div class="col-sm-10">
                  <input placeholder="Câu trả lời 1" class="form-control" type="text" name="cautraloi1">
                </div>
              </div>
              <hr>
                <div class="form-group row">
                <label class="col-sm-2 control-label">Câu trả lời 2</label>
                <div class="col-sm-10">
                  <input placeholder="Câu trả lời 2" class="form-control" type="text" name="cautraloi2">
                </div>
              </div>
              <hr>
                <div class="form-group row">
                <label class="col-sm-2 control-label">Câu trả lời 3</label>
                <div class="col-sm-10">
                  <input placeholder="Câu trả lời 3" class="form-control" type="text" name="cautraloi3">
                </div>
              </div>
              <hr>
                <div class="form-group row">
                <label class="col-sm-2 control-label">Câu trả lời 4</label>
                <div class="col-sm-10">
                  <input placeholder="Câu trả lời 4" class="form-control" type="text" name="cautraloi4">
                </div>
              </div>
              <hr>
                <div class="form-group row">
                <label class="col-sm-2 control-label">Câu trả đúng</label>
                <div class="col-sm-10">
                   <select  name="cautraloidung"  class="custom-select">
                              
                                 <option value="1"  >1</option>
                                 <option value="2"  >2</option>
                                 <option value="3"  >3</option>
                                 <option value="4"  >4</option>
                             
                    </select>
                </div>
              </div>
              <hr>
                  <div class="form-group row">
                      <label class="col-sm-2 control-label">Dạng bài</label>
                         <div class="col-sm-10">
                            <select  name="cacdangbai"  class="custom-select">
                              @foreach($cacdangbai as $key=>$value)
                                 <option value="{{ $value->id }}" >{{ $value->nd }}</option>
                              @endforeach
                            </select>
                      </div>
                    </div>

                <hr>
                  {{-- <div class="form-group row">
                      <label class="col-sm-2 control-label">Nội dung kiến thức</label>
                         <div class="col-sm-10">
                            <select  name="noidungkienthuc"  class="custom-select">
                              @foreach($noidungkienthuc as $key=>$value)
                                 <option value="{{ $value->id }}" >{{ $value->nd }}</option>
                              @endforeach
                            </select>
                      </div>
                    </div>
              <hr> --}}

              
              
              
              <button class="buttonxxx" name="themtaikhoan" style="color: white; text-align: center">Thêm câu hỏi </button>

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