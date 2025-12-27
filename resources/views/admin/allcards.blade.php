@extends('admin.adminlayout')

@section('title','All Users Cards')

@section('content')
<div class="container mt-4">
    <h2>All Users Cards</h2>

    @if($cards->count())
        <table class="table table-striped table-bordered mt-3 text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Card Name</th>
                    <th>Title</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Preview</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cards as $index => $card)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $card->user->name }}</td>
                        <td>{{ $card->name }}</td>
                        <td>{{ $card->title }}</td>
                        <td>{{ $card->email }}</td>
                        <td>{{ $card->phone }}</td>
                        <td>
                            <div style="
                                width: 140px;
                                min-height: 50px;
                                padding: 5px;
                                text-align: center;
                                display: flex;
                                flex-direction: column;
                                justify-content: center;
                                align-items: center;
                                border: 1px solid #ccc;
                                border-radius: 5px;
                            ">
                                <strong>{{ $card->name }}</strong>
                                <span>{{ $card->title }}</span>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('admin.cards.view', $card->id) }}" class="btn btn-sm btn-success mb-1">View</a>
                            <a href="{{ url('/admin/cards/delete/'.$card->id) }}" class="btn btn-sm btn-danger"
                               onclick="return confirm('Are you sure you want to delete this card?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">No cards found!</div>
    @endif
</div>
@endsection
