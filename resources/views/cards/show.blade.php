@extends('layout')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Digital Business Cards</h2>

    <!-- USER CARDS LIST -->
    <div class="row g-4">
        @forelse($cards as $card)
        <div class="col-md-12">
            <!-- WRAPPER FOR FRONT + BACK -->
            <div id="cardWrapper{{ $card->id }}" class="d-flex flex-wrap justify-content-center gap-3 mb-3">
                <!-- FRONT CARD -->
                <div class="glass-card {{ $card->theme }}"
     style="
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
                <div class="glass-card {{ $card->theme }}"
     style="
        font-family: {{ $card->font_family }};
        text-align: {{ $card->text_align }};
        font-size: {{ $card->font_size }};
        font-weight: {{ $card->is_bold ? 'bold' : 'normal' }};
        font-style: {{ $card->is_italic ? 'italic' : 'normal' }};
     ">

                    <h4>{{ $card->name }}</h4>
                    <p>Scan QR Code</p>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data={{ urlencode(url('/card/'.$card->id)) }}" class="mb-3">
                    <hr>
                    <p>{{ $card->website }}</p>
                    <small>Digital Business Card</small>
                </div>
            </div>

            <!-- EXPORT + ACTION BUTTONS -->
            <div class="text-center mb-5">
                <button class="btn btn-success me-2" onclick="downloadPNG('cardWrapper{{ $card->id }}')">Download PNG & Share On Socials</button>
                <button class="btn btn-danger me-2" onclick="downloadPDF('cardWrapper{{ $card->id }}')">Download PDF & Share On Socials</button>
            </div>
        </div>
        @empty
        <p class="text-center">No cards available.</p>
        @endforelse
    </div>
</div>

<!-- JS LIBRARIES -->
<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jspdf@2.5.1/dist/jspdf.umd.min.js"></script>

<script>
// Export PNG with transparent background
function downloadPNG(wrapperId) {
    const wrapper = document.getElementById(wrapperId);
    if (!wrapper) return;
    html2canvas(wrapper, { scale: 2, useCORS: true, backgroundColor: null }).then(canvas => {
        const a = document.createElement('a');
        a.download = 'digital-card.png';
        a.href = canvas.toDataURL('image/png');
        a.click();
    });
}

// Export PDF with transparent background
function downloadPDF(wrapperId) {
    const wrapper = document.getElementById(wrapperId);
    if (!wrapper) return;
    html2canvas(wrapper, { scale: 2, useCORS: true, backgroundColor: null }).then(canvas => {
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF('l', 'mm', 'a4'); // landscape for horizontal cards
        const pageWidth = pdf.internal.pageSize.getWidth() - 20;
        const pageHeight = (canvas.height * pageWidth) / canvas.width;

        // Convert canvas to PNG with transparency
        const imgData = canvas.toDataURL('image/png');

        pdf.addImage(imgData, 'PNG', 10, 10, pageWidth, pageHeight);
        pdf.save('digital-card.pdf');
    });
}
</script>
<style>
/* GLASS CARD */
.glass-card {
    width: 300px;
    min-height: 400px;
    padding: 20px;
    border-radius: 20px;
    border:1px solid rgba(255,255,255,0.3);
    box-shadow:0 20px 40px rgba(0,0,0,0.25);
    color:#fff;
    text-align: center;
    backdrop-filter: blur(14px);
}

/* PROFILE IMG */
.profile-img { width:120px; height:120px; border-radius:50%; border:3px solid #fff; object-fit:cover; margin:auto; }

/* THEMES */
.t1 { background: rgba(0,0,0,0.75); }

.t2 { background: linear-gradient(135deg,#667eea,#764ba2); }

    .t3 { background: linear-gradient(135deg, rgba(25,135,84,0.7), rgba(72,239,161,0.6)); }
.t4 { background: linear-gradient(135deg,#f6d365,#fda085); }
.t5 { background: linear-gradient(135deg,#ff7e5f,#feb47b); }
.t6  { background: linear-gradient(135deg,#43cea2,#185a9d); }

</style>
@endsection
