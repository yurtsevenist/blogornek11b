@extends('layouts.master')
@section('title', $blog->title)
@section('content')
<main id="main-content" class="wrap interior-page blog-detail-page">
    <div class="blog-layout">
        @include('blogs._filters-sidebar')
        <div class="blog-main-column">
    <article>
        <header class="page-intro">
            <span class="post-category">
                <a href="{{ route('blogs.index', ['kategori' => $blog->category]) }}">{{ $blog->category ?: 'Kategorisiz' }}</a>
            </span>
            <h1>{{ $blog->title }}</h1>
            <p>{{ $blog->excerpt }}</p>
            <p class="blog-detail-meta">
                {{ optional($blog->published_at)->format('d.m.Y') ?? $blog->created_at->format('d.m.Y') }}
                · {{ number_format($blog->views_count) }} okunma
            </p>
            @if ($blog->cover_image)
                <img class="blog-cover" src="{{ $blog->cover_image }}" alt="{{ $blog->title }}" loading="lazy">
            @endif
        </header>

        <div class="blog-article-content blog-detail-content">
            @foreach (preg_split('/\r\n|\r|\n\s*\n/', $blog->content) as $paragraph)
                @if (trim($paragraph) !== '')
                    <p>{{ $paragraph }}</p>
                @endif
            @endforeach
        </div>

        @if (is_array($blog->tags) && count($blog->tags))
            <div class="post-tags blog-detail-tags" aria-label="Etiketler">
                @foreach ($blog->tags as $tag)
                    <a href="{{ route('blogs.index', ['etiket' => $tag]) }}">{{ $tag }}</a>
                @endforeach
            </div>
        @endif
    </article>

    <a class="text-link" href="{{ route('blogs.index') }}">← Tüm yazılara dön</a>
        </div>
        @include('blogs._highlights-sidebar')
    </div>
</main>
@endsection
