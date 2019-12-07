@extends('admins.admin_layout')
@section('title')
Câu hỏi
@endsection
@section('content')
 <div class="page-content-wrapper animated fadeInRight">
    <div class="page-content">
      <div class="wrapper border-bottom page-heading">
        <div class="col-lg-12">
          <h2> Đề thi </h2>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="{{ URL::to('/trangchu-admin') }}">Trang chủ</a> </li>
            <li class="breadcrumb-item"> <a>Dữ liệu</a> </li>
            <li class="breadcrumb-item active"> <strong>Câu hỏi</strong> </li>
            <li class="breadcrumb-item active"> <strong>
                    <?php
                                $massage = Session::get('massage');
                                if(!empty($massage)){
                                    echo '<span class="text-align"><h50 text-align="center" color="red">'.$massage.'</h50></span>';
                                    Session::put('massage', null);
                                }
                            ?>
            </strong></li>
          </ol>
        </div>
        <div class="col-lg-12"> </div>
      </div>
      <div class="wrapper-content ">
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox float-e-margins">
              <div class="ibox-title">
                <h5>Câu hỏi</h5>
              </div>
              <div class="ibox-content collapse show">
                <div class="widgets-container">
                  <div >
                    <table id="example" class="table  responsive nowrap table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>Tên đề</th>
                          <th>Độ khó</th>
                          <th>Câu số</th>
                          <th>image</th>
                          <th>Nội dung</th>
                          <th>Câu trả lời</th>
                          <th>Trạng thái</th>
                         
                          <th>sửa/xóa</th>
                         
                        </tr>
                      </thead>
                      @foreach($cauhoi as $key => $value)
                      <tbody>
                         <tr>
                          <td>{{ ($value->id) }}</td>
                          @foreach($dethi as $vdethi)
                            @if($value->id_id==$vdethi->id)
                               <td>{{ $vdethi->tenDe }}</td>
                            @else
                            @endif
                          @endforeach
                  
                              <td>{{ $value->doKho }}</td>
                               <td>{{ $value->cauSo }}</td>
                               <td>{{ $value->image }}</td>
                               <td>{{ $value->nd }}</td>
                               @foreach($cautraloi as $vcautraloi)
                                  @if($value->id==$vcautraloi->id_cauHoi)
                                      <td>{{ $vcautraloi->nd }}</td>
                                      <td>{{ $vcautraloi->trangThai }}</td>
                                  @else

                                  @endif
                               @endforeach
                          
                          
                          <td>
                            <span class="sua" style="font-size: 22px"><a href="{{ URL::to('/edit-question'.'/'.$value->id) }}"><i class="fa fa-check-square-o" aria-hidden="true"></i></a></span>
                           
                            <span class="xoa" style="font-size: 22px"><a onclick="return confirm('Are you sure to delete?')" href="{{ URL::to('/delete-question'.'/'.$value->id) }}"><i class="fa fa-times" aria-hidden="true"></i></a></span>
                          </td>
                        </tr>
                      </tbody>
                      @endforeach
                    </table>
                <!-- phan trang -->
                <div class="phantrang">
                {{--  <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                      <ul class="pagination">
                        <li class="paginate_button page-item previous" id="example_previous">
                             <a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                        </li>
                        <li class="paginate_button page-item ">
                          <a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                        </li>
                          <li class="paginate_button page-item next disabled" id="example_next">
                            <a href="#" aria-controls="example" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                          </li>
                        </ul>
                      </div>
                    </div> --}}
                  {{ $cauhoi->links() }}
                </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       
      
        
      
       
        
      </div>
      
<!-- start footer -->
      <div class="footer">
        <div class="pull-right">
         
        </div>
        <div> <strong>Copyright</strong> Ademin &copy; 2019 </div>
      </div>
    
  </div>
</div>

@endsection