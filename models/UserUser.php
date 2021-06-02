<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_user".
 *
 * @property int $user_id
 * @property int $added_user
 *
 * @property Usuarios $user
 */
class UserUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'added_user'], 'required'],
            [['user_id', 'added_user'], 'integer'],
            // [['user_id'], 'unique'],
            // [['added_user'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['user_id' => 'id']],

            [['added_user'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['added_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'added_user' => Yii::t('app', 'Added User'),
        ];
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

    public function getAddedUser()
    {
        return $this->hasOne(Usuarios::class, ['id' => 'added_user']);
    }


    public function getNombre()
    {
        $nombre = $this->addedUser->nombre;
        return $nombre;
    }

    public function getAvatar()
    {
        $avatar = $this->addedUser->avatar;
        return $avatar;
    }

    public function fields()
    {
        return array_merge(parent::fields(), ['nombre', 'avatar']);
    }
}
