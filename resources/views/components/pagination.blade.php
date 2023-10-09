@if ($paginator->hasPages())
    <div class="mbp_pagination">
        <ul class="page_navigation text-end">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <a class="page-link" href="#">
                        <span class="fas fa-angle-left"></span>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" wire:navigate href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <span class="fas fa-angle-left"></span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true">
                        <a class="page-link" href="#">{{ $element }}</a>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" wire:navigate href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" wire:navigate href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <span class="fas fa-angle-right"></span>
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <a class="page-link" href="#">
                        <span class="fas fa-angle-right"></span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
@endif
