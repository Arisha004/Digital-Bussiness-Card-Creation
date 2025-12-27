
@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Edit Template Card</h2>

    <div class="row">
        <!-- Form -->
        <div class="col-md-6">

            <form action="{{ route('cards.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="font_family" id="font_family" value="{{ $card->font_family ?? 'Poppins' }}">
<input type="hidden" name="text_align" id="text_align" value="{{ $card->text_align ?? 'center' }}">
<input type="hidden" name="font_size" id="font_size" value="{{ $card->font_size ?? '16px' }}">
<input type="hidden" name="is_bold" id="is_bold" value="{{ $card->is_bold ?? 0 }}">
<input type="hidden" name="is_italic" id="is_italic" value="{{ $card->is_italic ?? 0 }}">

                <input type="hidden" name="theme" id="theme" value="{{ $template['class'] ?? 't1' }}">
                <input type="hidden" name="template_id" value="{{ $template['id'] ?? 0 }}">

                <div class="mb-3">
                    <label for="profile_pic" class="form-label">Profile Picture</label>
                    <input type="file" class="form-control" name="profile_pic" id="profile_pic">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" 
                           value="{{ $template['name'] ?? 'Your Name' }}">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" 
                           value="{{ $template['position'] ?? 'Your Title' }}">
                </div>
                <div class="mb-3">
                    <label for="company" class="form-label">Company</label>
                    <input type="text" class="form-control" name="company" id="company" 
                           value="{{ $template['company'] ?? 'Company' }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" 
                           value="{{ $template['email'] ?? 'example@email.com' }}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" 
                           value="{{ $template['phone'] ?? '+1234567890' }}">
                </div>
                <div class="mb-3">
                    <label for="website" class="form-label">Website</label>
                    <input type="text" class="form-control" name="website" id="website" 
                           value="{{ $template['website'] ?? 'www.example.com' }}">
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


                <button type="submit" class="btn btn-primary">Create Card</button><br><br>
            </form>
        </div>

        <!-- Live Preview -->
        <div class="col-md-6">
            <h4 class="mb-3">Live Preview</h4>
            <div class="flip-card mx-auto">
                <div class="flip-card-inner {{ $template['class'] ?? 't1' }}" id="previewCard">

                    <!-- FRONT -->
                    <div class="flip-card-front glass-card p-4 editable-style" id="previewCardFront">

                        <div id="preview_pic_wrapper" class="profile-img-wrapper mb-3">
                            <div id="preview_initials" class="profile-initials">
                                {{ substr($template['name'] ?? 'Your Name', 0, 1) }}{{ substr(explode(' ', $template['name'] ?? 'Your Name')[1] ?? '', 0, 1) }}
                            </div>
                            <img id="preview_pic" src="" alt="Profile" class="profile-img d-none">
                        </div>
                        <h3 id="preview_name">{{ $template['name'] ?? 'Your Name' }}</h3>
                        <p class="text" id="preview_title">{{ ($template['position'] ?? 'Title') }} at {{ ($template['company'] ?? 'Company') }}</p>
                        <hr>
                        <p id="preview_email">{{ $template['email'] ?? 'example@email.com' }}</p>
                        <p id="preview_phone">{{ $template['phone'] ?? '+1234567890' }}</p>
                    </div>

                    <!-- BACK -->
                    <div class="flip-card-back glass-card p-4 editable-style" id="previewCardBack">

                        <h4 id="preview_name_back">{{ $template['name'] ?? 'Your Name' }}</h4>
                        <p>Scan QR Code</p>
                        <img src="{{ $template['qr'] ?? 'https://api.qrserver.com/v1/create-qr-code/?size=140x140&data=preview' }}" class="mb-3">
                        <hr>
                        <p id="preview_website">{{ $template['website'] ?? 'www.example.com' }}</p>
                        <small>Digital Business Card</small>
                    </div>

                </div>
            </div>
            <div class="text-center mt-3">
                <p style="font-weight:500;color:black;">Hover to flip</p>
            </div>
        </div>
    </div>
</div>


<script>
   
function cards(){ return document.querySelectorAll('.editable-style'); }

function setFont(font) {
    const formattedFont = `'${font}', sans-serif`; // ensures proper font rendering
    document.querySelectorAll('.editable-style').forEach(el => {
        el.style.fontFamily = formattedFont;
    });
    document.getElementById('font_family').value = font;
}

// Attach event listener to the select
document.getElementById('fontSelect').addEventListener('change', function() {
    setFont(this.value);
});

// Apply initial font on page load
window.addEventListener('DOMContentLoaded', () => {
    const initialFont = document.getElementById('fontSelect').value;
    setFont(initialFont);
});



function setAlign(a){
  cards().forEach(e=>e.style.textAlign=a);
  document.getElementById('text_align').value=a;
}

function setSize(s){
  cards().forEach(e=>e.style.fontSize=s);
  document.getElementById('font_size').value=s;
}

function toggleBold(){
  cards().forEach(e=>{
    e.style.fontWeight = e.style.fontWeight==='bold'?'normal':'bold';
  });
  document.getElementById('is_bold').value ^= 1;
}

function toggleItalic(){
  cards().forEach(e=>{
    e.style.fontStyle = e.style.fontStyle==='italic'?'normal':'italic';
  });
  document.getElementById('is_italic').value ^= 1;
}


function updatePreview() {
    const nameVal = document.getElementById('name').value || 'Your Name';
    const initials = nameVal.split(' ').map(n=>n[0]||'').join('').toUpperCase();
    
    document.getElementById('preview_name').textContent = nameVal;
    document.getElementById('preview_name_back').textContent = nameVal;
    document.getElementById('preview_title').textContent = `${document.getElementById('title').value || 'Your Title'} at ${document.getElementById('company').value || 'Company'}`;
    document.getElementById('preview_email').textContent = document.getElementById('email').value || 'example@email.com';
    document.getElementById('preview_phone').textContent = document.getElementById('phone').value || '+1234567890';
    document.getElementById('preview_website').textContent = document.getElementById('website').value || 'www.example.com';
    
    const img = document.getElementById('preview_pic');
    const initialsDiv = document.getElementById('preview_initials');
    if(!img.src || img.classList.contains('d-none')){
        initialsDiv.textContent = initials;
    }
}

['name','title','company','email','phone','website'].forEach(id=>{
    document.getElementById(id).addEventListener('input', updatePreview);
});

document.getElementById('profile_pic').addEventListener('change', function(){
    const file = this.files[0];
    const img = document.getElementById('preview_pic');
    const initials = document.getElementById('preview_initials');
    
    if(file){
        const reader = new FileReader();
        reader.onload = () => {
            img.src = reader.result;
            img.classList.remove('d-none');
            initials.style.display = 'none';
        }
        reader.readAsDataURL(file);
    } else {
        img.src = '';
        img.classList.add('d-none');
        initials.style.display = 'flex';
    }
});
</script>

<style>
.flip-card { width: 350px; height: 480px; perspective: 1200px; margin: auto; }
.flip-card-inner { width: 100%; height: 100%; transition: transform 0.9s ease; transform-style: preserve-3d; }
.flip-card:hover .flip-card-inner { transform: rotateY(180deg); }
.flip-card-front, .flip-card-back { position: absolute; width: 100%; height: 100%; backface-visibility: hidden; border-radius: 20px; }
.flip-card-back { transform: rotateY(180deg); }
.editable-style {
    transition: font-family 0.3s ease, font-size 0.3s ease, font-weight 0.3s ease, font-style 0.3s ease, text-align 0.3s ease;
}

.glass-card {
    backdrop-filter: blur(14px);
    background: rgba(0,0,0,0.75);
    border: 1px solid rgba(255,255,255,0.3);
    box-shadow: 0 20px 40px rgba(0,0,0,0.25);
    color: #fff;
}
.profile-img-wrapper { position: relative; width: 120px; height: 120px; margin: auto; }
.profile-img { width: 120px; height: 120px; border-radius:50%; border:3px solid #fff; object-fit:cover; }
.profile-initials {
    width: 120px; height: 120px; border-radius: 50%;
    background: rgba(255,255,255,0.2); color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-size: 40px; font-weight: bold; border: 3px solid #fff;
}
.card select.form-select-sm {
    border-radius: 8px;
    border: 1px solid #ccc;
    padding: 3px 6px;
}

.card .btn-group .btn {
    border-radius: 6px;
    font-size: 0.85rem;
}

.card .btn-group .btn + .btn {
    margin-left: 4px;
}

.card h5 {
    font-size: 1rem;
    color: #333;
}


/* All 6 template gradients */
.t1 .glass-card { background: rgba(0,0,0,0.75); }
.t2 .glass-card { background: linear-gradient(135deg,#667eea,#764ba2); }
.t3 .glass-card { background: linear-gradient(135deg,#11998e,#38ef7d); }
.t4 .glass-card { background: linear-gradient(135deg,#f6d365,#fda085); }
.t5 .glass-card { background: linear-gradient(135deg,#ff7e5f,#feb47b); }
.t6 .glass-card { background: linear-gradient(135deg,#43cea2,#185a9d); }
</style>
@endsection
