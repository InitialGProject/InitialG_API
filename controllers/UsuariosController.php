<?php

namespace app\controllers;

/**
 * UsuariosController implements the CRUD actions for Usuarios model.
 */
class UsuariosController extends ApiController
{
    public $authenable = false;  // En autenticación no chequea el Bearer

    public $modelClass = 'app\models\Usuarios';
}
