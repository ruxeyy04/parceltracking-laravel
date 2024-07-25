<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand text-danger" href="/">P<span class="text-light">Tracker</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if(Route::currentRouteName() == 'mainhome')
                    <li class="nav-item active">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#log">Login <span class="sr-only">(current)</span></a>
                    </li>
                @else
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Go Back<span class="sr-only">(current)</span></a>
                    </li>
                @endif
            </ul>
            
        </div>
    </div>
</nav>
