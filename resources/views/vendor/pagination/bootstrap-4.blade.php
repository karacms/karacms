@if ($paginator->hasPages())
    <div class="flex items-center mt-5">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="rounded-l rounded-sm border-t border-b border-l px-3 py-1 cursor-not-allowed">&laquo;</span>
        @else
            <a
                class="rounded-l rounded-sm border-t border-b border-l px-3 py-1"
                href="{{ $paginator->previousPageUrl() }}"
                rel="prev"
            >
                &laquo;
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="border-t border-b border-l px-3 py-1 cursor-not-allowed">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="border-t border-b text-indigo-600 border-l px-3 py-1">{{ $page }}</span>
                    @else
                        <a class="border-t border-b border-l px-3 py-1" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="rounded-r rounded-sm border px-3 py-1" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
        @else
            <span class="rounded-r rounded-sm border px-3 py-1 cursor-not-allowed">&raquo;</span>
        @endif
    </div>
@endif