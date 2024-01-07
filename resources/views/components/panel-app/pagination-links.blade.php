@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between px-3">
        <div class="d-flex d-lg-none" style="width: 100%">
            <ul class="pagination" style="width: 100%">
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" style="cursor: not-allowed;">
                        <span class="page-link">Previous Page</span>
                    </li>
                @else
                    <li class="page-item">
                        <button type="button" class="page-link" wire:click="previousPage" wire:loading.attr="disabled" rel="prev">Previous Page</button>
                    </li>
                @endif
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <button class="page-link" type="button" wire:click="nextPage" wire:loading.attr="disabled" rel="next">Next Page</button>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" style="cursor: not-allowed;">
                        <span class="page-link">Next Page</span>
                    </li>
                @endif
            </ul>
        </div>
        <div class="d-none flex-lg-fill d-lg-flex align-items-lg-center justify-content-lg-between">
            <div>
                <p class="small text-muted">
                    {!! __('Showing') !!}
                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="fw-semibold">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>
            <div>
                <ul class="pagination">
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" title="No More Pages Left" style="cursor: not-allowed;">
                            <span class="page-link" aria-hidden="true">
                                <svg width="14" height="14" fill="currentColor" viewBox="0 -960 960 960">
                                    <path d="M420-55-6-480l426-426 106 107-319 319 319 319L420-55Z" />
                                </svg>
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <button type="button" class="page-link" wire:click="previousPage" wire:loading.attr="disabled" rel="prev" title="Previous Page">
                                <svg width="14" height="14" fill="currentColor" viewBox="0 -960 960 960">
                                    <path d="M420-55-6-480l426-426 106 107-319 319 319 319L420-55Z" />
                                </svg>
                            </button>
                        </li>
                    @endif
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li class="page-item disabled mx-1" aria-disabled="true"><span style="font-size: 25px; line-height: 25px">{{ $element }}</span></li>
                        @endif
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active" aria-current="page"><span class="page-link" style="cursor: not-allowed;">{{ $page }}</span></li>
                                @else
                                    <li class="page-item"><button type="button" class="page-link" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">{{ $page }}</button></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <button class="page-link" type="button" wire:click="nextPage" wire:loading.attr="disabled" rel="next" title="Next Page">
                                <svg width="14" height="14" fill="currentColor" viewBox="0 -960 960 960" style="line-height: 18">
                                    <path d="M287-55 180-161l319-319-319-319 107-107 425 426L287-55Z" />
                                </svg>
                            </button>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" title="No More Pages Left" style="cursor: not-allowed;">
                            <span class="page-link" aria-hidden="true">
                                <svg width="14" height="14" fill="currentColor" viewBox="0 -960 960 960">
                                    <path d="M287-55 180-161l319-319-319-319 107-107 425 426L287-55Z" />
                                </svg>
                            </span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif
