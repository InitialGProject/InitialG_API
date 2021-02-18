<?php

namespace app\controllers;

use yii\filters\auth\HttpBearerAuth;
use yii\filters\Cors;

/**
 * NoticiasController implements the CRUD actions for Noticias model.
 */
class NoticiasController extends \yii\rest\ActiveController
{

    // Solución de CORS y auth para cuando lo subamos al server
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        // Autentificación de user para acceder a los datos
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(),
            'except' => ['options', 'authenticate'],
        ];

        // CORS
        $behaviors['corsFilter'] = [
            'class' => Cors::className(),
            'cors' => [
                'Acces-Control-Allow-Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Credentials' => true,
            ],
        ];
        return $behaviors;
    }

    public $modelClass = 'app\models\Noticias';
}
