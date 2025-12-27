@extends('admin.adminlayout')

@section('title','All Users')

@section('content')
<div class="container mt-4">
    <h2>All Users</h2>

    @if($users->count())
        <table class="table table-striped table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Cards Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->cards_count }}</td>
               <td>
    <a href="{{ route('admin.users.cards', $user->id) }}" class="btn btn-sm btn-success">
        View Cards ({{ $user->cards_count }})
    </a>
    <a href="{{ url('/admin/users/delete/'.$user->id) }}" class="btn btn-sm btn-danger"
       onclick="return confirm('Are you sure you want to delete this user?')">
       Delete
    </a>
</td>


                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">No users found!</div>
    @endif
</div>
@endsection
