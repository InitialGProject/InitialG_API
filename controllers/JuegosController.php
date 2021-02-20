<?php

namespace app\controllers;

/**
 * JuegosController implements the CRUD actions for Juegos model.
 */
class JuegosController extends ApiController
{
    public $authenable = false;  // En autenticación no chequea el Bearer

    public $modelClass = 'app\models\Juegos';
}
