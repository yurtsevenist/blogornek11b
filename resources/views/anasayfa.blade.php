@extends('layouts.master')
@section('title', 'Anasayfa')
@section('content')
<main id="main-content">
    <section class="hero wrap">
        <div class="hero-copy">
            <span class="eyebrow"><span class="status-dot"></span> Kişisel bloguma hoş geldin</span>
            <h1>Merak ettiklerim,<br><span>öğrendiklerim.</span></h1>
            <p class="hero-lead">Burada fikirlerimi, deneyimlerimi ve yeni keşiflerimi sade notlara dönüştürüyorum. Umarım sana da ilham verir.</p>
            <div class="hero-actions"><a class="button button-primary" href="{{ url('blog-yazilarim') }}">Yazıları keşfet <span aria-hidden="true">↗</span></a><a class="text-link" href="{{ url('hakkimda') }}">Beni tanı <span aria-hidden="true">→</span></a></div>
            <div class="hero-note"><span class="note-line"></span><span>Yavaşla, düşün, paylaş.</span></div>
        </div>
        <div class="hero-art" aria-hidden="true"><div class="art-orbit orbit-one"></div><div class="art-orbit orbit-two"></div><div class="art-sun"></div><div class="art-card"><span class="art-card-label">BUGÜNÜN NOTU</span><span class="art-card-title">Her şey<br>bir soruyla<br>başlar.</span><span class="art-card-foot">Düşünceler üzerine · 04 dk</span></div><span class="art-spark spark-one">✳</span><span class="art-spark spark-two">✳</span></div>
    </section>
    <section class="section-block wrap">
        <div class="section-heading"><div><span class="eyebrow">GÜNCELDEN</span><h2>Son yazılar</h2></div><a class="text-link" href="{{ url('blog-yazilarim') }}">Tüm yazılar <span aria-hidden="true">→</span></a></div>
        <div class="post-grid">
            @forelse ($blogs as $blog)
                <a class="post-card" href="{{ url('blog-yazilarim') }}">
                    <span class="post-category">BLOG</span>
                    <span class="post-number">{{ sprintf('%02d', $loop->iteration) }}</span>
                    <h3>{{ $blog->title }}</h3>
                    <p>{{ $blog->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($blog->content), 120) }}</p>
                    <span class="post-meta">{{ $blog->created_at->format('d.m.Y') }} <span aria-hidden="true">↗</span></span>
                </a>
            @empty
                <p>Henüz blog yazısı eklenmemiş.</p>
            @endforelse
        </div>
    </section>
    <section class="closing-banner wrap"><div><span class="eyebrow">BİRLİKTE KONUŞALIM</span><h2>Aklında bir şey mi var?</h2><p>Bir merhaba, bir fikir ya da sadece kısa bir not bırakabilirsin.</p></div><a class="button button-light" href="{{ url('iletisim') }}">İletişime geç <span aria-hidden="true">↗</span></a></section>
</main>
@endsection
