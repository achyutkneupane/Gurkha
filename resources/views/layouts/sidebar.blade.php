@auth
    <aside class="list-group position-fixed top-0 left-0" style="width:20%; height:100vh;">

        <div class="brand-link text-center display-6 list-group-item">
            <span class="brand-text font-weight-light">GCTC</span>
        </div>


        <div class="sidebar list-group-item">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex w-100 justify-content-center text-center">
                <h3 class="m-0 p-2">@yield('page_title')</h3>
            </div>

            <nav class="mt-2">
                <ul class="list-group" data-widget="treeview" role="menu" data-accordion="false">
                    <a class="list-group-item{{ request()->routeIs('home') ? ' active' : '' }}"
                        href="{{ route('home') }}">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                    <a class="list-group-item{{ request()->routeIs('profile.*') ? ' active' : '' }}"
                        href="{{ route('profile.index') }}">
                        <i class="fas fa-user"></i> Profile
                    </a>
                    <a class="list-group-item{{ request()->routeIs('news.*') ? ' active' : '' }}"
                        href="{{ route('news.index') }}">
                        <i class="fas fa-newspaper"></i> News
                    </a>
                    @if (auth()->user()->role == 'admin')
                        <a class="list-group-item{{ request()->routeIs('staffs.*') ? ' active' : '' }}"
                            href="{{ route('staffs.index') }}">
                            <i class="fas fa-users-cog"></i> Staffs
                        </a>
                    @endif
                    @if (auth()->user()->role == 'staff')
                        <a class="list-group-item{{ request()->routeIs('students.*') ? ' active' : '' }}"
                            href="{{ route('students.index') }}">
                            <i class="fas fa-user-graduate"></i> Students
                        </a>
                    @endif
                </ul>
            </nav>
        </div>
        <div class="brand-link text-center list-group-item">
            <a class="list-group-item list-group-item-action list-group-item-danger" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </a>
        </div>
    </aside>
@endauth
