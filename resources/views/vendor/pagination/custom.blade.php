@if ($paginator->hasPages())
    <div class="card-inner">
        <div class="nk-block-between-md g-3">
            <div class="g">
                <ul class="pagination justify-content-center justify-content-md-start">
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                    @else
                        <li class="page-item"><a class="page-link"
                                                 href="{{ $paginator->previousPageUrl() }}">Previous</a></li>
                    @endif
                    <li class="page-item">
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li class="page-item disabled">{{ $element }}</li>
                        @endif
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active">
                                        <a class="page-link">{{ $page }}</a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    @endif
                </ul><!-- .pagination -->
            </div>
            <div class="g">
                <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                    <div>Page</div>
                    <div>{{$paginator->currentPage()}} OF {{$paginator->total()}}</div>
                </div>
            </div><!-- .pagination-goto -->
        </div><!-- .nk-block-between -->
    </div><!-- .card-inner -->
@else
    <div class="card-inner">
        <div class="nk-block-between-md g-3">
            <div class="g">
                <ul class="pagination justify-content-center justify-content-md-start">
                    <li class="page-item"><a class="page-link" href="">Prev</a></li>
                    <li class="page-item"><a class="page-link" href="">1</a></li>
                    <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                    <li class="page-item"><a class="page-link" href="">Next</a></li>
                </ul><!-- .pagination -->
            </div>
            <div class="g">
                <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                    <div>Page</div>
                    <div>
                        <select class="form-select form-select-sm" data-search="on" data-dropdown="xs center">
                            <option value="page-1">1</option>
                        </select>
                    </div>
                    <div>OF 1</div>
                </div>
            </div><!-- .pagination-goto -->
        </div><!-- .nk-block-between -->
    </div>
@endif
