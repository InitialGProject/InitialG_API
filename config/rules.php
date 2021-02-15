<?php
return  [
    [
        'class' => 'yii\rest\UrlRule',
        'pluralize' => false,
        'controller' => [
            'noticias',
            'usuarios',
            'torneos',
            'participantestorneos',
            'juegos',
            'entradas',
            'comentarios',
            'categorias'
        ],
    ],
    [
        'class' => 'yii\rest\UrlRule',
        'controller' => ['user'],
        'pluralize' => false,
        'extraPatterns' => [
            'POST authenticate' => 'authenticate',
            'OPTIONS authenticate' => 'authenticate',
        ]
    ],

];
