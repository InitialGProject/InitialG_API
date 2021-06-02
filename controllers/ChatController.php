<?php

namespace app\controllers;

/**
 * ChatController implements the CRUD actions for Chat model.
 */
class ChatController extends ApiController
{
    public $authenable = false;  // En autenticación no chequea el Bearer

    public $modelClass = 'app\models\Chat';
}
