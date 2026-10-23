@extends('auth.layout')

@section('title', 'Şifremi unuttum')

@section('content')
<div class="card card-outline card-primary">
<div class="card-header text-center"><a href="{{ url('/') }}" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover"><h1 class="mb-0"><b>Not</b> Defteri</h1></a></div>
<div class="card-body login-card-body">
<p class="login-box-msg">Şifre sıfırlama bağlantısı için e-posta adresinizi girin</p>
@if (session('status'))<div class="alert alert-success" role="status">{{ session('status') }}</div>@endif
@if ($errors->any())<div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>@endif
<form action="{{ route('password.email') }}" method="post">
    @csrf
    <div class="input-group mb-3"><div class="form-floating"><input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="E-posta" autocomplete="email" required autofocus><label for="email">E-posta</label></div><div class="input-group-text"><span class="bi bi-envelope"></span></div></div>
    <div class="d-grid"><button type="submit" class="btn btn-primary">Sıfırlama bağlantısı gönder</button></div>
</form>
<p class="mb-0 mt-3"><a href="{{ route('login') }}">Giriş sayfasına dön</a></p>
</div>
</div>
@endsection
