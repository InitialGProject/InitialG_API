<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "noticias".
 *
 * @property int $id
 * @property int $autor_id
 * @property int $entradas_id
 * @property string $titulo
 * @property string $descripcion
 * @property string $imagen
 *
 * @property Usuarios $autor
 * @property Entradas $entradas
 */
class Noticias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'noticias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['autor_id', 'entradas_id', 'titulo', 'descripcion', 'imagen'], 'required'],
            [['autor_id', 'entradas_id'], 'integer'],
            [['titulo', 'descripcion', 'imagen'], 'string'],
            [['autor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['autor_id' => 'id']],
            [['entradas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Entradas::className(), 'targetAttribute' => ['entradas_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'autor_id' => Yii::t('app', 'Autor ID'),
            'entradas_id' => Yii::t('app', 'Entradas ID'),
            'titulo' => Yii::t('app', 'Titulo'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'imagen' => Yii::t('app', 'Imagen'),
        ];
    }

    /**
     * Gets query for [[Autor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutor()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'autor_id']);
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
        $mostrado = $this->autor->nombre;
        if ($this->getEstado() == 'Aceptado') {
            $mostrado;
        } else {
            $mostrado = "Undefined";
        }
        return $mostrado;
    }

    public function fields()
    {
        return array_merge(parent::fields(), ['Estado', 'nombre']);
    }
}
