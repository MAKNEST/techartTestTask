<div class="{{ $block }}">

    <a href="/" class="{{$block->elem('logo')}}">
        <div class="{{$block->elem('image')}}">
            <img class="{{ $block->elem('icon') }}" src="<?= SITE_TEMPLATE_PATH?>/assets/icons/header_logo.svg">
        </div>
        <p class="{{$block->elem('title')}}">
            Галактический<br>
            вестник
        </p>    
    </a>

    {!! $search !!}

    {!! $menu_links !!}

    {!! $basket_line !!}
</div>