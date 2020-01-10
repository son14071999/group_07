@extends('index')
@section('content')
    <div class="container" style="background: #FFFFFF; min-height: 700px;">
        
         <p style="text-align: center;font-size: 40px; color: #2BF07A;">{{$de['tenDe']}}</p>
        <?php $i=0; ?>
        <form action="{{ route('xuly',$de->id) }}" method="post">
            {{ csrf_field() }}
        
        @foreach($cauhoi as $ch)
            <label><strong>{{$ch->cauSo}}.  {{$ch->nd}}</strong></label><br />
            @foreach($cautl[$i] as $tl)
                
                <input type="radio" name="cauhoi{{ $i+1 }}" value="{{ $tl->maCTL }}"> {{ $tl->maCTL }}   {{ $tl->nd }}<br>
            @endforeach
            <?php $i++; ?>
            <p></p>
        @endforeach
        <button name="post">Nop bai</button>
        </form>
        
    </div>
@endsection
