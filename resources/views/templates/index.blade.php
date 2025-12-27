<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Business Card Templates</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
/* Flip card and glass card styling */
.flip-card { width: 320px; height: 420px; perspective: 1200px; margin: auto; }
.flip-card-inner { width: 100%; height: 100%; transition: transform 0.8s ease-in-out; transform-style: preserve-3d; }
.flip-card:hover .flip-card-inner { transform: rotateY(180deg); }
.flip-card-front, .flip-card-back { position: absolute; width: 100%; height: 100%; backface-visibility: hidden; border-radius: 18px; }
.flip-card-back { transform: rotateY(180deg); }
.glass-card {
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(14px);
    border: 1px solid rgba(255,255,255,0.3);
    font-size: 20px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.25);
    color: #fff;
    padding: 20px;
    height: 100%;
    box-sizing: border-box;
}
.profile-img { width: 90px; height: 100px; border-radius: 50%; border: 3px solid #fff; object-fit: cover; margin-bottom: 12px; }

/* Templates - updated gradients */
.t1 .glass-card { background: rgba(0,0,0,0.75); }
.t2 .glass-card { background: linear-gradient(135deg,#667eea,#764ba2); }
.t3 .glass-card { background: linear-gradient(135deg,#11998e,#38ef7d); }
.t4 .glass-card { background: linear-gradient(135deg,#f6d365,#fda085); }
.t5 .glass-card { background: linear-gradient(135deg,#ff7e5f,#feb47b); }
.t6 .glass-card { background: linear-gradient(135deg,#43cea2,#185a9d); }
</style>
<body>
@include('include.header');

<section class="text-center py-5" style=" background: linear-gradient(135deg, #0d3b66 0%, #3f8ed9 50%, #5b86e5 100%)">
  <h1 class="fw-bold" style="color: white">Choose a Design You Love</h1>
  <p class="text-white">Explore our digital business card templates. <br><strong>Note:</strong> These are sample designs. Your actual card will be fully customized.</p>
</section>

<section class="py-5">
  <div class="container text-center">
    <div class="row g-4 justify-content-center">

      @php
        $templates = [
          ['id'=>1,'theme'=>'t1','name'=>'Michael Carter','title'=>'Founder & CEO','company'=>'TechNova','email'=>'michael@technova.com','phone'=>'+123 456 789','website'=>'technova.com','image'=>'https://randomuser.me/api/portraits/men/32.jpg','qr'=>'https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=https://example.com/card/1'],
          ['id'=>2,'theme'=>'t2','name'=>'Sarah Williams','title'=>'Marketing Manager','company'=>'MediaWorks','email'=>'sarah@mediaworks.com','phone'=>'+987 654 321','website'=>'mediaworks.com','image'=>'https://randomuser.me/api/portraits/women/45.jpg','qr'=>'https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=https://example.com/card/2'],
          ['id'=>3,'theme'=>'t3','name'=>'David Thompson','title'=>'Creative Director','company'=>'DesignPro','email'=>'david@designpro.com','phone'=>'+192 837 465','website'=>'designpro.com','image'=>'https://randomuser.me/api/portraits/men/76.jpg','qr'=>'https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=https://example.com/card/3'],
          ['id'=>4,'theme'=>'t4','name'=>'Emma Johnson','title'=>'UX Designer','company'=>'CreativeLabs','email'=>'emma@creativelabs.com','phone'=>'+111 222 333','website'=>'creativelabs.com','image'=>'https://randomuser.me/api/portraits/women/12.jpg','qr'=>'https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=https://example.com/card/4'],
          ['id'=>5,'theme'=>'t5','name'=>'James Smith','title'=>'Product Manager','company'=>'InnoTech','email'=>'james@innotech.com','phone'=>'+444 555 666','website'=>'innotech.com','image'=>'https://randomuser.me/api/portraits/men/22.jpg','qr'=>'https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=https://example.com/card/5'],
          ['id'=>6,'theme'=>'t6','name'=>'Olivia Brown','title'=>'Marketing Specialist','company'=>'BrandWorks','email'=>'olivia@brandworks.com','phone'=>'+777 888 999','website'=>'brandworks.com','image'=>'https://randomuser.me/api/portraits/women/30.jpg','qr'=>'https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=https://example.com/card/6'],
        ];
      @endphp

      @foreach($templates as $template)
      <div class="col-md-4">
        <div class="flip-card mx-auto">
          <div class="flip-card-inner {{ $template['theme'] }}">
            <!-- Front -->
            <div class="flip-card-front glass-card text-center">
              <img src="{{ $template['image'] }}" class="profile-img" alt="{{ $template['name'] }}">
              <h5>{{ $template['name'] }}</h5>
              <small>{{ $template['title'] }} · {{ $template['company'] }}</small>
              <div class="divider"></div>
              <p>{{ $template['email'] }}<br>{{ $template['phone'] }}<br>{{ $template['website'] }}</p>
            </div>
            <!-- Back -->
            <div class="flip-card-back glass-card text-center">
              <h5>{{ $template['name'] }}</h5>
              <p>Scan QR Code</p>
              <img src="{{ $template['qr'] }}" class="mb-3">
              <hr>
              <p>{{ $template['website'] }}</p>
              <small>Digital Business Card</small>
            </div>
          </div>
        </div>

        @if(auth()->user() && auth()->user()->role !== 'admin')
       <a href="{{ route('cards.create.template', ['template' => $template['id']]) }}" class="btn btn-success btn-sm mt-2">Use This Template</a>
        @endif
      </div>
      @endforeach

    </div>
  </div>
</section>

@include('include.footer')
</body>
</html>
