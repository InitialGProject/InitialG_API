<?php

namespace app\controllers;

/**
 * VideosController implements the CRUD actions for Videos model.
 */
class VideosController extends ApiController
{
    public $authenable = false;  // En autenticación no chequea el Bearer

    public $modelClass = 'app\models\Videos';
}
