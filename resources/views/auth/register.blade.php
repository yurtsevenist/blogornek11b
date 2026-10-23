@extends('auth.layout')

@section('title', 'Kayıt ol')
@section('body-class', 'register-page')
@section('box-class', 'register-box')

@section('content')
<div class="card card-outline card-primary">
<div class="card-header text-center"><a href="{{ url('/') }}" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover"><h1 class="mb-0"><b>Not</b> Defteri</h1></a></div>
<div class="card-body register-card-body">
<p class="login-box-msg">Yeni hesap oluşturun</p>
@if ($errors->any())<div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>@endif
<form action="{{ route('register.store') }}" method="post">
    @csrf
    <div class="input-group mb-2"><div class="form-floating"><input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Ad soyad" autocomplete="name" required autofocus><label for="name">Ad soyad</label></div><div class="input-group-text"><span class="bi bi-person"></span></div></div>
    <div class="input-group mb-2"><div class="form-floating"><input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="E-posta" autocomplete="email" required><label for="email">E-posta</label></div><div class="input-group-text"><span class="bi bi-envelope"></span></div></div>
    <div class="input-group mb-2"><div class="form-floating"><input id="password" type="password" name="password" class="form-control" placeholder="Şifre" autocomplete="new-password" required><label for="password">Şifre (en az 8 karakter)</label></div><button class="input-group-text password-toggle" type="button" data-password-toggle data-target="password" aria-label="Şifreyi göster" aria-pressed="false"><span class="bi bi-eye" aria-hidden="true"></span></button></div>
    <div class="input-group mb-3"><div class="form-floating"><input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Şifre tekrarı" autocomplete="new-password" required><label for="password_confirmation">Şifre tekrarı</label></div><button class="input-group-text password-toggle" type="button" data-password-toggle data-target="password_confirmation" aria-label="Şifreyi göster" aria-pressed="false"><span class="bi bi-eye" aria-hidden="true"></span></button></div>
    <div class="d-grid"><button type="submit" class="btn btn-primary">Kayıt ol</button></div>
</form>
<p class="mb-0 mt-3"><a href="{{ route('login') }}" class="text-center">Zaten hesabım var</a></p>
</div>
</div>
@endsection
