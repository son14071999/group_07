@extends('admins.admin_layout')
@section('title')
Kết quả tìm kiếm 
@endsection
@section('content')
 <div class="page-content-wrapper animated fadeInRight">
    <div class="page-content">
      <div class="wrapper border-bottom page-heading">
        <div class="col-lg-12">
          <h2>Tài khoản </h2>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="{{ URL::to('/trangchu-admin') }}">Trang chủ</a> </li>
            <li class="breadcrumb-item"> <a>Dữ liệu</a> </li>
            <li class="breadcrumb-item active"> <strong>Tài khoản</strong> </li>
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
          <form action="{{ URL::to('search/account')}}" method="post">
          <div class ="timkiem_">
          <input type="text" name="search" id="search"  placeholder=" Name" /><button>timkiem</button>
          {{ csrf_field() }}
              <div id="hienthi">
              
              </div>
              </form>

        </div>
        <div class="col-lg-12"> </div>
      </div>
      <div class="wrapper-content ">
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox float-e-margins">
              <div class="ibox-title">
                <h5>Tất cả tài khoản </h5>
              </div>
              <div class="ibox-content collapse show">
                <div class="widgets-container">
                  
                  
   
             
              
              </div>
 
              

                  <br><br>
                  <div>
                    @if(count($users)==0)
                          <span class="hienthimes">{{ $mes }}</span>
                    @else
                    <table id="example" class="table  responsive nowrap table-bordered" cellspacing="0" width="100%">
                     
                    

                      <thead>
                        <tr>
                          <th>id</th>
                          <th>Name</th>
                          {{-- <th>Họ và tên</th> --}}
                          <th>Địa chỉ</th>
                          <th>Điện thoại</th>
                          <th>Email</th>
                          {{--  <th>Password</th> --}}
                          <th>Quyền</th>
                          <th>Trạng thái</th>
                          <th>Avata</th>
                          <th>Score</th>
                          <th>Sửa/Xóa</th>
                        </tr>
                      </thead>
                      @foreach($users as $key => $value)
                      <tbody>
                         <tr>
                          <td>{{ ($value->id) }}</td>
                          <td>{{ ($value->name) }}</td>
                          {{-- <td>{{ $value->hovaten }}</td> --}}
                          <td>{{ $value->diaChi }}</td>
                          <td>{{ $value->SDT }}</td>
                          <td>{{ $value->email }}</td>
                          {{--  <td>{{ $value->password }}</td> --}}
                          <td>{{ $value->quyen }}</td>
                          <td>{{ $value->trangThai }}</td>
                          <td><img src="{{ ('admin/anhuser'.'/'.$value->avata) }}" width="36px" height="36px"></td>
                          <td>{{ $value->score }}</td>
                          <td>
                            <span class="sua" style="font-size: 22px"><a href="{{ URL::to('/edit-account'.'/'.$value->id) }}"><i class="fa fa-check-square-o" aria-hidden="true"></i></a></span>
                           {{--  <label class="sss" style="font-size: 20px; color: red">/</label> --}}
                            <span class="xoa" style="font-size: 22px"><a onclick="return confirm('Are you sure to delete?')" href="{{ URL::to('/delete-account'.'/'.$value->id) }}"><i class="fa fa-times" aria-hidden="true"></i></a></span>
                          </td>
                        </tr>
                      </tbody>
                      @endforeach
                      
                    </table>
                    @endif
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
                  {{ $users->links()  }}
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
