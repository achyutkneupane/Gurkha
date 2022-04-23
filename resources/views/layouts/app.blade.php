<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page_title') - {{ env('APP_NAME') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:wght@400,600,700,900" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <div id="app">
        @include('layouts.sidebar')
        @if(request()->routeIs(['log*','register*','password.*','landing']) || !auth()->check())
        @include('layouts.header')
        <div class="content-wrapper">
            <div class="content @if(!request()->routeIs('landing')) pt-4 @endif">
        @else
        <div class="content-wrapper" style="margin-left: 20%;">
            <div class="content pt-4" style="padding-bottom: 50px;">
        @endif
                @include('layouts.notices')
                @yield('content')
            </div>
        </div>
        @include('layouts.footer')
    </div>


    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
