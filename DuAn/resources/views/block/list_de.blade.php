    <link rel="stylesheet" href="{{asset('css/style1.css')}}">

@if($list_de)
    @foreach($list_de as $de)
        <div class="mb-30 sided-250x s-lg-height card-view">
            @if($de->image)
                <div class="s-left">
                    <img src="{{ $de->image }}" alt="">
                </div><!-- left-area -->
            @else
                <div class="s-left">
                    <img src="https://trungcapphuongnam.edu.vn/images/files/trungcapphuongnam.edu.vn/de-cuong-on-thi-thpt-quoc-gia-mon-tieng-anh.jpg" alt="">
                </div>
            @endif
            <div class="s-right ptb-30 pt-sm-20 pb-xs-5 plr-30 plr-xs-0">
                <h4><a href="{{route("showde", Str::slug($de->tenDe))}}">{{ $de->tenDe }}</a></h4>
                <ul class="mtb-10 list-li-mr-20 color-lite-black">
                    <li><img src="https://img.icons8.com/doodle/48/000000/calendar.png" style="width: 18px;height: 16px;">{{ $de->created_at->format('d/m/Y') }}</li>
                    <li><img src="https://img.icons8.com/carbon-copy/100/000000/hand-with-pen.png" style="width: 18px;height: 16px;">{{ $de->soNguoiLam }}</li>
                </ul>
            </div>
    </div>
    @endforeach

@else
    <p>Không tìm thấy đề liên quan</p>
@endif
