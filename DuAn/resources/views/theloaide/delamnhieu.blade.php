
	@foreach($listDe as $ld)
		{{-- <a href="dethi/{{$ld->id}}">{{$ld->tenDe}}</a><br /> --}}
		{{-- {{ HTML::linkRoute('delamnhieu','ten de',['k'=>6]) }} --}}
		{!! Html::linkRoute("dethi", "$ld->tenDe", ["idDe" => $ld->id]) !!}<br />
	@endforeach
