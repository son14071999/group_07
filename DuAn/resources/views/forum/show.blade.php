@extends('forum.layouts')
@section('title',"$forums->title")
@section('content')
<div class="container">
  <div class="jumbotron" id="tc_jumbotron">
   {{-- 
    --}}
  </div>
</div>  
<div class="container">
    <div class="row">
        <div class="col-md-12" id="tc_container_wrap">
            <div class="card" id="tc_paneldefault" style="background: #f9f9f9;"> 
                <div class="card-body" id="tc_panelbody">
                    <div class="row">
                        <div class="col-md-8">
                          <div class="card">
                             <div class="card-body" style="background: #f9f9f9;"> 
                      <div class="forum_info">
                     <div class="share pull-right">
                     {{--  <a href="#">  <i class="fa fa-facebook"></i></a> --}}
                    
                     @if( Auth::check() )
                     @if(Auth::user()->id==$forums->user->id)
                      <a href="{{ route('forum.edit', $forums->id) }}">  <i class="fa fa-pencil"></i></a>
                     @endif
                      @endif
                      
                     {{--  <a href="#">  <i class="fa fa-google-plus"></i></a> --}}
                      </div>
                    <a href="#" class="badge badge-success">{{ $forums->user->name }}</a> |
                    <small>{{$forums->created_at->diffForHumans()}}</small> |
                    <small> {{ count($soview) }} Views</small> |
                    <small>{{ $forums->comments->count() }} Comments</small> |
                    @foreach($forums->tags as $tag)
                    <div class="badge badge-success">#{{$tag->name}}</div>
                    @endforeach
                   {{--  @if (empty($forums->image))
                            @else
                          <div class="badge badge-success"><i class="fa fa-image"></i></div>
                           @endif --}}
                    <h3>{{$forums->title}}</h3> 
                  </div>
                  <hr style="margin-top: 0; margin-bottom: 5px;">
                  <div class="forum_description">
              {{--     @if (empty($forums->image))
                        @else
                        <br>
                    <div class="tc_if_empty">
                   <a data-toggle="collapse" data-target="#open_modal"><i class="fa fa-image" id="zoom_image"></i></a>
                <div id="open_modal" class="collapse"> 
                  <div class="bg">
                    <img src="{{asset('images/'.$forums->image)}}" alt="">
                    <div class="overlay">
                     <a href="#myModal" data-toggle="modal" data-target="#myModal"><h2>Zoom</h2> </a> 
                    </div>
                  </div>
                    </div>
                    </div>   --}}
                       {{-- @endif --}}
                    <p>{!!$forums->description!!}</p>
                  </div>
                </div>
              </div>
            <!-- Modal -->
           {{--  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Screenshot:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body" id="modal_img">
                 <img src="{{asset('images/'.$forums->image)}}" alt="">
                  </div> 
                </div>
              </div>
            </div> --}}

            <br>
           
            @forelse($forums->comments as $comment)
            <div class="card">
  <div class="card-header" style=" background-color: #2ab27b; color: #fff; border-top-right-radius: 0px; border-top-left-radius: 0px;"><i class="fa fa-clock-o" style="color: #eee"></i> <small style="color: #eee">{{ $comment->created_at->diffForHumans() }}</small></div>
  <div class="card-body" style="background: #f9f9f9; "> 
    <div class="row">
      <div class="col-md-3" id="img_comment">
        @foreach($user as $u)
        @if($comment->user->name == $u->name)
        <img src="{{asset('images/'.$u->avata)}}" width="39px" height="39px">
        @endif
        @endforeach
        <br>
        <div class="comment_user">
            <a href="{{ route('profile',$comment->user->id) }}"><b>{{ $comment->user->name }}</b></a>
        </div>
      </div>
      <div class="col-md-8">
      {{ $comment->content }}
      </div>
    </div>
</div>
<div class="card-footer link_a">
  {{-- <div class="info_comment">
   
   <a data-toggle="collapse" href="#info-{{ $comment->id }}"><i class="fa fa-info-circle"></i> Info</a>
  </div> --}}
 <div class="reply_comment">
 <a class="reply_" data-toggle="collapse" href="#reply-{{ $comment->id }}">{{ $comment->comments->count() }}<i class="fa fa-comment-o"></i> Reply</a>
 </div>
</div>
 {{-- x --}}
 <div id="reply-{{ $comment->id }}" class="card-collapse collapse">
  <div class="card-body">
    <!-- forelse reply-->

    {{-- reply --}}
    @forelse($comment->comments as $reply)
  <div class="card">
      <div class="card-header" style="background-color: #2ab27b; color: #fff; border-top-right-radius: 0px; border-top-left-radius: 0px;"><i class="fa fa-clock-o" style="color: #eee"></i> <small style="color: #eee">{{ $reply->created_at->diffForHumans() }} </small></div>
      <div class="card-body" style="background: #f9f9f9;"> 
        <div class="row">
      
       <div class="col-md-3" id="img_comment_reply">
         @foreach($user as $u)
        @if($reply->user->name == $u->name)
        <img src="{{asset('images/'.$u->avata)}}" width="39px" height="39px">
        @endif
        @endforeach
        <br>
        <div class="comment_user">
        <a href="{{ route('profile',$reply->user->id) }}"><b>{{ $reply->user->name }}</b></a>
        </div>
      </div>
      <div class="col-md-8"> {{ $reply->content }}</div>
    </div>
    </div>
    </div>
    <br>
    @empty
    
    <p> No reply</p>
  @endforelse

   </div>

      <div class="panel-body" style="    border-top: 1px solid #eee;">
        <form action="{{ route('reply_comment', $comment->id) }}" method="post" style="    padding: 0 16px;">
      {{csrf_field()}}
      <div class="form-group">
     {{--  <input type="text" name="content" class="form-control" id="input_reply" placeholder="Reply here..">   --}}
      <textarea type="text" name="content" class="form-control" id="input_reply" placeholder="Reply here.."></textarea>      
      </div>
      @if(Auth::check())
      <button class="btn btn-success" type="submit">Post</button>
      @else
      <a href="{{ route('login') }}"><h1000 style="color: red">Please login to reply</h1000></a>
      @endif
      </form>
      </div>
    </div>
  </div>
  <br>
  @empty
    
    <p> No comment</p>
  @endforelse
<!-- endforelse -->
  <hr>

            <!-- them comment -->
            <hr>
            <div class="panel panel-default" style="background-color: #f9f9f9;">
              <div class="panel-body">
            <div class="add_comment">
              <div class="open_comment">
                  <div class="h1"><h4>Add a Comment</h4></div>
              </div>
              <div class="comment-show">
                <form action="{{ route('add_comment', $forums->id) }}" method="post">
                  {{csrf_field()}}
                <div class="form-group">
                  {{-- <input type="text" name="content" id="Your-Answer" placeholder="Your Comment:" required="required"> --}}
                  <textarea type="text" name="content" id="Your-Answer" placeholder="Your Comment:" required="required" style="margin: 0px; height: 59px; width: 420px; resize: auto" ></textarea>
                  {{-- <label for="Your-Comment">Your Comment:</label>     --}}
                </div>
                <div class="button-gg"> 
                   @if(Auth::check())
      <button class="btn btn-success" type="submit">Post</button>
      @else
      <a href="{{ route('login') }}"><h1000 style="color: red">Please login to comment</h1000></a>
      @endif
                </div>
              </form>
              </div>
            </div>
              </div>
            </div>
            </div>
               <div class="col-md-4">
                  @include('forum.popular')
            </div>
             </div>
            <hr style="margin-top: 0;">
              </div>
            </div>
           </div>
          </div>
      </div><br>
@endsection

<!-- css -->

<style type="text/css">
input {
  font-family: inherit;
  -webkit-appearance: none;
  -moz-appearance: none;
  border: 0;
  border-bottom: 1px solid #AAAAAA;
  font-size: 16px;
  color: #000;
  border-radius: 0;
}
input[type="text"],
input[type="password"] {
  width: 100%;
  height: 40px;
      background: transparent;
}
button,
input:focus {
  outline: 0;
}
::-webkit-input-placeholder { 
  font-size: 16px;
  font-weight: 300;
  letter-spacing: -0.00933333em;
}
.form-group {
  position: relative;
  padding-top: 15px;
  margin-top: 10px;
}
label {
  position: absolute;
  top: 0;
  opacity: 1;
  -webkit-transform: translateY(5px);
          transform: translateY(5px);
  color: #aaa;
  font-weight: 300;
  font-size: 13px;
  letter-spacing: -0.00933333em;
  transition: all 0.2s ease-out;
}
input:placeholder-shown  + label {
  opacity: 0;
  -webkit-transform: translateY(15px);
          transform: translateY(15px);
}
.h1 {
  color: #999;
  opacity: 0.8;
  margin: 0;
  font-size: 15px;
  font-weight: 400;
  transition: all 770ms cubic-bezier(0.51, 0.04, 0.12, 0.99);
  text-align: center;
  cursor: pointer; 
}
.open .h1 {
  -webkit-transform: translateX(200px) translateZ(0);
          transform: translateX(165px) translateZ(0);
}
.h2 {
  color: #000;
  font-size: 20px;
  letter-spacing: -0.00933333em;
  font-weight: 600;
  padding-bottom: 15px;
}
.add_comment {
  height:160px;
  border-radius: 4px;
  overflow: hidden;
  position: relative;
}
.open_comment {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: all 770ms cubic-bezier(0.51, 0.04, 0.12, 0.99);
  overflow: hidden;
}
.open_comment img {
  object-fit: cover;
  width: 100%;
  height: 100%;
  display: block;
  transition: all 770ms cubic-bezier(0.51, 0.04, 0.12, 0.99);
  object-position: left;
}
.open .open_comment img {
  -webkit-transform: translateX(280px) translateZ(0);  
          transform: translateX(280px) translateZ(0);  
}
.open .open_comment {
  -webkit-transform: translateX(-400px) translateZ(0);
          transform: translateX(-400px) translateZ(0);
} 
.comment-show {
  position: absolute;
  top: 0;
  right: 0;
  width: 457px;
  -webkit-transform: translateX(400px) translateZ(0);
          transform: translateX(468px) translateZ(0);
  transition: all 770ms cubic-bezier(0.51, 0.04, 0.12, 0.99);
}
.open .comment-show {
  -webkit-transform: translateX(0px) translateZ(0);
          transform: translateX(0px) translateZ(0);
}
input[type="checkbox"] {
  cursor: pointer;
  margin: 0;
  height: 22px;
  position: relative;
  width: 22px;
  -webkit-appearance: none;
  transition: all 180ms linear;
}
input[type="checkbox"]:before {
    border: 1px solid #aaa;
    background-color: #fff;
    content: '';
    width: 20px;
    height: 20px;
    display: block;
    border-radius: 2px;
    transition: all 180ms linear;
}
input[type="checkbox"]:checked:before {
  background: linear-gradient(198.08deg, #B4458C 45.34%, #E281E7 224.21%);
  border: 1px solid #C359AA;
}
input[type="checkbox"]:after {
  content: '';
  border: 2px solid #fff;
  border-right: 0;
  border-top: 0;
  display: block;
  height: 4px;
  left: 4px;
  opacity: 0;
  position: absolute;
  top: 6px;
  -webkit-transform: rotate(-45deg);
          transform: rotate(-45deg);
  width: 12px;
  transition: all 180ms linear;
}
input[type="checkbox"]:checked:after {
    opacity: 1;
} 
.button-gg {
  margin-top: 20px;
}
.btn-primary {
  color: #fff;
  background: linear-gradient(198.08deg, #B4458C 45.34%, #E281E7 224.21%);
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
}
.btn-secondary {
  color: #C359AA;  
}
.bg,
.overlay {
  text-align: center;
}
.bg .overlay  a{
  text-decoration: none;
}
img,
.overlay {
  transition: .3s all;
  border-radius: 3px;
}
.bg {
  /*float: left;*/
  max-width: 31%;
  position: relative;
  margin: .5%;
}
.bg img {
  width: 100%;
  margin-bottom: -4px;
}
.bg .overlay {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  width: 100%;
  background: rgba(0, 0, 0, 0.2);
  color: #fff;
  opacity: 0;
}
.bg .overlay h2 {
  padding-top: 14%;
  color: #fff; 
}
a.reply_ {
    margin-left: 550px;
}
.bg .overlay p {
  font-family: 'Julius Sans One', sans-serif;
}
.bg:hover .overlay {
  opacity: 1;
}
.bg:hover img {
  -webkit-filter: blur(2px);
  filter: blur(2px);
}

  
</style>

@section('js')
<script type="text/javascript">
  $(document).ready(function() {
  });
var openComment = document.querySelector('.h1');
var addComment = document.querySelector('.add_comment');
openComment.addEventListener('click', function(){
addComment.classList.toggle('open'); 
}); 
</script>
@endsection