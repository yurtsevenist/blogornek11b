@extends('layouts.master')
@section('title', 'Blog Yazılarım')
@section('content')
<main id="main-content" class="wrap interior-page blog-page">
    <div class="blog-layout">
        @include('blogs._filters-sidebar')
        <div class="blog-main-column">
    <header class="page-intro">
        <span class="eyebrow">NOT DEFTERİMDEN</span>
        <h1>Fikirler zamanla<br><span>yerini bulur.</span></h1>
        <p>Öğrendiklerimden, düşündüklerimden ve yol boyunca karşıma çıkan küçük keşiflerden notlar.</p>
        @if (request()->filled('kategori') || request()->filled('etiket'))
            <p class="blog-filter-info">
                Filtre:
                @if (request()->filled('kategori')) Kategori: <strong>{{ request('kategori') }}</strong> @endif
                @if (request()->filled('etiket')) Etiket: <strong>{{ request('etiket') }}</strong> @endif
                <a href="{{ route('blogs.index') }}">Tüm yazıları göster</a>
            </p>
        @endif
    </header>

    <section class="blog-list" aria-label="Blog yazıları">
        @include('blogs._list-items', ['blogs' => $blogs])
        @if ($blogs->isEmpty())
            <p>Bu filtreyle eşleşen yayınlanmış yazı bulunamadı.</p>
        @endif
    </section>

    @if ($blogs->hasMorePages())
        <div class="blog-load-more" data-infinite-scroll data-next-url="{{ $blogs->nextPageUrl() }}">
            <a href="{{ $blogs->nextPageUrl() }}">Daha fazla yazı yükle</a>
            <span class="blog-loading" role="status" aria-live="polite">Yazılar yükleniyor…</span>
        </div>
    @endif
    <noscript>{{ $blogs->links('pagination.blog') }}</noscript>
    <div class="blog-endnote"><span class="note-line"></span><span>Okuduğun için teşekkürler.</span><span class="note-line"></span></div>
        </div>
        @include('blogs._highlights-sidebar')
    </div>
</main>
@endsection
