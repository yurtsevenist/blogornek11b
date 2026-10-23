@extends('auth.layout')

@section('title', 'Yeni şifre belirle')

@section('content')
<div class="card card-outline card-primary">
<div class="card-header text-center"><a href="{{ url('/') }}" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover"><h1 class="mb-0"><b>Not</b> Defteri</h1></a></div>
<div class="card-body login-card-body">
<p class="login-box-msg">Yeni şifrenizi belirleyin</p>
@if ($errors->any())<div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>@endif
<form action="{{ route('password.update') }}" method="post">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="input-group mb-2"><div class="form-floating"><input id="email" type="email" name="email" value="{{ old('email', $email) }}" class="form-control" placeholder="E-posta" autocomplete="email" required autofocus><label for="email">E-posta</label></div><div class="input-group-text"><span class="bi bi-envelope"></span></div></div>
    <div class="input-group mb-2"><div class="form-floating"><input id="password" type="password" name="password" class="form-control" placeholder="Yeni şifre" autocomplete="new-password" required><label for="password">Yeni şifre (en az 8 karakter)</label></div><div class="input-group-text"><span class="bi bi-lock-fill"></span></div></div>
    <div class="input-group mb-3"><div class="form-floating"><input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Yeni şifre tekrarı" autocomplete="new-password" required><label for="password_confirmation">Yeni şifre tekrarı</label></div><div class="input-group-text"><span class="bi bi-lock-fill"></span></div></div>
    <div class="d-grid"><button type="submit" class="btn btn-primary">Şifreyi güncelle</button></div>
</form>
</div>
</div>
@endsection
