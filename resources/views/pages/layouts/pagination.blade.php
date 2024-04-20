@if($paginator->hasPages())


<div class="text-white mb-4 mr-4 flex gap-2 justify-between pagination">
    @if($paginator->onFirstPage())
        <a href="#" disabled>&laquo;</a>
    @else
        <a class="active_page"href="{{ $paginator->previousPageUrl() }}">&laquo;</a>
    @endif

    @foreach ($elements as $element)
        @if(is_string($element))
            <a href="">{{ $element }}</a>
        @endif
            @if(is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="active_page" href="#">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
    @endforeach






    @if($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}">&raquo;</a>
    @else
        <a href="#">&raquo;</a>
    @endif






</div>


@endif
