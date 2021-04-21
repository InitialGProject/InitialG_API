<?php

namespace app\controllers;

/**
 * ProductosCategoriaController implements the CRUD actions for ProductosCategoria model.
 */
class ProductoscategoriaController extends ApiController
{
    public $authenable = false;  // En autenticación no chequea el Bearer

    public $modelClass = 'app\models\Productoscategoria';
}
