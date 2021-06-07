<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mensaje".
 *
 * @property int $id
 * @property int $chat_id
 * @property int $sender_id
 * @property string $message
 * @property string $mdate
 *
 * @property Chat $chat
 * @property Usuarios $sender
 */
class Mensaje extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mensaje';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['chat_id', 'sender_id', 'message', 'mdate'], 'required'],
            [['chat_id', 'sender_id'], 'integer'],
            [['message'], 'string'],
            [['mdate'], 'safe'],
            [['chat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chat::className(), 'targetAttribute' => ['chat_id' => 'id']],
            [['sender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['sender_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'chat_id' => Yii::t('app', 'Chat ID'),
            'sender_id' => Yii::t('app', 'Sender ID'),
            'message' => Yii::t('app', 'Message'),
            'mdate' => Yii::t('app', 'Mdate'),
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
     * Gets query for [[Sender]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSender()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'sender_id']);
    }

    public function getNombre()
    {
        $nombre = $this->sender->nombre;
        return $nombre;
    }

    public function getAvatar()
    {
        $avatar = $this->sender->avatar;
        return $avatar;
    }

    public function fields()
    {
        return array_merge(parent::fields(), ['nombre', 'avatar']);
    }
}
