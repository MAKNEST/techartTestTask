<div class="{{ $block }}">
    <div class="{{$block->elem('title')}}">
        {{ $data['NAME'] }}
    </div>

    <div class="{{ $block->elem('item-list') }}">
        @foreach ($data['ITEMS'] as $item)
            {!! $renderer->renderBlock('news/list-item', ['item' => $item]) !!}
        @endforeach
    </div>

    <div class="{{ $block->elem('pager') }}">
        {!! $data['NAV_STRING'] !!}
    </div>
</div>