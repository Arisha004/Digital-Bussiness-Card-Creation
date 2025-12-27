
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About Us | Cardly</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
    }

    /* Hero Section */
    .hero {
      background: linear-gradient(135deg, #0d3b66 0%, #3f8ed9 50%, #5b86e5 100%);
      color: white;
      padding: 100px 0 80px;
      text-align: center;
    }
    .hero h1 {
      font-weight: 700;
      font-size: 2.8rem;
    }
    .hero p {
      font-size: 1.2rem;
      margin-top: 15px;
    }
    .cta-btn {
      background: white;
      color: #0d3b66;
      border-radius: 30px;
      padding: 12px 28px;
      font-weight: 500;
      text-decoration: none;
      transition: 0.3s;
    }
    .cta-btn:hover {
      background: #f1f1f1;
      color: #0d3b66;
    }

    /* Section Titles */
    .section-title {
      font-weight: 700;
      margin-bottom: 25px;
      font-size: 1.8rem;
    }

    /* Feature Boxes */
    .feature-box {
      background: #f8f9fa;
      border-radius: 15px;
      padding: 30px 20px;
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .feature-box:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .feature-box h5 {
      font-weight: 600;
      margin-bottom: 10px;
    }
    .feature-box p {
      color: #6c757d;
    }

    /* Final CTA */
    .final-cta {
      background: linear-gradient(135deg, #0d3b66 0%, #3f8ed9 50%, #5b86e5 100%);
      color: white;
      padding: 80px 0;
      text-align: center;
    }
    .final-cta h3 {
      font-weight: 600;
      font-size: 2rem;
      margin-bottom: 15px;
    }
    .final-cta p {
      font-size: 1.1rem;
      margin-bottom: 20px;
    }
    .final-cta a {
      background: white;
      color: #0d3b66;
      padding: 12px 28px;
      border-radius: 30px;
      font-weight: 500;
      text-decoration: none;
      transition: 0.3s;
    }
    .final-cta a:hover {
      background: #f1f1f1;
      color: #0d3b66;
    }
  </style>
</head>
<body>

@include('include.header')

<!-- HERO SECTION -->
<section class="hero" style="margin-top: 22px">
  <div class="container">
    <h1>About Cardly</h1>
    <p>
      Cardly helps you create and share professional digital business cards in minutes. Simple, modern, and accessible from anywhere.
    </p>
    <a href="/templates" class="cta-btn mt-4 d-inline-block">Explore Templates</a>
  </div>
</section>

<!-- ABOUT FEATURES -->
<section class="py-5">
  <div class="container">
    <div class="row text-center mb-5">
      <h2 class="section-title">Why Choose Cardly?</h2>
      <p class="text-muted">We believe business cards should be smart, digital, and easy to share.</p>
    </div>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="feature-box text-center">
          <h5>🎨 Modern Templates</h5>
          <p>Choose from clean and professional card templates designed for all industries.</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="feature-box text-center">
          <h5>⚡ Easy Customization</h5>
          <p>Personalize your card with your details, theme, and design preferences quickly.</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="feature-box text-center">
          <h5>🔗 Easy Sharing</h5>
          <p>Share your digital card via link, QR code, or LinkedIn instantly.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FINAL CTA -->
<section class="final-cta">
  <div class="container">
    <h3>Ready to create your digital card?</h3>
    <p>Sign up now and personalize your own digital business card.</p>
    <a href="/login">Personalize Yours</a>
  </div>
</section>

@include('include.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
