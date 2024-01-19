<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$categories = \TAO::infoblock('categories');

$args = [
    'order' => [
        'PROPERTY_DATE' => 'ASC'
    ],
    'fields' => ['ID', 'NAME']
];
$rows = $categories->getRows($args);

foreach ($rows as $row) {
    $aMenuLinksExt[] = [
        $row['NAME'],
        '/news/' . $row['ID'] . '/1',
        [],
        [],
        ""
    ];
}

$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);