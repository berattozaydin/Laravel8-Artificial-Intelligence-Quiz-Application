<!DOCTYPE html>
<html lang="en-US">
<head>
    <title> @yield('title') </title>
    <meta name="author" content="Nile-Theme">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800%7CPoppins:100,200,300i,300,400,700,400i,500%7CDancing+Script:700" rel="stylesheet">
    <!-- animate -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/animate.css" />
    <!-- owl Carousel assets -->
    <link href="{{asset('assets')}}/css/owl.carousel.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/owl.theme.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css">
    <!-- hover anmation -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/hover-min.css">
    <!-- flag icon -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/flag-icon.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">
    <!-- colors -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/colors/main.css">
    <!-- elegant icon -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/elegant_icon.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/fontawesome-all.min.css">
    @yield('css')

</head>

<body>
@include('home._header')



@section('content')

@show

@include('home._footer')
</body>
</html>
