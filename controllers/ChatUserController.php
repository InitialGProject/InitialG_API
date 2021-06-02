<?php

namespace app\controllers;

/**
 * ChatController implements the CRUD actions for ChatUser model.
 */
class ChatuserController extends ApiController
{
    public $authenable = false;  // En autenticación no chequea el Bearer

    public $modelClass = 'app\models\Chatuser';
}
