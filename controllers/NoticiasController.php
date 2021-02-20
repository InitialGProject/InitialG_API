<?php

namespace app\controllers;

/**
 * NoticiasController implements the CRUD actions for Noticias model.
 */
class NoticiasController extends ApiController
{
    public $authenable = false;  // En autenticación no chequea el Bearer

    public $modelClass = 'app\models\Noticias';
}
