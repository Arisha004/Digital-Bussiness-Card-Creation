@extends('layout')

@section('title', 'Privacy Policy')

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
          Privacy Policy
      </h2>

      <p style="line-height:1.8;">
          We respect your privacy. Any information you provide through our contact
          form is used strictly to respond to your inquiries.
      </p>

      <p style="line-height:1.8;">
          We do not sell, rent, or share your personal data with third parties.
          Your information remains confidential and secure.
      </p>

      <p style="line-height:1.8;">
          By using our website, you consent to the collection and use of your
          information as described in this policy.
      </p>
  </div>

</div>
@endsection
