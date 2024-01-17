<div class="{{ $block }}">
    @foreach ($links as $item)
        <div class="{{ $block->elem('navbar') }}">
            <div class="{{ $block->elem('dropdown')}}">
                @php
                    $aLinkMod = (int) $item['SELECTED'] == 1 ? 'selected' : '' ;
                @endphp

                <a class="{{ $block->elem('link')->mod($aLinkMod)}}" href="<?= $item['LINK'];?>"><?= $item['TEXT']; ?>
                    @if (!empty($item['SUBITEMS']))
                        <svg class="{{ $block->elem('icon') }}" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 58.999 58.999" style="enable-background:new 0 0 58.999 58.999;" xml:space="preserve">
                            <path d="M29.167,0c-1.104,0-2,0.896-2,2v50.289L11.86,36.728c-0.781-0.781-1.922-0.781-2.703,0 c-0.781,0.78-0.719,2.047,0.062,2.828l18.883,18.857c0.375,0.375,0.899,0.586,1.43,0.586s1.047-0.211,1.422-0.586l18.857-18.857 c0.781-0.781,0.783-2.048,0.002-2.828c-0.781-0.781-2.296-0.781-3.077,0L31.167,52.052V2C31.167,0.895,30.271,0,29.167,0z"/>
                        </svg>
                    @endif
                </a>

                @if(!empty($item['SUBITEMS']))
                    <div class="{{$block->elem('dropdown-content')}}">
                        @foreach ($item['SUBITEMS'] as $subItem)
                            @php
                                $aSubLinkMod = (int) $subItem['SELECTED'] == 1 ? 'selected' : '' ;
                            @endphp

                            <a href="<?= $subItem['LINK'];?>" class="{{ $block->elem('submenu')->mod($aSubLinkMod) }}"><?= $subItem['TEXT']; ?></a>
                        @endforeach
                    </div>
                @endif
            </div> 
        </div>
    @endforeach

    <div class="{{ $block->elem('navbar') }}">
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
                    <input type="submit" name="logout_butt" value="Выйти" class="main_button logout_button">
                </div>
            </form>
        @endif
    </div>
</div>