@extends('layout')

@section('title', 'Contact')
@section('content')

<div style="
  background: linear-gradient(135deg, #0d3b66 0%, #3f8ed9 50%, #5b86e5 100%);
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin-top: 23px;
">

  <h1 style="
    color:#fff;
    text-align:center;
    margin-bottom:40px;
    font-family:'Segoe UI', sans-serif;
  ">
    Contact Us
  </h1>


  <form action="{{ route('contact.submit') }}" method="POST" style="
      width: 500px;
      background: rgba(255,255,255,0.1);
      backdrop-filter: blur(15px);
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.2);
      border: 1px solid rgba(255,255,255,0.3);
  ">
      @csrf

      <div class="mb-3">
          <label class="form-label" style="color:#fff;">Name <span style="color: red">*</span></label>
          <input type="text"
                 class="form-control"
                 name="name"
                 pattern="[A-Za-z\s]+"
                 title="Name should only contain letters and spaces"
                 required
                 style="border-radius:10px;">
      </div>

      <div class="mb-3">
          <label class="form-label" style="color:#fff;">Email<span style="color: red">*</span></label>
          <input type="email"
                 class="form-control"
                 name="email"
                 required
                 style="border-radius:10px;">
      </div>

      <div class="mb-3">
          <label class="form-label" style="color:#fff;">Message<span style="color: red">*</span></label>
          <textarea class="form-control"
                    name="message"
                    rows="5"
                    required
                    style="border-radius:10px;"></textarea>
      </div>

      <button type="submit"
              class="btn btn-light w-100"
              style="border-radius:10px; font-weight:bold;">
          Send Message
      </button>
  </form>
</div>

@endsection
