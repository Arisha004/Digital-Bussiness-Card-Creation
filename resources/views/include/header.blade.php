 <html>
 <style>
          .navbar .nav-link {
    font-size: 1.1rem; /* bigger text */
   
}

.navbar .navbar-brand {
    font-size: 2rem; 
    font-weight: bold;/* larger brand name */
}
    .navbar {
      background: #fff;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

   

    .navbar .nav-link {
      font-size: 1.3rem;
      margin-top:9px;
      color: #0d3b66 !important;
      transition: color 0.3s;
    }

    .navbar .nav-link:hover {
      color: #3f8ed9 !important;
    }
    </style>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="margin-bottom: -22px">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">Cardly</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <!-- Common links -->
                <li class="nav-item">
                    <a class="nav-link" href="/templates">Templates</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>

                <!-- Guest -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('registration') }}">Signup</a>
                    </li>
                @endguest

                <!-- Auth -->
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cards.index') }}">My Cards</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="GET">
                            @csrf
                            <button class="btn btn-link nav-link" type="submit">Logout</button>
                        </form>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
</html>
