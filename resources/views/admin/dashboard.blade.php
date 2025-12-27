@extends('admin.adminlayout')

@section('title','Dashboard')

@section('content')
<!-- Welcome Message -->
<div class="mb-4">
    <h2>Welcome, {{ auth()->user()->name }}!</h2>
    <p class="text-muted">Here’s a summary of your platform activity.</p>
</div>

<div class="row g-3" style="margin-top: 21px">
    <!-- Users Card -->
    <div class="col-md-4">
        <div class="card text-white bg-primary card-stats">
            <div class="card-body">
                <h5 class="card-title">Total Users</h5>
                <h2>{{ $totalUsers }}</h2>
                <a href="{{ url('/admin/users') }}" class="btn btn-light btn-sm mt-2">View Users</a>
            </div>
        </div>
    </div>

    <!-- Cards Card -->
    <div class="col-md-4">
        <div class="card text-white bg-success card-stats">
            <div class="card-body">
                <h5 class="card-title">Total Cards</h5>
                <h2>{{ $totalCards }}</h2>
                <a href="{{ route('admin.cards') }}" class="btn btn-light btn-sm mt-2">View Cards</a>
            </div>
        </div>
    </div>

    <!-- Top Users Card -->
    <div class="col-md-4">
        <div class="card text-white bg-info card-stats">
            <div class="card-body">
                <h5 class="card-title">Top 3 Active Users</h5>
                <ul class="list-unstyled mt-2">
                    @foreach($topUsers as $user)
                        <li>{{ $user->name }} - {{ $user->cards_count }} cards</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
