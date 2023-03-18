@if ($paginator->hasPages())

<div class="pagination-container">
    <ul class="list-inline list-unstyled">
        @if ($paginator->onFirstPage())
            <li class="prev disabled">
                <a href="#"><i class="fa fa-angle-left"></i></a>
            </li>
        @else
            <li li class="prev">
                <a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a>
            </li>
        @endif


        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled">{{ $element }}</li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active">
                            <a>{{ $page }}</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- <li><a href="#">1</a></li>
        <li class="active"><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li> --}}

        @if ($paginator->hasMorePages())
            <li class="next">
                <a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a>
            </li>
        @else
            <li class="next disabled">
                <a class="page-link" href="#"><i class="fa fa-angle-right"></i></a>
            </li>
        @endif

    </ul><!-- /.list-inline -->
</div><!-- /.pagination-container -->

@endif
