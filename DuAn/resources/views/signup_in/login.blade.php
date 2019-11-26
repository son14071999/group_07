<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<link rel="stylesheet" type="text/css" href="css1/signup/type.css">
</head>
<body>
	<form action="" method="post" name="fromsignin" style="margin: auto auto; max-width: 400px ">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div id="sign-up">LOGIN</div>
		@if(session('thanhcong'))
	      <div class="alert alert-success" style="text-align: center;color: #1EDB34;">{{session('thanhcong')}}</div>
	    @endif
	    @if(session('loi'))
	    	<div class="alert alert-success" style="text-align: center;color: #E32121;">{{session('loi')}}</div>
	    @endif
		<div class="container">
			<label ><b>Username</b></label>
	      	<input type="text" placeholder="Enter Username" name="username" id="username" >
	     	 <label ><b>Password</b></label>
	      	<input type="password" placeholder="Enter Password" name="password" id="password" >
	      	<button type="submit">LOG IN</button>
		</div>
		</div>
		    <div style="text-align: center;opacity: 0.6;"><a href="#" >Forgot your password?</a></div>
		    <div style="text-align: center;opacity: 0.6;">Not a member? <a href="{{url('signup')}}" style="text-align: right;">Yes</a></div>
	    </div>
	</form>
</body>
</html>
