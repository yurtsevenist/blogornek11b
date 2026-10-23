@extends('auth.layout')

@section('title', 'Giriş yap')

@section('content')
<div class="card card-outline card-primary">
<div class="card-header text-center">
    <a href="{{ url('/') }}" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover"><h1 class="mb-0"><b>Not</b> Defteri</h1></a>
</div>
<div class="card-body login-card-body">
<p class="login-box-msg">Hesabınıza giriş yapın</p>
@if (session('status'))<div class="alert alert-success" role="status">{{ session('status') }}</div>@endif
@if ($errors->any())<div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>@endif
<form action="{{ route('login.store') }}" method="post">
    @csrf
    <div class="input-group mb-2">
        <div class="form-floating"><input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="E-posta" autocomplete="email" required autofocus><label for="email">E-posta</label></div>
        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
    </div>
    <div class="input-group mb-2">
        <div class="form-floating"><input id="password" type="password" name="password" class="form-control" placeholder="Şifre" autocomplete="current-password" required><label for="password">Şifre</label></div>
        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
    </div>
    <div class="row mt-3">
        <div class="col-8 d-inline-flex align-items-center"><div class="form-check"><input id="remember" type="checkbox" name="remember" value="1" class="form-check-input"><label class="form-check-label" for="remember">Beni hatırla</label></div></div>
        <div class="col-4"><div class="d-grid"><button type="submit" class="btn btn-primary">Giriş yap</button></div></div>
    </div>
</form>
<p class="mb-1 mt-3"><a href="{{ route('password.request') }}">Şifremi unuttum</a></p>
<p class="mb-0"><a href="{{ route('register') }}" class="text-center">Yeni hesap oluştur</a></p>
</div>
</div>
@endsection
