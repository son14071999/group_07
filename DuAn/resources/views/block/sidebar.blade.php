@extends('index')
@section('sidebar')
    @if($theloai)
        <div class="w3-bar-block w3-black" style="width:120px">
            <a href="{{route('home')}}" class="w3-bar-item w3-button" style="background: #8bc34a;">HOME</a><br>
            @foreach($theloai as $tl)
                <a href="{{ $tl->theLoai }}" class="w3-bar-item w3-button">{{ $tl->theLoai }}</a><br />
            @endforeach

        </div>
    @endif
@endsection
