<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $nombre
 * @property string $correo
 * @property int $edad
 * @property string $password
 * @property int $tipo
 * @property string|null $genero
 * @property string $estado
 * @property int|null $suscripcion
 * @property string $avatar
 *
 * @property Comentarios[] $comentarios
 * @property Entradas[] $entradas
 * @property Noticias[] $noticias
 * @property Participantestorneos[] $participantestorneos
 * @property Torneos[] $torneos
 * @property Videos[] $videos
 */
class Usuarios extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $username;

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['nombre' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'correo', 'password', 'token'], 'required'],
            [['correo', 'avatar'], 'string'],
            [['edad', 'suscripcion'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 32],
            [['token'], 'string', 'max' => 32],
            [['genero', 'estado'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'correo' => Yii::t('app', 'Correo'),
            'edad' => Yii::t('app', 'Edad'),
            'password' => Yii::t('app', 'Password'),
            'genero' => Yii::t('app', 'Genero'),
            'estado' => Yii::t('app', 'Estado'),
            'suscripcion' => Yii::t('app', 'Suscripcion'),
            'avatar' => Yii::t('app', 'Avatar'),
        ];
    }

    /**
     * Gets query for [[Comentarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentarios::className(), ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[Entradas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasMany(Entradas::className(), ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[Noticias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNoticias()
    {
        return $this->hasMany(Noticias::className(), ['autor_id' => 'id']);
    }

    /**
     * Gets query for [[Participantestorneos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParticipantestorneos()
    {
        return $this->hasMany(Participantestorneos::className(), ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[Torneos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTorneos()
    {
        return $this->hasMany(Torneos::className(), ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[Videos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVideos()
    {
        return $this->hasMany(Videos::className(), ['usuarios_id' => 'id']);
    }

    public function getTipoUser()
    {
        switch ($this->suscripcion) {
            case '1':
                return "Registrado";
                break;
            case '2':
                return  "Basico";
                break;
            case '3':
                return  "Gamer";
                break;
            case '4':
                return "Empresa";
                break;
            case '5':
                return  "Admin";
                break;
            default:
                return "Invitado";
                break;
        }
    }

    public function fields()
    {
        return array_merge(parent::fields(), ['TipoUser']);
    }
}
