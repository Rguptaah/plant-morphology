<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">PlantMorph</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('home')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('basic-search') }}">Basic Search</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('advance-search')}}">Advance Search</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registration</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('plant-index') }}">Plant Index</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('help') }}">Help Page</a></li>
            </ul>
        </div>
    </div>
</nav>