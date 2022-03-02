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

                    <div class="col-xl-2 col-lg-3 col-md-4 col-6 sm-mb-25px">
                        <a href="" class="d-block box-shadow background-main-color text-white hvr-float">
                            <div class="thum"><img style="width: 450px;height: 250px" src="{" alt=""></div>
                            <h4 class="text-center padding-15px"></h4>
                        </a>
                    </div>

            </div>
        </div>
    </div>

@endsection
