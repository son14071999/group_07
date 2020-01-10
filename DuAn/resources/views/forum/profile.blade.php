@extends('forum.layouts')
@section('title','Profile')
@section('content')
<br><br>
<div class="container">
  <div class="jumbotron" id="tc_jumbotron">
    <div class="card-body" id="xx" style="color: black;     border:1px solid #fff;">
        <div class="text-center"> 
           <h1 style=" font-size: 3.5rem;">Profile</h1> 
       
          </div>
        </div> 
      </div> 
    </div>  
        <div class="container"> 
           
             <div class="col-md-12" id="tc_container_wrap">
             
                <span class="hinhanh-profile"><img src="{{ asset('/images/'.$user->avata) }}" width="100px" height="100px"></span>
              
                

              <div class="noidunguser">
          <p>
            <label class="lb">Tên đăng nhập</label>

            <span class="dinhdang">
              <h1000><input type="text" name="tendangnhap" class="tendangnhap" value="{{ $user->name}}" disabled></h1000>
            </span>
            
            
          </p>
         
          <p>
            <label class="lb">Địa chỉ email<span style="color: red">*</span></label>
            <span class="dinhdang">
              <h1000><input type="mail" name="email" class="email" value="{{ $user->email }}"></h1000>
            </span>
          </p>
          <p>
            <label class="lb">Điện thoại di động<span style="color: red">*</span></label>
            <span class="dinhdang">
              <h1000><input type="text" name="dienthoai" class="dienthoai" value="{{ $user->SDT }}"></h1000>
            </span>
          </p>
          <p>
            <label class="lb">Đối tượng<span style="color: red"></span></label>
            <span class="dinhdang">
              <h1000><input type="text" name="doituong" class="doituong" value="HỌC SINH " disabled></h1000>
            </span>

          </p>
          <p>
            <label class="lb">Địa chỉ<span style="color: red">*</span></label>
            <span class="dinhdang">
              <h1000><input type="text" name="diachi" class="doituong" value="{{ $user->diaChi }}" disabled></h1000>
            </span>
            
          </p>
         
          <p>
            <label class="lb">Điểm<span style="color: red"></span></label>
            <span class="dinhdang">
              <h1000><input type="text" name="diem" class="lop" value="{{ $user->score }}" ></h1000>
            </span>

          </p>
        
        </div>
    
</div><br><br>
@endsection
<style type="text/css">
    .title {
      margin-top: 100px;
        margin-left: 90px;
    }
    .noidunguser {
      margin-top: 20px;
        margin-left: 90px;
    }
    label.lb {
          width: 190px;
      }
    button.suathongtinuser {
      margin-left: 100px;
    color: red;
    background: #aaff56;
    border-radius: 200px;
    width: 100px;
}
input.tendangnhap {
    width: 500px;
}
input.hovaten {
    width: 500px;
}
input.email {
    width: 500px;
}input.dienthoai {
    width: 500px;
}
input.doituong {
    width: 100px;
}
select.diachi {
    width: 500px;
}
select.truong {
    width: 500px;
}
input.lop {
    width: 500px;
}
label.lb_avatar {
    margin-left: 130px;
}
span.hinhanh-profile {
    margin-left: 500px;
}
  </style>