@if ($paginator->hasPages())
    <nav style="background-color: white">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled mr-auto ml-2" aria-disabled="true">
                    <span class="page-link">Önceki</span>
                </li>
            @else
                <li class="page-item mr-auto ml-2">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" style="color: #9B0101">Önceki</a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item mr-2">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" style="color: #9B0101">Sonraki</a>
                </li>
            @else
                <li class="page-item disabled mr-2" aria-disabled="true">
                    <span class="page-link">Sonraki</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
