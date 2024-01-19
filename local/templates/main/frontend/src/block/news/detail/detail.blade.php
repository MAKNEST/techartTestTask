<div class="{{ $block }}">
    <div class="line"></div>

    <div class="{{ $block->elem('breadcrumb') }}">
        <a href="/news/" class="{{ $block->elem('breadcrumb-link') }}">
            Главная /
        </a>
        <div class="{{ $block->elem('breadcrumb-title')}}">
            {{ $data['NAME'] }}
        </div>
    </div>

    <h1 class="{{ $block->elem('title') }}">
        {{ $data['NAME'] }}
    </h1>

    <div class="{{ $block->elem('content-container') }}">
        <div class="{{ $block->elem('text-container') }}">
            <div class="{{ $block->elem('date') }}">
                {{ $data['PROPERTIES']['DATE']['VALUE'] }}
            </div>

            <div class="{{ $block->elem('announce') }}">
                {!! $data['PREVIEW_TEXT'] !!}
            </div>

            <div class="{{ $block->elem('image-mobile') }}">
                <img hidden src="{{ $data['DETAIL_PICTURE']['SRC'] }}" class="{{ $block->elem('image-mobile') }}">
            </div>
            
            <div class="{{ $block->elem('text') }} work_news-content-news-text">
                {!! $data['DETAIL_TEXT'] !!}
            </div>

            @empty(!$data['CATEGORIES'])
                <div class="{{ $block->elem('categories') }} work-news_content-chapters">
                    <p>Категории: 
                        @foreach ($data['CATEGORIES'] as $categorName)
                            <a class="{{ $block->elem('chapter-link') }} work-news_categories-link" href="/news/{{ $categorName['ID'] }}/1">{{ $categorName['NAME'] }}</a>
                        @endforeach
                    </p>
                </div>                
            @endempty
        </div>

        <div class="{{ $block->elem('image-desctop-container') }}">
            <img src="{{ $data['DETAIL_PICTURE']['SRC'] }}" class="{{ $block->elem('image-desctop') }}">
        </div>

        <div class="{{ $block->elem('button-container') }}">
            {!! 
                $renderer->renderBlock(
                    'assets/button',
                    [
                        'text' => 'Назад к новостям',
                        'icon' => '<svg viewbox="0 0 26 16" xmlns="http://www.w3.org/2000/svg" class="button_icon" fill="currentColor">
                            <path d="M0.293015 8.70711C-0.0975094 8.31658 -0.0975094 7.68342 0.293014 7.2929L6.65698 0.928934C7.0475 0.538409 7.68067 0.538409 8.07119 0.928934C8.46171 1.31946 8.46171 1.95262 8.07119 2.34315L2.41434 8L8.07119 13.6569C8.46171 14.0474 8.46171 14.6805 8.07119 15.0711C7.68067 15.4616 7.0475 15.4616 6.65698 15.0711L0.293015 8.70711ZM26 9L1.00012 9L1.00012 7L26 7L26 9Z"/>
                            </svg>',
                        'icon_postion' => 'left',
                        'link' => '/news/'
                    ]
                )
            !!}
        </div>
    </div>
</div>