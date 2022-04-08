<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page_title') - {{ env('APP_NAME') }}</title>
    @auth
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    @endauth
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:wght@400,600,700,900" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <div id="app">
            @include('layouts.sidebar')

        <div class="content-wrapper" style="@auth margin-left: 20%; @endauth">
            <div class="content pt-4" style="padding-bottom: 50px;">
                @include('layouts.notices')
                @yield('content')
            </div>
        </div>
        @include('layouts.footer')
    </div>


    <script src="{{ asset('js/app.js') }}" defer></script>
    @auth
        <script src="/plugins/jquery/jquery.min.js"></script>
        <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/dist/js/adminlte.min.js"></script>
    @endauth
    @stack('scripts')
</body>
</html>
