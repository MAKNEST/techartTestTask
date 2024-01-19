<div class="{{ $block }}">
    <div class="{{ $block->elem('title-container') }}">
		<h2 class="{{ $block->elem('title') }}">{{ $title }}</h2>

        {{-- error block --}}
        @if (!empty($error_message))
            {!!
            $renderer->renderBlock(
                'assets/error',
                [
                    'error_text' => ' - поля обязательны для заполнения'
                ]
                );
            !!}
        @endif
	</div>

    <form action="">
        {!! $bitrix_sessid_post !!}

        
    </form>
</div>