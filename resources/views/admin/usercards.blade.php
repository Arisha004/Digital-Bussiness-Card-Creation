@extends('admin.adminlayout')

@section('title', 'Cards of ' . $user->name)

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Cards of {{ $user->name }} ({{ $user->cards->count() }})</h2>

    <div class="row g-4">
        @forelse($cards as $card)
        <div class="col-md-12">
            <div class="d-flex flex-wrap justify-content-center gap-3 mb-3">
                <!-- FRONT CARD -->
                <div class="glass-card {{ $card->theme }}" style="
                    font-family: {{ $card->font_family }};
                    text-align: {{ $card->text_align }};
                    font-size: {{ $card->font_size }};
                    font-weight: {{ $card->is_bold ? 'bold' : 'normal' }};
                    font-style: {{ $card->is_italic ? 'italic' : 'normal' }};
                ">
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

                <!-- BACK CARD -->
                <div class="glass-card {{ $card->theme }}" style="
                    font-family: {{ $card->font_family }};
                    text-align: {{ $card->text_align }};
                    font-size: {{ $card->font_size }};
                    font-weight: {{ $card->is_bold ? 'bold' : 'normal' }};
                    font-style: {{ $card->is_italic ? 'italic' : 'normal' }};
                ">
                    <h4>{{ $card->name }}</h4>
                    <p>QR Code</p>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data={{ urlencode(url('/card/'.$card->id)) }}" class="mb-3">
                    <hr>
                    <p>{{ $card->website }}</p>
                    <small>Digital Business Card</small>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center">No cards available for this user.</p>
        @endforelse
    </div>
</div>

<style>
.glass-card { width: 300px; min-height: 400px; padding: 20px; border-radius: 20px; border:1px solid rgba(255,255,255,0.3); box-shadow:0 20px 40px rgba(0,0,0,0.25); color:#fff; text-align: center; backdrop-filter: blur(14px); }
.profile-img { width:120px; height:120px; border-radius:50%; border:3px solid #fff; object-fit:cover; margin:auto; }
.t1 { background: rgba(0,0,0,0.75); }

.t2 { background: linear-gradient(135deg,#667eea,#764ba2); }

    .t3 { background: linear-gradient(135deg, rgba(25,135,84,0.7), rgba(72,239,161,0.6)); }
.t4 { background: linear-gradient(135deg,#f6d365,#fda085); }
.t5 { background: linear-gradient(135deg,#ff7e5f,#feb47b); }
.t6  { background: linear-gradient(135deg,#43cea2,#185a9d); }

</style>
@endsection
