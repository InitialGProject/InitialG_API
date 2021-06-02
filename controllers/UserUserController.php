<?php

namespace app\controllers;

/**
 * ChatController implements the CRUD actions for UserUser model.
 */
class UseruserController extends ApiController
{
    public $authenable = false;  // En autenticación no chequea el Bearer

    public $modelClass = 'app\models\Useruser';
}
