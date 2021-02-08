<?php

namespace app\controllers;

// use yii\filters\auth\HttpBearerAuth;
use yii\filters\Cors;

/**
 * EntradasController implements the CRUD actions for Entradas model.
 */
class EntradasController extends \yii\rest\ActiveController
{
    /* Autentificación de user para acceder a los datos
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(),
            'except' => ['options', 'authenticate'],
        ];
        return $behaviors;
    }*/

    // "Solución de CORS cuando lo subamos al server"
    public function behaviors()
    {
        $behaviors = parent::behaviors();

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

    public $modelClass = 'app\models\Entradas';
}
