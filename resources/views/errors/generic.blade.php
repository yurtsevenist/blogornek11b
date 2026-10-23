@extends('layouts.master')

@section('title', $title)

@section('content')
<main id="main-content" class="error-page wrap">
    <section class="error-card" aria-labelledby="error-title">
        <span class="error-eyebrow"><span class="status-dot"></span> BİR ŞEYLER TERS GİTTİ</span>
        <p class="error-code">{{ $statusCode }}</p>
        <h1 id="error-title">{{ $title }}</h1>
        <p class="error-message">{{ $message }}</p>
        <div class="error-actions">
            <a class="button button-primary" href="{{ url('/') }}">Ana sayfaya dön <span aria-hidden="true">→</span></a>
            @if ($statusCode === 401)
                <a class="text-link" href="{{ route('login') }}">Giriş yap</a>
            @elseif ($statusCode === 429 || $statusCode === 419)
                <a class="text-link" href="{{ url()->previous() }}">Önceki sayfaya dön</a>
            @endif
        </div>
    </section>
</main>
@endsection
