@include('include.adminheader')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f9;
            
            
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            margin-top: 22px;
            width: 390px;
            background: linear-gradient(135deg, #0d3b66 0%, #3f8ed9 50%, #5b86e5 100%);
            color: #fff;
            padding: 20px;
        }

        .sidebar h5 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .sidebar .nav-item + .nav-item {
            margin-top: 10px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        .card-stats {
            min-height: 120px;
        }

       
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav class="sidebar" style="margin-top: -24px">
            <h5>Admin Panel</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="btn w-100 @if(Request::routeIs('admin.dashboard')) active @endif" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="btn w-100 @if(Request::is('admin/users')) active @endif" href="{{ url('/admin/users') }}">View Users</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="btn w-100 @if(Request::is('admin/cards')) active @endif" href="{{ route('admin.cards') }}">View Cards</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-danger w-100" href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="content">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @yield('content')
         
        </main>
        
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
