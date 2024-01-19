<a href="{{ $link }}" class="{{ $block }}">
    @php
        $pos = 'right';

        $pos = !is_null($icon_postion) ? $icon_postion : '';
    @endphp

    @if ($pos == 'right' || $pos == '')
        {{ $text }}
        {!! $icon !!}        
    @else
        {!! $icon !!}
        {{ $text }} 
    @endif
</a>