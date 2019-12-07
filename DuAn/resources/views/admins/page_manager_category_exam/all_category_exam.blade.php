@extends('admins.admin_layout')
@section('title')
Tất cả thể loại để
@endsection
@section('content')
 <div class="page-content-wrapper animated fadeInRight">
    <div class="page-content">
      <div class="wrapper border-bottom page-heading">
        <div class="col-lg-12">
          <h2>Thể loại đề </h2>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="{{ URL::to('/trangchu-admin') }}">Trang chủ</a> </li>
            <li class="breadcrumb-item"> <a>Dữ liệu</a> </li>
            <li class="breadcrumb-item active"> <strong>Thể loại đề</strong> </li>
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
                <h5>Tất cả Thể loại đề </h5>
              </div>
              <div class="ibox-content collapse show">
                <div class="widgets-container">
                  <div >
                    <table id="example" class="table  responsive nowrap table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>Thể loại</th>
                          <th>Lớp</th>
                          <th>sửa/xóa</th>
                         
                        </tr>
                      </thead>
                      @foreach($theloaide as $key => $value)
                      <tbody>
                         <tr>
                          <td>{{ ($value->id) }}</td>
                          <td>{{ $value->theLoai }}</td>
                          <td>{{ $value->lop }}</td>
                          
                          <td>
                            <span class="sua" style="font-size: 22px"><a href="{{ URL::to('/edit-category-exam'.'/'.$value->id) }}"><i class="fa fa-check-square-o" aria-hidden="true"></i></a></span>
                           {{--  <label class="sss" style="font-size: 20px; color: red">/</label> --}}
                            <span class="xoa" style="font-size: 22px"><a onclick="return confirm('Are you sure to delete?')" href="{{ URL::to('/delete-category-exam'.'/'.$value->id) }}"><i class="fa fa-times" aria-hidden="true"></i></a></span>
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
                  {{ $theloaide->links() }}
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