<nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Start Navbar Links-->
        <ul class="navbar-nav navbar-brand">
            <li class="nav-item d-block">
                <a href="{{route('tasks.dashboard')}}" class="nav-link">Home</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-workspace"></i>
                    @if (Auth::user())
                        <span class="d-none d-md-inline">
                            {{ Auth::user()->name }}
                        </span>
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a href="{{ Auth::check() ? route('users.profile', Auth::user()->id) : '#' }}" class="btn btn-flat float-end dropdown-item">
                            <i class="bi bi-person"></i>
                            {{__('Profile')}}
                        </a>
                        <a href="{{Auth::check() ? route('users.password', Auth::user()->id) : '#'}}" class="btn btn-flat float-end dropdown-item">
                            <i class="bi bi-lock"></i>
                            {{__('Password')}}
                        </a>
                        <form action="{{ route('logout') }}"method="POST" class="d-inline">
                            @csrf
                                <button class="btn btn-flat float-end dropdown-item">
                                    <i class="bi bi-box-arrow-up-left"></i>
                                    {{__('Logout')}}
                                </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div> <!--end::Container-->
</nav>
