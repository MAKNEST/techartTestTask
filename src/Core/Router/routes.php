<?php 

return [
    "{(news)/(?P<action>all|one)/(?P<param>\d+)}" => [
        'controller' => 'News',
    ],

    "{/(news/(?P<param>\d+)|test)}" => [
        'controller' => 'News',
        'action' => 'All'
    ],

    "{/(test/(?P<param>\d+)|test)}" => [
        'controller' => 'News',
        'action' => 'All',
    ],

    "{^/$}" => [
        'controller' => 'News',
        'action' => 'All'
    ],
];  