<?php

namespace app\controllers;

/**
 * CategoriasController implements the CRUD actions for Categorias model.
 */
class CategoriasController extends ApiController
{
    public $authenable = false;  // En autenticación no chequea el Bearer

    public $modelClass = 'app\models\Categorias';
}
