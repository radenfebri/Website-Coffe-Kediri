
@if ($paginator->hasPages())
<div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-start">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <li class="page-item">
                <a class="page-link"><i class="fi-rs-angle-double-small-left"></i></a>
            </li>
            @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i class="fi-rs-angle-double-small-left"></i></a>
            </li>
            @endif
            
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
            <li class="page-item">
                <a class="page-link dot">{{ $element }}</a>
            </li>
            @endif
            
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li class="page-item active">
                        <a class="page-link">{{ $page }}</a>
                    </li>
                    @else
                    <li class="page-item">
                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                    </li>
                    @endif
                @endforeach
            @endif
            @endforeach
            
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i class="fi-rs-angle-double-small-right"></i></a>
            </li>
            @else
            <li class="page-item">
                <a class="page-link"><i class="fi-rs-angle-double-small-right"></i></a>
            </li>
            @endif
        </ul>
    </nav>
</div>
@endif


