<nav class="navbar navbar-expand-lg bg-light " data-bs-theme="light">
    <div class="container-fluid offset-sm-3">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Logo -->
        <div class="shrink-0 flex items-center">
            <a href="{{ route('movie.top') }}">
                <x-application-logo class="block h-9 w-auto fill-current" />
            </a>
        </div>
        <div class="collapse navbar-collapse ms-4" id="navbarColor03">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('movie.top') }}"><i class="fa-solid fa-video"></i> {{ __('Movie List') }}</a>
            </li>
            <li class="nav-item">
                @if (Auth::user()->role == 'admin')
                    <a class="nav-link" href="{{ route('movie.upload') }}"><i class="fa-solid fa-upload"></i> {{ __('Movie Upload') }}</a>
                @endif
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa-regular fa-user"></i> {{ Auth::user()->name }}</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fa-regular fa-user"></i> {{ __('Profile') }}</a>
                    @if (Auth::user()->role == 'admin')
                        <a class="dropdown-item" href="{{ route('user-list.list') }}"><i class="fa-solid fa-list"></i> {{ __('User List') }}</a>
                        <a class="dropdown-item" href="{{ route('movie-list.list') }}"><i class="fa-solid fa-list"></i> {{ __('Movie Manage List') }}</a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();"><i class="fa-solid fa-right-from-bracket"></i> {{ __('Log Out') }}</a>
                    </form>
                </div>
            </li>
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="mt-3 space-y-1">
                    <!-- Authentication -->
                    
                </div>
            </div>
        </ul>
      </div>
    </div>
</nav>