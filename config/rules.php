<?php
return  [
    [
        'class' => 'yii\rest\UrlRule',
        'pluralize' => false,
        'controller' => [
            'noticias',
            'usuarios',
            'torneos',
            'videos',
            'participantestorneos',
            'juegos',
            'entradas',
            'comentarios',
            'categorias',
            'productoscategoria',
            'productos',
            'productosfacturacion',
            'productosfactura',
            'chat',
            'chatuser',
            'useruser',
            'mensaje',
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
