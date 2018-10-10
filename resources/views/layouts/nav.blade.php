<nav class="site-header sticky-top py-1">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
        @guest
            <a class="nav-link" href="/">Home</a>
            <a class="nav-link" href="/services">Handymen</a>
            <a class="nav-link" href="{{ route('register') }}">Register</a>
            <a class="nav-link" href="/login">Login</a>
        @endguest

        @if (Auth::check() && Auth::user()->role === "Customer")
            <a class="nav-link" href="/">Home</a>
            <a class="nav-link" href="/services">Handymen</a>
            <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Welcome, {{ ucwords(Auth::user()->name) }}!
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/logout">logout</a>
                    </div>
                </div>
        @endif

        @if (Auth::check() && Auth::user()->role === "HandyMan")
            <a class="nav-link" href="/">Home</a>
            <a class="nav-link" href="/services">Handymen</a>
            <a class="nav-link" href="/services/create">Create HandyMan</a>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Welcome, {{ ucwords(Auth::user()->name) }}!
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/dashboard">Dashboard</a>
                    <a class="dropdown-item" href="/logout">logout</a>
                </div>
            </div>
        @endif
    </div>
</nav>