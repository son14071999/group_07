{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--	<title>Log in</title>--}}
{{--	<link rel="stylesheet" type="text/css" href="css1/signup/type.css">--}}
{{--</head>--}}
{{--<body>--}}
{{--	<form action="" method="post" name="fromsignin" style="margin: auto auto; max-width: 400px ">--}}
{{--		<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
{{--		<div id="sign-up">LOGIN</div>--}}
{{--		@if(session('thanhcong'))--}}
{{--	      <div class="alert alert-success" style="text-align: center;color: #1EDB34;">{{session('thanhcong')}}</div>--}}
{{--	    @endif--}}
{{--	    @if(session('loi'))--}}
{{--	    	<div class="alert alert-success" style="text-align: center;color: #E32121;">{{session('loi')}}</div>--}}
{{--	    @endif--}}
{{--		<div class="container">--}}
{{--			<label ><b>Username</b></label>--}}
{{--	      	<input type="text" placeholder="Enter Username" name="username" id="username" >--}}
{{--	     	 <label ><b>Password</b></label>--}}
{{--	      	<input type="password" placeholder="Enter Password" name="password" id="password" >--}}
{{--	      	<button type="submit">LOG IN</button>--}}
{{--		</div>--}}
{{--		</div>--}}
{{--		    <div style="text-align: center;opacity: 0.6;"><a href="#" >Forgot your password?</a></div>--}}
{{--		    <div style="text-align: center;opacity: 0.6;">Not a member? <a href="{{url('signup')}}" style="text-align: right;">Yes</a></div>--}}
{{--	    </div>--}}
{{--	</form>--}}
{{--</body>--}}
{{--</html>--}}


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V19</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset("tk/images/icons/favicon.ico")}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset("tk/vendor/bootstrap/css/bootstrap.min.css")}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset("tk/fonts/font-awesome-4.7.0/css/font-awesome.min.css")}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset("tk/fonts/Linearicons-Free-v1.0.0/icon-font.min.css")}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset("tk/vendor/animate/animate.css")}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset("tk/vendor/css-hamburgers/hamburgers.min.css")}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset("tk/vendor/animsition/css/animsition.min.css")}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset("tk/vendor/select2/select2.min.css")}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset("tk/vendor/daterangepicker/daterangepicker.css")}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset("tk/css/util.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("tk/css/main.css")}}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
            <form class="login100-form validate-form" method="post" action="{{ route('loginn') }}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
{{--                @if(session('thanhcong'))--}}
{{--                    <div class="alert alert-success" style="text-align: center;color: #1EDB34;">{{ $thanhcong }}</div>--}}
{{--                @endif--}}
                @if(session('loi'))
                    <div class="alert alert-success" style="text-align: center;color: #E32121;">{!! session('loi') !!}</div>
                @endif
					<span class="login100-form-title p-b-33">
						Account Login
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="username" placeholder="Email/User">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>

                <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>

                <div class="container-login100-form-btn m-t-20">
                    <button class="login100-form-btn" type="submit">
                        Sign in
                    </button>
                </div>

                <div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Forgot
						</span>

                    <a href="#" class="txt2 hov1">
                        Username / Password?
                    </a>
                </div>

                <div class="text-center">
						<span class="txt1">
							Create an account?
						</span>

                    <a href="#" class="txt2 hov1">
                        Sign up
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>



<!--===============================================================================================-->
<script src="{{asset("tk/vendor/jquery/jquery-3.2.1.min.js")}}"></script>
<!--===============================================================================================-->
<script src="{{asset("tk/vendor/animsition/js/animsition.min.js")}}"></script>
<!--===============================================================================================-->
<script src="{{asset("tk/vendor/bootstrap/js/popper.js")}}"></script>
<script src="{{asset("tk/vendor/bootstrap/js/bootstrap.min.js")}}"></script>
<!--===============================================================================================-->
<script src="{{asset("tk/vendor/select2/select2.min.js")}}"></script>
<!--===============================================================================================-->
<script src="{{asset("tk/vendor/daterangepicker/moment.min.js")}}"></script>
<script src="{{asset("tk/vendor/daterangepicker/daterangepicker.js")}}"></script>
<!--===============================================================================================-->
<script src="{{asset("tk/vendor/countdowntime/countdowntime.js")}}"></script>
<!--===============================================================================================-->
<script src="{{asset("tk/js/main.js")}}"></script>

</body>
</html>
