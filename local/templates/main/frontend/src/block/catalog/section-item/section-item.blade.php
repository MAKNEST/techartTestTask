<div class="{{ $block }}" id="{{ $id }}">
    {!! 
        $renderer->renderBlock(
            'assets/button-link',
            [
                'text' =>  $text,
                'link' => $link
            ]
        )
    !!}

</div>