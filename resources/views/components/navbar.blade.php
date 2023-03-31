<nav class="navbar navbar-expand navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name', 'Arsip') }}</a>

        <div class="collapse navbar-collapse">
            @auth
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment(1) == null ? 'active' : '' }}" aria-current="page"
                           href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment(1) == 'arsip' ? 'active' : '' }}"
                           href="{{ route('file.index') }}">Dokumen</a>
                    </li>
                </ul>

                <a href="#" onclick="event.preventDefault();document.getElementById('form-logout').submit();">
                    <button class="btn btn-sm btn-danger shadow">Logout</button>
                    <form id="form-logout" action="{{ route('logout') }}" method="post" hidden>
                        @csrf
                    </form>
                </a>
            @else
                <a href="{{ route('login') }}" class="ms-auto">
                    <button class="btn btn-sm btn-primary shadow">Login</button>
                </a>
            @endauth
        </div>
    </div>
</nav>
