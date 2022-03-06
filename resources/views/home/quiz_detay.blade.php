@extends('layouts.home')
@section('content')
    <div class="height-600px">
    <div id="page-title" class="gradient-white">
        <div class="container py-4 text-left">
            <h1 class="font-weight-300">{{$quiz->title}}</h1>
        </div>
    </div>


    <div class="container padding-tb-95px max-w-screen-xl px-8">

                <div class="card border-0 box-shadow p-2">
                    <div class="text-center my-3">
                        <h2>Tanımlamalar</h2>
                    </div>
                        <ul>


                            <div class="row">
                                <div class="col-md-6">
                                    <li><strong>{{$quiz->description}}</strong> </li>

                                </div>
                                <div class="col-md-6">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Bilgisayar Mühendisliği</h5>
                                    <h5 class="card-title">Quize Ait Bilgiler</h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Bitiş Tarihi : {{$quiz->finished_at}}</li>
                                    <li class="list-group-item">Quiz Soru Sayısı : {{count($quiz->sorulars)}}</li>
                                @if($quizvarmi==0)

                                <li class="list-group-item"><a href="{{route('quiz.katil',$quiz->slug)}}" class="btn btn-secondary">Quize Katıl</a>
                                </li>
@elseif($quizvarmi==1)
                                   <li class="list-group-item"> <strong>Daha Önceden Sınava Girdin</strong></li>
                                    @endif
                                </ul>

                            </div>
                                </div>
                            </div>
                        </ul>


                </div>



    </div>
    </div>
    <div class="height-150px"></div>
@endsection
