@extends('user.userlayout')

@section('title','User Dashboard')

@section('content')
<h4 class="mb-2" style="margin-top: 50px;">Welcome, {{ auth()->user()->name }}</h4>
<p class="text-muted">Use the sidebar to manage your business card.</p>

@php
    $card = auth()->user()->businessCards()->first();
@endphp

<div class="row g-3 mt-3">

    @if($card)
        <div class="col-md-6">
            <div class="card text-white bg-info card-stats">
                <div class="card-body">
                    <h5>Edit Card</h5>
                    <p>Change your business card info anytime.</p>
                    <a href="{{ route('cards.edit', $card->id) }}" class="btn btn-light btn-md">
                        Edit Card
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-white bg-success card-stats">
                <div class="card-body">
                    <h5>Your Business Card</h5>
                    <p>See your card and share it with others.</p>
                    <a href="{{ route('cards.show', $card->id) }}" class="btn btn-light btn-md">
                        View Card
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="col-12">
            <div class="alert alert-warning">
                You haven’t created a business card yet.
                <a href="{{ route('cards.create') }}">Create one now!</a>
            </div>
        </div>
    @endif

</div>
@endsection
