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

        {{-- Page Jump Input --}}
        <div class="pagination-jump">
            <form onsubmit="event.preventDefault(); navigateToPage(this)">
                <input type="number" name="page" min="1" max="{{ $paginator->lastPage() }}" placeholder="Sayfa..." value="{{ $paginator->currentPage() }}" required>
                <button type="submit" aria-label="Sayfaya Git"><i class="fas fa-arrow-right"></i></button>
            </form>
        </div>
    </nav>

    <script>
        function navigateToPage(form) {
            const pageInput = form.querySelector('input[name="page"]');
            const page = pageInput.value;
            const lastPage = {{ $paginator->lastPage() }};
            if (!page || page < 1 || page > lastPage) return;
            
            const url = new URL(window.location.href);
            url.searchParams.set('page', page);
            window.location.href = url.toString();
        }
    </script>
@endif

<style>
.pagination-container {
    margin: 80px 0;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.pagination-jump {
    display: flex;
    align-items: center;
}

.pagination-jump form {
    display: flex;
    align-items: center;
    border: 1px solid var(--border-color);
    border-radius: 50px;
    padding: 3px 3px 3px 12px;
    background: #fff;
    transition: var(--transition);
}

.pagination-jump form:focus-within {
    border-color: var(--accent-color);
    box-shadow: 0 4px 15px rgba(184, 155, 114, 0.1);
}

.pagination-jump input {
    width: 65px;
    border: none;
    outline: none;
    font-size: 13px;
    font-family: var(--font-body);
    color: var(--text-color);
    background: transparent;
    text-align: center;
}

/* Remove arrows for input type number */
.pagination-jump input::-webkit-outer-spin-button,
.pagination-jump input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
.pagination-jump input[type=number] {
    -moz-appearance: textfield;
}

.pagination-jump button {
    background: var(--primary-color);
    color: #fff;
    border: none;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
    font-size: 11px;
}

.pagination-jump button:hover {
    background: var(--accent-color);
    transform: scale(1.05);
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
