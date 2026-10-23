<aside class="blog-sidebar blog-sidebar-highlights" aria-label="Öne çıkan yazılar">
    <section class="sidebar-panel">
        <h2>En çok okunanlar</h2>
        <ol class="sidebar-posts">
            @forelse ($mostReadBlogs as $popularBlog)
                <li>
                    <a href="{{ route('blogs.show', $popularBlog->slug) }}">{{ $popularBlog->title }}</a>
                    <span>{{ number_format($popularBlog->views_count) }} okunma</span>
                </li>
            @empty
                <li class="sidebar-empty">Henüz yazı yok.</li>
            @endforelse
        </ol>
    </section>

    <section class="sidebar-panel">
        <h2>Son yayınlananlar</h2>
        <ul class="sidebar-posts sidebar-posts-latest">
            @forelse ($latestBlogs as $latestBlog)
                <li>
                    <a href="{{ route('blogs.show', $latestBlog->slug) }}">{{ $latestBlog->title }}</a>
                    <span>{{ optional($latestBlog->published_at)->format('d.m.Y') ?? $latestBlog->created_at->format('d.m.Y') }}</span>
                </li>
            @empty
                <li class="sidebar-empty">Henüz yazı yok.</li>
            @endforelse
        </ul>
    </section>
</aside>
