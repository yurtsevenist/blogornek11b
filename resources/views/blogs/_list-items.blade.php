@foreach ($blogs as $blog)
    <article class="blog-row">
        <div class="blog-date">
            <span class="blog-number">{{ sprintf('%03d', (($blogs->currentPage() - 1) * $blogs->perPage()) + $loop->iteration) }}</span>
            <span>{{ optional($blog->published_at)->format('d.m.Y') ?? $blog->created_at->format('d.m.Y') }}</span>
        </div>
        <div class="blog-row-copy">
            <span class="post-category">
                <a href="{{ route('blogs.index', ['kategori' => $blog->category]) }}">{{ $blog->category ?: 'Kategorisiz' }}</a>
            </span>
            <h2><a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a></h2>
            <p>{{ $blog->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($blog->content), 180) }}</p>
            @if (is_array($blog->tags) && count($blog->tags))
                <div class="post-tags" aria-label="Etiketler">
                    @foreach ($blog->tags as $tag)
                        <a href="{{ route('blogs.index', ['etiket' => $tag]) }}">{{ $tag }}</a>
                    @endforeach
                </div>
            @endif
        </div>
        <a class="blog-arrow" href="{{ route('blogs.show', $blog->slug) }}" aria-label="{{ $blog->title }} yazısını oku">↗</a>
    </article>
@endforeach
