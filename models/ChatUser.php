<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chat_user".
 *
 * @property int $user_id
 * @property int $chat_id
 *
 * @property Chat $chat
 * @property Usuarios $user
 */
class ChatUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'chat_id'], 'required'],
            [['user_id', 'chat_id'], 'integer'],
            // [['user_id'], 'unique'],
            // [['chat_id'], 'unique'],
            [['chat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chat::className(), 'targetAttribute' => ['chat_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'chat_id' => Yii::t('app', 'Chat ID'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * Gets query for [[Chat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChat()
    {
        return $this->hasOne(Chat::className(), ['id' => 'chat_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'user_id']);
    }

    // Datos necesarios del chat
    public function getNombre()
    {
        $name = $this->chat->name;
        return $name;
    }
    public function getAvatar()
    {
        $avatar = $this->chat->avatar;
        return $avatar;
    }
    public function getFecha_creacion()
    {
        $cdate = $this->chat->cdate;
        return $cdate;
    }

    // Datos necesarios del usuario
    // public function getNombre_usuario()
    // {
    //     $nombre = $this->user->nombre;
    //     return $nombre;
    // }

    // public function getAvatarU()
    // {
    //     $avatar = $this->user->avatar;
    //     return $avatar;
    // }

    public function fields()
    {
        return array_merge(parent::fields(), ['nombre', 'avatar', 'fecha_creacion']);
    }
}
