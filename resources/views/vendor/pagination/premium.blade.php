@if ($paginator->hasPages())
    <nav class="pagination-container">
        <ul class="pagination-list">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="pagination-item disabled"><span><i class="fas fa-chevron-left"></i></span></li>
            @else
                <li class="pagination-item"><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fas fa-chevron-left"></i></a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="pagination-item disabled"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination-item active"><span>{{ $page }}</span></li>
                        @else
                            <li class="pagination-item"><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pagination-item"><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fas fa-chevron-right"></i></a></li>
            @else
                <li class="pagination-item disabled"><span><i class="fas fa-chevron-right"></i></span></li>
            @endif
        </ul>
    </nav>
@endif

<style>
.pagination-container {
    margin: 80px 0;
    display: flex;
    justify-content: center;
}

.pagination-list {
    display: flex;
    gap: 12px;
    list-style: none;
    padding: 0;
}

.pagination-item {
    display: flex;
}

.pagination-item span, .pagination-item a {
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-size: 14px;
    font-weight: 600;
    color: var(--text-muted);
    transition: var(--transition);
    border: 1px solid var(--border-color);
}

.pagination-item a:hover {
    border-color: var(--primary-color);
    color: var(--primary-color);
    background: #fff;
}

.pagination-item.active span {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
}

.pagination-item.disabled span {
    opacity: 0.3;
    cursor: not-allowed;
}
</style>
