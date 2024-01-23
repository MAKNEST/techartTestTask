<a href="{{ $link }}" class="{{ $block }} {{ $optional_class}}" id="{{ $id }}" rel="{{ $rel }}">
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