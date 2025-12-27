<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cardly — Create Your Digital Business Card</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background: #f8f9fa;
      color: #333;
    }
    .template-card {
  border-radius: 18px;
  padding: 20px;
  color: #fff;
  width: 320px;
  margin: auto;
  position: relative;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.template-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 20px 40px rgba(0,0,0,0.25);
}

.template-card .profile-img {
  width: 70px;
  height: 70px;
  border-radius: 50%;
  border: 3px solid #fff;
  object-fit: cover;
  margin-bottom: 12px;
}

.template-card h5 {
  margin: 0;
  font-weight: bold;
}

.template-card small {
  opacity: 0.9;
}

.template-card .divider {
  height: 1px;
  background: rgba(255,255,255,0.4);
  margin: 12px 0;
}
.flip-card {
  width: 320px;
  height: 420px;
  perspective: 1200px;
  margin: auto;
}

.flip-card-inner {
  width: 100%;
  height: 100%;
  transition: transform 0.8s ease-in-out;
  transform-style: preserve-3d;
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

/* Front & Back */
.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
   font-size: 1.4rem; /* card name */
  border-radius: 18px;
  backface-visibility: hidden;
  overflow: hidden;
}

.flip-card-back {
  transform: rotateY(180deg);
}

/* Glass Effect */
.glass-card {
  background: rgba(255,255,255,0.1);
  backdrop-filter: blur(14px);
  border: 1px solid rgba(255,255,255,0.3);
  box-shadow: 0 20px 40px rgba(0,0,0,0.25);
  color: #fff;
}
.flip-card-front small,
.flip-card-back small {
  font-size: 1.1rem; /* subtitle / position */
}

.flip-card-front p,
.flip-card-back p {
  font-size: 1.1rem; /* contact info */
  line-height: 1.5;
}

/* Profile Image */
.profile-img {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  border: 3px solid #fff;
  object-fit: cover;
  margin-bottom: 12px;
}

/* Divider */
.divider {
  height: 1px;
  background: rgba(255,255,255,0.4);
  margin: 12px 0;
}

/* Template Colors */
.t1 .glass-card { background: rgba(0,0,0,0.75); }
.t2 .glass-card { background: linear-gradient(135deg,#667eea,#764ba2); }
.t3 .glass-card { background: linear-gradient(135deg,#11998e,#38ef7d); }

.template-card .info {
  font-size: 0.85rem;
  line-height: 1.6;
}

    .navbar {
      background: #fff;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .navbar-brand {
      font-weight: bold;
      color: #0d3b66 !important;
      font-size: 1.6rem;
    }

    .navbar .nav-link {
      font-size: 1.1rem;
      color: #0d3b66 !important;
      transition: color 0.3s;
    }

    .navbar .nav-link:hover {
      color: #3f8ed9 !important;
    }

    /* Hero Section */
    .hero-advanced {
        margin-top: -2px;
      display: flex;
      align-items: center;
      min-height: 80vh;
      background: linear-gradient(135deg, #0d3b66, #3f8ed9, #5b86e5);
      color: #fff;
      position: relative;
      overflow: hidden;
      padding: 3rem 1rem;
    }

    .hero-advanced::before {
      content: '';
      position: absolute;
      inset: 0;
      z-index: 1;
    }

    .hero-content {
      z-index: 2;
    }

    .hero-content h1 {
        margin-top: -40px;
      font-size: 3.5rem;
      font-weight: bold;
      text-shadow: 2px 2px 15px rgba(0,0,0,0.4);
    }

    .hero-content p {
      font-size: 1.25rem;
      margin-bottom: 25px;
      text-shadow: 1px 1px 8px rgba(0,0,0,0.2);
    }

   
   

    .hero-content .btn {
      padding: 0.85rem 2rem;
      border-radius: 50px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .hero-content .btn:hover {
      transform: translateY(-3px);
    }

    .hero-main-img {
      max-width: 90%;
      width:820px;
      border-radius: 20px;
      transition: transform 0.3s;
    }

   
    /* Features Section */
    .features {
      padding: 5rem 1rem;
      background: #fff;
    }

    .features h2 {
      font-weight: bold;
      margin-bottom: 50px;
    }

    .feature-box {
      padding: 2rem 1.5rem;
      border-radius: 15px;
      background: #f0f4ff;
      transition: all 0.3s ease;
      box-shadow: 0 10px 25px rgba(0,0,0,0.05);
    }

    .feature-box:hover {
      transform: translateY(-6px);
      box-shadow: 0 12px 30px rgba(0,0,0,0.1);
    }

    .feature-box i {
      font-size: 2.5rem;
      margin-bottom: 15px;
      color: #0d3b66;
    }

    .feature-box h5 {
      font-weight: 600;
      margin-bottom: 10px;
    }

    .feature-box p {
      font-size: 0.9rem;
      color: #555;
    }

    /* How It Works Section */
    #how-it-works {
      padding: 5rem 1rem;
    }

    #how-it-works h2 {
      font-weight: bold;
      margin-bottom: 40px;
    }

    .step-card {
      border-radius: 15px;
      padding: 2rem;
      box-shadow: 0 8px 25px rgba(0,0,0,0.05);
      transition: all 0.3s ease;
    }
  
  /* Scrollbar styling for modern look */
  #how-it-works .d-flex::-webkit-scrollbar {
    height: 8px;
  }
  #how-it-works .d-flex::-webkit-scrollbar-thumb {
    background: rgba(0,0,0,0.2);
    border-radius: 4px;
  }
  #how-it-works .d-flex::-webkit-scrollbar-track {
    background: rgba(0,0,0,0.05);
    border-radius: 4px;
  }

  /* Step Badge hover effect */
  #how-it-works .step-badge {
    transition: transform 0.1s ease;
  }
  #how-it-works .card:hover .step-badge {
    transform: scale(1.1);
  }

    .step-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 30px rgba(0,0,0,0.1);
    }

    .step-badge {
      width: 60px;
      height: 60px;
      display: inline-flex;
      justify-content: center;
      align-items: center;
      border-radius: 50%;
      font-size: 1.5rem;
      background: linear-gradient(135deg, #36d1dc 0%, #5b86e5 100%);
      color: #fff;
      margin-bottom: 15px;
    }

    /* Trust Banner */
    .trust-banner {
      background: linear-gradient(135deg, #0d3b66, #3f8ed9);
      color: #fff;
      padding: 3rem 1rem;
      text-align: center;
    }

    .trust-banner .btn {
      border-radius: 50px;
      font-weight: 600;
      padding: 0.85rem 2rem;
      transition: all 0.3s ease;
    }

    .trust-banner .btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(0,0,0,0.25);
    }

    footer {
      background: #0d3b66;
      color: black;
      padding: 2rem 1rem;
      text-align: center;
    }

    footer p {
      margin-bottom: 0;
    }

          .navbar .nav-link {
    font-size: 1.1rem; /* bigger text */
   
}

.navbar .navbar-brand {
    font-size: 1.5rem; /* larger brand name */
}
 
  </style>
</head>
<body>

@include('include.header');

<!-- Hero Section -->
<section class="hero-advanced">
  <div class="container">
    <div class="row align-items-center">
        

      <!-- Left: Text -->
      <div class="col-lg-6 hero-content">
        <h1>Create Your Digital Business Card</h1>
        <p>Build stunning digital business cards that work <br> everywhere in minutes, no printing needed.

</p>

    

        <div class="d-flex gap-3 flex-wrap">
          <a href="/registration" class="btn btn-light text-dark btn-lg">Get Started Free</a>
          <a href="#templates" class="btn btn-outline-light btn-lg">View Templates</a>
        </div>

        <div class="mt-3 small opacity-75">
          Trusted, fast, and easy — no credit card required.
        </div>
      </div>

      <!-- Right: Image -->
      <div class="col-lg-6 text-center">
        <img src="{{ asset('images/final.png') }}" alt="Digital Card Preview" class="img-fluid hero-main-img">
      </div>

    </div>
  </div>
</section>

<!-- Features Section -->
<section class="features">
  <div class="container">
    <h2 class="text-center">Powerful Digital Card Features</h2>
    <div class="row g-4 justify-content-center">

     
      <div class="col-md-3">
        <div class="feature-box">
          <i class="bi bi-qr-code-scan"></i>
          <h5>Instant QR Code</h5>
          <p>Auto QR for every card</p>
        </div>
      </div>

      <div class="col-md-3">
        <div class="feature-box">
          <i class="bi bi-share-fill"></i>
          <h5>Customize Templates</h5>
          <p>Customize according to your preference</p>
        </div>
      </div>

      <div class="col-md-3">
        <div class="feature-box">
          <i class="bi bi-cloud-arrow-down-fill"></i>
          <h5>Instant Download</h5>
          <p>Save as PNG or PDF</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Templates Section -->


<section id="templates" class="py-5">
  <div class="container text-center">
    <h2 class="mb-4">Digital Business Card Templates</h2>
    <p class="text-muted mb-5">
      Preview professional designs you can create. These are examples only.
    </p>

    <div class="row g-4 justify-content-center">

      <!-- Template 1 -->
      <div class="col-md-4">
        <div class="flip-card mx-auto">
          <div class="flip-card-inner t2">

            <!-- FRONT -->
            <div class="flip-card-front glass-card p-4 text-center">
              <img src="https://randomuser.me/api/portraits/men/32.jpg" class="profile-img mb-3" alt="Michael Carter">
              <h5>Michael Carter</h5>
              <small>Founder & CEO · TechNova</small>
              <div class="divider"></div>
              <p>michael@technova.com<br>+123 456 789<br>technova.com</p>
            </div>

            <!-- BACK -->
            <div class="flip-card-back glass-card p-4 text-center">
              <h5>Michael Carter</h5>
              <p>Scan QR Code</p>
              <img src="https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=https://example.com/card/1" class="mb-3" alt="QR Code">
              <hr>
              <p>technova.com</p>
              <small>Digital Business Card</small>
            </div>

          </div>
        </div>
      </div>

      <!-- Template 2 -->
      <div class="col-md-4">
        <div class="flip-card mx-auto">
          <div class="flip-card-inner t3">

            <div class="flip-card-front glass-card p-4 text-center">
              <img src="https://randomuser.me/api/portraits/women/45.jpg" class="profile-img mb-3" alt="Sarah Williams">
              <h5>Sarah Williams</h5>
              <small>Marketing Manager · MediaWorks</small>
              <div class="divider"></div>
              <p>sarah@mediaworks.com<br>+987 654 321<br>mediaworks.com</p>
            </div>

            <div class="flip-card-back glass-card p-4 text-center">
              <h5>Sarah Williams</h5>
              <p>Scan QR Code</p>
              <img src="https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=https://example.com/card/2" class="mb-3" alt="QR Code">
              <hr>
              <p>mediaworks.com</p>
              <small>Digital Business Card</small>
            </div>

          </div>
        </div>
      </div>

      <!-- Template 3 -->
      <div class="col-md-4">
        <div class="flip-card mx-auto">
          <div class="flip-card-inner t1">

            <div class="flip-card-front glass-card p-4 text-center">
              <img src="https://randomuser.me/api/portraits/men/76.jpg" class="profile-img mb-3" alt="David Thompson">
              <h5>David Thompson</h5>
              <small>Creative Director · DesignPro</small>
              <div class="divider"></div>
              <p>david@designpro.com<br>+192 837 465<br>designpro.com</p>
            </div>

            <div class="flip-card-back glass-card p-4 text-center">
              <h5>David Thompson</h5>
              <p>Scan QR Code</p>
              <img src="https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=https://example.com/card/3" class="mb-3" alt="QR Code">
              <hr>
              <p>designpro.com</p>
              <small>Digital Business Card</small>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- How It Works Section -->
<section id="how-it-works" class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-4">How It Works</h2>
    <p class="text-center text-muted mb-5">
      Create your digital business card in three simple steps.
    </p>

    <div id="steps-container" class="d-flex overflow-auto flex-row gap-3 pb-3">
      <!-- Step 1 -->
      <div class="card flex-shrink-0 step-card" style="min-width: 250px; border-radius:15px; box-shadow:0 8px 20px rgba(0,0,0,0.1);">
        <div class="card-body text-center p-4">
          <div class="step-badge bg-primary mb-3">1</div>
          <h5 class="card-title fw-bold">Choose a Style</h5>
          <p class="card-text text-muted">Browse our preview templates for inspiration before creating your own card.</p>
        </div>
      </div>

      <!-- Step 2 -->
      <div class="card flex-shrink-0 step-card" style="min-width: 250px; border-radius:15px; box-shadow:0 8px 20px rgba(0,0,0,0.1);">
        <div class="card-body text-center p-4">
          <div class="step-badge bg-success mb-3">2</div>
          <h5 class="card-title fw-bold">Add Your Details</h5>
          <p class="card-text text-muted">Enter your personal and professional information in the Create Card form.</p>
        </div>
      </div>

      <!-- Step 3 -->
      <div class="card flex-shrink-0 step-card" style="min-width: 250px; border-radius:15px; box-shadow:0 8px 20px rgba(0,0,0,0.1);">
        <div class="card-body text-center p-4">
          <div class="step-badge bg-warning mb-3">3</div>
          <h5 class="card-title fw-bold">Save & Share</h5>
          <p class="card-text text-muted">Save your card and download it via png or pdf format and share them on social platforms.</p>
        </div>
      </div>

      <!-- Step 4 -->
      <div class="card flex-shrink-0 step-card" style="min-width: 250px; border-radius:15px; box-shadow:0 8px 20px rgba(0,0,0,0.1);">
        <div class="card-body text-center p-4">
          <div class="step-badge bg-danger mb-3">4</div>
          <h5 class="card-title fw-bold">Go Live</h5>
          <p class="card-text text-muted">Your card is ready to be shared with clients, friends, and networks instantly.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Trust Banner -->
<section class="trust-banner py-5 text-center" style="background: linear-gradient(135deg, #0d3b66 0%, #3f8ed9 50%, #5b86e5 100%)"color: #fff;">
  <div class="container">
    <p class="mb-3 fw-bold fs-4">Join thousands of professionals building digital cards!</p>
    <a href="/registration" class="btn btn-light text-dark btn-lg rounded-pill px-4 py-2 fw-bold">Start Free Now</a>
  </div>
</section>

<!-- JS for Auto-Scrolling Steps -->
<script>
  const container = document.getElementById('steps-container');
  let scrollAmount = 0;

  function autoScroll() {
    scrollAmount += 1;
    if(scrollAmount > container.scrollWidth - container.clientWidth){
      scrollAmount = 0;
    }
    container.scrollTo({
      left: scrollAmount,
      behavior: 'smooth'
    });
  }

  setInterval(autoScroll, 50); // Adjust speed: lower value = faster
</script>

@include('include.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
