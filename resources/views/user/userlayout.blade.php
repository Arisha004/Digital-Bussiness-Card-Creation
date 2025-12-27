@include('include.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | User Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: white;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            margin-top: 22px;
            width: 300px;
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
    <nav class="sidebar">
        <h5>User Panel</h5>

        @php
            $card = auth()->user()->businessCards()->first();
        @endphp

        <ul class="nav flex-column">
            @if($card)
                <li class="nav-item">
                    <a class="btn w-100 @if(Request::routeIs('cards.edit')) active @endif"
                       href="{{ route('cards.edit', $card->id) }}">
                        Edit My Card
                    </a>
                </li>

                <li class="nav-item">
                    <a class="btn w-100 @if(Request::routeIs('cards.show')) active @endif"
                       href="{{ route('cards.show', $card->id) }}">
                        View My Card
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="btn w-100 @if(Request::routeIs('cards.create')) active @endif"
                       href="{{ route('cards.create') }}">
                        Create Your Card
                    </a>
                </li>
            @endif

            <li class="nav-item">
                <a class="btn btn-danger w-100" href="{{ route('logout') }}">
                    Logout
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="content">
        @yield('content')
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
