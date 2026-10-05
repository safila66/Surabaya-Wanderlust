{{--
    Pemakaian:
    {{ $items->onEachSide(1)->links('partials.pagination') }}                          -> "destinasi" (default)
    {{ $items->onEachSide(1)->links('partials.pagination', ['label' => 'kuliner']) }}  -> "kuliner"
--}}
@if ($paginator->hasPages())
@once
    <style>
        .sw-pagination { margin: 48px 0 8px; text-align: center; }
        .sw-pagination ul { list-style: none; display: inline-flex; flex-wrap: wrap; justify-content: center; gap: 8px; margin: 0; padding: 0; }
        .sw-pagination li a,
        .sw-pagination li span {
            display: inline-flex; align-items: center; justify-content: center;
            min-width: 42px; height: 42px; padding: 0 14px;
            border-radius: 10px; border: 1px solid var(--border);
            background: var(--bg-card); color: var(--text-primary);
            font-size: 14px; font-weight: 600; text-decoration: none;
            transition: .2s ease;
        }
        .sw-pagination li a:hover { border-color: var(--gold); color: var(--gold); transform: translateY(-2px); }
        .sw-pagination li.active span { background: var(--gold); border-color: var(--gold); color: #fff; }
        .sw-pagination li.disabled span { opacity: .4; cursor: not-allowed; }
        .sw-pagination li.dots span { border: none; background: transparent; min-width: 20px; padding: 0; }
        .sw-pagination .sw-page-info { margin-top: 16px; font-size: 13px; color: var(--text-muted, var(--text-primary)); }
    </style>
@endonce

<nav class="sw-pagination" role="navigation" aria-label="Pagination">
    <ul>
        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>← Prev</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Prev</a></li>
        @endif

        {{-- Nomor halaman --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="dots"><span>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span aria-current="page">{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>
        @else
            <li class="disabled"><span>Next →</span></li>
        @endif
    </ul>

    <p class="sw-page-info">
        Menampilkan {{ $paginator->firstItem() }}–{{ $paginator->lastItem() }} dari {{ $paginator->total() }} {{ $label ?? 'destinasi' }}
    </p>
</nav>
@endif