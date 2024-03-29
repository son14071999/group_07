<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
  .box{
    width:600px;
    margin:0 auto;
  }
</style>
  
  <link href="{{ asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet">
  
  <link href="{{ asset('admin/assets/css/font-awesome.min.css')}}" rel="stylesheet">
  
  <link href="{{ asset('admin/assets/css/main.css')}}" rel="stylesheet">
  <!-- theme css -->
  <link href="{{ asset('admin/assets/css/theme.css')}}" rel="stylesheet">
  
  <style type="text/css">
    .timkiem_ {
    margin-left: 800px;
    }
    span.hienthimes {
    color: black;
    font-size: 25px;
}
  </style>
  
</head>

<body class="page-header-fixed page-sidebar-menu-border  page-sidebar-fixed ">
  <div class="page-header navbar aqua-bg fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
      <!-- BEGIN LOGO -->
      <div class="page-logo">
        <p style="margin: 7px"></p>
        <span style="color: red ; font-size: 23px; margin-left: 20px"> Chào mừng Admin</span>
              
      </div>
      
      <div class="top-menu">
         

    
        <ul class="nav navbar-nav pull-right hidden-sm-down">
          
          
          <!-- START USER LOGIN DROPDOWN -->
          <li class="dropdown dropdown-user">
            <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
            <img src="{{asset('images/'.Auth::user()->avata)}}" class="rounded-circle" alt="">
             <span class="username username-hide-on-mobile"> {{ Auth::user()->name }}</span>             <i class="fa fa-angle-down"></i> </a>
            <ul class="dropdown-menu dropdown-menu-default">
              
              
              <li>
              
                <a href="{{ route('logout') }}"> <i class="icon-key"></i> Đăng xuất </a>
              </li>
            </ul>
          </li>
          <!-- END USER LOGIN DROPDOWN -->
        </ul>
      </div>
      <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
  </div>


  
  
    <!-- Start page sidebar wrapper -->
    <div class="page-sidebar-wrapper">
      <div class="page-sidebar sidebar-light">
        <ul class="page-sidebar-menu  page-header-fixed ">
          
          
            <a class="nav-link nav-toggle" href="{{ URL::to('/trangchu-admin') }}"> <i class="fa fa-th-large"></i> <span class="title" style="font-size: 15px; margin: 5px">Quản lý</span> <span class="arrow"></span> </a>
            <li class="nav-item">
            <a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-file-o"></i> <span class="title">Thể loại đề thi</span> <span class="arrow"></span> </a>
            <ul class="sub-menu">
              <li class="nav-item">
                <a class="nav-link nav-toggle" href="{{URL::to('/add-category-exam')}}"> <span class="title">Thêm thể loại</span> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-toggle" href="{{ URL::to('/all-category-exam') }}"> <span class="title">Tất cả thể loại đề</span> </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-book"></i> <span class="title">Danh sách đề thi</span> <span class="arrow"></span> </a>
            <ul class="sub-menu">
              <li class="nav-item">
                <a class="nav-link nav-toggle" href="{{ URL::to('/add-exam') }}"> <span class="title">Thêm đề thi</span> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-toggle" href="{{ URL::to('/all-exam') }}"> <span class="title">Tất cả đề thi</span> </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-book"></i> <span class="title">Danh sách các câu hỏi</span> <span class="arrow"></span> </a>
            <ul class="sub-menu">
              <li class="nav-item">
                <a class="nav-link nav-toggle" href="{{ URL::to('/add-question') }}"> <span class="title">Thêm câu hỏi</span> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-toggle" href="{{ URL::to('/all-question') }}"> <span class="title">Tất cả câu hỏi</span> </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-address-card-o"></i> <span class="title">Danh sách tài khoản</span> <span class="arrow"></span> </a>
            <ul class="sub-menu">
              <li class="nav-item">
                <a class="nav-link nav-toggle" href="{{URL::to('/add-account')}}"> <span class="title">Thêm tài khoản</span> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-toggle" href="{{ URL::to('/all-account') }}"> <span class="title">Tất cả các tài khoản</span> </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-table"></i> <span class="title">Bảng xếp hạng</span> <span class="arrow"></span> </a>
            <ul class="sub-menu">
              
              <li class="nav-item">
                <a class="nav-link nav-toggle" href="{{ URL::to('/bang-xep-hang') }}"> <span class="title">Bảng xếp hạng điểm</span> </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>

   @yield('content')
  
  <!-- Go top -->
  <a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>
  <!-- Go top -->
  
  <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
  <!-- bootstrap js -->
  
  <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
  
  <!-- main js -->
  <script src="{{ asset('admin/assets/js/main.js') }}"></script>

  <script>
  $(document).ready(function(){

   $('#search').keyup(function(){
    var query = $(this).val(); 
    if(query != '') 
    {
     var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
     $.ajax({
      url:"{{ URL::to('search-by-name') }}", 
      method:"POST", 
      data:{query:query, _token:_token},
      success:function(data){ //dữ liệu nhận về
       $('#hienthi').fadeIn();  
       $('#hienthi').html(data); 
     }
   });

     
   }
 });

   $(document).on('click', 'li', function(){  
    $('#hienthi').val($(this).text());  
    $('#hienthi').fadeOut();  
  });  

   

 });
</script>


<script>
  $(document).ready(function(){

   $('#search_de').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
    var query = $(this).val(); 
    if(query != '') 
    {
     var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
     $.ajax({
      url:"{{ URL::to('/search/by-name') }}", 
      method:"POST", 
      data:{query:query, _token:_token},
      success:function(data){ //dữ liệu nhận về
       $('#hienthi').fadeIn();  
       $('#hienthi').html(data); 
     }
   });

     
   }
 });

   $(document).on('click', 'li', function(){  
    $('#hienthi').val($(this).text());  
    $('#hienthi').fadeOut();  
  });  

   

 });
</script>




</body>

</html>