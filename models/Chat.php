<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chat".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $avatar
 * @property string $cdate
 *
 * @property ChatUser $chatUser
 * @property Mensaje $mensaje
 */
class Chat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['avatar'], 'string'],
            [['cdate'], 'required'],
            [['cdate'], 'safe'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'avatar' => Yii::t('app', 'Avatar'),
            'cdate' => Yii::t('app', 'Cdate'),
        ];
    }

    /**
     * Gets query for [[ChatUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChatUser()
    {
        return $this->hasMany(ChatUser::className(), ['chat_id' => 'id']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasMany(ChatUser::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Mensaje]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMensaje()
    {
        return $this->hasMany(Mensaje::className(), ['chat_id' => 'id']);
    }

    public function fields()
    {
        return array_merge(parent::fields(), ['user', 'mensaje']);
    }
}
