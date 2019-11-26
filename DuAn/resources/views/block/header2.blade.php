<div class="container">
	<div class="row">

		<nav class="col-sm-10 navbar navbar-expand-sm navbar-dark header">
				<a class="navbar-brand" href="#">
					<img src="./images/logo.png" alt="logo">
				</a>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link tieude" href="#">Trang chủ</a>
					</li>


					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle tieude" href="#" id="navbardrop" data-toggle="dropdown">Đề thi</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="#">Lớp</a>
							<a class="dropdown-item" href="#">Đại học/Cao đẳng</a>
							<a class="dropdown-item" href="#">Topic/Ielst</a>
							<a class="dropdown-item" href="">Khác</a>
						</div>	
					</li>

					
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle tieude" href="#" id="navbardrop" data-toggle="dropdown">Bảng xếp hạng</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="#">Tất cả</a>
							<a class="dropdown-item" href="#">Đại học/Cao đẳng</a>					
							<a class="dropdown-item" href="#">Topic/Ielst</a>
							<a class="dropdown-item" href="#">Theo môn</a>
							<a class="dropdown-item" href="">Theo lớp</a>
						</div>
					</li>

					<li class="nav-item tieude">
						<a class="nav-link" href="#">Luyện tập</a>
					</li>
					
					<li class="nav-item tieude">
						<a class="nav-link" href="#">Thông tin</a>
					</li>
					<li class="nav-item tieude">
						<a class="nav-link" href="#">Ủng hộ</a>
					</li>
				</ul>
		</nav >
		@if(Auth::check())
			<nav class="col-sm-2 navbar navbar-expand-sm navbar-dark d-flex flex-row-reverse header">
				<button type="button" class="btn btn-secondary" style="margin-left: 10px;"><i class="fas fa-user"><a href="{{ url('logout') }}"> Logout </a></i></button>
				<div><a>{{Auth::user()->name}}</a></div>

			</nav>
		@else
		<nav class="col-sm-2 navbar navbar-expand-sm navbar-dark d-flex flex-row-reverse header">
			<button type="button" class="btn btn-secondary"><i class="fas fa-user"><a href="{{ route('login') }}"> Login</a></i></button>
		</nav>
		@endif
	</div>
</div>