<?php


return [

    'news/([0-9]+)' => 'news/view/$1',
    'news' => 'news/index'
//news/sport/114
//    'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2', //[a-z]+ любое кол-во символов больше одного подряд
//    'news/([0-9]+)'=>'news/view',//actionIndex в NewsController
//    'news/ 15'=>'news/view',
//
//    'news'=>'news/index', //actionList в ProductController
];