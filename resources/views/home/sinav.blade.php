@extends('layouts.home')
@section('content')
    <div id="page-title" class="padding-tb-30px gradient-white">
        <div class="container text-left">
            <h1 class="font-weight-300">{{$sinav->title}}</h1>
        </div>
    </div>


    <div class="container">
        <div class="row">

            <div class="col-lg-8">
                <div class="margin-bottom-40px card border-0 box-shadow">
                    <div class="padding-lr-30px padding-tb-20px">
                        <hr>
                        <h3>Sınav Soruları</h3>
                        <div class="card-body">
                            <div class="card-text">
                                <form method="post" action="{{route('quiz.sonuc',$sinav->slug)}}">
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
    </div>
@endsection
