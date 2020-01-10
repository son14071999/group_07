@extends('index')
@section('content')
    <div class="container" style="background: #FFFFFF; min-height: 700px;">
        
         <h1234 class="kqthi" style="color: red; font-size: 32px; margin-left: 100px"> Chúc mừng bạn hoàn thành được bài thi</h1234>
         <br>
         <h1111>Bạn trả lời được : {{ $dem }} câu hỏi</h1111><br>
         <h123>Nhận xét:</h123><br>
         <h123>Bạn đang thuộc top những người có học lực </h123>
         @if($dem<=10)
         <h2222>Yếu</h2222><h> Bạn cần cố gắng hơn trong những lần sau!<h>
         @elseif($dem<25 && $dem>10)
            <h2222>Trung Bình</h2222><h> Bạn cần cố gắng hơn trong những lần sau!<h>
        @elseif($dem>=25 && $dem<40)
            <h2222>Khá</h2222><h> Hãy cỗ gắng lên!<h>
           @else
            <h2222>Giỏi</h2222><h> Rất tốt!<h>
         @endif
        <br>
        <h2222>Bạn được cộng {{ $dem }} vào tài khoản của mình hãy tiếp tục cố gắng nâng cao thành tích của mình trên bảng xếm hạng.</h2222><br>
        <div id="showkq" style="color: blue">  Chi tiết đáp án </div>
        <div id="hienthikqthi">
            <strong><h1234>Câu hỏi </h1234></strong><strong><h1233 class="bc">Bạn chọn</h1233></strong><strong><h1235 class="dad">Đáp án đúng</h1235></strong><br>
            

            <?php for($i=1;$i<=count($cautraloidung); $i++) {?>
                <h12345 class="ab">{{  $i}} </h1234>
                <h12335 class="bc">
                    @if($ctldung[$i]=='0')
                    _
                    @else
                {{ $ctldung[$i] }}
                @endif
                </h1233>
                <h12355 class="dad">{{ $cautraloidung[$i] }}</h1235>
                <br>
            <?php } ?>
        </div>
     
    </div>

@endsection
<style type="text/css">
    #hienthikqthi{
        display: block;
        ;
    }
    h2222{
        color: red
    }
    h1235.dad {
    margin-left: 70px;
}
    h1233.bc {
    margin-left: 70px;}
    h12345.ab {
    margin-left: 30px;
}
h12335.bc {
    margin-left: 120px;
}
h12355.dad {
    margin-left: 120px;
}
}
</style>
<script type="text/javascript">
 $(document).ready(function(){
  $("#showkq").click(function(){
        $(#hienthikqthi).css('display','block')
  });
});


 
    
    

</script>
