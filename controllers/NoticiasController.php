<?php

namespace app\controllers;

use yii\filters\auth\HttpBearerAuth;
use yii\filters\Cors;

/**
 * NoticiasController implements the CRUD actions for Noticias model.
 */
class NoticiasController extends \yii\rest\ActiveController
{
    public function actionAuthenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Si se envían los datos en formato raw dentro de la petición http, se recogen así:
            $params = json_decode(file_get_contents("php://input"), false);
            @$usuario = $params->nombre;
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

    // Solución de CORS y auth para cuando lo subamos al server
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        // Autentificación de user para acceder a los datos
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(),
            'except' => ['options', 'authenticate'],
        ];

        // CORS
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

    public $modelClass = 'app\models\Noticias';
}
