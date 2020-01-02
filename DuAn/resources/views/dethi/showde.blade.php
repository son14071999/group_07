@extends('index')
@section('content')
    <div class="container" style="background: #FFFFFF; min-height: 700px;">
        <p style="text-align: center;font-size: 40px; color: #2BF07A;">{{$de['tenDe']}}</p>
        <?php $i=0; ?>
        {!! Form::open(['route' => ['xuly']]) !!}
        {!! Form::hidden('id_de',$de->id) !!}
        @foreach($cauhoi as $ch)
            <label>{{$ch->cauSo}}.  {{$ch->nd}}</label><br />
            @foreach($cautl[$i] as $tl)
                {!! Form::radio($ch->cauSo-1, $tl->maCTL) !!}{{ $tl->nd }}<br />
            @endforeach
            <?php $i++; ?>
            <p></p>
        @endforeach
        {!! Form::submit('Nop bai') !!}
        {!! Form::close() !!}
    </div>
@endsection
