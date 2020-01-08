@extends('forum.layouts')
@section('title','Create new toppic')
@section('content')
<br><br>
<div class="container">
  <br><br>
     <div class="jumbotron" id="tc_jumbotron">
        <div class="col-md-8 offset-md-2">
          <div class="text-center"><h3 style="color: black;  ">Create new toppic</h3></div><hr style="background: #fff"> 
        </div>
      <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card"> 
                <div class="card-body">
                   <form action="{{route('forum.store')}}" method="post"  enctype="multipart/form-data">
                      {{csrf_field()}}
                    <div class="form-group">
                      <input type="text" id="tc_input" class="form-control" name="title" placeholder="Title"> 
                    </div>
                    
                   <div class="des"> 
                 <a class="btn btn_tc btn-block" data-toggle="collapse" data-target="#description-textarea" style="color: #777">Content</a> 
              <div id="description-textarea" class="collapse">     
                <div class="bg">
                   <div class="form-group">
                        <textarea type="text" class="form-control" id="tc_input" name="description" placeholder="description"> </textarea>
                      </div>
                </div> 
              </div>             
            </div>
               <div class="form-group">
                <select name="tags[]" multiple="multiple" id="tc_input" class="form-control tags" id="">

                        @foreach($tags as $tag)
                         <option value="{{$tag->id}}">{{$tag->name}}</option>
                         @endforeach
                       </select>
                    </div>
             
            {{--  <a data-toggle="collapse" data-target="#screenshot-open"><i class="fa fa-image" id="upload_image"></i></a>
            <div id="screenshot-open" class="collapse">  
              <div class="bg">
                 <div class="form-group">
                     <input type="file" class="form-control" name="image" placeholder="image" style="background-color: #f5f8fa;"> 
                  </div>
              </div> 
            </div> --}}
             <br> 
            
             <button type="submit" class="btn btn-success btn-block">Submit</button>
               </form>
              </div>
              </div>
           <br>

          <div class="create_info" style="color: red;">
            <h5><i class="fa fa-info-circle"></i> Info</h5>
            <span>- Ấn vào biểu tượng <strong>Content</strong> để viet noi dung.</span> 
          </div><br>
         {{--  <div class="alert alert-info alert-dismissible fade show" role="alert">
          @forelse($forums as $forum)
          <b>Câu hỏi cuối cùng của bạn:</b><br>

           <a href="#" style="color: #444"><h5 style="margin-top: 4px;"><i class="fa fa-newspaper-o"></i> {{$forum->title}}</h5></a> 
           @empty
        <strong> Những câu hỏi mới sẽ xuất hiện ở đây.</strong><br> 
          @endforelse
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function() {
       $(".tags").select2({
            placeholder: "Select Tags",
            maximumSelectionLength: 3
        });

      CKEDITOR.replace( 'description' );

    });


    
</script>
@endsection
