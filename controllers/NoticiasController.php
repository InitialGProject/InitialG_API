<?php

namespace app\controllers;

use yii\rest\ActiveController;
// use yii\filters\auth\HttpBearerAuth;

/**
 * NoticiasController implements the CRUD actions for Noticias model.
 */
class NoticiasController extends ActiveController
{
   /* public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(),
            'except' => ['options', 'authenticate'],
        ];
        return $behaviors;
    }*/

    public $modelClass = 'app\models\Noticias';
}
