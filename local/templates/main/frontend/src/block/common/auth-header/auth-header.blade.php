@if ($userAuthorised)
    @php    
        $uri = explode('?', $_SERVER["REQUEST_URI"])[0];

        $loginMod = $uri == '/auth/' ? 'selected' : '';
        $registerMod = $uri == '/auth/register.php' ? 'selected' : '';
    @endphp

    <a href="/auth/" class="{{ $block->elem('link')->mod($loginMod)}}">Авторизация</a>
    <a href="/auth/register.php" class="{{ $block->elem('link')->mod($registerMod)}}">Регистрация</a>
    @else
    <form action="/auth/">
        {!! $sessionId !!}
        <input type="hidden" name="logout" value="yes" >
        
        <div class="{{ $block->elem('user') }}">	
            <div class="{{ $block->elem('login') }}">{{ $userName }}</div>

            {!!
            $renderer->renderBlock(
                'assets/button',
                [
                    'text' => "Выйти",
                    'type' => 'submit',
                    'name' => 'logout_butt',
                    'optional_class' => 'b-button--logout'
                ]
            );
            !!}
        </div>
    </form>
@endif