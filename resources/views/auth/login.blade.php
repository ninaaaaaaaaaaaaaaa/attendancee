@extends('layouts.app')

<style>
.btn-primary{
    position:relative;
  width:100%;
  padding:20px;
  border-radius:6px;
  border:0;
  background:#084e0a;
  font-size:1.2em;
  color:#ffeb3b;
  text-shadow:1px 1px 0px rgba(0,0,0,.1);
  box-shadow:0px 3px 0px #0b2b0c;
  cursor: pointer;
  margin-bottom: 13px;
  font-weight: bold;
}
.btn-primary:active{
  top:3px;
  box-shadow:none;
}
input:focus, 
textarea:focus {
    outline: none;
}

body {
  background:#f54710;
}
.container{
  background:#0a209a;
  border-radius:6px;
  padding:28px;
  padding-top:30px;
  width:400px;
  margin:50px auto;
  box-shadow:15px 15px 0px rgba(0,0,0,.1);
}
.good{
  text-align:center;
  font-size:1.9em;
  font-weight:900;
  color:#f1d907;
  
}
input {
  width:100%;
  background:#f5f5f5;
  border:0;
  padding:20px;
  border-radius:6px;
  margin-bottom:15px;
  border:1px solid #eee;
  font-weight: bolder;
  font-size: 15px;
}
.btn-link{
  text-align:center;
  font-size:15px;
  color:#777;
  cursor:pointer;
  margin-bottom: 13px;
  margin: 27%;
}
.card-header{
  text-align:center;
  padding:20px;
  padding-top:35px;
  color:#777;
  cursor:pointer;
  font-weight: bolder;
}
</style>
@section('content')
<div class="container">
<div class="good">
<script type="text/javascript" >
<!--
var msg1 = 'Good morning!🌞';
var msg2 = 'Good afternoon!😃';
var msg3 = 'Good evening!🌛';

var now = new Date();
var hour = now.getHours();

if(hour >= 5 && hour <= 11){
    document.write(msg1);
}
else if(hour >= 12 && hour <= 16){
    document.write(msg2);
}
else{
    document.write(msg3);
}
-->
</script>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ログイン') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!--
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        -->
                        <div class="form-group row">
                            <!--<label for="name" class="col-md-4 col-form-label text-md-right">お名前</label>-->
 
                            <div class="col-md-6">
                                <input placeholder="お名前"  id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
 
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <!--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>-->

                            <div class="col-md-6">
                                <input placeholder="パスワード" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--<div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
