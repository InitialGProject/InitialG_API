<?php

return [
    'class' => 'yii\db\Connection',
    //Local
    //'dsn' => 'mysql:host=alum3.iesfsl.org;dbname=initialg',
    //Servidor
    'dsn' => 'mysql:host=localhost;dbname=initialg',
    'username' => 'rooto',
    'password' => 'madj',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 60,
    'schemaCache' => 'cache',
];
