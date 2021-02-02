<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "juegos".
 *
 * @property int $id
 * @property string|null $titulo
 * @property string|null $descipcion
 * @property string|null $imagen
 * @property int $categoria_id
 * @property string $tipo
 * @property string $ruta
 *
 * @property Entradas[] $entradas
 * @property Categorias $categoria
 */
class Juegos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'juegos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'descipcion', 'imagen'], 'string'],
            [['categoria_id', 'ruta'], 'required'],
            [['categoria_id'], 'integer'],
            [['tipo'], 'string', 'max' => 2],
            [['ruta'], 'string', 'max' => 50],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::className(), 'targetAttribute' => ['categoria_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'titulo' => Yii::t('app', 'Titulo'),
            'descipcion' => Yii::t('app', 'Descipcion'),
            'imagen' => Yii::t('app', 'Imagen'),
            'categoria_id' => Yii::t('app', 'Categoria ID'),
            'tipo' => Yii::t('app', 'Tipo'),
            'ruta' => Yii::t('app', 'Ruta'),
        ];
    }

    /**
     * Gets query for [[Entradas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasMany(Entradas::className(), ['juego_id' => 'id']);
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categorias::className(), ['id' => 'categoria_id']);
    }
}
