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
</head>
<body>
    <div id="app">
        @include('layouts.navbar')
        @include('layouts.sidebar')

        <div class="content-wrapper">
            @auth
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('page_title')</h1>
                        </div>
                    </div>
                </div>
            </div>
            @endauth

            <div class="content py-4">
                @yield('content')
            </div>

        </div>

        @include('layouts.rightbar')
        @include('layouts.footer')
    </div>


    <script src="{{ asset('js/app.js') }}" defer></script>
    @auth
        <script src="/plugins/jquery/jquery.min.js"></script>
        <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/dist/js/adminlte.min.js"></script>
    @endauth
</body>
</html>
