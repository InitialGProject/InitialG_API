<?php

namespace app\controllers;

use yii\filters\Cors;
use yii\rest\ActiveController;
/**
 * ProductosCategoriaController implements the CRUD actions for ProductosCategoria model.
 */
class ProductosfacturaController extends \yii\rest\ActiveController
{
    public $authenable = false;  // En autenticación no chequea el Bearer

    public $modelClass = 'app\models\Productosfactura';
   
    
}
