<div class="{{ $block }}">
    <div class="{{ $block->elem('tabs') }}">
        {!!
        $renderer->renderBlock(
            'assets/button',
            [
                'text' => 'Офис Тула',
                'optional_class' => 'tula_tab tab_selected'
            ]
        );
        !!}
    </div>

    {!!
    $renderer->renderBlock(
        'office/map',
        [
            'id' => 'map_tula',
            'addres' => 'Офис в Туле<br>
                300041, г. Тула, ул. Ф. Смирнова ул., д. 28, оф. 601-602, 701, 703-707, 712
                Тел. / Факс: (4872) 250-450, 57-05-01',
            
        ]
    )   ; 
    !!}
</div>