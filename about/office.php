<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Офис");
?>
<div class="container">
<?=
\TAO::frontend()->renderBlock(
    'office/map',
    [
        'id' => 'map'
    ]
)
?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>