<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\filters\Cors;

/**
 * NoticiasController implements the CRUD actions for Noticias model.
 */
class VideosController extends ActiveController
{
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

    public $modelClass = 'app\models\Videos';
}