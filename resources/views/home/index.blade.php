@extends('layouts.home')
@section('content')
    <div class="banner padding-tb-20px">
        <div class="container">

            <div class="padding-tb-120px z-index-2 position-relative">
                <div class="text-center">
                    <h1 class="text-white pull-l icon-large font-weight-500 margin-bottom-40px">Karabük Üniversitesi Quiz Sitesi</h1>

                </div>

            </div>
        </div>
        <!-- //container  -->
        <video class="background-grey-3" autoplay loop id="video-background" muted plays-inline><source src="#video-url" type="video/mp4"></video>

    </div>
    <div class="background-light-grey">
        <h3 style="text-align: center;">Var Olan Quizler</h3>
        <div class="container padding-top-100px">
            <div class="row">
@foreach($quizzes as $rs)
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6 sm-mb-25px">
                        <a href="{{route('quiz.detay',$rs->slug,auth()->user()->id)}}" class="d-block box-shadow background-main-color text-white hvr-float">
                            <div class="thum" title="{{$rs->description}}"><h6 class="text-center padding-15px">{{$rs->title}}<br>
                                    Bitiş Tarihi : {{$rs->finished_at}}</h6>
                            </div>
                        </a>
                    </div>
@endforeach
            </div>
        </div>
    </div>

@endsection
