<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Офисы");
?>
<div class="container">

<div class="maps_tabs">
    <?=
    \TAO::frontend()->renderBlock(
        'assets/button',
        [
            'text' => 'Офис Тула',
            'optional_class' => 'tula_tab tab_selected'
        ]
    );
    ?>

    <?=
    \TAO::frontend()->renderBlock(
        'assets/button',
        [
            'text' => 'Офис Москва',
            'optional_class' => 'moscow_tab'
        ]
    );
    ?>
</div>

<?=
\TAO::frontend()->renderBlock(
    'office/map',
    [
        'id' => 'map_tula',
        'addres' => 'Офис в Туле<br>
            300041, г. Тула, ул. Ф. Смирнова, д. 28, оф. 601-602, 701, 703-707, 712
            Тел. / Факс: (4872) 250-450, 57-05-01'
    ]
)
?>

<?=
\TAO::frontend()->renderBlock(
    'office/map',
    [
        'id' => 'map_moscow',
        'addres' => 'Офис в Москве<br>
            115230, г. Москва, Варшавское шоссе, д. 47, к. 4, оф. 1224 (12 этаж).
            Тел. / Факс: (495) 933-62-10',
        'data' => 'test value ass123'
    ]
)
?>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let map_tula = document.getElementById('map_tula');
        let map_moscow = document.getElementById('map_moscow');

        let tula_tab = document.querySelector('.tula_tab');
        let moscow_tab = document.querySelector('.moscow_tab');

        if (tula_tab.classList.contains('tab_selected')) {
            map_tula.classList.add(map_tula.className + '--show');
        }
        
        if (moscow_tab.classList.contains('tab_selected')) {
            map_moscow.classList.add(map_tula.className + '--show');
        }

        tula_tab.addEventListener('click', showTulaMap);
        moscow_tab.addEventListener('click', showMoscowMap);

        function showTulaMap () {
            map_moscow.classList.remove(map_moscow.classList.remove(map_moscow.classList[1]));
            map_tula.classList.add(map_tula.classList[0] + '--show');
            tula_tab.classList.add('tab_selected');
            moscow_tab.classList.remove('tab_selected');
        }

        function showMoscowMap() {
            map_tula.classList.remove(map_tula.classList.remove(map_tula.classList[1]));
            map_moscow.classList.add(map_moscow.classList[0] + '--show');
            moscow_tab.classList.add('tab_selected');
            tula_tab.classList.remove('tab_selected');
        }
    });
</script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>