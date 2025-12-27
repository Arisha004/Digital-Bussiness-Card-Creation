@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Edit Business Card</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <!-- Form -->
        <div class="col-md-6">
            <form action="{{ route('cards.update', $card->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="theme" id="theme" value="{{ $card->theme ?? 't1' }}">
<!-- Add these inside your form -->
<input type="hidden" name="font_family" id="font_family" value="{{ $card->font_family ?? 'Poppins' }}">
<input type="hidden" name="text_align" id="text_align" value="{{ $card->text_align ?? 'center' }}">
<input type="hidden" name="font_size" id="font_size" value="{{ $card->font_size ?? '16px' }}">
<input type="hidden" name="is_bold" id="is_bold" value="{{ $card->is_bold ?? 0 }}">
<input type="hidden" name="is_italic" id="is_italic" value="{{ $card->is_italic ?? 0 }}">

                <div class="mb-3">
                    <label for="profile_pic" class="form-label">Profile Picture</label>
                    <input type="file" class="form-control" name="profile_pic" id="profile_pic">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $card->name }}">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $card->title }}">
                </div>
                <div class="mb-3">
                    <label for="company" class="form-label">Company</label>
                    <input type="text" class="form-control" name="company" id="company" value="{{ $card->company }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $card->email }}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{ $card->phone }}">
                </div>
                <div class="mb-3">
                    <label for="website" class="form-label">Website</label>
                    <input type="text" class="form-control" name="website" id="website" value="{{ $card->website }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Select Template</label>
                    <div>
                        <button type="button" class="btn btn-dark me-2" onclick="changeTemplate('t1')">Black</button>
                        <button type="button" class="btn btn-primary me-2" onclick="changeTemplate('t2')">Purple</button>
                        <button type="button" class="btn btn-success" onclick="changeTemplate('t3')">Green</button>
                    </div>
                </div>
    <!-- Text Styling Controls - placed above Create Card -->
<div class="mb-3 p-3 border rounded shadow-sm">
    <h5 class="mb-2">Text Styling</h5>
<br>
 <select class="form-select form-select-sm" id="fontSelect">
    <option value="Poppins">Poppins</option>
    <option value="Roboto">Roboto</option>
    <option value="Montserrat">Montserrat</option>
    <option value="Lato">Lato</option>
</select>
<br>


    <!-- Text Alignment -->
    <div class="btn-group w-100 mb-2" role="group">
        <button type="button" class="btn btn-outline-dark btn-sm" onclick="setAlign('left')">Left</button>
        <button type="button" class="btn btn-outline-dark btn-sm" onclick="setAlign('center')">Center</button>
        <button type="button" class="btn btn-outline-dark btn-sm" onclick="setAlign('right')">Right</button>
    </div>

    <!-- Font Size -->
    <div class="btn-group w-100 mb-2" role="group">
        <button type="button" class="btn btn-outline-dark btn-sm" onclick="setSize('14px')">A-</button>
        <button type="button" class="btn btn-outline-dark btn-sm" onclick="setSize('16px')">A</button>
        <button type="button" class="btn btn-outline-dark btn-sm" onclick="setSize('20px')">A+</button>
    </div>

    <!-- Bold & Italic -->
    <div class="btn-group w-100" role="group">
        <button type="button" class="btn btn-outline-primary btn-sm" onclick="toggleBold()">
            <strong>Bold</strong>
        </button>
        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="toggleItalic()">
            <em>Italic</em>
        </button>
    </div>
</div>

                <button type="submit" class="btn btn-primary">Update Card</button><br><br>
            </form>
        </div>

        <!-- Live Preview -->
        <div class="col-md-6">
            <h4 class="mb-3">Live Preview</h4>
            <div class="flip-card mx-auto">
                    <div class="flip-card-inner {{ $card->theme ?? 't1' }}" id="previewCard">

                    <!-- FRONT -->
                <div class="flip-card-front glass-card  p-4 editable-style">


                    <img id="preview_pic" 
                             src="{{ $card->profile_pic ? asset('storage/' . $card->profile_pic) : asset('images/default-profile.png') }}" 
                             alt="Profile" class="profile-img mb-3">
                        <h3 id="preview_name">{{ $card->name }}</h3>
                        <p class="text" id="preview_title">{{ $card->title }} at {{ $card->company }}</p>
                        <hr>
                        <p id="preview_email">{{ $card->email }}</p>
                        <p id="preview_phone">{{ $card->phone }}</p>
                    </div>

                    <!-- BACK -->
                    <div class="flip-card-back glass-card  p-4 editable-style">
                        <h4 id="preview_name_back">{{ $card->name }}</h4>
                        <p>Scan QR Code</p>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=140x140&data=preview" class="mb-3">
                        <hr>
                        <p id="preview_website">{{ $card->website }}</p>
                        <small>Digital Business Card</small>
                    </div>
                </div>
            </div>
             <div class="text-center mt-5">
          <p style="font: 500; color:black">Hover to flip</p>
   
        </div>
        

    </div>
</div>
 
<script>
    function editableCards(){ return document.querySelectorAll('.flip-card-front, .flip-card-back'); }

function setFont(font){
    const f = `'${font}', sans-serif`;
    editableCards().forEach(el => el.style.fontFamily = f);
    document.getElementById('font_family').value = font;
}

function setAlign(a){
    editableCards().forEach(el => el.style.textAlign = a);
    document.getElementById('text_align').value = a;
}

function setSize(s){
    editableCards().forEach(el => el.style.fontSize = s);
    document.getElementById('font_size').value = s;
}

function toggleBold(){
    const hidden = document.getElementById('is_bold');
    const isBold = hidden.value === '1';
    editableCards().forEach(el => el.style.fontWeight = isBold ? 'normal' : 'bold');
    hidden.value = isBold ? '0' : '1';
}

function toggleItalic(){
    const hidden = document.getElementById('is_italic');
    const isItalic = hidden.value === '1';
    editableCards().forEach(el => el.style.fontStyle = isItalic ? 'normal' : 'italic');
    hidden.value = isItalic ? '0' : '1';
}


// Attach event listener to font select
document.getElementById('fontSelect').addEventListener('change', function(){
    setFont(this.value);
});

function updatePreview() {
    document.getElementById('preview_name').textContent = document.getElementById('name').value || 'Your Name';
    document.getElementById('preview_name_back').textContent = document.getElementById('name').value || 'Your Name';
    document.getElementById('preview_title').textContent = `${document.getElementById('title').value || 'Your Title'} at ${document.getElementById('company').value || 'Company'}`;
    document.getElementById('preview_email').textContent = document.getElementById('email').value || 'example@email.com';
    document.getElementById('preview_phone').textContent = document.getElementById('phone').value || '+1234567890';
    document.getElementById('preview_website').textContent = document.getElementById('website').value || 'www.example.com';
}

['name','title','company','email','phone','website'].forEach(id=>{
    document.getElementById(id).addEventListener('input', updatePreview);
});

document.getElementById('profile_pic').addEventListener('change', function(){
    const file = this.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = () => document.getElementById('preview_pic').src = reader.result;
        reader.readAsDataURL(file);
    }
});

function changeTemplate(t) {
    document.getElementById('previewCard').className = 'flip-card-inner ' + t;
    document.getElementById('theme').value = t; // Save selected theme
}
window.addEventListener('DOMContentLoaded', () => {
    setFont('{{ $card->font_family ?? "Poppins" }}');
    setSize('{{ $card->font_size ?? "16px" }}');
    setAlign('{{ $card->text_align ?? "center" }}');

    if('{{ $card->is_bold ?? 0 }}' === '1') toggleBold();
    if('{{ $card->is_italic ?? 0 }}' === '1') toggleItalic();
});




</script>

<style>
.flip-card { width: 350px; height: 480px; perspective: 1200px; margin: auto; }
.flip-card-inner { width: 100%; height: 100%; transition: transform 0.9s ease; transform-style: preserve-3d; }
.flip-card:hover .flip-card-inner { transform: rotateY(180deg); }
.flip-card-front, .flip-card-back { position: absolute; width: 100%; height: 100%; backface-visibility: hidden; border-radius: 20px; }
.flip-card-back { transform: rotateY(180deg); }
.glass-card {
    backdrop-filter: blur(14px);
    background: rgba(0,0,0,0.75); /* default dark instead of transparent */
    border: 1px solid rgba(255,255,255,0.3);
    box-shadow: 0 20px 40px rgba(0,0,0,0.25);
    color: #fff;
}

.profile-img { width: 120px; height: 120px; border-radius:50%; border:3px solid #fff; object-fit:cover; }
/* TEMPLATES */

.t1 .glass-card { background: rgba(0,0,0,0.75); }

.t2 .glass-card { background: linear-gradient(135deg,#667eea,#764ba2); }
.t3 .glass-card { background: linear-gradient(135deg, rgba(25,135,84,0.7), rgba(72,239,161,0.6)); }
.t4 .glass-card { background: linear-gradient(135deg,#f6d365,#fda085); }
.t5 .glass-card { background: linear-gradient(135deg,#ff7e5f,#feb47b); }
.t6 .glass-card { background: linear-gradient(135deg,#43cea2,#185a9d); }

</style>
@endsection
