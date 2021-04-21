<?php

namespace app\controllers;

/**
 * ProductosController implements the CRUD actions for Productos model.
 */
class ProductosController extends ApiController
{
    public $authenable = false;  // En autenticación no chequea el Bearer

    public $modelClass = 'app\models\Productos';
}