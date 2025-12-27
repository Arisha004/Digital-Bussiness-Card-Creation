<div class="col-md-4">
  <div class="flip-card mx-auto">
    <div class="flip-card-inner t{{ $templateNumber }}">

      <!-- FRONT -->
      <div class="flip-card-front glass-card p-4 text-center editable-card"
           id="component-card-{{ $templateNumber }}">
        <img src="{{ $profileImage }}" class="profile-img mb-3" alt="{{ $name }}">
        <h5>{{ $name }}</h5>
        <small>{{ $position }} · {{ $company }}</small>
        <p class="mt-2">
          {{ $email }}<br>
          {{ $phone }}<br>
          {{ $website }}
        </p>
      </div>

      <!-- BACK -->
      <div class="flip-card-back glass-card p-4 text-center">
        <h5>{{ $name }}</h5>
        <p>Scan QR Code</p>
        <img src="{{ $qrCode }}" class="mb-3" alt="QR Code">
        <hr>
        <p>{{ $website }}</p>
        <small>Digital Business Card</small>

        @guest
        <button class="btn btn-secondary btn-sm mt-2 w-100" disabled>Login to use template</button>
        @endguest

        @auth
        <div class="card p-2 mt-2">

          <!-- FONT FAMILY -->
          <select class="form-select form-select-sm mb-2"
                  onchange="cFont(this.value, {{ $templateNumber }})">
            <option>Poppins</option>
            <option>Roboto</option>
            <option>Montserrat</option>
            <option>Lato</option>
          </select>

          <!-- TEXT ALIGN -->
          <div class="btn-group w-100 mb-2">
            <button class="btn btn-outline-light btn-sm"
                    onclick="cAlign('left', {{ $templateNumber }})">Left</button>
            <button class="btn btn-outline-light btn-sm"
                    onclick="cAlign('center', {{ $templateNumber }})">Center</button>
            <button class="btn btn-outline-light btn-sm"
                    onclick="cAlign('right', {{ $templateNumber }})">Right</button>
          </div>

          <!-- FONT SIZE -->
          <div class="btn-group w-100 mb-2">
            <button class="btn btn-outline-light btn-sm"
                    onclick="cSize('14px', {{ $templateNumber }})">A-</button>
            <button class="btn btn-outline-light btn-sm"
                    onclick="cSize('18px', {{ $templateNumber }})">A</button>
            <button class="btn btn-outline-light btn-sm"
                    onclick="cSize('22px', {{ $templateNumber }})">A+</button>
          </div>

          <!-- BOLD -->
          <button class="btn btn-outline-warning btn-sm w-100"
                  onclick="cBold({{ $templateNumber }})">Bold</button>

          <!-- USE TEMPLATE -->
          <a href="{{ route('cards.create', ['template' => $templateNumber]) }}"
             class="btn btn-light btn-sm mt-2 w-100">Use This Template</a>
        </div>
        @endauth

      </div>
    </div>
  </div>
</div>

<script>
function comp(id){ return document.getElementById('component-card-'+id); }
function cFont(font,id){ comp(id).style.fontFamily = font; }
function cAlign(align,id){ comp(id).style.textAlign = align; }
function cSize(size,id){ comp(id).style.fontSize = size; }
function cBold(id){
  comp(id).style.fontWeight =
    comp(id).style.fontWeight === 'bold' ? 'normal' : 'bold';
}
</script>
