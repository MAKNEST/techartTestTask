<div class="{{ $block }}">
    @foreach ($sections as &$arSection)
        @php
            $component->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
			$component->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
        @endphp

        {!!
        \TAO::frontend()->renderBlock(
            'catalog/section-item',
            [
                'id' => $component->GetEditAreaId($arSection['ID']),
                'text' => $arSection['NAME'],
                'link' => $arSection['SECTION_PAGE_URL']
            ]
        );
        !!}

        @php unset($arSection); @endphp
    @endforeach
</div>