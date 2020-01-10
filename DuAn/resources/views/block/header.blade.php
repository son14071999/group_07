<div class="py-2 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9 d-none d-lg-block">
                <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> Have a questions?</a>
                <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span> 10 20 123 456</a>
                <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span> info@mydomain.com</a>
                 @if(Auth::check())
                        @if(Auth::user()->quyen==1)
                        <a href="{{ route('trangchu_admin') }}" class="small mr-3" style="color: red; font-size: 15px"><strong>Đến trang Admin</strong></a>
                        @endif
                        @endif
            </div>
            <div class="col-lg-3 text-right">
                @if(Auth::check()==false)
                    <a href="{{ route('login') }}" class="small mr-3"><span class="icon-unlock-alt"></span> Log In</a>
                    <a href="" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span> Register</a>
                @else
                    <a href="{{ route('profile', Auth::user()->id) }}" class="small mr-3"><i class="fas fa-user-alt"></i> {{ Auth::user()->name }}</a>
                    <a href="{{route('logout')}}" class="small btn btn-primary px-4 py-2 rounded-0"><i class="fas fa-sign-out-alt"></i> Logout</a>
                @endif
            </div>
        </div>
    </div>
</div>
<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

    <div class="container">
        <div class="d-flex align-items-center">
            <div class="site-logo">
                <a href="{{route('home')}}" class="d-block">
                    <img src="{{asset('images/logo.jpg')}}" alt="Image" class="img-fluid">
                </a>
            </div>
            <div class="mr-auto">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li class="active">
                            <a href="{{route('home')}}" class="nav-link text-left">Home</a>
                        </li>
                        @foreach($theloai as $tl)
                            <li>
                                <a href="{{ route('theloai',Str::slug($tl->theLoai)) }}" class="nav-link text-left">{{ $tl->theLoai }}</a>
                            </li>
                        @endforeach
                        <li><a href="{{ route('forum.index') }}" class="nav-link text-left">Forum</a></li>
                         <li><a href="{{ route('bxh') }}" class="nav-link text-left">BXH</a></li>

                    </ul>                                                                                                                                                                                                                                                                                          
                </nav>

            </div>
        </div>
    </div>

</header>
