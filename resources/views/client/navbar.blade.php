<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand text-danger" href="{{ route('ctrack') }}">P<span class="text-light">Tracker</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Route::currentRouteName() == 'ctrack')
                    <li class="nav-item {{ Route::currentRouteName() === 'ctrack' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('ctrack') }}">Track</a>
                    </li>
                @else
                    @if(Route::currentRouteName() == 'ctracked')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url()->previous() }}">Go Back<span
                                class="sr-only">(current)</span></a>
                    </li>
                    @else
                    <li class="nav-item {{ Route::currentRouteName() === 'ctrack' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('ctrack') }}">Track</a>
                    </li>
                    @endif
                    
                @endif

                <li class="nav-item {{ Route::currentRouteName() === 'clogs' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('clogs') }}">All Package</a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() === 'cprof' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('cprof') }}">Profile</a>
                </li>
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logout">Logout</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
