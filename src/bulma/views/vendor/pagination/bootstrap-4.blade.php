@if ($paginator->hasPages())
    <ul class="pagination flex list-reset w-full my-8" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="text-black border mx-1 p-2 rounded" aria-hidden="true"><i class="mdi mdi-chevron-double-left text-grey-dark"></i></span>
            </li>
        @else
            <li>
                <a class="text-black border mx-1 p-2 rounded" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true"><i class="mdi mdi-chevron-double-left"></i></span>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="mx-1 p-2 rounded" aria-disabled="true">
                    <span class="page-link">{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li aria-current="page"><span class="border border-blue-darker bg-blue-darker text-white mx-1 p-2 rounded">{{ $page }}</span></li>
                    @else
                        <li><a class="text-black border border-blue-darker mx-1 p-2 rounded" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a class="text-black border mx-1 p-2 rounded" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    <i class="mdi mdi-chevron-double-right"></i>
                </a>
            </li>
        @else
            <li aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="border mx-1 p-2 rounded" aria-hidden="true"><i class="mdi mdi-chevron-double-right text-grey-dark"></i></span>
            </li>
        @endif
    </ul>
@endif
