@if (request()->routeIs(['log*', 'register*', 'password.*', 'landing']))
    <div class="container-fluid px-0">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-4 sticky-top">
            <div class="container-fluid mx-md-5">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse mt-2 mt-md-0" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto border">
                        
                    </ul>

                    <ul class="navbar-nav gap-2">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="btn btn-outline-primary w-100"
                                        href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-outline-primary w-100"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                            <a class="btn btn-outline-primary w-100"
                                href="{{ route('home') }}">{{ __('Dashboard') }}</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
@endif
