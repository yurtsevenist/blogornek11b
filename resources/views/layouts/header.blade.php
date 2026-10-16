<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Notlar, fikirler ve deneyimler." />
        <meta name="color-scheme" content="light dark" />
        <title>@yield('title', 'Kişisel Blog') · Kişisel Blog</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('tema/assets/favicon.ico') }}" />
        <script src="{{ asset('js/theme.js') }}"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
        <link href="{{ asset('tema/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/site.css') }}" rel="stylesheet" />
    </head>
    <body>
        <a class="skip-link" href="#main-content">İçeriğe geç</a>
        <nav class="site-nav" aria-label="Ana menü">
            <div class="nav-inner">
                <a class="brand" href="{{ url('/') }}"><span class="brand-mark">N</span><span>Not Defteri<span class="brand-dot">.</span></span></a>
                <div class="nav-links">
                    <a class="{{ request()->is('/') ? 'is-active' : '' }}" href="{{ url('/') }}">Anasayfa</a>
                    <a class="{{ request()->is('hakkimda') ? 'is-active' : '' }}" href="{{ url('hakkimda') }}">Hakkımda</a>
                    <a class="{{ request()->is('blog-yazilarim') ? 'is-active' : '' }}" href="{{ url('blog-yazilarim') }}">Yazılar</a>
                    <a class="{{ request()->is('iletisim') ? 'is-active' : '' }}" href="{{ url('iletisim') }}">İletişim</a>
                </div>
                <button class="theme-toggle" type="button" aria-label="Koyu temaya geç" title="Koyu temaya geç" aria-pressed="false"><span class="theme-toggle-icon" aria-hidden="true">☾</span><span class="theme-toggle-text">Koyu tema</span></button>
            </div>
        </nav>
