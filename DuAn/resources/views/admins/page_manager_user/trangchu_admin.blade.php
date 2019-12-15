 @extends('admins.admin_layout')
 @section('title')
  Trangchu-Admin
@endsection
 @section('content')
    <div class="page-content-wrapper animated fadeInRight">
      <div class="page-content">
        <div class="wrapper-content pt-0 ">
          <div class="row">
            <!-- begin col-3 -->
            <div class="col-md-3 col-sm-6">
              <div class="widget widget-stats mt-0 red-bg">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-title"> Số đề </div>
                <div class="stats-number">{{ $sode }}</div>
                <div class="stats-progress progress">
                  <div style="width: 70.1%;" class="progress-bar"></div>
                </div>
                <div class="stats-desc">Better than last week (70.1%)</div>
              </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-md-3 col-sm-6 mtop15">
              <div class="widget widget-stats mt-0 aqua-bg ">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-tags fa-fw"></i></div>
                <div class="stats-title">Số tài khoản</div>
                <div class="stats-number">{{ $sotaikhoan }}</div>
                <div class="stats-progress progress">
                  <div style="width: 40.5%;" class="progress-bar"></div>
                </div>
                <div class="stats-desc">Better than last week (40.5%)</div>
              </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-md-3 col-sm-6 mtop15">
              <div class="widget widget-stats mt-0 green-bg">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-shopping-cart fa-fw"></i></div>
                <div class="stats-title">Số người đang online</div>
                <div class="stats-number">{{ $songuoionline }}</div>
                <div class="stats-progress progress">
                  <div style="width: 76.3%;" class="progress-bar"></div>
                </div>
                <div class="stats-desc">Better than last week (76.3%)</div>
              </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-md-3 col-sm-6 mtop15">
              <div class="widget widget-stats mt-0 orange-bg">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-comments fa-fw"></i></div>
                <div class="stats-title">Số COMMENTS</div>
                <div class="stats-number">{{ $socomment }}</div>
                <div class="stats-progress progress">
                  <div style="width: 54.9%;" class="progress-bar"></div>
                </div>
                <div class="stats-desc">Better than last week (54.9%)</div>
              </div>
            </div>
            <!-- end col-3 -->
          </div>
          <span class="anh">
          <img src="{{ ('admin/assets/images/hinhanhbandau.jpg') }}"  alt="" width="100%"></span>
          
<!-- start footer -->
        <div class="footer">
                  <div class="pull-right">
                   
                  </div>
                  <div> <strong>Copyright</strong> Ademin &copy; 2019 </div>
                </div>
        </div>
      </div>
    </div>
@endsection