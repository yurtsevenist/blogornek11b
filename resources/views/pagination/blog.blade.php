@if ($paginator->hasPages())
    <nav class="blog-pagination" role="navigation" aria-label="Sayfalama">
        @if ($paginator->onFirstPage())
            <span class="pagination-control is-disabled" aria-disabled="true">← Önceki</span>
        @else
            <a class="pagination-control" href="{{ $paginator->previousPageUrl() }}" rel="prev">← Önceki</a>
        @endif

        <div class="pagination-pages">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="pagination-ellipsis">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="pagination-page is-current" aria-current="page">{{ $page }}</span>
                        @else
                            <a class="pagination-page" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        @if ($paginator->hasMorePages())
            <a class="pagination-control" href="{{ $paginator->nextPageUrl() }}" rel="next">Sonraki →</a>
        @else
            <span class="pagination-control is-disabled" aria-disabled="true">Sonraki →</span>
        @endif
    </nav>
@endif
