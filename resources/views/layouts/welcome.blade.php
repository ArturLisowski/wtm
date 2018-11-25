<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="Stylesheet" type="text/css" href="{{asset('css/welcome.css')}}" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>

    </style>
</head>
    <div id="app" class="landingPage">
        <div class="container-fluid">
            <div class="fullscreen-bg">
                <video playsinline="playsinline" autoplay="autoplay" muted="muted" class="fullscreen-bg__video">
                    <source src="{{ asset('images/clock.mp4') }}" type="video/mp4">
                </video>
            </div>
            <div class="row form-row">
                <div class="col-md-4 offset-md-8 form-place">
                    buba
                </div>
            </div>
        </div>
    </div>
</body>
</html>
