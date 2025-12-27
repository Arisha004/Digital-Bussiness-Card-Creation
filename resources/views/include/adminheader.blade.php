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
        margin-top: 9px;
      font-size: 1.3rem;
      color: #0d3b66 !important;
      transition: color 0.3s;
    }

    .navbar .nav-link:hover {
      color: #3f8ed9 !important;
    }
    </style>
<!-- Navbar -->
<!-- Admin Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/admin/dashboard') }}">Cardly</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="adminNavbar">
            <ul class="navbar-nav ms-auto">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/dashboard') }}">Dashboard</a>
                </li>

                <!-- Users Management -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/users') }}">Users</a>
                </li>

                <!-- Cards Management -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.cards') }}">Cards</a>
                </li>

              

                <!-- Logout -->
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="GET">
                        @csrf
                        <button class="btn btn-link nav-link" type="submit">Logout</button>
                    </form>
                </li>

            </ul>
        </div>
    </div>
</nav>
</html>
