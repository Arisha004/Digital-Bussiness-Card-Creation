@extends('layout')
@section('title', 'Login')
@section('content')
<div style="  background: linear-gradient(135deg, #0d3b66 0%, #3f8ed9 50%, #5b86e5 100%);
  height: 100vh;
  display: flex;
   margin-top:23px;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  ">
  
  <h1 style="color:#fff; text-align:center; margin-bottom:40px; font-family: 'Segoe UI', sans-serif;">Login</h1>

  <div class="d-flex justify-content-center mt-3">
    <form action="{{route('login.post')}}" method="POST" style="
        width: 500px;
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(15px);
        border-radius: 15px;
        margin-top:-40px;
        padding: 30px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.2);
        border: 1px solid rgba(255,255,255,0.3);
    ">
        @csrf
        <div class="mb-3">
            <label class="form-label" style="color:#fff;">Email address</label>
            <input type="email" class="form-control" name="email" style="border-radius:10px;">
        </div>
        <div class="mb-3 position-relative">
            <label class="form-label" style="color:#fff;">Password</label>
            <input type="password" id="password" class="form-control" name="password" style="border-radius:10px;">
            <span onclick="togglePassword()" style="position:absolute; right:10px; top:38px; cursor:pointer; color:#fff;">👁️</span>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-light w-100" style="border-radius:10px; font-weight:bold;">Submit</button>
        </div>
    </form>
  </div>
</div>

<script>
function togglePassword() {
    const field = document.getElementById("password");
    field.type = field.type === "password" ? "text" : "password";
}
</script>
@endsection
