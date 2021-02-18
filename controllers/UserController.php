<?php

namespace app\controllers;

use yii\filters\Cors;

class UserController extends \yii\rest\ActiveController
{
    // Función de auth
    public function actionAuthenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Si se envían los datos en formato raw dentro de la petición http, se recogen así:

            $params = json_decode(file_get_contents("php://input"), false);
            @$usuario = $params->usuario;
            @$password = $params->password;

            // Si se envían los datos de la forma habitual (form-data), se reciben en $_POST:
            // $usuario = $_POST['nombre'];
            // $password = $_POST['password'];

            if ($u = \app\models\Usuarios::findOne(['nombre' => $usuario]))
                if ($u->password == md5($password)) { //o crypt, según esté en la BD

                    return ['token' => $u->token, 'id' => $u->id, 'nombre' => $u->nombre];
                }

            return ['error' => 'Usuario incorrecto. ' . $usuario];
        }
    }

    // Solución de CORS para cuando lo subamos al server
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['corsFilter'] = [
            'class' => Cors::className(),
            'cors' => [
                'Acces-Control-Allow-Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Credentials' => true,
            ],
        ];
        return $behaviors;
    }

    public $modelClass = 'app\models\Usuarios';
}
