@extends('layouts.home')
@section('content')
    <div id="page-title" class="padding-tb-30px gradient-white">
        <div class="container text-left">
            <h1 class="font-weight-300">{{$quiz->title}}</h1>
        </div>
    </div>


    <div class="container">
        <div class="row">

            <div class="col-lg-8">
                <div class="margin-bottom-40px card border-0 box-shadow">
                    <div class="padding-lr-30px padding-tb-20px">
                        <hr>
                        <h3>Tanımlamalar</h3>
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
                                <li class="list-group-item"><a href="{{route('quiz.katil',$quiz->slug)}}" class="btn btn-secondary">{{$quiz->title}} Quizine Katıl</a>
                                </li>

                                </ul>

                            </div>
                                </div>
                            </div>
                        </ul>

                        <hr>
                        <hr>
                        <div class="row no-gutters">

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
