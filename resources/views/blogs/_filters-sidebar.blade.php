<aside class="blog-sidebar blog-sidebar-filters" aria-label="Blog filtreleri">
    <section class="sidebar-panel">
        <h2>Kategoriler</h2>
        <ul class="sidebar-links sidebar-category-links">
            @forelse ($categories as $category)
                <li><a href="{{ route('blogs.index', ['kategori' => $category]) }}">{{ $category }}</a></li>
            @empty
                <li class="sidebar-empty">Henüz kategori yok.</li>
            @endforelse
        </ul>
    </section>

    <section class="sidebar-panel">
        <div class="sidebar-tags sidebar-tags-desktop">
            @forelse ($tags as $tag)
                <a href="{{ route('blogs.index', ['etiket' => $tag]) }}">{{ $tag }}</a>
            @empty
                <span class="sidebar-empty">Henüz etiket yok.</span>
            @endforelse
        </div>
        <details class="sidebar-tag-menu">
            <summary aria-label="Etiket menüsünü aç">⋯</summary>
            <div class="sidebar-tag-menu-content">
                <h2>Etiketler</h2>
                @forelse ($tags as $tag)
                    <a href="{{ route('blogs.index', ['etiket' => $tag]) }}">{{ $tag }}</a>
                @empty
                    <span class="sidebar-empty">Henüz etiket yok.</span>
                @endforelse
            </div>
        </details>
    </section>
</aside>
