@php
    $setting = \App\Http\Controllers\Admin\SettingController::getsetting()
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{$header}}</title>
        <meta name="description" content="{{$setting->description}}">
        <meta name="author" content="{{$setting->company}}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{$header}}
                        </h2>
                    </div>
                </header>
            @endif
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">
                            <li class="fa fa-check"></li>
                            {{session('success')}}
                        </div>
                        @endif
                    {{ $slot }}
                </div>
            </div>
            <div class="footer"><!--footer-->
                <div class="container">
            <div class="row">
            <div class="col-md-9">
            <div class="f-credit">&copy;Bütün Hakları <a href="https://{{$setting->company}}"> {{$setting->company}}</a> a Aittir</div>
            </div>
            </div>
                </div>
            </div>
        </div>
        @stack('modals')
        @isset($js)
        {{$js}}
        @endif
        @livewireScripts
    </body>
</html>
