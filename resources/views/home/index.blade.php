@extends('layouts.home')
@section('content')
    <div class="banner height-430px">
        <div class="container">
            <div class="text-center my-3">
            <h1 class="pull-l font-weight-500">Karabük Üniversitesi Quiz Sitesi</h1>
            </div>
            <div class="width-250px mx-auto margin-top-20px rounded">
                <img src="{{asset('assets')}}/img/karabuk.jpg">
            </div>
        </div>
        <!-- //container  -->


    </div>
    <div class="height-334px">
        <div>
        <h1 style="text-align: center;">Var Olan Quizler</h1>
        </div>
        @guest
            <div class="d-flex align-items-center justify-content-center height-80px">

                <Strong>Quizleri Görmek İçin Giriş Yapınız</Strong>

            </div>
        @endguest
                @auth
            <div class="d-flex align-items-center justify-content-center height-254px max-w-screen-xl">
                @foreach($quizzes as $rs)
                    <div class="d-flex mx-2">
                        <a href="{{route('quiz.detay',$rs->slug)}}" class=" box-shadow background-main-color text-white hvr-float">
                            <div class="thum" title="{{$rs->description}}"><h6 class="text-center px-3 py-2">{{$rs->title}}<br>
                                    Bitiş Tarihi : {{$rs->finished_at}}</h6>
                            </div>
                        </a>
                    </div>
@endforeach
            </div>
                @endauth
        </div>
    </div>


@endsection
