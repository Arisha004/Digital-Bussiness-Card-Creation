@extends('layout')

@section('title', 'Terms of Service')

@section('content')
<div style="
  background: linear-gradient(135deg, #0d3b66 0%, #3f8ed9 50%, #5b86e5 100%);
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
">

  <div style="
      width: 650px;
      background: rgba(255,255,255,0.12);
      backdrop-filter: blur(15px);
      border-radius: 18px;
      padding: 40px;
      box-shadow: 0 10px 35px rgba(0,0,0,0.25);
      border: 1px solid rgba(255,255,255,0.25);
      color: #fff;
      font-family: 'Segoe UI', sans-serif;
  ">
      <h2 style="text-align:center; margin-bottom:25px;">
          Terms of Service
      </h2>

      <p style="line-height:1.8;">
          By using Cardly, you agree to comply with our terms and conditions.
          These services are provided as-is for digital business card management.
      </p>

      <p style="line-height:1.8;">
          We do not guarantee specific outcomes beyond what is described on our platform.
          Usage is at your own discretion and responsibility.
      </p>

      <p style="line-height:1.8;">
          We reserve the right to update or modify these terms at any time without
          prior notice.
      </p>
  </div>

</div>
@endsection
