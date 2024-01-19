<div class="{{ $block }}">
    <div class="{{ $block->elem('title-container') }}">
		<h2 class="{{ $block->elem('title') }}">{{ $title }}</h2>

        @if (!empty($error_message))
            {!! $error_message !!}
        @endif

        @if (!is_null($ok_message))
            {!! $ok_message !!}
        @endif
	</div>

    <form action="{{ $action }}" method="POST" class="{{ $block->elem('feedback') }}">
        {!! $bitrix_sessid_post !!}

        @foreach ($inputs as $input)
            <div class="{{ $block->elem('input-container') }}">
                {!! $input['ERROR'] !!}
                {!! $input['INPUT'] !!}
            </div>
        @endforeach

        {!! $submit_button !!}
    </form>
</div>