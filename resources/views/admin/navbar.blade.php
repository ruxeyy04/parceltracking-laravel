<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand text-danger" href="{{ route('adminindex') }}">P<span class="text-light">Tracker</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Route::currentRouteName() == 'adminindex')
                    <li class="nav-item {{ Route::currentRouteName() === 'adminindex' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('adminindex') }}">Track</a>
                    </li>
                @else
                    @if(Route::currentRouteName() == 'admintracked')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url()->previous() }}">Go Back<span
                                class="sr-only">(current)</span></a>
                    </li>
                    @else
                    <li class="nav-item {{ Route::currentRouteName() === 'adminindex' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('adminindex') }}">Track</a>
                    </li>
                    @endif
                    
                @endif
                <li class="nav-item {{ Route::currentRouteName() === 'adminparcel' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminparcel') }}">Parcel List</a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() === 'adminadduser' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminadduser') }}">List of Users</a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() === 'adminprofile' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminprofile') }}">Profile</a>
                </li>
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logout">Logout</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
