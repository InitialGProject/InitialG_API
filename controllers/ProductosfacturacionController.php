<?php

namespace app\controllers;

use yii\filters\Cors;

/**
 * ProductosCategoriaController implements the CRUD actions for ProductosCategoria model.
 */
class ProductosfacturacionController extends ApiController
{
    public $authenable = false;  // En autenticación no chequea el Bearer

    public $modelClass = 'app\models\Productosfacturacion';
}
