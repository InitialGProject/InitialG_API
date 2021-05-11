<?php

namespace app\controllers;

/**
 * ProductosCategoriaController implements the CRUD actions for ProductosCategoria model.
 */
class ProductosfacturaController extends ApiController
{
    public $authenable = false;  // En autenticación no chequea el Bearer

    public $modelClass = 'app\models\Productosfactura';
}
