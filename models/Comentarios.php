<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comentarios".
 *
 * @property int $id
 * @property int $entradas_id
 * @property int $usuario_id
 * @property string $creado
 * @property string $contenido
 * @property string $estado
 *
 * @property Entradas $entradas
 * @property Usuarios $usuario
 */
class Comentarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comentarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['entradas_id', 'usuario_id', 'contenido'], 'required'],
            [['entradas_id', 'usuario_id'], 'integer'],
            [['creado'], 'safe'],
            [['contenido'], 'string'],
            [['estado'], 'string', 'max' => 1],
            [['entradas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Entradas::className(), 'targetAttribute' => ['entradas_id' => 'id']],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'entradas_id' => Yii::t('app', 'Entradas ID'),
            'usuario_id' => Yii::t('app', 'Usuario ID'),
            'creado' => Yii::t('app', 'Creado'),
            'contenido' => Yii::t('app', 'Contenido'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * Gets query for [[Entradas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasOne(Entradas::className(), ['id' => 'entradas_id']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuario_id']);
    }

    public function getEstado()
    {
        $estado = $this->entradas->estado;

        if ($estado == 'A') {
            $estado = 'Aceptado';
        } else {
            $estado = 'Denegado';
        }

        return $estado;
    }

    public function getNombre()
    {
        if ($this->getEstado() == 'Aceptado') {
            return $this->usuario->nombre;
        }
    }

    public function fields()
    {
        return array_merge(parent::fields(), ['Estado', 'Nombre']);
    }
}
