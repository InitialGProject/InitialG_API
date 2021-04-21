<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property int $id
 * @property int $cat_id
 * @property string $nombre
 * @property int $precio
 * @property int $IVA
 * @property string $imagen
 * @property string $descripcion
 * @property int $stock
 * @property int $disponible
 *
 * @property ProductosCategoria $cat
 * @property ProductosFactura[] $productosFacturas
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_id', 'nombre', 'precio', 'imagen', 'descripcion'], 'required'],
            [['cat_id', 'precio', 'IVA', 'stock', 'disponible'], 'integer'],
            [['nombre', 'imagen', 'descripcion'], 'string'],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductosCategoria::className(), 'targetAttribute' => ['cat_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cat_id' => Yii::t('app', 'Cat ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'precio' => Yii::t('app', 'Precio'),
            'IVA' => Yii::t('app', 'Iva'),
            'imagen' => Yii::t('app', 'Imagen'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'stock' => Yii::t('app', 'Stock'),
            'disponible' => Yii::t('app', 'Disponible'),
        ];
    }

    /**
     * Gets query for [[Cat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(ProductosCategoria::className(), ['id' => 'cat_id']);
    }

    /**
     * Gets query for [[ProductosFacturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductosFacturas()
    {
        return $this->hasMany(ProductosFactura::className(), ['id_producto' => 'id']);
    }
}
