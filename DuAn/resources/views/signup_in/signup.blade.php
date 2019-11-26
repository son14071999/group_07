<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css1/my_style.css">
<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">    

<link rel="stylesheet" type="text/css" href="css1/signup/type.css">
</head>
<body>
{{-- @include('block.header2') --}}
  <form action="{{route('signup')}}" method="post" style="margin: 30px auto">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    
    
    <p id="sign-up">SIGN UP</p>

    <div class="imgcontainer">
      <img src="./images/sign_up/anh1.png" alt="Avatar" class="avatar">
    </div>
    @if(count($errors) > 0)
      <div class="alert alert-success">
        @foreach($errors->all() as $err)
            <div style="color: #E91E1E; padding-left: 10px;">{{$err}}</div>
        @endforeach
      </div>
    @endif
    <div class="container">
      <label ><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" id="username" >

      <label ><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" id="password" >

      <label ><b>Password confirmation</b></label>
      <input type="password" placeholder="Enter Password" name="password_confirmation" id="password_confirmation" 
      >

      <label><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" id="email" btn-block >

      <label>Avatar</label>
      <input type="file" name="avatar" accept="image/x-png,image/gif,image/jpeg">
      <!-- <div class="custom-file"> -->
      {{-- <label class="custom-file-label" for="customFile">Avatar: </label>
      <input type="file" class="custom-file-input" id="customFile" accept="image/x-png,image/gif,image/jpeg" name="selectAvatar"> --}}
      
    <!-- </div> -->

      <button type="submit">Sign Up</button>
      {{-- <label> --}}
        <!-- <input type="checkbox" checked="checked" name="remember"> Remember me -->
      {{-- </label> --}}
    </div>
    <div class="Atready">
      Atready a member?
    </div>
    <p class="sign-in">
      <a href="{{url('login')}}">sign in</a>
    </p>
    <!-- <div class="container" style="background-color:#f1f1f1">
      <button type="button" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div> -->
  </form>

</body>
</html>
