@extends('layouts.app')
<style>
.btn-primary{
    position:relative;
  width:100%;
  padding:20px;
  border-radius:6px;
  border:0;
  background:#1a237e;
  font-size:1.2em;
  color:#ffeb3b;
  text-shadow:1px 1px 0px rgba(0,0,0,.1);
  box-shadow:0px 3px 0px #02030c;
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
  background:#0e3a11;
}
.container{
  background:#b71c1c;
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
.col-md-4{
    color:white;
    font-weight: bolder;
}
.col-md-6{
    color:white;
    font-weight: bolder;
}
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register🎄') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('お名前') }}</label>

                            <div class="col-md-6">
                                <input placeholder="例）佐藤太郎" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input placeholder="メールアドレス" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input placeholder="パスワード" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('再確認　パスワード') }}</label>

                            <div class="col-md-6">
                                <input placeholder="再確認用　パスワード" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('生年月日') }}</label>

                            <div class="col-md-6">
                                <input placeholder="例）20220101" id="birthday" type="text" class="form-control @error('name') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday" autofocus>

                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('電話番号') }}</label>

                            <div class="col-md-6">
                                <input placeholder="例）02012345678" id="phone_number" type="text" class="form-control @error('name') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('性別') }}</label>

                            <div class="col-md-6">
                                <input id="gender" type="radio" class="form-control @error('name') is-invalid @enderror" name="gender" value="男" required autocomplete="gender" autofocus>男性
                                <input id="gender" type="radio" class="form-control @error('name') is-invalid @enderror" name="gender" value="女" required autocomplete="gender" autofocus>女性

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="workarea" class="col-md-4 col-form-label text-md-right">{{ __('所属店舗') }}</label>

                            <div class="col-md-6">
                                <select name="workarea" id="">
                                    <option value="渋谷">渋谷</option>
                                    <option value="南町田">南町田</option>
                                    <option value="新宿">新宿</option>
                                    <option value="恵比寿">恵比寿</option>
                                    <option value="吉祥寺">吉祥寺</option>
                                </select>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
