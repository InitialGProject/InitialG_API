<?php

namespace app\controllers;

use yii\filters\Cors;

/**
 * ProductosCategoriaController implements the CRUD actions for ProductosCategoria model.
 */
class ProductosfacturacionController extends ApiController
{
    public $authenable = false;  // En autenticación no chequea el Bearer

    // Solución de CORS para cuando lo subamos al server
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

    public $modelClass = 'app\models\Productosfacturacion';
}
