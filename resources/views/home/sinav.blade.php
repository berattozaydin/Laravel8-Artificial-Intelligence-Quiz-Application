@extends('layouts.home')
@section('content')
    <div id="page-title" class="padding-tb-30px gradient-white">
        <div class="container text-left">
        	<div class="w-75 mx-auto">
            <div class="row">
            <div class="col-12 col-md-3 text-center">
            	<h1 class="font-weight-300">{{$sinav->title}}</h1>
            </div> 
            <div class="col-12 col-md-9 d-flex">	
            	<div class="ml-md-auto mx-auto mx-md-0"><h2>Kalan Süreniz</h2> <h2 class="text-center" id="saniye"></h2></div>
            </div>
            </div>
        </div>
        </div>
    </div>
<script type="text/javascript">
var deger;
var saniye=3601;
function saniyeBaslat()
{
	saniye --;
	if(saniye >=0){
		document.getElementById('saniye').innerHTML=((saniye/60).toFixed(2));
	}else{
		window.clearInterval(deger);
		alert("Süreniz bitti! Sistemden Çıkış Yapılıyor.");
		 window.location.href = "http://beratozaydin.org/logout";
	}
}
var deger=window.setInterval('saniyeBaslat()',1000);
</script>



    <div class="container">
    	<div class="w-75 mx-auto">
       	
                <div class="margin-bottom-40px mx-auto card border-0 box-shadow">
                    <div class="padding-lr-30px padding-tb-20px">
                        <hr>
                        <div><h3>Sınav Soruları</h3></div>
                        <div class="card-body">
                            <div class="card-text">
                                <form method="POST" action="{{route('quiz.sonuc',$sinav->slug)}}">
                                    @csrf

                        @foreach($sinav->sorulars as $soru)

                            <strong>Soru {{$loop->iteration}}: </strong> <h5 class="mt-2">{!! $soru->question!!}</h5>
                                    @if($soru->image_question)
                                        <img src="{{asset($soru->image_question)}}" alt="{{$soru->question}}" class="img-responsive" style="width: 250px;height: 200px;">
                                    @endif

                        <div class="form-check mt-3">
                            <input class="form-check-input" type="radio" name="{{$soru->id}}" id="quiz{{$soru->id}}1" value="a" required>
                            <label class="form-check-label" for="quiz{{$soru->id}}1">
                              A)  {!!$soru->a!!}
                            </label>
                        </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="{{$soru->id}}" id="quiz{{$soru->id}}2" value="b" required>
                                        <label class="form-check-label" for="quiz{{$soru->id}}2">
                                            B)  {!!$soru->b!!}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="{{$soru->id}}" id="quiz{{$soru->id}}3" value="c" required>
                                        <label class="form-check-label" for="quiz{{$soru->id}}3">
                                            C) {!!$soru->c!!}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="{{$soru->id}}" id="quiz{{$soru->id}}4" value="d" required>
                                        <label class="form-check-label" for="quiz{{$soru->id}}4">
                                            D)  {!!$soru->d!!}
                                        </label>
                                    </div>
                                    <hr>
                            @endforeach
                                        <button class="btn btn-primary btn-sm btn-block" type="submit">Sınavı Bitir</button>

                                </form>
                    </div>
                        </div>
                    </div>
                </div>

           </div>
        
    </div>
@endsection
