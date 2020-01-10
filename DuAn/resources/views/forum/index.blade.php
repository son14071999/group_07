@extends('forum.layouts')
@section('title','Forum')
@section('content')
<br><br>
<div class="container">
  <div class="jumbotron" id="tc_jumbotron">
    <div class="card-body" id="xx" style="color: black;     border:1px solid #fff;">
        <div class="text-center"> 
           <h1 style=" font-size: 3.5rem;">FORUM</h1> 
       
          </div>
        </div> 
      </div> 
    </div>  
        <div class="container"> 
            <div class="row">
             <div class="col-md-12" id="tc_container_wrap">
            <div class="card" id="tc_paneldefault"> 
                <div class="card-body" id="tc_panelbody"  style="background: #f9f9f9;">  
               <div class="row">
               <div class="col-md-8" style="    padding-right: 0;"><br>
                <table class="table table-bordered">
              <thead id="tc_thead">
                <tr>
                  <th scope="col">Toppic</th>
                  
                  <th scope="col">Thời gian đăng</th>
                </tr>
              </thead>
              <tbody style="background: #f9f9f9;">
              @foreach($forums as $forum) 
                <tr> 
                <td width="550">
                <div class="forum_title">
                <h4> <a href="{{ route('forumslug', $forum->slug) }}">{{ Str::limit($forum->title, 50) }}</a></h4>
                <p> {!! Str::limit($forum->description, 60) !!}</p> 
                @foreach($forum->tags as $tag)
                <a href="#" class="badge badge-success tag_label">#{{ $tag->name }}</a>
                @endforeach
               
                </div> 
              </td>
               
              <td>
            <div class="forum_by">
            <small style="margin-bottom: 0; color: #666">{{ $forum->created_at->diffForHumans() }}</small>
             <small>by <a href="{{ route('profile', $forum->user->id) }}">{{ $forum->user->name }}</a></small>
                
            </div>
            </td>
            </tr> 
            @endforeach
           
              </tbody>
            </table>
                 <!-- pagination -->
                 {{ $forums->links() }}
              </div>
                <div class="col-md-4"> <br>
                    @include('forum.popular')
                </div>
                </div>
                <hr style="margin-top: 0;">
                @if(Auth::check())
                <form action="{{ route('forum.create') }}" method="get">
                   {{csrf_field()}}
                 <button type="submit" class="btn btn-success btn-block">Create new toppic</button>
                 </form> 
                 @endif
            </div>
          </div>
        </div>
    </div>
</div><br><br>
@endsection