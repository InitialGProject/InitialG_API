<?php

namespace app\controllers;

/**
 * MensajeController implements the CRUD actions for Mensaje model.
 */
class MensajeController extends ApiController
{
    public $authenable = false;  // En autenticación no chequea el Bearer

    public $modelClass = 'app\models\Mensaje';
}
