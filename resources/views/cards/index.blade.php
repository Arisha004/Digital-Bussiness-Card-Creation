@extends('layout')

@section('content')

<div class="container mt-5">
    <h2>My Business Cards</h2>

    <a href="{{ route('cards.create') }}" class="btn btn-primary mb-4">
        Create New Card
    </a>

    
    <div class="row g-4">
 @forelse($cards as $card)
<div class="col-md-4 d-flex flex-column align-items-center">

    <!-- CARD -->
    <div class="flip-card mb-2">
        <div class="flip-card-inner {{ $card->theme }}">
            <!-- FRONT -->
           <div class="flip-card-front glass-card p-4"
     style="
        font-family: {{ $card->font_family }};
        text-align: {{ $card->text_align }};
        font-size: {{ $card->font_size }};
        font-weight: {{ $card->is_bold ? 'bold' : 'normal' }};
        font-style: {{ $card->is_italic ? 'italic' : 'normal' }};
     ">

            {{-- Show profile pic only if it exists --}}
                @if($card->profile_pic)
                    <img src="{{ asset('storage/' . $card->profile_pic) }}" class="profile-img mb-3">
                @endif

                <h4>{{ $card->name }}</h4>
                <p>{{ $card->title }} at {{ $card->company }}</p>
                <hr>
                <p><strong>Email:</strong> {{ $card->email }}</p>
                <p><strong>Phone:</strong> {{ $card->phone }}</p>
                <p><strong>Website:</strong> {{ $card->website }}</p>
            </div>

            <!-- BACK -->
            <div class="flip-card-back glass-card p-4"
     style="
        font-family: {{ $card->font_family }};
        text-align: {{ $card->text_align }};
        font-size: {{ $card->font_size }};
        font-weight: {{ $card->is_bold ? 'bold' : 'normal' }};
        font-style: {{ $card->is_italic ? 'italic' : 'normal' }};
     ">

                <h4>{{ $card->name }}</h4>
                <p>Scan QR Code</p>
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data={{ urlencode(url('/card/'.$card->id)) }}">
                <hr>
                <p>{{ $card->website }}</p>
                <small>Digital Business Card</small>
            </div>
        </div>
    </div>

    {{-- BUTTONS WITH UNIFORM GAP --}}
    <div class="d-flex flex-column align-items-center mt-2" style="gap: 5px;">
        <a href="{{ route('cards.edit', $card->id) }}" class="btn btn-warning btn-sm">
            Edit Card
        </a>

        <form action="{{ route('cards.destroy', $card->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this card?');">
                Delete Card
            </button>
        </form>
    </div>
    <br><br>

</div>
@empty
<p>No cards found.</p>
@endforelse

    </div>
</div>

<style>
.col-md-4 {
    display: flex;
    justify-content: center;
}

/* CARD CONTAINER */
.flip-card {
    position: relative;
    width: 360px;
    height: 420px;
    perspective: 1200px;
}

.flip-card-inner {
    width: 100%;
    height: 100%;
    transition: transform 0.9s ease;
    transform-style: preserve-3d;
}

.flip-card:hover .flip-card-inner {
    transform: rotateY(180deg);
}

.flip-card-front,
.flip-card-back {
    position: absolute;
    inset: 0;
    backface-visibility: hidden;
    border-radius: 20px;
}

.flip-card-back {
    transform: rotateY(180deg);
}

/* GLASS STYLE */
.glass-card {
    backdrop-filter: blur(14px);
    border-radius: 20px;
    border: 1px solid rgba(255,255,255,0.3);
    box-shadow: 0 20px 40px rgba(0,0,0,0.25);
    color: #fff;
}

/* PROFILE */
.profile-img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    border: 2px solid #fff;
    object-fit: cover;
}

/* THEMES */
.t1 .glass-card { background: rgba(0,0,0,0.75); }

.t2 .glass-card { background: linear-gradient(135deg,#667eea,#764ba2); }
.t3 .glass-card { background: linear-gradient(135deg, rgba(25,135,84,0.7), rgba(72,239,161,0.6)); }
.t4 .glass-card { background: linear-gradient(135deg,#f6d365,#fda085); }
.t5 .glass-card { background: linear-gradient(135deg,#ff7e5f,#feb47b); }
.t6 .glass-card { background: linear-gradient(135deg,#43cea2,#185a9d); }

</style>
@endsection
